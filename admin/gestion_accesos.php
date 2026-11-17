<?php
require_once __DIR__ . '/../Login/auth.php';

if (strtolower((string) ($_SESSION['usuario_rol'] ?? '')) !== 'administrador') {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Acceso denegado.')));
    exit;
}

function generarCodigoAcceso(int $length = 8): string
{
    $chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz#$&%*+-/';
    $code = '';
    $max = strlen($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[random_int(0, $max)];
    }
    return strtoupper($code);
}

$success = '';
$codigoGenerado = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if (!verify_csrf()) {
        $error = 'Sesión de formulario expirada. Intenta nuevamente.';
    } elseif ($_POST['action'] === 'generar_codigo') {
        $stmtInsert = $conexion->prepare('INSERT INTO accesos (Codigo) VALUES (?)');
        $maxIntentos = 5;
        $exito = false;

        for ($intentos = 0; $intentos < $maxIntentos; $intentos++) {
            $codigo = generarCodigoAcceso();
            $stmtInsert->bind_param('s', $codigo);
            try {
                if ($stmtInsert->execute()) {
                    $codigoGenerado = $codigo;
                    $success = '¡Código generado con éxito!';
                    $exito = true;
                    break;
                }
            } catch (mysqli_sql_exception $ex) {
                if ((int) $ex->getCode() !== 1062) {
                    error_log('MAFI generarCodigo error: ' . $ex->getMessage());
                    break;
                }
            }
        }
        $stmtInsert->close();

        if (!$exito) {
            $error = 'Error al generar código único después de varios intentos.';
        }
    } elseif ($_POST['action'] === 'cambiar_estado') {
        $accesoID = (int) ($_POST['acceso_id'] ?? 0);
        $nuevoEstado = ((int) ($_POST['usado'] ?? 0)) === 1 ? 1 : 0;

        $stmtUpdate = $conexion->prepare('UPDATE accesos SET Usado = ? WHERE AccesoID = ?');
        $stmtUpdate->bind_param('ii', $nuevoEstado, $accesoID);
        if ($stmtUpdate->execute()) {
            $success = "Estado del código #$accesoID actualizado con éxito.";
        } else {
            $error = 'Error al actualizar el estado del código.';
        }
        $stmtUpdate->close();
    }
}

$sqlSelect = 'SELECT a.AccesoID, a.Codigo, a.Usado, a.FechaCreacion, a.FechaUso,
                     u.Nombres, u.ApellidoPaterno, u.CorreoElectronico
              FROM accesos a
              LEFT JOIN usuarios u ON u.AccesoID = a.AccesoID
              ORDER BY a.AccesoID DESC';
$resultadoAccesos = $conexion->query($sqlSelect);
$accesos = $resultadoAccesos ? $resultadoAccesos->fetch_all(MYSQLI_ASSOC) : [];
if ($resultadoAccesos) {
    $resultadoAccesos->free();
}

$pageTitle = 'MAFI Admin - Códigos de Acceso';
require_once __DIR__ . '/admin_header.php';
?>
<div class="container py-5">
    <a href="dashboard.php" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Dashboard</a>
    <h1 class="page-title-left"><i class="fas fa-key me-2"></i>Gestión de Códigos de Acceso</h1>

    <?php if ($success !== ''): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo e($success); ?>
            <?php if ($codigoGenerado !== ''): ?>
                Código: <strong><?php echo e($codigoGenerado); ?></strong>
            <?php endif; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo e($error); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    <?php endif; ?>

    <div class="card card-elevated mb-4">
        <div class="card-header gradient-azul d-flex align-items-center justify-content-between">
            <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Generar un Nuevo Código</h5>
            <span class="badge badge-gold">Acción rápida</span>
        </div>
        <div class="card-body">
            <form method="POST" class="d-flex flex-wrap gap-2 align-items-center">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="action" value="generar_codigo">
                <button type="submit" class="btn btn-unam-primary"><i class="fas fa-wand-magic-sparkles"></i> Generar y Añadir Código</button>
                <span class="text-muted small">Se creará un código único y disponible.</span>
            </form>
        </div>
    </div>

    <div class="card card-elevated">
        <div class="card-header d-flex flex-wrap align-items-center justify-content-between gap-3" style="background: #fafafa;">
            <div class="d-flex align-items-center gap-2">
                <h5 class="mb-0">Listado de Códigos <span class="badge bg-secondary ms-2">Total: <?php echo count($accesos); ?></span></h5>
                <span id="count-accesos" class="small text-muted"></span>
            </div>
            <div class="d-flex align-items-center gap-2 ms-auto order-2 order-sm-1">
                <span class="badge bg-success">Disponible</span>
                <span class="badge bg-danger">Usado</span>
            </div>
            <div class="input-group input-group-sm order-1 order-sm-2" style="max-width: 160px;">
                <label class="input-group-text" for="col-accesos"><i class="fas fa-filter"></i></label>
                <select id="col-accesos" class="form-select">
                    <option value="all">Todos</option>
                    <option value="0">ID</option>
                    <option value="1">Código</option>
                    <option value="2">Estado</option>
                    <option value="3">Fecha</option>
                    <option value="4">Usado Por</option>
                    <option value="5">Correo</option>
                </select>
            </div>
            <div class="input-group input-group-sm order-1 order-sm-3" style="max-width: 300px;">
                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                <input type="text" class="form-control" id="search-accesos" placeholder="Buscar...">
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
                <table class="table table-hover mb-0 align-middle" id="tabla-accesos">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Estado</th>
                            <th>Fecha Creación</th>
                            <th>Usado Por</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($accesos)): ?>
                            <?php foreach ($accesos as $acceso): ?>
                                <tr>
                                    <td><?php echo (int) $acceso['AccesoID']; ?></td>
                                    <td><strong><?php echo e($acceso['Codigo']); ?></strong></td>
                                    <td>
                                        <?php if ($acceso['Usado']): ?>
                                            <span class="badge bg-danger">USADO</span>
                                        <?php else: ?>
                                            <span class="badge bg-success">DISPONIBLE</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e(date('d/M/Y H:i', strtotime((string) $acceso['FechaCreacion']))); ?></td>
                                    <td><?php echo $acceso['Nombres'] ? e($acceso['Nombres'] . ' ' . $acceso['ApellidoPaterno']) : '-'; ?></td>
                                    <td><?php echo $acceso['CorreoElectronico'] ? e($acceso['CorreoElectronico']) : '-'; ?></td>
                                    <td class="text-nowrap">
                                        <form method="POST" class="d-inline">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="action" value="cambiar_estado">
                                            <input type="hidden" name="acceso_id" value="<?php echo (int) $acceso['AccesoID']; ?>">
                                            <?php if ($acceso['Usado']): ?>
                                                <input type="hidden" name="usado" value="0">
                                                <button type="submit" class="btn btn-sm btn-outline-success" title="Marcar como disponible"><i class="fas fa-undo"></i></button>
                                            <?php else: ?>
                                                <input type="hidden" name="usado" value="1">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Marcar como usado/desactivar"><i class="fas fa-lock"></i></button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="no-data-row">
                                <td colspan="7" class="text-center">No hay códigos de acceso registrados.</td>
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
    'inlineJs' => "initTableFilter({ inputSelector: '#search-accesos', tableSelector: '#tabla-accesos', counterSelector: '#count-accesos', selectSelector: '#col-accesos' });",
]);
?>
