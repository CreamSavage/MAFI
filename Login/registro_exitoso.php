<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

mafi_page_start('Registro Exitoso - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop">
    <div class="auth-card text-center">
        <div class="text-success mb-3" style="font-size: 3.75rem;"><i class="fas fa-check-circle"></i></div>
        <h1 class="auth-title h3">¡Registro Completado!</h1>
        <p class="text-muted mb-4">
            Tu cuenta ha sido activada correctamente.<br>
            Ya puedes comenzar a usar el Sistema MAFI.
        </p>
        <a href="inicio_sesion.php" class="btn btn-unam-primary px-4 py-2">
            <i class="fas fa-sign-in-alt me-2"></i>Ir a Inicio de Sesión
        </a>
    </div>
</div>
<?php
mafi_page_end();
