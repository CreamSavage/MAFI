<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

mafi_page_start('Revisa tu Correo - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop">
    <div class="auth-card text-center">
        <div class="mb-3" style="font-size: 3.5rem; color: var(--unam-azul);"><i class="fas fa-envelope-open-text"></i></div>
        <h1 class="auth-title h3">¡Casi Listo!</h1>
        <p class="text-muted mb-4">
            Te hemos enviado un correo de verificación.<br>
            Por favor, revisa tu bandeja de entrada y haz clic en el enlace para activar tu cuenta.
        </p>
        <div class="my-4">
            <div class="spinner-border text-primary" role="status" aria-hidden="true"></div>
            <p class="text-muted small mt-3 mb-0"><i class="fas fa-clock me-1"></i>Esperando verificación...</p>
        </div>
        <a href="reenviar_verificacion.php" class="auth-link small">¿No recibiste el correo? Reenviar enlace</a>
    </div>
</div>

<script>
setInterval(async () => {
    try {
        const res = await fetch('verificar_estado.php');
        const data = await res.json();
        if (data.status === 'verificado') {
            window.location.href = 'inicio_sesion.php?success=' + encodeURIComponent('Tu cuenta ha sido verificada. ¡Ya puedes iniciar sesión!');
        }
    } catch (_) {}
}, 5000);
</script>
<?php
mafi_page_end();
