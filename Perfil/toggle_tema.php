<?php
require_once __DIR__ . '/../Login/auth.php';

header('Content-Type: application/json; charset=UTF-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Método no permitido']);
    exit;
}

$token = (string) ($_POST['csrf_token'] ?? ($_SERVER['HTTP_X_CSRF_TOKEN'] ?? ''));
if (!verify_csrf($token)) {
    http_response_code(403);
    echo json_encode(['ok' => false, 'error' => 'Token CSRF inválido']);
    exit;
}

$tema = (string) ($_POST['tema'] ?? '');
if (!in_array($tema, ['claro', 'oscuro'], true)) {
    $actual = (string) ($_SESSION['tema'] ?? 'claro');
    $tema = ($actual === 'oscuro') ? 'claro' : 'oscuro';
}

$usuarioID = (int) ($_SESSION['id'] ?? 0);
if ($usuarioID > 0 && isset($conexion) && $conexion instanceof mysqli) {
    $stmt = $conexion->prepare('UPDATE usuarios SET Tema = ? WHERE UsuarioID = ?');
    if ($stmt) {
        $stmt->bind_param('si', $tema, $usuarioID);
        $stmt->execute();
        $stmt->close();
    }
}

$_SESSION['tema'] = $tema;
echo json_encode(['ok' => true, 'tema' => $tema]);
exit;
