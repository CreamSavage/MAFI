<?php
/**
 * TEST DE CONEXIÓN A MYSQL
 * Elimina este archivo cuando valides la conexión.
 */

$host = 'localhost';
$usuario = 'MAFI';
$contrasena = 'meteora'; // contraseña del usuario MySQL
$base = 'mafi';
$puerto = 3306; // cambiar si tu hosting usa otro

mysqli_report(MYSQLI_REPORT_OFF);
$mysqli = @new mysqli($host, $usuario, $contrasena, $base, $puerto);
header('Content-Type: text/html; charset=utf-8');

echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Test conexión</title>';
echo '<style>body{font-family:Arial;margin:40px;background:#f7f7f7}h1{margin-top:0}.ok{background:#d4edda;padding:10px;border:1px solid #c3e6cb;color:#155724;border-radius:4px}.err{background:#f8d7da;padding:10px;border:1px solid #f5c6cb;color:#721c24;border-radius:4px}.info{background:#d1ecf1;padding:10px;border:1px solid #bee5eb;color:#0c5460;border-radius:4px}code{background:#eee;padding:2px 4px;border-radius:3px}</style>';
echo '</head><body>';
echo '<h1>🔌 Test de conexión MySQL</h1>';

echo '<div class="info"><strong>Host:</strong> '.htmlspecialchars($host).' | <strong>Usuario:</strong> '.htmlspecialchars($usuario).' | <strong>BD:</strong> '.htmlspecialchars($base).' | <strong>Puerto:</strong> '.$puerto.'</div>';

if ($mysqli->connect_error) {
    echo '<div class="err"><h2>❌ Falló la conexión</h2>';
    echo '<p><strong>Error:</strong> '.htmlspecialchars($mysqli->connect_error).' (Código '.$mysqli->connect_errno.')</p>';
    echo '<h3>Posibles causas:</h3><ul>';
    if (strpos($mysqli->connect_error,'Access denied')!==false) {
        echo '<li>Usuario o contraseña incorrectos.</li><li>El usuario no tiene permisos sobre la base.</li>';
    } elseif (strpos($mysqli->connect_error,'Unknown database')!==false) {
        echo '<li>La base <code>'.htmlspecialchars($base).'</code> no existe o el nombre es distinto.</li>';
    } elseif (strpos($mysqli->connect_error,"Can't connect")!==false) {
        echo '<li>Host o puerto incorrecto.</li><li>MySQL posiblemente no está levantado.</li>';
    } else {
        echo '<li>Revisar los logs del servidor para más detalle.</li>';
    }
    echo '</ul></div>';
    exit('</body></html>');
}

echo '<div class="ok"><h2>✅ Conexión establecida correctamente</h2></div>';

// Verificar base activa
$res = $mysqli->query('SELECT DATABASE()');
if ($res) {
    $row = $res->fetch_row();
    echo '<div class="ok">Base seleccionada: <code>'.htmlspecialchars($row[0]).'</code></div>';
}

// Listar tablas
$tablas = $mysqli->query('SHOW TABLES');
if ($tablas && $tablas->num_rows > 0) {
    echo '<div class="info"><strong>Tablas ('.$tablas->num_rows.'):</strong><ul style="margin:5px 0 0 18px;">';
    while ($t = $tablas->fetch_row()) {
        echo '<li>'.htmlspecialchars($t[0]).'</li>';
    }
    echo '</ul></div>';
} else {
    echo '<div class="err">No se encontraron tablas. ¿Importaste el esquema SQL?</div>';
}

// Charset
echo '<div class="info">Charset actual: <code>'.$mysqli->character_set_name().'</code></div>';
$mysqli->set_charset('utf8mb4');
echo '<div class="info">Charset forzado a: <code>utf8mb4</code></div>';

// Probar una consulta mínima si existe alguna tabla estándar
$pruebaHecha = false;
if (isset($t) && !empty($t[0])) {
    $tabla = $t[0]; // última tabla iterada
    $qTest = $mysqli->query('SELECT COUNT(*) FROM `'.$tabla.'`');
    if ($qTest) {
        $c = $qTest->fetch_row();
        echo '<div class="ok">Registros en <code>'.$tabla.'</code>: '.$c[0].'</div>';
        $pruebaHecha = true;
    }
}
if (!$pruebaHecha) {
    echo '<div class="info">No se ejecutó consulta de conteo porque no hay tablas o falló la iteración.</div>';
}

$mysqli->close();

echo '<hr><p style="font-size:12px;color:#555">Elimina <code>test_conexion.php</code> después de validar para evitar exponer detalles.</p>';
echo '</body></html>';
?>
