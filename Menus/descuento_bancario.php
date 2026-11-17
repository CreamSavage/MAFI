<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Descuento Bancario - MAFI',
    'heading'    => 'Descuento Bancario',
    'subtitle'   => 'Cálculo y análisis de descuentos bancarios',
    'buttons'    => [
        ['href' => '../Teoria/teoria-descuento.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_D.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-db.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
        ['href' => '../Simuladores/simulador_db.php', 'label' => 'Simulador', 'icon' => 'fas fa-calculator', 'class' => 'is-gold'],
    ],
    'returnHref' => '../temas.php',
]);
