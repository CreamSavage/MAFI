<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoria: Interés Simple', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Fundamentos del Interés Simple
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
                
                <section>
                    <h2>Conceptos Fundamentales</h2>
                    <div class="definition-block">
                        <h3>Necesidad u origen del interés</h3>
                        <p>Una de las principales fuentes del interés es la mentalidad capitalista, la cual radica en invertir el dinero esperando una ganancia, rédito o utilidad. También se invierte el dinero para evitar la pérdida del poder adquisitivo de la moneda por el mero transcurso del tiempo, es decir, en general se espera que los bienes y servicios cuesten más entre más tiempo transcurra, y no se pueda comprar la misma cantidad de artículos o servicios hoy que en una fecha futura.</p>
                        <p style="text-indent: 40px;">De lo anterior, se desprenden esencialmente dos enfoques:</p>
                        <ul style="margin-left: 40px;">
                            <li>Del inversionista o acreedor. El cual espera una ganancia y conservación del poder adquisitivo de su dinero.</li>
                            <li> Del deudor. El cual espera pagar el menor costo posible por los bienes o servicios que consume, ya sea de contado o a crédito, o ya bien por el dinero que recibe en préstamo.</li>
                        </ul>
                    </div>

                    <div class="definition-block">
                        <h3>Valores nominales</h3>
                        <p>Son cantidades que tienen el mismo importe, pero distinto poder adquisitivo a través del tiempo. Así, un billete de \$500 pesos el día de hoy, es nominalmente igual a uno de \$500 dentro de un año, pero no son equivalentes (no valdrán lo mismo) ya que con \$500 dentro de un año, no se podrá comprar lo mismo que en el día de hoy.</p>
                        <p>En el enfoque de inversionista se espera que \$500 invertidos el día de hoy, a una tasa del 10% anual (por ejemplo), se obtengan \$550 al término del año, producto de la inversión inicial de \$500 adicionados con el interés de \$50.</p>
                </div>

                    <div class="definition-block">
                        <h3>Valores equivalentes</h3>
                        <p>Son valores distintos nominalmente, pero que se dicen equivalentes en el tiempo si producen el mismo rendimiento de interés al término del plazo de una operación. Los \$500 del punto anterior, se dirán equivalentes a \$550 dentro de un año, a la tasa del 10% anual. Si el plazo o la tasa cambiaran, los \$500 ya no serían equivalentes a \$550.</p>
                    </div>
                </section>

                <div class="definition-block">
                    <h3>Definición de interés</h3>
                    <p>Es la cantidad de dinero que se genera por el uso de este a través del tiempo y a razón de una tasa dada. Para poder entender la teoría del interés deberá estar familiarizado con los fundamentos relativos a las conversiones de tiempo, tasa, redondeo, uso de calculadora, etcétera.</p>
                </div>

                <div class="definition-block">
                    <h3>Tasas equivalentes</h3>
                    <p>Son aquellas que producen el mismo interés en el mismo plazo. Las tasas equivalentes lo serán en cualquier periodo donde se correspondan; por ejemplo, una tasa mensual será equivalente a una trimestral en un trimestre, un semestre, 9 meses, un año, etcétera.</p>
                </div>

                <div class="section-divider"></div>

                <section>
                    <h2>Interés Simple ($I_s$)</h2>
                    <div class="definition-block">
                        <h3>Definición de $I_s$</h3>
                        <p>Es aquella cantidad de dinero que se obtiene de aplicar una tasa periódica, invariablemente sobre una cantidad llamada Principal o capital, durante un lapso llamado plazo, dividido en periodos acordes con los periodos de pago de la tasa de interés.</p>
                        <p>Al agregar el Interés de toda la operación al Principal o capital, se obtiene el monto Final, el cual se dice que es el valor equivalente al Principal, al plazo y tasa dados. Tanto el interés como la tasa, se comportan de una manera proporcional al tiempo.</p>
                    </div>
                </section>

                <section>
                    <h2>Variables de $I_s$</h2>
                    <ul class="variable-list">
                        <li><strong>$I$ = Interés:</strong>Es la cantidad de dinero generado en toda la operación financiera, respecto de una tasa y plazo dados. En el caso del $I_s$, se calcula proporcional e invariablemente sobre $P$</li>
                        <li><strong>$P$ = Principal o capital inicial:</strong> Es la cantidad de dinero inicialmente prestada o invertida. Se empleará indistintamente el término Principal o capital inicial</li>
                        <li><strong>$i_s$ = Tasa de interés simple:</strong> Es el porcentaje aplicable invariablemente sobre el Principal capital inicial</li>
                        <li><strong>$n$ = Plazo:</strong> Es el tiempo que dura una operación financiera, expresado en periodos de pago de la tasa de interés simple</li>
                        <li><strong>$F$ = Monto final:</strong> Es la cantidad de dinero cobrada o retirada al final del plazo. Incluye al Principal y al Interés</li>
                    </ul>
                </section>

                <section>
                    <h2>Fórmulas de Interés Simple</h2>
                    <div class="text-center" style="font-size: 1.5rem; margin: 2rem 0;">
                        $$
                        \begin{aligned}
                         F &= P + I           & \text{IS1} \\
                        I &= F - P           & \text{IS2} \\
                        I &= P \, n \, i_s   & \text{IS3} \\
                        F &= P (1 + n \, i_s) & \text{IS4}
                        \end{aligned}
                        $$
                    </div>
                </section>
                
                <section>
                    <h2>Fórmulas Despejadas</h2>
                    <div class="text-center" style="font-size: 1.5rem; margin: 2rem 0;">
                         $$\begin{aligned}
                        P &= \frac{F}{1 + n \, i_s} & \text{IS5} \\[10pt]
                        n &= \frac{\frac{F}{P} - 1}{i_s} & \text{IS6} \\[10pt]
                        i_s &= \frac{\frac{F}{P} - 1}{n} & \text{IS7} \\[10pt]
                        i_s &= \frac{I}{P} & \text{IS8}
                        \end{aligned}
                        $$
                    </div>
                </section>
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

<a href="../Menus/interes_simple.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
