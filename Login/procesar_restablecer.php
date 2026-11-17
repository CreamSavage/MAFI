<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inicio_sesion.php');
    exit;
}

$token = trim((string) ($_POST['token'] ?? ''));
if (!verify_csrf()) {
    header('Location: restablecer_contrasena.php?token=' . urlencode($token) . '&error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

$nuevaContrasena = trim((string) ($_POST['nueva_contrasena'] ?? ''));
$confirmarContrasena = trim((string) ($_POST['confirmar_contrasena'] ?? ''));

if ($nuevaContrasena === '' || $confirmarContrasena === '') {
    header('Location: restablecer_contrasena.php?token=' . urlencode($token) . '&error=' . urlencode('Ambos campos son obligatorios.'));
    exit;
}

if ($nuevaContrasena !== $confirmarContrasena) {
    header('Location: restablecer_contrasena.php?token=' . urlencode($token) . '&error=' . urlencode('Las contraseñas no coinciden.'));
    exit;
}

if (($errPass = validar_fortaleza_contrasena($nuevaContrasena)) !== null) {
    header('Location: restablecer_contrasena.php?token=' . urlencode($token) . '&error=' . urlencode($errPass));
    exit;
}

$stmt = $conexion->prepare('SELECT UsuarioID FROM usuarios WHERE ResetToken = ? AND ResetTokenExpiry > NOW()');
$stmt->bind_param('s', $token);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    $stmt->close();

    $contrasenaCifrada = password_hash($nuevaContrasena, PASSWORD_BCRYPT);
    $stmtUpd = $conexion->prepare('UPDATE usuarios SET Contrasena = ?, ResetToken = NULL, ResetTokenExpiry = NULL WHERE UsuarioID = ?');
    $stmtUpd->bind_param('si', $contrasenaCifrada, $usuario['UsuarioID']);

    if ($stmtUpd->execute()) {
        $stmtUpd->close();
        header('Location: inicio_sesion.php?success=' . urlencode('Tu contraseña ha sido actualizada con éxito. Ya puedes iniciar sesión.'));
        exit;
    }
    $stmtUpd->close();
    header('Location: restablecer_contrasena.php?token=' . urlencode($token) . '&error=' . urlencode('Hubo un error al actualizar tu contraseña.'));
    exit;
}

$stmt->close();
header('Location: olvide_contrasena.php?error=' . urlencode('El enlace de restablecimiento es inválido o ha expirado. Por favor, solicita uno nuevo.'));
exit;
