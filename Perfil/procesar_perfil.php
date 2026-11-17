<?php
require_once __DIR__ . '/../Login/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['accion'])) {
    header('Location: mi_perfil.php');
    exit;
}

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$accion = (string) $_POST['accion'];
$tabSuffix = $accion === 'cambiar_contrasena' ? '&tab=seguridad' : ($accion === 'eliminar_cuenta' ? '&tab=peligro' : '');

if (!verify_csrf()) {
    header('Location: mi_perfil.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.') . $tabSuffix);
    exit;
}

if ($accion === 'actualizar_info') {
    $nombres = mb_strtoupper(trim((string) ($_POST['nombres'] ?? '')), 'UTF-8');
    $apellidoPaterno = mb_strtoupper(trim((string) ($_POST['apellido_paterno'] ?? '')), 'UTF-8');
    $apellidoMaterno = mb_strtoupper(trim((string) ($_POST['apellido_materno'] ?? '')), 'UTF-8');

    if ($nombres === '' || $apellidoPaterno === '' || $apellidoMaterno === '') {
        header('Location: mi_perfil.php?error=' . urlencode('El nombre y los apellidos no pueden estar vacíos.'));
        exit;
    }

    if (!validar_nombre_persona($nombres) || !validar_nombre_persona($apellidoPaterno) || !validar_nombre_persona($apellidoMaterno)) {
        header('Location: mi_perfil.php?error=' . urlencode('El nombre y los apellidos solo deben contener letras y espacios.'));
        exit;
    }

    $stmtUpdate = $conexion->prepare('UPDATE usuarios SET Nombres = ?, ApellidoPaterno = ?, ApellidoMaterno = ? WHERE UsuarioID = ?');
    $stmtUpdate->bind_param('sssi', $nombres, $apellidoPaterno, $apellidoMaterno, $usuarioID);

    if ($stmtUpdate->execute()) {
        $stmtUpdate->close();
        sync_session_user([
            'Nombres'         => $nombres,
            'ApellidoPaterno' => $apellidoPaterno,
            'ApellidoMaterno' => $apellidoMaterno,
        ]);
        header('Location: mi_perfil.php?success=' . urlencode('Información actualizada con éxito.'));
        exit;
    }

    $stmtUpdate->close();
    header('Location: mi_perfil.php?error=' . urlencode('Error al actualizar la información.'));
    exit;
}

if ($accion === 'cambiar_contrasena') {
    $passActual = trim((string) ($_POST['pass_actual'] ?? ''));
    $passNueva = trim((string) ($_POST['pass_nueva'] ?? ''));
    $passConfirmar = trim((string) ($_POST['pass_confirmar'] ?? ''));

    if ($passActual === '' || $passNueva === '' || $passConfirmar === '') {
        header('Location: mi_perfil.php?error=' . urlencode('Todos los campos de contraseña son obligatorios.') . '&tab=seguridad');
        exit;
    }

    if ($passNueva !== $passConfirmar) {
        header('Location: mi_perfil.php?error=' . urlencode('Las nuevas contraseñas no coinciden.') . '&tab=seguridad');
        exit;
    }

    if (($errPass = validar_fortaleza_contrasena($passNueva, 'La nueva contraseña')) !== null) {
        header('Location: mi_perfil.php?error=' . urlencode($errPass) . '&tab=seguridad');
        exit;
    }

    $stmtCheck = $conexion->prepare('SELECT Contrasena FROM usuarios WHERE UsuarioID = ?');
    $stmtCheck->bind_param('i', $usuarioID);
    $stmtCheck->execute();
    $usuario = $stmtCheck->get_result()->fetch_assoc();
    $stmtCheck->close();

    if ($usuario && password_verify($passActual, (string) $usuario['Contrasena'])) {
        $nuevaHash = password_hash($passNueva, PASSWORD_BCRYPT);
        $stmtUpd = $conexion->prepare('UPDATE usuarios SET Contrasena = ? WHERE UsuarioID = ?');
        $stmtUpd->bind_param('si', $nuevaHash, $usuarioID);

        if ($stmtUpd->execute()) {
            $stmtUpd->close();
            header('Location: mi_perfil.php?success=' . urlencode('Contraseña actualizada con éxito.') . '&tab=seguridad');
            exit;
        }
        $stmtUpd->close();
        header('Location: mi_perfil.php?error=' . urlencode('Error al actualizar la contraseña.') . '&tab=seguridad');
        exit;
    }

    header('Location: mi_perfil.php?error=' . urlencode('La contraseña actual es incorrecta.') . '&tab=seguridad');
    exit;
}

if ($accion === 'eliminar_cuenta') {
    $passActual = trim((string) ($_POST['pass_eliminar'] ?? ''));

    $stmtCheckPass = $conexion->prepare('SELECT Contrasena FROM usuarios WHERE UsuarioID = ?');
    $stmtCheckPass->bind_param('i', $usuarioID);
    $stmtCheckPass->execute();
    $usuario = $stmtCheckPass->get_result()->fetch_assoc();
    $stmtCheckPass->close();

    if (!$usuario || !password_verify($passActual, (string) $usuario['Contrasena'])) {
        header('Location: mi_perfil.php?error=' . urlencode('La contraseña es incorrecta.') . '&tab=peligro');
        exit;
    }

    $stmtCheckClases = $conexion->prepare('SELECT ClaseID FROM clases WHERE CreadorID = ? LIMIT 1');
    $stmtCheckClases->bind_param('i', $usuarioID);
    $stmtCheckClases->execute();
    $tieneClases = $stmtCheckClases->get_result()->num_rows > 0;
    $stmtCheckClases->close();

    if ($tieneClases) {
        header('Location: mi_perfil.php?error=' . urlencode("No puedes eliminar tu cuenta porque eres profesor de una o más clases. Debes eliminarlas primero desde 'Gestión de Clases'.") . '&tab=peligro');
        exit;
    }

    $conexion->begin_transaction();
    try {
        foreach ([
            'DELETE FROM comentarios WHERE UsuarioID = ?',
            'DELETE FROM anuncios WHERE UsuarioID = ?',
            'DELETE FROM inscripciones WHERE UsuarioID = ?',
            'DELETE FROM usuarios WHERE UsuarioID = ?',
        ] as $sqlDel) {
            $stmtDel = $conexion->prepare($sqlDel);
            $stmtDel->bind_param('i', $usuarioID);
            $stmtDel->execute();
            $stmtDel->close();
        }

        $conexion->commit();

        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
        }
        session_destroy();

        header('Location: ' . app_path('Login/inicio_sesion.php') . '?success=' . urlencode('Tu cuenta ha sido eliminada permanentemente.'));
        exit;
    } catch (mysqli_sql_exception $exception) {
        $conexion->rollback();
        error_log('MAFI eliminar_cuenta error: ' . $exception->getMessage());
        header('Location: mi_perfil.php?error=' . urlencode('No se pudo eliminar la cuenta en este momento.') . '&tab=peligro');
        exit;
    }
}

header('Location: mi_perfil.php');
exit;
