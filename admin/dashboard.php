<?php
require_once __DIR__ . '/../Login/auth.php';

if (strtolower((string) ($_SESSION['usuario_rol'] ?? '')) !== 'administrador') {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Acceso denegado.')));
    exit;
}

$totalUsuarios = 0;
$totalClases = 0;
$codDisponibles = 0;
$codUsados = 0;

if ($res = $conexion->query('SELECT COUNT(*) AS n FROM usuarios')) {
    $totalUsuarios = (int) ($res->fetch_assoc()['n'] ?? 0);
    $res->free();
}
if ($res = $conexion->query('SELECT COUNT(*) AS n FROM clases')) {
    $totalClases = (int) ($res->fetch_assoc()['n'] ?? 0);
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
<section class="admin-dashboard-section py-4 py-lg-5">
    <div class="container">
        <div class="admin-hero-card mb-4">
            <div class="admin-hero-info">
                <span class="badge <?php echo e($claseDash); ?> admin-role-pill mb-2">
                    <i class="fas fa-user-shield me-1"></i><?php echo e($textoDash); ?>
                </span>
                <h1 class="admin-hero-title mb-1">Panel de Administración</h1>
                <p class="admin-hero-subtitle mb-0">
                    Bienvenido, <strong><?php echo e($_SESSION['nombre_completo'] ?? 'Administrador'); ?></strong>. Supervisa usuarios, códigos de acceso y clases del Sistema MAFI.
                </p>
            </div>
        </div>

        <div class="admin-section-heading mb-3">
            <span class="admin-section-bar"></span>
            <h2>Resumen General</h2>
        </div>

        <div class="row g-3 g-lg-4 mb-5">
            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card metric-card h-100">
                    <div class="card-body d-flex align-items-center p-3 p-lg-4">
                        <div class="metric-icon metric-icon-azul me-3">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="metric-value"><?php echo $totalUsuarios; ?></div>
                            <div class="metric-label">Usuarios Registrados</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card metric-card h-100">
                    <div class="card-body d-flex align-items-center p-3 p-lg-4">
                        <div class="metric-icon metric-icon-oro me-3">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="metric-value"><?php echo $totalClases; ?></div>
                            <div class="metric-label">Clases Creadas</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card metric-card h-100">
                    <div class="card-body d-flex align-items-center p-3 p-lg-4">
                        <div class="metric-icon metric-icon-verde me-3">
                            <i class="fas fa-unlock"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="metric-value"><?php echo $codDisponibles; ?></div>
                            <div class="metric-label">Códigos Disponibles</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-xl-3">
                <div class="card metric-card h-100">
                    <div class="card-body d-flex align-items-center p-3 p-lg-4">
                        <div class="metric-icon metric-icon-rojo me-3">
                            <i class="fas fa-lock"></i>
                        </div>
                        <div class="min-w-0">
                            <div class="metric-value"><?php echo $codUsados; ?></div>
                            <div class="metric-label">Códigos Usados</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-section-heading mb-3">
            <span class="admin-section-bar"></span>
            <h2>Módulos de Gestión</h2>
        </div>

        <div class="row g-3 g-lg-4">
            <div class="col-12 col-md-4">
                <div class="card card-elevated admin-action-card h-100">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="admin-action-icon metric-icon-oro">
                                <i class="fas fa-key"></i>
                            </div>
                            <span class="admin-action-pill"><?php echo $codDisponibles; ?> disponibles</span>
                        </div>
                        <h3 class="admin-action-title">Códigos de Acceso</h3>
                        <p class="admin-action-desc flex-grow-1">Genera, consulta y administra los códigos de registro para nuevos usuarios del sistema.</p>
                        <a href="gestion_accesos.php" class="btn btn-unam-primary w-100 mt-3">
                            Administrar Códigos <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-elevated admin-action-card h-100">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="admin-action-icon metric-icon-azul">
                                <i class="fas fa-users"></i>
                            </div>
                            <span class="admin-action-pill"><?php echo $totalUsuarios; ?> registrados</span>
                        </div>
                        <h3 class="admin-action-title">Gestión de Usuarios</h3>
                        <p class="admin-action-desc flex-grow-1">Busca cuentas, edita roles institucionales y administra el estado de verificación de usuarios.</p>
                        <a href="gestion_usuarios2.php" class="btn btn-unam-primary w-100 mt-3">
                            Administrar Usuarios <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-4">
                <div class="card card-elevated admin-action-card h-100">
                    <div class="card-body d-flex flex-column p-4">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="admin-action-icon metric-icon-verde">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <span class="admin-action-pill"><?php echo $totalClases; ?> activas</span>
                        </div>
                        <h3 class="admin-action-title">Gestión de Clases</h3>
                        <p class="admin-action-desc flex-grow-1">Supervisa y administra las aulas virtuales, materias y grupos creados por los docentes.</p>
                        <a href="gestion_clases.php" class="btn btn-unam-primary w-100 mt-3">
                            Administrar Clases <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php mafi_page_end(); ?>
