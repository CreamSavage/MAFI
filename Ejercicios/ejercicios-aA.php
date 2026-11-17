<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Anualidad Anticipada y Amortización', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejercicios Propuestos de Anualidad Anticipada y Amortización</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-main content-card" id="ejercicios-contenido">
            <section>
                <h2>Ejercicios Propuestos: Anualidad Anticipada y Amortización</h2>
        
                <div class="definition-block">
                    <h3>Ejercicio 1.</h3>
                    <p>Obtenga el valor presente de las siguientes series anticipadas:</p>
                    <ul>
                        <li>a) 11 pagos anuales de $25,930 c/u, a una tasa del 3.54% mensual.</li>
                        <li>b) 48 depósitos bimestrales de $31,152 c/u, a una tasa del 8.22% bimestral.</li>
                        <li>c) 7 rentas trimestrales de $189,000 c/u, a una tasa del 7.72% semestral.</li>
                        <li>d) 15 rentas anuales de $58,990 c/u, a una tasa del 21.40% anual proporcional semanal.</li>
                        <li>e) 8 ahorros quincenales de $20,000 c/u, a una tasa anual proporcional quincenal del 12.25%.</li>
                        <li>f) 52 abonos semanales de $2,111 c/u, a una tasa anual proporcional diaria del 43.18%.</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 2.</h3>
                    <p>Determine el precio de contado de un kit de cerca electrificada con accesorios, que se vende en un plan a crédito de 6 pagos mensuales de $3,924 cada uno. Considere una tasa de interés del 23.16% anual proporcional cuatrimestral.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3.</h3>
                    <p>Un coleccionista de libros clásicos muy antiguos ofrece un lote de 20 ejemplares valuado en $550,000, por el cual recibe las siguientes ofertas: a) pagos mensuales de $60,000 durante un año, el primero a la firma del contrato de compraventa; b) un enganche de $100,000 y 8 pagos bimestrales de $89,000. Determine cuál es la mejor opción si la tasa que rige en el mercado es del 7.13% mensual.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4.</h3>
                    <p>Una máquina expendedora de comida caliente se ofrece al contado en $70,000. A plazo se ofrece a pagar en dos años con una tasa anual del 25%. Si se da a elegir la periodicidad de los pagos, ¿cuánto tendría que pagarse mensualmente para liquidarla? ¿Y si los pagos fueran quincenales? Considere en ambos casos que no hay enganche, pero se requiere realizar el primer pago de inmediato.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5.</h3>
                    <p>El gobierno de la CDMX compró equipos para detectar fugas de agua no visibles y repararlas en menos de 24 horas. Si el costo es de $20,000,000 pero le dan la facilidad de pagar a 3 años, determine la cantidad trimestral que deberá liquidar a partir del momento de la compra, si se sabe que le cobrarán una tasa de interés del 15.35% cuatrimestral.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6.</h3>
                    <p>Una compañía internacional ofrece casas prefabricadas plegables a un precio de contado de $268,750. A crédito se ofrece con pagos mensuales anticipados de $26,000. Si le cargan una tasa de interés anual del 40%, determine el número de pagos que deberá realizar, así como el pago final a realizar en el último periodo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7.</h3>
                    <p>Un estudiante de la carrera técnica en buceo deportivo desea adquirir una lancha usada para costear sus prácticas profesionales y realizar su mayor anhelo. Para ello requiere solicitar un préstamo por $85,000 a una institución que le cobra una tasa del 42.28% anual. Si puede pagar $550 semanales empezando de inmediato, determine en cuánto tiempo logrará liquidar su adeudo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8.</h3>
                    <p>Por un lote de 10,000 vacunas contra el covid 19 valuado en $4,496,000, se conviene en realizar pagos bimestrales iguales de $950,000 durante un año, empezando a pagar desde el día de hoy. Determine la tasa bimestral y su equivalente anual que se cobra en esta operación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9.</h3>
                    <p>En apoyo a sus grupos de estudiantes de licenciatura de escasos recursos, un profesor de matemáticas financieras solicita una cotización por un paquete de 15 calculadoras. Le informan que de contado se tendrá que pagar $5,000; a crédito se deberán realizar 6 pagos mensuales de $900 cada uno, sin enganche, pero empezando a pagar al momento de la firma del contrato. Determine la tasa de interés mensual y su equivalente anual que se cobra en esta operación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10.</h3>
                    <p>Un analista tiene la labor de proponer un plan a crédito para la venta de un plan familiar anual de servicios dentales, cuyo precio de contado se encuentra en $21,895. Si se requiere cobrar una tasa de interés de 1.43% semanal para las ventas a crédito, determine el valor de los pagos mensuales, considerando que deberá empezar a pagar desde el día de la compra. Realice una tabla que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 11.</h3>
                    <p>Una compañía de autos eléctricos de nueva generación requiere invertir en tecnología de punta. La inversión a realizar es de $31,500,000 y planea pagarlos en 2 años con pagos bimestrales iguales anticipados y una tasa variable. La tasa actual es del 1.25% semanal, y después de un año cambia a 1.73% semanal. Determine el valor de los pagos antes y después del cambio de tasa, y realice la tabla de amortización que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12.</h3>
                    <p>Con la finalidad de ampliar una línea de producción, el día de hoy una siderúrgica solicita un préstamo por $7,500,000, con el plan de amortizar el 30% con pagos semestrales anticipados durante 2 años, y el resto durante 3 años más. Si la tasa que se acuerda es del 25.13% anual, determine el valor de los pagos y realice la tabla de amortización.</p>
                </div>
            </section>

            <div class="content-card" id="respuestas">
                <h2>Respuestas de los Ejercicios Propuestos</h2>

                <div class="hoja-resultados">
                    <div class="hoja-header">HOJA DE RESULTADOS - ANUALIDAD ANTICIPADA</div>
                    
                    <div class="item-respuesta">
                        <span class="num">1. </span>
                        <div class="contenido-respuesta">
                            a) P = $75,209.21 &nbsp;&nbsp;&nbsp; b) P = $400,879.71 &nbsp;&nbsp;&nbsp; c) P = $1,186,630.47<br>
                            d) P = $294,303.24 &nbsp;&nbsp;&nbsp; e) P = $157,184.88 &nbsp;&nbsp;&nbsp; f) P = $89,525.98
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">2. </span>
                        <div class="contenido-respuesta">
                            P = $22,486.09
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">3. </span>
                        <div class="contenido-respuesta">
                            Oferta A: P = $507,021.49 (conviene más) &nbsp;&nbsp;&nbsp; Oferta B: E + P = $502,432.08
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">4. </span>
                        <div class="contenido-respuesta">
                            R<sub>A</sub> = $3,582.34 mensuales &nbsp;&nbsp;&nbsp; RA = $1,799.50 quincenales
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">5. </span>
                        <div class="contenido-respuesta">
                            R<sub>A</sub>  = $2,807,956 trimestrales
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">6. </span>
                        <div class="contenido-respuesta">
                            n = 12 meses; logrará liquidar con 12 pagos mensuales anticipados de $26,000 y un último de $118.43 al inicio del mes 13.
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">7. </span>
                        <div class="contenido-respuesta">
                            Al ser el interés mayor al pago, nunca terminará de liquidar. Es una perpetuidad.
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">8. </span>
                        <div class="contenido-respuesta">
                            i = 10.61% bimestral &nbsp;&nbsp;&nbsp; i = 83.11% anual
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">9. </span>
                        <div class="contenido-respuesta">
                            i = 3.19% mensual &nbsp;&nbsp;&nbsp; i = 45.69% anual
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">10. </span>
                        <div class="contenido-respuesta">
                            R<sub>A</sub> = $2,502.53 mensuales
                            <p style="margin-top:1rem;"><strong>Tabla de amortización — i = 0.063...% mensual:</strong></p>
                            <div class="table-responsive">
                                <table class="am-table">
                                    <thead><tr><th>n</th><th>Saldo inicial SI</th><th>Pago R<sub>A</sub></th><th>Saldo parcial Sp</th><th>Interés I</th><th>Amortización Am</th><th>Saldo final SF</th></tr></thead>
                                    <tbody>
                                        <tr><td>1</td><td>21,895.00</td><td>2,502.53</td><td>19,392.47</td><td>1,230.65</td><td>1,271.88</td><td>20,623.12</td></tr>
                                        <tr><td>2</td><td>20,623.12</td><td>2,502.53</td><td>18,120.59</td><td>1,149.93</td><td>1,352.60</td><td>19,270.52</td></tr>
                                        <tr><td>3</td><td>19,270.52</td><td>2,502.53</td><td>16,767.99</td><td>1,064.10</td><td>1,438.43</td><td>17,832.09</td></tr>
                                        <tr><td>4</td><td>17,832.09</td><td>2,502.53</td><td>15,329.56</td><td>972.81</td><td>1,529.72</td><td>16,302.37</td></tr>
                                        <tr><td>5</td><td>16,302.37</td><td>2,502.53</td><td>13,799.84</td><td>875.74</td><td>1,626.79</td><td>14,675.58</td></tr>
                                        <tr><td>6</td><td>14,675.58</td><td>2,502.53</td><td>12,173.05</td><td>772.50</td><td>1,730.03</td><td>12,945.55</td></tr>
                                        <tr><td>7</td><td>12,945.55</td><td>2,502.53</td><td>10,443.02</td><td>662.71</td><td>1,839.82</td><td>11,105.73</td></tr>
                                        <tr><td>8</td><td>11,105.73</td><td>2,502.53</td><td>8,603.20</td><td>545.96</td><td>1,956.57</td><td>9,149.16</td></tr>
                                        <tr><td>9</td><td>9,149.16</td><td>2,502.53</td><td>6,646.63</td><td>421.80</td><td>2,080.73</td><td>7,068.43</td></tr>
                                        <tr><td>10</td><td>7,068.43</td><td>2,502.53</td><td>4,565.90</td><td>289.75</td><td>2,212.78</td><td>4,855.65</td></tr>
                                        <tr><td>11</td><td>4,855.65</td><td>2,502.53</td><td>2,353.12</td><td>149.33</td><td>2,353.20</td><td>2,502.45</td></tr>
                                        <tr><td>12</td><td>2,502.45</td><td>2,502.45</td><td>0.00</td><td>0.00</td><td>2,502.45</td><td>0.00</td></tr>
                                        <tr class="totals-row"><td>Totales</td><td></td><td>30,030.28</td><td></td><td>8,135.28</td><td>21,895.00</td><td></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">11. </span>
                        <div class="contenido-respuesta">
                            R<sub>A</sub> = $4,433,103.88 bimestrales ; R<sub>A1</sub> = $4,837,551.69 bimestrales
                            <p style="margin-top:1rem;"><strong>Tabla de amortización — tasa variable bimestral:</strong></p>
                            <div class="table-responsive">
                                <table class="am-table">
                                    <thead><tr><th>n</th><th>Saldo inicial SI</th><th>Tasa i</th><th>Pago R<sub>A</sub></th><th>Saldo parcial Sp</th><th>Interés I</th><th>Amortización Am</th><th>Saldo final SF</th></tr></thead>
                                    <tbody>
                                        <tr><td>1</td><td>31,500,000.00</td><td>0.1136…</td><td>4,433,103.88</td><td>27,066,896.12</td><td>3,076,723.39</td><td>1,356,380.49</td><td>30,143,619.51</td></tr>
                                        <tr><td>2</td><td>30,143,619.51</td><td>0.1136…</td><td>4,433,103.88</td><td>25,710,515.63</td><td>2,922,542.15</td><td>1,510,561.73</td><td>28,633,057.78</td></tr>
                                        <tr><td>3</td><td>28,633,057.78</td><td>0.1136…</td><td>4,433,103.88</td><td>24,199,953.90</td><td>2,750,834.96</td><td>1,682,268.92</td><td>26,950,788.86</td></tr>
                                        <tr><td>4</td><td>26,950,788.86</td><td>0.1136…</td><td>4,433,103.88</td><td>22,517,684.98</td><td>2,559,609.63</td><td>1,873,494.25</td><td>25,077,294.61</td></tr>
                                        <tr><td>5</td><td>25,077,294.61</td><td>0.1136…</td><td>4,433,103.88</td><td>20,644,190.73</td><td>2,346,647.51</td><td>2,086,456.37</td><td>22,990,838.24</td></tr>
                                        <tr><td>6</td><td>22,990,838.24</td><td>0.1136…</td><td>4,433,103.88</td><td>18,557,734.36</td><td>2,109,477.76</td><td>2,323,626.12</td><td>20,667,212.12</td></tr>
                                        <tr style="background:#fff0cc;"><td>7</td><td>20,667,212.12</td><td>0.1602…</td><td>4,837,551.69</td><td>15,829,660.43</td><td>2,536,991.02</td><td>2,300,560.67</td><td>18,366,651.45</td></tr>
                                        <tr><td>8</td><td>18,366,651.45</td><td>0.1602…</td><td>4,837,551.69</td><td>13,529,099.76</td><td>2,168,284.33</td><td>2,669,267.36</td><td>15,697,384.09</td></tr>
                                        <tr><td>9</td><td>15,697,384.09</td><td>0.1602…</td><td>4,837,551.69</td><td>10,859,832.40</td><td>1,740,485.68</td><td>3,097,066.01</td><td>12,600,318.08</td></tr>
                                        <tr><td>10</td><td>12,600,318.08</td><td>0.1602…</td><td>4,837,551.69</td><td>7,762,766.39</td><td>1,244,124.51</td><td>3,593,427.18</td><td>9,006,890.90</td></tr>
                                        <tr><td>11</td><td>9,006,890.90</td><td>0.1602…</td><td>4,837,551.69</td><td>4,169,339.21</td><td>668,212.45</td><td>4,169,339.24</td><td>4,837,551.66</td></tr>
                                        <tr><td>12</td><td>4,837,551.66</td><td>0.1602…</td><td>4,837,551.66</td><td>0.00</td><td>0.00</td><td>4,837,551.66</td><td>0.00</td></tr>
                                        <tr class="totals-row"><td>Totales</td><td></td><td></td><td>55,623,933.39</td><td></td><td>24,123,933.39</td><td>31,500,000.00</td><td></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="item-respuesta">
                        <span class="num">12. </span>
                        <div class="contenido-respuesta">
                            R<sub>A</sub>  = $1,216,993.98 semestrales ; RA1 = $1,137,058.44 semestrales
                            <div class="table-responsive">
                                <table class="am-table">
                                    <thead><tr><th>n</th><th>Saldo inicial SI</th><th>Pago RA</th><th>Saldo parcial Sp</th><th>Interés I</th><th>Amortización Am</th><th>Saldo Final SF</th></tr></thead>
                                    <tbody>
                                        <tr><td>1</td><td>7,500,000.00</td><td>1,216,993.98</td><td>6,283,006.02</td><td>745,260.11</td><td>471,733.87</td><td>7,028,266.13</td></tr>
                                        <tr><td>2</td><td>7,028,266.13</td><td>1,216,993.98</td><td>5,811,272.15</td><td>689,305.30</td><td>527,688.68</td><td>6,500,577.45</td></tr>
                                        <tr><td>3</td><td>6,500,577.45</td><td>1,216,993.98</td><td>5,283,583.47</td><td>626,713.39</td><td>590,280.59</td><td>5,910,296.86</td></tr>
                                        <tr><td>4</td><td>5,910,296.86</td><td>1,216,993.98</td><td>4,693,302.88</td><td>556,697.13</td><td>660,296.85</td><td>5,250,000.01</td></tr>
                                        <tr><td>5</td><td>5,250,000.01</td><td>1,137,058.44</td><td>4,112,941.57</td><td>487,857.45</td><td>649,200.99</td><td>4,600,799.02</td></tr>
                                        <tr><td>6</td><td>4,600,799.02</td><td>1,137,058.44</td><td>3,463,740.58</td><td>410,852.34</td><td>726,206.10</td><td>3,874,592.92</td></tr>
                                        <tr><td>7</td><td>3,874,592.92</td><td>1,137,058.44</td><td>2,737,534.48</td><td>324,713.24</td><td>812,345.20</td><td>3,062,247.72</td></tr>
                                        <tr><td>8</td><td>3,062,247.72</td><td>1,137,058.44</td><td>1,925,189.28</td><td>228,356.74</td><td>908,701.70</td><td>2,153,546.02</td></tr>
                                        <tr><td>9</td><td>2,153,546.02</td><td>1,137,058.44</td><td>1,016,487.58</td><td>120,570.89</td><td>1,016,487.55</td><td>1,137,058.47</td></tr>
                                        <tr><td>10</td><td>1,137,058.47</td><td>1,137,058.47</td><td>0.00</td><td>0.00</td><td>1,137,058.47</td><td>0.00</td></tr>
                                        <tr class="totals-row"><td>Totales</td><td></td><td>11,690,326.59</td><td></td><td>4,190,326.59</td><td>7,500,000.00</td><td></td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </main>

        <aside class="toc-sidebar">
            <div class="toc-title"><i class="fas fa-list"></i> Índice Ejercicios propuestos AA y AM a valor P</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
