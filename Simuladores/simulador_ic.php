<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Interés Compuesto - MAFI',
    'heading'    => 'Simulador: Interés Compuesto',
    'buttons'    => [
        ['href' => '../Interes_Compuesto/principalIC.php', 'label' => 'Principal', 'icon' => 'fas fa-arrow-down'],
        ['href' => '../Interes_Compuesto/valorfinalIC.php', 'label' => 'Valor Final', 'icon' => 'fas fa-arrow-up'],
        ['href' => '../Interes_Compuesto/plazoIC.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Interes_Compuesto/tasaIC.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/interes_compuesto.php',
]);
