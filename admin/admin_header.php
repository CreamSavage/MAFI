<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

$pageTitle = $pageTitle ?? 'MAFI Admin - Panel de Administración';
$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$nombreAdmin = (string) ($_SESSION['nombre_completo'] ?? ($_SESSION['nombre'] ?? 'Admin'));
$correoAdmin = (string) ($_SESSION['usuario_correo'] ?? ($_SESSION['correo'] ?? ''));
$appearance = function_exists('mafi_get_user_appearance') ? mafi_get_user_appearance() : ['tema' => 'claro', 'tamano_fuente' => 'normal'];
?>
<!DOCTYPE html>
<html lang="es" data-theme="<?php echo e($appearance['tema']); ?>" data-font-size="<?php echo e($appearance['tamano_fuente']); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#002B7A">
    <title><?php echo e($pageTitle); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(app_path('img/logo_fes.png?v=' . MAFI_ASSET_VERSION)); ?>">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(app_path('assets/css/mafi.css?v=' . MAFI_ASSET_VERSION)); ?>">
</head>
<body>
<header class="header-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo e(app_path('admin/dashboard.php')); ?>">
                <img src="<?php echo e(app_path('img/logo_fes.png?v=' . MAFI_ASSET_VERSION)); ?>" alt="Logo FES Cuautitlán" class="header-logo-fesc">
                <div class="d-flex flex-column align-items-start">
                    <span class="header-brand-inst">Universidad Nacional Autónoma de México</span>
                    <span class="header-brand-fac">FES Cuautitlán · Sistema MAFI</span>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alternar navegación">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                            <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'gestion_accesos.php' ? 'active' : ''; ?>" href="gestion_accesos.php">
                            <i class="fas fa-key me-1"></i>Códigos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'gestion_usuarios2.php' ? 'active' : ''; ?>" href="gestion_usuarios2.php">
                            <i class="fas fa-users me-1"></i>Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $currentPage === 'gestion_clases.php' ? 'active' : ''; ?>" href="gestion_clases.php">
                            <i class="fas fa-chalkboard-teacher me-1"></i>Clases
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(app_path('temas.php')); ?>" title="Ir al sistema principal">
                            <i class="fas fa-home me-1"></i>Inicio
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-oro" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user-shield me-1"></i>
                            <?php echo e($nombreAdmin); ?>
                            <span class="badge-admin">ADMIN</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li class="px-3 py-2 text-muted small border-bottom">
                                <strong><?php echo e($correoAdmin); ?></strong>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Perfil/mi_perfil.php')); ?>"><i class="fas fa-user"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Perfil/configuracion.php')); ?>"><i class="fas fa-cog"></i> Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="<?php echo e(app_path('Login/logout.php')); ?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="page-content-wrapper">
<div class="page-content-wrapper">
