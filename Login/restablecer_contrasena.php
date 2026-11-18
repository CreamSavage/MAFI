<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';
require_once __DIR__ . '/../conexion.php';

$token = trim((string) ($_GET['token'] ?? ''));
$tokenValido = false;

if ($token !== '') {
    $stmt = $conexion->prepare('SELECT UsuarioID FROM usuarios WHERE ResetToken = ? AND ResetTokenExpiry > NOW()');
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $tokenValido = ($stmt->get_result()->num_rows === 1);
    $stmt->close();
}

mafi_page_start('Restablecer Contraseña - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop" style="background-image: url('<?php echo e(app_path('img/alas.jpg')); ?>');">
    <div class="auth-card">
        <div class="auth-brand-header">
            <img src="<?php echo e(app_path('img/logo_fes.png?v=' . MAFI_ASSET_VERSION)); ?>" alt="Escudo FES Cuautitlán" class="auth-brand-logo">
            <div class="auth-brand-meta">
                <span class="auth-brand-kicker">UNAM · FES Cuautitlán</span>
                <span class="auth-brand-name">Sistema MAFI</span>
            </div>
        </div>
        <?php if (!$tokenValido): ?>
            <div class="text-center">
                <div class="text-danger mb-3" style="font-size: 3rem;"><i class="fas fa-exclamation-triangle"></i></div>
                <h2 class="auth-title">Enlace no válido</h2>
                <p class="text-muted mb-4">Este enlace de restablecimiento es incorrecto o ha expirado. Por favor, solicita uno nuevo.</p>
                <a href="olvide_contrasena.php" class="btn btn-unam-primary px-4">Solicitar nuevo enlace</a>
            </div>
        <?php else: ?>
            <h2 class="auth-title text-center">Crea una Nueva Contraseña</h2>
            <p class="text-muted text-center mb-4">Debe tener al menos 8 caracteres, mayúscula, minúscula, número y carácter especial.</p>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-triangle me-2"></i><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>

            <form action="procesar_restablecer.php" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="token" value="<?php echo e($token); ?>">

                <div class="mb-3">
                    <label for="nueva_contrasena" class="form-label fw-semibold">Nueva Contraseña</label>
                    <div class="password-container">
                        <input type="password" id="nueva_contrasena" name="nueva_contrasena" class="form-control" placeholder="Ingresa tu nueva contraseña" data-password-strength required>
                        <i class="fas fa-eye toggle-password" data-toggle-password="nueva_contrasena" role="button"></i>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="confirmar_contrasena" class="form-label fw-semibold">Confirmar Nueva Contraseña</label>
                    <div class="password-container">
                        <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" class="form-control" placeholder="Confirma tu nueva contraseña" data-password-confirm="nueva_contrasena" required>
                        <i class="fas fa-eye toggle-password" data-toggle-password="confirmar_contrasena" role="button"></i>
                    </div>
                </div>

                <button type="submit" class="btn btn-unam-primary w-100 py-2">
                    <i class="fas fa-key me-2"></i>Restablecer Contraseña
                </button>
            </form>
        <?php endif; ?>
    </div>
</div>
<?php
mafi_page_end();
