<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/mailer.php';
require_once __DIR__ . '/../conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registro.php');
    exit;
}

if (!verify_csrf()) {
    header('Location: registro.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

if (!mafi_rate_limit('registro_usuario', 8, 600)) {
    header('Location: registro.php?error=' . urlencode('Demasiados intentos de registro en poco tiempo. Espera unos minutos e intenta nuevamente.'));
    exit;
}

$nombres         = mb_strtoupper(trim((string) ($_POST['nombres'] ?? '')), 'UTF-8');
$apellidoPaterno = mb_strtoupper(trim((string) ($_POST['apellido_paterno'] ?? '')), 'UTF-8');
$apellidoMaterno = mb_strtoupper(trim((string) ($_POST['apellido_materno'] ?? '')), 'UTF-8');
$correo          = trim((string) ($_POST['correo_electronico'] ?? ''));
$contrasena      = trim((string) ($_POST['contrasena'] ?? ''));
$claveAcceso     = trim((string) ($_POST['clave_acceso'] ?? ''));
$captcha         = trim((string) ($_POST['captcha'] ?? ''));
$terminos        = $_POST['terminos'] ?? '';

$captchaCorrecto = $_SESSION['captcha_answer'] ?? null;
unset($_SESSION['captcha_answer']);

if (empty($terminos)) {
    header('Location: registro.php?error=' . urlencode('Debes aceptar los Términos y Condiciones para poder registrarte.'));
    exit;
}

if ($nombres === '' || $apellidoPaterno === '' || $apellidoMaterno === '' || $correo === '' || $contrasena === '' || $claveAcceso === '' || $captcha === '') {
    header('Location: registro.php?error=' . urlencode('Todos los campos son obligatorios.'));
    exit;
}

if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: registro.php?error=' . urlencode('Por favor, ingresa un correo electrónico válido.'));
    exit;
}

if (!validar_nombre_persona($nombres) || !validar_nombre_persona($apellidoPaterno) || !validar_nombre_persona($apellidoMaterno)) {
    header('Location: registro.php?error=' . urlencode('El nombre y los apellidos solo deben contener letras y espacios.'));
    exit;
}

if (($errPass = validar_fortaleza_contrasena($contrasena)) !== null) {
    header('Location: registro.php?error=' . urlencode($errPass));
    exit;
}

if ($captchaCorrecto === null || (int) $captcha !== (int) $captchaCorrecto) {
    header('Location: registro.php?error=' . urlencode('Captcha incorrecto. Por favor, intenta de nuevo.'));
    exit;
}

$token = bin2hex(random_bytes(16));
$conexion->begin_transaction();

try {
    $stmtAcceso = $conexion->prepare('SELECT AccesoID, Usado FROM accesos WHERE Codigo = ? FOR UPDATE');
    $stmtAcceso->bind_param('s', $claveAcceso);
    $stmtAcceso->execute();
    $resAcceso = $stmtAcceso->get_result();

    if ($resAcceso->num_rows === 0) {
        $stmtAcceso->close();
        $conexion->rollback();
        header('Location: registro.php?error=' . urlencode('El código de acceso no es válido.'));
        exit;
    }

    $acceso = $resAcceso->fetch_assoc();
    $stmtAcceso->close();

    if ((int) $acceso['Usado'] === 1) {
        $conexion->rollback();
        header('Location: registro.php?error=' . urlencode('El código de acceso ya ha sido utilizado.'));
        exit;
    }

    $accesoID = (int) $acceso['AccesoID'];

    $stmtCorreo = $conexion->prepare('SELECT UsuarioID FROM usuarios WHERE CorreoElectronico = ? FOR UPDATE');
    $stmtCorreo->bind_param('s', $correo);
    $stmtCorreo->execute();
    if ($stmtCorreo->get_result()->num_rows > 0) {
        $stmtCorreo->close();
        $conexion->rollback();
        header('Location: registro.php?error=' . urlencode('El correo electrónico ya está registrado.'));
        exit;
    }
    $stmtCorreo->close();

    $stmtMarcar = $conexion->prepare('UPDATE accesos SET Usado = 1 WHERE AccesoID = ?');
    $stmtMarcar->bind_param('i', $accesoID);
    $stmtMarcar->execute();
    $stmtMarcar->close();

    $contrasenaCifrada = password_hash($contrasena, PASSWORD_BCRYPT);
    $stmtInsert = $conexion->prepare(
        "INSERT INTO usuarios (Nombres, ApellidoPaterno, ApellidoMaterno, CorreoElectronico, Contrasena, AccesoID, TokenVerificacion, Estado)
         VALUES (?, ?, ?, ?, ?, ?, ?, 'pendiente')"
    );
    $stmtInsert->bind_param('sssssis', $nombres, $apellidoPaterno, $apellidoMaterno, $correo, $contrasenaCifrada, $accesoID, $token);
    $stmtInsert->execute();
    $stmtInsert->close();

    $conexion->commit();
} catch (mysqli_sql_exception $exception) {
    $conexion->rollback();
    header('Location: registro.php?error=' . urlencode('Ocurrió un error al procesar el registro. Intenta nuevamente.'));
    exit;
}

$verificationLink = base_url('Login/verificar_correo.php?token=' . urlencode($token));
$cuerpo = 'Hola ' . e($nombres) . ',<br><br>¡Gracias por registrarte! Por favor, haz clic en el siguiente enlace para activar tu cuenta:<br><br>'
    . '<a href="' . e($verificationLink) . '" style="padding: 10px 15px; background-color: #002B7A; color: white; text-decoration: none; border-radius: 5px;">Activar mi cuenta</a>'
    . '<br><br>Si no te registraste en nuestro sistema, puedes ignorar este correo.';

if (mafi_enviar_correo($correo, $nombres, 'Activa tu cuenta en el Sistema MAFI', $cuerpo)) {
    $_SESSION['usuario_pendiente_verificacion'] = $correo;
    header('Location: revisa_tu_correo.php');
    exit;
}

header('Location: registro.php?error=' . urlencode("Cuenta creada pero no se pudo enviar el correo. Usa 'Reenviar código' con tu correo."));
exit;
