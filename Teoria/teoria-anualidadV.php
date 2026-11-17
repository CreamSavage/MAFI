<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Amortización y Anualidad Vencida', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Conceptos Fundamentales de Anualidades</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
            <section>
                <h2>Definición de Anualidades</h2>

                <div class="definition-block">
                    <h3>Definición</h3>
                    <p>
                        Una anualidad es una serie de flujos de efectivo periodicos a Ic, tambien conocidos como rentas (R); los flujos pueden ser anuales o tener cualquier otra periodicidad de las ya trabajadas: mensual, semanal, trimestral, etc
                    </p>
                    <p>
                        Los siguientes ejemplos NO cumplen con los requisitos de una anualidad:
                    </p>
                    <li>
                        <lu>
                            3 flujos de efectivo de $1,000 a 2 6 y 9 meses, respectivamente (importes de igual valor, pero que no son periodicos)
                        </lu>
                        <lu>
                            3 flujos de efectivo quincenales, por $200, $400 y $600, respectivamente. (No son del mismo valor nominal, aunque sean periodicos)
                        </lu>
                    </li>
                    <p>
                        Los siguientes ejemplos son series con las caracteristicas de una anualidad:
                    </p>
                    <li>
                        <lu>
                            9 flujos de efectivo trimestral de $4,500 cada uno 
                        </lu>
                        <lu>
                            52 flujos de efectivo semanalas de $3,500 cada uno, ubicando el primero al inicio de la semana
                        </lu>
                    </li>
                </div>
            </section>

            <div class="section-divider"></div>
            <section>
                <h2>Clasificacion de las anualidades</h2>
                <li>
                    <lu>
                        Con base a la periodicidad de las variables 
                    </lu>
                </li>
                <p>
                    <strong> Anualidad Simple. </strong>Es aquella en la que las periodicidades de las 3 variables en juego (renta, tasa y plazo) son coincidentes. Ejemplo: Rentas mensuales durante 6 meses, a una tasa de interes de 3% mensual 
                </p>
                <p>
                    <strong>Anualidad general u ordinaria. </strong>Es aquella en la que la periodicidad de alguna de las variables de tasa o plazo o ambas no coinciden con la de la renta. Ejemplo: Rentas bimestrales durante 9 meses, a una tasa de interes de 4.5% anual.
                </p>
                <li>
                    <lu>
                        Con base a duracion del plazo 
                    </lu>
                </li>
                <p>
                    <strong> Anualidad Cierta. </strong>Es aquella en la que se conoce el plazo que durara la serire de flujos. Ejemplo: La compra de un articulo a credito a un plazo de seis meses.
                </p>
                <p>
                    <strong> Anualidad contingente. </strong> da cuando se desconoce el plazo de duracion de la serie de flujos. Ejemplo: La pension por jubilacion de un empleado hasta su fallecimiento.
                </p>
                <p>
                    <strong> Anualidad perpetua. </strong> aquella en que el plazo de la serie de flujos no tiene fin. Ejemplo. Los premios Nobel que se entregan anualmente, en base a los intereses generados por el legado del cientifico sueco.
                </p>
                <li>
                    <lu>
                        Con base al momento en que comienza la serie de flujos 
                    </lu>
                </li>
                <p>
                    <strong> Anualidad Vencida. </strong>Es aquella en la que cada flujo de efectivo tambien llamado Renta (\(R_v\)) se realiza al final de cada periodo. Ejemplo: El sueldo de un empleado: primero trabaja y transcurre el tiempo, y al final le pagan.
                </p>
                <p>
                    <strong> Anualidad Anticipada. </strong>Es aquella en la que por combinar las anualidades vencidas o anticipadas, con interes compuesto ya que existen casos en los que las serires de flujos se efectuen antes o despues de un periodo de tiempo donde se precisan evaluar (diferimiento).
                </p>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2> Anualidad vencida (AV) a valor F</h2>
                <p>
                    Es aquella en la que cada flujo de efectivo (renta), se realiza al final de cada periodo.
                </p>
                <h2>Lineamientos de una AV</h2>
                <div class="didactic-note">
                    <p>
                        Si en las redacciones no se indica explicitamente que los flujos son anticipados (que comienzan el dia de hoy o alguna alusion similar), se deberan entender por omision que son vencidos, es decir, que se realizan a final de cada periodo.
                    </p>
                    <p>
                        Lo fundamental en problemas de anualidades, es ajustar las periodicidades de plazo y tasa a la periodicidad de la renta, asumiendo que la periodicidad de la renta es la que marca la pauta.
                    </p>
                </div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Variables y Fórmulas</h2>

                <h3 style="margin-top: 2.5rem;">Variables</h3>
                <ul class="variable-list">
                    <li>
                        <strong>\( R_v \) =</strong> Renta vencida o flujo periodico igual efectuando al termino del periodo 
                    </li>
                    <li>
                        <strong>n =</strong> Plazo de la serie expresado en periodos de capitalizacion de la tasa 
                    </li>
                    <li>
                        <strong>i = </strong> Tasa capitalizable por periodo 
                    </li>
                    <li>
                        <strong>F = </strong> Valor futuro equivalente a la serie, resultado de la suma de montos finales
                    </li>
                </ul>

                <h3 style="margin-top: 2.5rem;">Fórmulas AV a valor de F</h3>
                <img src="../img/anualidad_vencidaF.png" alt="Fórmulas de anualidad vencidaF" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">
                <h3 style="margin-top: 2.5rem;">Formulas despejadas de AV1</h3>
                <img src="../img/anualidad_vencidaF-despejadas.png" alt="Fórmulas de anualidad vencida despejadas" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">

            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Fondo de Amortizacion (FA)</h2>
                <div class="definition-block">
                    <h3>Definicion FA</h3>
                    <p>
                        Es el proceso gradual de acumulacion de ahorros periodicos iguales con la finalidad de cubrir el monto de una obligacion futura que no se puede o no se permite amortizar, ya que el pago de la deuda esta fijado hasta el termino del plazo estipulado.
                    </p>
                    <p>
                        Como ejemplo tenemos entre otros, las emisiones de obligaciones mayores a cinco años, las cuales son un mecanismo de financiamiento a mediano y largo plazo, que contraen los particulares o el estado ante los terceros. 
                    </p>
                </div>
                <div class="definition-block">
                    <h3>Finalidad FA</h3>
                    <p>
                        Su finalidad es financiarse de una forma practica, con una sola emision de obligaciones a largo plazo, en lugar de contraer varios prestamos a corto plazo y con mas frecuencia, con fines varios tales como la operacion de negocios particulares, o ya bien, la necesidad del estado para realizar obras publicas.
                    </p>
                    <p>
                        Cualquier otra forma de ahorrar para alcanzar un objetivo futuro, como viajar, estudiar, casarse, abrir un negocio o cualquie otro que no conlleve las caracteristicas descritas arriba, se consideran meramente como fondos de inversion.
                    </p>
                </div>
                <div class="definition-block">
                    <h3>Caracteristicas FA</h3>
                    <p>
                        Una caracteristica distintiva del FA es que se elabora una tabla por periodo, donde se va apreciando como se va acumulando el dinero gradualmente hasta lograr conseguir un proposito, ya que sea mediante rentas preestablecidas, o a determinar en conjunto con el deposito final que logre dicho objetivo
                    </p>
                    <p>
                        Al igual que en el tema de AM, se cuenta con el modulo de algoritmos de calculadora cientifica que apoyen al llenado de las tablas, que en ocasiones pueden llegar a ser muy laboriosos, o ya bien, emplear el simulador provisto para dicho fin.
                    </p>
                </div>                
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Variables y Formulas FA</h2>
                <p>
                    El FA opera bajo la teoria de las Anualidades de Ic estudiadas previamente, por lo que se emplearan las variables y formulas ya definidas y ejemplificadas, por lo que podran ser anualidades vencidas, anticipadas o diferidas
                </p>
            </section>
            <div class="section-divider"></div>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de teoría">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de teoría</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
