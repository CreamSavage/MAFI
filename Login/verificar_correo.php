<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';
require_once __DIR__ . '/../conexion.php';

if (!isset($_GET['token'])) {
    header('Location: inicio_sesion.php');
    exit;
}

$token = trim((string) $_GET['token']);
$stmt = $conexion->prepare("SELECT UsuarioID, AccesoID FROM usuarios WHERE TokenVerificacion = ? AND Estado = 'pendiente'");
$stmt->bind_param('s', $token);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    $usuario = $resultado->fetch_assoc();
    $stmt->close();

    $conexion->begin_transaction();
    try {
        $stmtUser = $conexion->prepare("UPDATE usuarios SET Estado = 'verificado', TokenVerificacion = NULL WHERE UsuarioID = ?");
        $stmtUser->bind_param('i', $usuario['UsuarioID']);
        $stmtUser->execute();
        $stmtUser->close();

        $stmtAcceso = $conexion->prepare('UPDATE accesos SET Usado = 1, FechaUso = NOW() WHERE AccesoID = ?');
        $stmtAcceso->bind_param('i', $usuario['AccesoID']);
        $stmtAcceso->execute();
        $stmtAcceso->close();

        $conexion->commit();
        header('Location: registro_exitoso.php');
        exit;
    } catch (mysqli_sql_exception $ex) {
        $conexion->rollback();
        $errorVerif = 'Ocurrió un problema al activar tu cuenta. Por favor intenta nuevamente.';
    }
} else {
    $stmt->close();
    $errorVerif = 'El enlace de verificación es incorrecto, ha expirado o tu cuenta ya ha sido activada.';
}

mafi_page_start('Verificación de Cuenta - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop">
    <div class="auth-card text-center">
        <div class="text-danger mb-3" style="font-size: 3.5rem;"><i class="fas fa-exclamation-triangle"></i></div>
        <h1 class="auth-title h3">Enlace no válido</h1>
        <p class="text-muted mb-4"><?php echo e($errorVerif); ?></p>
        <a href="inicio_sesion.php" class="btn btn-unam-primary px-4 py-2">
            <i class="fas fa-home me-2"></i>Volver a Inicio de Sesión
        </a>
    </div>
</div>
<?php
mafi_page_end();
