<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/layout.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);

if (!isset($_GET['clase_id']) || !is_numeric($_GET['clase_id'])) {
    header('Location: gestion_clases.php?error=' . urlencode('Clase no válida.'));
    exit;
}
$claseID = (int) $_GET['clase_id'];

$sqlCheck = "SELECT C.Materia, C.Grupo, C.CreadorID, I.EstadoInscripcion
             FROM inscripciones I
             JOIN clases C ON I.ClaseID = C.ClaseID
             WHERE I.UsuarioID = ? AND I.ClaseID = ?";
$stmtCheck = $conexion->prepare($sqlCheck);
$stmtCheck->bind_param('ii', $usuarioID, $claseID);
$stmtCheck->execute();
$clase = $stmtCheck->get_result()->fetch_assoc();
$stmtCheck->close();

if (!$clase) {
    header('Location: gestion_clases.php?error=' . urlencode('No tienes permiso para ver esta clase.'));
    exit;
}

$esProfesor = ((int) $clase['CreadorID'] === $usuarioID);
$estaPendiente = ($clase['EstadoInscripcion'] === 'pendiente');

$stmtVisto = $conexion->prepare('UPDATE inscripciones SET UltimaVezVisto = NOW() WHERE UsuarioID = ? AND ClaseID = ?');
$stmtVisto->bind_param('ii', $usuarioID, $claseID);
$stmtVisto->execute();
$stmtVisto->close();

$listaAnuncios = [];
$comentariosPorAnuncio = [];
$profesor = null;
$listaAlumnos = [];

if (!$estaPendiente) {
    $sqlAnuncios = "SELECT A.AnuncioID, A.Contenido, A.FechaPublicacion, U.Nombres, U.ApellidoPaterno
                    FROM anuncios A
                    JOIN usuarios U ON A.UsuarioID = U.UsuarioID
                    WHERE A.ClaseID = ?
                    ORDER BY A.FechaPublicacion DESC";
    $stmtAnuncios = $conexion->prepare($sqlAnuncios);
    $stmtAnuncios->bind_param('i', $claseID);
    $stmtAnuncios->execute();
    $listaAnuncios = $stmtAnuncios->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmtAnuncios->close();

    $sqlComentarios = "SELECT C.AnuncioID, C.Contenido, C.FechaComentario, U.Nombres, U.ApellidoPaterno
                       FROM comentarios C
                       JOIN anuncios A ON C.AnuncioID = A.AnuncioID
                       JOIN usuarios U ON C.UsuarioID = U.UsuarioID
                       WHERE A.ClaseID = ?
                       ORDER BY C.FechaComentario ASC";
    $stmtComentarios = $conexion->prepare($sqlComentarios);
    $stmtComentarios->bind_param('i', $claseID);
    $stmtComentarios->execute();
    $resComentarios = $stmtComentarios->get_result();
    while ($com = $resComentarios->fetch_assoc()) {
        $comentariosPorAnuncio[(int) $com['AnuncioID']][] = $com;
    }
    $stmtComentarios->close();

    $sqlProfesor = "SELECT U.Nombres, U.ApellidoPaterno, U.ApellidoMaterno, U.UltimaConexion
                    FROM usuarios U
                    JOIN clases C ON U.UsuarioID = C.CreadorID
                    WHERE C.ClaseID = ?";
    $stmtProfesor = $conexion->prepare($sqlProfesor);
    $stmtProfesor->bind_param('i', $claseID);
    $stmtProfesor->execute();
    $profesor = $stmtProfesor->get_result()->fetch_assoc();
    $stmtProfesor->close();

    $sqlAlumnos = "SELECT U.Nombres, U.ApellidoPaterno, U.ApellidoMaterno, U.UltimaConexion
                   FROM inscripciones I
                   JOIN usuarios U ON I.UsuarioID = U.UsuarioID
                   WHERE I.ClaseID = ? AND I.EstadoInscripcion = 'alumno'
                   ORDER BY U.ApellidoPaterno ASC, U.ApellidoMaterno ASC, U.Nombres ASC";
    $stmtAlumnos = $conexion->prepare($sqlAlumnos);
    $stmtAlumnos->bind_param('i', $claseID);
    $stmtAlumnos->execute();
    $listaAlumnos = $stmtAlumnos->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmtAlumnos->close();
}

