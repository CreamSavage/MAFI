<?php
require_once __DIR__ . '/includes/bootstrap.php';
global $conexion;

$nombre_usuario_sesion = $_SESSION['nombre_completo'] ?? ($_SESSION['nombre'] ?? ($_SESSION['usuario_nombres'] ?? 'Invitado'));
$conteo_notificaciones_nuevas = 0;
$notificaciones_para_mostrar = [];

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && !empty($_SESSION['id'])) {
    if (!isset($conexion) || !($conexion instanceof mysqli) || @$conexion->connect_errno) {
        require_once __DIR__ . '/conexion.php';
    }

    $usuarioID_header = (int) $_SESSION['id'];

    $sql_notif = "
        (SELECT 'anuncio' AS Tipo, A.AnuncioID, C.ClaseID, C.Materia, A.Contenido, U_Autor.Nombres AS Autor, A.FechaPublicacion AS Fecha
         FROM anuncios A
         JOIN inscripciones I ON A.ClaseID = I.ClaseID
         JOIN clases C ON A.ClaseID = C.ClaseID
         JOIN usuarios U_Autor ON A.UsuarioID = U_Autor.UsuarioID
         WHERE I.UsuarioID = ? AND I.EstadoInscripcion = 'alumno' AND C.CreadorID != ? AND A.FechaPublicacion > COALESCE(I.UltimaVezVisto, '1970-01-01'))

        UNION

        (SELECT 'comentario' AS Tipo, A.AnuncioID, C.ClaseID, C.Materia, Co.Contenido, U_Autor.Nombres AS Autor, Co.FechaComentario AS Fecha
         FROM comentarios Co
         JOIN anuncios A ON Co.AnuncioID = A.AnuncioID
         JOIN clases C ON A.ClaseID = C.ClaseID
         JOIN inscripciones I ON C.ClaseID = I.ClaseID
         JOIN usuarios U_Autor ON Co.UsuarioID = U_Autor.UsuarioID
         WHERE I.UsuarioID = ? AND C.CreadorID = ? AND Co.UsuarioID != ? AND Co.FechaComentario > COALESCE(I.UltimaVezVisto, '1970-01-01'))

        ORDER BY Fecha DESC";

    if ($stmt_notif = $conexion->prepare($sql_notif)) {
        $stmt_notif->bind_param('iiiii', $usuarioID_header, $usuarioID_header, $usuarioID_header, $usuarioID_header, $usuarioID_header);
        $stmt_notif->execute();
        if ($resultado_notif = $stmt_notif->get_result()) {
            $todas_las_notificaciones = $resultado_notif->fetch_all(MYSQLI_ASSOC);
            $conteo_notificaciones_nuevas = count($todas_las_notificaciones);
            $notificaciones_para_mostrar = array_slice($todas_las_notificaciones, 0, 5);
        }
        $stmt_notif->close();
    }
}

$currentPage = basename($_SERVER['PHP_SELF'] ?? '');
$currentPath = $_SERVER['REQUEST_URI'] ?? '';
$rolActual = strtolower((string) ($_SESSION['usuario_rol'] ?? ($_SESSION['rol'] ?? 'usuario')));

$mapRolBadge = [
    'administrador' => ['bg-warning text-dark', 'ADMIN'],
    'profesor'      => ['bg-success', 'PROF'],
    'alumno'        => ['bg-info text-dark', 'ALUM'],
    'usuario'       => ['bg-secondary', 'USUARIO'],
];
$mapRolDetalle = [
    'administrador' => ['bg-warning text-dark', 'Administrador'],
    'profesor'      => ['bg-success', 'Profesor'],
    'alumno'        => ['bg-info text-dark', 'Alumno'],
    'usuario'       => ['bg-secondary', 'Usuario'],
];
[$claseBadge, $textoBadge]     = $mapRolBadge[$rolActual]   ?? $mapRolBadge['usuario'];
[$claseDetalle, $textoDetalle] = $mapRolDetalle[$rolActual] ?? $mapRolDetalle['usuario'];

$nombreMostrar = trim((string) ($_SESSION['nombre_completo']
    ?? trim(($_SESSION['usuario_nombres'] ?? $nombre_usuario_sesion) . ' ' . ($_SESSION['usuario_apellidop'] ?? ''))));
$correoMostrar = (string) ($_SESSION['usuario_correo'] ?? ($_SESSION['correo'] ?? ''));

