<?php
header('Content-Type: text/plain; charset=utf-8');
echo "PING OK\n";
echo 'SCRIPT: '. __FILE__ ."\n";
echo 'DIR:    '. __DIR__ ."\n";
echo 'URI:    '. ($_SERVER['REQUEST_URI'] ?? '') ."\n";
echo 'HOST:   '. ($_SERVER['HTTP_HOST'] ?? '') ."\n";
echo 'PHP:    '. PHP_VERSION ."\n";
?>
