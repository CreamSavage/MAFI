<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Progresiones Aritméticas y Geométricas', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejercicios Propuestos: Progresiones Aritméticas y Geométricas
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
                
                <h2 id="ejercicio1">Ejercicio 1. Aplicación de fórmulas de Progresiones</h2>
                <div class="definition-block">
                    <p>Con base a la información proporcionada obtenga los datos faltantes:</p>
                    <ul class="exercise-grid">
                        <li>a) \(a_7 = 7;\ a_8 = 7.75;\ a_9 = 8.5;\ n = 18;\ a_n = ?\)</li>
                        <li>b) \(a_n = 85;\ d = -3.25;\ n = 21;\ a_1 = ?\)</li>
                        <li>c) \(a_1 = 28;\ a_n = 665;\ d = 13;\ n = ?\)</li>
                        <li>d) \(a_{11} = 38;\ a_{41} = 5;\ d = ?\)</li>
                        <li>e) \(a_1 = 550;\ a_2 = 545;\ a_3 = 540;\ n = 50;\ S_n = ?\)</li>
                        <li>f) \(S_{21} = 63,798;\ d = -9;\ a_1 = ?\)</li>
                        <li>g) \(a_1 = 116;\ S_{44} = -18,546;\ d = ?\)</li>
                        <li>h) \(a_1 = -36;\ S_n = -286;\ d = 2;\ n = ?\)</li>
                        <li>i) \(a_{14} = 9,011.2;\ a_{25} = 18,454,937.6;\ r = ?;\ a_1 = ?;\ S_{25} = ?\)</li>
                        <li>j) \(a_1 = -500,000;\ S_n = -24,628,906.25;\ r = 1.5;\ a_n = ?;\ n = ?\)</li>
                        <li>k) \(a_{10} = 20,132.6592;\ r = 0.8;\ a_1 = ?;\ S_{10} = ?\)</li>
                        <li>l) \(a_1 = -36;\ S_{93} = -359.98;\ r = ?\)</li>
                        <li>m) \(a_1 = 14,718;\ S_n = 77,511,717.9929;\ r = 1.2;\ n = ?\)</li>
                        <li>n) \(a_1 = 1,370,000;\ S_n = 2,490,893.44;\ r = 0.45;\ n = ?\)</li>
                        <li>o) \(a_1 = -80;\ S_n = -63,772,880;\ a_n = -42,515,280;\ r = ?;\ n = ?\)</li>
                        <li>p) \(a_1 = 1;\ a_2 = 5;\ a_3 = 25;\ S_n = 61,035,156;\ r = ?;\ n = ?;\ a_n = ?\)</li>
                    </ul>
                </div>

                <h2 id="ejercicio2">Ejercicio 2. Término enésimo \(PA\)</h2>
                <div class="definition-block">
                    <p>Al inicio de un día de labores, un artesano tarda 6 minutos en pintar un artículo; cuando entra en calor, emplea en promedio 1.5 segundos menos cada vez respecto del artículo anterior. Determine cuántas piezas completas logrará pintar en una jornada de 6 horas 45 minutos continuos. ¿cuánto tiempo tardará en pintar el último artículo del día?</p>
                </div>

                <h2 id="ejercicio3">Ejercicio 3. Primer y enésimo Términos \(PA\)</h2>
                <div class="definition-block">
                    <p>Un estudiante trabajó durante sus vacaciones de verano logrando ahorrar \$25 más respecto del día anterior. Si trabajó durante 20 días y ahorró en total \$11,750; ¿cuánto ahorró el primer día? ¿cuánto ahorró el último día?</p>
                </div>

                <h2 id="ejercicio4">Ejercicio 4. Diferencia común y Término enésimo \(PA\)</h2>
                <div class="definition-block">
                    <p>La producción del mes de enero de una fabricante de calzado fue de 7,220 pares. Si al final del año la producción total ascendió a 95,286 pares, determine el incremento mensual de la producción, si este se comportó de una manera constante respecto del mes anterior. ¿cuál fue la producción del mes de diciembre?</p>
                </div>

                <h2 id="ejercicio5">Ejercicio 5. Suma de términos, Término enésimo y número de términos \(PA\)</h2>
                <div class="definition-block">
                    <p>La compañía El Ingenio refina una tonelada de azúcar diariamente. Con base en la modernización de sus instalaciones y contratación de personal, se estima que se refinen 5 kg adicionales respecto del día anterior. ¿cuál será la producción total al término del primer cuatrimestre? ¿cuánto producirá el último día del año? ¿en cuánto tiempo producirá 252,000 kg en total?</p>
                </div>

                <h2 id="ejercicio6">Ejercicio 6. Suma de términos y Término enésimo \(PA\)</h2>
                <div class="definition-block">
                    <p>El gobierno federal anuncia como una medida excepcional un aumento diario de 2¢ en el precio por litro de la gasolina. Si se sabe que el precio del último día del año anterior fue de \$17, ¿cuál será el precio al cabo de un mes, y a final del año? Determine también lo que pagará un automovilista que carga 60 litros en el último día del primer semestre.</p>
                </div>

                <h2 id="ejercicio7">Ejercicio 7. Razón común y Término enésimo \(PG\)</h2>
                <div class="definition-block">
                    <p>La moneda de un país tiene actualmente un tipo de cambio de 13 unidades a 1 respecto al dólar. Para evitar un escenario de emergencia, el país decide devaluar su moneda en 1% cada semana a partir del primer día del año. Determine cuál será el tipo de cambio a final del año. ¿qué porcentaje se devaluó en ese periodo?</p>
                </div>

                <h2 id="ejercicio8">Ejercicio 8. Razón común e Interpolación geométrica \(PG\)</h2>
                <div class="definition-block">
                    <p>Para impulsar las ventas de un producto innovador, el departamento de mercadotecnia de una empresa tecnológica lanza una campaña agresiva de la cual se espera un crecimiento del 3.3% mensual. Si se pronostica una venta del 12avo mes de \$169,785.93, determine: a) las ventas del 1er mes; b) las ventas del último mes del año anterior; c) el total de ventas del año; y d) el porcentaje de incremento anual esperado.</p>
                </div>

                <h2 id="ejercicio9">Ejercicio 9. Razón común y Término enésimo \(PG\)</h2>
                <div class="definition-block">
                    <p>En un estudio de mercado dirigido a personas jóvenes, se encontró una población que creció de 1,344,390 habitantes en el primer año, a 2,993,000 al cabo de 10 años. Determine a) la tasa de crecimiento poblacional anual que se tuvo; b) el pronóstico poblacional para los próximos 10 años.</p>
                </div>

                <h2 id="ejercicio10">Ejercicio 10. Número de Términos \(PG\)</h2>
                <div class="definition-block">
                    <p>Al nacer su primer hijo, un matrimonio invierte \$9,500 en una cuenta bancaria que le garantiza pagar una tasa de interés de 16.99% anual. Si al paso del tiempo se tiene en el banco \$33,336, ¿cuánto tiempo ha transcurrido desde el depósito inicial?</p>
                </div>

                <h2 id="ejercicio11">Ejercicio 11. Razón común \(PG\)</h2>
                <div class="definition-block">
                    <p>Los costos y gastos que genera un negocio familiar ascendieron en el mes de enero a \$22,500, y saben por experiencia que aumentarán a razón de un porcentaje mensual; si tienen un presupuesto anual total de \$298,400.66, determine cuál es el porcentaje de incremento mensual máximo que se puede permitir para cumplir sus planes presupuestales.</p>
                </div>

                <h2 id="respuestas">Respuestas Ejercicios propuestos Progresiones</h2>
                <div class="definition-block">
                    <ul class="exercise-grid">
                        <li><strong>1. a)</strong> \(a_n = 19.75\)</li>
                        <li><strong>b)</strong> \(a_1 = 150\)</li>
                        <li><strong>c)</strong> \(n = 50\)</li>
                        <li><strong>d)</strong> \(d = -1.1\)</li>
                        <li><strong>e)</strong> \(S_n = 21,375\)</li>
                        <li><strong>f)</strong> \(a_1 = 3,128\)</li>
                        <li><strong>g)</strong> \(d = -25\)</li>
                        <li><strong>h)</strong> \(n = 11;\ n = 26\)</li>
                        <li><strong>i)</strong> \(r = 2;\ a_1 = 1.1;\ S_{25} = 36,909,874.10\)</li>
                        <li><strong>j)</strong> \(a_n = -8,542,968.75;\ n = 8\)</li>
                        <li><strong>k)</strong> \(a_1 = 150,000;\ S_{10} = 669,469.3632\)</li>
                        <li><strong>l)</strong> \(r = 0.9\)</li>
                        <li><strong>m)</strong> \(n = 48\)</li>
                        <li><strong>n)</strong> \(n = 15\)</li>
                        <li><strong>o)</strong> \(r = 3;\ n = 13\)</li>
                        <li><strong>p)</strong> \(r = 5;\ n = 12;\ a_n = 48,828,125\)</li>
                    </ul>
                    <p><strong>2.</strong> \(n = 81\) piezas; \(a_{81} = 240\) segundos \(= 4\) minutos</p>
                    <p><strong>3.</strong> \(a_1 = \$350;\ a_{20} = \$825\)</p>
                    <p><strong>4.</strong> \(d = 131\) pares; \(a_{12} = 8,661\) pares</p>
                    <p><strong>5.</strong> \(S_{120} = 156,300\) kg; \(a_{360} = 2,800\) kg; \(n = 175\) días</p>
                    <p><strong>6.</strong> \(a_{30} = \$17.60;\ a_{360} = \$24.20;\ a_{180} = \$20.60\), pagó \$1,236</p>
                    <p><strong>7.</strong> \(a_{52} = 21.81\); devaluación del 67.77% anual</p>
                    <p><strong>8.</strong> a) \(a_1 = \$118,795\); b) \$115,000; c) \(S_{12} = \$1,714,965.64\); d) 47.64% anual</p>
                    <p><strong>9.</strong> a) \(r = 1.093\); tasa del 9.3% anual; b) \(a_{20} = 7,282,967\) habitantes</p>
                    <p><strong>10.</strong> \(n = 8\) años</p>
                    <p><strong>11.</strong> \(r = 1.018\), por lo tanto, la tasa es del 1.8% mensual</p>
                </div>

            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
                <nav class="toc-nav">
                    <ul>
                        <li><a href="#ejercicio1">Ejercicio 1. Aplicación de fórmulas de Progresiones</a></li>
                        <li><a href="#ejercicio2">Ejercicio 2. Término enésimo \(PA\)</a></li>
                        <li><a href="#ejercicio3">Ejercicio 3. Primer y enésimo Términos \(PA\)</a></li>
                        <li><a href="#ejercicio4">Ejercicio 4. Diferencia común y Término enésimo \(PA\)</a></li>
                        <li><a href="#ejercicio5">Ejercicio 5. Suma de términos, Término enésimo y número de términos \(PA\)</a></li>
                        <li><a href="#ejercicio6">Ejercicio 6. Suma de términos y Término enésimo \(PA\)</a></li>
                        <li><a href="#ejercicio7">Ejercicio 7. Razón común y Término enésimo \(PG\)</a></li>
                        <li><a href="#ejercicio8">Ejercicio 8. Razón común e Interpolación geométrica \(PG\)</a></li>
                        <li><a href="#ejercicio9">Ejercicio 9. Razón común y Término enésimo \(PG\)</a></li>
                        <li><a href="#ejercicio10">Ejercicio 10. Número de Términos \(PG\)</a></li>
                        <li><a href="#ejercicio11">Ejercicio 11. Razón común \(PG\)</a></li>
                        <li><a href="#respuestas">Respuestas Ejercicios propuestos Progresiones</a></li>
                    </ul>
                </nav>
            </aside>
    </div>
</div>

<a href="../Menus/progresiones.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
