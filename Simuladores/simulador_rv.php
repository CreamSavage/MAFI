<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/simulador_template.php';

render_simulador_hub([
    'title'      => 'Simulador: Amortización con Renta Vencida - MAFI',
    'heading'    => 'Valor Presente con Renta Vencida (Amortización)',
    'subtitle'   => 'Simulador de cálculos y tablas de amortización',
    'buttons'    => [
        ['href' => '../Amortizacion_con_RV/valorpresenteRV.php', 'label' => 'Valor Presente', 'icon' => 'fas fa-arrow-down'],
        ['href' => '../Amortizacion_con_RV/rentavencidaA.php', 'label' => 'Renta', 'icon' => 'fas fa-repeat'],
        ['href' => '../Amortizacion_con_RV/plazoRV.php', 'label' => 'Plazo', 'icon' => 'fas fa-hourglass-half'],
        ['href' => '../Amortizacion_con_RV/tasaRV.php', 'label' => 'Tasa', 'icon' => 'fas fa-percent'],
    ],
    'returnHref' => '../Menus/amortizacion_con_rv.php',
]);
