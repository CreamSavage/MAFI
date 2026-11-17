<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/layout.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$stmt = $conexion->prepare('SELECT Nombres, ApellidoPaterno, ApellidoMaterno, CorreoElectronico FROM usuarios WHERE UsuarioID = ?');
$stmt->bind_param('i', $usuarioID);
$stmt->execute();
$usuario = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$usuario) {
    header('Location: ' . app_path('Login/logout.php'));
    exit;
}

$rolActual = strtolower((string) ($_SESSION['usuario_rol'] ?? 'usuario'));
$mapRolPerfil = [
    'administrador' => ['bg-warning text-dark', 'Administrador'],
    'profesor'      => ['bg-success text-white', 'Profesor'],
    'alumno'        => ['bg-info text-dark', 'Alumno'],
    'usuario'       => ['bg-secondary text-white', 'Usuario'],
];
[$clasePerfil, $textoPerfil] = $mapRolPerfil[$rolActual] ?? $mapRolPerfil['usuario'];

$tabSolicitada = (string) ($_GET['tab'] ?? 'info');
$activeTab = in_array($tabSolicitada, ['info', 'seguridad', 'peligro'], true) ? $tabSolicitada : 'info';

mafi_page_start('Mi Perfil - MAFI');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <a href="<?php echo e(app_path('temas.php')); ?>" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Inicio</a>
            <h1 class="page-title-unam mb-2">Mi Perfil</h1>
            <div class="text-center mb-4">
                <span class="badge <?php echo e($clasePerfil); ?> px-3 py-2" style="font-size: 0.85rem;">Rol: <?php echo e($textoPerfil); ?></span>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
            <?php endif; ?>

            <ul class="nav nav-tabs mb-4" id="perfilTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo $activeTab === 'info' ? 'active' : ''; ?>" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="<?php echo $activeTab === 'info' ? 'true' : 'false'; ?>">Información Personal</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link <?php echo $activeTab === 'seguridad' ? 'active' : ''; ?>" id="seguridad-tab" data-bs-toggle="tab" data-bs-target="#seguridad" type="button" role="tab" aria-controls="seguridad" aria-selected="<?php echo $activeTab === 'seguridad' ? 'true' : 'false'; ?>">Seguridad</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link danger-tab <?php echo $activeTab === 'peligro' ? 'active' : ''; ?>" id="peligro-tab" data-bs-toggle="tab" data-bs-target="#peligro" type="button" role="tab" aria-controls="peligro" aria-selected="<?php echo $activeTab === 'peligro' ? 'true' : 'false'; ?>">Eliminar cuenta</button>
                </li>
            </ul>

            <div class="tab-content" id="perfilTabContent">
                <div class="tab-pane fade <?php echo $activeTab === 'info' ? 'show active' : ''; ?>" id="info" role="tabpanel" aria-labelledby="info-tab">
                    <div class="card card-elevated">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 fw-bold" style="color: var(--unam-azul);">Editar Información Personal</h5>
                            <form action="procesar_perfil.php" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="actualizar_info">

                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correo" value="<?php echo e($usuario['CorreoElectronico']); ?>" disabled readonly>
                                    <small class="form-text text-muted">El correo electrónico no se puede modificar.</small>
                                </div>

                                <div class="mb-3">
                                    <label for="nombres" class="form-label">Nombre(s)</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo e($usuario['Nombres']); ?>" required pattern="[A-Za-zÁÉÍÓÚÜáéíóúüÑñ\s]+">
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                                        <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="<?php echo e($usuario['ApellidoPaterno']); ?>" required pattern="[A-Za-zÁÉÍÓÚÜáéíóúüÑñ\s]+">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="apellido_materno" class="form-label">Apellido Materno</label>
                                        <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="<?php echo e($usuario['ApellidoMaterno']); ?>" required pattern="[A-Za-zÁÉÍÓÚÜáéíóúüÑñ\s]+">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-unam-primary">Guardar Cambios</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php echo $activeTab === 'seguridad' ? 'show active' : ''; ?>" id="seguridad" role="tabpanel" aria-labelledby="seguridad-tab">
                    <div class="card card-elevated">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4 fw-bold" style="color: var(--unam-azul);">Cambiar Contraseña</h5>
                            <form action="procesar_perfil.php" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="cambiar_contrasena">

                                <div class="mb-3">
                                    <label for="pass_actual" class="form-label">Contraseña Actual</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="pass_actual" name="pass_actual" required>
                                        <i class="fas fa-eye toggle-password" data-toggle-password="pass_actual" role="button" aria-label="Mostrar u ocultar contraseña actual"></i>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="pass_nueva" class="form-label">Nueva Contraseña</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="pass_nueva" name="pass_nueva" required>
                                        <i class="fas fa-eye toggle-password" data-toggle-password="pass_nueva" role="button" aria-label="Mostrar u ocultar nueva contraseña"></i>
                                    </div>
                                    <small class="form-text text-muted">Mínimo 8 caracteres, una mayúscula, minúscula, número y carácter especial.</small>
                                </div>
                                <div class="mb-4">
                                    <label for="pass_confirmar" class="form-label">Confirmar Nueva Contraseña</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="pass_confirmar" name="pass_confirmar" required>
                                        <i class="fas fa-eye toggle-password" data-toggle-password="pass_confirmar" role="button" aria-label="Mostrar u ocultar confirmación"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-gold-solid">Cambiar Contraseña</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade <?php echo $activeTab === 'peligro' ? 'show active' : ''; ?>" id="peligro" role="tabpanel" aria-labelledby="peligro-tab">
                    <div class="card card-elevated border-danger">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">Eliminar Cuenta Permanentemente</h5>
                        </div>
                        <div class="card-body p-4">
                            <p class="text-danger fw-bold">¡Acción irreversible!</p>
                            <p>Se borrarán todos sus datos, comentarios, anuncios e inscripciones. Si eres profesor, debes eliminar tus clases manualmente primero.</p>

                            <form action="procesar_perfil.php" method="POST" onsubmit="return confirm('¿Estás absolutamente seguro?\n\nEsta acción borrará tu cuenta de forma permanente y no se puede deshacer.');">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="eliminar_cuenta">

                                <div class="mb-3">
                                    <label for="pass_eliminar" class="form-label">Para confirmar, ingresa tu contraseña actual:</label>
                                    <div class="password-container">
                                        <input type="password" class="form-control" id="pass_eliminar" name="pass_eliminar" required>
                                        <i class="fas fa-eye toggle-password" data-toggle-password="pass_eliminar" role="button" aria-label="Mostrar u ocultar contraseña"></i>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-danger w-100 fw-semibold">Eliminar Mi Cuenta Permanentemente</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
