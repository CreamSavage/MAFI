<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Descuento', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Descuentos</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
            <section>
                <h2>Conceptos fundamentales Descuentos</h2>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Definición de descuento</h3>
                    <p>
                        Descontar es la acción de disminuir los intereses a una cantidad situada en tiempo futuro.
                    </p>
                </div>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Definición de descuento racional o matemático</h3>
                    <p>
                        Es aquel que se aplica al <strong>Principal</strong> o capital de una manera proporcional al tiempo, es decir, se calcula a $I_s$. Retomemos lo estudiado en el capítulo anterior con el siguiente ejemplo, incluyendo las variables previamente definidas.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Generalidades del Descuento Bancario</h2>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Necesidad u origen del Descuento bancario $D_b$</h3>
                    <p>
                        Las operaciones de $D_b$ están muy generalizadas en la práctica, debido a la necesidad de liquidez por parte de las empresas y comerciantes que son poseedores de títulos de crédito tales como pagarés o letras de cambio, cuya principal característica es que en su texto menciona principalmente una cantidad a pagar en fecha futura.
                    </p>
                    <p>
                        A continuación reproducimos los requisitos regulados por la <strong>Ley General de Títulos y Operaciones de Crédito (LGTOC)</strong>, donde se aprecia que en el texto del documento no se menciona el origen del adeudo, el cual puede ser por un préstamo de dinero, la venta de artículos a crédito, la prestación de un servicio, entre muchas otras causas.
                    </p>
                </div>

                <h2>Letra de cambio</h2>
                <h3>Artículo 76.- La letra de cambio debe contener:</h3>
                <ul class="variable-list">
                    <li><strong>I.</strong> La mención de ser letra de cambio, inserta en el texto del documento.</li>
                    <li><strong>II.</strong> La expresión del lugar y del día, mes y año en que se suscribe.</li>
                    <li><strong>III.</strong> La orden incondicional al girado de pagar una suma determinada de dinero.</li>
                    <li><strong>IV.</strong> El nombre del girado.</li>
                    <li><strong>V.</strong> El lugar y la época del pago.</li>
                    <li><strong>VI.</strong> El nombre de la persona a quien ha de hacerse el pago.</li>
                    <li><strong>VII.</strong> La firma del girador o de la persona que suscriba a su ruego o en su nombre.</li>
                </ul>

                <h3>Pagaré</h3>
                <h3>Artículo 170.-El pagaré debe contener:</h3>
                <ul class="variable-list">
                    <li><strong>I.</strong> La mención de ser pagaré, inserta en el texto del documento.</li>
                    <li><strong>II.</strong> La promesa incondicional de pagar una suma determinada de dinero.</li>
                    <li><strong>III.</strong> El nombre de la persona a quien ha de hacerse el pago.</li>
                    <li><strong>IV.</strong> La época y el lugar del pago.</li>
                    <li><strong>V.</strong> La fecha y el lugar en que se subscriba el documento.</li>
                    <li><strong>VI.</strong> La firma del suscriptor o de la persona que firme a su ruego o en su nombre.</li>
                </ul>

                <p style="margin-top: 2rem;">
                    Por lo anterior, al negociar el documento (pagaré o letra de cambio) con la institución o persona que lo adquiera, la tasa de interés previamente convenida se aplicará sobre la cantidad que aparece en el texto, siendo ésta el monto Final a pagar en una fecha futura.
                </p>
                <p style="margin-top: 2rem;">
                    Ambos títulos se generan para garantizar el pago de una cantidad en tiempo futuro, y se negocian para producir <strong>liquidez</strong>, es decir, disposición inmediata del dinero sin esperar a que transcurra el tiempo para su vencimiento.
                </p>

                <div class="definition-block">
                    <h3>Definición de Descuento bancario $D_b$</h3>
                    <p>
                        Es aquel interés que se obtiene de aplicar una tasa al monto <strong>Final</strong>, de una manera proporcional al tiempo; se le conoce también como el interés cobrado por anticipado.
                    </p>
                </div>

                <div class="definition-block">
                    <h3>Tasas equivalentes en $D_b$</h3>
                    <p>
                        Son aquellas que producen el mismo interés en el mismo plazo. Al igual que en $I_s$, las tasas de $D_b$ son independientes al valor <strong>Futuro</strong> o monto <strong>Final</strong>.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <div class="row">
                    <div class="col-md-12">
                        <h3>Variables $D_b$</h3>
                        <ul class="variable-list">
                            <li><strong>$D =$ Descuento:</strong> Cantidad de dinero generado en toda la operación financiera, respecto de una tasa y plazo dados. Se calcula proporcional e invariablemente sobre $F$.</li>
                            <li><strong>$P =$ Valor Presente:</strong> Es la cantidad neta o líquida recibida en fecha actual (descontada).</li>
                            <li><strong>$d =$ Tasa de descuento:</strong> Porcentaje aplicado sobre $F$ estipulado en el título de crédito.</li>
                            <li><strong>$n =$ Plazo:</strong> Plazo que dura una operación financiera, expresado en periodos correspondientes a la tasa de descuento.</li>
                            <li><strong>$F =$ Valor Futuro:</strong> Es el valor por descontar o valor del documento.</li>
                        </ul>
                    </div>
            </div>

            <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Fórmulas $D_b$</h3>
                        <div style="text-align: center; font-style: normal;">
                            <p>$$D = F \cdot n \cdot d \quad \dots (D1)$$</p>
                            <p>$$D = F - P \quad \dots (D2)$$</p>
                            <p>$$P = F(1 - n \cdot d) \quad \dots (D3)$$</p>
                        </div>
                    </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12">
                    <h3>Fórmulas despejadas de $D3$</h3>
                    <div style="text-align: center; font-style: normal;">
                        <p>$$F = \frac{P}{1 - n \cdot d} \quad \dots (D4)$$</p>
                        <p>$$n = \frac{1 - \frac{P}{F}}{d} \quad \dots (D5)$$</p>
                        <p>$$d = \frac{1 - \frac{P}{F}}{n} \quad \dots (D6)$$</p>
                        <p>$$i_s = \frac{d}{1 - n \cdot d} \quad \dots (D7)$$</p>
                        <p>$$d = \frac{i_s}{1 + n \cdot i_s} \quad \dots (D8)$$</p>
                    </div>
                </div>
            </div>

            <div class="section-divider"></div>

            <section>
                <h2>Descuento en cadena o en serie</h2>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Generalidades Descuento en cadena o en serie</h3>
                    
                    <h3>Definición descuento en cadena</h3>
                    <p>
                        El descuento en cadena o serie es aquel que se aplica sobre una cantidad ya descontada. Se ofrecen para promover las ventas, pero el mecanismo que emplea resulta ser una mera apariencia respecto de la tasa de descuento realmente aplicada. 
                    </p>
                    <p>
                        Como los descuentos otorgados son al momento, el tiempo no influye en el cálculo, ya que se opta o no por aceptar las promociones.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Variable adicional descuento en cadena</h3>
                        <ul class="variable-list">
                            <li><strong>$d_q =$ Tasa de descuento real o equivalente:</strong> Porcentaje determinado mediante la razón de $D$ y $P$.</li>
                        </ul>
                    </div>
            </div>

            <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Fórmulas descuento en cadena</h3>
                        <div style="text-align: center; font-style: normal;">
                            <p>$$P = F (1 - d) \quad \dots (D9)$$</p>
                            <p>$$P = F (1 - d_1) (1 - d_2) \dots (1 - d_n) \quad \dots (D10)$$</p>
                            <p>$$F = \frac{P}{(1 - d_1) (1 - d_2) \dots (1 - d_n)} \quad \dots (D11)$$</p>
                            <p>$$d_q = \frac{D}{F} \quad \dots (D12)$$</p>
                            <p>$$d_q = 1 - (1 - d_1) (1 - d_2) \dots (1 - d_n) \quad \dots (D13)$$</p>
                        </div>
                    </div>
            </div>

            <div class=section-divider></div>

            <section>
                <h2>Descuento por pronto pago</h2>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Definición descuento por pronto pago</h3>
                    <p>
                        El descuento por pronto pago es una operación financiera que consiste en ofrecer alternativas de pago que el vendedor ofrece a cada comprador, dependiendo de su historial crediticio para anticipar el pago de su venta. Las opciones de pago pueden variar mucho dependiendo del cliente.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Notación descuento por pronto pago</h3>
                    
                    <p style="text-align: center; font-size: 1.3em; margin: 1.5rem 0;">
                        $\text{Porcentaje de descuento} / \text{No. de días de crédito}$
                    </p>

                    <p>
                        Esta expresión es solo una forma de denotar el crédito otorgado, más no así representa una división.
                    </p>

                    <p>
                        Para hacer atractivo un pago de contado otorgando un 20% de contado, se representa como $20/0$. Lo cual se interpreta como 20% de descuento si transcurren 0 días después de la compra.
                    </p>

                    <p>
                        Otro ejemplo sería: $0/60$, lo cual indica que si se paga hasta los 60 días ya no habrá ningún descuento, y seguramente después de esa fecha se generarán intereses moratorios.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Comisión</h2>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Definición comisión</h3>
                    <p>
                        La comisión es una forma muy generalizada de retribuir el pago de un servicio, principalmente de venta, la cual es muy sencilla de calcular, puesto que se realiza mediante el empleo de un porcentaje. Lo que aquí es de resaltar es la base o cifra sobre la cual deberá calcularse dicho porcentaje.
                    </p>
                </div>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Base de cálculo de la comisión</h3>
                    <p>
                        En general la comisión se estipula sobre la <em>venta total facturada</em>. Puede también estipularse sobre las <em>ventas netas</em>, es decir, las ventas generadas en el periodo menos las devoluciones que se realicen de dicho periodo o de anteriores.
                    </p>
                    <p>
                        Una forma más segura de recuperar lo vendido, es comprometer a los vendedores, quienes son los que mejor conocen al cliente, a realizar el cobro de las facturas, por lo que la base se establece sobre la <em>venta neta cobrada</em>.
                    </p>
                    <p>
                        En todos los casos habrá que considerar que las ventas siempre serán antes del IVA (Impuesto al Valor Agregado), por ser un dinero que no es ingreso para la empresa.
                    </p>
                </div>

                <div class="definition-block">
                    <h3 style="border-bottom: none; color: var(--unam-azul); font-weight: 600;">Porcentaje de la comisión</h3>
                    <p>
                        Este estudio no es exhaustivo, dado que los porcentajes estipulados dependen mucho de giro de la empresa (ramo computacional, automotriz, inmobiliario, etcétera), posición y antigüedad de la empresa en el mercado, estrategia de ventas y mercadeo, entre muchos otros.
                    </p>
                </div>

                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Variables comisión</h3>
                        <ul class="variable-list">
                            <li><strong>$Com =$</strong> Comisión en dinero.</li>
                            <li><strong>$V =$</strong> Venta (total facturada, neta o cobrada).</li>
                            <li><strong>$c =$</strong> Porcentaje de comisión estipulado.</li>
                        </ul>
                    </div>
                </div>


                <div class="row mt-4">
                    <div class="col-md-12">
                        <h3>Fórmula comisión</h3>
                        <div style="text-align: center; font-style: normal;">
                            <p>$$Com = V * c \quad \dots (D14)$$</p>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <aside class="toc-sidebar">
                <div class="toc-title"><i class="fas fa-list"></i> Índice Descuentos</div>
                <nav class="toc-nav"><ul id="toc-list"></ul></nav>
            </aside>
    </div>
</div>

<a href="../Menus/descuento_bancario.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