$iniciales = '';
$partesNombre = preg_split('/\s+/', trim($nombreMostrar));
if (!empty($partesNombre[0])) $iniciales .= mb_strtoupper(mb_substr($partesNombre[0], 0, 1));
if (!empty($partesNombre[1])) $iniciales .= mb_strtoupper(mb_substr($partesNombre[1], 0, 1));
if ($iniciales === '') $iniciales = 'U';
?>
<header class="header-wrapper">
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand d-flex align-items-center" href="<?php echo e(app_path('temas.php')); ?>">
                <img src="<?php echo e(app_path('img/logo_fes.png?v=' . (defined('MAFI_ASSET_VERSION') ? MAFI_ASSET_VERSION : '20261117c'))); ?>" alt="Logo FES Cuautitlán" class="header-logo-fesc">
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
                        <a class="nav-link <?php echo ($currentPage === 'temas.php') ? 'active' : ''; ?>" href="<?php echo e(app_path('temas.php')); ?>">Inicio</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownModulos" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-th-large me-1"></i>Módulos
                        </a>
                        <ul class="dropdown-menu dropdown-menu-modulos dropdown-menu-end" aria-labelledby="navbarDropdownModulos">
                            <li><h6 class="dropdown-header text-uppercase fw-bold">Conceptos y Operaciones</h6></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/fundamentos.php')); ?>"><i class="fas fa-book me-2 text-warning"></i>Fundamentos</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/interes_simple.php')); ?>"><i class="fas fa-calculator me-2 text-warning"></i>Interés Simple</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/interes_compuesto.php')); ?>"><i class="fas fa-chart-line me-2 text-warning"></i>Interés Compuesto</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/descuento_bancario.php')); ?>"><i class="fas fa-receipt me-2 text-warning"></i>Descuento Bancario</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><h6 class="dropdown-header text-uppercase fw-bold">Anualidades y Tablas</h6></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/amortizacion_con_rv.php')); ?>"><i class="fas fa-file-invoice-dollar me-2 text-warning"></i>Amortización (Renta Vencida)</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/amortizacion_con_ra.php')); ?>"><i class="fas fa-hand-holding-dollar me-2 text-warning"></i>Amortización (Renta Anticipada)</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/fondo_rv.php')); ?>"><i class="fas fa-piggy-bank me-2 text-warning"></i>Fondo de Ahorro (Renta Vencida)</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Menus/fondo_ra.php')); ?>"><i class="fas fa-piggy-bank me-2 text-warning"></i>Fondo de Ahorro (Renta Anticipada)</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($currentPath, '/Clases/') !== false) ? 'active' : ''; ?>" href="<?php echo e(app_path('Clases/gestion_clases.php')); ?>">Mis Clases</a>
                    </li>

                    <?php if ($rolActual === 'administrador'): ?>
                    <li class="nav-item">
                        <a class="nav-link <?php echo (strpos($currentPath, '/admin/') !== false) ? 'active' : ''; ?>" href="<?php echo e(app_path('admin/dashboard.php')); ?>" title="Panel de Administración">
                            <i class="fas fa-shield-alt me-1"></i>Admin
                        </a>
                    </li>
                    <?php endif; ?>

                    <li class="nav-item dropdown nav-item-notificacion">
                        <a class="nav-link dropdown-toggle nav-link-oro" href="#" id="navbarDropdownNotif" role="button" data-bs-toggle="dropdown" aria-expanded="false" title="Notificaciones">
                            <i class="fas fa-bell"></i>
                            <?php if ($conteo_notificaciones_nuevas > 0): ?>
                                <span class="notificacion-punto" aria-label="Notificaciones nuevas"></span>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-notif p-0" aria-labelledby="navbarDropdownNotif">
                            <li class="p-3 pb-2 d-flex justify-content-between align-items-center gap-2">
                                <h6 class="mb-0 fw-bold">Notificaciones</h6>
                                <?php if ($conteo_notificaciones_nuevas > 0): ?>
                                <form method="POST" action="<?php echo e(app_path('Clases/marcar_notificaciones_leidas.php')); ?>" class="m-0">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="redirect" value="<?php echo e($currentPath !== '' ? $currentPath : app_path('temas.php')); ?>">
                                    <button type="submit" class="btn btn-sm btn-marcar-leido">Marcar todas como leídas</button>
                                </form>
                                <?php endif; ?>
                            </li>

                            <?php if (count($notificaciones_para_mostrar) > 0): ?>
                                <?php foreach ($notificaciones_para_mostrar as $notif): ?>
                                    <li>
                                        <a class="dropdown-item dropdown-item-notif" href="<?php echo e(app_path('Clases/ver_clase.php?clase_id=' . (int) $notif['ClaseID'])); ?>">
                                            <div class="notif-materia"><?php echo e($notif['Materia']); ?></div>
                                            <div class="notif-autor">
                                                <?php echo ($notif['Tipo'] === 'anuncio') ? 'Nuevo anuncio de ' : 'Nuevo comentario de '; ?>
                                                <?php echo e($notif['Autor']); ?>
                                            </div>
                                            <div class="notif-contenido"><?php echo e($notif['Contenido']); ?></div>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li><p class="text-center text-muted p-3 mb-0">No tienes notificaciones nuevas.</p></li>
                            <?php endif; ?>

                            <li><hr class="dropdown-divider my-0"></li>
                            <li><a class="dropdown-item text-center small text-primary p-2" href="<?php echo e(app_path('Clases/gestion_clases.php')); ?>">Ver todas mis clases</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle nav-link-oro d-flex align-items-center" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="mafi-user-avatar me-1"><?php echo e($iniciales); ?></span>
                            <span class="d-none d-sm-inline"><?php echo e($nombreMostrar); ?></span>
                            <span class="badge <?php echo e($claseBadge); ?> ms-1 mafi-role-pill"><?php echo e($textoBadge); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li class="px-3 py-2 text-muted small border-bottom">
                                <strong><?php echo e($correoMostrar); ?></strong><br>
                                <span class="badge <?php echo e($claseDetalle); ?> mt-1"><?php echo e($textoDetalle); ?></span>
                            </li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Perfil/mi_perfil.php')); ?>"><i class="fas fa-user"></i> Mi Perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Perfil/configuracion.php')); ?>"><i class="fas fa-cog"></i> Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo e(app_path('Login/logout.php')); ?>"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
