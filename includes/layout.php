<?php
/**
 * Layout estándar para todas las vistas de Sistema MAFI.
 * Garantiza DOCTYPE válido, carga única de Bootstrap 5.3.3, Font Awesome y mafi.css.
 */

require_once __DIR__ . '/bootstrap.php';

if (!defined('MAFI_ASSET_VERSION')) {
    define('MAFI_ASSET_VERSION', '20261117d');
}

if (!function_exists('mafi_get_user_appearance')) {
    function mafi_get_user_appearance(): array
    {
        $tema = $_SESSION['tema'] ?? null;
        $fuente = $_SESSION['tamano_fuente'] ?? null;

        if (($tema === null || $fuente === null) && !empty($_SESSION['id']) && isset($GLOBALS['conexion']) && $GLOBALS['conexion'] instanceof mysqli) {
            try {
                $uid = (int) $_SESSION['id'];
                $st = $GLOBALS['conexion']->prepare('SELECT Tema, TamanoFuente FROM usuarios WHERE UsuarioID = ? LIMIT 1');
                if ($st) {
                    $st->bind_param('i', $uid);
                    $st->execute();
                    $row = $st->get_result()->fetch_assoc();
                    $st->close();
                    if ($row) {
                        $tema = $row['Tema'] ?? 'claro';
                        $fuente = $row['TamanoFuente'] ?? 'normal';
                        $_SESSION['tema'] = $tema;
                        $_SESSION['tamano_fuente'] = $fuente;
                    }
                }
            } catch (Throwable $e) {
                // Fall back safely to defaults
            }
        }

        if (!in_array($tema, ['claro', 'oscuro'], true)) {
            $tema = 'claro';
        }
        if (!in_array($fuente, ['normal', 'grande', 'extra-grande'], true)) {
            $fuente = 'normal';
        }
        return ['tema' => $tema, 'tamano_fuente' => $fuente];
    }
}

if (!function_exists('mafi_page_start')) {
    function mafi_page_start(string $title, array $options = []): void
    {
        $showHeader  = $options['showHeader'] ?? true;
        $showWrapper = $options['showWrapper'] ?? true;
        $bodyClass   = trim((string) ($options['bodyClass'] ?? ''));
        $useMathJax      = (bool) ($options['mathjax'] ?? false);
        $mathInlineDollar = (bool) ($options['mathjaxInlineDollar'] ?? false);
        $useCalcJs   = (bool) ($options['calcJs'] ?? false);
        $useTocJs    = (bool) ($options['tocJs'] ?? false);
        $extraCss    = $options['extraCss'] ?? [];
        $extraHead   = (string) ($options['extraHead'] ?? '');
        $cssVer      = MAFI_ASSET_VERSION;
        $appearance  = mafi_get_user_appearance();
        ?>
<!DOCTYPE html>
<html lang="es" data-theme="<?php echo e($appearance['tema']); ?>" data-font-size="<?php echo e($appearance['tamano_fuente']); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#002B7A">
    <title><?php echo e($title); ?></title>
    <link rel="icon" type="image/png" href="<?php echo e(app_path('img/logo_fes.png?v=' . $cssVer)); ?>">
    <link rel="apple-touch-icon" href="<?php echo e(app_path('img/logo_fes.png?v=' . $cssVer)); ?>">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com" crossorigin>
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(app_path('assets/css/mafi.css?v=' . $cssVer)); ?>">
<?php foreach ($extraCss as $cssHref): ?>
    <link rel="stylesheet" href="<?php echo e(str_starts_with($cssHref, 'http') ? $cssHref : app_path($cssHref)); ?>">
<?php endforeach; ?>
<?php if ($useMathJax): ?>
<?php if ($mathInlineDollar): ?>
    <script>window.MathJax = { tex: { inlineMath: [['$', '$'], ['\\(', '\\)']] } };</script>
<?php endif; ?>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
<?php endif; ?>
<?php if ($useCalcJs): ?>
    <script src="<?php echo e(app_path('assets/js/calc-core.js?v=' . $cssVer)); ?>"></script>
<?php endif; ?>
<?php if ($useTocJs): ?>
    <script src="<?php echo e(app_path('assets/js/toc.js?v=' . $cssVer)); ?>" defer></script>
<?php endif; ?>
<?php if ($extraHead !== '') { echo $extraHead . "\n"; } ?>
</head>
<body<?php echo $bodyClass !== '' ? ' class="' . e($bodyClass) . '"' : ''; ?>>
<?php
        if ($showHeader) {
            include __DIR__ . '/../header.php';
        }
        if ($showWrapper) {
            echo '<div class="page-content-wrapper">' . "\n";
        }
    }
}

if (!function_exists('mafi_page_end')) {
    function mafi_page_end(array $options = []): void
    {
        $showWrapper = $options['showWrapper'] ?? true;
        $showFooter  = $options['showFooter'] ?? true;
        $extraJs     = $options['extraJs'] ?? [];
        $inlineJs    = (string) ($options['inlineJs'] ?? '');

        if ($showWrapper) {
            echo "</div>\n";
        }
        if ($showFooter) {
            include __DIR__ . '/../footer.php';
        }
        ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?php echo e(app_path('assets/js/mafi-ui.js?v=' . MAFI_ASSET_VERSION)); ?>"></script>
<?php foreach ($extraJs as $jsSrc): ?>
<script src="<?php echo e(str_starts_with($jsSrc, 'http') ? $jsSrc : app_path($jsSrc)); ?>"></script>
<?php endforeach; ?>
<?php if ($inlineJs !== ''): ?>
<script><?php echo "\n" . $inlineJs . "\n"; ?></script>
<?php endif; ?>
</body>
</html>
<?php
    }
}
