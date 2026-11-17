<?php
/**
 * Bootstrap común: sesión segura, CSRF, escape HTML, redirecciones y helpers de roles.
 */

require_once __DIR__ . '/../config.php';

if (!function_exists('mafi_start_session')) {
    function mafi_start_session(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
                || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);

            ini_set('session.use_strict_mode', '1');
            session_set_cookie_params([
                'lifetime' => 0,
                'path'     => '/',
                'secure'   => $isHttps,
                'httponly' => true,
                'samesite' => 'Lax',
            ]);
            session_start();
        }
    }
}

mafi_start_session();

if (!function_exists('e')) {
    function e(?string $value): string
    {
        return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('csrf_token')) {
    function csrf_token(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}

if (!function_exists('csrf_field')) {
    function csrf_field(): string
    {
        return '<input type="hidden" name="csrf_token" value="' . e(csrf_token()) . '">';
    }
}

if (!function_exists('verify_csrf')) {
    function verify_csrf(?string $token = null): bool
    {
        $sessionToken = $_SESSION['csrf_token'] ?? '';
        $submitted = $token ?? ($_POST['csrf_token'] ?? '');
        return is_string($sessionToken) && $sessionToken !== ''
            && is_string($submitted) && $submitted !== ''
            && hash_equals($sessionToken, $submitted);
    }
}

if (!function_exists('safe_redirect_path')) {
    /**
     * Valida que la ruta de redirección sea interna al sitio y nunca un dominio externo.
     */
    function safe_redirect_path(?string $candidate, string $fallback): string
    {
        $candidate = trim((string) ($candidate ?? ''));
        if ($candidate === '' || str_starts_with($candidate, '//') || preg_match('/^[a-z][a-z0-9+.-]*:/i', $candidate)) {
            return $fallback;
        }
        $clean = str_replace(["\r", "\n"], '', $candidate);
        $base = rtrim(MAFI_BASE_PATH, '/');
        if ($base !== '' && !str_starts_with($clean, $base . '/') && $clean !== $base) {
            return $fallback;
        }
        return $clean;
    }
}

if (!function_exists('resolverRolParaBD')) {
    /**
     * Ajusta el nombre del rol a un valor válido en el ENUM de `usuarios.Rol`.
     */
    function resolverRolParaBD(mysqli $conexion, string $rolDeseado): ?string
    {
        static $opcionesRol = null;

        if ($opcionesRol === null) {
            $opcionesRol = [];
            if ($resCol = $conexion->query("SHOW COLUMNS FROM usuarios LIKE 'Rol'")) {
                if ($rowC = $resCol->fetch_assoc()) {
                    $type = $rowC['Type'] ?? '';
                    if (preg_match_all("/'([^']+)'/", $type, $m)) {
                        $opcionesRol = $m[1];
                    }
                }
                $resCol->close();
            }
        }

        if (empty($opcionesRol)) {
            return $rolDeseado;
        }

        foreach ($opcionesRol as $opcion) {
            if (strtolower($opcion) === strtolower($rolDeseado)) {
                return $opcion;
            }
        }

        // Compatibilidad si la BD no tiene 'alumno' en el ENUM (usa 'usuario')
        if (strtolower($rolDeseado) === 'alumno') {
            foreach ($opcionesRol as $opcion) {
                if (strtolower($opcion) === 'usuario') {
                    return $opcion;
                }
            }
        }

        return null;
    }
}

if (!function_exists('recalcularRolUsuario')) {
    function recalcularRolUsuario(mysqli $conexion, int $usuarioId, string $rolActualBD): string
    {
        if (strtolower($rolActualBD) === 'administrador') {
            return 'administrador';
        }

        $stmt = $conexion->prepare(
            "SELECT
                SUM(CASE WHEN EstadoInscripcion = 'profesor' THEN 1 ELSE 0 END) AS num_prof,
                SUM(CASE WHEN EstadoInscripcion = 'alumno' THEN 1 ELSE 0 END) AS num_alum
             FROM inscripciones WHERE UsuarioID = ?"
        );
        $stmt->bind_param('i', $usuarioId);
        $stmt->execute();
        $row = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ((int) ($row['num_prof'] ?? 0) > 0) {
            return 'profesor';
        }
        if ((int) ($row['num_alum'] ?? 0) > 0) {
            return 'alumno';
        }
        return 'usuario';
    }
}

if (!function_exists('sync_session_user')) {
    /**
     * Mantiene sincronizadas todas las llaves de sesión utilizadas en los módulos.
     */
    function sync_session_user(array $usuario, ?string $correo = null): void
    {
        $id = (int) ($usuario['UsuarioID'] ?? ($_SESSION['id'] ?? 0));
        $nombres = (string) ($usuario['Nombres'] ?? ($_SESSION['usuario_nombres'] ?? ''));
        $ap = (string) ($usuario['ApellidoPaterno'] ?? ($_SESSION['usuario_apellidop'] ?? ''));
        $am = (string) ($usuario['ApellidoMaterno'] ?? ($_SESSION['usuario_apellidom'] ?? ''));
        $rol = strtolower((string) ($usuario['Rol'] ?? ($_SESSION['usuario_rol'] ?? 'usuario')));
        $mail = $correo ?? (string) ($usuario['CorreoElectronico'] ?? ($_SESSION['usuario_correo'] ?? ''));
        $nombreCompleto = trim($nombres . ' ' . $ap . ' ' . $am);

        $_SESSION['loggedin'] = true;
        $_SESSION['id'] = $id;
        $_SESSION['usuario_id'] = $id;
        $_SESSION['nombre'] = $nombres;
        $_SESSION['usuario_nombres'] = $nombres;
        $_SESSION['usuario_apellidop'] = $ap;
        $_SESSION['usuario_apellidom'] = $am;
        $_SESSION['nombre_completo'] = $nombreCompleto !== '' ? $nombreCompleto : $nombres;
        $_SESSION['rol'] = $rol;
        $_SESSION['usuario_rol'] = $rol;
        $_SESSION['correo'] = $mail;
        $_SESSION['usuario_correo'] = $mail;
    }
}

if (!function_exists('validar_nombre_persona')) {
    /**
     * Valida nombres y apellidos ya normalizados en mayúsculas (letras latinas y espacios).
     */
    function validar_nombre_persona(string $valor): bool
    {
        return preg_match('/^[A-ZÁÉÍÓÚÜÑ\s]+$/u', $valor) === 1;
    }
}

if (!function_exists('validar_fortaleza_contrasena')) {
    /**
     * Verifica la política de seguridad de contraseñas y devuelve el mensaje de error o null.
     */
    function validar_fortaleza_contrasena(string $contrasena, string $sujeto = 'La contraseña'): ?string
    {
        $errores = [];
        if (strlen($contrasena) < 8) {
            $errores[] = '8 caracteres';
        }
        if (!preg_match('/[A-Z]/', $contrasena)) {
            $errores[] = 'una mayúscula';
        }
        if (!preg_match('/[a-z]/', $contrasena)) {
            $errores[] = 'una minúscula';
        }
        if (!preg_match('/[0-9]/', $contrasena)) {
            $errores[] = 'un número';
        }
        if (!preg_match('/[^A-Za-z0-9]/', $contrasena)) {
            $errores[] = 'un carácter especial';
        }

        if (!empty($errores)) {
            return $sujeto . ' debe contener al menos: ' . implode(', ', $errores) . '.';
        }
        return null;
    }
}

if (!function_exists('actualizar_rol_usuario_en_bd')) {
    /**
     * Recalcula y sincroniza en BD (y opcionalmente en sesión) el rol derivado de inscripciones.
     */
    function actualizar_rol_usuario_en_bd(mysqli $conexion, int $usuarioID, bool $actualizarSesion = false): void
    {
        $stmtGet = $conexion->prepare('SELECT Rol FROM usuarios WHERE UsuarioID = ?');
        $stmtGet->bind_param('i', $usuarioID);
        $stmtGet->execute();
        $row = $stmtGet->get_result()->fetch_assoc();
        $stmtGet->close();

        if (!$row) {
            return;
        }

        $rolActualBD = (string) ($row['Rol'] ?? '');
        $rolCalculado = recalcularRolUsuario($conexion, $usuarioID, $rolActualBD);
        $rolParaBD = resolverRolParaBD($conexion, $rolCalculado);

        if ($rolParaBD !== null && strcasecmp($rolParaBD, $rolActualBD) !== 0) {
            $stmtUpd = $conexion->prepare('UPDATE usuarios SET Rol = ? WHERE UsuarioID = ?');
            $stmtUpd->bind_param('si', $rolParaBD, $usuarioID);
            $stmtUpd->execute();
            $stmtUpd->close();
        }

        if ($actualizarSesion && (int) ($_SESSION['id'] ?? 0) === $usuarioID) {
            $rolSesion = strtolower($rolCalculado);
            $_SESSION['rol'] = $rolSesion;
            $_SESSION['usuario_rol'] = $rolSesion;
        }
    }
}
