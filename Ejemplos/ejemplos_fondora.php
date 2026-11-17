<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Fondo de Amortización (Renta Anticipada)', [
    'mathjax' => false,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejemplos Explicados: Fondo de Amortización
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            
            <section>
                <h2>Ejemplo 1: Saldo Acumulado (F) con Depósitos Vencidos (Rv)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>La Alcaldía establece un FA depositando $450,000 anuales por 20 años a 5% anual. Determine F<sub>20</sub> y F<sub>8</sub>. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Aplicar fórmula F de anualidad vencida.</p></div>
                <div class="example-block"><h3>Cálculo F a 20 años</h3><img src="../img/ejemplo1-fa-calculo-f20.png" alt="Diagrama F a 20 años" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Rv=</strong> 450,000</span><span><strong>i=</strong> 5%</span><span><strong>n=</strong> 20</span><span><strong>F=?</strong></span></div><div class="formula-display">F = 450,000 * [((1.05)<sup>20</sup> - 1) / 0.05] ≈ 14,879,679.35</div></div>
                <div class="example-block"><h3>Cálculo F a 8 años</h3><img src="../img/ejemplo1-fa-calculo-f8.png" alt="Diagrama F a 8 años" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Rv=</strong> 450,000</span><span><strong>i=</strong> 5%</span><span><strong>n=</strong> 8</span><span><strong>F<sub>8</sub>=?</strong></span></div><div class="formula-display">F<sub>8</sub> = 450,000 * [((1.05)<sup>8</sup> - 1) / 0.05] ≈ 4,297,098.99</div></div>
                <div class="example-block"><h3>Resultado</h3><div class="result-box">F<sub>20</sub> ≈ $14,879,679.35 <br> F<sub>8</sub> ≈ $4,297,098.99</div></div>
                <div class="example-block"><h3>Tabla del Fondo de Amortización (FA)</h3><img src="../img/ejemplo1-fa-tabla.png" alt="Tabla FA Ejemplo 1" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">La tabla muestra el crecimiento del fondo.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                <h2>Ejemplo 2: Saldo Acumulado (F) con Depósitos Anticipados (Ra)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>El Municipio invierte $375,000 semestrales durante 6 años, empezando hoy. Tasa 7.75% semestral. Determine F<sub>6años</sub> y F<sub>3.5años</sub>. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Aplicar fórmula F de anualidad anticipada.</p></div>
                <div class="example-block"><h3>Cálculo F a 6 años (12 semestres)</h3><img src="../img/ejemplo2-fa-calculo-f12.png" alt="Diagrama F a 12 semestres" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Ra=</strong> 375,000</span><span><strong>i=</strong> 7.75%</span><span><strong>n=</strong> 12 sem.</span><span><strong>F=?</strong></span></div><div class="formula-display">F = (Ra/i) * [ (1+i)<sup>n+1</sup> - (1+i) ] ≈ 7,555,211.03</div></div>
                <div class="example-block"><h3>Cálculo F a 3.5 años (7 semestres)</h3><img src="../img/ejemplo2-fa-calculo-f7.png" alt="Diagrama F a 7 semestres" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Ra=</strong> 375,000</span><span><strong>i=</strong> 7.75%</span><span><strong>n=</strong> 7 sem.</span><span><strong>F<sub>7</sub>=?</strong></span></div><div class="formula-display">F<sub>7</sub> = (Ra/i) * [ (1+i)<sup>n+1</sup> - (1+i) ] ≈ 3,577,887.80</div></div>
                <div class="example-block"><h3>Resultado</h3><div class="result-box">F<sub>12</sub> ≈ $7,555,211.03 <br> F<sub>7</sub> ≈ $3,577,887.80</div></div>
                <div class="example-block"><h3>Tabla del Fondo de Amortización (FA) con Ra</h3><img src="../img/ejemplo2-fa-tabla.png" alt="Tabla FA Anticipada Ejemplo 2" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">La tabla muestra el saldo al final de cada semestre.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                <h2>Ejemplo 3: Cambio de Frecuencia con Renta Anticipada Equivalente</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>En el problema 2 (F<sub>6años</sub> ≈ $7.55M, i=7.75% semestral), el Municipio desea invertir cuatrimestralmente. Calcule Ra<sub>q</sub>. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular tasa (i<sub>q</sub>) y renta (Ra<sub>q</sub>) cuatrimestrales equivalentes.</p></div>
                <div class="example-block"><h3>Cálculo de Tasa y Renta Equivalentes</h3><img src="../img/ejemplo3-fa-calculo.png" alt="Cálculo iq y Raq Ejemplo 3 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Ra<sub>sem</sub>=</strong> 375,000</span><span><strong>i<sub>sem</sub>=</strong> 7.75%</span><span><strong>m<sub>o</sub>=</strong> 2</span><span><strong>m<sub>d</sub>=</strong> 3</span><span><strong>i<sub>q</sub>=?</strong></span><span><strong>Ra<sub>q</sub>=?</strong></span></div><div class="formula-display">i<sub>q</sub> = (1+i)<sup>mo/md</sup> - 1 ≈ 5.10%</div><div class="formula-display">Ra<sub>q</sub> = Ra*[( (1+i)i<sub>q</sub> ) / ( (1+i<sub>q</sub>)i )] ≈ 253,096.93</div></div>
                <div class="example-block"><h3>Resultado</h3><div class="result-box">i<sub>q</sub> ≈ 5.10% cuat.<br> Ra<sub>q</sub> ≈ $253,096.93 cuat.</div></div>
                <div class="example-block"><h3>Tabla por Periodo (Cuatrimestral)</h3><p>6 años = 18 cuatrimestres.</p><img src="../img/ejemplo3-fa-tabla.png" alt="Tabla FA Cuatrimestral Ejemplo 3" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><img src="../img/ejemplo3-fa-conclusion.png" alt="Comparación Intereses Ejemplo 3 FA" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 4: FA con Cambio de Tasa y Ajuste en Pago Vencido (Rv)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Municipio emite obligaciones por F=$500,000 a 10 años. FA con i=22.5% sem. los 5 primeros años, y i=20.9% para los 5 restantes. Determine Rv<sub>1</sub> y Rv<sub>2</sub>. Tabla.</p><p style="font-style: italic; font-size: 1em; color: #555;">Calcular Rv<sub>1</sub>. Calcular F<sub>10sem</sub>. Calcular No. Calcular Rv<sub>2</sub>.</p></div>
                 <div class="example-block"><h3>Paso 1: Pago Vencido Inicial (Rv<sub>1</sub>) para 10 años</h3><img src="../img/ejemplo4-fa-calculo-rv1.png" alt="Cálculo Rv inicial Ejemplo 4 FA" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>F=</strong> 500,000</span><span><strong>i<sub>1</sub>=</strong> 22.5%</span><span><strong>n=</strong> 20 sem.</span><span><strong>Rv<sub>1</sub>=?</strong></span></div><div class="formula-display">Rv = F * [i/((1+i)<sup>n</sup>-1)] ≈ 1,976.95</div><p>Tabla parcial (primeros 10 semestres):</p><img src="../img/ejemplo4-fa-tabla1.png" alt="Tabla FA Parte 1 Ejemplo 4" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Paso 2: Monto Acumulado (F<sub>10sem</sub>) a los 5 años</h3><img src="../img/ejemplo4-fa-calculo-f10.png" alt="Cálculo F a 10 semestres Ejemplo 4 FA" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Rv<sub>1</sub>≈</strong> 1,976.95</span><span><strong>i<sub>1</sub>=</strong> 22.5%</span><span><strong>n<sub>1</sub>=</strong> 10 sem.</span><span><strong>F<sub>10s</sub>=?</strong></span></div><div class="formula-display">F = Rv[((1+i)<sup>n</sup>-1)/i] ≈ 58,074.74</div></div>
                 <div class="example-block"><h3>Paso 3: Nuevo Objetivo (No) y Nuevo Pago (Rv<sub>2</sub>)</h3><img src="../img/ejemplo4-fa-calculo-no.png" alt="Cálculo Nuevo Objetivo Ejemplo 4 FA" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>SE</sub>≈</strong> 58,074.74</span><span><strong>i<sub>2</sub>=</strong> 20.9%</span><span><strong>n<sub>2</sub>=</strong> 10 sem.</span><span><strong>F<sub>SE</sub>=?</strong></span><span><strong>Ob=</strong> 500,000</span><span><strong>No=?</strong></span></div><div class="formula-display">F<sub>SE</sub> = P<sub>SE</sub>(1+i<sub>2</sub>)<sup>n2</sup> ≈ 387,480.88</div><div class="formula-display">No = Ob - F<sub>SE</sub> ≈ 112,519.12</div><img src="../img/ejemplo4-fa-calculo-rv2.png" alt="Cálculo Rv2 Ejemplo 4 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>F<sub>No</sub>≈</strong> 112,519.12</span><span><strong>i<sub>2</sub>=</strong> 20.9%</span><span><strong>n<sub>2</sub>=</strong> 10 sem.</span><span><strong>Rv<sub>2</sub>=?</strong></span></div><div class="formula-display">Rv = F*[i/((1+i)<sup>n</sup>-1)] ≈ 4,145.99</div></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Ahorro (Años 1-5) ≈ $1,976.95 sem.<br> Ahorro (Años 6-10) ≈ $4,145.99 sem.</div></div>
                 <div class="example-block"><h3>Tabla de Amortización Completa (Segunda Parte)</h3><img src="../img/ejemplo4-fa-tabla2.png" alt="Tabla FA Parte 2 Ejemplo 4" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">La tabla completa mostraría el cambio de tasa y pago en el semestre 11.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 5: FA con Ajuste al Plazo y Cambio de Tasa (Ra)</h2>
                 <div class="example-block">
                     <h3>Planteamiento</h3>
                     <p>El Instituto Nacional de Bellas Artes y Literatura requiere emitir obligaciones por un equivalente futuro de $300,000 (datos en miles); si estima que aportando $13,000 quincenales anticipados a un FA que paga el 25% anual proporcional quincenal, y que luego de seis meses la tasa se incrementará al 35% anual proporcional quincenal, determine cuánto tiempo tardará en reunir la cantidad, y el importe del ahorro final. Realice la tabla que muestre la situación.</p>
                     <p style="font-style: italic; font-size: 1em; color: #555;">Realicemos un diagrama para calcular el total reunido en el FA hasta el momento en que cambiará la tasa, es decir, en seis meses. Recuerde que la tasa j es anual proporcional, y que m es la frecuencia de capitalizaciones.</p>
                     <p style="font-style: italic; font-size: 1em; color: #555;">Calcular F<sub>12q</sub> con i<sub>1</sub>. Calcular n<sub>2</sub> restante con i<sub>2</sub>. Determinar depósito final.</p>
                 </div>
                 <div class="example-block"><h3>Paso 1: Monto Acumulado (F) a 6 meses (12 quincenas)</h3><img src="../img/ejemplo5-fa-calculo-f12-tabla1.png" alt="Cálculo F a 12 quincenas y tabla parcial Ejemplo 5 FA" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>Ra=</strong> 13,000</span><span><strong>i<sub>1</sub>≈</strong> 1.04%</span><span><strong>n<sub>1</sub>=</strong> 12 quinc.</span><span><strong>F<sub>12q</sub>=?</strong></span></div><div class="formula-display">F = (Ra/i)*[(1+i)<sup>n+1</sup>-(1+i)] ≈ 166,976.63</div></div>
                 <div class="example-block"><h3>Paso 2: Tiempo Restante (n<sub>2</sub>) con Nueva Tasa</h3><img src="../img/ejemplo5-fa-calculo-n-setup1.png" alt="Setup cálculo n restante Parte 1 Ejemplo 5 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P<sub>SE</sub>≈</strong> 166,976.63</span><span><strong>i<sub>2</sub>≈</strong> 1.458%</span><span><strong>Ob=</strong> 300,000</span><span><strong>n<sub>2</sub>=?</strong></span></div><img src="../img/ejemplo5-fa-calculo-n-setup2.png" alt="Setup cálculo n restante Parte 2 Ejemplo 5 FA" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"><p>Igualando No = F<sub>(No)</sub> y despejando n<sub>2</sub>:</p><img src="../img/ejemplo5-fa-calculo-n-solve.png" alt="Despeje de n restante Ejemplo 5 FA" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><div class="formula-display">n<sub>2</sub> ≈ 8.0835 quincenas</div></div>
                 <div class="example-block"><h3>Resultado del Plazo y Ahorro Final</h3><p>Plazo total ≈ 12 + 8.0835 ≈ 20.0835 quincenas (20 depósitos de $13k + 1 final).</p><img src="../img/ejemplo5-fa-calculo-final-f.png" alt="Cálculo componentes F final Ejemplo 5 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="formula-display">F<sub>1</sub> ≈ 111,062.39</div><div class="formula-display">F<sub>(SE)</sub> ≈ 187,481.10</div><img src="../img/ejemplo5-fa-tabla2-final.png" alt="Cálculo Saldo Final y Ahorro Final Ejemplo 5 FA" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><div class="formula-display">SF<sub>20</sub> ≈ 298,543.49</div><div class="formula-display">Ahorro Final = 300,000 - SF<sub>20</sub> ≈ 1,456.51</div></div>
                 <div class="example-block"><h3>Tabla de Fondo de Amortización Completa</h3><img src="../img/ejemplo5-fa-tabla2-final.png" alt="Tabla FA Completa Ejemplo 5" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="text-align: center; margin-top: 1rem; font-style: italic;">Se requieren 20 depósitos de $13k y uno final de $1,456.50.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 6: Tasa de Interés (i) en FA y Comparación con AM</h2>
                 <div class="example-block">
                     <h3>Planteamiento</h3>
                     <p>El departamento de la tesorería del estado de Sonora proyecta la repavimentación de las principales avenidas de la capital, para lo cual requerirá hoy de $30,000,000. Consigue un financiamiento a 5 años, con una tasa del 24% anual. Para cumplir con el pago de la obligación contraída, estima que puede invertir $2,150,000 trimestrales en un FA. Determine la tasa de interés trimestral y anual que requiere que le paguen para cumplir su objetivo. Realice una tabla que muestre la situación.</p>
                     <p style="font-style: italic; font-size: 1em; color: #555;">Calcular F deuda. Usar F como objetivo FA y calcular 'i' por tanteo.</p>
                 </div>
                 <div class="example-block">
                     <h3>Paso 1: Monto Final (F) de la Deuda</h3>
                     <img src="../img/ejemplo_6fa_f_deuda.png" alt="Cálculo F deuda Ejemplo 6 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;">
                     <div class="variable-grid"><span><strong>P=</strong> 30M</span><span><strong>i<sub>prést</sub>≈</strong> 5.5% trim.</span><span><strong>n=</strong> 20 trim.</span><span><strong>F<sub>deuda</sub>=?</strong></span></div>
                     <p>(Usaremos resultado de imagen)</p>
                     <div class="formula-display">F<sub>deuda</sub> ≈ 87,948,751.87</div>
                 </div>
                 <div class="example-block">
                     <h3>Paso 2: Tasa Trimestral (i) del FA por Tanteo</h3>
                     <img src="../img/ejemplo_6fa_i.png" alt="Cálculo 'i' por tanteo Ejemplo 6 FA" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;">
                     <div class="variable-grid"><span><strong>F<sub>obj</sub>≈</strong> 87.9M</span><span><strong>Rv=</strong> 2.15M</span><span><strong>n=</strong> 20 trim.</span><span><strong>i=?</strong></span></div>
                     <div class="formula-display">F = Rv[((1+i)<sup>n</sup>-1)/i]</div>
                     <p>Resolviendo por tanteo:</p>
                     <div class="formula-display">i ≈ 6.98% trimestral</div>
                     <div class="formula-display">i<sub>eq anual</sub> ≈ 30.98%</div>
                     <p style="font-style: italic; font-size: 1em; color: #555;">Tasa anual FA > Tasa préstamo, irrealista.</p>
                 </div>
                 <div class="example-block">
                     <h3>Resultado (Tasa FA)</h3>
                     <div class="result-box">i<sub>trim</sub> ≈ 6.98% <br> i<sub>anual eq</sub> ≈ 30.98%</div>
                 </div>
                 <div class="example-block">
                     <h3>Tabla del Fondo de Amortización (FA)</h3>
                     <img src="../img/ejemplo_6fatabla.png" alt="Tabla FA Ejemplo 6" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;">
                 </div>
            </section>
            <div class="section-divider"></div>
            <section>
                 <h2>Ejemplo 7: Tasa Real Pagada (FA vs AM)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>El departamento de la tesorería del problema anterior, después de agotar sus opciones, encuentra que para pagar el préstamo de $87,948,751.87 al término de los 5 años de plazo, consigue crear un FA a una tasa del 15% anual. Determine el valor de las reservas anuales, así como la tasa anual que realmente se terminará pagando por este préstamo. Realice la tabla que muestre la situación.</p></div>
                 <div class="example-block"><h3>Paso 1: Reservas Anuales (Rv<sub>FA</sub>)</h3><img src="../img/ejemplo_7fa_rv.png" alt="Cálculo Rv del FA Ejemplo 7" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>F<sub>obj</sub>≈</strong> 87.9M</span><span><strong>i<sub>FA</sub>=</strong> 15%</span><span><strong>n=</strong> 5 años</span><span><strong>Rv<sub>FA</sub>=?</strong></span></div><div class="formula-display">Rv = F*[i/((1+i)<sup>n</sup>-1)] ≈ 13,044,167.72</div><img src="../img/ejemplo_7fatabla.png" alt="Tabla FA Ejemplo 7" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Paso 2: Tasa Anual Real Pagada (i<sub>real</sub>)</h3><img src="../img/ejemplo_7fa_i_real.png" alt="Cálculo i real Ejemplo 7" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P=</strong> 30M</span><span><strong>Rv<sub>FA</sub>≈</strong> 13M</span><span><strong>n=</strong> 5</span><span><strong>i<sub>real</sub>=?</strong></span></div><div class="formula-display">P = Rv[(1-(1+i)<sup>-n</sup>)/i]</div><p>Resolviendo por tanteo:</p><div class="formula-display">i<sub>real</sub> ≈ 33.05% anual</div></div>
                 <div class="example-block"><h3>Tabla AM Hipotética (Comprobación i<sub>real</sub>)</h3><img src="../img/ejemplo_7am_tabla.png" alt="Tabla AM Hipotética Ejemplo 7" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="font-style: italic; font-size: 1em; color: #555;">Tasa real ≈ Tasa Préstamo + (Tasa Préstamo - Tasa FA).</p></div>
                 <div class="example-block"><h3>Paso 3: Comparación con Amortización Directa (AM)</h3><img src="../img/ejemplo_7am_rv.png" alt="Cálculo Rv directo AM Ejemplo 7" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><div class="variable-grid"><span><strong>P=</strong> 30M</span><span><strong>i=</strong> 24%</span><span><strong>n=</strong> 5</span><span><strong>Rv<sub>AM</sub>=?</strong></span></div><div class="formula-display">Rv = P*[i/(1-(1+i)<sup>-n</sup>)] ≈ 10,927,431.45</div><img src="../img/ejemplo_7am_tabla_directa.png" alt="Tabla AM Directa Ejemplo 7" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"><p style="font-style: italic; font-size: 1em; color: #555;">Los pagos son menores ($10.9M vs $13M) porque amortizar es menos costoso que crear un FA.</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Rv<sub>FA</sub> ≈ $13,044,167.72 anuales<br> Tasa Real Pagada ≈ 33.05% anual</div><p style="text-align: center; margin-top: 1rem;">Siempre será mejor agotar opciones de pago antes de crear un FA. Ese lujo sólo se lo pueden dar los gobiernos.</p></div>
            </section>
            
            </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
                <nav class="toc-nav"><ul id="toc-list"></ul></nav>
            </aside>
    </div>
</div>

<a href="../Menus/fondo_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
