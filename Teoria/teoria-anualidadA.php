<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Anualidad Anticipada y Amortización', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            <h1>Fundamentos de Anualidad Anticipada y Amortización</h1>
        </header>

    <div class="content-toc-grid">
        <main class="content-main content-card" id="teoria-contenido">

            <div class="content-card">
                <section>
                    <h2>Conceptos fundamentales Anualidades</h2>
                    
                    <h3>Definición Anualidad</h3>
                    <p>Una anualidad es una serie de flujos de efectivo periódicos e iguales a Ic, también conocidos como rentas (R); los flujos pueden ser anuales, o tener cualquier otra periodicidad de las ya trabajadas: mensual, semanal, trimestral, etc.</p>
                    <p>Los siguientes ejemplos NO cumplen con los requisitos de una anualidad:</p>
                    <ul>
                        <li>3 flujos de efectivo de $1,000 a 2, 6 y 9 meses, respectivamente (Importes de igual valor, pero que no son periódicos)</li>
                        <li>3 flujos de efectivo quincenales, por $200, $400 y $600, respectivamente. (No son del mismo valor nominal, aunque sean periódicos)</li>
                    </ul>
                    <p>Los siguientes ejemplos son series con las características de una anualidad:</p>
                    <ul>
                        <li>9 flujos de efectivo trimestrales de $4,500 cada uno</li>
                        <li>52 flujos de efectivo semanales de $3,500 cada uno, ubicando el primero al inicio de la primera semana</li>
                    </ul>

                    <h3>Clasificación de las Anualidades</h3>
                    <p><strong>Con base a la periodicidad de las variables</strong></p>
                    <ul>
                        <li><strong>Anualidad Simple.</strong> Es aquella en la que las periodicidades de las 3 variables en juego (renta, tasa y plazo) son coincidentes.<br>Ejemplo: Rentas mensuales durante 6 meses, a una tasa de interés del 3% mensual.</li>
                        <li><strong>Anualidad general u ordinaria.</strong> Es aquella en la que la periodicidad de alguna de las variables de tasa o plazo, o ambas, no coinciden con la de la renta.<br>Ejemplo: Rentas bimestrales durante 9 meses, a una tasa de interés de 4.5% anual.</li>
                    </ul>
                    
                    <p><strong>Con base a la duración del plazo</strong></p>
                    <ul>
                        <li><strong>Anualidad Cierta.</strong> Es aquella en la que se conoce el plazo que durará la serie de flujos.<br>Ejemplo: La compra de un artículo a crédito a un plazo de seis meses.</li>
                        <li><strong>Anualidad contingente.</strong> Se da cuando se desconoce el plazo de duración de la serie de flujos.<br>Ejemplo: La pensión por jubilación de un empleado hasta su fallecimiento.</li>
                        <li><strong>Anualidad perpetua.</strong> Es aquella en que el plazo de la serie de flujos no tiene fin. Ejemplo.<br>Los premios Nobel que se entregan anualmente, en base a los intereses generados por el legado del científico sueco.</li>
                    </ul>
                    
                    <p><strong>Con base al momento en que comienza la serie de flujos</strong></p>
                    <ul>
                        <li><strong>Anualidad Vencida.</strong> Es aquella en la que cada flujo de efectivo también llamado Renta (RV) se realiza al final de cada periodo.<br>Ejemplo: El sueldo de un empleado: primero trabaja y transcurre el tiempo, y al final le pagan.</li>
                        <li><strong>Anualidad Anticipada.</strong> Es aquella en la que cada flujo de efectivo también llamado Renta (RA) se realiza al inicio de cada periodo.<br>Ejemplo: El alquiler de un cuarto. Primero se paga y después se puede disponer del mismo.</li>
                        <li><strong>Anualidad Diferida.</strong> Se caracteriza por combinar las anualidades vencidas o anticipadas, con interés compuesto, ya que existen casos en los que las series de flujos se efectúen antes o después de un periodo de tiempo donde se precisan evaluar (diferimiento).</li>
                    </ul>
                </section>

                <hr style="margin: 3rem 0; border: 0; border-top: 1px solid var(--borde-color);">

                <section>
                    <h2>Anualidad Anticipada (AA) a valor P</h2>
                    
                    <h3>Definición AA</h3>
                    <p>Es aquella en la que cada flujo de efectivo (renta) se realiza al <strong>inicio</strong> de cada periodo.</p>

                    <h3>Lineamientos de la AA</h3>
                    
                    <div class="didactic-note">
                        <p>Para considerar que una las rentas son anticipadas (que comienzan el día de inicial o alguna alusión similar), deberá indicarse <strong>explícitamente</strong>; de lo contrario, se deberán entender por omisión, que son vencidas, es decir, que se realizan a final de cada periodo.</p>
                    </div>
                    
                    <div class="didactic-note">
                        <p>Lo fundamental en problemas de anualidades es ajustar las periodicidades de plazo y tasa a la periodicidad de la renta, asumiendo que <strong>la periodicidad de la renta es la que marca la pauta.</strong></p>
                    </div>

                    <h3>Variables AA a valor P</h3>
                    <ul class="variable-list">
                        <li><strong>RA</strong> = Renta anticipada o flujo periódico igual efectuado al inicio del periodo</li>
                        <li><strong>n</strong> = Plazo de la serie expresado en periodos de capitalización de la tasa</li>
                        <li><strong>i</strong> = Tasa capitalizable por periodo</li>
                        <li><strong>P</strong> = Valor Presente equivalente a la serie, resultado de la suma de Principales o capitales</li>
                    </ul>

                    <h3>Fórmulas AA a P</h3>
                    <div class="formula-block">
                        <span style="display: block; font-size: 0.85em; color: var(--unam-azul); font-weight: bold; text-align: right;">AA4</span>
                        \[ P = \frac{R_A}{i}\left(1 + i - (1+i)^{-(n-1)}\right) \]
                    </div>
                    
                    <p><strong>Fórmulas despejadas AA4:</strong></p>
                    <div class="formula-block">
                        <span style="display: block; font-size: 0.85em; color: var(--unam-azul); font-weight: bold; text-align: right;">AA5</span>
                        \[ R_A = \frac{P \cdot i}{1 + i - (1+i)^{-(n-1)}} \]
                    </div>
                    <div class="formula-block">
                        <span style="display: block; font-size: 0.85em; color: var(--unam-azul); font-weight: bold; text-align: right;">AA6</span>
                        \[ n = \frac{\log\!\left(1 + i - \dfrac{P \cdot i}{R_A}\right)}{-\log(1+i)} + 1 \]
                    </div>
                    <p style="color:#666; font-size:0.95em; text-align: center;"><em>i por tanteo en AA4 sin despeje</em></p>
                </section>

                <hr style="margin: 3rem 0; border: 0; border-top: 1px solid var(--borde-color);">

                <section>
                    <h2>Relación AA e Ic a valor P</h2>
                    <p>Al ser las anualidades un conjunto de operaciones a Ic, se representarán mediante diagramas de tiempo-valor, así como las ecuaciones de equivalencia en una FF. La única variable que cambia con relación a las AV es el subíndice de la Renta (RA), por lo que deberá tenerse especial cuidado en no confundir sus fórmulas.</p>

                    <h3>Plazo, Saldo final o insoluto Sf y Renta final ajustada Rf a valor P</h3>
                    <p>Cuando en los problemas de plazo resulte una cifra no entera, se puede determinar el remanente en el periodo entero resultante, o bien, un periodo después.</p>
                    <ul class="variable-list">
                        <li><strong>Sf</strong> = Saldo final equivalente. Es el saldo de una deuda o de una cuenta de inversión, valorada a su equivalente al término de cualquier periodo o del plazo. En las deudas se conoce como saldo insoluto.</li>
                        <li><strong>Si</strong> = Saldo inicial equivalente. Es un cálculo teórico de la deuda o depósito inicial, valorados en otro periodo distinto al inicial, como si no existieran pagos o retiros.</li>
                        <li><strong>Pe</strong> = Pagos equivalentes. Es un cálculo teórico que representa el total de los pagos valorados al término de un periodo dado, como si se hubieran ahorrado.</li>
                        <li><strong>Re</strong> = Retiros equivalentes. Es un cálculo teórico que representa el total de los retiros valorados al término de un periodo dado, como si se hubieran ahorrado.</li>
                        <li><strong>Rf</strong> = Renta final ajustada. Es el pago o retiro distinto a la serie, que liquida una deuda o reúne un saldo en un periodo dado.</li>
                    </ul>
                </section>

                <hr style="margin: 3rem 0; border: 0; border-top: 1px solid var(--borde-color);">

                <section>
                    <h2>Generalidades AM con RA</h2>
                    
                    <h3>Definición de AM</h3>
                    <p>De acuerdo con la Real Academia Española, amortizar significa redimir o extinguir el capital de un préstamo o deuda; el término cancelar significa pagar o saldar una deuda. Por ello, el término amortizar se entenderá como la cancelación una deuda.</p>
                    <p>Financieramente hablando, definimos a la amortización como el proceso gradual de cancelación de una deuda actual, mediante pagos periódicos iguales o variables, destinados en parte a pagar el interés generado en el periodo, y por otra a cancelar la deuda originalmente adquirida.</p>

                    <h3>Necesidad de la AM</h3>
                    <p>En México los créditos hipotecarios a mediano y largo plazo, se estipulan a plazos de 25 o 30 años, tiempo en el cual, si al término de este no se cancelan, el estado absorbe el adeudo restante.<br>
                    Esto es debido a que al ser los intereses tan variables y onerosos, no permiten amortizar el crédito en el plazo establecido.<br>
                    Es muy común encontrar casos donde la mayoría de la gente no puede adquirir bienes con un pago de contado, sobre todo tratándose de vehículos, maquinaria, o ya bien inmuebles como terrenos, edificios, casas u oficinas; por lo anterior, se tiene que recurrir a créditos que permitan la facilidad de pagar a través del tiempo.</p>

                    <h3>Ventajas y desventajas de las tablas de AM</h3>
                    <p>La principal ventaja de las tablas de amortización, las cuales son como las empleadas en la comprobación de los problemas de anualidades, es que permite interpretar cada problema, en cada periodo del proceso de cancelación.</p>
                    <p>La principal desventaja del uso de las tablas de amortización, es la laboriosidad en su elaboración. Para facilitar su realización, se proveen algoritmos para calculadora científica, o ya bien crearlas mediante el simulador financiero también provisto.</p>

                    <h3>Amortización general (AM)</h3>
                    <p><strong>Definición AM general:</strong> Es aquella que se obtiene de la diferencia entre el valor del pago periódico y los intereses del periodo. Por lo anterior, el pago debe ser suficiente para pagar el interés, y la diferencia amortiza el préstamo inicial.</p>
                    
                    <p><strong>Variables AM:</strong></p>
                    <ul class="variable-list">
                        <li><strong>Am</strong> = Amortización del periodo</li>
                        <li><strong>R</strong> = Renta. Puede ser vencida o anticipada</li>
                        <li><strong>I</strong> = Interés</li>
                    </ul>
                    <p>Las variables R e I, son la renta e interés de la teoría de anualidades. Emplea las fórmulas ya conocidas de anualidades vencidas o anticipadas a valor presente.</p>
                    
                    <div class="formula-block">
                        <span style="display: block; font-size: 0.85em; color: var(--unam-azul); font-weight: bold; text-align: right;">Fórmula AM general</span>
                        \[ Am = R - I \]
                    </div>

                    <h3>Amortización ponderada con RA a valor P</h3>
                    <p><strong>Definición AM ponderada con RA a valor P:</strong> Es aquella en la que se amortizan diversos porcentajes en determinados plazos y con una finalidad específica: realizar pagos de mayor o menor cuantía de acuerdo con la necesidad del deudor o del acreedor.</p>
                    <p>Lo que determina la cuantía, no es tanto el porcentaje a amortizar, sino el plazo en que esto ocurre, con relación al plazo total.</p>
                </section>
            </div>
        </main>

        <aside class="toc-sidebar">
            <div class="toc-title"><i class="fas fa-list"></i>Índice Fundamentos de Anualidad Anticipada y Amortización</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
