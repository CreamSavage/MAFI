<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Progresiones Aritméticas y Geométricas', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejemplos Explicados: Progresiones Aritméticas y Geométricas</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
                
                <!-- ==================== EJEMPLOS ==================== -->
                <h2 id="ejemplo1">Ejemplo 1. Progresión finita creciente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Progresión finita creciente: $1,\ 3,\ 5,\ 7,\ 9$</p>
                    <p>Notación: $a_{1},\ a_{2},\ a_{3},\ a_{4},\ a_{5} = a_{n}$</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo2">Ejemplo 2. Progresión infinita decreciente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Progresión infinita decreciente: $16,\ 8,\ 4,\ 2\ldots$</p>
                    <p>Notación: $a_{1},\ a_{2},\ a_{3},\ a_{4}\ldots = a_{n}$</p>
                    <p>Los puntos suspensivos denotan una serie sin fin.</p>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo3">Ejemplo 3. Diferencia o razón común</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>De la serie \(1, 3, 5, 7, 9\), determine si existe diferencia o razón común.</p>
                    <p>Como los términos son consecutivos podemos obtener \(d\) o \(r\), eligiendo cualquier término menos o entre su antecesor:</p>
                    <div class="formula-display">
                        $$d = 9 - 7 = 2;\quad d = 3 - 1 = 2;\quad d = 5 - 3 = 2;\quad \text{es diferencia común}$$
                        $$r = \frac{9}{7} = 1.28\ldots;\quad r = \frac{7}{5} = 1.4;\quad r = \frac{3}{1} = 3;\quad \text{no es razón común}$$
                    </div>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo4">Ejemplo 4. Diferencia o razón común</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>De la serie \(16,\ 8,\ 4,\ 2,\ \ldots\), determine si existe diferencia o razón común.</p>
                    <p>Aunque la serie sea infinita, se puede trabajar con cualesquiera dos términos conocidos:</p>
                    <div class="formula-display">
                        $$d = 4 - 8 = -4;\quad d = 8 - 16 = -8;\quad d = 2 - 4 = -2;\quad \text{no es diferencia común}$$
                        $$r = \frac{2}{4} = 0.5;\quad r = \frac{4}{8} = 0.5;\quad r = \frac{8}{16} = 0.5;\quad \text{es razón común}$$
                    </div>
                    <p>En el ejemplo 3 al existir una diferencia común \(d = 2\), se considera una \(PA\). Si se desea obtener el siguiente término, se debe sumar al término deseado \(d\). Por ejemplo:</p>
                    <p><strong>Serie 1:</strong> \(a_n + d = 9 + 2 = 11;\quad 11 + 2 = 13,\ \text{etc.}\)</p>
                    <p>En el ejemplo 4, al existir una razón común \(r = 0.5\), se considera una \(PG\). Si se desea obtener el siguiente término, se debe multiplicar el término deseado por \(r\).</p>
                    <p><strong>Serie 2:</strong> \(a_n \times r = 2 \times 0.5 = 1;\quad 1 \times 0.5 = 0.5,\ \text{etc.}\)</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo5">Ejemplo 5. Identificación de términos \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PA\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(50,\ 45,\ 40,\ 35,\ 30,\ 25,\ 20.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 50;\ a_n = 20;\ n = 7;\ d = 45 - 50 = -5;\ d = 20 - 25 = -5\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$a_n = a_1 + (n - 1)d$$
                        $$a_n = 50 + (7 - 1)(-5) = 50 + 6 \times (-5) = 50 - 30 = 20$$
                        $$a_1 = a_n - (n - 1)d$$
                        $$a_1 = 20 - (7 - 1)(-5) = 20 - 6 \times (-5) = 20 + 30 = 50$$
                        $$d = \frac{a_n - a_1}{n - 1} = \frac{20 - 50}{7 - 1} = \frac{-30}{6} = -5$$
                        $$n = \frac{a_n - a_1}{d} + 1 = \frac{20 - 50}{-5} + 1 = \frac{-30}{-5} + 1 = 6 + 1 = 7$$
                    </div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo6">Ejemplo 6. Identificación de términos \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PA\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(3,\ 6,\ 9,\ 12,\ 15,\ 18.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 3;\ a_n = 18;\ n = 6;\ S_n = 3 + 6 + 9 + 12 + 15 + 18 = 63\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$S_n = \frac{n}{2}(a_1 + a_n) = \frac{6}{2}(3 + 18) = 3 \times 21 = 63$$
                        $$a_1 = \frac{2S_n}{n} - a_n = \frac{2 \times 63}{6} - 18 = \frac{126}{6} - 18 = 21 - 18 = 3$$
                        $$a_n = \frac{2S_n}{n} - a_1 = \frac{126}{6} - 3 = 21 - 3 = 18$$
                        $$n = \frac{2S_n}{a_1 + a_n} = \frac{2 \times 63}{3 + 18} = \frac{126}{21} = 6$$
                    </div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo7">Ejemplo 7. Identificación de términos \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PA\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(80,\ 65,\ 50,\ 35,\ 20.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 80;\ a_n = 20;\ n = 5;\ d = 65 - 80 = -15;\ d = 35 - 50 = -15\)</p>
                    <p>\(S_n = 80 + 65 + 50 + 35 + 20 = 250\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$S_n = \frac{n}{2} \left(2a_1 + (n-1)d\right)$$
                        $$S_n = \frac{5}{2} \times \left(2 \times 80 + (5-1) \times (-15)\right) = 2.5 \left(160 + 4(-15)\right)$$
                        $$S_n = 2.5 \left(160 + (-60)\right) = 2.5(100) = 250$$
                        $$a_1 = \frac{S_n}{n} - \frac{(n-1)d}{2}$$
                        $$a_1 = \frac{250}{5} - \frac{(5-1)(-15)}{2} = 50 - \frac{-60}{2} = 50 + 30 = 80$$
                        $$d = \frac{2(S_n - a_1 n)}{n^2 - n}$$
                        $$d = \frac{2(250 - 80 \times 5)}{5^2 - 5} = \frac{2(250 - 400)}{25 - 5}$$
                        $$d = \frac{2 \times (-150)}{20} = \frac{-300}{20} = -15$$
                    </div>
                    <h4>n por fórmula general:</h4>
                    <div class="formula-display">
                        $$d n^2 + n(2a_1 - d) - 2S_n = 0$$
                        $$-15 n^2 + n(2 \times 80 - (-15)) - 2 \times 250 = 0$$
                        $$-15 n^2 + n(160 + 15) - 500 = 0$$
                        $$-15 n^2 + 175 n - 500 = 0$$
                        $$a = -15;\quad b = 175;\quad c = -500$$
                    </div>
                    <div class="formula-display">
                        $$n = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a}$$
                        $$n = \frac{-175 \pm \sqrt{175^2 - 4(-15)(-500)}}{2(-15)}$$
                        $$n = \frac{-175 \pm \sqrt{625}}{-30} = \frac{-175 \pm 25}{-30}$$
                        $$n_1 = \frac{-175 + 25}{-30} = \frac{-150}{-30} = 5$$
                        $$n_2 = \frac{-175 - 25}{-30} = \frac{-200}{-30} = 6.66\ldots$$
                    </div>
                    <p>Aunque el resultado de \(n_2\) también cumple con la fórmula de \(S_n\), es claro que no corresponde con la interpretación del número de términos por no ser un número entero.</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo8">Ejemplo 8. Interpolación aritmética \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>El 5° término de una \(PA\) es 9, y el 11° es 18. Calcule el valor de los términos faltantes. Otra redacción puede ser Interpole 5 términos entre el 9 y 18, de tal manera que juntos conformen una \(PA\).</p>
                    <p>En este caso, la cardinalidad de los términos se puede adecuar a las fórmulas ya estudiadas.</p>
                    <p><strong>Datos:</strong> \(a_5 = a_1 = 9;\ a_{11} = a_n = 18;\ \text{desde } a_5 \text{ hasta } a_{11},\ n = 7;\ d = ?\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$d = \frac{a_n - a_1}{n - 1} = \frac{18 - 9}{7 - 1} = \frac{9}{6} = 1.5$$
                    </div>
                    <p><strong>Términos restantes:</strong></p>
                    <p>\(a_5 = 9;\ a_6 = 9 + 1.5 = 10.5;\ a_7 = 10.5 + 1.5 = 12;\ a_8 = 12 + 1.5 = 13.5\)</p>
                    <p>\(a_9 = 13.5 + 1.5 = 15;\ a_{10} = 15 + 1.5 = 16.5;\ a_{11} = 16.5 + 1.5 = 18\)</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo9">Ejemplo 9. Término enésimo y número de términos de una \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Un profesionista a punto del retiro, decide aumentar su pensión ahorrando desde el primer trimestre \$5,000, y aumentando en \$1,000 cada trimestre posterior. ¿En cuánto tiempo logrará reunir \$200,000? ¿A cuánto ascenderá el último ahorro para alcanzarlos?</p>
                    
                    <h4>Definición de variables:</h4>
                    <p>\(a_n =\) ahorro trimestral del enésimo periodo</p>
                    <p>\(S_n =\) ahorro acumulado hasta el enésimo periodo</p>
                    
                    <h4>Determinación de los 3 primeros términos de la sucesión:</h4>
                    <p>\(a_1 = 5,000;\ a_2 = 5,000 + 1,000 = 6,000;\ a_3 = 6,000 + 1,000 = 7,000\)</p>
                    
                    <h4>Calcular diferencia común:</h4>
                    <p>\(d = 6,000 - 5,000 = 1,000;\ d = 7,000 - 6,000 = 1,000\)</p>
                    <p>Al existir una diferencia se procede como una \(PA\)</p>
                    
                    <h4>Datos:</h4>
                    <p>\(a_1 = 5,000;\ d = 1,000;\ n = ?\ \text{trimestres};\ S_n = 200,000\)</p>
                    
                    <h4>Solución (número de términos):</h4>
                    <div class="formula-display">
                        $$d n^2 + n(2a_1 - d) - 2S_n = 0$$
                        $$1,000 n^2 + n(2 \times 5,000 - 1,000) - 2 \times 200,000 = 0$$
                        $$1,000 n^2 + n(10,000 - 1,000) - 400,000 = 0$$
                        $$1,000 n^2 + 9,000 n - 400,000 = 0$$
                        $$a = 1,000;\quad b = 9,000;\quad c = -400,000$$
                    </div>
                    <div class="formula-display">
                        $$n = \frac{-b \pm \sqrt{b^2 - 4ac}}{2a} = \frac{-9,000 \pm \sqrt{9,000^2 - 4(1,000)(-400,000)}}{2(1,000)}$$
                        $$n = \frac{-9,000 \pm \sqrt{81,000,000 + 1,600,000,000}}{2,000} = \frac{-9,000 \pm \sqrt{1,681,000,000}}{2,000}$$
                        $$n = \frac{-9,000 \pm 41,000}{2,000}$$
                        $$n_1 = \frac{-9,000 + 41,000}{2,000} = \frac{32,000}{2,000} = 16\ \text{trimestres}$$
                        $$n_2 = \frac{-9,000 - 41,000}{2,000} = \frac{-50,000}{2,000} = -25,000$$
                    </div>
                    <p>Aunque el resultado de \(n_2\) también cumple con la fórmula de \(S_n\), no corresponde con la interpretación del número de términos del problema por ser un número negativo.</p>
                    
                    <h4>Solución (último ahorro):</h4>
                    <p><strong>Datos:</strong> \(a_1 = 5,000;\ d = 1,000;\ n = 16\) trimestres; \(a_n = ?\)</p>
                    <div class="formula-display">
                        $$a_n = a_1 + (n - 1)d$$
                        $$a_n = 5,000 + (16 - 1)(1,000)$$
                        $$a_n = 5,000 + 15(1,000) = 20,000$$
                    </div>
                    <div class="result-box">Con lo cual se concluye podrá reunir \$200,000 en 4 años (16 trimestres), y el último ahorro tendrá que ser de \$20,000.</div>
                </div>

                <div class="section-divider"></div>

                               <h2 id="ejemplo10">Ejemplo 10. Primer Término de una \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Una fábrica de electrodomésticos observó en el año en curso que su costo de electricidad tuvo un incremento de \$1,150 mensuales. Si al cabo de un año pagó en total \$537,300 por ese concepto, determine el costo de electricidad del mes de octubre.</p>
                    <p>Como los datos son relativos a un total anual, primeramente se obtendrá \(a_1\)</p>
                    <p><strong>Datos:</strong> \(a_1 = ?;\ d = 1,150;\ n = 12\) meses; \(S_n = 537,300\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$a_1 = \frac{S_n}{n} - \frac{(n-1)d}{2} = \frac{537,300}{12} - \frac{(12-1)(1,150)}{2}$$
                        $$a_1 = 44,775 - \frac{12,650}{2} = 44,775 - 6,325 = 38,450$$
                    </div>
                    <p>Ahora se procede a obtener el costo de octubre \(a_{10}\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 38,450;\ d = 1,150;\ n = 10\) meses; \(a_n = ?\)</p>
                    <div class="formula-display">
                        $$a_n = a_1 + (n-1)d$$
                        $$a_{10} = 38,450 + (10-1)(1,150) = 38,450 + 10,350 = 48,800$$
                    </div>
                    <div class="result-box">El costo de electricidad de octubre es de \$48,800</div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo11">Ejemplo 11. Diferencia común de una \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Una revista de contenido digital cuenta con 61,500 suscriptores en el primer mes del año; si su meta es finalizar el año con 100,000 suscriptores, ¿cuántos suscriptores necesita aumentar cada mes para lograrlo?</p>
                    <p>Definiendo \(a_n\) como el número de suscriptores en cualquier momento, tenemos:</p>
                    <p><strong>Datos:</strong> \(a_1 = 61,500;\ d = ?;\ n = 12\) meses; \(a_n = 100,000\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$d = \frac{a_n - a_1}{n-1} = \frac{100,000 - 61,500}{12 - 1} = \frac{38,500}{11} = 3,500$$
                    </div>
                    <div class="result-box">Necesita aumentar 3,500 suscriptores mensualmente</div>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo12">Ejemplo 12. Diferencia común de una \(PA\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Una fábrica productora de envases plásticos tiene un presupuesto de producción anual de 499,500 unidades; si la producción del primer bimestre es de 49,000 envases, determine el incremento bimestral de envases a producir para alcanzar su meta.</p>
                    <p>Definiendo a \(a_n\) como producción de envases en cualquier momento, tenemos:</p>
                    <p><strong>Datos:</strong> \(a_1 = 49,000;\ d = ?;\ n = 6\) bimestres; \(S_n = 499,500\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$d = \frac{2(S_n - a_1 n)}{n^2 - n} = \frac{2(499,500 - 49,000 \times 6)}{6^2 - 6}$$
                        $$d = \frac{2(499,500 - 294,000)}{36 - 6} = \frac{2(205,500)}{30} = \frac{411,000}{30} = 13,700$$
                    </div>
                    <div class="result-box">El incremento bimestral es de 13,700 envases</div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo13">Ejemplo 13. Identificación de términos \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PG\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(459,\ 153,\ 51,\ 17.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 459;\ a_n = 17;\ n = 4;\ r = \frac{153}{459} = \frac{1}{3};\ r = \frac{17}{51} = \frac{1}{3}\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$a_n = a_1 r^{n-1} = 459 \left(\frac{1}{3}\right)^{4-1}$$
                        $$a_n = 459 \left(\frac{1}{3}\right)^3 = 459 \times \frac{1}{27} = 17$$
                        $$a_1 = \frac{a_n}{r^{n-1}} = \frac{17}{\left(\frac{1}{3}\right)^{4-1}} = \frac{17}{\left(\frac{1}{3}\right)^3} = \frac{17}{\frac{1}{27}} = 459$$
                        $$r = \sqrt[n-1]{\frac{a_n}{a_1}} = \sqrt[4-1]{\frac{17}{459}} = \sqrt[3]{\frac{17}{459}} = \sqrt[3]{\frac{1}{27}} = \frac{1}{3}$$
                        $$n = \frac{\log\left(\frac{a_n}{a_1}\right)}{\log r} + 1 = \frac{\log\left(\frac{17}{459}\right)}{\log\left(\frac{1}{3}\right)} + 1 = \frac{-1.43136\ldots}{-0.47711\ldots} + 1 = 3 + 1 = 4$$
                    </div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo14">Ejemplo 14. Identificación de términos \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PG\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(4,\ 16,\ 64,\ 256,\ 1024.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 4;\ a_n = 1,024;\ n = 5;\ S_n = 4 + 16 + 64 + 256 + 1,024 = 1,364\)</p>
                    <p>\(r = \frac{1,024}{256} = 4;\ r = \frac{64}{16} = 4\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$S_n = \frac{r a_n - a_1}{r - 1} = \frac{4 \times 1,024 - 4}{4 - 1} = \frac{4,092}{3} = 1,364$$
                        $$a_1 = r a_n + S_n(1 - r)$$
                        $$a_1 = 4 \times 1,024 + 1,364(1 - 4) = 4,096 - 4,092 = 4$$
                        $$a_n = \frac{S_n(r - 1) + a_1}{r}$$
                        $$a_n = \frac{1,364(4 - 1) + 4}{4} = \frac{4,096}{4} = 1,024$$
                        $$r = \frac{S_n - a_1}{S_n - a_n} = \frac{1,364 - 4}{1,364 - 1,024} = \frac{1,360}{340} = 4$$
                    </div>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo15">Ejemplo 15. Identificación de términos \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En la siguiente \(PG\), identifique las variables y aplique las fórmulas respectivas que las determinan: \(18,\ 4.5,\ 1.125,\ 0.28125.\)</p>
                    <p><strong>Datos:</strong> \(a_1 = 18;\ n = 4;\ S_n = 18 + 4.5 + 1.125 + 0.28125 = 23.90625\)</p>
                    <p>\(r = \frac{1.125}{4.5} = 0.25;\ r = \frac{0.28125}{1.125} = 0.25\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$S_n = \frac{a_1(r^n - 1)}{r - 1} = \frac{18(0.25^4 - 1)}{0.25 - 1} = \frac{-17.929\ldots}{-0.75} = 23.90625$$
                        $$a_1 = \frac{S_n(r - 1)}{r^n - 1} = \frac{23.90625(0.25 - 1)}{0.25^4 - 1} = \frac{-17.9296\ldots}{-0.9960\ldots} = 18$$
                        $$n = \frac{\log\left(\frac{S_n(r - 1)}{a_1} + 1\right)}{\log r}$$
                        $$n = \frac{\log\left(\frac{23.90625(0.25 - 1)}{18} + 1\right)}{\log 0.25} = \frac{\log(0.0039\ldots)}{-0.602\ldots} = \frac{-2.408\ldots}{-0.602\ldots} = 4$$
                    </div>
                    <p>\(r\) por tanteo en \(S_n = \frac{a_1(r^n - 1)}{r - 1}\)</p>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo16">Ejemplo 16. Interpolación geométrica \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>El 3° término de una \(PG\) es 16, y el 8° es 1,562.50. Calcule el valor de los términos faltantes. Otra redacción: Interpole 4 términos entre 16 y 1,562.50, de tal manera que juntos conformen una \(PG\).</p>
                    <p>En este caso, la cardinalidad de los términos se puede adecuar a las fórmulas ya estudiadas.</p>
                    <p><strong>Datos:</strong> \(a_3 = a_1 = 16;\ a_8 = a_n = 1,562.50;\ n = 6;\ r = ?\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$r = \sqrt[n-1]{\frac{a_n}{a_1}} = \sqrt[6-1]{\frac{1,562.50}{16}} = \sqrt[5]{97.65625} = 2.5$$
                    </div>
                    <p><strong>Términos restantes:</strong></p>
                    <p>\(a_3 = 16;\ a_4 = 16 \times 2.5 = 40;\ a_5 = 40 \times 2.5 = 100;\ a_6 = 100 \times 2.5 = 250\)</p>
                    <p>\(a_7 = 250 \times 2.5 = 625;\ a_8 = 625 \times 2.5 = 1,562.50\)</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo17">Ejemplo 17. Razón común de una \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Si una maquinaria tiene un costo de adquisición de \$85,000, y al cabo de 5 años tendrá un valor de \$14,285.95; determine la tasa de depreciación anual que se aplicó sobre el valor al inicio de cada año. Se entiende por depreciación la pérdida de valor de un bien tangible.</p>
                    <p>Empecemos por extraer los datos y definir las variables:</p>
                    <p>\(a_1 = \text{Valor en libros al inicio del año } 1 = 85,000\)</p>
                    <p>\(a_n = \text{Valor en libros al final del año } 5 = 14,285.95\)</p>
                    <p>En cada año existe un valor final, que se obtiene de restar al valor inicial, la depreciación anual correspondiente. Por lo que se tienen 5 valores finales y un valor al inicio del año 1. Eso hace que debamos considerar 6 términos en la serie. El término tasa se relaciona directamente a un porcentaje, equiparable a la variable \(r\) de una \(PG\).</p>
                    <p><strong>Datos:</strong> \(a_1 = 85,000;\ \text{tasa} = r = ?;\ n = 6\) términos; \(a_n = 14,285.95\)</p>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$r = \sqrt[n-1]{\frac{a_n}{a_1}} = \sqrt[6-1]{\frac{14,285.95}{85,000}} = \sqrt[5]{0.1176\ldots} = 0.7$$
                    </div>
                    <p><strong>Comprobación:</strong></p>
                    <div class="formula-display">
                        $$a_1 = 85,000$$
                        $$a_2 = 85,000 \times 0.7 = 59,500$$
                        $$a_3 = 59,500 \times 0.7 = 41,650$$
                        $$a_4 = 41,650 \times 0.7 = 29,155$$
                        $$a_5 = 29,155 \times 0.7 = 20,408.5$$
                        $$a_6 = 20,408.5 \times 0.7 = 14,285.95$$
                    </div>
                    <p>Antes de suponer que \(r = 0.7\) o \(70\%\) es la tasa de depreciación buscada, interpretemos que el término \(a_2\) representa el valor al final del año 1. Con ello podemos obtener el valor de la primera depreciación, y con ella la tasa buscada:</p>
                    <p>Sabiendo que:</p>
                    <p>\(\text{Valor Inicial} - \text{Depreciación} = \text{Valor Final}\)</p>
                    <p>despejando tenemos:</p>
                    <p>\(\text{Depreciación} = \text{Valor Inicial} - \text{Valor Final} = 85,000 - 59,500 = 25,500\)</p>
                    <p>así:</p>
                    <div class="result-box">$$\text{la tasa de depreciación} = \frac{\text{Depreciación}}{\text{Valor inicial}} = \frac{25,500}{85,000} = 0.3\ \text{o}\ 30\%\ \text{anual}$$</div>
                    <p><strong>Comprobemos con el año 5:</strong></p>
                    <p>\(a_5 = 20,408.50 = \text{valor inicial};\quad 20,408.50 \times 30\% = 6,122.55\ \text{depreciación}\)</p>
                    <p>\(\text{valor inicial} - \text{depreciación} = \text{valor final};\quad 20,408.50 - 6,122.55 = 14,285.95\)</p>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo18">Ejemplo 18. Primer término de una \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>En una empresa de cosméticos ha sido constante un incremento promedio mensual del 3% sobre su venta del mes anterior. Si estima una venta total para el año en curso de \$326,416.68, determine la venta del primer mes del año, la del último mes del año anterior, y la tasa de incremento anual en las ventas.</p>
                    
                    <p>Definiendo la variable \(a_n =\) Venta del mes en curso, tenemos que:</p>
                    
                    <p>Los 3 primeros términos (venta mensual) a partir de un valor arbitrario inicial:</p>
                    <div class="formula-display">
                        $$a_1 = 1,000$$
                        $$a_2 = 1,000 + 1,000 \times 0.03 = 1,000 + 30 = 1,030$$
                        $$a_3 = 1,030 + 1,030 \times 0.03 = 1,030 + 30.90 = 1,060.90$$
                    </div>
                    
                    <p>Al ver que no existe una diferencia común, se determinarán las razones para ver si existe una en común.</p>
                    <div class="formula-display">
                        $$r = \frac{1,030}{1,000} = 1.03;\quad r = \frac{1,060.90}{1,030} = 1.03$$
                    </div>
                    
                    <p>Al existir una razón común, se procede como una \(PG\).</p>
                    
                    <p><strong>Datos:</strong> \(a_1 = ?;\ r = 1.03;\ n = 12\) meses; \(S_n = 326,416.68\)</p>
                    
                    <h4>Solución (venta del primer mes):</h4>
                    <div class="formula-display">
                        $$a_1 = \frac{S_n(r - 1)}{r^n - 1} = \frac{326,416.68(1.03 - 1)}{1.03^{12} - 1}$$
                        $$a_1 = \frac{326,416.68(0.03)}{0.4257\ldots} = \frac{9,792.5004}{0.4257\ldots} = 23,000$$
                    </div>
                    <p>La venta del primer mes es de \$23,000</p>
                    
                    <h4>Solución (venta del último mes del año anterior):</h4>
                    <p>De la relación \(r = \frac{a_n}{a_{n-1}}\); se despeja el término anterior \(a_{n-1}\)</p>
                    <div class="formula-display">
                        $$a_{n-1} = \frac{a_n}{r} = \frac{23,000}{1.03} = 22,330.10$$
                    </div>
                    
                    <h4>Solución (tasa de incremento anual en ventas):</h4>
                    <p>Para obtener el porcentaje de incremento anual en ventas, se obtiene primeramente la venta del último mes.</p>
                    <div class="formula-display">
                        $$a_n = a_1(r^{n-1})$$
                        $$a_{12} = 23,000(1.03^{12-1}) = 23,000(1.03^{11}) = 31,837.379\ldots$$
                    </div>
                    <p>Ahora determinemos el incremento anual en las ventas:</p>
                    <p>Venta al final menos venta al inicio del año = \(31,837.38 - 22,330.10 = 9,507.28\)</p>
                    <div class="formula-display">
                        $$\text{Tasa de incremento anual} = \frac{\text{Incremento en venta anual}}{\text{venta al inicio del año}} = \frac{9,507.28}{22,330.10} = 0.42576\ldots\ \text{o}\ 42.58\%\ \text{anual}$$
                    </div>
                    
                    <div class="result-box">
                        <strong>Resultados:</strong><br>
                        Venta del primer mes: \$23,000<br>
                        Venta del último mes del año anterior: \$22,330.10<br>
                        Tasa de incremento anual: 42.58%
                    </div>
                </div>

                <div class="section-divider"></div>
                <h2 id="ejemplo19">Ejemplo 19. Número de términos de una \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Una institución financiera ofrece un rendimiento mensual del 4.5% sobre la inversión, a uno de sus clientes preferentes, el cual decide invertir \$7,700 al inicio del primer mes, reinvirtiendo su saldo a final de cada mes. Si al final de cierto mes retira \$16,273, ¿cuánto tiempo duró la inversión?</p>
                    
                    <p>Definiendo la variable \(a_n = \text{Saldo a final de cada mes}\), tenemos que:</p>
                    <div class="formula-display">
                        $$a_1 = 7,700 + 7,700 \times 0.045 = 7,700 + 346.50 = 8,046.50$$
                        $$a_2 = 8,046.50 + 8,046.50 \times 0.045 = 8,046.50 + 362.0925 = 8,408.5925$$
                    </div>
                    
                    <p>Al ver que no existe una diferencia común, se determinarán las razones para ver si existe una en común. (observe que el dato de 7,700 no se toma en cuenta como un término de la progresión, por ser un <strong>saldo inicial</strong>, y no corresponde con la definición de la variable \(a_n = \text{Saldo a final de cada mes}\).)</p>
                    <div class="formula-display">
                        $$r = \frac{8,046.50}{7,700} = 1.045;\quad r = \frac{8,408.5925}{8,046.50} = 1.045$$
                    </div>
                    
                    <p>Al existir una razón común, se procede como una \(PG\).</p>
                    
                    <p><strong>Datos:</strong> \(a_1 = 8,046.50;\ a_n = 16,273;\ r = 1.045\)</p>
                    
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$n = \frac{\log\left(\frac{a_n}{a_1}\right)}{\log r} + 1 = \frac{\log\left(\frac{16,273}{8,046.50}\right)}{\log 1.045} + 1$$
                        $$n = \frac{\log(2.022\ldots)}{\log 1.045} + 1 = \frac{0.30586\ldots}{0.01911\ldots} + 1 = 15.999\ldots + 1 = 17$$
                    </div>
                    <div class="result-box">La inversión duró 17 meses (1 año y 5 meses)</div>
                </div>

                <div class="section-divider"></div>

                <h2 id="ejemplo20">Ejemplo 20. Término enésimo y Suma de términos de una \(PA\) y \(PG\)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>¿Qué opción le conviene más a un empleado al cual le ofrecen un sueldo mensual inicial de \$5,000? opción 1) aumento de \$150 mensuales; opción 2) aumento del 2.7% mensual. Resuelva en el plazo de un año y también al cabo de 5 años.</p>
                    
                    <h4>Opción 1). Aumento de \$150 mensuales.</h4>
                    <p>Empecemos por definir nuestras variables:</p>
                    <p>\(a_n = \text{sueldo mensual del enésimo periodo}\)</p>
                    <p>\(S_n = \text{sueldo acumulado hasta el enésimo periodo}\)</p>
                    
                    <p>Ahora determinemos los 3 primeros términos (sueldos mensuales) de la sucesión.</p>
                    <div class="formula-display">
                        $$a_1 = 5,000$$
                        $$a_2 = 5,000 + 150 = 5,150$$
                        $$a_3 = 5,150 + 150 = 5,300$$
                    </div>
                    <p>Se aprecia una diferencia común de 150, por lo que procedemos como una \(PA\).</p>
                    
                    <p><strong>Datos 1 año:</strong> \(a_1 = 5,000;\ d = 150;\ n = 1\ \text{año} = 12\ \text{meses};\ S_n = ?\)</p>
                    <div class="formula-display">
                        $$S_n = \frac{n}{2}(2a_1 + (n-1)d)$$
                        $$S_n = \frac{12}{2}(2 \times 5,000 + (12-1) \times 150) = 6(10,000 + 11 \times 150) = 69,900$$
                    </div>
                    
                    <p><strong>Datos 5 años:</strong> \(a_1 = 5,000;\ d = 150;\ n = 5\ \text{años} = 60\ \text{meses};\ S_n = ?\)</p>
                    <div class="formula-display">
                        $$S_n = \frac{60}{2}(2 \times 5,000 + (60-1) \times 150) = 30(10,000 + 59 \times 150) = 565,500$$
                    </div>
                    
                    <h4>Opción 2). Aumento del 2.7% mensual.</h4>
                    <p>Determinemos los 3 primeros términos (sueldos mensuales) de la sucesión:</p>
                    <div class="formula-display">
                        $$a_1 = 5,000$$
                        $$a_2 = 5,000 + 5,000 \times 0.027 = 5,000 + 135 = 5,135$$
                        $$a_3 = 5,135 + 5,135 \times 0.027 = 5,135 + 138.645 = 5,273.645$$
                    </div>
                    <p>A simple vista se observa que no existe una diferencia común, por lo que se determinarán las razones para ver si existe una en común.</p>
                    <div class="formula-display">
                        $$r = \frac{5,273.645}{5,135} = 1.027;\quad r = \frac{5,135}{5,000} = 1.027$$
                    </div>
                    <p>Al existir una razón común, se procede como una \(PG\).</p>
                    
                    <p><strong>Datos 1 año:</strong> \(a_1 = 5,000;\ r = 1.027;\ n = 12\ \text{meses};\ S_n = ?\)</p>
                    <div class="formula-display">
                        $$S_n = \frac{a_1(r^n - 1)}{r - 1} = \frac{5,000(1.027^{12} - 1)}{1.027 - 1} = \frac{5,000 \times 0.3767\ldots}{0.027} = 69,792.79$$
                    </div>
                    
                    <p><strong>Datos 5 años:</strong> \(a_1 = 5,000;\ r = 1.027;\ n = 60\ \text{meses};\ S_n = ?\)</p>
                    <div class="formula-display">
                        $$S_n = \frac{5,000(1.027^{60} - 1)}{0.027} = \frac{5,000 \times 3.9456\ldots}{0.027} = 730,682.75$$
                    </div>
                    
                    <div class="result-box">
                        Se concluye que la opción 1 es mejor al cabo de un año (\$69,900 vs \$69,792.79), pero al final de 5 años, resulta muy inferior a la opción 2 (\$565,500 vs \$730,682.75). Eso es lo que ocurre con el comportamiento de las \(PA\) y \(PG\).
                    </div>
                    
                    <h4>Tabla comparativa (Salario al final del año)</h4>
                    <table class="info-table">
                        <thead>
                            <tr><th>Salario al final del año</th><th>Opción 1 (\(PA\))</th><th>Opción 2 (\(PG\))</th></tr>
                        </thead>
                        <tbody>
                            <tr><td style="text-align: center;">1</td><td style="text-align: center;">6,650</td><td style="text-align: center;">6,702.62</td></tr>
                            <tr><td style="text-align: center;">2</td><td style="text-align: center;">8,450</td><td style="text-align: center;">9,227.63</td></tr>
                            <tr><td style="text-align: center;">3</td><td style="text-align: center;">10,250</td><td style="text-align: center;">12,703.86</td></tr>
                            <tr><td style="text-align: center;">4</td><td style="text-align: center;">12,050</td><td style="text-align: center;">17,489.64</td></tr>
                            <tr><td style="text-align: center;">5</td><td style="text-align: center;">13,850</td><td style="text-align: center;">24,078.32</td></tr>
                            <tr><td style="text-align: center;">6</td><td style="text-align: center;">15,650</td><td style="text-align: center;">33,149.08</td></tr>
                            <tr><td style="text-align: center;">7</td><td style="text-align: center;">17,450</td><td style="text-align: center;">45,636.97</td></tr>
                            <tr><td style="text-align: center;">8</td><td style="text-align: center;">19,250</td><td style="text-align: center;">62,829.29</td></tr>
                            <tr><td style="text-align: center;">9</td><td style="text-align: center;">21,050</td><td style="text-align: center;">86,498.28</td></tr>
                            <tr><td style="text-align: center;">10</td><td style="text-align: center;">22,850</td><td style="text-align: center;">119,083.83</td></tr>
                        </tbody>
                    </table>
                    <p>Las aplicaciones de las progresiones son entre muchas otras, los créditos en tiendas departamentales, agencias automotrices, créditos hipotecarios para vivienda, etcétera.</p>
                </div>

                <div class="section-divider"></div>

            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
                <nav class="toc-nav">
                    <ul>
                        <li><a href="#ejemplo1">Ejemplo 1. Progresión finita creciente</a></li>
                        <li><a href="#ejemplo2">Ejemplo 2. Progresión infinita decreciente</a></li>
                        <li><a href="#ejemplo3">Ejemplo 3. Diferencia o razón común</a></li>
                        <li><a href="#ejemplo4">Ejemplo 4. Diferencia o razón común</a></li>
                        <li><a href="#ejemplo5">Ejemplo 5. Identificación de términos \(PA\)</a></li>
                        <li><a href="#ejemplo6">Ejemplo 6. Identificación de términos \(PA\)</a></li>
                        <li><a href="#ejemplo7">Ejemplo 7. Identificação de términos \(PA\)</a></li>
                        <li><a href="#ejemplo8">Ejemplo 8. Interpolación aritmética \(PA\)</a></li>
                        <li><a href="#ejemplo9">Ejemplo 9. Término enésimo y número de términos de una \(PA\)</a></li>
                        <li><a href="#ejemplo10">Ejemplo 10. Primer Término de una \(PA\)</a></li>
                        <li><a href="#ejemplo11">Ejemplo 11. Diferencia común de una \(PA\)</a></li>
                        <li><a href="#ejemplo12">Ejemplo 12. Diferencia común de una \(PA\)</a></li>
                        <li><a href="#ejemplo13">Ejemplo 13. Identificación de términos \(PG\)</a></li>
                        <li><a href="#ejemplo14">Ejemplo 14. Identificación de términos \(PG\)</a></li>
                        <li><a href="#ejemplo15">Ejemplo 15. Identificación de términos \(PG\)</a></li>
                        <li><a href="#ejemplo16">Ejemplo 16. Interpolación geométrica \(PG\)</a></li>
                        <li><a href="#ejemplo17">Ejemplo 17. Razón común de una \(PG\)</a></li>
                        <li><a href="#ejemplo18">Ejemplo 18. Primer término de una \(PG\)</a></li>
                        <li><a href="#ejemplo19">Ejemplo 19. Número de términos de una \(PG\)</a></li>
                        <li><a href="#ejemplo20">Ejemplo 20. Comparación \(PA\) vs \(PG\)</a></li>
                    </ul>
                </nav>
            </aside>
    </div>
</div>

<a href="../Menus/progresiones.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
