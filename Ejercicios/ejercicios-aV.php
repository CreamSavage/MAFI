<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Anualidad Vencida y Amortización', [
    'mathjax' => false,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejercicios Propuestos de Anualidad Vencida</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Ejercicios Propuestos: Anualidad Vencida</h2>

                <div class="definition-block">
                    <h3>Ejercicio 1</h3>
                    <p>Obtenga el valor futuro de las siguientes series vencidas:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>40 ahorros mensuales de $15,940 c/u, a una tasa del 4% mensual.</li>
                        <li>29 depósitos bimestrales de $5,500 c/u, a una tasa del 4.5% bimestral.</li>
                        <li>6 rentas semestrales de $1,850 c/u, a una tasa del 6.15% trimestral.</li>
                        <li>52 rentas semanales de $421 c/u, a una tasa del 10% anual.</li>
                        <li>22 pagos trimestrales de $40,000 c/u, a una tasa anual proporcional trimestral de 20.3%.</li>
                        <li>30 abonos diarios de $200 c/u, a una tasa anual proporcional diaria del 17.45%.</li>
                    </ul>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 2</h3>
                    <p>Obtenga el valor presente de las siguientes series vencidas:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>15 pagos mensuales de $3,330 c/u, a una tasa del 3.54% mensual.</li>
                        <li>37 depósitos bimestrales de $13,250 c/u, a una tasa del 6.75% bimestral.</li>
                        <li>16 rentas semestrales de $31,580 c/u, a una tasa del 7.72% trimestral.</li>
                        <li>156 rentas semanales de $58 c/u, a una tasa del 21.40% anual.</li>
                        <li>34 ahorros trimestrales de $6,975 c/u, a una tasa anual proporcional trimestral del 32.03%.</li>
                        <li>72 abonos quincenales de $12,320 c/u, a una tasa anual proporcional diaria del 27.45%.</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3</h3>
                    <p>Obtenga el valor presente y futuro de una serie de 22 rentas bimestrales de $43,000 c/u, a una tasa del 14.25% semestral.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4</h3>
                    <p>Un fotógrafo profesional quiere conocer cuánto logrará reunir en tres años y ocho meses, si decide depositar $8,300 quincenales de sus ingresos, por los cuales le ofrecen pagar una tasa del 14.17% cuatrimestral. Determine el total que reunirá si no existen cambios en la tasa pagada.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5</h3>
                    <p>Una gasera planea invertir $300,900 trimestrales de sus ganancias, con la finalidad de reemplazar sus equipos de calibración. Si ahorra durante 2 años a una tasa anual proporcional bimestral del 24.34%, determine cuánto tendrá al término.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 6</h3>
                    <p>El dueño de un salón de eventos sociales requiere $700,000 para efecto de remodelar sus instalaciones, lo cual estima que será dentro de un año y medio. Si el banco le paga el 1.75% quincenal, determine cuánto necesita depositar cada quincena.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7</h3>
                    <p>Un productor de cerveza artesanal desea abrir una sucursal foránea, para lo cual proyecta requerir $1,500,000 dentro de dos años y medio. Si invierte su dinero a una tasa diaria del 0.13%, determine cuánto deberá invertir quincenalmente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8</h3>
                    <p>La encargada de un gimnasio planea modernizar sus aparatos y equipo valuado en $480,000, estimando que para cuando lo pueda ahorrar, requerirá adicionalmente $70,000 por el efecto de la inflación. Por lo anterior cotizó equipos varios valuados en $550,000. Si puede ahorrar $85,750 mensuales, y le pagarán una tasa del 6.75% quincenal, determine en cuánto tiempo logrará su objetivo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9</h3>
                    <p>Un consorcio papelero requiere reunir $650,000 con el fin de poder abrir una nueva sucursal. Si destina $50,000 mensuales de sus ganancias y las invierte en un instrumento que le paga el 0.35% semanal de interés, determine cuánto tiempo necesitará para lograr su objetivo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10</h3>
                    <p>Un instructor de artes marciales desea independizarse y abrir un nuevo centro de enseñanza, lo cual estima que sea cuando logre reunir $200,000. Si puede ahorrar $45,000 trimestrales, y estima que le pagarán una tasa del 5.3% trimestral, determine el tiempo y el valor del depósito que cumpla su objetivo en el periodo entero y un periodo después.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 11</h3>
                    <p>El dueño de una escuela primaria particular prevé el pago del impuesto predial y de agua de su negocio, el cual estima que para el próximo año será de $150,000. Si se propone invertir $2,500 semanales, y el banco le paga un interés del 12% anual proporcional semestral, ¿en cuánto tiempo logrará su objetivo? ¿cuál será el importe de la última inversión en el periodo entero? Determine también cuánto logrará reunir al cabo de un año.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12</h3>
                    <p>Para promover el ahorro entre sus empleados, un microempresario los incentiva a ahorrar mediante el descuento de nómina de $1,000 quincenales, a cambio de recibir $30,000 a final del año. Determine la tasa que paga el empresario, así como la tasa anual equivalente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 13</h3>
                    <p>Para comprar el regalo de cumpleaños 50 de su esposo, una secretaria bilingüe estima gastar $20,000 dentro de año y medio. Si puede ahorrar $3,000 trimestrales, ¿qué tasa de interés trimestral requiere que le paguen? Determine su equivalente anual.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 14</h3>
                    <p>Una impresora 3D de resina se ofrece a pagar con cinco pagos mensuales de $3,500. Si el vendedor cobra un interés del 35% anual, determine su precio de contado.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 15</h3>
                    <p>Determine cuánto debe aportar cada miembro de una familia de 6 integrantes el día de hoy, para abrir una cuenta bancaria que paga un interés del 8% bimestral, y así apoyar a un sobrino sobresaliente en el deporte, con un regalo de cumpleaños consistente en un viaje de preparación en el interior de la República, que implicará retiros de $15,000 mensuales durante seis meses.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 16</h3>
                    <p>El usuario número un millón de una línea comercial recibe como premio $200,000 el día de hoy. Con ello desea cursar un diplomado con duración de año y medio. Si invierte su dinero en una cuenta que le paga el 15.40% trimestral, determine el valor de los retiros mensuales de que puede disponer para dicho fin.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 17</h3>
                    <p>El precio de contado de un montacargas usado de 3.5 toneladas es de $397,000. Se ofrece a crédito con 26 pagos semanales iguales. Si se establece una tasa de interés del 31.44% anual, ¿qué cantidad de dinero se debe pagar semanalmente para liquidarlo?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 18</h3>
                    <p>¿Con cuántos pagos quincenales iguales de $3,489.70 se puede pagar un set de colchón con base eléctrica cuyo precio de contado es de $22,999, si la tienda lo ofrece en un plan a crédito a una tasa de interés del 1.53% quincenal?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 19</h3>
                    <p>Un padrino le hace un generoso obsequio de regalo a su ahijada de 18 años, depositándole $100,000 en una cuenta que paga un interés del 42% anual proporcional mensual. Si se retiran $3,500 mensuales, determine durante cuánto tiempo podrá realizar dichos retiros.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 20</h3>
                    <p>El gobierno de la CDMX inauguró una planta recicladora de basura, con capacidad de procesamiento de 1,000 tonelada de residuos sólidos al día. El costo de la planta ascendió a $388,000,000, y permitirá generar ahorros a la ciudad hasta por $88,976,000 anualmente. Si se sabe que la tasa de interés por préstamos es del 20% anual, ¿En cuánto tiempo logrará recuperar la inversión? Determine cuánto dinero adicional ahorrará en el periodo posterior al último entero.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 21</h3>
                    <p>La auditoría fiscal a una televisora arrojó omisiones por falta de pago de impuestos por $700,000,000; para cancelarlos establece un convenio con el estado acordando pagar $24,450,000 mensuales. Si le cobran una tasa de interés moratorio del 1.03% mensual, determine en cuánto tiempo debe pagar, así como el importe del pago final en el periodo entero.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 22</h3>
                    <p>Un consorcio de ventas en línea ofrece un proyector de cine en casa en 3D, con un precio de contado de $113,090; Si lo prefiere, lo puede pagar a crédito, con 12 pagos mensuales de $13,926.30 cada uno. Determine la tasa mensual y su equivalente anual que cobra el consorcio.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 23</h3>
                    <p>El gobierno de cierto estado realiza la expropiación de su casa y terreno a un ejidatario por motivos de utilidad pública. Por esta causa le depositan el día de hoy la cantidad de $2,350,000 netos (después de impuestos), en una cuenta a su nombre. Nadie lo asesora y realiza retiros quincenales de $40,000 durante 6 años hasta que se termina el dinero. Determine la tasa de interés quincenal y su equivalente anual que le pagó el banco.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 24</h3>
                    <p>Un perito valuador recibe el pago por un servicio prestado hace tiempo, y decide invertir el día de hoy $100,000 en una cuenta que le paga el 32.3% anual, durante 4 años. Determine de cuánto podrá disponer semestralmente. Obtenga también cuánto podría retirar anualmente y establezca si ambos retiros son proporcionales entre sí.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 25</h3>
                    <p>Sustituya una serie de pagos mensuales vencidos de $11,999, por pagos trimestrales vencidos, considerando una tasa de interés del 7% mensual. Compruebe a valor futuro en un trimestre.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 26</h3>
                    <p>Determine la renta vencida quincenal equivalente a una renta vencida cuatrimestral de $24,468, considerado una tasa del 21% cuatrimestral. Compruebe a valor futuro en un año.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 27</h3>
                    <p>Sustituya una serie de pagos semanales vencidos de $370.25, por pagos bimestrales vencidos en un plazo de 3 años, si la tasa de interés es del 39.45% semestral. Compruebe a valor futuro en un semestre.</p>
                </div>

            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
