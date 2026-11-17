<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Descuento Bancario - MAFI',
    'heading'    => 'Simulador: Descuento Bancario',
    'buttons'    => [
        ['href' => '../Descuento_Bancario/principalD.php', 'label' => 'Principal', 'icon' => 'fas fa-arrow-down'],
        ['href' => '../Descuento_Bancario/valorfinalD.php', 'label' => 'Valor Final', 'icon' => 'fas fa-arrow-up'],
        ['href' => '../Descuento_Bancario/plazoD.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Descuento_Bancario/tasaD.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/descuento_bancario.php',
]);
