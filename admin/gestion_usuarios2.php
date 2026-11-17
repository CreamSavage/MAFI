<?php
require_once __DIR__ . '/../Login/auth.php';

if (strtolower((string) ($_SESSION['usuario_rol'] ?? '')) !== 'administrador') {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Acceso denegado.')));
    exit;
}

$adminID = (int) ($_SESSION['id'] ?? 0);
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    if (!verify_csrf()) {
        $error = 'Sesión de formulario expirada. Intenta nuevamente.';
    } elseif ($_POST['action'] === 'eliminar_usuario') {
        $usuarioID = (int) ($_POST['usuario_id'] ?? 0);

        if ($usuarioID === $adminID) {
            $error = 'No puedes eliminar tu propia cuenta de administrador.';
        } elseif ($usuarioID > 0) {
            $conexion->begin_transaction();
            try {
                $stmtClases = $conexion->prepare('SELECT ClaseID FROM clases WHERE CreadorID = ?');
                $stmtClases->bind_param('i', $usuarioID);
                $stmtClases->execute();
                $resClases = $stmtClases->get_result();
                $clasesIDs = [];
                while ($row = $resClases->fetch_assoc()) {
                    $clasesIDs[] = (int) $row['ClaseID'];
                }
                $stmtClases->close();

                if (!empty($clasesIDs)) {
                    $idsClasesStr = implode(',', array_map('intval', $clasesIDs));
                    $resAnuncios = $conexion->query("SELECT AnuncioID FROM anuncios WHERE ClaseID IN ($idsClasesStr)");
                    $anunciosIDs = [];
                    if ($resAnuncios) {
                        while ($row = $resAnuncios->fetch_assoc()) {
                            $anunciosIDs[] = (int) $row['AnuncioID'];
                        }
                        $resAnuncios->free();
                    }

                    if (!empty($anunciosIDs)) {
                        $idsAnunciosStr = implode(',', array_map('intval', $anunciosIDs));
                        $conexion->query("DELETE FROM comentarios WHERE AnuncioID IN ($idsAnunciosStr)");
                    }

                    $conexion->query("DELETE FROM anuncios WHERE ClaseID IN ($idsClasesStr)");
                    $conexion->query("DELETE FROM inscripciones WHERE ClaseID IN ($idsClasesStr)");
                    $conexion->query("DELETE FROM clases WHERE ClaseID IN ($idsClasesStr)");
                }

                foreach ([
                    'DELETE FROM comentarios WHERE UsuarioID = ?',
                    'DELETE FROM anuncios WHERE UsuarioID = ?',
                    'DELETE FROM inscripciones WHERE UsuarioID = ?',
                    'DELETE FROM usuarios WHERE UsuarioID = ?',
                ] as $sqlDel) {
                    $stmtDel = $conexion->prepare($sqlDel);
                    $stmtDel->bind_param('i', $usuarioID);
                    $stmtDel->execute();
                    $stmtDel->close();
                }

                $conexion->commit();
                $success = 'Usuario eliminado correctamente. Se eliminaron ' . count($clasesIDs) . ' clase(s) asociada(s) y todo su contenido.';
            } catch (mysqli_sql_exception $exception) {
                $conexion->rollback();
                error_log('MAFI admin eliminar_usuario error: ' . $exception->getMessage());
                $error = 'No se pudo eliminar el usuario.';
            }
        }
    } elseif ($_POST['action'] === 'actualizar_usuario') {
        $usuarioID = (int) ($_POST['usuario_id'] ?? 0);
        $rolNormalizado = strtolower(trim((string) ($_POST['rol'] ?? 'usuario')));
        $nuevoEstado = strtolower(trim((string) ($_POST['estado'] ?? 'verificado')));

        if (!in_array($rolNormalizado, ['usuario', 'alumno', 'profesor', 'administrador'], true)) {
            $rolNormalizado = 'usuario';
        }
        if (!in_array($nuevoEstado, ['verificado', 'pendiente'], true)) {
            $nuevoEstado = 'verificado';
        }
        if ($rolNormalizado === 'profesor' || $rolNormalizado === 'administrador') {
            $nuevoEstado = 'verificado';
        }

        $rolParaBD = resolverRolParaBD($conexion, $rolNormalizado) ?? $rolNormalizado;

        $stmtUpdate = $conexion->prepare('UPDATE usuarios SET Rol = ?, Estado = ? WHERE UsuarioID = ?');
        $stmtUpdate->bind_param('ssi', $rolParaBD, $nuevoEstado, $usuarioID);
        if ($stmtUpdate->execute()) {
            if ($usuarioID === $adminID) {
                $_SESSION['rol'] = strtolower($rolParaBD);
                $_SESSION['usuario_rol'] = strtolower($rolParaBD);
            }
            $success = "Usuario ID $usuarioID actualizado con éxito.";
        } else {
            $error = 'Error al actualizar el usuario.';
        }
        $stmtUpdate->close();
    }
}

