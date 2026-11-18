<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/mailer.php';
require_once __DIR__ . '/../conexion.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ../temas.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: inicio_sesion.php');
    exit;
}

if (!verify_csrf()) {
    header('Location: olvide_contrasena.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

if (!mafi_rate_limit('olvido_pass', 5, 600)) {
    header('Location: olvide_contrasena.php?error=' . urlencode('Has realizado demasiadas solicitudes. Por favor, espera unos minutos antes de intentar nuevamente.'));
    exit;
}

$correo = trim((string) ($_POST['correo_electronico'] ?? ''));
if ($correo === '' || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
    header('Location: olvide_contrasena.php?error=' . urlencode('Por favor, ingresa un correo electrónico válido.'));
    exit;
}

$stmt = $conexion->prepare("SELECT UsuarioID, Nombres FROM usuarios WHERE CorreoElectronico = ? AND Estado = 'verificado'");
$stmt->bind_param('s', $correo);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    $stmt->close();

    $token = bin2hex(random_bytes(32));
    $expira = date('Y-m-d H:i:s', time() + 3600);

    $stmtUpd = $conexion->prepare('UPDATE usuarios SET ResetToken = ?, ResetTokenExpiry = ? WHERE UsuarioID = ?');
    $stmtUpd->bind_param('ssi', $token, $expira, $usuario['UsuarioID']);

    if ($stmtUpd->execute()) {
        $stmtUpd->close();
        $resetLink = base_url('Login/restablecer_contrasena.php?token=' . urlencode($token));
        $cuerpo = 'Hola ' . e($usuario['Nombres']) . ',<br><br>Hemos recibido una solicitud para restablecer tu contraseña. Haz clic en el siguiente enlace para continuar:<br><br>'
            . '<a href="' . e($resetLink) . '" style="padding: 10px 15px; background-color: #002B7A; color: white; text-decoration: none; border-radius: 5px;">Restablecer Contraseña</a>'
            . '<br><br>Este enlace expirará en 1 hora. Si no solicitaste esto, puedes ignorar este correo.';

        $errMail = null;
        if (!mafi_enviar_correo($correo, $usuario['Nombres'], 'Recuperación de Contraseña - Sistema MAFI', $cuerpo, [], $errMail)) {
            error_log('MAFI procesar_olvido mail error: ' . (string) $errMail);
        }
    } else {
        $stmtUpd->close();
    }
} else {
    $stmt->close();
}

// Mensaje neutro uniforme para evitar enumeración de correos registrados
header('Location: olvide_contrasena.php?success=' . urlencode('Si existe una cuenta verificada con ese correo, recibirás un enlace de recuperación en breve.'));
exit;
