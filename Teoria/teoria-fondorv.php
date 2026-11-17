<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Fondo de Amortización (Renta Vencida)', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Teoría de Fondo de Amortización con Renta Vencida</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
            <section>
            <h1>Anualidades</h1>
                <h2>Conceptos fundamentales Anualidades</h2>
                <h3>Definición Anualidad</h3>
                <div class="example-block"><p>Una anualidad es una serie de flujos de efectivo periódicos e iguales a \(Ic\), también conocidos como rentas (\(R\)); los flujos pueden <em>ser anuales, o tener cualquier otra periodicidad de las ya trabajadas: mensual, semanal, trimestral, etc.</em></p><p>Los siguientes ejemplos NO cumplen con los requisitos de una anualidad:</p><ul><li>3 flujos de efectivo de $1,000 a 2, 6 y 9 meses, respectivamente (Importes de igual valor, pero que no son periódicos)</li><li>3 flujos de efectivo quincenales, por $200, $400 y $600, respectivamente. (No son del mismo valor nominal, aunque sean periódicos)</li></ul><p>Los siguientes ejemplos son series con las características de una anualidad:</p><ul><li>9 flujos de efectivo trimestrales de $4,500 cada uno</li><li>52 flujos de efectivo semanales de $3,500 cada uno, ubicando el primero al inicio de la primera semana</li></ul></div>
            </section>
            <div class="section-divider"></div>

            <section>
                <div class="example-block"><h2>Clasificación de las Anualidades</h2><p><strong>Con base a la periodicidad de las variables</strong></p><p><em>Anualidad Simple</em>. Es aquella en la que las periodicidades de las 3 variables en juego (renta, tasa y plazo) son coincidentes. Ejemplo: Rentas mensuales durante 6 meses, a una tasa de interés del 3% mensual.</p><p><em>Anualidad general u ordinaria</em>. Es aquella en la que la periodicidad de alguna de las variables de tasa o plazo, o ambas, no coinciden con la de la renta. Ejemplo: Rentas bimestrales durante 9 meses, a una tasa de interés de 4.5% anual.</p><p><strong>Con base a la duración del plazo</strong></p><p><em>Anualidad Cierta</em>. Es aquella en la que se conoce el plazo que durará la serie de flujos. Ejemplo: La compra de un artículo a crédito a un plazo de seis meses.</p><p><em>Anualidad contingente</em>. Se da cuando se desconoce el plazo de duración de la serie de flujos. Ejemplo: La pensión por jubilación de un empleado hasta su fallecimiento.</p><p><em>Anualidad perpetua</em>. Es aquella en que el plazo de la serie de flujos no tiene fin. Ejemplo: Los premios Nobel que se entregan anualmente, en base a los intereses generados por el legado del científico sueco.</p><p><strong>Con base al momento en que comienza la serie de flujos</strong></p><p><em>Anualidad Vencida</em>. Es aquella en la que cada flujo de efectivo también llamado Renta (\(R_V\)) se realiza al final de cada periodo. Ejemplo: El sueldo de un empleado: primero trabaja y transcurre el tiempo, y al final le pagan.</p><p><em>Anualidad Anticipada</em>. Es aquella en la que cada flujo de efectivo también llamado Renta (\(R_A\)) se realiza al inicio de cada periodo. Ejemplo: El alquiler de un cuarto. Primero se paga y después se puede disponer del mismo.</p><p><em>Anualidad Diferida</em>. Se caracteriza por combinar las anualidades vencidas o anticipadas, con interés compuesto, ya que existen casos en los que las series de flujos se efectúen antes o después de un periodo de tiempo donde se precisan evaluar (diferimiento).</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Anualidad vencida (\(AV\)) a valor \(F\)</h2>
            <h3>Definición \(AV\)</h3>
            <div class="example-block"><p>Es aquella en la que cada flujo de efectivo (renta), se realiza al <em>final</em> de cada periodo.</p></div>
            <h3>Lineamientos de una \(AV\)</h3>
            <div class="didactic-note"><p>Si en las redacciones no se indica explícitamente que los flujos son anticipados (que comienzan el día de hoy o alguna alusión similar), se deberán entender por omisión que son vencidos, es decir, que se realizan a final de cada periodo.</p></div>
            <div class="didactic-note"><p>Lo fundamental en problemas de anualidades, es ajustar las periodicidades de plazo y tasa a la periodicidad de la renta, asumiendo que <em>la periodicidad de la renta es la que marca la pauta</em>.</p></div>
            <h3>Variables \(AV\) a valor \(F\)</h3>
            <div class="example-block"><p>\(R_V\) = Renta vencida o flujo periódico igual efectuado al término del periodo</p><p>\(n\) = Plazo de la serie expresado en periodos de capitalización de la tasa</p><p>\(i\) = Tasa capitalizable por periodo</p><p>\(F\) = Valor Futuro equivalente a la serie, resultado de la suma de montos Finales</p></div>
            </section>
            <div class="section-divider"></div>

                        <section>

                <h3>Fórmulas</h3>
                <img src="../img/fondo1.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">
                <img src="../img/fondo2.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">
                <img src="../img/fondo3.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:35%; display:block; margin: 1.5rem auto;">
                <img src="../img/fondo4.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:48%; display:block; margin: 1.5rem auto;">
                <img src="../img/fondo5.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:32%; display:block; margin: 1.5rem auto;">
                <img src="../img/fondo6.PNG" alt="Fórmulas Fondo Amortización" style="width:100%; max-width:35%; display:block; margin: 1.5rem auto;">

                <ul class="variable-list">
                    </ul>

                <div class="didactic-note">
                    <p>
                        El objeto de estudio aborda el <strong>Fondo de Amortización</strong> bajo la teoría de las Anualidades a <strong>Interés Compuesto</strong> estudiadas previamente, por lo que se emplearán las variables y fórmulas ya definidas y empleadas, pudiendo ser de anualidades vencidas, anticipadas o diferidas.
                    </p>
                </div>
            </section>
            <div class="section-divider"></div>

            <section>
                <h3>Fondo de Amortizacion (\(FA\))</h3>
                    <h1>Generalidades</h1>
                <h2>Definición y Características</h2>

                <div class="definition-block">
                    <h3>Definición</h3>
                    <p>
                        El <strong>Fondo de Amortización (FA)</strong> es el proceso gradual de acumulación de ahorros periódicos iguales, con la finalidad de cubrir el monto de una obligación futura que no se puede o no se permite amortizar, ya que el pago de la deuda o devolución del préstamo está fijado hasta el término del plazo estipulado. Ejemplos de este tipo de operaciones, entre otros son las emisiones de obligaciones, las cuales son un mecanismo de financiamiento a mediano y largo plazo, generalmente mayor a cinco años.
                    </p>
                    <p>
                        Este ejemplo o cualquier otro tipo de obligaciones que suelen contraer los particulares o el estado ante los terceros, sirven para financiarse de una forma más práctica, con una sola emisión a largo plazo, en lugar de contraer varios préstamos a corto plazo y con más frecuencia. Las finalidades suelen ser muy variadas, tales como el financiar la operación de negocios particulares, o ya bien, la necesidad del estado para realizar obras públicas.
                    </p>
                </div>

                <div class="definition-block">
                    <h3>Características</h3>
                    <p>
                        Cualquier otra forma de ahorrar para alcanzar un objetivo futuro, tales como viajar, estudiar, casarse, abrir un negocio o cualquier otro que no conlleve las características descritas arriba, se considerarán meramente como <strong>fondos de inversión</strong>, los cuales son mecanismos para lograr ahorrar generando intereses para incrementar el capital. Lo anterior ya fue estudiado en el capítulo de anualidades, al calcular el <strong>Monto Final (F)</strong> de la serie vencida, anticipada o diferida.
                    </p>
                    <p>
                        Una característica distintiva del <strong>Fondo de Amortización</strong> es que se elabora una tabla por periodo, donde se va apreciando cómo se va acumulando el dinero gradualmente hasta lograr conseguir el objetivo (<strong>Monto Final, F</strong>), ya sea mediante rentas preestablecidas, o a determinar en conjunto con el depósito final que logre dicho objetivo.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

             



            </main>

        <aside class="toc-sidebar">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de teoría</div>
                <nav class="toc-nav">
                    <ul id="toc-list">
                        </ul>
                </nav>
            </aside>
    </div>
</div>

<a href="../Menus/fondo_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
