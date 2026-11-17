<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Fondo de Amortización con Renta Vencida - MAFI',
    'heading'    => 'Valor Futuro con Renta Vencida (Fondo de Amortización)',
    'subtitle'   => 'Valor futuro, renta, tasa, plazo y tablas',
    'buttons'    => [
        ['href' => '../Teoria/teoria-fondorv.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_fondorv.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-Fv.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
        ['href' => '../Simuladores/simulador_Frv.php', 'label' => 'Simulador', 'icon' => 'fas fa-calculator', 'class' => 'is-gold'],
    ],
    'returnHref' => '../temas.php',
]);
