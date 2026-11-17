<?php
require_once __DIR__ . '/../includes/bootstrap.php';

if (!empty($_SESSION['id'])) {
    require_once __DIR__ . '/../conexion.php';
    $uid = (int) $_SESSION['id'];
    if ($stmtClear = $conexion->prepare('UPDATE usuarios SET SessionToken = NULL WHERE UsuarioID = ?')) {
        $stmtClear->bind_param('i', $uid);
        $stmtClear->execute();
        $stmtClear->close();
    }
    $conexion->close();
}

$_SESSION = [];
if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
session_destroy();

header('Location: inicio_sesion.php');
exit;
