<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

mafi_page_start('Reenviar Verificación - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop">
    <div class="auth-card">
        <h2 class="auth-title text-center">Reenviar Verificación</h2>
        <p class="text-muted text-center mb-4">Ingresa tu correo electrónico y te enviaremos un nuevo enlace de activación.</p>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert"><i class="fas fa-exclamation-circle me-2"></i><?php echo e($_GET['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert"><i class="fas fa-check-circle me-2"></i><?php echo e($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="procesar_reenvio.php" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="correo" name="correo_electronico" placeholder="nombre@ejemplo.com" required>
                <label for="correo">Correo Electrónico Registrado</label>
            </div>
            <button type="submit" class="btn btn-unam-primary w-100 py-2">
                <i class="fas fa-paper-plane me-2"></i>Enviar Nuevo Enlace
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="inicio_sesion.php" class="auth-link"><i class="fas fa-arrow-left me-1"></i>Volver a Inicio de Sesión</a>
        </div>
    </div>
</div>
<?php
mafi_page_end();
