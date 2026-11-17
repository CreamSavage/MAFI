<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Interés Simple', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejercicios Propuestos de Interés Simple</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Ejercicios Propuestos de Interés Simple</h2>

                <div class="definition-block">
                    <h3>Ejercicio 1. Monto Final e Interés generado</h3>
                    <p>Una niñera de medio tiempo invierte \$23,000 durante 6 meses, a una tasa de $I_s$ del 17.5% trimestral. a) ¿Cuánto tendrá al término? b) ¿Cuánto interés habrá ganado? </p>
                    </div>

                <div class="definition-block">
                    <h3>Ejercicio 2. Monto Final</h3>
                    <p>Un oficial de seguridad privada abre una cuenta de inversión por \$75,000; si invierte durante 240 días, a una tasa de $I_s$ del 32.23% cuatrimestral, ¿cuánto podrá retirar al término?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3. Principal</h3>
                    <p>Para acceder a la opción de home office, un analista de pricing requiere renovar su laptop, y estima que el precio del equipo dentro de tres meses será de \$13,990. ¿Cuánto debe depositar el día de hoy, en un banco que le paga el 24.75% de $I_s$, para que obtenga el dinero suficiente para lograr su propósito?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4. Principal</h3>
                    <p>Aprovechando un mes de mucho trabajo y horas extras, un ayudante de carpintería prevé ahorrar para cubrir el pago de la renta mensual del próximo mes, la cual asciende a \$4,500. ¿Cuánto debe depositar el día de hoy, en una institución que le paga el 13.76% de $I_s$ cuatrimestral, para lograr su objetivo?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5. Plazo</h3>
                    <p>Un chofer de carga necesita saber cuánto tiempo deberá mantener una inversión de \$60,000 efectuada el día de hoy, para poder retirar \$65,000; considere que el banco le paga una tasa de $I_s$, del 0.11% diaria. Ofrezca una solución al problema.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6. Plazo</h3>
                    <p>¿Cuánto tiempo deberá transcurrir para que el Principal se triplique, si se sabe que la tasa de $I_s$ que se acuerda es del 18.46% semestral? </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7. Tasa</h3>
                    <p>El precio de contado de un smartwatch con GPS integrado es de \$5,500; a crédito se ofrece con un pago único a 6 meses por \$6,198.50. Determine la tasa anual de $I_s$ que se aplica en esta operación. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8. Tasa</h3>
                    <p>Un psicólogo recién titulado tiene un saldo en una cuenta del banco local por \$152,750. Si durante 30 días lo mantiene invertido, y al término del plazo el saldo asciende a \$158,676.70, determine la tasa de $I_s$ mensual que le pagó el banco. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9. Tasas equivalentes</h3>
                    <p>Demuestre que en el $I_s$, una tasa del 5% quincenal produce el mismo rendimiento que una del 60% semestral durante un año. Obtenga el valor Final a partir de un Principal de \$844. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10. Tasas equivalentes</h3>
                    <p>Compruebe que en $I_s$, una tasa anual del 35.4%, equivale al 5.9% bimestral. Obtenga el valor Final considerando un Principal de \$6,600 a un plazo de año y medio.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 11. Tiempo exacto y comercial</h3>
                    <p>Un repartidor de volantes abrió una cuenta bancaria con \$3,500 el 10 de enero de un año bisiesto. Si para el 13 de diciembre ya contaba con \$3,754.40, determine la tasa anual de $I_s$ que le pagaron. Realice el cálculo en tiempo exacto y comercial.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12. Tiempo exacto y comercial</h3>
                    <p>Un maestro albañil sufre un accidente el día 15 de noviembre y requiere de un préstamo por $15,000 para gastos médicos. Si acuerda pagar una tasa de $I_s$ del 4.9% mensual, determine cuánto deberá liquidar el 15 de agosto del siguiente año. Realice los cálculos en tiempo exacto y comercial. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 13. Tiempo de inversión</h3>
                <p>Determine cuánto tiempo duró un préstamo prendario por \$7,250, si el 21 de junio se tuvo que pagar \$8,726, y la tasa de $I_s$ pagada fue del 0.25% semanal.  </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 14. Opción de compra o inversión</h3>
                    <p>El dueño de una librería sabe que si invierte su dinero en el banco le pagan un 22.3% de $I_s$. Por otro lado, tiene la inquietud de comprar una cámara de seguridad exterior cuyo precio de contado es de \$3,990, y se ofrece a crédito a pagar \$4,600 dentro de 6 meses. Determine cuál es la mejor opción para comprar el artículo deseado. Justifique su respuesta.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 15. Opción de compra o inversión</h3>
                    <p>Un aprendiz de sastre necesita comprar una máquina de coser para independizarse. Después comparar precios, obtiene las siguientes opciones: Tienda 1: Pagar de contado \$5,150; Tienda 2: Un pago el día de hoy por \$2,750 y otro pago igual a 3 meses. Ninguna tienda le proporcionó la tasa de interés aplicable, pero sabe que, si invierte su dinero en el banco, le pagarán el 1.8% de $I_s$ quincenal.  Determine cuál es la mejor opción de compra. Justifique su respuesta.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 16. Aplicación en tarjetas</h3>
                    <p>El siguiente es un extracto de un estado de cuenta de una tarjeta de crédito, con la información esencial para el cálculo de los intereses del mes respectivo. Realice el cálculo de los intereses que le cargarán el mes siguiente, si se sabe que la tasa de Is que le cobran es del 4.34% mensual. </p>
                    <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.85em;"><thead><tr><th>Fecha</th><th>Concepto</th><th>Cargo</th><th>Abono</th><th>Saldo Final</th></tr></thead><tbody><tr><td>1-07</td><td>Saldo anterior</td><td></td><td></td><td>13,250</td></tr><tr><td>8-07</td><td>Retiro cajero</td><td>5,000</td><td></td><td>8,250</td></tr><tr><td>15-07</td><td>Depósito efectivo</td><td></td><td>7,550</td><td>15,800</td></tr><tr><td>18-07</td><td>Compra a crédito</td><td>1,500</td><td></td><td>14,300</td></tr><tr><td>25-07</td><td>Retiro cajero</td><td>5,000</td><td></td><td>9,300</td></tr><tr><td>31-07</td><td>Depósito efectivo</td><td></td><td>7,550</td><td>16,850</td></tr></tbody></table></div>
