<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Amortización con Renta Anticipada', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            <h1>Ejemplos de Anualidad Anticipada y Amortización</h1>
        </header>

    <div class="content-toc-grid">
        <main class="content-main content-card" id="ejemplos-contenido">

            <div class="content-card">
                <h2>Relación R<sub>A</sub> e Ic a valor P</h2>
                <p>Al ser las anualidades un conjunto de operaciones a Ic, se representarán mediante diagramas de tiempo-valor, 
                    así como las ecuaciones de equivalencia en una FF. </p>
                    <P> La única variable que cambia con relación a las AV es el subíndice de la Renta (R<sub>A</sub>), por lo que 
                        deberá tenerse especial cuidado en no confundir sus fórmulas.</p>
                <h2>Ejemplo 1. Relación de R<sub>A</sub> e Ic a valor P </h2>
                <p>Obtenga el valor presente P de una serie de 3 rentas mensuales anticipadas de $100 c/u, a una tasa del 10% mensual.</p>
                <p>Al estar la FF al inicio del plazo, todos los flujos están a la derecha, por lo que son F a descontar; excepto P<sub>2</sub> que ya se encuentra en ella; cada R<sub>A</sub> se ubica al inicio del periodo. Operando a Ic tenemos:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_1.1.png" alt="[IMAGEN 1.1]"></div>

                <p>Representando la operación con un diagrama, aplicando la fórmula de P en una AA:</p>

                <div class="grafica-placeholder"><img src="../img/RA_1.2.png" alt="[IMAGEN 1.2]"></div>

                <p>Interpretación:</p>
                <p>En contraste con el valor P de la RV, el último periodo no tiene efecto en el descuento de intereses de la última renta, y el valor P coincide con la ubicación de la primera RA.</p>
                
                <div class="didactic-note">
                    Para visualizar la equivalencia de P en una tabla por periodo, se toman las operaciones como si fueran de <em>naturaleza contraria</em>.
                </div>
                
                <p>Por ejemplo, se tiene un saldo invertido de $273.55 y 3 retiros anticipados de 100 c/u. Aunque también puede ser una deuda que se cancela con 3 pagos anticipados de 100 c/u.</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 10 % mensual, plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado R<sub>A</sub></th><th>Saldo parcial Sp = P - R<sub>A</sub></th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>273.55</td><td>100.00</td><td>173.55</td><td>17.36</td><td>190.91</td></tr>
                            <tr><td>2</td><td>190.91</td><td>100.00</td><td>90.91</td><td>9.09</td><td>100.00</td></tr>
                            <tr><td>3</td><td>100.00</td><td>100.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>300.00</td><td></td><td>26.45</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 2. Valor P de R<sub>A</sub></h2>
                <p>El jefe de cuentas por pagar de una compañía purificadora de agua desea aprovechar un excedente financiero y liquidar 4 letras de cambio por $18,500 cada una, <em>una de las cuales vence el día de hoy</em>, y las otras con una periodicidad quincenal.</p>
                <p>Si la tasa acordada es del 8.71% cuatrimestral, determine el valor del pago único que deberá realizar en este momento.</p>
                
                <p>Realizando el diagrama de tiempo-valor para comprender la ubicación de los flujos:</p>

                <div class="grafica-placeholder"><img src="../img/RA_2.1.png" alt="[IMAGEN 2.1]"></div>

                <p>El valor de P representa una deuda actual que gana intereses, y que se va disminuyendo hasta cancelarse con cada pago RA al inicio de cada periodo.</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 0.0104... quincenal, plazo en quincenas</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado R<sub>A</sub></th><th>Saldo parcial Sp = P - R<sub>A</sub></th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>72,855.24</td><td>18,500.00</td><td>54,355.24</td><td>570.40</td><td>54,925.64</td></tr>
                            <tr><td>2</td><td>54,925.64</td><td>18,500.00</td><td>36,425.64</td><td>382.24</td><td>36,807.88</td></tr>
                            <tr><td>3</td><td>36,807.88</td><td>18,500.00</td><td>18,307.88</td><td>192.12</td><td>18,500.00</td></tr>
                            <tr><td>4</td><td>18,500.00</td><td>18,500.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>74,000.00</td><td></td><td>1,144.76</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 3. Valor P de R<sub>A</sub></h2>
                <p>Para vender una casa de campo valuada en $1,900,000, un director de orquesta jubilado recibe las siguientes ofertas: a) 14 pagos mensuales de $145,000, el primero a la firma del contrato; b) Un enganche de $300,000 y 10 pagos bimestrales de $175,000.</p>
                <p>Determine cuál es la mejor opción si la tasa que rige en el mercado es del 17% anual.</p>
                
                <h3>Oferta A: Diagrama y extracto de tabla por periodo</h3>
                <p>Representando la operación con un diagrama para la Oferta A:</p>

                <div class="grafica-placeholder"><img src="../img/RA_3.1.png" alt="[IMAGEN 3.1]"></div>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 0.0131... mensual, plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado R<sub>A</sub></th><th>Saldo parcial Sp = P - R<sub>A</sub></th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>12</td><td>429,370.18</td><td>145,000.00</td><td>284,370.18</td><td>3,745.04</td><td>288,115.22</td></tr>
                            <tr><td>13</td><td>288,115.22</td><td>145,000.00</td><td>143,115.22</td><td>1,884.77</td><td>144,999.99</td></tr>
                            <tr><td>14</td><td>144,999.99</td><td>145,000.00</td><td>-0.01</td><td>0.00</td><td>-0.01</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>2,030,000.00</td><td></td><td>162,907.21</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <h3>Oferta B: Diagrama y extracto de tabla por periodo</h3>
                <p>Representando la operación con un diagrama para la Oferta B:</p>

                <div class="grafica-placeholder"><img src="../img/RA_3.2.png" alt="[IMAGEN 3.2]"></div>

                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 0.0265... bimestral, plazo en bimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Interés I = P * i</th><th>Saldo parcial Sp = P + I</th><th>Flujo Vencido R<sub>V</sub></th><th>Saldo Final F = Sp - R<sub>V</sub></th></tr>
                        </thead>
                        <tbody>
                            <tr><td>8</td><td>498,344.65</td><td>13,212.44</td><td>511,557.09</td><td>175,000.00</td><td>336,557.09</td></tr>
                            <tr><td>9</td><td>336,557.09</td><td>8,923.02</td><td>345,480.11</td><td>175,000.00</td><td>170,480.11</td></tr>
                            <tr><td>10</td><td>170,480.11</td><td>4,519.88</td><td>174,999.99</td><td>175,000.00</td><td>-0.01</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>230,291.46</td><td></td><td>1,750,000.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>El enganche E es un pago distinto y se debe sumar al valor P de la serie de pagos.</p>
                <p>Comparando los resultados, para <strong>vender</strong> le conviene más la oferta A, que es la más alta. El valor de $1,900,000 sólo es un referente para tomar la decisión de vender o no.</p>
                
                <div class="didactic-note">
                    En problemas donde se tienen tablas con múltiples periodos, se recomienda emplear el <strong>simulador</strong> elaborado para este fin.
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 4. R<sub>A</sub> a valor P</h2>
                <p>Renovar un equipo de cómputo le cuesta a una Sociedad Anónima un pago de contado por $150,000; para poder realizarlo acuerda con el proveedor en pagar a crédito durante un año, a una tasa del 4.48% trimestral, <em>empezando desde el día de hoy</em>. Determine qué cantidad debe pagar trimestralmente para lograr su objetivo.</p>
                
                <p>Se realiza un diagrama y con el resultado obtenido, una tabla por periodo:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_4.1.png" alt="[IMAGEN 4.1]"></div>

                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 4.48 % trimestral, plazo en trimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>150,000.00</td><td>39,999.98</td><td>110,000.02</td><td>4,928.00</td><td>114,928.02</td></tr>
                            <tr><td>2</td><td>114,928.02</td><td>39,999.98</td><td>74,928.04</td><td>3,356.78</td><td>78,284.82</td></tr>
                            <tr><td>3</td><td>78,284.82</td><td>39,999.98</td><td>38,284.84</td><td>1,715.16</td><td>40,000.00</td></tr>
                            <tr><td>4</td><td>40,000.00</td><td>39,999.98</td><td>0.00</td><td>0.00</td><td>0.02</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>159,999.92</td><td></td><td>9,999.94</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 5. R<sub>A</sub> a valor P</h2>
                <p>El albacea de una estudiante menor de edad requiere invertir $500,000 de la herencia para pagar sus estudios en una escuela particular. Si la carrera elegida tiene una duración de 5 años, determine la cantidad mensual anticipada de que podrá disponer, si la tasa de interés que le pagarán es del 14.48% anual.</p>
                
                <p>Apreciemos la solución mediante un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_5.1.png" alt="[IMAGEN 5.1]"></div>

                <p>La comprobación mediante una tabla por periodo es opcional. Emplee la herramienta tecnológica a su alcance. Aquí un extracto con los 3 últimos periodos de una tabla.</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 0.0113... mensual, plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>58</td><td>33,822.20</td><td>11,401.35</td><td>22,420.85</td><td>254.09</td><td>22,674.94</td></tr>
                            <tr><td>59</td><td>22,674.94</td><td>11,401.35</td><td>11,273.59</td><td>127.76</td><td>11,401.35</td></tr>
                            <tr><td>60</td><td>11,401.35</td><td>11,401.35</td><td>0.00</td><td>0.00</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>684,081.00</td><td></td><td>184,081.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 6. Plazo de R<sub>A</sub> a valor P</h2>
                <p>Con el propósito de expandirse a corto plazo, una distribuidora de paneles solares solicita un préstamo por $750,000; si le proponen pagar $71,259.60 bimestrales a partir de hoy, y le cobran una tasa del 2.48% bimestral, ¿En cuánto tiempo logrará liquidar la deuda?</p>
                <p>No olvide interpretar que la periodicidad de la renta y tasa, determinan la del plazo.</p>

                <p>Representando la operación con un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_6.1.png" alt="[IMAGEN 6.1]"></div>

                <p>La comprobación mediante una tabla por periodo se deja al lector, o ya bien, emplee el simulador. Aquí un extracto con los 3 últimos periodos de una tabla.</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 2.48 % bimestral, plazo en bimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>10</td><td>208,647.06</td><td>71,259.60</td><td>137,387.46</td><td>3,407.21</td><td>140,794.67</td></tr>
                            <tr><td>11</td><td>140,794.67</td><td>71,259.60</td><td>69,535.07</td><td>1,724.47</td><td>71,259.54</td></tr>
                            <tr><td>12</td><td>71,259.54</td><td>71,259.60</td><td>-0.06</td><td>0.00</td><td>-0.06</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>855,115.20</td><td></td><td>105,115.14</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 7. Plazo de R<sub>A</sub> a valor P (Perpetuidad)</h2>
                <p>Para costear sus prácticas profesionales en el interior de la república, un estudiante de idiomas planea solicitar un préstamo por $23,500, en una institución que le cobra una tasa del 18.5% semestral. Si puede pagar $150 semanales empezando de inmediato, determine en cuánto tiempo logrará liquidar su adeudo.</p>
                
                <p>Representando la operación con un diagrama:</p>

                <div class="grafica-placeholder"><img src="../img/RA_7.1.png" alt="[IMAGEN 7.1]"></div>

                <p>Este es un caso de anualidad perpetua, ya que al no existir un número que resuelva el problema, se interpreta que el adeudo nunca lograría pagarse en esas condiciones. Esto ocurre cuando el interés es mayor a la renta: I > R. Analicemos sólo dos periodos de una tabla por periodo:</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 0.0065... semanal, plazo en semanas</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>23,500.00</td><td>150.00</td><td>23,350.00</td><td>152.94</td><td>23,502.94</td></tr>
                            <tr><td>2</td><td>23,502.94</td><td>150.00</td><td>23,352.94</td><td>152.96</td><td>23,505.90</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>300.00</td><td></td><td>305.90</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Observe que el saldo en lugar de ir disminuyendo aumentará indefinidamente, por lo que nunca se terminará de pagar. Se deja al lector el intentar con un pago mayor, por ejemplo $250 semanales, en donde el plazo resultará de 144.899… semanas. Para este último caso de tantos periodos, resulta ilustrativo el empleo del simulador para la realización de la tabla por periodo.</p>
            </div>

            <div class="content-card">
                <h2>Ejemplo 8. Tasa de interés de RA a valor P</h2>
                <p>Por un servicio de mantenimiento industrial valuado en $44,960, se conviene en realizar pagos bimestrales iguales de $8,510 durante un año, empezando a pagar desde el día de hoy. Determine la tasa bimestral y su equivalente anual que se cobra en esta operación.</p>
                
                <div class="didactic-note">
                    La tasa de interés es lo último que un vendedor proporcionará al comprador por el efecto inhibir o disminuir las ventas en los términos convenientes a los vendedores.
                </div>

                <p>Al tener las variables de renta y plazo en bimestres, la tasa saldrá bimestral.</p>
                <p>Representando la operación con un diagrama:</p>

                <div class="grafica-placeholder"><img src="../img/RA_8.1.png" alt="[IMAGEN 8.1]"></div>

                <p>Los valores de ensayo de i, al tratarse de la variable P, se comportan de una manera <em>inversa</em> al resultado obtenido. Se puede emplear un algoritmo con calculadora científica, emplear la función SOLVE que sólo ciertos modelos poseen, emplear la función TASA de las hojas de cálculo, interpolando, o bien tabular los valores de ensayo de i, al sustituirlos en la ecuación simplificada del diagrama anterior, o ya bien, emplear el simulador provisto para dicho fin.</p>
                
                <div class="table-responsive">
                    <table class="am-table" style="width: auto; margin: 1.5rem auto;">
                        <thead>
                            <tr><th>Valor de i</th><th>Resultado de la sustitución</th><th>Diferencia vs. 44,960</th></tr>
                        </thead>
                        <tbody>
                            <tr><td style="text-align:center;">0.0538</td><td>44,970.01...</td><td>10.01...</td></tr>
                            <tr><td style="text-align:center;"><strong>0.0539</strong></td><td><strong>44,960.00...</strong></td><td><strong>0.00...</strong></td></tr>
                            <tr><td style="text-align:center;">0.0540</td><td>44,949.99...</td><td>- 10.00...</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Se da por bueno el valor de 0.0539 o 5.39% bimestral, ya que resultó el valor con menor diferencia con el criterio establecido a 4 decimales.</p>
                <p>Comprobación mediante una tabla:</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 5.39 % bimestral, plazo en bimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>44,960.00</td><td>8,510.00</td><td>36,450.00</td><td>1,964.66</td><td>38,414.66</td></tr>
                            <tr><td>2</td><td>38,414.66</td><td>8,510.00</td><td>29,904.66</td><td>1,611.86</td><td>31,516.52</td></tr>
                            <tr><td>3</td><td>31,516.52</td><td>8,510.00</td><td>23,006.52</td><td>1,240.05</td><td>24,246.57</td></tr>
                            <tr><td>4</td><td>24,246.57</td><td>8,510.00</td><td>15,736.57</td><td>848.20</td><td>16,584.77</td></tr>
                            <tr><td>5</td><td>16,584.77</td><td>8,510.00</td><td>8,074.77</td><td>435.23</td><td>8,510.00</td></tr>
                            <tr><td>6</td><td>8,510.00</td><td>8,510.00</td><td>0.00</td><td>0.00</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>51,060.00</td><td></td><td>6,100.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 9. Tasa de interés de R<sub>A</sub> a valor P</h2>
                <p>Una asociación de dentistas ofrece sus servicios integrales vendiendo planes familiares anuales consistentes en realizar un pago de contado de $15,000 o ya bien pagos $4,600 trimestrales empezando a pagar al momento de la firma del contrato. Determine la tasa de interés trimestral que cobra la asociación, así como la tasa equivalente anual.</p>
                <p>Convirtiendo el plazo a la periodicidad de la renta, se procede al tanteo, interpretando que la tasa resultante será trimestral.</p>
                
                <p>Representando la operación con un diagrama:</p>

                <div class="grafica-placeholder"><img src="../img/RA_9.1.png" alt="[IMAGEN 9.1]"></div>

                <p>Sustituyendo valores arbitrarios en la ecuación simplificada del diagrama anterior:</p>
                
                <div class="table-responsive">
                    <table class="am-table" style="width: auto; margin: 1.5rem auto;">
                        <thead>
                            <tr><th>Valor de i</th><th>Resultado de la sustitución</th><th>Diferencia vs. 15,000</th></tr>
                        </thead>
                        <tbody>
                            <tr><td style="text-align:center;">0.1559</td><td>15,000.92...</td><td>0.92...</td></tr>
                            <tr><td style="text-align:center;"><strong>0.1560</strong></td><td><strong>14,999.21...</strong></td><td><strong>- 0.79...</strong></td></tr>
                            <tr><td style="text-align:center;">0.1561</td><td>14,997.49...</td><td>- 2.51...</td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Comprobación mediante una tabla:</p>
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 15.60 % trimestral, plazo en trimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P - RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>15,000.00</td><td>4,600.00</td><td>10,400.00</td><td>1,622.40</td><td>12,022.40</td></tr>
                            <tr><td>2</td><td>12,022.40</td><td>4,600.00</td><td>7,422.40</td><td>1,157.89</td><td>8,580.29</td></tr>
                            <tr><td>3</td><td>8,580.29</td><td>4,600.00</td><td>3,980.29</td><td>620.93</td><td>4,601.22</td></tr>
                            <tr><td>4</td><td>4,601.22</td><td>4,600.00</td><td>0.00</td><td>0.00</td><td>1.22</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>18,400.00</td><td></td><td>3,401.22</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 10. Plazo, Sf y Rf a valor P</h2>
                <p>Una empresa de factoraje financiero planea ofrecer vehículos con valor de $150,000, con un plan a crédito sin enganche y pagos de $11,300 mensuales, el primero al firmar el contrato; si se propone ganar una tasa del 7% mensual, ¿Cuál es el plazo que deberá establecer? ¿Qué cantidad espera recibir en el último periodo?</p>
                <p>Este es un problema de plazo, el cual una vez obtenido, se puede ajustar la Rf, mediante dos opciones.</p>
                
                <p>Representando la operación con un diagrama:</p>

                <div class="grafica-placeholder"><img src="../img/RA_10.1.png" alt="[IMAGEN 10.1]"></div>

                <p><strong>1ª Opción. Obtención del Sf en el periodo entero n=29. Mediante una tabla.</strong></p>
                <p>Por su dimensión, se muestran solamente los 3 últimos periodos.</p>
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 7 % mensual, plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P + RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>28</td><td>31,496.24</td><td>11,300.00</td><td>1,413.74</td><td>9,886.26</td><td>21,609.97</td></tr>
                            <tr><td>29</td><td>21,609.97</td><td>11,300.00</td><td>721.70</td><td>10,578.30</td><td>11,031.67</td></tr>
                            <tr><td>30</td><td>11,031.67</td><td>11,031.67</td><td>0.00</td><td>11,031.67</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>338,731.67</td><td>188,731.67</td><td>150,000.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
                <p>El Sf resultó ser $11,031.67, el cual deberá pagarse al inicio del periodo 30.</p>
                
                <p><strong>1ª Opción. Obtención del Sf en el final del periodo entero n=29. Mediante fórmulas</strong></p>
                <p>Existen dos formas de obtener el Sf mediante fórmulas. Se obtiene P con la fracción del plazo calculado. Por diferencia entre la deuda y pagos equivalentes al término del plazo. Se apoya con un diagrama para ilustrar la equivalencia de las operaciones:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_10.2.png" alt="[IMAGEN 10.2]"></div>

                <p>Como se aprecia en el diagrama, en el caso de RA no existe la opción de ajustar el Sf un periodo adicional, ya que al no existir RA al final del periodo 29, el Sf = Rf.</p>
                <p>Se concluye que el vehículo se paga con 29 pagos mensuales anticipados de $11,300, y un último de $11,031.67 al inicio del mes 30.</p>

                <p><strong>2ª Opción. Obtención del Sf con RV, considerando el primer pago como enganche.</strong></p>
                <p>Esta común que el estudiante relacione el pago anticipado como un enganche y lo disminuya desde un inicio: P = 150,000 - 11,300 = 138,700. Esto cambia la perspectiva, más no el resultado.</p>
                <p>Ilustrando la obtención del plazo mediante un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_10.3.png" alt="[IMAGEN 10.3]"></div>

                <p>Veamos que las respuestas son congruentes, ya que en esta última opción, resultó exactamente un periodo menos (29.975… vs. 28.975…). La diferencia es el mes que se restó de inicio, es decir, habrá que considerar que efectivamente se deberán realizar 29.975… pagos mensuales.</p>
                <p>Se aprecia que es una opción que requiere más práctica en la interpretación. Por lo que se recomienda no adecuar las anualidades vencidas y anticipadas de su contexto original.</p>
            </div>

            <div class="content-card">
                <h2>Ejemplo 11. Plazo, Sf y Rf a valor P</h2>
                <p>A un estudiante de idiomas le ofrecen una beca para perfeccionar su idioma en el extranjero. La condición es que él corra con gastos, de $10,000 a partir de hoy. Si cuenta con $200,000 en una cuenta que le paga el 24% anual proporcional mensual ¿Durante cuánto tiempo puede costear su estancia? ¿Cuánto dinero le hará falta para completar un último mes de gastos?</p>
                
                <p>Realizando un diagrama para ilustrar la obtención del número de periodos:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_11.1.png" alt="[IMAGEN 11.1]"></div>

                <p><strong>1ª Opción. Obtención del Sf en el periodo entero n=25. Mediante una tabla.</strong></p>
                <p>Por su dimensión, se muestran solamente los 3 últimos periodos.</p>

                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="6" style="background:#e1ecf4; color:#002B7A;">Tasa i = 2 % mensual, plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial P</th><th>Flujo Anticipado RA</th><th>Saldo parcial Sp = P + RA</th><th>Interés I = Sp * i</th><th>Saldo Final F = Sp + I</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>24</td><td>21,161.23</td><td>10,000.00</td><td>11,161.23</td><td>223.22</td><td>11,384.45</td></tr>
                            <tr><td>25</td><td>11,384.45</td><td>10,000.00</td><td>1,384.45</td><td>27.69</td><td>1,412.14</td></tr>
                            <tr><td>26</td><td>1,412.14</td><td>1,412.14</td><td>0.00</td><td>0.00</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>251,412.14</td><td></td><td>51,412.14</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>El Sf resultó ser $1,412.14, del cual podrá disponerse al inicio del periodo 26. O si lo prefiere, podrá retirar $1,384.45 al inicio del periodo 25, el cual corresponde al Sf justo después de realizar el último retiro completo de $10,000 (ver tabla).</p>
                <p>Se concluye que el saldo de la cuenta alcanza para 25 meses anticipados de gastos, y se tendrá un saldo de $1,412.14 al inicio del mes 26.</p>

                <p><strong>1ª Opción. Obtención del Sf en el final del periodo entero n=25. Mediante fórmulas.</strong></p>
                <p>Lo anterior es congruente con el inicio del periodo n=26. Existen dos formas de obtener el Sf mediante fórmulas. Se obtiene P con la fracción del plazo calculado. Por diferencia entre el Saldo inicial y los retiros equivalentes al término del plazo. Se apoya con un diagrama para ilustrar la equivalencia de las operaciones:</p>

                <div class="grafica-placeholder"><img src="../img/RA_11.2.png" alt="[IMAGEN 11.2]"></div>

                <p>Como se aprecia en el diagrama, en el caso de R<sub>A</sub> no existe la opción de ajustar el Sf un periodo adicional, ya que al no existir RA al final del periodo 25, el Sf = Rf.</p>
            </div>

            <div class="content-card">
                <h2>Ejemplo 12. AM con R<sub>A</sub></h2>
                <p>Un analista de mercado elabora un plan a crédito para la venta de un plóter, cuyo precio de contado se estableció en $31,500. Por experiencia sabe que sus clientes pagan en ocho meses en promedio. Si la política de la empresa es cobrar un interés del 1.35% mensual para las ventas a crédito, determine el valor de los pagos mensuales, considerando que deberá empezar a pagar desde el día de la compra.</p>
                
                <p>Veamos el planteamiento y solución en diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_12.1.png" alt="[IMAGEN 12.1]"></div>

                <p>La mecánica de la tabla por periodo de RA cambia respecto de RV ya que ahora el pago se encuentra al inicio del periodo, es decir, antes de que transcurra el tiempo. Por lo anterior se debe disminuir el pago al SI antes del cálculo del interés; esto implica intercambiar las columnas de I y de RA. También se agrega la columna de AM.</p>

                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="7" style="background:#e1ecf4; color:#002B7A;">Tasa i = 1.35 % mensual , plazo en meses</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial SI</th><th>Pago Anticipado RA</th><th>Saldo parcial Sp = SI - RA</th><th>Interés I = Sp * i</th><th>Amortización Am = RA - I</th><th>Saldo Final SF = SI - Am</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>31,500.00</td><td>4,124.76</td><td>27,375.24</td><td>369.57</td><td>3,755.19</td><td>27,744.81</td></tr>
                            <tr><td>2</td><td>27,744.81</td><td>4,124.76</td><td>23,620.05</td><td>318.87</td><td>3,805.89</td><td>23,938.92</td></tr>
                            <tr><td>3</td><td>23,938.92</td><td>4,124.76</td><td>19,814.16</td><td>267.49</td><td>3,857.27</td><td>20,081.65</td></tr>
                            <tr><td>4</td><td>20,081.65</td><td>4,124.76</td><td>15,956.89</td><td>215.42</td><td>3,909.34</td><td>16,172.31</td></tr>
                            <tr><td>5</td><td>16,172.31</td><td>4,124.76</td><td>12,047.55</td><td>162.64</td><td>3,962.12</td><td>12,210.19</td></tr>
                            <tr><td>6</td><td>12,210.19</td><td>4,124.76</td><td>8,085.43</td><td>109.15</td><td>4,015.61</td><td>8,194.58</td></tr>
                            <tr><td>7</td><td>8,194.58</td><td>4,124.76</td><td>4,069.82</td><td>54.94</td><td>4,069.82</td><td>4,124.76</td></tr>
                            <tr><td>8</td><td>4,124.76</td><td>4,124.76</td><td>0.00</td><td>0.00</td><td>4,124.76</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>32,998.08</td><td></td><td>1,498.08</td><td>31,500.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>Al totalizar las columnas de I, RA y AM, se aprecia que el pago debe ser suficiente para pagar el interés, y la diferencia amortiza el préstamo inicial.</p>
            </div>

            <div class="content-card">
                <h2>Ejemplo 13. AM con cambio de tasa, ajuste a la R<sub>A</sub></h2>
                <p>A un ingeniero mecánico le ofrecen un set de herramientas con escáner para abrir un taller y mejorar sus servicios. El costo es de $31,500, y se lo ofrecen a pagar a 4 años con pagos trimestrales iguales anticipados y una tasa de acuerdo con la inflación. La tasa inicial era de 2.28% trimestral, y después de 3 años aumenta a 3.75% trimestral.</p>
                <p>Determine el valor de los pagos antes y después del cambio de tasa, y realice la tabla de amortización que muestre la situación.</p>
                
                <p>Se debe realizar el cálculo de R<sub>A</sub> como si no se supiera cuándo cambiará la tasa, es decir, considerando el plazo original de 4 años. Representando la operación con un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_13.1.png" alt="[IMAGEN 13.1]"></div>

                <p>Posteriormente se obtiene el Sp al periodo de cambio de tasa por medio de un diagrama, en este caso en 3 años, o bien obtenerlo mediante una tabla. Representando el cálculo del Saldo parcial:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_13.2.png" alt="[IMAGEN 13.2]"></div>

                <p>Para completar la tabla necesitamos obtener la nueva R<sub>A</sub>, con la nueva tasa, considerando el Sp obtenido como P de la nueva serie, por estar a la izquierda de la misma. Representando el cálculo de la nueva Renta:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_13.3.png" alt="[IMAGEN 13.3]"></div>

                <p>Realizando la tabla con las dos rentas obtenidas previamente:</p>
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="8" style="background:#e1ecf4; color:#002B7A;">Tasa i variable trimestral, plazo en trimestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial SI</th><th>Tasa variable i</th><th>Pago Anticipado R<sub>A</sub></th><th>Saldo parcial Sp = SI - R<sub>A</sub></th><th>Interés I = Sp * i</th><th>Amortización Am = R<sub>A</sub> - I</th><th>Saldo Final SF = SI - Am</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>31,500.00</td><td>0.0228</td><td>2,318.88</td><td>29,181.12</td><td>665.33</td><td>1,653.55</td><td>29,846.45</td></tr>
                            <tr><td>2</td><td>29,846.45</td><td>0.0228</td><td>2,318.88</td><td>27,527.57</td><td>627.63</td><td>1,691.25</td><td>28,155.20</td></tr>
                            <tr><td>3</td><td>28,155.20</td><td>0.0228</td><td>2,318.88</td><td>25,836.32</td><td>589.07</td><td>1,729.81</td><td>26,425.39</td></tr>
                            <tr><td>4</td><td>26,425.39</td><td>0.0228</td><td>2,318.88</td><td>24,106.51</td><td>549.63</td><td>1,769.25</td><td>24,656.14</td></tr>
                            <tr><td>5</td><td>24,656.14</td><td>0.0228</td><td>2,318.88</td><td>22,337.26</td><td>509.29</td><td>1,809.59</td><td>22,846.55</td></tr>
                            <tr><td>6</td><td>22,846.55</td><td>0.0228</td><td>2,318.88</td><td>20,527.67</td><td>468.03</td><td>1,850.85</td><td>20,995.70</td></tr>
                            <tr><td>7</td><td>20,995.70</td><td>0.0228</td><td>2,318.88</td><td>18,676.82</td><td>425.83</td><td>1,893.05</td><td>19,102.65</td></tr>
                            <tr><td>8</td><td>19,102.65</td><td>0.0228</td><td>2,318.88</td><td>16,783.77</td><td>382.67</td><td>1,936.21</td><td>17,166.44</td></tr>
                            <tr><td>9</td><td>17,166.44</td><td>0.0228</td><td>2,318.88</td><td>14,847.56</td><td>338.52</td><td>1,980.36</td><td>15,186.08</td></tr>
                            <tr><td>10</td><td>15,186.08</td><td>0.0228</td><td>2,318.88</td><td>12,867.20</td><td>293.37</td><td>2,025.51</td><td>13,160.57</td></tr>
                            <tr><td>11</td><td>13,160.57</td><td>0.0228</td><td>2,318.88</td><td>10,841.69</td><td>247.19</td><td>2,071.69</td><td>11,088.88</td></tr>
                            <tr><td>12</td><td>11,088.88</td><td>0.0228</td><td>2,318.88</td><td>8,770.00</td><td>199.96</td><td>2,118.92</td><td>8,969.96</td></tr>
                            <tr style="background:#fff0cc;"><td>13</td><td>8,969.96</td><td>0.0375</td><td>2,367.80</td><td>6,602.16</td><td>247.58</td><td>2,120.22</td><td>6,849.74</td></tr>
                            <tr><td>14</td><td>6,849.74</td><td>0.0375</td><td>2,367.80</td><td>4,481.94</td><td>168.07</td><td>2,199.73</td><td>4,650.01</td></tr>
                            <tr><td>15</td><td>4,650.01</td><td>0.0375</td><td>2,367.80</td><td>2,282.21</td><td>85.58</td><td>2,282.22</td><td>2,367.79</td></tr>
                            <tr><td>16</td><td>2,367.79</td><td>0.0375</td><td>2,367.80</td><td>-0.01</td><td>0.00</td><td>2,367.80</td><td>-0.01</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td></td><td>37,297.76</td><td></td><td>5,797.75</td><td>31,500.01</td><td></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="content-card">
                <h2>Ejemplo 14. AM ponderada con pago inicial menor R<sub>A</sub></h2>
                <p>Con el fin de renegociar un antiguo adeudo por $1,200,000 que vence el día de hoy, una constructora propone amortizar el 25 % en dos años, empezando a realizar pagos semestrales desde el día de hoy, y el 75% restante en otros dos años más. Si la tasa que se acuerda es del 13% semestral, determine el valor de los pagos y realice la tabla de amortización.</p>
                
                <p>Este Sp se ubica al final del 4º semestre, por lo que debemos capitalizar el valor del SI en ese momento. Representando la operación con un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_14.1.png" alt="[IMAGEN 14.1]"></div>

                <p>Los Pe están situados al final del 4º semestre, es decir, a la derecha de la serie, por lo que se consideran su valor F equivalente; veamos su cálculo en el siguiente diagrama.</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_14.2.png" alt="[IMAGEN 14.2]"></div>

                <p>Realizando la tabla por periodo de la primera parte donde se amortizó el 25% de la deuda, interpretando los cálculos anteriormente realizados:</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="7" style="background:#e1ecf4; color:#002B7A;">Tasa i = 13 % semestral, plazo en semestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial SI</th><th>Pago Anticipado RA</th><th>Saldo parcial Sp = SI - RA</th><th>Interés I = Sp * i</th><th>Amortización Am = RA - I</th><th>Saldo Final SF = SI - Am</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>1</td><td>1,200,000.00</td><td>192,794.92</td><td>1,007,205.08</td><td>130,936.66</td><td>61,858.26</td><td>1,138,141.74</td></tr>
                            <tr><td>2</td><td>1,138,141.74</td><td>192,794.92</td><td>945,346.82</td><td>122,895.09</td><td>69,899.83</td><td>1,068,241.91</td></tr>
                            <tr><td>3</td><td>1,068,241.91</td><td>192,794.92</td><td>875,446.99</td><td>113,808.11</td><td>78,986.81</td><td>989,255.10</td></tr>
                            <tr><td>4</td><td>989,255.10</td><td>192,794.92</td><td>796,460.18</td><td>103,539.82</td><td>89,255.10</td><td>900,000.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>771,179.68</td><td></td><td>471,179.68</td><td>300,000.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>La segunda parte del problema, consiste en amortizar el Sp de 900,000, en el plazo restante n = 2 años = 4 semestres; esto es aplicando la AM general. Representando la operación con un diagrama:</p>
                
                <div class="grafica-placeholder"><img src="../img/RA_14.3.png" alt="[IMAGEN 14.3]"></div>

                <p>Concluyamos la segunda parte de la tabla por periodo:</p>
                
                <div class="table-responsive">
                    <table class="am-table">
                        <thead>
                            <tr><th colspan="7" style="background:#e1ecf4; color:#002B7A;">Tasa i = 13 % semestral, plazo en semestres</th></tr>
                            <tr><th>Plazo n</th><th>Saldo inicial SI</th><th>Pago Anticipado RA</th><th>Saldo parcial Sp = SI - RA</th><th>Interés I = Sp * i</th><th>Amortización Am = RA - I</th><th>Saldo Final SF = SI - Am</th></tr>
                        </thead>
                        <tbody>
                            <tr><td>5</td><td>900,000.00</td><td>267,765.29</td><td>632,234.71</td><td>82,190.51</td><td>185,574.78</td><td>714,425.22</td></tr>
                            <tr><td>6</td><td>714,425.22</td><td>267,765.29</td><td>446,659.93</td><td>58,065.79</td><td>209,699.50</td><td>504,725.72</td></tr>
                            <tr><td>7</td><td>504,725.72</td><td>267,765.29</td><td>236,960.43</td><td>30,804.86</td><td>236,960.43</td><td>267,765.29</td></tr>
                            <tr><td>8</td><td>267,765.29</td><td>267,765.29</td><td>0.00</td><td>0.00</td><td>267,765.29</td><td>0.00</td></tr>
                            <tr class="totals-row"><td>Totales</td><td></td><td>1,071,061.16</td><td></td><td>171,061.16</td><td>900,000.00</td><td></td></tr>
                            <tr class="totals-row"><td>Gran total</td><td></td><td>1,842,240.84</td><td></td><td>642,240.84</td><td>1,200,000.00</td><td></td></tr>
                        </tbody>
                    </table>
                </div>

                <p>En conclusión se tiene la opción de amortizar de una manera acelerada, normal o lenta, dependiendo del porcentaje de la deuda original estipulado, así como de los plazos negociados, donde se debe tener muy en cuenta la capacidad de pago del deudor. De la habilidad de negociación depende el hecho de que no se vuelva una deuda impagable, lo cual sería perjudicial tanto para el deudor como para el acreedor, ya que implicarían otros medios legales para finiquitar el adeudo.</p>
            </div>

        </main>

        <aside class="toc-sidebar">
            <div class="toc-title"><i class="fas fa-list"></i> Índice Ejemplos AA y AM a valor P</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
