<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Fondo con Renta Anticipada - MAFI',
    'heading'    => 'Valor Futuro con Renta Anticipada (Fondo de Amortización)',
    'subtitle'   => 'Simulador de cálculos y tablas de capitalización',
    'buttons'    => [
        ['href' => '../Fondo_RA/valorfuturoRA.php', 'label' => 'Valor Futuro', 'icon' => 'fas fa-arrow-up'],
        ['href' => '../Fondo_RA/rentaanticipadaF.php', 'label' => 'Renta', 'icon' => 'fas fa-repeat'],
        ['href' => '../Fondo_RA/plazoRA.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Fondo_RA/tasaRA.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/fondo_ra.php',
]);
