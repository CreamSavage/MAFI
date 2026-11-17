<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/mailer.php';
require_once __DIR__ . '/../conexion.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: reenviar_verificacion.php');
    exit;
}

if (!verify_csrf()) {
    header('Location: reenviar_verificacion.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

$correo = trim((string) ($_POST['correo_electronico'] ?? ''));
if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: reenviar_verificacion.php?error=' . urlencode('Por favor, ingresa un correo válido.'));
    exit;
}

$stmt = $conexion->prepare("SELECT UsuarioID, Nombres FROM usuarios WHERE CorreoElectronico = ? AND Estado = 'pendiente'");
$stmt->bind_param('s', $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    $stmt->close();

    $token = bin2hex(random_bytes(16));
    $stmtUpd = $conexion->prepare('UPDATE usuarios SET TokenVerificacion = ? WHERE UsuarioID = ?');
    $stmtUpd->bind_param('si', $token, $usuario['UsuarioID']);

    if ($stmtUpd->execute()) {
        $stmtUpd->close();
        $verificationLink = base_url('Login/verificar_correo.php?token=' . urlencode($token));
        $cuerpo = 'Hola ' . e($usuario['Nombres']) . ',<br><br>Aquí tienes un nuevo enlace para activar tu cuenta. Por favor, haz clic en el siguiente enlace:<br><br>'
            . '<a href="' . e($verificationLink) . '" style="padding: 10px 15px; background-color: #002B7A; color: white; text-decoration: none; border-radius: 5px;">Activar mi cuenta</a>';

        if (mafi_enviar_correo($correo, $usuario['Nombres'], 'Nuevo Enlace de Activación - Sistema MAFI', $cuerpo)) {
            $_SESSION['usuario_pendiente_verificacion'] = $correo;
            header('Location: reenviar_verificacion.php?success=' . urlencode('Se ha enviado un nuevo enlace de verificación a tu correo.'));
            exit;
        }
        header('Location: reenviar_verificacion.php?error=' . urlencode('No se pudo reenviar el correo. Inténtalo más tarde.'));
        exit;
    }
    $stmtUpd->close();
} else {
    $stmt->close();
}

header('Location: reenviar_verificacion.php?success=' . urlencode('Si hay una cuenta pendiente asociada a ese correo, se ha enviado un nuevo enlace.'));
exit;
