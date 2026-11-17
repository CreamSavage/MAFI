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

            <div class="card card-elevated">
                <div class="card-body p-4">
                    <h5 class="card-title mb-4 fw-bold" style="color: var(--unam-azul);">Preferencias de Notificación por Correo</h5>
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
