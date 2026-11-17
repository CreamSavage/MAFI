<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Progresiones - MAFI',
    'heading'    => 'Progresiones',
    'subtitle'   => 'Aritméticas y Geométricas',
    'buttons'    => [
        ['href' => '../Teoria/teoria-progresiones.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_progresiones.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-progresiones.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
    ],
    'returnHref' => '../temas.php',
]);
