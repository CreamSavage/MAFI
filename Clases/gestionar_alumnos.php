<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/layout.php';

$profesorID = (int) ($_SESSION['id'] ?? 0);

if (!isset($_GET['clase_id']) || !is_numeric($_GET['clase_id'])) {
    header('Location: gestion_clases.php?error=' . urlencode('Clase no válida.'));
    exit;
}
$claseID = (int) $_GET['clase_id'];

$stmtCheck = $conexion->prepare('SELECT Materia, CodigoClase FROM clases WHERE ClaseID = ? AND CreadorID = ?');
$stmtCheck->bind_param('ii', $claseID, $profesorID);
$stmtCheck->execute();
$clase = $stmtCheck->get_result()->fetch_assoc();
$stmtCheck->close();

if (!$clase) {
    header('Location: gestion_clases.php?error=' . urlencode('No tienes permiso para ver esta clase.'));
    exit;
}

$sqlPendientes = "SELECT U.UsuarioID, U.Nombres, U.ApellidoPaterno, U.ApellidoMaterno, U.CorreoElectronico, I.FechaInscripcion
                  FROM inscripciones I
                  JOIN usuarios U ON I.UsuarioID = U.UsuarioID
                  WHERE I.ClaseID = ? AND I.EstadoInscripcion = 'pendiente'
                  ORDER BY I.FechaInscripcion ASC";
$stmtPendientes = $conexion->prepare($sqlPendientes);
$stmtPendientes->bind_param('i', $claseID);
$stmtPendientes->execute();
$listaPendientes = $stmtPendientes->get_result()->fetch_all(MYSQLI_ASSOC);
$stmtPendientes->close();

$sqlAlumnos = "SELECT U.UsuarioID, U.Nombres, U.ApellidoPaterno, U.ApellidoMaterno, U.CorreoElectronico, U.UltimaConexion, I.FechaInscripcion
               FROM inscripciones I
               JOIN usuarios U ON I.UsuarioID = U.UsuarioID
               WHERE I.ClaseID = ? AND I.EstadoInscripcion = 'alumno'
               ORDER BY U.ApellidoPaterno ASC, U.ApellidoMaterno ASC, U.Nombres ASC";
$stmtAlumnos = $conexion->prepare($sqlAlumnos);
$stmtAlumnos->bind_param('i', $claseID);
$stmtAlumnos->execute();
$listaAlumnos = $stmtAlumnos->get_result()->fetch_all(MYSQLI_ASSOC);
$stmtAlumnos->close();

mafi_page_start('Gestionar Alumnos - ' . $clase['Materia']);
?>
<div class="container my-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <a href="gestion_clases.php" class="btn btn-outline-secondary mb-4"><i class="fas fa-arrow-left me-2"></i>Volver a Mis Clases</a>

            <h1 class="page-title-left">Gestionar Alumnos</h1>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger" role="alert"><?php echo e($_GET['error']); ?></div>
            <?php endif; ?>
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success" role="alert"><?php echo e($_GET['success']); ?></div>
            <?php endif; ?>

            <div class="card card-elevated mb-4">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Solicitudes Pendientes (<?php echo count($listaPendientes); ?>)</h4>
                </div>
                <div class="card-body">
                    <?php if (!empty($listaPendientes)): ?>
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                <?php foreach ($listaPendientes as $pendiente): ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo e($pendiente['ApellidoPaterno'] . ' ' . $pendiente['ApellidoMaterno'] . ' ' . $pendiente['Nombres']); ?></strong>
                                            <small class="text-muted d-block"><?php echo e($pendiente['CorreoElectronico']); ?></small>
                                        </td>
                                        <td class="text-end text-nowrap">
                                            <form action="procesar_clase.php" method="POST" class="d-inline" data-confirm="¿Rechazar la solicitud de este alumno?" data-confirm-title="Rechazar Alumno">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="accion" value="rechazar_alumno">
                                                <input type="hidden" name="clase_id" value="<?php echo $claseID; ?>">
                                                <input type="hidden" name="alumno_id" value="<?php echo (int) $pendiente['UsuarioID']; ?>">
                                                <button type="submit" class="btn btn-sm btn-danger">Rechazar</button>
                                            </form>
                                            <form action="procesar_clase.php" method="POST" class="d-inline ms-2">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="accion" value="aprobar_alumno">
                                                <input type="hidden" name="clase_id" value="<?php echo $claseID; ?>">
                                                <input type="hidden" name="alumno_id" value="<?php echo (int) $pendiente['UsuarioID']; ?>">
                                                <button type="submit" class="btn btn-sm btn-success">Aprobar</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p class="text-center text-muted mb-0">No hay solicitudes pendientes.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="card card-elevated">
                <div class="card-header card-header-azul">
                    <h4 class="mb-0">Lista de Alumnos: <?php echo e($clase['Materia']); ?></h4>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Código de la Clase: <span class="codigo-clase"><?php echo e($clase['CodigoClase']); ?></span></h5>

                    <div class="table-responsive mt-4">
                        <table class="table table-striped table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Correo Electrónico</th>
                                    <th scope="col">Inscrito</th>
                                    <th scope="col">Última Conexión</th>
                                    <th scope="col" class="text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($listaAlumnos)): ?>
                                    <?php $count = 1; ?>
                                    <?php foreach ($listaAlumnos as $alumno): ?>
                                        <tr>
                                            <th scope="row"><?php echo $count++; ?></th>
                                            <td><?php echo e($alumno['ApellidoPaterno'] . ' ' . $alumno['ApellidoMaterno'] . ' ' . $alumno['Nombres']); ?></td>
                                            <td><?php echo e($alumno['CorreoElectronico']); ?></td>
                                            <td><?php echo e(date_format(date_create($alumno['FechaInscripcion']), 'd/m/Y')); ?></td>
                                            <td>
                                                <?php if ($alumno['UltimaConexion']): ?>
                                                    <?php echo e(date_format(date_create($alumno['UltimaConexion']), 'd/m/Y h:i A')); ?>
                                                <?php else: ?>
                                                    <span class="text-muted">Nunca se ha conectado</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <form action="procesar_clase.php" method="POST" data-confirm="¿Estás seguro de que quieres expulsar a este alumno de la clase?" data-confirm-title="Expulsar Alumno">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="hidden" name="accion" value="expulsar_alumno">
                                                    <input type="hidden" name="clase_id" value="<?php echo $claseID; ?>">
                                                    <input type="hidden" name="alumno_id" value="<?php echo (int) $alumno['UsuarioID']; ?>">
                                                    <button type="submit" class="btn btn-sm btn-danger">Expulsar</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Aún no hay alumnos aprobados en esta clase.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php mafi_page_end(); ?>
