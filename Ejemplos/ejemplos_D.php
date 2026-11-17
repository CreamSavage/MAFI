<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Descuento Bancario', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejemplos Explicados: Descuento</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            <section>
                <h2>Ejemplo 1. Principal y tasa de descuento racional</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Un comerciante desea saber cuánto dinero le entregarán el día de hoy, por concepto de un préstamo por el cual deberá pagar \$9,720 dentro de ocho meses; la tasa de $i_s$ acordada es del 3% trimestral. Determine el interés descontado y la cantidad recibida (descontada).
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> ¿?</span>
                        <span><strong>$i_s =$</strong> 3% trimestral = 1% mensual</span>
                        <span><strong>$I =$</strong> ¿?</span>
                        <span><strong>$n =$</strong> 8 meses</span>
                        <span><strong>$F =$</strong> 9,720</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$P = \frac{F}{1 + n * i_s} = \frac{9,720}{1 + 8 * 0.01} = \frac{9,720}{1.08} = 9,000$$
                    </div>
                    <div class="formula-display">
                        $$I = F - P = 9,720 - 9,000 = 720$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$I = P * n * i_s = 9,000 * 0.01 * 8 = 720$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        La cantidad de intereses cobrados fue de \$720 y la cantidad descontada de \$9,000
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 2. Valor Presente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Un distribuidor de calzado desea saber cuánto dinero le entregará el día de hoy una institución financiera, si descuenta un documento a su favor por \$9,720 que vence dentro de ocho meses; la tasa de descuento acordada es del 1% mensual. Determine también el interés descontado.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> ¿?</span>
                        <span><strong>$D =$</strong> ¿?</span>
                        <span><strong>$d =$</strong> 1% mensual</span>
                        <span><strong>$n =$</strong> 8 meses</span>
                        <span><strong>$F =$</strong> 9,720</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$P = F (1 - n * d) = 9,720 (1 - 8 * 0.01) = 8,942.40$$
                    </div>
                    <div class="formula-display">
                        $$D = F - P = 9,720 - 8,942.40 = 777.60$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$D = F * n * d = 9,720 * 8 * 0.01 = 777.60$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Análisis Comparativo</h3>
                    <p>Determinando la diferencia entre el Descuento racional y el Bancario de los ejemplos 1 y 2, considerando que en ambos ejemplos $F = 9,720$, tenemos que:</p>
                    <div class="formula-display">$$D - I = 777.60 - 720 = 57.60$$</div>
                    <p>Esta diferencia se interpreta como el interés del $i_s$ descontado:</p>
                    <div class="formula-display">$$I = P * n * i_s = 720 * 8 * 0.01 = 57.60$$</div>
                </div>
                <div class="example-block">
                    <h3>Conclusión</h3>
                    <div class="didactic-note" style="font-style: italic; font-size: 1em; color: #555;"">
                        Se concluye que el $D_b$ es un interés cobrado por anticipado, y será siempre mayor al $i_s$ por aplicarse la tasa a una cantidad mayor ($F > P$).
                    </div>
                </div>
            </section>
                <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 3. Valor Presente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Para liquidar un adeudo urgente, el dueño de una tienda de vestidos para ocasión descuenta una letra de cambio por \$35,500 que vence dentro de cinco meses; la tasa de descuento acordada es del 3.8% bimestral. Determine la cantidad y el interés descontados.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> ¿?</span>
                        <span><strong>$d =$</strong> 3.8% bimestral</span>
                        <span><strong>$n =$</strong> 5 meses = 2.5 bimestres</span>
                        <span><strong>$F =$</strong> 35,500</span>
                        <span><strong>$D =$</strong> ¿?</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$P = F ( 1 - n * d ) = 35,500 ( 1 - 2.5 * 0.038 ) = 32,127.50$$
                    </div>
                    <div class="formula-display">
                        $$D = F - P = 35,500 - 32,127.50 = 3,372.50$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$D = F * n * d = 35,500 * 2.5 * 0.038 = 3,372.50$$
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 4. Valor futuro</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        El dueño de un negocio de comida rápida necesita el día de hoy \$18,000, y para ello, acude a una institución financiera que le cobra una tasa de descuento del 9% anual. Si estima que podrá pagarlo dentro de 4 meses, determine por qué cantidad deberá firmar un pagaré.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 18,000</span>
                        <span><strong>$d =$</strong> 9% anual = 0.75% mensual</span>
                        <span><strong>$n =$</strong> 4 meses</span>
                        <span><strong>$F =$</strong> ¿?</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$F = \frac{P}{1 - n * d} = \frac{18,000}{1 - 4 * .0075} = \frac{18,000}{1 - 0.03} = \frac{18,000}{0.97} = 18,556.70$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$D = F - P = 18,556.70 - 18,000 = 556.70$$
                    </div>
                    <div class="formula-display">
                        $$D = F * n * d = 18,556.70 * 4 * 0.0075 = 556.70$$
                    </div>
                </div>
            </section>

             <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 5. Valor futuro y descuento</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Para sanear sus finanzas, un escritor solicita un préstamo bancario por \$45,000, el cual se compromete a pagar en un año; la tasa de descuento que le cobran es del 7% semestral. Determine el valor del pagaré y el interés descontado.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 45,000</span>
                        <span><strong>$d =$</strong> 7% semestral = 14% anual</span>
                        <span><strong>$n =$</strong> 1 año</span>
                        <span><strong>$F =$</strong> ¿?</span>
                        <span><strong>$D =$</strong> ¿?</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$F = \frac{P}{1 - n * d} = \frac{45,000}{1 - 1 * 0.14} = \frac{45,000}{0.86} = 52,325.58$$
                    </div>
                    <div class="formula-display">
                        $$D = F - P = 52,325.58 - 45,000 = 7,325.58$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$D = F * n * d = 52,325.58 * 1 * 0.14 = 7,325.58$$
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 6. Cálculo del plazo (n)</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        ¿En qué tiempo se vence un documento cuyo valor nominal es de \$250,000, si se negocia en \$238,750 en una institución que aplica una tasa de descuento del 18% anual?
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 238,750</span>
                        <span><strong>$d =$</strong> 18% anual</span>
                        <span><strong>$F =$</strong> 250,000</span>
                        <span><strong>$n =$</strong> ¿?</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$n = \frac{1 - \frac{P}{F}}{d} = \frac{1 - \frac{238,750}{250,000}}{0.18} = \frac{1 - 0.955}{0.18} = \frac{0.045}{0.18} = 0.25 \text{ años}$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación</h3>
                    <div class="formula-display">
                        $$D = F - P = 250,000 - 238,750 = 11,250$$
                    </div>
                    <div class="formula-display">
                        $$D = F * n * d = 250,000 * 0.25 * 0.18 = 11,250$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        $n =$ 0.25 años (ó 3 meses)
                    </div>
                </div>
            </section>

             <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 7. Plazo</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Un pagaré con valor nominal de \$80,000 fue comprado por un comerciante a una tasa de descuento del 3.3% trimestral pagando \$70,760. Ese mismo día lo negoció en un banco que cobra una tasa de descuento del 10.5%, y recibió \$72,650. Determine cuánto tiempo faltaba para su vencimiento.
                    </p>
                    <p>
                        Como se trata del mismo documento, se puede calcular el tiempo en cualquiera de las dos operaciones de compraventa:
                    </p>
                </div>

                <div class="example-block">
                    <h3>En la compra:</h3>
                    <h4>Datos:</h4>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 70,760</span>
                        <span><strong>$d =$</strong> 3.3% trimestral</span>
                        <span><strong>$n =$</strong> ¿? trimestres</span>
                        <span><strong>$F =$</strong> 80,000</span>
                    </div>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$n = \frac{1 - \frac{P}{F}}{d} = \frac{1 - \frac{70,760}{80,000}}{0.033} = \frac{0.1155}{0.033} = 3.5 \text{ trimestres} = 10 \text{ meses, 15 días}$$
                    </div>
                    <h4>Comprobación:</h4>
                    <div class="formula-display">
                        $$D = F - P = 80,000 - 70,760 = 9,240$$
                        $$D = F * d * n = 80,000 * 0.033 * 3.5 = 9,240$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>En la venta:</h3>
                    <h4>Datos:</h4>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 72,650</span>
                        <span><strong>$d =$</strong> 10.5% anual</span>
                        <span><strong>$n =$</strong> ¿? años</span>
                        <span><strong>$F =$</strong> 80,000</span>
                    </div>
                    <h4>Solución:</h4>
                    <div class="formula-display">
                        $$n = \frac{1 - \frac{P}{F}}{d} = \frac{1 - \frac{72,650}{80,000}}{0.105} = \frac{0.091875}{0.105} = 0.875 \text{ años} = 10 \text{ meses, 15 días}$$
                    </div>
                    <h4>Comprobación:</h4>
                    <div class="formula-display">
                        $$D = F - P = 80,000 - 72,650 = 7,350$$
                        $$D = F * d * n = 80,000 * 0.105 * 0.875 = 7,350$$
                    </div>
                </div>
            </section>
            
            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 8. Tasa</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Determine la tasa de descuento que aplicó una Institución Financiera, por un documento con valor nominal de \$44,520, por el cual se recibieron \$27,491.10, nueve meses antes de su vencimiento.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos:</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 27,491.10</span>
                        <span><strong>$i =$</strong> ¿? % mensual</span>
                        <span><strong>$n =$</strong> 9 meses</span>
                        <span><strong>$F =$</strong> 44,520</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución:</h3>
                    <div class="formula-display">
                        $$d = \frac{1 - \frac{P}{F}}{n} = \frac{1 - \frac{27,491.10}{44,520}}{9} = \frac{0.3825}{9} = 0.0425 \text{ o } 4.25\% \text{ mensual}$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación:</h3>
                    <div class="formula-display">
                        $$D = F - P = 44,520 - 27,491.10 = 17,028.90$$
                        $$D = F * n * d = 44,520 * 9 * 0.0425 = 17,028.90$$
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 9. Tasa</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        ¿Qué tasa de descuento anual se aplicó el 15 de agosto a un documento con valor nominal de \$116,000 y vencimiento al 15 de diciembre si se recibieron \$107,880 por él?
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos:</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 107,880</span>
                        <span><strong>$i =$</strong> ¿? % anual</span>
                        <span><strong>$n =$</strong> 4 meses = 0.33... años</span>
                        <span><strong>$F =$</strong> 116,000</span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solución:</h3>
                    <div class="formula-display">
                        $$d = \frac{1 - \frac{P}{F}}{n} = \frac{1 - \frac{107,880}{116,000}}{0.033 \dots} = \frac{0.07}{0.033 \dots} = 0.21 \text{ o } 21\% \text{ anual}$$
                    </div>
                </div>
                <div class="example-block">
                    <h3>Comprobación:</h3>
                    <div class="formula-display">
                        $$D = F - P = 116,000 - 107,880 = 8,120$$
                        $$D = F * n * d = 116,000 * 0.333 \dots * 0.21 = 8,120$$
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 10. Tasas equivalentes</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Obtenga la tasa semanal de $D_b$ equivalente a una del 1.8% quincenal. Compruebe con un $F = 17,200$ y en un plazo de 1 trimestre.
                    </p>
                    <p style="font-style: italic;">Al ser las tasas de $D_b$ proporcionales al tiempo se pueden convertir como en $I_s$.</p>
                </div>

                <div class="example-block">
                    <h3>1ª. Opción: Forma anualizada:</h3>
                    <p>Tasa anual: 1.8% quincenal por 24 quincenas al año = 43.20% anual.</p>
                    <p>Tasa semanal: 43.20% anual entre 52 semanas al año = 0.83% semanal.</p>
                    
                    <h4>Comprobación con datos quincenales:</h4>
                    <div class="variable-grid">
                        <span><strong>$F =$</strong> 17,200</span>
                        <span><strong>$d =$</strong> 1.8% quincenal</span>
                        <span><strong>$D =$</strong> ¿?</span>
                        <span><strong>$n =$</strong> 1 trimestre = 6 quincenas</span>
                    </div>
                    <div class="formula-display">
                        $$D = F * n * d = 17,200 * 6 * 0.018 = 1,857.6$$
                    </div>

                    <h4>Comprobación con datos semanales:</h4>
                    <div class="variable-grid">
                        <span><strong>$F =$</strong> 17,200</span>
                        <span><strong>$d =$</strong> 0.0083 ... semanal</span>
                        <span><strong>$D =$</strong> ¿?</span>
                        <span><strong>$n =$</strong> 1 trimestre = 13 semanas</span>
                    </div>
                    <div class="formula-display">
                        $$D = F * n * d = 17,200 * 13 * 0.0083 \dots = 1,857.6$$
                    </div>
                </div>

                <div class="section-divider"></div>

                <div class="example-block">
                    <h3>2ª. Opción: Forma diaria:</h3>
                    <p>Tasa diaria: 1.8% quincenal entre 15 días a la semana = 0.12% diaria.</p>
                    <p>Tasa semanal: 0.12% diaria por 7 días a la semana = 0.84% semanal.</p>

                    <h4>Comprobación con datos semanales:</h4>
                    <div class="variable-grid">
                        <span><strong>$F =$</strong> 17,200</span>
                        <span><strong>$d =$</strong> 0.0084 semanal</span>
                        <span><strong>$D =$</strong> ¿?</span>
                        <span><strong>$n =$</strong> 1 trimestre = 13 semanas</span>
                    </div>
                    <div class="formula-display">
                        $$D = F * n * d = 17,200 * 13 * 0.0084 = 1,878.24$$
                    </div>
                </div>

                <div class="example-block">
                    <p style="font-style: italic; text-align: center; color: #555;">
                        Para interpretar la diferencia, remítase al fundamento conversión de tiempo.
                    </p>
                </div>
            </section>
            
            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 11. Tasa de $I_s$ equivalente a una de $D_b$ y viceversa</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Aplique la fórmula de $I_s$ a los datos del ejemplo 9 anterior: ¿Qué tasa de descuento anual se aplicó el 15 de agosto a un documento con valor nominal de \$116,000 y vencimiento al 15 de diciembre si se recibieron \$107,880 por él? Resuelva como en el ejemplo 9, y aplique también las fórmulas de equivalencia de $D_b$ a $I_s$, y viceversa.
                    </p>
                </div>

                <div class="example-block">
                    <h3>Datos:</h3>
                    <div class="variable-grid">
                        <span><strong>$P =$</strong> 107,880</span>
                        <span><strong>$i =$</strong> ¿? anual</span>
                        <span><strong>$n =$</strong> 4 meses = 0.333 ... años</span>
                        <span><strong>$F =$</strong> 116,000</span>
                    </div>
                </div>

                <div class="example-block">
                    <h3>Solución:</h3>
                    <div class="formula-display">
                        $$i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{116,000}{107,880} - 1}{0.333 \dots} = \frac{0.0752 \dots}{0.333 \dots} = 0.2258 \dots \text{ o } 22.58\% \text{ anual}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Comprobación:</h3>
                    <div class="formula-display">
                        $$I = P * n * i_s = 107,880 * 0.333 \dots * 0.2258 \dots = 8,120$$
                    </div>
                    <p style="text-align: center; margin-top: 1rem;">
                        El cual corresponde a la respuesta en dicho ejemplo. Por lo que se dice que la tasa del 21% de $D_b$ equivale al 22.58% de $I_s$.
                    </p>
                </div>

                <div class="example-block">
                    <ul>
                        <li>Directamente con las fórmulas de equivalencia:</li>
                    </ul>
                    <div class="formula-display">
                        $$i_s = \frac{d}{1 - n * d} = \frac{0.21}{1 - 0.333 \dots * 0.21} = \frac{0.21}{0.93} = 0.2258 \dots \text{ o } 22.58\% \text{ anual}$$
                    </div>
                    <div class="formula-display">
                        $$d = \frac{i_s}{1 + n * i_s} = \frac{0.2258 \dots}{1 + 0.333 \dots * 0.2258 \dots} = \frac{0.2258 \dots}{1.0752 \dots} = 0.21 \text{ o } 21\% \text{ anual}$$
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 12. Tasa de $i_s$ equivalente a tasa de $D_b$</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        ¿Qué tasa de $i_s$ equivale a una de descuento del 3% bimestral, en un bimestre. Compruebe con cualquier valor Presente.
                    </p>
                </div>

                <div class="example-block">
                    <h3>Datos:</h3>
                    <div class="variable-grid">
                        <span><strong>$i_s =$</strong> ¿? bimestral</span>
                        <span><strong>$d =$</strong> 3% bimestral</span>
                        <span><strong>$n =$</strong> 1 bimestre</span>
                    </div>
                </div>

                <div class="example-block">
                    <h3>Solución:</h3>
                    <div class="formula-display">
                        $$i_s = \frac{d}{1 - n * d} = \frac{0.03}{1 - 1 * 0.03} = \frac{0.03}{0.97} = 0.0309 \dots \text{ o } 3.09\% \text{ bimestral}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>a) Comprobación con interés simple:</h3>
                    <p><strong>Datos:</strong> $P =$ 25,380; $n =$ 1 bimestre; $i_s =$ 0.0309 ... bimestral; $F =$ ¿?</p>
                    <div class="formula-display">
                        $$F = P(1 + n * i_s) = 25,380(1 + 1 * 0.0309 \dots) = 26,164.95$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) Comprobación con descuento bancario:</h3>
                    <p><strong>Datos:</strong> $P =$ 25,380; $n =$ 1 bimestre; $d =$ 3% bimestral; $F =$ ¿?</p>
                    <div class="formula-display">
                        $$F = \frac{P}{1 - n * d} = F = \frac{25,380}{1 - 1 * 0.03} = \frac{25,380}{1 - 0.03} = \frac{25,380}{0.97} = 26,164.95$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>c) Comprobación con interés simple en un año:</h3>
                    <p><strong>Datos:</strong> $P =$ 25,380; $n =$ 1 año; $i_s = 0.0309 \dots * 6 = 0.1855 \dots$ anual; $F =$ ¿?</p>
                    <div class="formula-display">
                        $$F = P(1 + n * i_s) = 25,380(1 + 1 * 0.1855 \dots) = 30,089.69$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>d) Comprobación con descuento bancario en un año:</h3>
                    <p><strong>Datos:</strong> $P =$ 25,380; $n =$ 1 año; $d = 3\% * 6 = 18\%$ anual; $F =$ ¿?</p>
                    <div class="formula-display">
                        $$F = \frac{P}{1 - n * d} = F = \frac{25,380}{1 - 1 * 0.18} = \frac{25,380}{1 - 0.18} = \frac{25,380}{0.82} = 30,951.22$$
                    </div>
                </div>

                <div class="example-block">
                    <div class="didactic-note"  style="font-style: italic; font-size: 1em; color: #555;">
                        La equivalencia entre las tasas de interés simple y de descuento bancario, sólo se da en el mismo plazo. En el ejemplo, la tasa de descuento bancario del 3% bimestral, sólo equivale a una de interés simple del 3.09% bimestral, en un bimestre, el cual fue el plazo inicial sobre la que fue calculada.
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 13. Tasas equivalentes con periodicidad distinta</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        ¿Qué tasa de $I_s$ anual equivale a una de descuento del 3% bimestral, en un año? Compruebe con cualquier valor Presente, por ejemplo \$430.
                    </p>
                    <p>Conversión de la tasa de descuento bimestral a anual: $3\% * 6 = 18\%$ anual</p>
                </div>

                <div class="example-block">
                    <h3>Aplicación de la fórmula de equivalencia, en el plazo dado:</h3>
                    <p><strong>Datos:</strong> $i_s =$ ¿? anual; $d =$ 18% anual; $n =$ 1 año</p>
                    <div class="formula-display">
                        $$i_s = \frac{d}{1 - n * d} = \frac{0.18}{1 - 1 * 0.18} = \frac{0.18}{0.82} = 0.2195 \dots \text{ o } 21.95\% \text{ anual}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>a) Comprobación con $I_s$:</h3>
                    <p><strong>Datos:</strong> $P =$ 430; $n =$ 1 año; $i_s = 0.2195 \dots$ anual; $F =$ ¿? </p>
                    <div class="formula-display">
                        $$F = P (1 + n * i_s) = 430 (1 + 1 * 0.2195 \dots) = 524.39$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) Comprobación con $D_b$:</h3>
                    <p><strong>Datos:</strong> $P =$ 430; $n =$ 1 año; $d = 3\% * 6 = 18\%$ anual; $F =$ ¿? </p>
                    <div class="formula-display">
                        $$F = \frac{P}{1 - n * d} = F = \frac{430}{1 - 1 * 0.18} = \frac{430}{1 - 0.18} = \frac{430}{0.82} = 524.39$$
                    </div>
                </div>
            </section>

            <div class ="section-divider"></div>
            
            <section>
                <h2>Ejemplo 14. Descuento en cadena a P y tasa equivalente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Una fábrica de juguetes ofrece los siguientes descuentos: 15% por inauguración, 10% por compra de mercancía fuera de temporada y 5% por pago en efectivo. Determine a) cuánto se pagará por una compra total de \$5,000, b) el Descuento total y c) la tasa de descuento real o equivalente.
                    </p>
                    <p style="font-style: italic;">De acuerdo con la definición tenemos que:</p>
                </div>

                <div class="example-block">
                    <h3>a) Cuánto se pagará por la compra:</h3>
                    <div class="formula-display">
                        $$P_1 = 5,000 * 15\% = 750; \quad P = F - D = 5,000 - 750 = 4,250$$
                    </div>
                    
                    <p style="margin-top: 1.5rem; font-weight: bold;">Otra forma de obtenerlo es:</p>
                    <div class="formula-display">
                        $$P = F (1 - d) = 5,000 (1 - 0.15) = 4,250$$
                        $$P_2 = 4,250 * 10\% = 425; \quad P = F - D = 4,250 - 425 = 3,825$$
                        $$P_3 = 3,825 * 5\% = 191.25; \quad P = F - D = 3,825 - 191.25 = 3,633.75$$
                    </div>
                    <p style="font-style: italic; text-align: center;">Lo cual representa la cantidad neta o líquida a pagar.</p>
                </div>

                <div class="example-block">
                    <h3>También se puede obtener como sigue:</h3>
                    <div class="formula-display">
                        $$P = F(1 - d_1)(1 - d_2) \dots (1 - d_n) = 5,000 (1 - 0.15)(1 - 0.1)(1 - 0.05) = 3,633.75$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) El descuento total queda en:</h3>
                    <div class="formula-display">
                        $$D = F - P = 5,000 - 3,633.75 = 1,366.25$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>c) La tasa equivalente de descuento se realiza con una razón:</h3>
                    <div class="formula-display">
                        $$d_q = \frac{D}{F} = \frac{1,366.25}{5,000} = 0.27325 \text{ o } 27.33\%$$
                    </div>
                    
                    <p style="margin-top: 1.5rem; font-weight: bold;">O ya bien:</p>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.15)(1 - 0.10)(1 - 0.05)$$
                        $$d_q = 1 - (0.85)(0.90)(0.95) = 0.27325 \text{ o } 27.33\%$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Nota</h3>
                    <p style="font-style: italic; font-size: 1em; color: #555;">
                        La tasa de descuento equivalente siempre será menor a la suma de las tasas de descuentos, en este caso del 15% + 10% + 5% = 30%, ya que se realiza sobre una cantidad ya descontada.
                    </p>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        Cantidad a pagar ($P$) = \$3,633.75 <br>
                        Descuento total ($D$) = \$1,366.25 <br>
                        Tasa equivalente ($d_q$) = 27.33%
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 15. Tasa de descuento en cadena equivalente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Dos compañías de ventas por catálogo ofrecen los siguientes descuentos por conceptos varios: la 1ª ofrece el 10%, 10% y 15%, mientras que la 2ª ofrece el 13%, 12% y 10%. Determine cuál ofrece la mejor tasa de descuento real o equivalente.
                    </p>
                    <p style="font-style: italic; font-size: 1em; color: #555;">
                        Aunque la suma de la cadena de porcentajes de cada compañía es del 35%, el resultado no será igual.
                    </p>
                </div>

                <div class="example-block">
                    <h3>Compañía 1</h3>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.10)(1 - 0.10)(1 - 0.15)$$
                        $$d_q = 1 - (0.90)(0.90)(0.85) = 0.3115 \text{ o } 31.15\%$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Compañía 2</h3>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.13)(1 - 0.12)(1 - 0.10)$$
                        $$d_q = 1 - (0.87)(0.88)(0.90) = 0.31096 \text{ o } 31.10\%$$
                    </div>
                </div>

                <div class="example-block">
                    <p style="font-style: italic; font-size: 1em; color: #555;">
                        El orden en el que se apliquen los descuentos de la cadena no influye en el resultado (el orden de los factores no altera el producto).
                    </p>
                    <p style="margin-top: 1rem; font-weight: bold;">Veámoslo con la compañía 1, situando el descuento del 15% en primera instancia.</p>
                    
                    <h3 style="margin-top: 1.5rem;">Compañía 1 (Orden distinto)</h3>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.15)(1 - 0.10)(1 - 0.10)$$
                        $$d_q = 1 - (0.85)(0.90)(0.90) = 0.3115 \text{ o } 31.15\%$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        La mejor tasa de descuento real es la de la <strong>Compañía 1</strong> con un 31.15%.
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 16. Descuento en cadena a valor futuro y tasa equivalente</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        En una preventa navideña se ofrecieron los siguientes descuentos: 18% por pretemporada, 9% por volumen de compra y 6% por pago en efectivo. Dos clientes compraron 10 artículos iguales, pero sólo el primero pagó en efectivo. Si el primer cliente pagó en efectivo \$1,964, determine a) Cuál fue el importe de la compra antes del descuento. b) Cuánto terminó pagando el 2do. cliente. c) La tasa de descuento real o equivalente en ambos casos.
                    </p>
                </div>

                <div class="example-block">
                    <h3>a) Importe de la compra antes de descuento del primer cliente.</h3>
                    <p><strong>Datos:</strong> $P = 1,964; \quad d_1 = 18\%; \quad d_2 = 9\%; \quad d_3 = 6\%; \quad F = \text{¿?}$</p>
                    <div class="formula-display">
                        $$F = \frac{P}{(1 - d_1)(1 - d_2) \dots (1 - d_n)} = \frac{1,964}{(1 - 0.18)(1 - 0.09)(1 - 0.06)}$$
                        $$F = \frac{1,964}{(0.82)(0.91)(0.94)} = 2,800 \text{ valor de la mercancía o precio de lista}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) El pago realizado por el segundo cliente.</h3>
                    <p><strong>Datos:</strong> $P = \text{¿?}; \quad d_1 = 18\%; \quad d_2 = 9\%; \quad F = 2,800$</p>
                    <div class="formula-display">
                        $$P = F(1 - d_1)(1 - d_2) \dots (1 - d_n) = 2,800 (1 - 0.18)(1 - 0.09)$$
                        $$P = 2,800 (0.82)(0.91) = 2,089.36 \text{ lo que realmente pagó}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>c) Las tasas de descuento equivalente de ambos clientes.</h3>
                    
                    <h3 style="margin-top: 1.5rem;">Tasa equivalente cliente 1.</h3>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.18)(1 - 0.09)(1 - 0.06)$$
                        $$d_q = 1 - (0.82)(0.91)(0.94) = 0.2985 \dots \text{ o } 29.86\% \text{ de descuento equivalente}$$
                    </div>

                    <h3 style="margin-top: 1.5rem;">Tasa equivalente cliente 2.</h3>
                    <div class="formula-display">
                        $$d_q = 1 - (1 - d_1)(1 - d_2) \dots (1 - d_n) = 1 - (1 - 0.18)(1 - 0.09)$$
                        $$d_q = 1 - (0.82)(0.91) = 0.2538 \text{ o } 25.38\% \text{ de descuento equivalente}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        Importe antes del descuento ($F$) = \$2,800 <br>
                        Pago cliente 2 ($P$) = \$2,089.36 <br>
                        Tasa equivalente C1 ($d_q$) = 29.86% <br>
                        Tasa equivalente C2 ($d_q$) = 25.38%
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 17. Descuento en cadena y margen de utilidad</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Si los clientes del ejemplo anterior desean vender los 10 artículos de su compra y obtener un margen de utilidad del 20% sobre la misma, determine el precio de venta por artículo en cada caso.
                    </p>
                    <p style="font-style: italic; margin-top: 1rem;">
                        Partiendo de la relación: Venta – Costo de Venta = Utilidad, tenemos por despeje:
                    </p>
                    <p style="text-align: center; font-weight: bold;">Venta = Utilidad + Costo de Venta</p>
                </div>

                <div class="example-block">
                    <h3>a) Para el cliente 1 tenemos:</h3>
                    <div class="formula-display">
                        $$\text{Venta} = \text{Costo total} + 20\% \text{ del costo total} = \text{Costo total} (1 + 20\%) = \text{Costo} (1.20)$$
                    </div>
                    
                    <p style="margin-top: 1.5rem; font-weight: bold;">Sustituyendo:</p>
                    <div class="formula-display">
                        $$\text{Venta} = 1,964 (1.20) = 2,356.80$$
                        $$\text{Precio de venta unitario} = \text{Venta} / \text{No. Artículos} = 2,356.80 / 10 = 235.68$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) Para el cliente 2 tenemos:</h3>
                    <div class="formula-display">
                        $$\text{Venta} = 2,089.36 (1.20) = 2,507.23$$
                        $$\text{Precio de venta unitario} = \text{Venta} / \text{No. Artículos} = 2,507.23 / 10 = 250.72$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        Precio de venta unitario C1 = \$235.68 <br>
                        Precio de venta unitario C2 = \$250.72
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 18. Descuento por pronto pago</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Calcule los importes a pagar de acuerdo con las siguientes opciones que tiene un cliente para liquidar una compra de \$35,500: 
                        $25/0$, $20/15$, $15/30$, $10/45$, $0/60$.
                    </p>
                </div>

                <div class="example-block">
                    <h3>Solución</h3>
                    <div class="formula-display">
                        $$P = F (1 - d) = 35,500 (1 - 0.25) = 26,625 \text{ de contado}$$
                        $$P = F (1 - d) = 35,500 (1 - 0.20) = 28,400 \text{ a los 15 días}$$
                        $$P = F (1 - d) = 35,500 (1 - 0.15) = 30,175 \text{ a los 30 días}$$
                        $$P = F (1 - d) = 35,500 (1 - 0.10) = 31,950 \text{ a los 45 días}$$
                    </div>
                    <p style="text-align: center; font-weight: bold; margin-top: 1.5rem;">
                        A los 60 días deberá liquidar el total de la venta: \$35,500
                    </p>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        Pago de contado = \$26,625 <br>
                        Pago 15 días = \$28,400 <br>
                        Pago 30 días = \$30,175 <br>
                        Pago 45 días = \$31,950 <br>
                        Pago 60 días = \$35,500
                    </div>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 19. Comisiones</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>
                        Obtenga las comisiones que generaría el vendedor del ejemplo anterior, si sus comisiones se establecen al 5%: a) sobre la venta total facturada; b) sobre la venta cobrada.
                    </p>
                </div>

                <div class="example-block">
                    <h3>a) Sobre la venta total facturada:</h3>
                    <div class="formula-display">
                        $$Com = V * c = 35,500 * 0.05 = 1,775$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>b) Sobre la venta cobrada:</h3>
                    <div class="formula-display">
                        $$Com = V * c = 26,625 * 0.05 = 1,331.25 \text{ si el pago es de contado}$$
                        $$Com = V * c = 28,400 * 0.05 = 1,420 \text{ si el pago es a los 15 días}$$
                        $$Com = V * c = 30,175 * 0.05 = 1,508.75 \text{ si el pago es a los 30 días}$$
                        $$Com = V * c = 31,950 * 0.05 = 1,597.50 \text{ si el pago es a los 45 días}$$
                        $$Com = V * c = 35,500 * 0.05 = 1,775 \text{ si el pago es a los 60 días}$$
                    </div>
                </div>

                <div class="example-block">
                    <h3>Resultado</h3>
                    <div class="result-box">
                        Comisión venta facturada = \$1,775 <br>
                        Comisión mínima (contado) = \$1,331.25 <br>
                        Comisión máxima (60 días) = \$1,775
                    </div>
                </div>
            </section>

            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
                <nav class="toc-nav"><ul id="toc-list"></ul></nav>
            </aside>
    </div>
</div>

<a href="../Menus/descuento_bancario.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
