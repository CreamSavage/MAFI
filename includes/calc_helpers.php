<?php
/**
 * Datos y utilidades compartidas para las 28 calculadoras financieras.
 */

$opciones_periodicidad = [
    ['valor' => '1',   'texto' => 'Anual'],
    ['valor' => '2',   'texto' => 'Semestral'],
    ['valor' => '3',   'texto' => 'Cuatrimestral'],
    ['valor' => '4',   'texto' => 'Trimestral'],
    ['valor' => '6',   'texto' => 'Bimestral'],
    ['valor' => '12',  'texto' => 'Mensual'],
    ['valor' => '24',  'texto' => 'Quincenal'],
    ['valor' => '52',  'texto' => 'Semanal'],
    ['valor' => '360', 'texto' => 'Diaria'],
];

$opciones_periodicidad_plural = [
    ['valor' => '1',   'texto' => 'Años'],
    ['valor' => '2',   'texto' => 'Semestres'],
    ['valor' => '3',   'texto' => 'Cuatrimestres'],
    ['valor' => '4',   'texto' => 'Trimestres'],
    ['valor' => '6',   'texto' => 'Bimestres'],
    ['valor' => '12',  'texto' => 'Meses'],
    ['valor' => '24',  'texto' => 'Quincenas'],
    ['valor' => '52',  'texto' => 'Semanas'],
    ['valor' => '360', 'texto' => 'Días'],
];

if (!function_exists('generar_opciones')) {
    /**
     * Imprime las etiquetas <option> de periodicidad de forma uniforme y segura.
     */
    function generar_opciones(array $opciones, string $placeholder = 'Periodicidad'): void
    {
        echo '<option value="" disabled selected hidden>' . htmlspecialchars($placeholder, ENT_QUOTES, 'UTF-8') . '</option>';
        foreach ($opciones as $opcion) {
            echo '<option value="' . htmlspecialchars($opcion['valor'], ENT_QUOTES, 'UTF-8') . '">'
                . htmlspecialchars($opcion['texto'], ENT_QUOTES, 'UTF-8')
                . '</option>';
        }
    }
}
