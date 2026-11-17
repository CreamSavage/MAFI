<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Fondo con Renta Vencida - MAFI',
    'heading'    => 'Valor Futuro con Renta Vencida (Fondo de Amortización)',
    'subtitle'   => 'Simulador de cálculos y tablas de capitalización',
    'buttons'    => [
        ['href' => '../Fondo_RV/valorfuturoRV.php', 'label' => 'Valor Futuro', 'icon' => 'fas fa-arrow-up'],
        ['href' => '../Fondo_RV/rentavencidaF.php', 'label' => 'Renta', 'icon' => 'fas fa-repeat'],
        ['href' => '../Fondo_RV/plazoRV.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Fondo_RV/tasaRV.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/fondo_rv.php',
]);
