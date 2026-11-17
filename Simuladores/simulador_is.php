<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Interés Simple - MAFI',
    'heading'    => 'Simulador: Interés Simple',
    'buttons'    => [
        ['href' => '../Interes_Simple/principalIS.php', 'label' => 'Principal', 'icon' => 'fas fa-arrow-down'],
        ['href' => '../Interes_Simple/valorfinalIS.php', 'label' => 'Valor Final', 'icon' => 'fas fa-arrow-up'],
        ['href' => '../Interes_Simple/plazoIS.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Interes_Simple/tasaIS.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/interes_simple.php',
]);
