<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Fondo de Amortización (Renta Anticipada)', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Anualidad Anticipada y Fondo de Amortización
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
                <section>
                    <h2 id="conceptos-anualidades">Conceptos fundamentales Anualidades</h2>

                    <div class="definition-block">
                        <h3 id="def-anualidad">Definición Anualidad</h3>
                        <p>
                            Una anualidad es una serie de flujos de efectivo periódicos e iguales a $I_c$, también conocidos como rentas ($R$); los flujos pueden <em>ser anuales, o tener cualquier otra periodicidad de las ya trabajadas: mensual, semanal, trimestral, etc.</em>
                        </p>
                        
                        <p style="margin-top: 1.5rem; font-weight: bold;">
                            Los siguientes ejemplos NO cumplen con los requisitos de una anualidad:
                        </p>
                        <ul class="variable-list">
                            <li>
                                • 3 flujos de efectivo de \$1,000 a 2, 6 y 9 meses, respectivamente.<br>
                                <span style="color: #666; font-size: 0.9em;">(Importes de igual valor, pero que no son periódicos)</span>
                            </li>
                            <li>
                                • 3 flujos de efectivo quincenales, por \$200, \$400 y \$800, respectivamente.<br>
                                <span style="color: #666; font-size: 0.9em;">(No son del mismo valor nominal, aunque sean periódicos)</span>
                            </li>
                        </ul>

                        <p style="margin-top: 1.5rem; font-weight: bold;">
                            Los siguientes ejemplos son series con las características de una anualidad:
                        </p>
                        <ul class="variable-list">
                            <li>• 9 flujos de efectivo trimestrales de \$4,500 cada uno.</li>
                            <li>• 52 flujos de efectivo semanales de \$3,500 cada uno, ubicando el primero al inicio de la primera semana.</li>
                        </ul>
                    </div>
                    <h2 id="clasificacion-anualidades">Clasificación de las Anualidades</h2>

                    <div class="definition-block">
                        <h3 id="periodicidad-variables">Con base a la periodicidad de las variables</h3>
                        
                        <p style="margin-top: 1rem;">
                            <strong><em>Anualidad Simple.</em></strong> Es aquella en la que las periodicidades de las 3 variables en juego (renta, tasa y plazo) son coincidentes. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> Rentas mensuales durante 6 meses, a una tasa de interés del 3% mensual.
                        </p>

                        <p style="margin-top: 1.5rem;">
                            <strong><em>Anualidad general u ordinaria.</em></strong> Es aquella en la que la periodicidad de alguna de las variables de tasa o plazo, o ambas, no coinciden con la de la renta. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> Rentas bimestrales durante 9 meses, a una tasa de interés de 4.5% anual.
                        </p>
                    </div>
                    <div class="definition-block">
                        <h3 id="duracion-plazo">Con base a la duración del plazo</h3>
                        
                        <p style="margin-top: 1rem;">
                            <strong><em>Anualidad Cierta.</em></strong> Es aquella en la que se conoce el plazo que durará la serie de flujos. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> La compra de un artículo a crédito a un plazo de seis meses.
                        </p>

                        <p style="margin-top: 1.5rem;">
                            <strong><em>Anualidad contingente.</em></strong> Se da cuando se desconoce el plazo de duración de la serie de flujos. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> La pensión por jubilación de un empleado hasta su fallecimiento.
                        </p>

                        <p style="margin-top: 1.5rem;">
                            <strong><em>Anualidad perpetua.</em></strong> Es aquella en que el plazo de la serie de flujos no tiene fin. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> Los premios Nobel que se entregan anualmente, en base a los intereses generados por el legado del científico sueco.
                        </p>
                    </div>

                    <div class="definition-block">
                        <h3 id="momento-flujos">Con base al momento en que comienza la serie de flujos</h3>
                        
                        <p style="margin-top: 1rem;">
                            <strong><em>Anualidad Vencida.</em></strong> Es aquella en la que cada flujo de efectivo también llamado Renta ($R_v$) se realiza al final de cada periodo. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> El sueldo de un empleado: primero trabaja y transcurre el tiempo, y al final le pagan.
                        </p>

                        <p style="margin-top: 1.5rem;">
                            <strong><em>Anualidad Anticipada.</em></strong> Es aquella en la que cada flujo de efectivo también llamado Renta ($R_a$) se realiza al inicio de cada periodo. <br>
                            <span style="color: var(--unam-azul); font-weight: bold;">Ejemplo:</span> El alquiler de un cuarto. Primero se paga y después se puede disponer del mismo.
                        </p>

                        <p style="margin-top: 1.5rem;">
                            <strong><em>Anualidad Diferida.</em></strong> Se caracteriza por combinar las anualidades vencidas o anticipadas, con interés compuesto, ya que existen casos en los que las series de flujos se efectúen antes o después de un periodo de tiempo donde se precisan evaluar (diferimiento).
                        </p>
                    </div>
                </section>

                <div class="section-divider"></div>

                <section>
                    <h2 id="anualidad-anticipada-f">Anualidad Anticipada ($AA$) a valor $F$</h2>

                    <div class="definition-block">
                        <h3 id="definicion-aa">Definición $AA$</h3>
                        <p>
                            Es aquella en la que cada flujo de efectivo (renta) se realiza al <em>inicio</em> de cada periodo.
                        </p>
                    </div>

                    <div class="definition-block">
                        <h3 id="lineamientos-aa">Lineamientos de una $AA$</h3>
                        
                        <p style="font-style: italic; font-size: 1em; color: #555; margin-top: 1rem;">
                            Para considerar que las rentas son anticipadas (que comienzan el día inicial o alguna alusión similar), deberá indicarse explícitamente; de lo contrario, se deberán entender por omisión, que son vencidas, es decir, que se realizan a final de cada periodo.
                        </p>
                        
                        <p style="font-style: italic; font-size: 1em; color: #555; margin-top: 1.5rem;">
                            Lo fundamental en problemas de anualidades es ajustar las periodicidades de plazo y tasa a la periodicidad de la renta, asumiendo que <strong>la periodicidad de la renta es la que marca la pauta</strong>.
                        </p>
                    </div>
                </section>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3 id="variables-aa-f">Variables $AA$ valor $F$</h3>
                        <ul class="variable-list">
                            <li><strong>$R_A =$</strong> Renta anticipada o flujo periódico igual efectuado al inicio del periodo</li>
                            <li><strong>$n =$</strong> Plazo de la serie expresado en periodos de capitalización de la tasa</li>
                            <li><strong>$i =$</strong> Tasa capitalizable por periodo</li>
                            <li><strong>$F =$</strong> Valor Futuro equivalente a la serie, resultado de la suma de montos Finales</li>
                        </ul>
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3 id="formulas-aa-f">Fórmulas $AA$ a valor $F$</h3>
                        
                        <div style="text-align: center; font-style: normal; margin-top: 1.5rem; margin-bottom: 2.5rem;">
                            <p>$$F = \left(\frac{R_A}{i}\right) ((1 + i)^{n+1} - (1 + i)) \quad \dots (AA1)$$</p>
                        </div>

                        <h3 id="formulas-despejadas-aa1">Fórmulas despejadas de $AA1$</h3>
                        
                        <div style="text-align: center; font-style: normal; margin-top: 1.5rem;">
                            <p>$$R_A = \frac{F \cdot i}{(1 + i)^{n+1} - (1 + i)} \quad \dots (AA2)$$</p>
                            
                            <p style="margin-top: 1.5rem;">$$n = \frac{\log\left(\frac{F \cdot i}{R_A} + 1 + i\right)}{\log(1 + i)} - 1 \quad \dots (AA3)$$</p>
                            
                            <p style="margin-top: 2rem; font-style: italic; color: #555; font-size: 1.1em;">
                                $i$ por tanteo en $AA1$ \quad \textbf{sin despeje}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="section-divider"></div>

                <section>
                    <h2 id="fondo-amortizacion-fa">Fondo de Amortización ($FA$)</h2>
                    
                    <h3 id="generalidades-fa" style="border-bottom: 1px solid var(--borde-color); padding-bottom: 10px; margin-bottom: 20px; font-style: italic;">
                        Generalidades
                    </h3>

                    <div class="definition-block">
                        <h3 id="definicion-fa-exacta">Definición $FA$</h3>
                        <p>
                            Es el proceso gradual de acumulación de ahorros periódicos iguales, con la finalidad de cubrir el monto de una obligación futura que <em>no se puede o no se permite amortizar</em>, ya que el pago de la deuda está fijado hasta el término del plazo estipulado.
                        </p>
                        <p style="margin-top: 1.5rem;">
                            Como ejemplo tenemos entre otros, las emisiones de obligaciones mayores a cinco años, las cuales son un mecanismo de financiamiento a mediano y largo plazo, que contraen los particulares o el estado ante los terceros.
                        </p>
                    </div>

                    <div class="definition-block">
                        <h3 id="finalidad-fa">Finalidad $FA$</h3>
                        <p>
                            Su finalidad es financiarse de una forma práctica, con una sola emisión a largo plazo, en lugar de contraer varios préstamos a corto plazo y con más frecuencia, con fines varios tales como la operación de negocios particulares, o ya bien, la necesidad del estado para realizar obras públicas.
                        </p>
                        <p style="margin-top: 1.5rem;">
                            Cualquier otra forma de ahorrar para alcanzar un objetivo futuro, como viajar, estudiar, casarse, abrir un negocio o cualquier otro que no conlleve las características descritas arriba, se consideran meramente como <em>fondos de inversión</em>.
                        </p>
                    </div>

                    <div class="definition-block">
                        <h3 id="caracteristicas-fa">Características $FA$</h3>
                        <p>
                            Una característica distintiva del $FA$ es que se elabora una tabla por periodo, donde se va apreciando cómo se va acumulando el dinero gradualmente hasta lograr conseguir un propósito, ya sea mediante rentas preestablecidas, o a determinar en conjunto con el depósito final que logre dicho objetivo.
                        </p>
                        <p style="margin-top: 1.5rem;">
                            Al igual que en el tema de $AM$, se cuenta con el módulo de algoritmos de calculadora científica que apoyen al llenado de las tablas, que en ocasiones pueden llegar a ser muy laboriosos, o ya bien, emplear el simulador provisto para dicho fin.
                        </p>
                    </div>

                    <div class="definition-block">
                        <h3 id="variables-formulas-fa">Variables y fórmulas $FA$</h3>
                        <p>
                            El $FA$ opera bajo la teoría de las Anualidades a $Ic$ estudiadas previamente, por lo que se emplearán las variables y fórmulas ya definidas y ejemplificadas, por lo que podrán ser de anualidades vencidas, anticipadas o diferidas.
                        </p>
                    </div>
                </section>
            </main>

        <aside class="toc-sidebar">
                <div class="toc-title"><i class="fas fa-list"></i> Contenido</div>
                <nav class="toc-nav">
                    <ul id="toc-list"></ul>
                </nav>
            </aside>
    </div>
</div>

<a href="../Menus/fondo_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
