<?php
/**
 * Configuración global de rutas y constantes de Sistema MAFI.
 */

if (!defined('MAFI_BASE_PATH')) {
    $docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath((string) $_SERVER['DOCUMENT_ROOT']) : false;
    $appRoot = realpath(__DIR__);
    $detectedPath = '/mafi';

    if ($docRoot !== false && $appRoot !== false) {
        $docNorm = str_replace('\\', '/', $docRoot);
        $appNorm = str_replace('\\', '/', $appRoot);
        if (stripos($appNorm, $docNorm) === 0) {
            $rel = trim(substr($appNorm, strlen($docNorm)), '/');
            $detectedPath = $rel === '' ? '' : '/' . $rel;
        }
    }

    define('MAFI_BASE_PATH', $detectedPath);
}

if (!defined('BASE_URL')) {
    if (!empty($_SERVER['HTTP_HOST'])) {
        $isHttps = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
            || (isset($_SERVER['SERVER_PORT']) && (int) $_SERVER['SERVER_PORT'] === 443);
        $scheme = $isHttps ? 'https' : 'http';
        define('BASE_URL', $scheme . '://' . $_SERVER['HTTP_HOST'] . MAFI_BASE_PATH . '/');
    } else {
        define('BASE_URL', 'http://desarrollo.cuautitlan.unam.mx/mafi/');
    }
}

if (!defined('BASE_URL_SYSTEM')) {
    define('BASE_URL_SYSTEM', MAFI_BASE_PATH !== '' ? MAFI_BASE_PATH : '/mafi');
}

if (!function_exists('app_path')) {
    /**
     * Genera una ruta web relativa al root de la aplicación (p. ej. /mafi/temas.php).
     */
    function app_path(string $path = ''): string
    {
        $base = rtrim(MAFI_BASE_PATH, '/');
        $clean = ltrim($path, '/');
        if ($clean === '') {
            return $base === '' ? '/' : $base . '/';
        }
        return ($base === '' ? '' : $base) . '/' . $clean;
    }
}

if (!function_exists('base_url')) {
    /**
     * Genera una URL absoluta usando BASE_URL (útil para enlaces en correos).
     */
    function base_url(string $path = ''): string
    {
        $base = rtrim(BASE_URL, '/');
        $clean = ltrim($path, '/');
        return $clean === '' ? $base . '/' : $base . '/' . $clean;
    }
}
