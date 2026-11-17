<?php
require_once __DIR__ . '/../Login/auth.php';
require_once __DIR__ . '/../includes/menu_template.php';

render_module_menu([
    'title'        => 'Fundamentos - MAFI',
    'heading'      => 'Fundamentos',
    'subtitle'     => 'Base conceptual de Matemáticas Financieras',
    'singleColumn' => true,
    'buttons'      => [
        ['href' => '../Teoria/teoria-fundamentos.php', 'label' => 'Teoría', 'icon' => 'fas fa-book-open'],
    ],
    'returnHref'   => '../temas.php',
]);
