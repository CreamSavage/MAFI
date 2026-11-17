<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Interés Simple', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejemplos Explicados: Interés Simple</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            <section>
                 <h2>Ejemplo 1. Monto Final</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una persona invierte \$8,000 durante 3 meses, a una tasa de interés del 10% mensual. a) ¿Cuánto tendrá al término? b) ¿Cuánto interés habrá ganado? </p><p style="font-style: italic; font-size: 1em; color: #555;">Las fórmulas se pueden aplicar directamente, ya que las periodicidades de tiempo y tasa son coincidentes (mensuales).</p></div>
                 <div class="example-block"><h3>a) Determinación del Monto Final </h3><p><strong>Datos:</strong></p><div class="variable-grid"><span>$P = 8,000$</span><span>$i_s = 10\% \text{ mensual } (0.10)$</span><span>$n = 3 \text{ meses}$</span><span>$F = ?$</span><span>$I = ?$</span></div></div>
                 <div class="example-block"><h3>Solución</h3><div class="formula-display">$$F = P (1 + n * i_s)$$ $$F = 8,000 (1 + 3 * 0.10) = 8,000 (1.3) = 10,400$$</div><div class="result-box">Monto Final ($F$) = \$10,400.00</div><p style="font-style: italic; font-size: 1em; color: #555;">Observe que para obtener $F$ a partir de $P$, se multiplica por un factor mayor a uno.</p></div>
                 <div class="example-block"><h3>b) Determinación del Interés (I)</h3><p><strong>Datos:</strong></p><div class="variable-grid"><span>$P = 8,000  $</span><span>$i_s = 10\% \text{ mensual } (0.10)$</span><span>$n = 3 \text{ meses}$</span><span>$I = ?$</span></div></div><div class="example-block"><h3>Solución</h3><div class="formula-display"><p class="formula-display" style="font-size: 1.5rem;">$$\begin{aligned}I &= P * n * i_s \\I &= 8,000 * 3 * 0.10 = 2,400\end{aligned}$$</p></div></div>
                 <div class="example-block"><h3>Otra forma</h3><div class="formula-display">$$\begin{aligned}I &= F - P \\I &= 10,400 - 8,000 = 2,400\end{aligned}$$</div></div>
                 <div class="table-responsive mt-4"><p class="text-center italic"><em>Tasa $i = 10\%$ mensual, plazo en meses</em></p><table class="table table-bordered table-striped text-center align-middle"><thead class="table-light"><tr><th>Plazo $n$</th><th>Principal<br>$P$</th><th>Interés<br>$I = P * i_s$</th><th>Monto Final<br>$F = P + I$</th></tr></thead><tbody><tr><td>1</td><td>8,000</td><td>$8,000 * 0.10 = 800$</td><td>$8,000 + 800 = 8,800$</td></tr><tr><td>2</td><td>8,800</td><td>800</td><td>9,600</td></tr><tr><td>3</td><td>9,600</td><td>800</td><td>10,400</td></tr></tbody><tfoot class="table-secondary fw-bold"><tr><td>Totales</td><td>$P = 8,000$</td><td>$I = 2,400$</td><td>$F = 10,400$</td></tr></tfoot></table></div></section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 2. Monto Final</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Una agente de ventas invierte \$15,000 durante 6 bimestres, a una tasa de interés simple del 0.32% quincenal...</p><p style="font-style: italic; font-size: 1em; color: #555;">Al no coincidir las periodicidades, se deberá realizar una conversión.</p></div>
                <div class="example-block"><h3>Datos Iniciales</h3><div class="variable-grid"><span>$P = 15,000;$</span><span>$i_s = 0.32\% \text{ quincenal};$</span><span>$n = 6 \text{ bimestres};$</span><span>$F = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><h4>Conversión de tasa:</h4><div class="formula-display"><p>Datos:</p>$$\begin{aligned} P &= 15,000; \quad i_s = 0.32\% \text{ quincenal } * 4 = 1.28\% \text{ bimestral} \\ i_s &= 0.32\% \text{ quincenal } * 4 = 1.28\% \text{ bimestral} \end{aligned}$$<p>Solución:</p>$$\begin{aligned} F &= P ( 1 + n \text{ } i_s ) \\ F &= 15,000 ( 1 + 6 * 0.0128 ) = 15,000 (1.0768) = 16,152 \end{aligned}$$</div><h4 style="margin-top: 2rem;">Conversión de plazo:</h4><div class="formula-display"><p>Datos:</p>$$\begin{aligned} P &= 15,000; \quad i_s = 0.32\% \text{ quincenal}; \quad F = ? \\ n &= 6 \text{ bimestres}; \quad n = 6 * 4 = 24 \text{ quincenas} \end{aligned}$$<p>Solución:</p>$$\begin{aligned} F &= P ( 1 + n \text{ } i_s ) \\ F &= 15,000 ( 1 + 24 * 0.0032 ) = 15,000 (1.0768) = 16,152 \end{aligned}$$</div></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$\begin{aligned} I &= 15,000 * 0.0032 = 48 \text{ quincenales} \\ I &= 48 \text{ quincenal } * 24 \text{ quincenas} = 1,152 \text{ en 6 bimestres} \end{aligned}$$</div><p>Lo cual es congruente si consideramos que \( I = F - P = 16,152 - 15,000 = 1,152 \)</p></div>
             </section>
             <div class="section-divider"></div>

             <section>
                <h2>Ejemplo 3: Principal</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Como propósito de año nuevo estudiante quiere comprar una Tablet, y estima que el precio del equipo dentro de un año será de \$3,675. ¿Cuánto debe depositar el día de hoy, en un banco que le paga el 5% de $I_s$, para que obtenga el dinero suficiente para lograr su propósito?</p><p style="font-style: italic; font-size: 1em; color: #555;">Cuando no se indique periodicidad, la tasa de $I_s$ se deberá entender que es anual.</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = ?$</span><span>$i_s = 5\% \text{ anual } (0.05)$</span><span>$n = 1 \text{ año}$</span><span>$F = 3,675$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ \begin{aligned} P &= \frac{F}{1 + n \text{ } i_s} \\ \\ P &= \frac{3,675}{1 + 1 * 0.05} = \frac{3,675}{1.05} = 3,500 \end{aligned} $$</div></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I &= P \text{ } n \text{ } i_s = 3,500 * 1 * 0.05 = 175 \text{ en un año} \\ F &= P + I = 3,500 + 175 = 3,675 \end{aligned} $$</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 4: Principal</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un ama de casa sabe por experiencia que necesita reunir $3,000 para útiles y uniformes de sus hijos en el próximo ciclo escolar. Si el ciclo escolar inicia dentro de 3 meses ¿Cuánto debe depositar el día de hoy, en una institución que le paga el 3.44% de Is bimestral, para que obtenga el dinero suficiente y logre su propósito?</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = ?$</span><span>$i_s = 3.44\% \text{ bimestral } (0.0344)$</span><span>$n = 3 \text{ meses} = 1.5 \text{ bimestres}$</span><span>$F = 3,000$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ \begin{aligned} P &= \frac{F}{1 + n \text{ } i_s} \\ \\ P &= \frac{3,000}{1 + 1.5 * 0.0344} = \frac{3,000}{1.0516} = 2,852.94 \end{aligned} $$</div></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I &= P \text{ } n \text{ } i_s = 2,852.94 * 1.5 * 0.0344 = 147.06 \text{ en bimestre y medio}\\ F &= P + I = 2,852.94 + 147.06 = 3,000 \end{aligned} $$</div></div>
            </section>
            <div class="section-divider"></div>

             <section>
                <h2>Ejemplo 5: Plazo</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un estudiante necesita saber cuánto tiempo deberá mantener una inversión de \$17,500 efectuada el día de hoy, para poder retirar \$19,670; considere que el banco le paga una tasa de $I_s$, del 3.1% cuatrimestral. Ofrezca una solución al problema. </p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 17,500$</span><span>$F = 19,670$</span><span>$i_s = 3.1\% \text{ cuatrimestral } (0.031)$</span><span>$n = ? \text{ cuatrimestres}$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ \begin{aligned} n &= \frac{\frac{F}{P} - 1}{i_s} = \frac{\frac{19,670}{17,500} - 1}{0.031} = \frac{0.124}{0.031} = 4.29 \end{aligned} $$</div><p style="font-style: italic; font-size: 1em; color: #555;">Observe que la periodicidad de la tasa determina la del plazo, y viceversa.</p></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I = 17,500 * 4 * 0.031 = 2,170 \text{en 4 cuatrimestres} \\ F = 17,500 + 2,170 = 19,670 \end{aligned} $$</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 6: Plazo</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>¿Cuánto tiempo deberá transcurrir para que el Principal se duplique, si se sabe que la tasa de $I_s$ que le pagan es del 5.35% bimestral? </p></div>
                <p> En este problema podemos observar la independencia del Is respecto del Principal y del Monto Final. Para nuestro ejemplo tomaremos un valor de $P=4,850$ , siendo por consiguiente $F=9,700$ (el doble), pero el lector podrá emplear cualquier otro. </p>
                <div class="example-block"><h3>Datos </h3><div class="variable-grid"><span>$P = 4,850$</span><span>$i_s = 5.35\% \text{ bimestral } (0.0535)$</span><span>$n = ? \text{ bimestres}$</span><span>$F = 9,700$</span></div></div>
                <div class="example-block"><h3>Solución </h3><div class="formula-display">$$ \begin{aligned} n &= \frac{\frac{F}{P} - 1}{i_s} = \frac{\frac{9,700}{4,850} - 1}{0.0535} = \frac{1}{0.0535} = 18.69 \end{aligned} $$</div><p>Es decir, 3 años, 1 mes, 11 días. (refiérase al fundamento: conversión de tiempo).</p></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I &= 4,850 * 18.69 * 0.0535 = 4,850 \text{ en 18,691 bimestres..} \\ F &= P + I = 4,850 + 5,000 = 9,850 \end{aligned} $$</div></div>
            </section>
             <div class="section-divider"></div>

             <section>
                <h2>Ejemplo 7: Tasa </h2>
                <div class="example-block"><h3>Planteamiento</h3><p>El precio de contado de un celular es de \$1,500; a crédito se ofrece con un pago único a 3 meses por \$1,615.20. Determine la tasa de $I_s$ que se aplica en esta operación. </p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 1,500$</span><span>$i_s = ?$</span><span>$n = 3$ meses</span><span>$F = 1,615.20$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{1,615.20}{1,500} - 1}{3} = \frac{0.0768}{3} = 0.0256 \text{ o } 2.56\% \text{ mensual} $$</div><p style="font-style: italic; font-size: 1em; color: #555;">Reiterando: La periodicidad del plazo determina la de la tasa, y viceversa</p></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I &= 1,500 * 3 * 0.0256 = 115.20 \text{ en 3 meses} \\ F &= P + I = 1,500 + 115.20 = 1,615.20 \end{aligned} $$</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
                <h2>Ejemplo 8: Tasa </h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Una estudiante de intercambio, tiene un saldo en una cuenta del banco local por \$17,500. Si durante todo un semestre lo mantuvo sin movimiento, y al término del plazo el saldo asciende a \$18,750, determine la tasa de Is mensual que le pagó el banco. </p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 17,500$</span><span>$i_s = ? \text{ semestral}$</span><span>$n = 1$ semestre</span><span>$F = 18,750$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{18,750}{17,500} - 1}{1} = \frac{0.0714...}{1} = 0.0714... \text{ o } 7.14\% \text{ semestral} $$</div><p>Quedando una tasa mensual de </p><div class="formula-display">$$ \frac{7.14\%}{6} =  1.19\% \text{ mensual} $$</div></div>
                <div class="example-block"><h3>Comprobación</h3><div class="formula-display">$$ \begin{aligned} I &= 17,500 * 1 * 0.0714... = 1,250 \text{ en 1 semestre} \\ F &= P + I = 17,500 + 1,250 = 18,750 \end{aligned} $$</div></div>
                <p>Se puede obtener directamente la tasa mensual, si se convierte el tiempo a meses. </p>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 17,500$</span><span>$i_s = ? \text{ mensual}$</span><span>$n = 6$ meses</span><span>$F = 18,750$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{18,750}{17,500} - 1}{6} = \frac{0.0714...}{6} = 0.0119... \text{ o } 1.19\% \text{ mensual} $$</div></div>
            </section>

            <section>
                <h2>Ejemplo 9: Tasas equivalentes </h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Demuestre que el 10% mensual durante un año, produce el mismo rendimiento que el 30% trimestral en el mismo plazo. Consideremos un Principal o capital de $2,920.</p></div>
                <div class="example-block"><h3>Datos mensuales</h3><div class="variable-grid"><span>$P = 2,920$</span><span>$i_s = 10\% \text{ mensual } (0.10)$</span><span>$n = 1 \text{ año}= 12 \text{ meses}$</span><span>$I = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ I = P  n  i_s = 2,920 * 12 * 0.10 = 2,920 * 1.2 = 3,504 $$</div></div>
                <div class="example-block"><h3>Datos trimestrales</h3><div class="variable-grid"><span>$P = 2,920$</span><span>$i_s = 30\% \text{ trimestral } (0.30)$</span><span>$n = 1 \text{ año}= 4 \text{ trimestres}$</span><span>$F = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ I = P  n  i_s = 2,920 * 4 * 0.30 = 2,920 * 1.2 = 3,504 $$</div></div>
            </section>

            <section>
                <h2>Ejemplo 10: Tasas equivalentes </h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Compruebe que una tasa de $I_s$ anual del 26%, equivale al ( 26% )/52 = 0.5% semanal. Considere un Principal de \$475 y un plazo de 2 años y medio.</p></div>
                <div class="example-block"><h3>Datos anuales</h3><div class="variable-grid"><span>$P = 475$</span><span>$i_s = 26\% \text{ anual } (0.26)$</span><span>$n = 2.5 \text{ años}$</span><span>$I = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ I = P  n  i_s = 475 * 2.5 * 0.26 = 475 * 0.65 = 308.75 $$</div></div>
                <div class="example-block"><h3>Datos semanales</h3><div class="variable-grid"><span>$P = 475$</span><span>$i_s = 0.5\% \text{ semanal } (0.005)$</span><span>$n = 2.5 \text{ años} = 130 \text{ semanas}$</span><span>$I = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ I = P  n  i_s = 475 * 130 * 0.005 = 475 * 0.65 = 308.75 $$</div><p style="font-style: italic; font-size: 1em; color: #555;">Independientemente de si el plazo mayor, menor o igual a un año, los montos Finales son iguales, y por lo tanto las tasas son equivalentes</p></div>
            </section>

            <section>
                <h2>Ejemplo 11: Tiempo exacto y comercial</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un jardinero abrió una cuenta con \$35,000 el 10 de junio, en el Banco del trabajador. Si para el 29 de noviembre ya contaba con \$37,544, determine la tasa mensual de Is que le pagaron. Realice el cálculo en tiempo exacto y comercial.</p><p style="font-style: italic; font-size: 1em; color: #555;">En caso de duda, revise el fundamento conversión de tiempo, donde se explica el no considerar el día inicial de la inversión.</p></div>
                <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.85em;"><thead><tr><th colspan="3">Tiempo Exacto</th><th colspan="3">Tiempo Comercial</th></tr><tr><th>Fecha</th><th>Días Naturales</th><th>Días de Inversión</th><th>Fecha</th><th>Días Naturales</th><th>Días de Inversión</th></tr></thead><tbody><tr><td>10 al 30 de junio</td><td>21</td><td>20</td><td>10 al 30 de junio</td><td>21</td><td>20</td></tr><tr><td>julio</td><td>31</td><td>31</td><td>julio</td><td>30</td><td>30</td></tr><tr><td>agosto</td><td>31</td><td>31</td><td>agosto</td><td>30</td><td>30</td></tr><tr><td>septiembre</td><td>30</td><td>30</td><td>septiembre</td><td>30</td><td>30</td></tr><tr><td>octubre</td><td>31</td><td>31</td><td>octubre</td><td>30</td><td>30</td></tr>
                    <tr><td>1 a 29 de noviembre</td><td>29</td><td>29</td><td>1 a 29 de noviembre</td><td>29</td><td>29</td></tr><tr><td>Menos día inversión</td><td>-1</td><td></td><td>Menos día inversión</td><td>-1</td><td></td></tr><tr class="fw-bold"><td>Total de días</td><td>172</td><td>172</td><td>Total de días</td><td>169</td><td>169</td></tr><tr><td>Tiempo en años</td><td>172/365</td><td>172/365</td><td>Tiempo en años</td><td>169/360</td><td>169/360</td></tr></tbody></table></div>
                <div class="example-block"><h3>Tiempo Exacto</h3></div>
                <div class="example-block"><p>Datos: $P = 35,000; \quad i_s = ? \% \text{ anual} ; \quad n = 172/365 \text{ años}; \quad F = 37,544$</p></div>
                <div class="example-block"><h4>Solución:</h4></div>
                <div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{37,544}{35,000} - 1}{\frac{172}{365}} = \frac{0.0726...}{0.471...} = 0.1542... \text{ anual} $$</div>
                <div class="formula-display">$$ \text{Quedando la tasa requerida en } \frac{0.1542...}{12} = 1.29\% \text{ mensual} $$</div>
                <div class="example-block"><h3>Tiempo Comercial</h3></div>
                <div class="example-block"><p>Datos: $P = 35,000; \quad i_s = ? \% \text{ anual} ; \quad n = 169/360 \text{ años}; \quad F = 37,544$</p></div>
                <div class="example-block"><h4>Solución:</h4></div>
                <div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{37,544}{35,000} - 1}{\frac{169}{360}} = \frac{0.0726...}{0.469...} = 0.1547... \text{ anual} $$</div>
                <div class="formula-display">$$ \text{Quedando la tasa requerida en } \frac{0.1547...}{12} = 1.29\% \text{ mensual} $$</div>
            </section>

            <section>
                <h2>Ejemplo 12. Tiempo exacto y comercial</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un taxista sufre un percance el día 15 de mayo y requiere de un préstamo por \$5,000 para remediarlo. Si acuerda pagar una tasa de $I_s$ del 3% mensual, determine cuánto deberá liquidar el 18 de agosto del mismo año (año bisiesto). Realice los cálculos en tiempo exacto y comercial.</p></div>
                <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.85em;"><thead><tr><th colspan="2">Tiempo Exacto</th><th colspan="2">Tiempo Comercial</th></tr><tr><th>Fecha</th><th>Días de Inversión</th><th>Fecha</th><th>Días de Inversión</th></tr></thead><tbody><tr><td>15 al 31 de mayo</td><td>16</td><td>15 al 30 de mayo</td><td>15</td></tr><tr><td>junio</td><td>30</td><td>junio</td><td>30</td></tr><tr><td>julio</td><td>31</td><td>julio</td><td>30</td></tr><tr><td>1 a 18 de agosto</td><td>18</td><td>1 a 18 de agosto</td><td>18</td></tr><tr class="fw-bold"><td>Total de días</td><td>95</td><td>Total de días</td><td>93</td></tr><tr><td>Tiempo en años</td><td>95/366</td><td>Tiempo en años</td><td>93/360</td></tr></tbody></table></div>
                <div class="example-block"><h3>Tiempo Exacto</h3></div>
                <div class="example-block"><p>Datos: $P = 5,000; \quad i_s = 3\% \text{ mensual} = 36\% \text{ anual}; \quad n = \frac{95}{366} \text{ años}; \quad F = ?$</p></div>
                <div class="example-block"><h4>Solución:</h4></div>
                <div class="formula-display">$$ \begin{aligned} F &= P (1 + n \text{ } i_s) \\ F &= 5,000 \left( 1 + \frac{95}{366} * 0.36 \right) = 5,000 (1.093...) = 5,467.21 \end{aligned} $$</div>
                <div class="example-block"><h3>Tiempo Comercial</h3></div>
                <div class="example-block"><p>Datos: $P = 5,000; \quad i_s = 3\% \text{ mensual} = 36\% \text{ anual}; \quad n = \frac{93}{360} \text{ años}; \quad F = ?$</p></div>
                <div class="example-block"><h4>Solución:</h4></div>
                <div class="formula-display">$$ \begin{aligned} F &= P (1 + n \text{ } i_s) \\ F &= 5,000 \left( 1 + \frac{93}{360} * 0.36 \right) = 5,000 (1.093) = 5,465 \end{aligned} $$</div>
            </section>

            <section>
                <h2>Ejemplo 13. Tiempo exacto y comercial</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Determine en qué fecha se realizó una inversión de \$25,480, si el 10 de octubre se retiraron \$28,226, y la tasa de $I_s$ pagada fue del 0.3% semanal. Determínelo en tiempo exacto y comercial.</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 25,480$</span><span>$i_s = 0.3\% \text{ semanal}$</span><span>$n = ?$</span><span>$F = 28,226$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ n = \frac{\frac{F}{P} - 1}{i_s} = \frac{\frac{28,226}{25,480} - 1}{0.003} = \frac{0.107...}{0.003} = 35.923... \text{ semanas} = 249 \text{ o } 251 \text{ días} $$</div>
                <p>Recuerde que en cálculo de unidades en semanas, existirá una discrepancia acorde con la forma de conversión. En caso de duda, revise detenidamente los Fundamentos.</p>
                <p>Para determinar la fecha de la inversión, se realiza de la fecha actual hacia atrás, restando los valores. En este caso, el día de inversión se descuenta desde el inicio.</p>
                <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.8em;"><thead><tr><th colspan="4">Tiempo Exacto</th><th colspan="4">Tiempo Comercial</th></tr><tr><th>Fecha</th><th>Días de inversión</th><th>Días restantes Opción 1</th><th>Días Restantes Opción 2</th><th>Fecha</th><th>Días de inversión</th><th>Días restantes Opción 1</th><th>Días restantes Opción 2</th></tr></thead><tbody><tr><td></td><td></td><td>249</td><td>251</td><td></td><td></td><td>249</td><td>251</td></tr><tr><td>1 a 10 de octubre</td><td>10</td><td>239</td><td>241</td><td>1 a 10 de octubre</td><td>10</td><td>239</td><td>241</td></tr><tr><td>septiembre</td><td>30</td><td>209</td><td>211</td><td>septiembre</td><td>30</td><td>209</td><td>211</td></tr><tr><td>agosto</td><td>31</td><td>178</td><td>180</td><td>agosto</td><td>30</td><td>179</td><td>181</td></tr><tr><td>julio</td><td>31</td><td>147</td><td>149</td><td>julio</td><td>30</td><td>149</td><td>151</td></tr><tr><td>junio</td><td>30</td><td>117</td><td>119</td><td>junio</td><td>30</td><td>119</td><td>121</td></tr><tr><td>mayo</td><td>31</td><td>86</td><td>88</td><td>mayo</td><td>30</td><td>89</td><td>91</td></tr><tr><td>abril</td><td>30</td><td>56</td><td>58</td><td>abril</td><td>30</td><td>59</td><td>61</td></tr><tr><td>marzo</td><td>31</td><td>25</td><td>27</td><td>marzo</td><td>30</td><td>29</td><td>31</td></tr><tr><td>3 a 28 de febrero</td><td>25</td><td>0</td><td></td><td>1 a 30 de febrero</td><td>29</td><td>0</td><td>2</td></tr><tr><td>1 a 28 de febrero</td><td>27</td><td></td><td>0</td><td>29 a 31 de enero</td><td>2</td><td></td><td>0</td></tr><tr class="table-light"><td>Tiempo en años</td><td></td><td>249/365</td><td>251/365</td><td>Tiempo en años</td><td></td><td>249/360</td><td>251/360</td></tr></tbody></table></div></div>
                <div class="example-block"><p>Las fechas de inversión teóricas son: Tiempo exacto: opción 1, el 3 de febrero; opción 2, el 1° de febrero. Tiempo comercial opción 1, el 1° de febrero; opción 2, el 29 de enero. En caso de duda, pruebe a calcular el tiempo de atrás hacia adelante. El dominio de esta forma de calcular el tiempo, conlleva múltiples ejercicios de práctica.</p></div>
            </section>

            <section>
                <h2>Ejemplo 14. Opción de compra o inversión</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un estudiante de Contaduría sabe que si invierte el dinero en el banco le pagan un 16% de $I_s$. Por otro lado, tiene la inquietud de comprar un celular cuyo precio de contado es de \$5,700, y se ofrece a crédito a pagar \$6,100 dentro de 4 meses. Determine cuál es la mejor opción para comprar el artículo deseado.</p><p>Con datos de la tienda resulta un problema de determinación de la tasa:</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 5,700$</span><span>$i_s = ? \text{ anual}$</span><span>$n = 4 \text{ meses} = \frac{1}{3} \text{ años}$</span><span>$F = 6,100$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ i_s = \frac{\frac{F}{P} - 1}{n} = \frac{\frac{6,100}{5,700} - 1}{\frac{1}{3}} = \frac{0.0701...}{0.333...} = 0.2105... \text{ o } 21.05\% \text{ anual} $$</div><p>Considerando que la tasa que se pagará a la tienda es del 21.05% y es mayor a la que cobrará del 16%, le conviene realizar la compra al contado</p><p>Con datos del banco resulta un problema de monto Final:</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 5,700$</span><span>$i_s = 16\% \text{ anual} (0.16)$</span><span>$n = 4 \text{ meses} = \frac{1}{3} \text{ año}$</span><span>$F = ?$</span></div></div>
                <div class="example-block"><h3>Solución</h3><div class="formula-display">$$ F = P (1 + n \text{ } i_s) \\ F = 5,700 ( 1 + \frac{1}{3} * 0.16 ) = 5,700 (1.0533...) = 6,004 $$</div><p>En esta opción se aprecia que si ahorra su dinero en el banco, al término del plazo no le alcanzarán los \$6,004 para pagar los \$6,200 que tendrá que para a la tienda por la compra a crédito. La mejor opción por lo tanto es pagar de contado el artículo.</p></div>
            </section>

            <section>
                <h2>Ejemplo 15. Opción de compra o inversión</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un padre de familia necesita comprar una PC para sus hijos. Después de mucho comparar precios, obtiene las siguientes opciones para la misma PC: Tienda 1: Pagar de contado \$7,900; Tienda 2: Un pago el día de hoy por \$4,000 y otro pago igual a 3 meses. Ninguna tienda le proporcionó la tasa de interés aplicable, pero sabe que si invierte su dinero en el banco, le pagarán el 2.5% de $i_s$ mensual. Determine cuál es la mejor opción de compra.</p></div>
                <div class="example-block"><p>En la tienda 1 no tiene más opción que pagar los \$7,900 el día de la compra.</p></div>
                <div class="example-block"><p>En la tienda 2, tiene la opción que pagar \$4,000 el día de hoy, e invertir la diferencia de \$3,900 en el banco. Calculemos cuánto recibirá al término si decide invertir.</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span>$P = 3,900$</span><span>$i_s = 2.5\% \text{ mensual}$</span><span>$n = 3 \text{ meses}$</span><span>$F = ?$</span></div></div>
                <div class="example-block"><h4>Solución:</h4></div>
                <div class="formula-display">$$ \begin{aligned} F &= P (1 + n \text{ } i_s) \\ F &= 3,900 ( 1 + 3 * 0.025 ) = 3,900 (1.075) = 4,192.50 \end{aligned} $$</div>
                <div class="example-block"><p>Le conviene comprar en la tienda 2, ya que con los \$7,900 que pagaría en la tienda 1, en la tienda 2 puede pagar el enganche de \$4,000 e invertir la diferencia y retirar \$4,192.50 al término; con ello liquida el segundo pago de \$4,000, y le quedará un excedente.</p></div>
            </section>

            <section>
                <h2>Ejemplo 16. Aplicación en tarjetas</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>A continuación verá un extracto de un estado de cuenta de una tarjeta de crédito, con la información esencial para el cálculo de los intereses del mes respectivo. Realice el cálculo de los intereses que le cargarán el mes siguiente, si se sabe que la tasa de $i_s$ que le cobran es del 5.15% mensual.</p></div>
                <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.85em;"><thead><tr><th>Fecha</th><th>Concepto</th><th>Cargo</th><th>Abono</th><th>Saldo Final</th></tr></thead><tbody><tr><td>01-abr</td><td>Saldo inicial</td><td></td><td></td><td>3,598</td></tr><tr><td>05-abr</td><td>Disposición de efectivo</td><td>1,000</td><td></td><td>4,598</td></tr><tr><td>15-abr</td><td>Depósito</td><td></td><td>1,200</td><td>3,398</td></tr><tr><td>20-abr</td><td>Compra a crédito</td><td>1,500</td><td></td><td>4,898</td></tr><tr><td>28-abr</td><td>Depósito</td><td></td><td>1,300</td><td>3,598</td></tr></tbody></table></div>
                <div class="example-block"><p>Procedamos a obtener el saldo diario promedio, el cual se calcula como sigue:</p></div>
                <div class="table-responsive"><table class="table table-sm table-bordered text-center align-middle" style="font-size: 0.85em;"><thead><tr><th>Fecha</th><th>No. De días</th><th>Saldo Vigente</th><th>Suma saldos</th></tr></thead><tbody><tr><td>del 1 al 4 abr</td><td>4</td><td>3,598</td><td>4 * 3,598 = 14,392</td></tr><tr><td>del 5 al 14 abr</td><td>10</td><td>4,598</td><td>45,980</td></tr><tr><td>del 15 al 19 abr</td><td>5</td><td>3,398</td><td>16,990</td></tr><tr><td>del 20 al 27 abr</td><td>8</td><td>4,898</td><td>39,184</td></tr><tr><td>del 28 al 30 abr</td><td>3</td><td>3,598</td><td>10,794</td></tr><tr class="fw-bold"><td>Totales</td><td>30</td><td></td><td>127,340</td></tr><tr><td>Saldo diario promedio</td><td></td><td>127,340 / 30 =</td><td>4,244.67</td></tr><tr><td>Tasa $i_s$ mensual</td><td></td><td></td><td>* 5.15%</td></tr><tr class="fw-bold table-light"><td>Interés a cargo del mes</td><td></td><td></td><td>218.60</td></tr></tbody></table></div>
            </section>

            <div class="section-divider"></div>

            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
                <nav class="toc-nav"><ul id="toc-list"></ul></nav>
            </aside>
    </div>
</div>

<a href="../Menus/interes_simple.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