mafi_page_start('Clase: ' . $clase['Materia'] . ' - MAFI');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-9 col-lg-8 mx-auto">
            <a href="gestion_clases.php" class="btn btn-outline-secondary mb-4"><i class="fas fa-arrow-left me-2"></i>Volver a Mis Clases</a>

            <h1 class="page-title-left"><?php echo e($clase['Materia']); ?> - <?php echo e($clase['Grupo']); ?></h1>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
            <?php endif; ?>

            <?php if ($estaPendiente): ?>
                <div class="alert alert-warning text-center">
                    Tu solicitud para unirte a esta clase está pendiente de aprobación por el profesor.
                </div>
            <?php else: ?>
                <ul class="nav nav-tabs nav-fill mb-4" id="claseTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="tablon-tab" data-bs-toggle="tab" data-bs-target="#tablon" type="button" role="tab" aria-controls="tablon" aria-selected="true">Tablón</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="personas-tab" data-bs-toggle="tab" data-bs-target="#personas" type="button" role="tab" aria-controls="personas" aria-selected="false">Personas</button>
                    </li>
                </ul>

                <div class="tab-content" id="claseTabContent">
                    <div class="tab-pane fade show active" id="tablon" role="tabpanel" aria-labelledby="tablon-tab">
                        <?php if ($esProfesor): ?>
                            <div class="card card-elevated mb-4">
                                <div class="card-body">
                                    <form action="procesar_tablon.php" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="accion" value="crear_anuncio">
                                        <input type="hidden" name="clase_id" value="<?php echo $claseID; ?>">
                                        <div class="mb-3">
                                            <textarea class="form-control" name="contenido" rows="3" placeholder="Publica un anuncio para tu clase..." required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-unam-primary">Publicar</button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($listaAnuncios)): ?>
                            <?php foreach ($listaAnuncios as $anuncio): ?>
                                <?php $comentarios = $comentariosPorAnuncio[(int) $anuncio['AnuncioID']] ?? []; ?>
                                <div class="card anuncio-card mb-4">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="anuncio-avatar me-3">
                                                <i class="fas fa-bullhorn"></i>
                                            </div>
                                            <div>
                                                <span class="fw-bold"><?php echo e($anuncio['Nombres'] . ' ' . $anuncio['ApellidoPaterno']); ?></span>
                                                <small class="text-muted d-block"><?php echo e(date_format(date_create($anuncio['FechaPublicacion']), 'd/m/Y h:i A')); ?></small>
                                            </div>
                                        </div>
                                        <p class="card-text" style="white-space: pre-wrap;"><?php echo e($anuncio['Contenido']); ?></p>

                                        <hr>

                                        <h6 class="ms-1 mb-3">Comentarios de la clase</h6>
                                        <?php if (!empty($comentarios)): ?>
                                            <?php foreach ($comentarios as $comentario): ?>
                                                <div class="comentario-box mb-2">
                                                    <span class="comentario-autor"><?php echo e($comentario['Nombres'] . ' ' . $comentario['ApellidoPaterno']); ?></span>
                                                    <small class="text-muted float-end"><?php echo e(date_format(date_create($comentario['FechaComentario']), 'h:i A')); ?></small>
                                                    <p class="mb-0 small"><?php echo e($comentario['Contenido']); ?></p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="small text-muted text-center">Aún no hay comentarios.</p>
                                        <?php endif; ?>

                                        <form action="procesar_tablon.php" method="POST" class="mt-3">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="accion" value="crear_comentario">
                                            <input type="hidden" name="clase_id" value="<?php echo $claseID; ?>">
                                            <input type="hidden" name="anuncio_id" value="<?php echo (int) $anuncio['AnuncioID']; ?>">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm" name="contenido" placeholder="Añadir un comentario..." required>
                                                <button type="submit" class="btn btn-gold-solid btn-sm">Comentar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="card card-body text-center text-muted shadow-sm">
                                <p class="mb-0">Aún no hay anuncios en esta clase.</p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="tab-pane fade" id="personas" role="tabpanel" aria-labelledby="personas-tab">
                        <div class="card card-elevated lista-personas">
                            <div class="card-body">
                                <h4 class="mb-3">Profesor</h4>
                                <?php if ($profesor): ?>
                                    <ul class="list-group list-group-flush mb-4">
                                        <li class="list-group-item">
                                            <span class="nombre-usuario text-primary"><?php echo e($profesor['Nombres'] . ' ' . $profesor['ApellidoPaterno'] . ' ' . $profesor['ApellidoMaterno']); ?></span>
                                            <span class="ultima-conexion">
                                                <?php if ($profesor['UltimaConexion']): ?>
                                                    <?php echo e(date_format(date_create($profesor['UltimaConexion']), 'd/m/Y h:i A')); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">Nunca se ha conectado</span>
                                                <?php endif; ?>
                                            </span>
                                        </li>
                                    </ul>
                                <?php endif; ?>

                                <h4 class="mb-3">Alumnos (<?php echo count($listaAlumnos); ?>)</h4>
                                <ul class="list-group list-group-flush">
                                    <?php if (!empty($listaAlumnos)): ?>
                                        <?php foreach ($listaAlumnos as $alumno): ?>
                                            <li class="list-group-item">
                                                <span class="nombre-usuario"><?php echo e($alumno['ApellidoPaterno'] . ' ' . $alumno['ApellidoMaterno'] . ' ' . $alumno['Nombres']); ?></span>
                                                <span class="ultima-conexion">
                                                    <?php if ($alumno['UltimaConexion']): ?>
                                                        <?php echo e(date_format(date_create($alumno['UltimaConexion']), 'd/m/Y h:i A')); ?>
                                                    <?php else: ?>
                                                        <span class="text-muted">Nunca se ha conectado</span>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <li class="list-group-item text-muted">Aún no hay alumnos en esta clase.</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
