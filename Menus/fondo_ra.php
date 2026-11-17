<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Fondo de Amortización con Renta Anticipada - MAFI',
    'heading'    => 'Valor Futuro con Renta Anticipada (Fondo de Amortización)',
    'subtitle'   => 'Valor futuro, renta, tasa, plazo y tablas',
    'buttons'    => [
        ['href' => '../Teoria/teoria-fondora.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_fondora.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-Fa.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
        ['href' => '../Simuladores/simulador_Fra.php', 'label' => 'Simulador', 'icon' => 'fas fa-calculator', 'class' => 'is-gold'],
    ],
    'returnHref' => '../temas.php',
]);
