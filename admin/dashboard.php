<?php
require_once __DIR__ . '/../Login/auth.php';

if (strtolower((string) ($_SESSION['usuario_rol'] ?? '')) !== 'administrador') {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Acceso denegado.')));
    exit;
}

$totalUsuarios = 0;
$codDisponibles = 0;
$codUsados = 0;

if ($res = $conexion->query('SELECT COUNT(*) AS n FROM usuarios')) {
    $totalUsuarios = (int) ($res->fetch_assoc()['n'] ?? 0);
    $res->free();
}
if ($res = $conexion->query('SELECT COUNT(*) AS n FROM accesos WHERE Usado = 0')) {
    $codDisponibles = (int) ($res->fetch_assoc()['n'] ?? 0);
    $res->free();
}
if ($res = $conexion->query('SELECT COUNT(*) AS n FROM accesos WHERE Usado = 1')) {
    $codUsados = (int) ($res->fetch_assoc()['n'] ?? 0);
    $res->free();
}

$rolActual = strtolower((string) ($_SESSION['usuario_rol'] ?? 'administrador'));
$mapRolDash = [
    'administrador' => ['bg-warning text-dark', 'Administrador'],
    'profesor'      => ['bg-success text-white', 'Profesor'],
    'alumno'        => ['bg-info text-dark', 'Alumno'],
    'usuario'       => ['bg-secondary text-white', 'Usuario'],
];
[$claseDash, $textoDash] = $mapRolDash[$rolActual] ?? $mapRolDash['administrador'];

$pageTitle = 'MAFI Admin - Panel de Administración';
require_once __DIR__ . '/admin_header.php';
?>
<section class="py-5">
    <div class="container">
        <a href="<?php echo e(app_path('temas.php')); ?>" class="btn btn-outline-secondary mb-3"><i class="fas fa-arrow-left me-2"></i>Volver al Sistema MAFI</a>
        <div class="row align-items-center mb-4">
            <div class="col-lg-8">
                <h1 class="page-title-left mb-2">Panel de Administración</h1>
                <p class="lead mb-2">Bienvenido, <?php echo e($_SESSION['nombre_completo'] ?? 'Usuario'); ?>.</p>
                <span class="badge <?php echo e($claseDash); ?> px-3 py-2" style="font-size: 0.78rem;">Rol actual: <?php echo e($textoDash); ?></span>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <div class="card card-elevated gradient-azul">
                    <div class="card-body d-flex align-items-center">
                        <div class="metric-icon bg-white bg-opacity-25 me-3">
                            <i class="fas fa-user-shield fa-lg text-white"></i>
                        </div>
                        <div>
                            <div class="small text-white-50">Rol</div>
                            <div class="h5 mb-0"><?php echo e($textoDash); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-12 col-md-4">
                <div class="card metric-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="metric-icon me-3" style="background: #e9f0ff; color: var(--unam-azul);"><i class="fas fa-users"></i></div>
                        <div>
                            <div class="metric-value"><?php echo $totalUsuarios; ?></div>
                            <div class="metric-label">Usuarios Registrados</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card metric-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="metric-icon me-3" style="background: #fff4da; color: var(--unam-oro-oscuro);"><i class="fas fa-unlock"></i></div>
                        <div>
                            <div class="metric-value"><?php echo $codDisponibles; ?></div>
                            <div class="metric-label">Códigos Disponibles</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card metric-card">
                    <div class="card-body d-flex align-items-center">
                        <div class="metric-icon me-3 bg-light text-danger"><i class="fas fa-lock"></i></div>
                        <div>
                            <div class="metric-value"><?php echo $codUsados; ?></div>
                            <div class="metric-label">Códigos Usados</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">
            <div class="col-md-4">
                <div class="card card-elevated h-100 text-center">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3" style="color: var(--unam-azul);"><i class="fas fa-key fa-2x"></i></div>
                            <h5 class="card-title fw-bold">Códigos de Acceso</h5>
                            <p class="text-muted">Genera, lista y administra códigos para nuevos usuarios.</p>
                        </div>
                        <a href="gestion_accesos.php" class="btn btn-unam-primary"><i class="fas fa-arrow-right"></i> Ir a Gestión</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-elevated h-100 text-center">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3" style="color: var(--unam-azul);"><i class="fas fa-users fa-2x"></i></div>
                            <h5 class="card-title fw-bold">Gestión de Usuarios</h5>
                            <p class="text-muted">Buscar, editar roles y estados de usuarios registrados.</p>
                        </div>
                        <a href="gestion_usuarios2.php" class="btn btn-unam-primary"><i class="fas fa-arrow-right"></i> Ir a Gestión</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-elevated h-100 text-center">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <div>
                            <div class="mb-3" style="color: var(--unam-oro);"><i class="fas fa-chalkboard-teacher fa-2x"></i></div>
                            <h5 class="card-title fw-bold">Gestión de Clases</h5>
                            <p class="text-muted">Supervisar y administrar todas las clases creadas.</p>
                        </div>
                        <a href="gestion_clases.php" class="btn btn-unam-primary"><i class="fas fa-arrow-right"></i> Ir a Gestión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php mafi_page_end(); ?>
