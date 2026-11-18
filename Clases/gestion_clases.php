<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/layout.php';

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$resultadosBusqueda = [];
$huboBusqueda = false;
$searchError = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['accion'] ?? '') === 'buscar') {
    if (!verify_csrf()) {
        $searchError = 'Sesión de formulario expirada. Intenta la búsqueda nuevamente.';
    } else {
        $huboBusqueda = true;
        $busqueda = '%' . trim((string) ($_POST['busqueda'] ?? '')) . '%';
        $sqlBuscar = "SELECT C.ClaseID, C.Carrera, C.Grupo, C.Materia, C.CreadorID, C.CodigoClase
                      FROM clases C
                      WHERE (Materia LIKE ? OR Grupo LIKE ?)
                      AND C.ClaseID NOT IN (SELECT ClaseID FROM inscripciones WHERE UsuarioID = ?)";
        $stmtBuscar = $conexion->prepare($sqlBuscar);
        $stmtBuscar->bind_param('ssi', $busqueda, $busqueda, $usuarioID);
        $stmtBuscar->execute();
        $resultadosBusqueda = $stmtBuscar->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmtBuscar->close();
    }
}

$sqlMisClases = "SELECT C.ClaseID, C.Materia, C.Grupo, C.Carrera, C.CodigoClase, C.CreadorID, C.ConteoAlumnos, I.EstadoInscripcion
                 FROM clases C
                 JOIN inscripciones I ON C.ClaseID = I.ClaseID
                 WHERE I.UsuarioID = ?";
$stmtMisClases = $conexion->prepare($sqlMisClases);
$stmtMisClases->bind_param('i', $usuarioID);
$stmtMisClases->execute();
$misClases = $stmtMisClases->get_result()->fetch_all(MYSQLI_ASSOC);
$stmtMisClases->close();

$rolActual = strtolower((string) ($_SESSION['usuario_rol'] ?? 'usuario'));
$mapRolClases = [
    'administrador' => ['bg-warning text-dark', 'Administrador'],
    'profesor'      => ['bg-success text-white', 'Profesor'],
    'alumno'        => ['bg-info text-dark', 'Alumno'],
    'usuario'       => ['bg-secondary text-white', 'Usuario'],
];
[$claseClases, $textoClases] = $mapRolClases[$rolActual] ?? ['bg-secondary text-white', ucfirst($rolActual)];

