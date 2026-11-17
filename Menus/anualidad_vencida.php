<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'      => 'Anualidad Vencida y Fondo de Amortización - MAFI',
    'heading'    => 'Anualidad Vencida y Fondo de Amortización',
    'subtitle'   => 'Cálculo y análisis de anualidad vencida',
    'buttons'    => [
        ['href' => '../Teoria/teoria-anualidad_vencidaF.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
        ['href' => '../Ejemplos/ejemplos_anualidadVF.php', 'label' => 'Ejemplos', 'icon' => 'fas fa-pen-to-square'],
        ['href' => '../Ejercicios/ejercicios-aVF.php', 'label' => 'Ejercicios', 'icon' => 'fas fa-list-check'],
        ['href' => '../Simuladores/simulador_Frv.php', 'label' => 'Simulador', 'icon' => 'fas fa-calculator', 'class' => 'is-gold'],
    ],
    'returnHref' => '../temas.php',
]);
