<?php
require_once __DIR__ . '/../Login/auth.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['accion'])) {
    header('Location: configuracion.php');
    exit;
}

if (!verify_csrf()) {
    header('Location: configuracion.php?error=' . urlencode('Sesión de formulario expirada. Intenta nuevamente.'));
    exit;
}

$usuarioID = (int) ($_SESSION['id'] ?? 0);
$accion = (string) $_POST['accion'];

if ($accion === 'actualizar_apariencia') {
    $tema = (string) ($_POST['tema'] ?? 'claro');
    $tamanoFuente = (string) ($_POST['tamano_fuente'] ?? 'normal');

    if (!in_array($tema, ['claro', 'oscuro'], true)) {
        $tema = 'claro';
    }
    if (!in_array($tamanoFuente, ['normal', 'grande', 'extra-grande'], true)) {
        $tamanoFuente = 'normal';
    }

    $stmt = $conexion->prepare('UPDATE usuarios SET Tema = ?, TamanoFuente = ? WHERE UsuarioID = ?');
    $stmt->bind_param('ssi', $tema, $tamanoFuente, $usuarioID);
    $ok = $stmt->execute();
    $stmt->close();

    $param = $ok
        ? 'success=' . urlencode('Configuración de apariencia guardada.')
        : 'error=' . urlencode('Error al guardar la apariencia.');
    header('Location: configuracion.php?' . $param);
    exit;
}

if ($accion === 'actualizar_notificaciones') {
    $notifAnuncios = isset($_POST['notif_anuncios']) ? 1 : 0;
    $notifComentarios = isset($_POST['notif_comentarios']) ? 1 : 0;

    $stmt = $conexion->prepare('UPDATE usuarios SET NotificarAnuncios = ?, NotificarComentarios = ? WHERE UsuarioID = ?');
    $stmt->bind_param('iii', $notifAnuncios, $notifComentarios, $usuarioID);
    $ok = $stmt->execute();
    $stmt->close();

    $param = $ok
        ? 'success=' . urlencode('Preferencias de notificación guardadas.')
        : 'error=' . urlencode('Error al guardar las preferencias.');
    header('Location: configuracion.php?' . $param);
    exit;
}

header('Location: configuracion.php');
exit;
