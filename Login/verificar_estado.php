<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../conexion.php';

header('Content-Type: application/json; charset=utf-8');
$response = ['status' => 'pendiente'];

if (!empty($_SESSION['usuario_pendiente_verificacion'])) {
    $correo = $_SESSION['usuario_pendiente_verificacion'];
    $stmt = $conexion->prepare('SELECT Estado FROM usuarios WHERE CorreoElectronico = ?');
    $stmt->bind_param('s', $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        if (($usuario['Estado'] ?? '') === 'verificado') {
            $response['status'] = 'verificado';
            unset($_SESSION['usuario_pendiente_verificacion']);
        }
    }
    $stmt->close();
}

echo json_encode($response);
