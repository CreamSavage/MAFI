<?php
// dump_esquema.php
// Script temporal para obtener listado REAL de tablas y columnas de la BD.
// Elimina este archivo después de usarlo.
header('Content-Type: application/json; charset=UTF-8');
require_once __DIR__ . '/../conexion.php';

$resp = [
    'database' => null,
    'timestamp' => date('c'),
    'tables' => [],
    'errors' => []
];

try {
    // Detectar base actual
    if ($res = $conexion->query('SELECT DATABASE() AS db')) {
        $row = $res->fetch_assoc();
        $resp['database'] = $row['db'];
    }

    // Listar tablas
    $tables = [];
    if ($res = $conexion->query('SHOW TABLES')) {
        while ($r = $res->fetch_array()) { $tables[] = $r[0]; }
    } else {
        $resp['errors'][] = 'SHOW TABLES fallo: ' . $conexion->error;
    }

    foreach ($tables as $tbl) {
        $info = [
            'name' => $tbl,
            'columns' => [],
            'create_statement' => null,
            'indexes' => [],
            'engine' => null,
            'collation' => null
        ];
        // DESCRIBE para columnas
        if ($resCols = $conexion->query('DESCRIBE `' . $tbl . '`')) {
            while ($c = $resCols->fetch_assoc()) { $info['columns'][] = $c; }
        } else {
            $resp['errors'][] = 'DESCRIBE ' . $tbl . ' fallo: ' . $conexion->error;
        }
        // SHOW CREATE TABLE
        if ($resCreate = $conexion->query('SHOW CREATE TABLE `' . $tbl . '`')) {
            if ($rowCreate = $resCreate->fetch_assoc()) {
                $createKey = array_keys($rowCreate)[1]; // segundo campo contiene el CREATE
                $info['create_statement'] = $rowCreate[$createKey];
            }
        } else {
            $resp['errors'][] = 'SHOW CREATE TABLE ' . $tbl . ' fallo: ' . $conexion->error;
        }
        // SHOW INDEX
        if ($resIdx = $conexion->query('SHOW INDEX FROM `' . $tbl . '`')) {
            while ($i = $resIdx->fetch_assoc()) { $info['indexes'][] = $i; }
        }
        $resp['tables'][] = $info;
    }
} catch (Throwable $e) {
    $resp['errors'][] = 'Excepcion: ' . $e->getMessage();
}

echo json_encode($resp, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
