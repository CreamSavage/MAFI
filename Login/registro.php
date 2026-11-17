<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

$num1 = random_int(1, 9);
$num2 = random_int(1, 9);
$_SESSION['captcha_answer'] = $num1 + $num2;

mafi_page_start('Registro de Usuario - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="auth-backdrop" style="background-image: url('<?php echo e(app_path('img/Banner_Biblioteca.jpg')); ?>');">
    <div class="register-card">
        <h2 class="auth-title text-center">Crear una Cuenta</h2>

        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
        <?php endif; ?>

        <form action="procesar_registro.php" method="POST" id="registroForm">
            <?php echo csrf_field(); ?>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Nombre(s)" required>
                        <label for="nombres">Nombre(s)</label>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <div class="form-floating">
                        <input type="text" id="apellido_paterno" name="apellido_paterno" class="form-control" placeholder="Apellido Paterno" required>
                        <label for="apellido_paterno">Apellido Paterno</label>
                    </div>
                </div>
            </div>

            <div class="form-floating mb-3">
                <input type="text" id="apellido_materno" name="apellido_materno" class="form-control" placeholder="Apellido Materno" required>
                <label for="apellido_materno">Apellido Materno</label>
            </div>

            <div class="form-floating mb-3">
                <input type="email" id="correo" name="correo_electronico" class="form-control" placeholder="Correo Electrónico" required>
                <label for="correo">Correo Electrónico</label>
            </div>

            <div class="form-floating mb-2 password-container">
                <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Contraseña" required>
                <label for="contrasena">Contraseña</label>
                <i class="fas fa-eye toggle-password" data-toggle-password="contrasena" role="button" aria-label="Mostrar u ocultar contraseña"></i>
            </div>
            <small class="form-text text-muted d-block text-start mb-3">Mínimo 8 caracteres, una mayúscula, minúscula, número y carácter especial.</small>

            <div class="form-floating mb-3">
                <input type="text" id="clave_acceso" name="clave_acceso" class="form-control" placeholder="Código de Acceso" required>
                <label for="clave_acceso">Código de Acceso</label>
            </div>

            <hr class="my-3">

            <div class="mb-3">
                <label for="captcha" class="form-label fw-bold">Verificación de seguridad</label>
                <div class="input-group">
                    <span class="input-group-text fw-bold text-primary"><?php echo $num1 . ' + ' . $num2 . ' = ?'; ?></span>
                    <input type="number" class="form-control" id="captcha" name="captcha" placeholder="Ingresa el resultado" required>
                </div>
                <small class="text-muted">Por favor, resuelve la operación matemática para continuar.</small>
            </div>

            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox" id="terminos" name="terminos" required>
                <label class="form-check-label" for="terminos">
                    Acepto los <a class="auth-link" href="aviso_privacidad.php" target="_blank">Términos y Condiciones y la Política de Privacidad</a>.
                </label>
            </div>

            <button type="submit" class="btn btn-gold-solid btn-lg w-100 mb-3 fw-bold">Registrarse</button>

            <div class="text-center">
                <p class="mb-0">¿Ya tienes una cuenta? <a class="auth-link" href="inicio_sesion.php">Inicia sesión aquí</a>.</p>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const cleanAlpha = (e) => {
        e.target.value = e.target.value.replace(/[^a-zA-ZÁÉÍÓÚÜÑáéíóúüñ\s]/g, '');
    };
    ['nombres', 'apellido_paterno', 'apellido_materno'].forEach((id) => {
        document.getElementById(id)?.addEventListener('input', cleanAlpha);
    });
});
</script>
<?php
mafi_page_end();