</div>
            </section>

            <section id="respuestas">
                <h2>Respuestas de Interés Simple</h2>
                <div class="definition-block">
                    <h3>Respuestas</h3>
                    <ol>
                        <li>$F = \$31,050$ ; $I = \$8,050$</li>
                        <li>$F = \$123,345$</li>
                        <li>$P = \$13,174.81$</li>
                        <li>$P = \$4,350.35$</li>
                        <li>$n = 2$ meses, $16$ días</li>
                        <li>$n = 5$ años, $5$ meses</li>
                        <li>$i_s = 2.12% $ mensual o bien $ i_s = 25.40% $ anual</li>
                        <li>$i = 3.88% mensual$</li>
                        <li>$F = \$1,856.80$</li>
                        <li>$F = \$10,104.60$</li>
                        <li>$i_s = 7.86%$ anual en Tiempo Comercial;$ i = 7.87%$ anual en Tiempo Exacto</li>
                        <li>$M = \$21,615$ en Tiempo Comercial; $F = \$21,596.88$ en Tiempo Exacto</li>
                        <li>$n = 1$ año, $6$ meses, $24$ días</li>
                        <li>Si invierte tendrá $F = \$4,434.89 $, no le alcanza para pagar $\$4,600$; le conviene al contado; o bien: Tasa que le pagan 22.3% anual es menor de la que le cobran 30.58% anual</li>
                        <li>Oferta 1: $P = \$5,150$; Oferta 2: $P = \$5,231.95$; Para comprar conviene más la oferta 2</li>
                        <li>Saldo promedio del mes $\$11,956.45$; $I = \$518.91$</li>
                    </ol>
                </div>
            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/interes_simple.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
