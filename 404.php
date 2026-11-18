<?php
http_response_code(404);
require_once __DIR__ . '/includes/layout.php';
$hasSession = !empty($_SESSION['loggedin']);
mafi_page_start('Página no encontrada (404) - Sistema MAFI', [
    'showHeader' => $hasSession,
    'showFooter' => true,
]);
?>
<div class="container my-5 py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card card-elevated text-center p-4 p-md-5">
                <div class="mb-3" style="font-size: 3.5rem; color: var(--unam-oro);">
                    <i class="fas fa-compass"></i>
                </div>
                <div class="fw-bold text-uppercase small mb-1" style="color: var(--unam-oro-oscuro); letter-spacing: 1px;">Error 404</div>
                <h1 class="h3 fw-bold mb-3" style="color: var(--unam-azul);">Página no encontrada</h1>
                <p class="text-muted mb-4">La ruta o recurso que buscas no existe o fue movido dentro del Sistema MAFI.</p>
                <div class="d-flex justify-content-center gap-2 flex-wrap">
                    <a href="<?php echo e(app_path($hasSession ? 'temas.php' : 'Login/inicio_sesion.php')); ?>" class="btn btn-unam-primary">
                        <i class="fas fa-home me-2"></i><?php echo $hasSession ? 'Volver al Inicio' : 'Ir a Iniciar Sesión'; ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
