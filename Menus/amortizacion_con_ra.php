<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Amortización con Renta Anticipada - MAFI',
    'heading'    => 'Valor Presente con Renta Anticipada (Amortización)',
    'subtitle'   => 'Valor presente, renta, tasa, plazo y tablas',
    'buttons'    => [
        ['href' => '../Teoria/teoria-anualidadA.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_amortizacionesra.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-aA.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
        ['href' => '../Simuladores/simulador_ra.php', 'label' => 'Simulador', 'icon' => 'fas fa-calculator', 'class' => 'is-gold'],
    ],
    'returnHref' => '../temas.php',
]);
