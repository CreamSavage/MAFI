<?php
/**
 * Guardia de seguridad de sesión y sincronización de sesión única.
 */

require_once __DIR__ . '/../includes/bootstrap.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || empty($_SESSION['id'])) {
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Por favor, inicia sesión para acceder a esta página.')));
    exit;
}

require_once __DIR__ . '/../conexion.php';

$usuarioIdAuth = (int) $_SESSION['id'];
$stmtAuth = $conexion->prepare(
    'SELECT UsuarioID, Nombres, ApellidoPaterno, ApellidoMaterno, CorreoElectronico, Rol, Estado, SessionToken
     FROM usuarios WHERE UsuarioID = ?'
);
$stmtAuth->bind_param('i', $usuarioIdAuth);
$stmtAuth->execute();
$resAuth = $stmtAuth->get_result();

if ($resAuth->num_rows !== 1) {
    $stmtAuth->close();
    $_SESSION = [];
    session_destroy();
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Tu sesión no es válida. Inicia sesión nuevamente.')));
    exit;
}

$userRow = $resAuth->fetch_assoc();
$stmtAuth->close();

if (($userRow['Estado'] ?? '') !== 'verificado') {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Tu cuenta no está activa o verificada.')));
    exit;
}

if (
    !empty($userRow['SessionToken']) &&
    (empty($_SESSION['session_token']) || !hash_equals((string) $userRow['SessionToken'], (string) $_SESSION['session_token']))
) {
    $_SESSION = [];
    session_destroy();
    header('Location: ' . app_path('Login/inicio_sesion.php?error=' . urlencode('Tu sesión ha sido cerrada porque iniciaste sesión desde otro dispositivo.')));
    exit;
}

sync_session_user($userRow);

$stmtUpdAct = $conexion->prepare('UPDATE usuarios SET UltimaConexion = NOW() WHERE UsuarioID = ?');
$stmtUpdAct->bind_param('i', $usuarioIdAuth);
$stmtUpdAct->execute();
$stmtUpdAct->close();
