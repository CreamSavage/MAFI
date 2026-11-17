<?php
require_once __DIR__ . '/../Login/auth.php';

if (strtolower((string) ($_SESSION['usuario_rol'] ?? '')) !== 'administrador') {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Acceso denegado.')));
    exit;
}

$adminID = (int) ($_SESSION['id'] ?? 0);
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'delete_clase') {
    if (!verify_csrf()) {
        $error = 'Sesión de formulario expirada. Intenta nuevamente.';
    } else {
        $claseID = (int) ($_POST['clase_id'] ?? 0);
        if ($claseID > 0) {
            $usuariosAfectados = [];
            $stmtCreador = $conexion->prepare('SELECT CreadorID FROM clases WHERE ClaseID = ?');
            $stmtCreador->bind_param('i', $claseID);
            $stmtCreador->execute();
            if ($rowC = $stmtCreador->get_result()->fetch_assoc()) {
                $usuariosAfectados[] = (int) $rowC['CreadorID'];
            }
            $stmtCreador->close();

            $stmtInscUsers = $conexion->prepare("SELECT DISTINCT UsuarioID FROM inscripciones WHERE ClaseID = ? AND EstadoInscripcion = 'alumno'");
            $stmtInscUsers->bind_param('i', $claseID);
            $stmtInscUsers->execute();
            $resIU = $stmtInscUsers->get_result();
            while ($r = $resIU->fetch_assoc()) {
                $usuariosAfectados[] = (int) $r['UsuarioID'];
            }
            $stmtInscUsers->close();
            $usuariosAfectados = array_unique($usuariosAfectados);

            $conexion->begin_transaction();
            try {
                $stmtCom = $conexion->prepare('DELETE c FROM comentarios c INNER JOIN anuncios a ON c.AnuncioID = a.AnuncioID WHERE a.ClaseID = ?');
                $stmtCom->bind_param('i', $claseID);
                $stmtCom->execute();
                $stmtCom->close();

                foreach ([
                    'DELETE FROM anuncios WHERE ClaseID = ?',
                    'DELETE FROM inscripciones WHERE ClaseID = ?',
                    'DELETE FROM clases WHERE ClaseID = ?',
                ] as $sqlDel) {
                    $stmtDel = $conexion->prepare($sqlDel);
                    $stmtDel->bind_param('i', $claseID);
                    $stmtDel->execute();
                    $stmtDel->close();
                }

                foreach ($usuariosAfectados as $uid) {
                    actualizar_rol_usuario_en_bd($conexion, $uid, ($uid === $adminID));
                }

                $conexion->commit();
                $success = "Clase ID $claseID eliminada completamente (comentarios, anuncios, inscripciones y clase).";
            } catch (Exception $ex) {
                $conexion->rollback();
                error_log('MAFI admin delete_clase error: ' . $ex->getMessage());
                $error = 'No se pudo eliminar la clase.';
            }
        }
    }
}

$sqlSelect = 'SELECT c.ClaseID, c.CodigoClase, c.ConteoAlumnos, c.Carrera, c.Grupo, c.Materia, c.Semestre,
                     u.Nombres, u.ApellidoPaterno
              FROM clases c
              JOIN usuarios u ON c.CreadorID = u.UsuarioID
              ORDER BY c.ClaseID DESC';
$resultadoClases = $conexion->query($sqlSelect);
$clases = $resultadoClases ? $resultadoClases->fetch_all(MYSQLI_ASSOC) : [];
if ($resultadoClases) {
    $resultadoClases->free();
}

$pageTitle = 'MAFI Admin - Gestión de Clases';
require_once __DIR__ . '/admin_header.php';
?>
<div class="container py-5">
    <a href="dashboard.php" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Dashboard</a>
    <h1 class="page-title-left"><i class="fas fa-chalkboard-teacher me-2"></i>Gestión de Clases</h1>

    <?php if ($success !== ''): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e($success); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e($error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <div class="card card-elevated">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3" style="background: #fafafa;">
            <div class="d-flex align-items-center gap-2">
                <h5 class="mb-0">Listado de Clases <span class="badge bg-secondary ms-2">Total: <?php echo count($clases); ?></span></h5>
                <span id="count-clases" class="small text-muted"></span>
            </div>
            <div class="input-group input-group-sm" style="max-width: 160px;">
                <label class="input-group-text" for="col-clases"><i class="fas fa-filter"></i></label>
                <select id="col-clases" class="form-select">
                    <option value="all">Todos</option>
                    <option value="0">ID</option>
                    <option value="1">Código</option>
                    <option value="2">Materia</option>
                    <option value="3">Carrera/Grupo</option>
                    <option value="4">Semestre</option>
                    <option value="5">Profesor</option>
                    <option value="6">Alumnos</option>
                </select>
            </div>
            <div class="input-group input-group-sm" style="max-width: 300px;">
                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                <input type="text" class="form-control" id="search-clases" placeholder="Buscar...">
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
                <table class="table table-hover mb-0 align-middle" id="tabla-clases">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Materia</th>
                            <th>Carrera/Grupo</th>
                            <th>Semestre</th>
                            <th>Creador (Profesor)</th>
                            <th>Alumnos</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($clases)): ?>
                            <?php foreach ($clases as $clase): ?>
                                <?php $confirmMsg = 'ADVERTENCIA: ¿Está seguro de eliminar la clase ' . $clase['CodigoClase'] . '? Esto eliminará todos los datos relacionados (inscripciones, anuncios).'; ?>
                                <tr>
                                    <td><?php echo (int) $clase['ClaseID']; ?></td>
                                    <td><strong><?php echo e($clase['CodigoClase']); ?></strong></td>
                                    <td><?php echo e($clase['Materia']); ?></td>
                                    <td><?php echo e($clase['Carrera'] . ' / ' . $clase['Grupo']); ?></td>
                                    <td><?php echo (int) $clase['Semestre']; ?></td>
                                    <td><?php echo e($clase['Nombres'] . ' ' . $clase['ApellidoPaterno']); ?></td>
                                    <td><span class="badge bg-info text-dark"><?php echo (int) $clase['ConteoAlumnos']; ?></span></td>
                                    <td class="text-nowrap">
                                        <form method="POST" class="d-inline" onsubmit="return confirm(<?php echo e(json_encode($confirmMsg)); ?>);">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="action" value="delete_clase">
                                            <input type="hidden" name="clase_id" value="<?php echo (int) $clase['ClaseID']; ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Eliminar Clase"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="no-data-row">
                                <td colspan="8" class="text-center">No hay clases registradas.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
mafi_page_end([
    'extraJs'  => ['admin/js/tableFilter.js'],
    'inlineJs' => "initTableFilter({ inputSelector: '#search-clases', tableSelector: '#tabla-clases', counterSelector: '#count-clases', selectSelector: '#col-clases' });",
]);
?>
