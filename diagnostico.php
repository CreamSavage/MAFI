<?php
header('Content-Type: text/plain; charset=utf-8');
echo "=== DIAGNÓSTICO DEL SERVIDOR ===\n\n";

echo "1. RUTA ACTUAL DEL SCRIPT:\n";
echo "   __FILE__: " . __FILE__ . "\n";
echo "   __DIR__:  " . __DIR__ . "\n\n";

echo "2. VARIABLES DEL SERVIDOR:\n";
echo "   DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'no definido') . "\n";
echo "   REQUEST_URI:   " . ($_SERVER['REQUEST_URI'] ?? 'no definido') . "\n";
echo "   HTTP_HOST:     " . ($_SERVER['HTTP_HOST'] ?? 'no definido') . "\n";
echo "   SCRIPT_NAME:   " . ($_SERVER['SCRIPT_NAME'] ?? 'no definido') . "\n\n";

echo "3. PHP VERSION: " . PHP_VERSION . "\n\n";

echo "4. CONTENIDO DEL DIRECTORIO ACTUAL:\n";
$files = scandir(__DIR__);
foreach($files as $file) {
    if ($file !== '.' && $file !== '..') {
        $path = __DIR__ . '/' . $file;
        $type = is_dir($path) ? '[DIR]' : '[FILE]';
        echo "   $type $file\n";
    }
}

echo "\n5. BUSCAR conexion.php:\n";
if (file_exists(__DIR__ . '/conexion.php')) {
    echo "   ✓ conexion.php existe en: " . __DIR__ . "/conexion.php\n";
} else {
    echo "   ✗ conexion.php NO existe aquí\n";
}

echo "\n6. BUSCAR config.php:\n";
if (file_exists(__DIR__ . '/config.php')) {
    echo "   ✓ config.php existe en: " . __DIR__ . "/config.php\n";
    require_once __DIR__ . '/config.php';
    if (defined('BASE_URL')) {
        echo "   BASE_URL definida como: " . BASE_URL . "\n";
    }
} else {
    echo "   ✗ config.php NO existe aquí\n";
}

echo "\n7. MÓDULOS PHP:\n";
echo "   mysqli: " . (extension_loaded('mysqli') ? 'INSTALADO' : 'NO INSTALADO') . "\n";
echo "   mbstring: " . (extension_loaded('mbstring') ? 'INSTALADO' : 'NO INSTALADO') . "\n";

echo "\n8. URL SUGERIDA PARA ESTE ARCHIVO:\n";
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'] ?? 'tu-servidor';
$script = $_SERVER['SCRIPT_NAME'] ?? '/diagnostico.php';
echo "   " . $protocol . $host . $script . "\n";

echo "\n=== FIN DEL DIAGNÓSTICO ===\n";
?>
