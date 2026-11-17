<?php
require_once __DIR__ . '/menu_template.php';

if (!function_exists('render_simulador_hub')) {
    /**
     * Renderiza la pantalla estándar de selección de fórmulas para cada Simulador.
     */
    function render_simulador_hub(array $config): void
    {
        if (empty($config['subtitle'])) {
            $config['subtitle'] = 'Sistema MAFI - UNAM FES Cuautitlán';
        }
        render_module_hub($config);
    }
}
