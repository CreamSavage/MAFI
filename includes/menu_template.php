<?php
require_once __DIR__ . '/layout.php';

if (!function_exists('render_module_hub')) {
    /**
     * Renderiza el contenedor estándar para Menús de tema y Simuladores.
     */
    function render_module_hub(array $config): void
    {
        $pageTitle   = (string) ($config['title'] ?? 'Sistema MAFI');
        $heading     = (string) ($config['heading'] ?? '');
        $subtitle    = (string) ($config['subtitle'] ?? '');
        $buttons     = $config['buttons'] ?? [];
        $returnHref  = (string) ($config['returnHref'] ?? '../temas.php');
        $returnLabel = (string) ($config['returnLabel'] ?? 'Regresar');
        $gridStyle   = !empty($config['singleColumn']) ? ' style="grid-template-columns: 1fr; max-width: 520px;"' : '';

        mafi_page_start($pageTitle);
        ?>
<div class="module-shell">
    <div class="module-panel">
        <header class="module-header-banner">
            <h1><?php echo e($heading); ?></h1>
            <?php if ($subtitle !== ''): ?>
                <p><?php echo e($subtitle); ?></p>
            <?php endif; ?>
        </header>

        <main>
            <div class="module-button-grid"<?php echo $gridStyle; ?>>
                <?php foreach ($buttons as $btn): ?>
                    <?php
                    $extraCls = trim((string) ($btn['class'] ?? ''));
                    $btnClass = 'module-btn' . ($extraCls !== '' ? ' ' . $extraCls : '');
                    $icon     = trim((string) ($btn['icon'] ?? ''));
                    ?>
                    <a href="<?php echo e($btn['href']); ?>" class="<?php echo e($btnClass); ?>">
                        <?php if ($icon !== ''): ?>
                            <i class="<?php echo e($icon); ?>"></i>
                        <?php endif; ?>
                        <span><?php echo e($btn['label']); ?></span>
                    </a>
                <?php endforeach; ?>

                <a href="<?php echo e($returnHref); ?>" class="module-btn is-return">
                    <i class="fas fa-arrow-left"></i>
                    <span><?php echo e($returnLabel); ?></span>
                </a>
            </div>
        </main>
    </div>
</div>
<?php
        mafi_page_end();
    }
}

if (!function_exists('render_module_menu')) {
    function render_module_menu(array $config): void
    {
        render_module_hub($config);
    }
}
