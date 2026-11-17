<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/layout.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$stmt = $conexion->prepare('SELECT Tema, TamanoFuente, NotificarAnuncios, NotificarComentarios FROM usuarios WHERE UsuarioID = ?');
$stmt->bind_param('i', $usuarioID);
$stmt->execute();
$config = $stmt->get_result()->fetch_assoc();
$stmt->close();

mafi_page_start('Configuración de la Cuenta - MAFI');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            <a href="mi_perfil.php" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver a Mi Perfil</a>
            <h1 class="page-title-unam">Configuración</h1>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
            <?php endif; ?>

            <div class="card card-elevated mb-4">
                <div class="card-body p-4">
                    <h5 class="card-title mb-3 fw-bold" style="color: var(--unam-azul);">
                        <i class="fas fa-palette me-2" style="color: var(--unam-oro);"></i>Apariencia y Accesibilidad
                    </h5>
                    <p class="text-muted small mb-4">Personaliza el tema visual y el tamaño de lectura del sistema MAFI. Tus preferencias se guardan en tu cuenta.</p>
                    <form action="procesar_configuracion.php" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="accion" value="actualizar_apariencia">

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="tema" class="form-label fw-semibold">Tema de Interfaz</label>
                                <select class="form-select" id="tema" name="tema">
                                    <option value="claro" <?php echo (($config['Tema'] ?? 'claro') === 'claro') ? 'selected' : ''; ?>>Claro institucional (UNAM)</option>
                                    <option value="oscuro" <?php echo (($config['Tema'] ?? 'claro') === 'oscuro') ? 'selected' : ''; ?>>Oscuro nocturno (UNAM Dark)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tamano_fuente" class="form-label fw-semibold">Tamaño de Fuente</label>
                                <select class="form-select" id="tamano_fuente" name="tamano_fuente">
                                    <option value="normal" <?php echo (($config['TamanoFuente'] ?? 'normal') === 'normal') ? 'selected' : ''; ?>>Normal (100%)</option>
                                    <option value="grande" <?php echo (($config['TamanoFuente'] ?? 'normal') === 'grande') ? 'selected' : ''; ?>>Grande (110%)</option>
                                    <option value="extra-grande" <?php echo (($config['TamanoFuente'] ?? 'normal') === 'extra-grande') ? 'selected' : ''; ?>>Extra grande (120%)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-unam-primary">
                            <i class="fas fa-save me-1"></i>Guardar Apariencia
                        </button>
                    </form>
                </div>
            </div>

            <div class="card card-elevated">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-bold" style="color: var(--unam-azul);">
                        <i class="fas fa-bell me-2" style="color: var(--unam-oro);"></i>Preferencias de Notificación por Correo
                    </h5>
                    <form action="procesar_configuracion.php" method="POST">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="accion" value="actualizar_notificaciones">

                        <div class="form-check form-switch mb-3 fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" id="notif_anuncios" name="notif_anuncios" <?php echo !empty($config['NotificarAnuncios']) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="notif_anuncios">Cuando un profesor publica un anuncio (como alumno).</label>
                        </div>

                        <div class="form-check form-switch mb-4 fs-5">
                            <input class="form-check-input" type="checkbox" role="switch" id="notif_comentarios" name="notif_comentarios" <?php echo !empty($config['NotificarComentarios']) ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="notif_comentarios">Cuando un alumno comenta mi anuncio (como profesor).</label>
                        </div>

                        <button type="submit" class="btn btn-unam-primary">Guardar Preferencias</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
