<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Descuento Bancario', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejercicios Propuestos de Descuento Bancario</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Ejercicios Propuestos de Descuento Bancario</h2>

                <div class="definition-block">
                    <h3>Ejercicio 1. Principal y tasa de descuento racional</h3>
                    <p>¿A cuánto asciende el importe de un préstamo otorgado hace 120 días por el cual deberán pagarse \$64,200, si se sabe que la tasa de interés acordada es del 5.25% trimestral (descuento racional o matemático)?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 2. Valor Presente y Descuento en Db</h3>
                    <p>Una farmacia de genéricos desea saber cuánto dinero le entregará el banco el día de hoy, si descuenta un documento a su favor por \$34,520 que vence dentro de 26 semanas; la tasa de descuento acordada es del 23.4% semestral. Determine también el interés descontado.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3. Valor Presente y Descuento en Db</h3>
                    <p>Para pagar una deuda añeja, el dueño de una tortillería descuenta el día de hoy una letra de cambio por \$72,360, la cual vence dentro de tres meses y medio; la tasa de descuento acordada es del 13.65% trimestral. Determine la cantidad que recibió y el interés descontado.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4. Valor futuro en Db</h3>
                    <p>Determine por qué cantidad se deberá firmar un pagaré, si se necesitan \$150,000 el día de hoy, y para ello, se acude a una institución financiera que cobra una tasa de descuento del 18.6% anual. El plazo del documento se establece en 7 meses.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5. Valor futuro y Descuento en Db</h3>
                    <p>Para sanear sus finanzas personales, una estudiante de trabajo social pide un préstamo bancario por \$18,000, a pagar en un año. Si le cobran una tasa de descuento del 15.65% semestral, determine la cantidad por la que deberá firmar un pagaré, así como el interés descontado.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6. Plazo en Db</h3>
                    <p>¿En cuánto tiempo se vence un documento cuyo valor nominal es de \$77,500, y se negocia en una institución que aplica una tasa de descuento del 21.8%, y se reciben \$71,320 el día de hoy?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7. Plazo en Db</h3>
                    <p>Una letra de cambio con valor nominal de \$33,000 fue comprada por un comerciante a una tasa de descuento del 8.35% cuatrimestral por la cual pagó \$30,933.38. Determine cuánto tiempo faltaba para su vencimiento.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8. Tasa en Db</h3>
                    <p>Determine la tasa de descuento que aplicó una Institución financiera, por un documento con valor nominal de \$110,000 por el cual se recibieron \$97,540.36, 270 días antes de su vencimiento.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9. Tasa en Db</h3>
                    <p>¿Qué tasa de descuento mensual se aplicó el 15 de marzo a un pagaré con valor nominal de \$52,000 y vencimiento al 15 de octubre si se recibieron \$45,266 por él?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10. Tasas equivalentes en Db</h3>
                    <p>Obtenga la tasa de descuento semanal equivalente a otra del 23.13% cuatrimestral. Compruebe obteniendo P o D a partir de F = \$7,800 en un plazo de un año.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 11. Tasa de Is equivalente a una de Db</h3>
                    <p>Obtenga la tasa de Is anual equivalente a la de descuento de 23.13% cuatrimestral del problema anterior, en un año. Compruebe obteniendo P, D o I, a partir de F = \$7,800. Compare la respuesta con la del problema anterior.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12. Tasa de Is equivalente a una de Db</h3>
                    <p>¿Qué tasa de interés simple equivale a una de descuento del 13% semestral, en dos años? Compruebe obteniendo el valor final a partir de un Principal de \$30,000.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 13. Tasa de Db equivalente a una de Is</h3>
                    <p>¿Qué tasa de descuento cuatrimestral equivale a una de interés simple del 35.15% anual, en 8 meses? Compruebe obteniendo el valor final a partir de un Principal de \$18,700.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 14. Valor futuro en Db</h3>
                    <p>Una peletería descontó en el banco un pagaré 3 meses y medio antes de su vencimiento. Si le aplicaron una tasa de descuento del 1.75% quincenal, y recibió \$13,162.50, ¿Cuál es el valor del pagaré?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 15. Plazo en Db</h3>
                    <p>El subgerente de una tienda de autoservicio recibió el día de hoy \$43,170.86, por el descuento de una letra de cambio con valor nominal de \$56,900. Si le aplicaron una tasa de descuento del 28.32%, determine el tiempo que faltaba para el vencimiento del documento.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 16. Valor Presente y tasa</h3>
                    <p>Un musicalizador acepta como pago por la venta de su equipo de sonido usado valuado en \$143,700, un documento por \$150,000 con vencimiento a 2 meses. Ese mismo día acude a una institución financiera a descontarlo, y le aplican una tasa del 22.5%. Determine: a) La cantidad que recibió el día de hoy por el descuento del documento; b) la utilidad o pérdida que obtuvo por la venta de su equipo; c) la tasa del Is anual que aplicó el musicalizador al comprador del equipo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 17. Descuento en cadena a valor presente y tasa equivalente</h3>
                    <p>Una fábrica de chocolates ofrece los siguientes descuentos: 20% por inauguración, 13% por lanzamiento de una nueva presentación y 5% por cliente asiduo. Para un cliente que puede acceder a todos los descuentos, determine a) cuánto se deberá pagar por una compra total de \$11,900, b) el descuento total y c) la tasa de descuento real o equivalente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 18. Tasa de descuento en cadena equivalente</h3>
                    <p>Dos compañías de ventas de calzado por catálogo ofrecen los siguientes descuentos por conceptos varios: la 1ª ofrece el 15%, 10% y 5%, mientras que la 2ª ofrece el 13%, 10% y 7%. Determine cuál ofrece la mejor tasa de descuento real o equivalente. Compruebe con una compra de \$50,000.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 19. Descuento en cadena a valor futuro y tasa equivalente</h3>
                    <p>En el día de apertura de una sucursal de una cadena de artículos de moda se ofrecieron los siguientes descuentos: 15% por inauguración, 8% por volumen de compra y 5% por pago con tarjeta de crédito. Dos clientas compraron 20 prendas de vestir; la 1ª clienta pagó en efectivo, y la 2ª con tarjeta, pero ambas terminaron pagando \$8,759.53. Determine el importe de las compras antes del descuento y la tasa de descuento real o equivalente en ambos casos.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 20. Descuento en cadena y margen de utilidad</h3>
                    <p>Si las clientas del ejemplo anterior desean vender los 20 artículos de su compra y obtener un margen de utilidad del 20% sobre la misma, determine el precio de venta por artículo en cada caso.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 21. Descuento por pronto pago</h3>
                    <p>Calcule los importes a pagar de acuerdo con las siguientes opciones que tiene un cliente para liquidar una compra de \$49,500: 30⁄0  ,25⁄15,20⁄30,15⁄45  ,0⁄60  .</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 22. Comisiones</h3>
                    <p>Obtenga las comisiones que generaría el vendedor del ejemplo anterior, si sus comisiones se establecen al 7.5%: a) sobre la venta total facturada; b) sobre la venta cobrada.</p>
                </div>
            </section>

            <div class="section-divider"></div>

            <section id="respuestas-seccion">
                <h2 id="respuestas-bancario-titulo">Respuestas: Descuento Bancario</h2>
                
                <div style="background-color: #f8f9fa; border: 1px solid #d1d9e4; border-radius: 12px; padding: 2rem; margin-top: 1rem; font-family: 'Courier New', Courier, monospace;">
                    <p style="color: #555; margin-bottom: 1.5rem; font-weight: bold; border-bottom: 1px solid #ddd; padding-bottom: 8px;">
                        DESCUENTO BANCARIO - HOJA DE RESULTADOS
                    </p>
                    
                    <table style="width: 100%; border-collapse: collapse; font-size: 0.95em; line-height: 1.8;">
                        <tr><td style="width: 40px; vertical-align: top;"><strong>1.</strong></td><td>$P = \$60,000$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>2.</strong></td><td>$P = \$26,442.32; \quad D = \$8,077.68$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>3.</strong></td><td>$P = \$60,836.67; \quad D = \$11,523.33$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>4.</strong></td><td>$F = \$168,255.75$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>5.</strong></td><td>$F = \$26,200.87; \quad D = \$8,200.87$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>6.</strong></td><td>$n = 4 \text{ meses, } 12 \text{ días}$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>7.</strong></td><td>$n = 3 \text{ meses}$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>8.</strong></td><td>$d = 15.10\% \text{ anual}$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>9.</strong></td><td>$d = 1.85\% \text{ mensual}$</td></tr>

                        <tr>
                            <td style="vertical-align: top;"><strong>10.</strong></td>
                            <td style="padding-bottom: 10px;">
                                • <strong>Forma anual:</strong> $d = 1.33\% \text{ semanal}; \quad P = \$2,387.58; \quad D = \$5,412.42$<br>
                                • <strong>Forma diaria:</strong> $d = 1.35\% \text{ semanal}; \quad P = \$2,327.44; \quad D = \$5,472.56$
                            </td>
                        </tr>

                        <tr><td style="vertical-align: top;"><strong>11.</strong></td><td>$i_s = 226.69\% \text{ anual}; \quad P = \$2,387.58; \quad I = \$5,412.42; \quad D = \$5,412.42$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>12.</strong></td><td>$i_s = 27.08\% \text{ semestral}; \quad F = \$62,500$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>13.</strong></td><td>$d = 9.49\% \text{ cuatrimestral}; \quad F = \$23,082.03$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>14.</strong></td><td>$F = \$15,000$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>15.</strong></td><td>$n = 10 \text{ meses, } 7 \text{ días}$</td></tr>
                        
                        <tr><td style="vertical-align: top;"><strong>16.</strong></td><td>a) $P = \$144,375; \quad$ b) Utilidad: $\$675; \quad$ c) $i_s = 26.30\% \text{ anual}$</td></tr>
                        <tr><td style="vertical-align: top;"><strong>17.</strong></td><td>a) $P = \$7,868.28; \quad$ b) $D = \$4,031.72; \quad$ c) $d_q = 33.88\% \text{ anual}$</td></tr>

                        <tr>
                            <td style="vertical-align: top;"><strong>18.</strong></td>
                            <td style="padding-bottom: 10px;">
                                1) $d_q = 27.33\%; \quad P = \$36,337.50$<br>
                                2) $d_q = 27.18\%; \quad P = \$36,409.50$<br>
                                <span style="color: var(--unam-azul); font-weight: bold;">➔ La opción 1 es mejor</span>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top;"><strong>19.</strong></td>
                            <td style="padding-bottom: 10px;">
                                • <strong>1ª clienta:</strong> $F = \$11,201.45; \quad d_q = 21.80\%$<br>
                                • <strong>2ª clienta:</strong> $F = \$11,791.00; \quad d_q = 25.71\%$
                            </td>
                        </tr>

                        <tr><td style="vertical-align: top;"><strong>20.</strong></td><td>Precio de venta (1ª y 2ª clienta): $\$525.56$</td></tr>

                        <tr>
                            <td style="vertical-align: top;"><strong>21.</strong></td>
                            <td style="padding-bottom: 10px;">
                                <strong>Opciones de Pronto Pago:</strong><br>
                                • <strong>30/0:</strong> $P = \$34,650 \quad$ • <strong>25/15:</strong> $P = \$37,125$<br>
                                • <strong>20/30:</strong> $P = \$39,600 \quad$ • <strong>15/45:</strong> $P = \$42,075$<br>
                                • <strong>0/60:</strong> $P = \$49,500$
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align: top; border-top: 1px dashed #ccc; padding-top: 10px;"><strong>22.</strong></td>
                            <td style="border-top: 1px dashed #ccc; padding-top: 10px;">
                                <strong>Comisiones:</strong><br>
                                • <strong>Venta facturada:</strong> $\$3,712.50$<br>
                                • <strong>Venta al contado:</strong> $\$2,598.80$<br>
                                • <strong>A 25 días:</strong> $\$2,784.40 \quad$ • <strong>A 20 días:</strong> $\$2,970.00$<br>
                                • <strong>A 45 días:</strong> $\$3,155.60 \quad$ • <strong>A 60 días:</strong> $\$3,712.50$
                            </td>
                        </tr>
                    </table>
                </div>
            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
    </aside>
    </div>
</div>

<a href="../Menus/descuento_bancario.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