mafi_page_start('Gestionar Clases - MAFI');
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <a href="<?php echo e(app_path('temas.php')); ?>" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Inicio</a>
            <h1 class="page-title-unam mb-2">Gestión de Clases</h1>
            <div class="text-center mb-4">
                <span class="badge <?php echo e($claseClases); ?> px-3 py-2" style="font-size: 0.85rem;">Rol actual: <?php echo e($textoClases); ?></span>
            </div>

            <?php if ($searchError !== null): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($searchError); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
            <?php endif; ?>

            <div class="row g-4 g-lg-5">
                <div class="col-lg-7">
                    <div class="card card-elevated mb-4">
                        <div class="card-header card-header-azul">
                            <h4 class="mb-0">Mis Clases Actuales</h4>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($misClases)): ?>
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($misClases as $clase): ?>
                                        <li class="list-group-item clase-item-row">
                                            <div class="d-flex justify-content-between align-items-center gap-2 flex-wrap">
                                                <div>
                                                    <?php if ($clase['EstadoInscripcion'] === 'pendiente'): ?>
                                                        <span class="clase-link-pendiente" title="Esperando aprobación del profesor"><?php echo e($clase['Materia']); ?></span>
                                                    <?php else: ?>
                                                        <a href="ver_clase.php?clase_id=<?php echo (int) $clase['ClaseID']; ?>" class="clase-link"><?php echo e($clase['Materia']); ?></a>
                                                    <?php endif; ?>
                                                    <small class="text-muted d-block"><?php echo e($clase['Carrera']); ?> - Gpo: <?php echo e($clase['Grupo']); ?></small>
                                                </div>
                                                <div class="text-end d-flex align-items-center flex-shrink-0">
                                                    <?php if ($clase['EstadoInscripcion'] === 'profesor'): ?>
                                                        <span class="badge bg-primary rounded-pill">Profesor</span>
                                                        <span class="badge alumnos-count rounded-pill ms-1" title="Alumnos inscritos (sin contarte a ti)">
                                                            <i class="fas fa-users"></i> <?php echo (int) $clase['ConteoAlumnos']; ?>
                                                        </span>
                                                        <a href="gestionar_alumnos.php?clase_id=<?php echo (int) $clase['ClaseID']; ?>" class="btn btn-sm btn-outline-primary ms-2 btn-sm-custom">
                                                            Ver Alumnos
                                                        </a>
                                                        <form action="procesar_clase.php" method="POST" class="d-inline ms-1" data-confirm="¿Estás seguro de eliminar esta clase? Se borrarán todos los anuncios, comentarios y alumnos inscritos. Esta acción no se puede deshacer." data-confirm-title="Eliminar Clase">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="accion" value="eliminar_clase">
                                                            <input type="hidden" name="clase_id" value="<?php echo (int) $clase['ClaseID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-sm-custom" title="Eliminar Clase">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    <?php else: ?>
                                                        <?php if ($clase['EstadoInscripcion'] === 'alumno'): ?>
                                                            <span class="badge bg-secondary rounded-pill">Alumno</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-warning text-dark rounded-pill">Pendiente</span>
                                                        <?php endif; ?>
                                                        <form action="procesar_clase.php" method="POST" class="d-inline ms-2" data-confirm="¿Estás seguro de que quieres salir de esta clase?" data-confirm-title="Salir de la Clase">
                                                            <?php echo csrf_field(); ?>
                                                            <input type="hidden" name="accion" value="salir_clase">
                                                            <input type="hidden" name="clase_id" value="<?php echo (int) $clase['ClaseID']; ?>">
                                                            <button type="submit" class="btn btn-sm btn-outline-danger btn-sm-custom">Salir</button>
                                                        </form>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <?php if ($clase['EstadoInscripcion'] === 'profesor'): ?>
                                                <div class="mt-2">
                                                    Código para unirse: <span class="codigo-clase"><?php echo e($clase['CodigoClase']); ?></span>
                                                </div>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php else: ?>
                                <p class="text-center text-muted mb-0">Aún no te has inscrito a ninguna clase.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="card card-elevated">
                        <div class="card-header card-header-azul">
                            <h4 class="mb-0">Crear una Nueva Clase</h4>
                        </div>
                        <div class="card-body">
                            <form action="procesar_clase.php" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="crear">
                                <div class="mb-3">
                                    <label for="materia" class="form-label">Nombre de la Materia</label>
                                    <input type="text" class="form-control" id="materia" name="materia" required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="carrera" class="form-label">Carrera</label>
                                        <input type="text" class="form-control" id="carrera" name="carrera" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="grupo" class="form-label">Grupo</label>
                                        <input type="text" class="form-control" id="grupo" name="grupo" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="semestre" class="form-label">Semestre</label>
                                        <input type="number" class="form-control" id="semestre" name="semestre" min="1" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="dependencia" class="form-label">Dependencia (Ej. FES C.)</label>
                                        <input type="text" class="form-control" id="dependencia" name="dependencia" value="FES Cuautitlán">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-unam-primary w-100">Crear Clase</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card card-elevated">
                        <div class="card-header card-header-oro">
                            <h4 class="mb-0">Unirse a una Clase</h4>
                        </div>
                        <div class="card-body">
                            <form action="procesar_clase.php" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="unirse_por_codigo">
                                <div class="mb-3">
                                    <label for="codigo_clase" class="form-label">Ingresa el Código de la Clase</label>
                                    <input type="text" class="form-control" id="codigo_clase" name="codigo_clase" placeholder="Ej. A4B-C9X" required>
                                </div>
                                <button type="submit" class="btn btn-gold w-100">Unirse con Código</button>
                            </form>

                            <hr class="my-4">

                            <form action="gestion_clases.php" method="POST">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="accion" value="buscar">
                                <div class="mb-3">
                                    <label for="busqueda" class="form-label">O buscar clase por Materia/Grupo</label>
                                    <input type="text" class="form-control" id="busqueda" name="busqueda" required>
                                </div>
                                <button type="submit" class="btn btn-outline-secondary w-100">Buscar</button>
                            </form>

                            <?php if ($huboBusqueda): ?>
                                <hr class="my-4">
                                <h5 class="mb-3">Resultados:</h5>
                                <?php if (!empty($resultadosBusqueda)): ?>
                                    <ul class="list-group">
                                        <?php foreach ($resultadosBusqueda as $clase): ?>
                                            <li class="list-group-item clase-item-row d-flex justify-content-between align-items-center">
                                                <div>
                                                    <strong><?php echo e($clase['Materia']); ?></strong>
                                                    <small class="text-muted d-block">Gpo: <?php echo e($clase['Grupo']); ?></small>
                                                </div>
                                                <form action="procesar_clase.php" method="POST" class="ms-2">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="accion" value="solicitar_unirse">
                                                    <input type="hidden" name="clase_id" value="<?php echo (int) $clase['ClaseID']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-unam-primary">Solicitar Unirse</button>
                                                </form>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php else: ?>
                                    <p class="text-center text-muted mb-0">No se encontraron clases (o ya enviaste una solicitud).</p>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