$sqlSelect = 'SELECT u.UsuarioID, u.Nombres, u.ApellidoPaterno, u.ApellidoMaterno, u.CorreoElectronico,
                     u.Rol, u.Estado, a.Codigo AS Codigo, a.FechaCreacion
              FROM usuarios u
              LEFT JOIN accesos a ON u.AccesoID = a.AccesoID
              ORDER BY u.UsuarioID DESC';
$resultadoUsuarios = $conexion->query($sqlSelect);
$usuarios = $resultadoUsuarios ? $resultadoUsuarios->fetch_all(MYSQLI_ASSOC) : [];
if ($resultadoUsuarios) {
    $resultadoUsuarios->free();
}

$pageTitle = 'MAFI Admin - Gestión de Usuarios';
require_once __DIR__ . '/admin_header.php';
?>
<div class="container py-5">
    <a href="dashboard.php" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Dashboard</a>
    <h1 class="page-title-left"><i class="fas fa-users me-2"></i>Gestión de Usuarios</h1>

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
                <h5 class="mb-0">Listado de Usuarios <span class="badge bg-secondary ms-2">Total: <?php echo count($usuarios); ?></span></h5>
                <span id="count-usuarios" class="small text-muted"></span>
            </div>
            <div class="d-flex align-items-center gap-2 ms-auto order-3 order-sm-1">
                <span class="badge bg-secondary">Usuario</span>
                <span class="badge bg-primary">Administrador</span>
                <span class="badge bg-success">Profesor</span>
                <span class="badge bg-info text-dark">Alumno</span>
            </div>
            <div class="input-group input-group-sm order-2 order-sm-2" style="max-width: 180px;">
                <label class="input-group-text" for="col-usuarios"><i class="fas fa-filter"></i></label>
                <select id="col-usuarios" class="form-select">
                    <option value="all">Todos</option>
                    <option value="0">ID</option>
                    <option value="1">Nombre</option>
                    <option value="2">Correo</option>
                    <option value="3">Código</option>
                    <option value="4">Rol</option>
                    <option value="5">Estado</option>
                    <option value="6">Fecha</option>
                </select>
            </div>
            <div class="input-group input-group-sm order-1 order-sm-3" style="max-width: 300px;">
                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                <input type="text" class="form-control" id="search-usuarios" placeholder="Buscar...">
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 60vh; overflow-y: auto;">
                <table class="table table-hover mb-0 align-middle" id="tabla-usuarios">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nombre Completo</th>
                            <th>Correo</th>
                            <th>Código Acceso</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Fecha Código</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($usuarios)): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <?php
                                $rol = strtolower((string) $usuario['Rol']);
                                $badgeClass = match ($rol) {
                                    'administrador' => 'bg-primary',
                                    'profesor'      => 'bg-success',
                                    'alumno'        => 'bg-info text-dark',
                                    default         => 'bg-secondary',
                                };
                                $estado = strtolower((string) $usuario['Estado']);
                                $badgeEstado = ($estado === 'verificado') ? 'bg-success' : 'bg-warning text-dark';
                                ?>
                                <tr>
                                    <td><?php echo (int) $usuario['UsuarioID']; ?></td>
                                    <td><strong><?php echo e($usuario['Nombres'] . ' ' . $usuario['ApellidoPaterno'] . ' ' . $usuario['ApellidoMaterno']); ?></strong></td>
                                    <td><?php echo e($usuario['CorreoElectronico']); ?></td>
                                    <td><?php echo e($usuario['Codigo'] ?? 'N/A'); ?></td>
                                    <td><span class="badge <?php echo $badgeClass; ?>"><?php echo e(ucfirst($rol)); ?></span></td>
                                    <td><span class="badge <?php echo $badgeEstado; ?>"><?php echo e(ucfirst($estado)); ?></span></td>
                                    <td><?php echo $usuario['FechaCreacion'] ? e(date('d/M/Y', strtotime((string) $usuario['FechaCreacion']))) : 'N/A'; ?></td>
                                    <td class="text-nowrap">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditar<?php echo (int) $usuario['UsuarioID']; ?>" title="Editar usuario">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modalEliminar<?php echo (int) $usuario['UsuarioID']; ?>" title="Eliminar usuario">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr class="no-data-row">
                                <td colspan="8" class="text-center">No hay usuarios registrados.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($usuarios as $usuario): ?>
    <?php
    $uid = (int) $usuario['UsuarioID'];
    $rol = strtolower((string) $usuario['Rol']);
    $estado = strtolower((string) $usuario['Estado']);
    ?>
    <div class="modal fade" id="modalEditar<?php echo $uid; ?>" tabindex="-1" aria-labelledby="modalEditarLabel<?php echo $uid; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel<?php echo $uid; ?>">Editar Usuario #<?php echo $uid; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="action" value="actualizar_usuario">
                        <input type="hidden" name="usuario_id" value="<?php echo $uid; ?>">

                        <p><strong>Nombre:</strong> <?php echo e($usuario['Nombres'] . ' ' . $usuario['ApellidoPaterno']); ?></p>
                        <p><strong>Correo:</strong> <?php echo e($usuario['CorreoElectronico']); ?></p>

                        <div class="mb-3">
                            <label for="rol<?php echo $uid; ?>" class="form-label">Rol</label>
                            <select class="form-select" name="rol" id="rol<?php echo $uid; ?>" required>
                                <option value="usuario" <?php echo $rol === 'usuario' ? 'selected' : ''; ?>>Usuario</option>
                                <option value="alumno" <?php echo $rol === 'alumno' ? 'selected' : ''; ?>>Alumno</option>
                                <option value="profesor" <?php echo $rol === 'profesor' ? 'selected' : ''; ?>>Profesor</option>
                                <option value="administrador" <?php echo $rol === 'administrador' ? 'selected' : ''; ?>>Administrador</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="estado<?php echo $uid; ?>" class="form-label">Estado</label>
                            <select class="form-select" name="estado" id="estado<?php echo $uid; ?>" required>
                                <option value="verificado" <?php echo $estado === 'verificado' ? 'selected' : ''; ?>>Verificado</option>
                                <option value="pendiente" <?php echo $estado === 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
                            </select>
                            <div class="form-text">Si estableces el rol a Profesor o Administrador, el estado se forzará a "verificado".</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-unam-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminar<?php echo $uid; ?>" tabindex="-1" aria-labelledby="modalEliminarLabel<?php echo $uid; ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="modalEliminarLabel<?php echo $uid; ?>"><i class="fas fa-exclamation-triangle me-2"></i>Confirmar Eliminación</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="action" value="eliminar_usuario">
                        <input type="hidden" name="usuario_id" value="<?php echo $uid; ?>">

                        <div class="alert alert-warning">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <strong>¡ADVERTENCIA!</strong> Esta acción es irreversible.
                        </div>

                        <p><strong>Usuario a eliminar:</strong></p>
                        <p class="ms-3">
                            <i class="fas fa-user me-2"></i><?php echo e($usuario['Nombres'] . ' ' . $usuario['ApellidoPaterno']); ?><br>
                            <i class="fas fa-envelope me-2"></i><?php echo e($usuario['CorreoElectronico']); ?><br>
                            <i class="fas fa-id-badge me-2"></i>Rol: <strong><?php echo e(ucfirst($rol)); ?></strong>
                        </p>

                        <?php if ($rol === 'profesor'): ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-chalkboard-teacher me-2"></i>
                                <strong>Este usuario es profesor.</strong><br>
                                Se eliminarán <strong>todas sus clases</strong>, incluyendo:
                                <ul class="mb-0 mt-2">
                                    <li>Inscripciones de alumnos</li>
                                    <li>Anuncios publicados</li>
                                    <li>Comentarios de la clase</li>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <p class="text-danger fw-bold">¿Estás seguro de que deseas eliminar este usuario?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash me-2"></i>Eliminar Permanentemente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<?php
$inlineJs = <<<'JS'
initTableFilter({
    inputSelector: '#search-usuarios',
    tableSelector: '#tabla-usuarios',
    counterSelector: '#count-usuarios',
    selectSelector: '#col-usuarios'
});

document.querySelectorAll("select[id^='rol']").forEach((sel) => {
    sel.addEventListener('change', () => {
        const uid = sel.id.replace('rol', '');
        const estadoSel = document.getElementById('estado' + uid);
        if (!estadoSel) return;
        const v = (sel.value || '').toLowerCase();
        if (v === 'profesor' || v === 'administrador') {
            estadoSel.value = 'verificado';
        }
    });
});
JS;
mafi_page_end([
    'extraJs'  => ['admin/js/tableFilter.js'],
    'inlineJs' => $inlineJs,
]);
?>
