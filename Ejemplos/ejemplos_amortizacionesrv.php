<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Amortización con Renta Vencida', [
    'mathjax' => false,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejemplos Explicados: Amortización</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            
            <section>
                <h2>Ejemplo 1: Cálculo del Préstamo (P) con Pagos Vencidos (Rv)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un microempresario requiere solicitar un préstamo... Estima pagos de $42,200 cuatrimestrales durante 2 años, con interés del 15% anual...</p><p style="font-style: italic; font-size: 1em; color: #555;">Usamos la fórmula del Valor Presente de una Anualidad Vencida. Convertir tasa y plazo a cuatrimestres.</p></div>
                <div class="example-block"><h3>Diagrama, Datos y Conversión</h3><img src="../img/ejemplo_1amort.PNG" alt="Diagrama y cálculo inicial Ejemplo 1 Amortización" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Rv =</strong> 42,200</span><span><strong>i<sub>anual</sub> =</strong> 15%</span><span><strong>n =</strong> 6 cuatrimestres</span><span><strong>P =</strong> ?</span><span><strong>i<sub>cuatrimestral</sub> ≈</strong> 4.76%</span></div></div>
                <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">P = Rv [ (1 - (1 + i)<sup>-n</sup>) / i ]</div></div>
                <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">P = 42,200 * [ (1 - (1.0476...)<sup>-6</sup>) / 0.0476... ] ≈ 215,786.99</div></div>
                <div class="example-block"><h3>Resultado</h3><div class="result-box">Importe del Préstamo (P) ≈ $215,786.99</div></div>
                <div class="example-block"><h3>Tabla de Amortización</h3><img src="../img/ejemplo_1amorttabla.PNG" alt="Tabla de Amortización Ejemplo 1" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">El pago (Rv) cubre el interés y la diferencia amortiza el préstamo.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 2: Cálculo del Pago Anticipado (Ra)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un analista elabora un plan a crédito para la venta de un plóter (P=$31,500). Clientes pagan en 8 meses promedio. Tasa 1.35% mensual. Determine pagos mensuales (Ra) si se empieza a pagar hoy.</p><p style="font-style: italic; font-size: 1em; color: #555;">Como los pagos inician hoy, es Anualidad Anticipada. Calcular Ra dado P.</p></div>
                 <div class="example-block"><h3>Diagrama, Datos y Fórmula</h3><img src="../img/ejemplo_2amort.PNG" alt="Diagrama y cálculo inicial Ejemplo 2 Amortización" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P =</strong> 31,500</span><span><strong>i =</strong> 1.35% mensual (0.0135)</span><span><strong>n =</strong> 8 meses</span><span><strong>Ra =</strong> ?</span></div><div class="formula-display">Ra = (P * i) / (1 + i - (1 + i)<sup>-(n-1)</sup>)</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">Ra = (31,500 * 0.0135) / (1.0135 - (1.0135)<sup>-7</sup>) ≈ 4,124.76</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pago Mensual Anticipado (Ra) ≈ $4,124.76</div></div>
                 <div class="example-block"><h3>Tabla de Amortización con Pagos Anticipados</h3><p>La mecánica cambia: el pago se resta al Saldo Inicial antes de calcular el interés...</p><img src="../img/ejemplo_2amorttabla.PNG" alt="Tabla de Amortización Pagos Anticipados Ejemplo 2" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">El pago debe cubrir el interés (sobre SI - Ra) y la diferencia amortiza.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 3: Amortización con Periodo de Gracia (Solo Intereses)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Para remodelar el lobby de un hotel, un empresario solicita un préstamo por $500,000. Plan de AM: plazo 3 años, tasa 21% semestral. Pagos cuatrimestrales iguales. En el primer año sólo pagará intereses...</p><p style="font-style: italic; font-size: 1em; color: #555;">Descontar periodo de gracia del plazo. Convertir tasa y plazo a cuatrimestres.</p></div>
                 <div class="example-block"><h3>Diagrama, Datos y Conversión</h3><img src="../img/ejemplo_3amort.PNG" alt="Diagrama y cálculo inicial Ejemplo 3 Amortización" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P =</strong> 500,000</span><span><strong>i<sub>semestral</sub> =</strong> 21%</span><span><strong>n<sub>gracia</sub> =</strong> 3 cuatrim.</span><span><strong>n<sub>amortización</sub> =</strong> 6 cuatrim.</span><span><strong>Rv =</strong> ?</span><span><strong>i<sub>cuatrimestral</sub> ≈</strong> 13.55%</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">Pago<sub>gracia</sub> = P * i<sub>cuatrimestral</sub></div><div class="formula-display">Rv = P * [ i / (1 - (1 + i)<sup>-n</sup>) ]</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">Pago<sub>gracia</sub> = 500,000 * 0.1355... ≈ 67,754.06</div><div class="formula-display">Rv = 500,000 * [ 0.1355... / (1 - (1.1355...)<sup>-6</sup>) ] ≈ 127,000.94</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pago 1er año ≈ $67,754.06 cuat.<br> Pago años 2 y 3 ≈ $127,000.94 cuat.</div></div>
                 <div class="example-block"><h3>Tabla de Amortización</h3><img src="../img/ejemplo_3amorttabla.PNG" alt="Tabla de Amortización Ejemplo 3 con Gracia" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">En el periodo de gracia los pagos solo cubren intereses...</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 4: Amortización con Cambio de Tasa y Ajuste de Plazo (Rv)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un becario compra Tablet (P=$4,950) a crédito con pagos mensuales de $350. Tasa inicial 3% mensual. Después de 1 año, tasa sube a 5%. Encuentre número de pagos y realice tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular Saldo Insoluto (Si) al año. Calcular plazo restante (n<sub>2</sub>) con nueva tasa.</p></div>
                 <div class="example-block"><h3>Paso 1: Saldo Insoluto al Final del Primer Año (i=3%)</h3><img src="../img/ejemplo_2amort.PNG" alt="Cálculo Saldo Insoluto Ejemplo 4" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>1</sub> =</strong> 4,950</span><span><strong>i<sub>1</sub> =</strong> 3% (0.03)</span><span><strong>n<sub>1</sub> =</strong> 12 meses</span><span><strong>Rv =</strong> 350</span><span><strong>Si =</strong> ?</span></div><div class="formula-display">F<sub>Deuda</sub> = P<sub>1</sub>(1+i<sub>1</sub>)<sup>n1</sup> ≈ 7,057.52</div><div class="formula-display">F<sub>Pagos</sub> = Rv[((1+i<sub>1</sub>)<sup>n1</sup>-1)/i<sub>1</sub>] ≈ 4,967.21</div><div class="formula-display">Si = F<sub>Deuda</sub> - F<sub>Pagos</sub> ≈ 2,090.31</div></div>
                 <div class="example-block"><h3>Paso 2: Plazo Restante con Nueva Tasa (i=5%)</h3><img src="../img/ejemplo_4_2amort.PNG" alt="Cálculo Plazo Restante Ejemplo 4" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>2</sub> = Si ≈</strong> 2,090.31</span><span><strong>Rv =</strong> 350</span><span><strong>i<sub>2</sub> =</strong> 5% (0.05)</span><span><strong>n<sub>2</sub> =</strong> ? (meses)</span></div><div class="formula-display">n = -log(1 - (P * i) / Rv) / log(1 + i)</div><div class="formula-display">n<sub>2</sub> = -log(1-(2090.31*0.05)/350)/log(1.05) ≈ 7.27 meses</div></div>
                 <div class="example-block"><h3>Resultado del Plazo</h3><div class="result-box">Plazo Total ≈ 12 + 7.27 ≈ 19.27 meses<br>(19 pagos de $350 y un pago final menor)</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Completa</h3><img src="../img/ejemplo_4amorttabla.PNG" alt="Tabla Amortización Tasa Variable Ejemplo 4" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">La tabla muestra el cambio de tasa en el mes 13 y el ajuste del último pago.</p></div>
            </section>
             <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 5: Amortización con Cambio de Tasa y Ajuste de Pago (Ra)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un ingeniero mecánico compra herramientas (P=$31,500) a 4 años con pagos trimestrales anticipados. Tasa inicial 2.28% trimestral. Después de 3 años, tasa aumenta a 3.75% trimestral. Determine pagos antes y después del cambio, y realice tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular Ra inicial. Calcular Si a los 3 años. Calcular nuevo Ra.</p></div>
                 <div class="example-block"><h3>Paso 1: Pago Anticipado Inicial (Ra<sub>1</sub>) para 4 años</h3><img src="../img/ejemplo_5amort.PNG" alt="Cálculo Ra inicial Ejemplo 5" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P =</strong> 31,500</span><span><strong>i<sub>1</sub> =</strong> 2.28% (0.0228)</span><span><strong>n =</strong> 16 trimestres</span><span><strong>Ra<sub>1</sub> =</strong> ?</span></div><div class="formula-display">Ra = (P*i)/(1+i-(1+i)<sup>-(n-1)</sup>)</div><div class="formula-display">Ra<sub>1</sub> ≈ 2,318.88</div></div>
                 <div class="example-block"><h3>Paso 2: Saldo Insoluto (Si) a los 3 años (12 trimestres)</h3><img src="../img/ejemplo_5_2amort.PNG" alt="Cálculo Saldo Insoluto Ejemplo 5" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>1</sub> =</strong> 31,500</span><span><strong>i<sub>1</sub> =</strong> 2.28%</span><span><strong>n<sub>1</sub> =</strong> 12 trimestres</span><span><strong>Ra<sub>1</sub> ≈</strong> 2,318.88</span><span><strong>Si =</strong> ?</span></div><div class="formula-display">F<sub>Deuda</sub> = P<sub>1</sub>(1+i<sub>1</sub>)<sup>n1</sup> ≈ 41,285.66</div><div class="formula-display">F<sub>Pagos</sub> = (Ra<sub>1</sub>/i<sub>1</sub>)[(1+i<sub>1</sub>)<sup>n1+1</sup>-(1+i<sub>1</sub>)] ≈ 32,315.70</div><div class="formula-display">Si = F<sub>Deuda</sub> - F<sub>Pagos</sub> ≈ 8,969.96</div></div>
                 <div class="example-block"><h3>Paso 3: Nuevo Pago Anticipado (Ra<sub>2</sub>) para el último año</h3><img src="../img/ejemplo_5_3amort.PNG" alt="Cálculo Ra nuevo Ejemplo 5" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>2</sub> = Si ≈</strong> 8,969.96</span><span><strong>i<sub>2</sub> =</strong> 3.75% (0.0375)</span><span><strong>n<sub>2</sub> =</strong> 4 trimestres</span><span><strong>Ra<sub>2</sub> =</strong> ?</span></div><div class="formula-display">Ra = (P*i)/(1+i-(1+i)<sup>-(n-1)</sup>)</div><div class="formula-display">Ra<sub>2</sub> ≈ 2,367.80</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pago Anticipado (Años 1-3) ≈ $2,318.88<br> Pago Anticipado (Año 4) ≈ $2,367.80</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Completa</h3><img src="../img/ejemplo_5amorttabla.PNG" alt="Tabla Amortización Tasa Variable Anticipada Ejemplo 5" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">La tabla muestra el cambio de tasa y pago en el trimestre 13.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 6: Amortización con Pagos Diferidos</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un departamento (P=$913,000) se ofrece a pagar con 7 pagos anuales, el primero dentro de 3 años. Tasa 20.88% anual. Determine valor de pagos y realice tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular F de P después del diferimiento. Luego calcular anualidad (Ra o Rv).</p></div>
                 <div class="example-block"><h3>Paso 1: Valor Futuro (F) después del Diferimiento (3 años)</h3><img src="../img/ejemplo_6amort.PNG" alt="Cálculo F diferido Ejemplo 6" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P =</strong> 913,000</span><span><strong>i =</strong> 20.88%</span><span><strong>n<sub>dif</sub> =</strong> 3 años</span><span><strong>F<sub>dif</sub> =</strong> ?</span></div><div class="formula-display">F = P (1 + i)<sup>n</sup> ≈ 1,612,627.76</div></div>
                 <h4>Opción a) Anualidad Anticipada (Ra)</h4>
                 <div class="example-block"><h3>Paso 2a: Calcular Pago Anticipado (Ra)</h3><p>Primer pago al inicio del 4º año (periodo 4). 7 pagos (años 4-10).</p><img src="../img/ejemplo_6_2amort.PNG" alt="Cálculo Ra Ejemplo 6" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P' ≈</strong> 1,612,627.76</span><span><strong>i =</strong> 20.88%</span><span><strong>n =</strong> 7 años</span><span><strong>Ra =</strong> ?</span></div><div class="formula-display">Ra = (P'*i)/(1+i-(1+i)<sup>-(n-1)</sup>) ≈ 379,071.64</div><img src="../img/ejemplo_6amorttabla.PNG" alt="Tabla Amortización Anticipada Diferida Ejemplo 6" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div><div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Pago Anual Anticipado (Ra) ≈ $379,071.64</div>
                 <h4 style="margin-top: 3rem;">Opción b) Anualidad Vencida (Rv)</h4>
                 <div class="example-block"><h3>Paso 2b: Calcular Pago Vencido (Rv)</h3><p>Primer pago al final del 3er año. Necesitamos P'' al final del año 2.</p><img src="../img/ejemplo_6_3amort.PNG" alt="Cálculo Rv Ejemplo 6" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="formula-display">P'' = F<sub>año2</sub> = P(1+i)<sup>2</sup> ≈ 1,334,073.26</div><div class="variable-grid"><span><strong>P'' ≈</strong> 1,334,073.26</span><span><strong>i =</strong> 20.88%</span><span><strong>n =</strong> 7 años</span><span><strong>Rv =</strong> ?</span></div><div class="formula-display">Rv = P''*[i/(1-(1+i)<sup>-n</sup>)] ≈ 379,071.64</div><img src="../img/ejemplo_6_2amorttabla.PNG" alt="Tabla Amortización Vencida Diferida Ejemplo 6" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div><div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Pago Anual Vencido (Rv) ≈ $379,071.64</div>
                 <div class="example-block"><h3>Conclusión</h3><p style="font-style: italic; font-size: 1em; color: #555;">Ambas interpretaciones (Ra o Rv) llevan al mismo valor de pago anual, solo cambia el momento en que se registra en la tabla.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 7: Amortización Constante (AC) con Pagos Vencidos (Rv)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una franquicia solicita préstamo de $150,000 a 5 años con pagos semestrales. Tasa 25% anual. Realice tabla de Amortización Constante (AC).</p><p style="font-style: italic; font-size: 1em; color: #555;">Amortización (Ac) = SI / n. Pago (Rv) = Ac + Interés. Convertir tasa y plazo a semestres.</p></div>
                 <div class="example-block"><h3>Datos y Cálculo de Ac</h3><div class="variable-grid"><span><strong>SI =</strong> 150,000</span><span><strong>n =</strong> 10 semestres</span><span><strong>i<sub>anual</sub> =</strong> 25%</span><span><strong>Ac =</strong> ?</span><span><strong>i<sub>semestral</sub> ≈</strong> 11.80%</span></div><div class="formula-display">i<sub>semestral</sub> = (1.25)<sup>0.5</sup> - 1 ≈ 0.11803</div><div class="formula-display">Ac = 150,000 / 10 = 15,000</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Constante</h3><p>Primero se llena Saldo Inicial y Ac, luego se calcula SF. Después se calculan I y Rv...</p><img src="../img/ejemplo_7amorttabla.PNG" alt="Tablas de Amortización Constante Ejemplo 7" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Amortización Constante (Ac) = $15,000.00 semestrales</div><p style="text-align: center; margin-top: 1rem; font-style: italic;">El pago (Rv) disminuye cada semestre.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 8: Amortización Constante (AC) con Pagos Anticipados (Ra)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Realice el ejemplo 7 (P=$150,000, n=10 sem, i≈11.80% sem, Ac=$15,000) considerando pagos anticipados.</p><p style="font-style: italic; font-size: 1em; color: #555;">La Ac es la misma, cambia el cálculo de Ra y la mecánica de la tabla.</p></div>
                 <div class="example-block"><h3>Fórmula(s) y Tabla</h3><p>El Pago Anticipado (Ra) se calcula periodo a periodo. El Interés se calcula sobre (SI - Ra).</p><div class="formula-display">Ra<sub>k</sub> = SI<sub>k</sub> - (SF<sub>k</sub> / (1 + i))</div><div class="formula-display">I<sub>k</sub> = (SI<sub>k</sub> - Ra<sub>k</sub>) * i</div><img src="../img/ejemplo_8amorttabla.PNG" alt="Tabla AC con Pagos Anticipados Ejemplo 8" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pagos Anticipados (Ra) variables y decrecientes.<br>Amortización Constante (Ac) = $15,000.00 semestrales.</div></div>
            </section>
             <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 9: Amortización Ponderada con Pago Inicial Menor (Rv)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Préstamo de $715,000, i=3.1% bimestral, 2 años. Amortizar 15% en 8 meses (4 bim.) y 85% al final. Pagos bimestrales. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular Rv<sub>1</sub> para 4 bim. Calcular Si. Calcular Rv<sub>2</sub> para 8 bim.</p></div>
                 <div class="example-block"><h3>Paso 1: Saldo Insoluto (Si) a los 4 bimestres</h3><p>Am<sub>obj</sub>=107,250. SF<sub>4</sub>=607,750.</p><img src="../img/ejemplo_9amort.PNG" alt="Cálculo Si Ponderada Ejemplo 9" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="formula-display">F<sub>Deuda</sub> ≈ 807,868.55</div><img src="../img/ejemplo9-am-calculo-pe.PNG" alt="Cálculo PE Ponderada Ejemplo 9" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><div class="formula-display">PE ≈ 200,118.55</div></div>
                 <div class="example-block"><h3>Paso 2: Pago (Rv<sub>1</sub>) de los primeros 4 bimestres</h3><img src="../img/ejemplo_9_2amort.PNG" alt="Cálculo Rv1 Ponderada Ejemplo 9" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="formula-display">Rv = F * [ i / ((1 + i)<sup>n</sup> - 1) ]</div><div class="formula-display">Rv<sub>1</sub> ≈ 47,762.43</div></div>
                 <div class="example-block"><h3>Paso 3: Pago (Rv<sub>2</sub>) de los últimos 8 bimestres</h3><img src="../img/ejemplo_9_3amort.PNG" alt="Cálculo Rv2 Ponderada Ejemplo 9" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="formula-display">Rv = P' * [ i / (1 - (1 + i)<sup>-n</sup>) ]</div><div class="formula-display">Rv<sub>2</sub> ≈ 86,943.47</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pago (Bimestres 1-4) ≈ $47,762.43<br> Pago (Bimestres 5-12) ≈ $86,943.47</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Ponderada</h3><p>Primera parte:</p><img src="../img/ejemplo_9amorttabla.PNG" alt="Tabla Amortización Ponderada Parte 1" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><img src="../img/ejemplo_9_3amort.PNG" alt="Conclusión Cálculo Rv1" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><p>Segunda parte:</p><img src="../img/ejemplo_9_2amorttabla.PNG" alt="Tabla Amortización Ponderada Parte 2" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 10: Amortización Ponderada con Pago Inicial Mayor (Rv)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Préstamo de $715,000, i=3.1% bimestral, 2 años. Amortizar 20% en 4 meses (2 bim.) y 80% al final. Pagos bimestrales. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular Rv<sub>1</sub> para 2 bim. Calcular Si. Calcular Rv<sub>2</sub> para 10 bim.</p></div>
                 <div class="example-block"><h3>Paso 1: Saldo Insoluto (Si) a los 2 bimestres</h3><p>Am<sub>obj</sub>=143,000. SF<sub>2</sub>=572,000.</p><img src="../img/ejemplo_10amort.PNG" alt="Cálculo Si Ponderada Ejemplo 10" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><p>FF en t=0:</p><div class="formula-display">P<sub>DE</sub> = 715,000</div><div class="formula-display">P<sub>Si</sub> = 572,000(1.031)<sup>-2</sup> ≈ 538,119.46</div><img src="../img/ejemplo10-am-calculo-pe-rv1.png" alt="Cálculo PE y Rv1 Ponderada Ejemplo 10" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><div class="formula-display">P<sub>Si</sub> = P<sub>DE</sub> - PE &nbsp;=>&nbsp; PE ≈ 176,880.54</div></div>
                 <div class="example-block"><h3>Paso 2: Pago (Rv<sub>1</sub>) de los primeros 2 bimestres</h3><img src="../img/ejemplo_10_2amort.PNG" alt="Cálculo Rv1 Ponderada Ejemplo 10" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P (PE) ≈</strong> 176,880.54</span><span><strong>i =</strong> 3.1% bim.</span><span><strong>n =</strong> 2 bim.</span><span><strong>Rv<sub>1</sub> =</strong> ?</span></div><div class="formula-display">Rv = P * [ i / (1 - (1 + i)<sup>-n</sup>) ]</div><div class="formula-display">Rv<sub>1</sub> ≈ 92,573.67</div></div>
                 <div class="example-block"><h3>Paso 3: Pago (Rv<sub>2</sub>) de los últimos 10 bimestres</h3><img src="../img/ejemplo_10_3amort.PNG" alt="Cálculo Rv2 Ponderada Ejemplo 10" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P' = Si =</strong> 572,000</span><span><strong>i =</strong> 3.1% bim.</span><span><strong>n =</strong> 10 bim.</span><span><strong>Rv<sub>2</sub> =</strong> ?</span></div><div class="formula-display">Rv = P' * [ i / (1 - (1 + i)<sup>-n</sup>) ]</div><div class="formula-display">Rv<sub>2</sub> ≈ 67,398.51</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Pago (Bimestres 1-2) ≈ $92,573.67<br> Pago (Bimestres 3-12) ≈ $67,398.51</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Ponderada</h3><p>Primera parte (2 bimestres):</p><img src="../img/ejemplo_10amorttabla.png" alt="Tabla Amortización Ponderada Parte 1 Ejemplo 10" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">Con Rv<sub>1</sub> se amortizaron $143,000 (20%) y se obtuvo SF=$572,000.</p><p>Segunda parte (10 bimestres restantes):</p><img src="../img/ejemplo_10_.png" alt="Tabla Amortización Ponderada Parte 2 Ejemplo 10" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>

            <div class="section-divider"></div>

            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
                <nav class="toc-nav"><ul id="toc-list"></ul></nav>
            </aside>
    </div>
</div>

<a href="../Menus/amortizacion_con_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
