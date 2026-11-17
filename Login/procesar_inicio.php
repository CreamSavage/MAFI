<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inicio_sesion.php');
    exit;
}

if (!verify_csrf()) {
    header('Location: inicio_sesion.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

$captchaIngresado = isset($_POST['captcha']) ? (int) $_POST['captcha'] : null;
$captchaCorrecto = $_SESSION['captcha_answer'] ?? null;
unset($_SESSION['captcha_answer']);

if ($captchaIngresado === null || $captchaCorrecto === null || $captchaIngresado !== (int) $captchaCorrecto) {
    header('Location: inicio_sesion.php?error=' . urlencode('Captcha incorrecto. Por favor, intenta de nuevo.'));
    exit;
}

$correo = trim((string) ($_POST['correo_electronico'] ?? ''));
$contrasenaIngresada = trim((string) ($_POST['contrasena'] ?? ''));

if ($correo === '' || $contrasenaIngresada === '') {
    header('Location: inicio_sesion.php?error=' . urlencode('Correo y contraseña son obligatorios.'));
    exit;
}

$stmt = $conexion->prepare(
    'SELECT UsuarioID, Nombres, ApellidoPaterno, ApellidoMaterno, CorreoElectronico, Contrasena, Estado, Rol
     FROM usuarios WHERE CorreoElectronico = ?'
);
$stmt->bind_param('s', $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows !== 1) {
    $stmt->close();
    $conexion->close();
    header('Location: inicio_sesion.php?error=' . urlencode('Correo o contraseña incorrectos.'));
    exit;
}

$usuario = $resultado->fetch_assoc();
$stmt->close();

if (!password_verify($contrasenaIngresada, $usuario['Contrasena'])) {
    $conexion->close();
    header('Location: inicio_sesion.php?error=' . urlencode('Correo o contraseña incorrectos.'));
    exit;
}

if ($usuario['Estado'] !== 'verificado') {
    $conexion->close();
    header('Location: inicio_sesion.php?error=' . urlencode('Tu cuenta aún no ha sido verificada. Por favor, revisa tu correo.'));
    exit;
}

session_regenerate_id(true);
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));

$sessionToken = bin2hex(random_bytes(32));
$stmtUpd = $conexion->prepare('UPDATE usuarios SET UltimaConexion = NOW(), SessionToken = ? WHERE UsuarioID = ?');
$stmtUpd->bind_param('si', $sessionToken, $usuario['UsuarioID']);
$stmtUpd->execute();
$stmtUpd->close();

$rolCalculado = recalcularRolUsuario($conexion, (int) $usuario['UsuarioID'], (string) $usuario['Rol']);
if ($rolCalculado !== strtolower((string) $usuario['Rol'])) {
    $rolCalculadoBD = resolverRolParaBD($conexion, $rolCalculado);
    if ($rolCalculadoBD !== null) {
        $stmtUpdRol = $conexion->prepare("UPDATE usuarios SET Rol = ? WHERE UsuarioID = ? AND Rol <> 'administrador'");
        $stmtUpdRol->bind_param('si', $rolCalculadoBD, $usuario['UsuarioID']);
        $stmtUpdRol->execute();
        $stmtUpdRol->close();
        $usuario['Rol'] = strtolower($rolCalculadoBD);
    }
}

$_SESSION['session_token'] = $sessionToken;
sync_session_user($usuario, $correo);

$conexion->close();
header('Location: ../temas.php');
exit;
