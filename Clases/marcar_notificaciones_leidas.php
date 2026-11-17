<?php
require_once __DIR__ . '/../Login/auth.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !verify_csrf()) {
    header('Location: ' . app_path('temas.php'));
    exit;
}

$usuarioID = (int) ($_SESSION['id'] ?? 0);

$stmt = $conexion->prepare('UPDATE inscripciones SET UltimaVezVisto = NOW() WHERE UsuarioID = ?');
$stmt->bind_param('i', $usuarioID);
$stmt->execute();
$stmt->close();

$fallback = app_path('temas.php');
$candidate = (string) ($_POST['redirect'] ?? '');

if ($candidate === '' && !empty($_SERVER['HTTP_REFERER'])) {
    $refParts = parse_url($_SERVER['HTTP_REFERER']);
    $host = $_SERVER['HTTP_HOST'] ?? '';
    if (is_array($refParts) && ($refParts['host'] ?? '') === $host && isset($refParts['path'])) {
        $candidate = $refParts['path'] . (isset($refParts['query']) ? '?' . $refParts['query'] : '');
    }
}

$destino = safe_redirect_path($candidate, $fallback);
header('Location: ' . $destino);
exit;
