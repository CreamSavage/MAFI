<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: ../temas.php');
    exit;
}

$num1 = random_int(1, 9);
$num2 = random_int(1, 9);
$_SESSION['captcha_answer'] = $num1 + $num2;

mafi_page_start('Inicio de Sesión - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop" style="background-image: url('<?php echo e(app_path('img/alas.jpg')); ?>');">
    <div class="login-card">
        <h2 class="auth-title text-center">Iniciar Sesión</h2>

        <?php if (isset($_GET['error'])):
            $errorMsg = (string) $_GET['error'];
            $isCaptcha = str_contains($errorMsg, 'Captcha');
            $isSession = str_contains($errorMsg, 'otro dispositivo');
            $alertClass = $isCaptcha ? 'alert-warning' : ($isSession ? 'alert-info' : 'alert-danger');
        ?>
            <div class="alert <?php echo $alertClass; ?>" role="alert">
                <?php if ($isCaptcha): ?><i class="fas fa-exclamation-triangle me-1"></i><?php endif; ?>
                <?php if ($isSession): ?><i class="fas fa-info-circle me-1"></i><?php endif; ?>
                <?php echo e($errorMsg); ?>
            </div>
            <?php if (str_contains($errorMsg, 'verificada')): ?>
                <div class="text-center mb-3">
                    <a href="reenviar_verificacion.php" class="auth-link small">Reenviar correo de verificación</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="procesar_inicio.php" method="POST">
            <?php echo csrf_field(); ?>

            <div class="form-floating mb-3">
                <input type="email" id="correo" name="correo_electronico" class="form-control" placeholder="Correo Electrónico" required>
                <label for="correo">Correo Electrónico</label>
            </div>

            <div class="form-floating mb-3 password-container">
                <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
                <label for="contrasena">Contraseña</label>
                <i class="fas fa-eye toggle-password" data-toggle-password="contrasena" role="button" aria-label="Mostrar u ocultar contraseña"></i>
            </div>

            <div class="mb-3">
                <label for="captcha" class="form-label fw-bold">Verificación de seguridad</label>
                <div class="input-group">
                    <span class="input-group-text fw-bold text-primary"><?php echo $num1 . ' + ' . $num2 . ' = ?'; ?></span>
                    <input type="number" class="form-control" id="captcha" name="captcha" placeholder="Ingresa el resultado" required>
                </div>
                <small class="text-muted">Por favor, resuelve la operación matemática para continuar.</small>
            </div>

            <div class="pt-1 mb-3">
                <button class="btn btn-gold-solid btn-lg w-100" type="submit">Acceder</button>
            </div>

            <p class="small mb-2"><a class="text-muted text-decoration-none" href="olvide_contrasena.php">¿Olvidaste tu contraseña?</a></p>
            <p class="mb-0">¿No tienes una cuenta? <a class="auth-link" href="registro.php">Regístrate aquí</a></p>
        </form>
    </div>
</div>

<script async src="https://www.googletagmanager.com/gtag/js?id=G-51W4CKLTNL"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag() { dataLayer.push(arguments); }
gtag('js', new Date());
gtag('config', 'G-51W4CKLTNL');
</script>
<?php
mafi_page_end();
