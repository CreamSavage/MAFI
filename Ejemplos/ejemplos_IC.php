<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Interés Compuesto', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejemplos Explicados: Interés Compuesto.
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            <section>
                 <h2>Ejemplo 1: Monto Final e Interés (Paso a Paso)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una persona invierte $500 durante 3 meses, a una tasa de interés del 10% capitalizable mensualmente (10% mensual) Cuanto tendra al termino? Cuanto interes habra ganado?</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>P =</strong> 500</span><span><strong>i =</strong> 10% mensual (0.10)</span><span><strong>n =</strong> 3 meses</span><span><strong>F =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Desarrollo Periodo a Periodo</h3><img src="../img/ejemplo1-ic-linea.png" alt="Línea de tiempo Interés Compuesto" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><img src="../img/ejemplo1-ic-tabla.png" alt="Tabla de Interés Compuesto por periodo" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><div class="formula-display">I = F - P = 665.50 - 500 = 165.50</div><p style="font-style: italic; font-size: 1em; color: #555;">... La única variable constante es la tasa capitalizable por periodo (i).</p></div>
                 <div class="example-block"><h3>Solución Directa con Fórmula</h3><div class="formula-display">F = P (1 + i)<sup>n</sup></div><div class="formula-display">F = 500 * (1 + 0.10)<sup>3</sup> = 665.50</div><div class="formula-display">I = F - P = 665.50 - 500 = 165.50</div><p style="font-style: italic; font-size: 1em; color: #555;">El factor (1+i)^n se denomina factor de capitalización...</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Monto Final (F) = $665.50 <br> Interés Ganado (I) = $165.50</div></div>
                 <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">Apreciemos que si se aplica Is, se tiene que I= 50 * 3 = 150, y F = 650, lo cual implica que I ya no es proporcional al tiempo</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 2: Monto Final e Interés (Anual vs Trimestral)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un empresario solicita un préstamo de $150,000 a un año, con tasa del 5.5% trimestral. Si el plazo establecido es de un año, determine cuanto tendra que pagar al termino. Cuanto interes habra pagado? Compruebe con una tabla por periodo.</p><p style="font-style: italic; font-size: 1em; color: #555;">Es necesario convertir el plazo a trimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 1 año = 4 trimestres</div><div class="variable-grid"><span><strong>P =</strong> 150,000</span><span><strong>i =</strong> 5.5% trimestral (0.055)</span><span><strong>n =</strong> 4 trimestres</span><span><strong>F =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Solución</h3><div class="formula-display">F = P (1 + i)<sup>n</sup></div><div class="formula-display">F = 150,000 * (1 + 0.055)<sup>4</sup> = 185,823.70</div><div class="formula-display">I = F - P = 185,823.70 - 150,000 = 35,823.70</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo2-ic-tabla.png" alt="Tabla de Interés Compuesto por Trimestre" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>Los valores finales de F e I coinciden.</p></div>
                  <div class="example-block"><h3>Resultado</h3><div class="result-box">Monto Final a Pagar (F) = $185,823.70 <br> Interés Pagado (I) = $35,823.70</div></div>
                <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">Al igual que en Is, la periodicidad de la tasa determina la del plazo, y viceversa</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 3: Cálculo del Principal (Valor Presente)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una pasante de veterinaria retiro $661.50 el dia de hoy, por una inversion que realizo hace cuatro meses. Si el banco le pago una tasa del 5% bimestral, calcule cuanto invirtio inicialmente. Realice una tabla por periodo</p><p style="font-style: italic; font-size: 1em; color: #555;">Convertir plazo a bimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 4 meses / 2 = 2 bimestres</div><div class="variable-grid"><span><strong>F =</strong> 661.50</span><span><strong>i =</strong> 5% bimestral (0.05)</span><span><strong>n =</strong> 2 bimestres</span><span><strong>P =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ P = \frac{F}{(1 + i)^n} $$<sup></sup></div><div class="formula-display">I = F - P</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">P = 661.50 * (1 + 0.05)<sup>-2</sup> = 600</div><p style="font-style: italic; font-size: 1em; color: #555;">El factor (1+i)<sup>-n</sup> se conoce como factor de descuento...</p><div class="formula-display">I = 661.50 - 600 = 61.50</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo3-ic-tabla.png" alt="Tabla de Interés Compuesto Ejemplo 3" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>La tabla muestra cómo $600 crecen hasta $661.50.</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Principal Invertido (P) = $600.00 <br> Interés Ganado (I) = $61.50</div></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 4: Principal con Plazo Fraccionario</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una comisionista cobró $8,292.55 el dia de hoy, por un prestamo que realizo hace diez meses. Si para la operacion se acordo un interes de 4.1% cuatrimestral, determine por que cantidad fue el prestamo, y el interes total ganado.</p><p style="font-style: italic; font-size: 1em; color: #555;">Convertir plazo a cuatrimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 10 meses / 4 = 2.5 cuatrimestres</div><div class="variable-grid"><span><strong>F =</strong> 8,292.55</span><span><strong>i =</strong> 4.1% cuatrimestral (0.041)</span><span><strong>n =</strong> 2.5 cuatrimestres</span><span><strong>P =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ P = \frac{F}{(1 + i)^n} $$<sup></sup></div><div class="formula-display">I = F - P</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">P = 8,292.55 * (1 + 0.041)<sup>-2.5</sup> = 7,500</div><div class="formula-display">I = 8,292.55 - 7,500 = 792.55</div></div>
                 <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">No se puede realizar una tabla detallada con periodos fraccionarios (2.5)...</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Cantidad del Préstamo (P) = $7,500.00 <br> Interés Ganado (I) = $792.55</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 5: Cálculo del Plazo (n)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>El representante de una cooperativa escolar cuenta con $7,165, y requiere $1,000 adicionales para mejorar el local de acceso a los alumnos. Si consigue que le paguen una tasa del 3.32% trimestral, calcule el tiempo que debera mantener su inversion para lograr su objetivo. Realice una tabla por periodo</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>P =</strong> 7,165</span><span><strong>F =</strong> 8,165</span><span><strong>i =</strong> 3.32% trimestral (0.0332)</span><span><strong>n =</strong> ? (trimestres)</span><span><strong>I =</strong> 1,000</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ n = \frac{\log(F / P)}{\log(1 + i)} $$</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">n = log(8,165 / 7,165) / log(1.0332) ≈ 4</div><p style="font-style: italic; font-size: 1em; color: #555;">La periodicidad de la tasa determina la del plazo.</p></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo5-ic-tabla.png" alt="Tabla de Interés Compuesto Ejemplo 5" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>La tabla confirma que al 4º trimestre se alcanza el monto.</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Plazo (n) ≈ 4 trimestres</div><p style="text-align: center; margin-top: 1rem; font-style: italic;">Resultado aproximado por redondeo.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 6: Plazo (n) con Resultado Fraccionario</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una comerciante requiere saber en cuanto tiempo puede reunir $25,000, si el dia de hoy cuenta con $21,000, y tiene la opcion de ahorrarlo en una institucion que le ofrece una tasa del 0.58% quincenal. Calcule el plazo de la operacion y expreselo en años, meses y dias.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>P =</strong> 21,000</span><span><strong>F =</strong> 25,000</span><span><strong>i =</strong> 0.58% quincenal (0.0058)</span><span><strong>n =</strong> ? (quincenas)</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ n = \frac{\log(F / P)}{\log(1 + i)} $$</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">n = log(25,000 / 21,000) / log(1.0058) ≈ 30.148 quincenas</div><p style="font-style: italic; font-size: 1em; color: #555;">La periodicidad de la tasa determina la del plazo.</p><p>Convertimos a años, meses y días:</p><ul style="font-family: 'Courier New', monospace; font-size: 1.1em;"><li>30 quincenas = 15 meses = 1 año y 3 meses</li><li>0.148 quincenas ≈ 2 días</li></ul></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Plazo (n) ≈ 30.148 quincenas <br> (Aproximadamente: 1 año, 3 meses y 2 días)</div></div>
            </section>
             <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 7: Cálculo de la Tasa (i) - Mensual y Semestral</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>El Ayuntamiento  del Estado de Mexico, cuenta con $2,100,000 el dia de hoy, y se requiere obtener $2,308,320 al cabo de 6 meses, para hacer frente a sus obligaciones futuras. Que tasa de interes semestral necesita que le paguen? Calcule tambien la tasa equivalente mensual. Realice las tablas por periodo para ambas opciones.</p></div>
                 
                 <h4>Opción a) Tasa Mensual</h4>
                 <div class="example-block"><h3>Datos (Mensual)</h3><div class="variable-grid"><span><strong>P =</strong> 2,100,000</span><span><strong>F =</strong> 2,308,320</span><span><strong>n =</strong> 6 meses</span><span><strong>i =</strong> ? (% mensual)</span></div></div>
                 <div class="example-block"><h3>Fórmula (Mensual)</h3><div class="formula-display">$$ i = \sqrt[n]{\frac{F}{P}} - 1 $$</div></div>
                 <div class="example-block"><h3>Sustitución (Mensual)</h3><div class="formula-display">i = (2,308,320 / 2,100,000)^(1/6) - 1 ≈ 0.0159</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Mensual)</h3><img src="../img/ejemplo7-ic-tabla-mensual.PNG" alt="Tabla Interés Compuesto Mensual Ejemplo 7" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"></div>
                 <div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Tasa Mensual (i) ≈ 1.59%</div>

                 <h4 style="margin-top: 3rem;">Opción b) Tasa Semestral</h4>
                  <div class="example-block"><h3>Datos (Semestral)</h3><div class="variable-grid"><span><strong>P =</strong> 2,100,000</span><span><strong>F =</strong> 2,308,320</span><span><strong>n =</strong> 1 semestre</span><span><strong>i =</strong> ? (% semestral)</span></div></div>
                 <div class="example-block"><h3>Fórmula (Semestral)</h3><div class="formula-display">$$ i = \sqrt[n]{\frac{F}{P}} - 1 $$</div></div>
                  <div class="example-block"><h3>Sustitución (Semestral)</h3><div class="formula-display">i = (2,308,320 / 2,100,000)^(1/1) - 1 = 0.0992</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Semestral)</h3><img src="../img/ejemplo7-ic-tabla-semestral.png" alt="Tabla Interés Compuesto Semestral Ejemplo 7" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"></div>
                 <div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Tasa Semestral (i) = 9.92%</div>

                 <div class="example-block"><h3>Comprobación y Conclusión</h3><p>Comprobamos el interés semestral:</p><div class="formula-display">I = 2,100,000 * 0.0992 = 208,320</div><div class="formula-display">F = 2,100,000 + 208,320 = 2,308,320</div><p style="font-style: italic; font-size: 1em; color: #555;">Las tasas del 9.92% semestral y del 1.59% mensual son <strong>equivalentes</strong> (mismo rendimiento, mismo plazo), pero <strong>no proporcionales</strong> (1.59% * 6 ≈ 9.54% ≠ 9.92%).</p></div>
                 <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">Apreciemos que si se aplica Is, se tiene que I= 50 * 3 = 150, y F = 650, lo cual implica que I ya no es proporcional al tiempo</p></div>
            </section>
             <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 8: Cálculo de Tasa Equivalente (Semanal vs Anual)</h2>
                  <div class="example-block">
                     <h3>Planteamiento</h3>
                     <p>Un obrero pide a su hermano, estudiante de Administracion, que determine la tasa de interes semanal que le cobra su banco, por un prestamo de nomina de $5,330 solicitado el dia de hoy, si debera pagar $7,860.86 dentro de un año. Calcule tambien la tasa anual.</p>
                 </div>

                 <h4>Opción a) Tasa Semanal</h4>
                 <div class="example-block">
                     <h3>Datos (Semanal)</h3>
                     <div class="formula-display">n = 1 año = 52 semanas</div>
                     <div class="variable-grid">
                         <span><strong>P =</strong> 5,330</span>
                         <span><strong>F =</strong> 7,860.86</span>
                         <span><strong>n =</strong> 52 semanas</span>
                         <span><strong>i =</strong> ? (% semanal)</span>
                     </div>
                 </div>
                  <div class="example-block">
                     <h3>Solución (Semanal)</h3>
                     <div class="formula-display">$$ i = \sqrt[n]{\frac{F}{P}} - 1 $$</div>
                     <div class="formula-display">i = (7,860.86 / 5,330)^(1/52) - 1</div>
                     <div class="formula-display">i = (1.4748...)^(1/52) - 1 ≈ 0.0075</div>
                 </div>
                 <div class="example-block">
                     <h3>Comprobación (Semanal)</h3>
                     <div class="formula-display">F = P (1 + i)^n = 5330 * (1 + 0.0075)^52 ≈ 7,860.86</div>
                 </div>
                  <div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Tasa Semanal (i) ≈ 0.75%</div>


                 <h4 style="margin-top: 3rem;">Opción b) Tasa Anual</h4>
                  <div class="example-block">
                     <h3>Datos (Anual)</h3>
                     <div class="variable-grid">
                         <span><strong>P =</strong> 5,330</span>
                         <span><strong>F =</strong> 7,860.86</span>
                         <span><strong>n =</strong> 1 año</span>
                         <span><strong>i =</strong> ? (% anual)</span>
                     </div>
                 </div>
                 <div class="example-block">
                     <h3>Solución (Anual)</h3>
                     <div class="formula-display">$$ i = \sqrt[n]{\frac{F}{P}} - 1 $$</div>
                     <div class="formula-display">i = (7,860.86 / 5,330)^(1/1) - 1</div>
                     <div class="formula-display">i = 1.4748... - 1 ≈ 0.4748</div>
                 </div>
                 <div class="example-block">
                     <h3>Comprobación (Anual)</h3>
                      <div class="formula-display">F = P (1 + i)^n = 5330 * (1 + 0.4748)^1 ≈ 7,860.86</div>
                 </div>
                 <div class="result-box" style="background-color: #e3f2fd; border-color: #bbdefb; border-left-color: #42a5f5; color:#1e88e5;">Tasa Anual (i) ≈ 47.48%</div>

                 <div class="example-block">
                    <h3>Conclusión</h3>
                    <p style="font-style: italic; font-size: 1em; color: #555;">
                       Las tasas del 0.75% semanal y del 47.48% anual son <strong>equivalentes</strong>, pero no <strong>proporcionales</strong> (0.75% * 52 = 39% ≠ 47.48%).
                    </p>
                    <p>Otra forma de calcular la tasa anual es calcular la razón del Interés al Principal:</p>
                    <div class="formula-display">I = F - P = 7,860.86 - 5,330 = 2,530.86</div>
                    <div class="formula-display">i = I / P = 2,530.86 / 5,330 ≈ 0.4748</div>
                 </div>
            </section>
                <div class="section-divider"></div>

            <section>
            
            <h2>Ejemplo 9: Tasa equivalente</h2>

             <div class="example-block"><h3>Planteamiento</h3><p>Un arrendador previene el pago del impuesto predial del próximo año, invirtiendo $3,500 correspondiente a la renta de enero durante todo el año, en una institución que le reditúa el 33.10% trimestral, determine cuánto tendrá al término, y la tasa equivalente anual resultante.</p><p>Al ser incorrecto el convertir la tasa proporcionalmente, se procede a convertir el plazo a trimestres.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 3,500</span><span><strong>\(i\) =</strong> 33.1% trimestral</span><span><strong>\(n\) =</strong> 1 año = 4 trimestres</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(i_q\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n \)</div><div class="formula-display">\( F = 3{,}500(1 + 0.331)^4 = 3{,}500(3.138\ldots) = 10{,}984.50 \)</div><div class="formula-display">\( I = F - P = 10{,}984.50 - 3{,}500 = 7{,}484.50 \text{ en un año} \)</div><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{7{,}484.50}{3{,}500} = 2.1384\ldots \text{ o } 213.84\% \text{ anual} \)</div></div>
             <div class="example-block"><p>Interpretemos el resultado con una tabla por periodo:</p><img src="../img/ejemplo_9IC.png" alt="Tabla Tasa i=33.10% trimestral, plazo en trimestres" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"></div>
             <div class="result-box"><p>Se concluye que la tasa del 33.10% trimestral equivale a una tasa del 213.84% anual.</p></div>
            
            </section>
            <div class="section-divider"></div>
            <section>
                
            </section>
            <h2>Ejemplo 10: Tasa equivalente independiente al Principal</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Un agricultor solicita un préstamo a un plazo de 1 semestre. Si la tasa acordada es del 8% trimestral, determine cuánto pagará al término, y la tasa equivalente resultante. Considere un préstamo por a) $7,000, y otro por b) $850.</p></div>
             <div class="example-block"><h3>a) Préstamo por $7,000</h3></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 7,000</span><span><strong>\(i\) =</strong> 8% trimestral</span><span><strong>\(n\) =</strong> 1 semestre = 2 trimestres</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(i_q\) =</strong> ? semestral</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n = 7{,}000(1 + 0.08)^2 = 7{,}000(1.1664) = 8{,}164.80 \)</div><div class="formula-display">\( I = F - P = 8{,}164.80 - 7{,}000 = 1{,}164.80 \text{ en un semestre} \)</div><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{1{,}164.80}{7{,}000} = 0.1664 \text{ o } 16.64\% \text{ semestral} \)</div></div>
             <div class="example-block"><h3>b) Préstamo por $850</h3></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 850</span><span><strong>\(i\) =</strong> 8% trimestral</span><span><strong>\(n\) =</strong> 1 semestre = 2 trimestres</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(i_q\) =</strong> ? semestral</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n = 850(1 + 0.08)^2 = 850(1.1664) = 991.44 \)</div><div class="formula-display">\( I = F - P = 991.44 - 850 = 141.44 \text{ en un semestre} \)</div><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{141.44}{850} = 0.1664 \text{ o } 16.64\% \text{ semestral} \)</div></div>
             <div class="result-box"><p>Se concluye que la tasa del 8% trimestral equivale al 16.64% semestral, no importando el <em>Principal</em> que se emplee.</p></div>
                <section>
            <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 11: Tasa equivalente independiente al plazo</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>En el problema anterior, suponga que el agricultor pide prestados $15,000 a un plazo de 1 año. Si la tasa pactada es del 8% trimestral, determine cuánto deberá pagar al término; considere el mismo préstamo con una tasa del 16.64% semestral.</p></div>
                 <div class="example-block"><h3>Datos trimestrales</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 15,000</span><span><strong>\(i\) =</strong> 8% trimestral</span><span><strong>\(n\) =</strong> 1 año = 4 trimestres</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="result-box"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n \)</div><div class="formula-display">\( F = 15{,}000(1 + 0.08)^4 = 15{,}000(1.3604\ldots) = 20{,}407.33 \)</div></div>
                 <div class="example-block"><h3>Datos semestrales</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 15,000</span><span><strong>\(i\) =</strong> 16.64% semestral</span><span><strong>\(n\) =</strong> 1 año = 2 semestres</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="result-box"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n \)</div><div class="formula-display">\( F = 15{,}000(1 + 0.1664)^2 = 15{,}000(1.3604\ldots) = 20{,}407.33 \)</div></div>
                 <div class="example-block"><p>Al obtener el mismo resultado se aprecia que dos tasas equivalentes lo serán en cualquier plazo en que coincidan.</p></div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 12: Familia de tasas equivalentes</h2>  
                 <div class="example-block"><h3>Planteamiento</h3><p>Retomemos el ejemplo 1, en donde una persona invierte $500 durante 3 meses, a una tasa de interés del 10% mensual. Ahora nos interesa conocer cuánto tendrá al término de un año, para a su vez, calcular la tasa anual equivalente generada.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 500</span><span><strong>\(i\) =</strong> 10% mensual</span><span><strong>\(n\) =</strong> 1 año = 12 meses</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(i_q\) =</strong> ? anual</span></div></div>
                 <div class="result-box"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n \)</div><div class="formula-display">\( F = 500(1 + 0.10)^{12} = 500(3.1384\ldots) = 1{,}569.21 \)</div><div class="formula-display">\( I = F - P = 1{,}569.21 - 500 = 1{,}069.21 \text{ en un año} \)</div><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{1{,}069.21}{500} = 2.1384\ldots \text{ o } 213.84\% \text{ anual} \)</div><p>Lo cual confirma que las tasas que son equivalentes en un periodo dado lo son durante todo el tiempo en que coincidan.</p></div>
                 <div class="example-block"><h3>Conversión de tasas a su equivalente</h2><p>La obtención de una tasa mediante la razón del interés al <em>Principal</em> es didáctica, pero laboriosa. La forma práctica de convertir una tasa a su equivalente se obtiene mediante la siguiente:</p></div>
                 <div class="example-block"><h3>Fórmula</h3><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 \qquad IC6 \)</div></div>
                 <div class="example-block"><h3>Variables</h3><p>\( i_q \) = Tasa capitalizable equivalente a conocer</p><p>\( m_q \) = Frecuencia de capitalizaciones de la tasa a conocer <em>en un año</em></p><p>\( i \) = Tasa capitalizable a convertir</p><p>\( m \) = Frecuencia de capitalizaciones de la tasa conocida <em>en un año</em></p></div>
                 <div class="example-block"><h3>Frecuencias de capitalización más comunes:</h3><p>Anual: \(m = 1\) <em>capitalización</em> anual en 1 <em>año</em></p><p>Semestral: \(m = 2\) capitalizaciones semestrales en 1 <em>año</em></p><p>Cuatrimestral: \(m = 3\) capitalizaciones cuatrimestrales en 1 <em>año</em></p><p>Trimestral: \(m = 4\) capitalizaciones trimestrales en 1 <em>año</em></p><p>Bimestral: \(m = 6\) capitalizaciones bimestrales en 1 <em>año</em></p><p>Mensual: \(m = 12\) capitalizaciones mensuales en 1 <em>año</em></p><p>Quincenal: \(m = 24\) capitalizaciones quincenales en 1 <em>año</em></p><p>Semanal: \(m = 52\) capitalizaciones semanales en 1 <em>año</em></p><p>Diaria: \(m = 360\) capitalizaciones diarias en 1 <em>año</em></p></div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 13: Conversión de tasas a su equivalente</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Obtenga la tasa semestral equivalente a una tasa del 3.2% mensual. Compruebe con un Principal cualquiera.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i_q\) =</strong> ? semestral</span><span><strong>\(m_q\) =</strong> 2 cap.</span><span><strong>\(i\) =</strong> 3.2% mensual</span><span><strong>\(m\) =</strong> 12 cap.</span></div></div>
                 <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 \)</div><div class="formula-display">\( i_q = (1 + 0.032)^{12/2} - 1 = (1.032)^6 - 1 \)</div><div class="formula-display">\( i_q = 1.2080\ldots - 1 = 0.2080\ldots = 20.80\% \text{ semestral} \)</div></div><p>Observe que el exponente 6, indica 6 capitalizaciones mensuales en un semestre; sin embargo, para evitar errores con exponentes que no guardan una relación entera, como trimestral a cuatrimestral o viceversa, se adopta la frecuencia de capitalizaciones <em>en un año</em>.</p><p>Comprobando al obtener \(F\) a partir de \(P = 2{,}925\) con ambas tasas, <em>en un semestre</em>.</p><p>Mensualmente: \( F = P(1+i)^n = 2{,}925(1 + 0.032)^6 = 2{,}925(1.208\ldots) = 3{,}533.49 \)</p><p>Semestralmente: \( F = P(1+i)^n = 2{,}925(1 + 0.208\ldots)^1 = 2{,}925(1.208\ldots) = 3{,}533.49 \)</p></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
             <h2>Ejemplo 14: Conversión de tasas a su equivalente</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Obtenga la tasa cuatrimestral equivalente a una tasa del 18.4% trimestral.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i_q\) =</strong> ? cuatrimestral</span><span><strong>\(m_q\) =</strong> 3 cap.</span><span><strong>\(i\) =</strong> 18.4% trimestral</span><span><strong>\(m\) =</strong> 4 cap.</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 \)</div><div class="formula-display">\( i_q = (1 + 0.184)^{4/3} - 1 = 1.2525\ldots - 1 \)</div><div class="result-box"><div class="formula-display">\( i_q = 0.25257\ldots \text{ o } 25.26\% \text{ cuatrimestral} \)</div></div><p>Comprobación: Obtenga \(P\) a partir de \(F = 8{,}950\) con ambas tasas, <em>en un año</em>.</p><p>Trimestral:</p><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} = \dfrac{8{,}950}{(1+0.184)^4} = \dfrac{8{,}950}{(1.184)^4} = \dfrac{8{,}950}{1.965\ldots} = 4{,}554.24 \)</div><p>Cuatrimestral:</p><div class="formula-display">\( P = \dfrac{F}{(1+0.2525\ldots)^3} = \dfrac{8{,}950}{(1.2525\ldots)^3} = \dfrac{8{,}950}{1.965\ldots} = 4{,}554.24 \)</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 15: Conversión de tasas a su equivalente</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Obtenga la tasa semanal equivalente a una tasa del 2.5% quincenal.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i_q\) =</strong> ? semanal</span><span><strong>\(m_q\) =</strong> 52 cap.</span><span><strong>\(i\) =</strong> 2.5% quincenal</span><span><strong>\(m\) =</strong> 24 cap.</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 \)</div><div class="formula-display">\( i_q = (1 + 0.025)^{24/52} - 1 = 1.0114\ldots - 1 \)</div><div class="result-box"><div class="formula-display">\( i_q = 0.0114\ldots \text{ o } 1.15\% \text{ semanal} \)</div></div><p>Compruebe con \(P = 9{,}250\), \(F = ?\); con \(n = 2\) años.</p><p>Quincenalmente: \(n = 2\) años \(= 48\) quincenas</p><div class="formula-display">\( F = P(1+i)^n = 9{,}250(1 + 0.025)^{48} = 30{,}261.28 \)</div><p>Semanalmente: \(n = 2\) años \(= 104\) semanas</p><div class="formula-display">\( F = P(1+i)^n = 9{,}250(1 + 0.0114\ldots)^{104} = 30{,}261.28 \)</div></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
            <h2>Ejemplo 16: Tasa de \(Is\) equivalente a \(Ic\)</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Un comerciante desea saber qué tasa de \(Is\) deberá cobrar por un préstamo de $5,000 a un año de plazo, si desea obtener un rendimiento del 5.1% trimestral. Determine si existe equivalencia a un plazo de 2 años.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 5,000</span><span><strong>\(i\) =</strong> 5.1% trimestral</span><span><strong>\(n\) =</strong> 1 año = 4 trimestres</span><span><strong>\(i_s\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_s = \dfrac{(1+i)^n - 1}{n} = \dfrac{(1 + 0.051)^4 - 1}{4} = 0.0550\ldots \text{ o } 5.50\% \text{ trimestral} \)</div></div><p>Comprobación con \(Is\): \( F = P(1 + n\,i_s) = 5{,}000(1 + 4 \times 0.055\ldots) = 6{,}100.72 \)</p><p>con \(Ic\): \( F = P(1+i)^n = 5{,}000(1 + 0.051)^4 = 6{,}100.72 \)</p><p>Ahora veamos qué ocurre en un plazo mayor, de 2 años u 8 trimestres.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 5,000</span><span><strong>\(i\) =</strong> 5.1% trimestral</span><span><strong>\(n\) =</strong> 2 años = 8 trimestres</span><span><strong>\(i_s\) =</strong> 5.50...% trimestral</span><span><strong>\(F\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Solución con \(Is\):</h3><div class="result-box"><div class="formula-display">\( F = P(1 + n\,i_s) = 5{,}000(1 + 8 \times 0.055\ldots) = 7{,}201.43 \)</div></div><div class="formula-display">con \(Ic\): \( F = P(1+i)^n = 5{,}000(1 + 0.051)^8 = 7{,}443.75 \)</div><p>Se concluye que las tasas de \(Is\) e \(Ic\), sólo son equivalentes en el plazo preestablecido.</p></div>
             <div class="example-block"><h3>Tasa de \(Ic\) equivalente a \(Is\)</h3><p>Fórmula:</p><div class="formula-display">\( i = \sqrt[n]{1 + n\,i_s} - 1 \qquad IC8 \)</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 17: Tasa de \(Ic\) equivalente a \(Is\)</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Un empresario solicitó un préstamo por $6,400 a una tasa a \(Is\) del 9% semestral. Si el préstamo duró 2 años, determine la tasa de \(Ic\) equivalente que le cobraron. Compruebe si las tasas son equivalentes a un plazo de 1 año.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 6,400</span><span><strong>\(i\) =</strong> ? semestral</span><span><strong>\(n\) =</strong> 2 años = 4 semestres</span><span><strong>\(i_s\) =</strong> 9% semestral</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( i = \sqrt[n]{1 + n\,i_s} - 1 \)</div><div class="result-box"><div class="formula-display">\( i = \sqrt[4]{1 + 4 \times 0.09} - 1 = 0.0799\ldots \text{ o } 7.99\% \text{ semestral} \)</div></div><p>Comprobación con \(Is\): \( F = P(1 + n\,i_s) = 6{,}400(1 + 4 \times 0.09) = 8{,}704 \)</p><p>con \(Ic\): \( F = P(1+i)^n = 6{,}400(1 + 0.0799\ldots)^4 = 8{,}704 \)</p><p>Ahora veamos qué ocurre en un plazo menor, de 1 año o 2 semestres.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 6,400</span><span><strong>\(i\) =</strong> 7.99...% semestral</span><span><strong>\(n\) =</strong> 1 año = 2 semestres</span><span><strong>\(i_s\) =</strong> 9% semestral</span><span><strong>\(F\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Solución con \(Is\):</h3><div class="formula-display">\( F = P(1 + n\,i_s) = 6{,}400(1 + 2 \times 0.09) = 7{,}552 \)</div><div class="result-box"><div class="formula-display">con \(Ic\): \( F = P(1+i)^n = 6{,}400(1 + 0.0799\ldots)^2 = 7{,}463.62 \)</div></div><p>Se reitera que las tasas de \(Is\) e \(Ic\), sólo son equivalentes en el plazo previamente establecido.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
             <h2>18 Conversión de tasa capitalizable a anual <em>prop.</em></h2>
             <div class="example-block"><h3>Ejemplo 18</h3><p>Convierta la tasa del 0.75% semanal a anual <em>prop.</em> semanal.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> 0.75% semanal</span><span><strong>\(m\) =</strong> 52 cap.</span><span><strong>\(j\) =</strong> ? anual prop. semanal</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( j = i \cdot m = 0.75\% \times 52 = 39\% \text{ anual prop. semanal} \)</div></div><p>A partir de una tasa capitalizable sólo puede obtenerse una tasa anual <em>prop.</em> con la misma periodicidad (semanal).</p></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
             <h2>19 Conversión de tasa anual <em>prop.</em> a capitalizable</h2>
             <div class="example-block"><h3>Ejemplo 19</h3><p>Convierta la tasa del 60% anual <em>prop.</em> mensual a cap. mensual.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> ? mensual</span><span><strong>\(m\) =</strong> 12 cap.</span><span><strong>\(j\) =</strong> 60% anual prop. mensual</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i = \dfrac{j}{m} = \dfrac{60\%}{12} = 5\% \text{ mensual} \)</div></div><p>La conversión de una tasa anual <em>prop.</em> sólo puede generar una tasa capitalizable con la misma periodicidad, es este caso <em>mensual</em>.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 20: Conversión de tasa capitalizable a su equivalente anual</h2>
             <div class="example-block"><p>Convierta la tasa del 5% bimestral a su equivalente anual.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> 5% bimestral</span><span><strong>\(m\) =</strong> 6 cap.</span><span><strong>\(i_q\) =</strong> ? anual</span><span><strong>\(m_q\) =</strong> 1 cap.</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 = (1 + 0.05)^{6/1} - 1 = 0.34009\ldots \text{ o } 34.01\% \text{ anual} \)</div></div><p>Se hace notar que la tasa obtenida del 34.01% anual, nada tiene qué ver con la tasa del \(j = 30\%\) anual proporcional bimestral (\(5\% \times 6\)).</p></div>
             <h3>Conversión de tasa anual <em>prop.</em> a su equivalente</h3>
             <div class="example-block"><p>El convertir una tasa anual <em>prop.</em> a otra, implica cambiar la periodicidad a una tasa en \(Ic\), por lo que se puede realizarlo de dos formas. Veamos la primera.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
             <h2>Ejemplo 21: Convierta la tasa del 45% anual <em>prop.</em> trimestral, a <em>prop.</em> quincenal</h2>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(j\) =</strong> 45% anual prop. trimestral</span><span><strong>\(m\) =</strong> 4 cap.</span><span><strong>\(j_q\) =</strong> ? prop. quincenal</span><span><strong>\(m_q\) =</strong> 24 cap.</span></div></div>
             <div class="example-block"><h3>Solución — Forma 1:</h3><div class="result-box"><div class="formula-display">\( j_q = \left(\sqrt[m_q]{\left(1 + \dfrac{j}{m}\right)^m} - 1\right) m_q \)</div></div><div class="formula-display">\( j_q = \left(\sqrt[24]{\left(1 + \dfrac{0.45}{4}\right)^4} - 1\right) \times 24 = \left(\sqrt[24]{1.5317\ldots} - 1\right) \times 24 \)</div><div class="formula-display">\( j_q = 0.0179\ldots \times 24 = 43.025\% \text{ anual prop. quincenal} \)</div><p>Otra forma es:</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(j\) =</strong> 45% anual prop. trimestral</span><span><strong>\(m\) =</strong> 4 cap.</span><span><strong>\(i\) =</strong> ?</span><span><strong>\(i_q\) =</strong> ? quincenal</span><span><strong>\(m_q\) =</strong> 24 cap.</span></div></div>
             <div class="example-block"><h3>Solución — Forma 2:</h3><div class="result-box"><div class="formula-display">\( i = \dfrac{j}{m} = \dfrac{45\%}{4} = 11.25\% \text{ trimestral} \)</div></div><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 = (1 + 0.1125)^{4/24} - 1 = 0.0179\ldots \text{ quincenal} \)</div><div class="formula-display">\( j = i \cdot m = 0.0179\ldots \times 24 = 43.025\% \text{ anual prop. quincenal} \)</div><p>Este último caso es de los más inusuales, debido a que las tasas que operan en \(Ic\) son capitalizables y no necesariamente anuales <em>prop.</em> Sin embargo, son de uso común en la literatura financiera, motivo por el cual no pudo dejar de ilustrarse.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
             <h2>Ejemplo 22 Tasa anual</h2>
             <div class="example-block"><p>Obtenga la tasa anual y la tasa anual <em>prop.</em> semanal equivalentes a una del 10% semanal.</p></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> 10% semanal</span><span><strong>\(m\) =</strong> 52 cap.</span><span><strong>\(j\) =</strong> ?% anual prop. semanal</span><span><strong>\(i_q\) =</strong> ? anual</span></div></div>
             <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( j = i \cdot m = 10\% \times 52 = 520\% \text{ anual prop. semanal} \)</div><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 \)</div><div class="formula-display">\( i_q = (1.10)^{52/1} - 1 = 141.04\ldots \text{ o } 14{,}104.29\% \text{ anual} \)</div></div><p>Sobran las palabras para resaltar que la tasa anual <em>prop.</em> disfraza el verdadero rendimiento que genera una tasa anualizada a \(Ic\). Esta situación prevalece en la teoría y en la práctica, misma que favorece a los prestamistas, o vendedores que hacen del crédito una forma de generar ganancias extraordinarias.</p><p>Como conclusión, cada vez que le ofrezcan un rendimiento anual, pero que se capitalizará con periodos menores, es de dudar que se trate de la verdadera tasa que se terminará pagando. Ahora ya tiene en sus manos el dominar el \(Ic\) y sus múltiples aplicaciones en la vida diaria.</p></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
             <h2>Ejemplo 23: Ecuaciones de equivalencia a valor Futuro</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>El día de hoy un tornero depositó en el banco $3,000. Si después de cuatro meses deposita $4,000 más, cuánto tendrá al cabo de siete meses, si el banco pagó una tasa del 2% mensual.</p><p>Se capitaliza el primer depósito, hasta el final del mes 4, donde se encuentra el siguiente flujo, el cual al ser un nuevo depósito se deberá sumar al resultado por estar en el mismo momento del tiempo; el resultado se capitalizará hasta el término del plazo (mes 7).</p></div>
             <div class="example-block"><img src="../img/ejemplo_23IC.png" alt="Tabla Tasa i=2% mensual, plazo en meses" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divder"></div>

            <section>
            <h2>Ejemplo 24: Ecuaciones de equivalencia a valor Presente</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Para costear su graduación, una persona decide depositar desde el día de hoy una cantidad que le garantice realizar dos retiros de $10,500 cada uno, a un plazo de 2 y 4 bimestres, respectivamente. Si la tasa que le pagan es del 3% bimestral, determine la cantidad que requiere depositar.</p><p>Siguiendo los pasos del ejemplo anterior, considerando el depósito inicial como \(P\):</p></div>
             <div class="example-block"><img src="../img/ejemplo_24IC.png" alt="Tabla simbólica Tasa i=3% bimestral" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><p>El resultado de la tabla se iguala a cero, ya que el saldo de la cuenta de inversión se cancela al realizar el 2do. retiro; se procede a despejar a \(P\):</p></div>
             <div class="example-block"><h3>Saldo final tabla:</h3><div class="result-box"><div class="formula-display">\( (P(1.03)^2 - 10{,}500)(1.03)^2 - 10{,}500 = 0 \)</div><div class="formula-display">Multiplicando los paréntesis: \( P(1.03)^2(1.03)^2 - 10{,}500(1.03)^2 - 10{,}500 = 0 \)</div><div class="formula-display">Por ley de exponentes: \( P(1.03)^{2+2} - 10{,}500(1.03)^2 - 10{,}500 = 0 \)</div><div class="formula-display">Simplificando: \( P(1.03)^4 - 10{,}500(1.0609) - 10{,}500 = 0 \)</div><div class="formula-display">\( 1.1255\ldots P - 11{,}139.45 - 10{,}500 = 0 \)</div><div class="formula-display">\( 1.1255\ldots P - 21{,}639.45 = 0 \)</div><div class="formula-display">Despejando \(P\): \( 1.1255\ldots P = 21{,}639.45 \)</div><div class="formula-display">\( P = \dfrac{21{,}639.45}{1.1255\ldots} = 19{,}226.37 \)</div></div></div>
             <div class="example-block"><p>Comprobando con una tabla de operaciones:</p><img src="../img/tabla_24IC.png" alt="Tabla comprobación Tasa i=3% bimestral" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><p>Otra forma de visualizar lo anterior, requiere interpretar el paso de la simplificación:</p><div class="formula-display">\( P(1.03)^4 - 10{,}500(1.03)^2 - 10{,}500 = 0 \)</div><p>Agrupando constantes y variables: \( P(1.03)^4 = 10{,}500(1.03)^2 + 10{,}500 \)</p><p>Preste atención a este planteamiento, el cual será retomado a continuación.</p></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
            <h2>Ejemplo 25: Ecuaciones de equivalencia a valor Presente (ofertas)</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>El dueño de una casa estima que tiene un precio de $800,000. Para venderla, recibe las siguientes ofertas: A) Un pago único dentro de 2 meses por $770,000; B) Un pago el día de hoy por $400,000, y dos pagos de $190,000 cada uno, a 6 y 9 meses respectivamente. Si la tasa de interés que rige en el mercado es del 10%, determine cuál es la mejor oferta.</p><p>El valor de la casa de $800,000, es sólo un referente para el vendedor, y dependerá de su necesidad de liquidez el aceptar un valor menor, o decide esperar una mejor oferta.</p></div>
            <div class="example-block"><h3>Oferta A) — \(FF\) día de inicio. Con cambio de tasa</h3></div>
            <div class="example-block"><img src="../img/ejemplo_25IC.png" alt="Diagrama Oferta A con cambio de tasa" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> \(P_1\)</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 770,000</span></div><p>Cambio de tasa: \( i_q = (1 + 0.10)^{1/12} - 1 = 0.0079\ldots \text{ mensual} \)</p></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_2 = \dfrac{770{,}000}{(1.0079\ldots)^2} = 757{,}865.16 \)</div><div class="formula-display">Oferta \(A = P_1 = P_2\)</div><div class="formula-display">Oferta \(A = 757{,}865.16\)</div></div></div>
            <div class="example-block"><h3>Oferta A) — \(FF\) día de inicio. Con conversión de tiempo</h3></div>
            <div class="example-block"><img src="../img/ejemplo_25-2IC.png" alt="Diagrama Oferta A con conversión de tiempo" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> \(P_1\)</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 770,000</span></div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_2 = \dfrac{770{,}000}{(1.10)^{2/12}} = 757{,}865.16 \)</div><div class="formula-display">Oferta \(A = P_1 = P_2\)</div><div class="formula-display">Oferta \(A = 757{,}865.16\)</div></div><p>El resultado de la Oferta A) es como es de esperarse, el mismo.</p></div>
            <div class="example-block"><h3>Oferta B) — \(FF\) inicio del plazo. Con conversión de tasa</h3></div>
            <div class="example-block"><img src="../img/ejemplo_25-3IC.png" alt="Diagrama Oferta B" style="width:100%; max-width:400px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> \(P_1\)</span><span><strong>\(P_2\) =</strong> 400,000</span><span><strong>\(P_3\) =</strong> ?</span><span><strong>\(P_4\) =</strong> ?</span><span><strong>\(F_3\) =</strong> 190,000</span><span><strong>\(F_4\) =</strong> 190,000</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_1 = P_1 \)</div><div class="formula-display">\( P_2 = 400{,}000 \)</div><div class="formula-display">\( P_3 = \dfrac{190{,}000}{(1.0079\ldots)^6} = 181{,}157.89 \)</div><div class="formula-display">\( P_4 = \dfrac{190{,}000}{(1.0079\ldots)^9} = 176{,}892.36 \)</div><div class="formula-display">Oferta \(B = \sum\) Pagos \(\Rightarrow P_1 = P_2 + P_3 + P_4\)</div><div class="formula-display">\( P_1 = 400{,}000 + 181{,}157.89 + 176{,}892.36 \)</div><div class="formula-display">Oferta \(B = 758{,}050.25\)</div></div></div>
            <div class="example-block"><p>Analizando los resultados obtenidos, se concluye que para <em>vender</em> le conviene la Oferta B), por ser la de mayor cuantía. La decisión de elegir \(FF\) al inicio del plazo es porque las dos ofertas automáticamente quedan en una misma fecha, y se pueden comparar.</p><p>Al ser el valor de la casa de $800,000, las ofertas son sólo un referente para el vendedor, y dependerá de su necesidad de liquidez el aceptar un valor menor, o decide esperar una mejor oferta.</p><p>Para comprobar la equivalencia de los resultados obtenidos, podemos suponer que los importes de las ofertas el día de hoy, son deudas que generarán intereses hasta el momento en que paulatinamente se vayan pagando.</p><img src="../img/tabla_25IC.png" alt="Tabla comprobación Oferta A" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"><img src="../img/tabla_25-1IC.png" alt="Tabla comprobación Oferta B" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><p>Es normal encontrar diferencias en centavos. Esto se debe a que se redondearon las cifras parciales a pesos y centavos. Es relativo y se da por bueno.</p><p>Si se elige otra \(FF\), por ejemplo al término del plazo, la oferta A) quedará a final del mes 2, y la oferta B) a final del mes 9. Para poder compararlas se deberán capitalizar o descontar los siete meses que difieren una respecto de la otra.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 26: Ecuaciones de equivalencia operaciones en tiempo pasado</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Determine cuánto podrá retirar el día de hoy, un ama de casa que logró ahorrar $5,000 y $3,500 hace 8 y 3 meses, respectivamente. Considere que le pagaron una tasa de interés del 0.85% mensual. Realice una tabla de operaciones.</p><p>Al encontrarse la incógnita al término del plazo, elegiremos éste como la \(FF\).</p></div>
            <div class="example-block"><img src="../img/tabla_26IC.png" alt="Tabla Tasa i=0.85% mensual, plazo en meses" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><p>Realicemos ahora el procedimiento mediante un diagrama:</p></div>
            <div class="example-block"><img src="../img/ejemplo_26IC.png" alt="Diagrama Ejemplo 26" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 5,000</span><span><strong>\(P_2\) =</strong> 3,500</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> ?</span><span><strong>\(F_3\) =</strong> \(F_3\)</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1+i)^n \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( F_1 = 5{,}000(1.0085)^8 = 5{,}350.29 \)</div><div class="formula-display">\( F_2 = 3{,}500(1.0085)^3 = 3{,}590.01 \)</div><div class="formula-display">\( \sum \text{Ahorros} = \sum \text{Retiros} \quad \Rightarrow \quad F_3 = F_1 + F_2 \)</div><div class="formula-display">\( F_3 = 5{,}350.29 + 3{,}590.01 = 8{,}940.30 \)</div></div></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 27: Plazo equivalente</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un comerciante debe $1,000 a 1 mes de plazo y $12,000 a 1 año. Acuerda con su acreedor en pagarle $13,000 ($12,000 + $1,000) con una tasa de interés del 3.28% mensual. Determine la fecha en que deberá liquidar el adeudo.</p><p>Considerando la \(FF\) al inicio del plazo.</p></div>
            <div class="example-block"><img src="../img/ejemplo_27IC.png" alt="Diagrama Ejemplo 27" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> \(P_1\)</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 1,000</span><span><strong>\(F_3\) =</strong> 12,000</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( P_2 = \dfrac{1{,}000}{(1.0328)^1} = 968.24 \)</div><div class="formula-display">\( P_3 = \dfrac{12{,}000}{(1.0328)^{12}} = 8{,}146.79 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad P_1 = P_2 + P_3 \)</div><div class="formula-display">\( P_1 = 968.24 + 8{,}146.79 = 9{,}115.03 \)</div></div>
            <div class="example-block"><p>Asumiendo el total de valores nominales $13,000, deberá pagarse en fecha futura:</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 9,115.03</span><span><strong>\(i\) =</strong> 3.28% mensual</span><span><strong>\(n\) =</strong> ? meses</span><span><strong>\(F\) =</strong> 13,000</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{F}{P}\right)}{\log(1+i)} = \dfrac{\log\!\left(\dfrac{13{,}000}{9{,}115.03}\right)}{\log(1 + 0.0328)} = \dfrac{0.1541\ldots}{0.0140\ldots} = 11.000\ldots \text{ meses} \)</div></div><p>Interpretemos el resultado mediante la siguiente tabla:</p><img src="../img/tabla_27IC.png" alt="Tabla Tasa i=3.28% mensual, plazo en meses" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><p>El resultado es aproximado, ya que el tiempo de 11 meses no es totalmente exacto. Al no haber flujo de efectivo durante el primer mes, no se generó ningún interés. Los paréntesis en cifras de los flujos de efectivo significan naturaleza contraria, y por lo tanto, se deben restar. Note que todo flujo gana intereses, no importando la naturaleza de la operación de que se trate.</p></div>
            </section>
            <div class="section-divider"></div>
            <section>
            <h2>Ejemplo 28: Plazo equivalente</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Realice el problema anterior, invirtiendo el orden de los importes de las deudas. Un comerciante debe $12,000 a 1 mes de plazo y $1,000 a 1 año. Acuerda con su acreedor en pagarle los $13,000 ($12,000 + $1,000) a una tasa de interés del 3.28% mensual. Determine la fecha en que deberá liquidar el adeudo.</p><p>Considerando la \(FF\) al inicio del plazo.</p></div>
            <div class="example-block"><img src="../img/ejemplo_28IC.png" alt="Diagrama Ejemplo 28" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> \(P_1\)</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 12,000</span><span><strong>\(F_3\) =</strong> 1,000</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_2 = \dfrac{12{,}000}{(1.0328)^1} = 11{,}618.90 \)</div><div class="formula-display">\( P_3 = \dfrac{1{,}000}{(1.0328)^{12}} = 678.90 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad P_1 = P_2 + P_3 \)</div><div class="formula-display">\( P_1 = 11{,}618.90 + 678.90 = 12{,}297.80 \)</div></div><p>Antes de resolverlo se invita al lector a intuir cuál será la nueva fecha promedio equivalente.</p><p>Asumiendo que los $13,000 deberán pagarse en fecha futura:</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 12,297.80</span><span><strong>\(i\) =</strong> 3.28% mensual</span><span><strong>\(n\) =</strong> ? meses</span><span><strong>\(F\) =</strong> 13,000</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{F}{P}\right)}{\log(1+i)} = \dfrac{\log\!\left(\dfrac{13{,}000}{12{,}297.80}\right)}{\log(1 + 0.0328)} = \dfrac{0.0241\ldots}{0.0140\ldots} = 1.7205\ldots \text{ meses} \)</div></div><p>Es decir, 1 mes y 22 días aproximadamente. Como era de esperarse, el plazo equivalente tiende a situarse en donde se encuentra la deuda de mayor cuantía.</p><p>Comprobemos cronológicamente con una tabla de operaciones.</p><p>Como el plazo resultó un mes y una fracción, para no manejar dos tasas, mensual y diaria, emplearemos el tiempo en fracciones, aprovechando el uso de la calculadora, para el manejo infinito de decimales, teniendo cuidado en la interpretación.</p><img src="../img/tabla_28IC.png" alt="Tabla Tasa i=3.28% mensual, plazo en meses" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 29: Ecuaciones de equivalencia Tasa</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un distribuidor de artículos de limpieza debe dos documentos, uno por $750 vencido hace 2 trimestres, y otro por $900 que vence dentro de 1 trimestre. Su acreedor le propone renegociar el adeudo total, dando un pago el día de hoy, por $1,666.02. Determine la tasa que le cobran y su equivalente anual.</p><p>Consideremos la \(FF\) en el día de la renegociación.</p></div>
            <div class="example-block"><img src="../img/ejemplo_29IC.png" alt="Diagrama Ejemplo 29" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 750</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> \(P_3\)</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 900</span></div></div>
            <div class="example-block"><h3>Fórmulas:</h3><div class="formula-display">\( F = P(1+i)^n \quad;\quad P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F_1 = 750(1+i)^2 \)</div><div class="formula-display">\( P_2 = \dfrac{900}{(1+i)^1} = \dfrac{900}{1+i} \)</div><div class="formula-display">\( P_3 = 1{,}666.02 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad P_3 = F_1 + P_2 \)</div><div class="formula-display">\( 1{,}666.02 = 750(1+i)^2 + \dfrac{900}{1+i} \)</div><p>El criterio de ensayo es arbitrario. Sin embargo, la pauta es ensayar valores desde el 1% al 5%, (0.01 a 0.05) ya que en la práctica son los valores más factibles.</p></div>
            <div class="example-block"><p>Ensayando con 0.01: \( \quad 750(1 + 0.01)^2 + \dfrac{900}{1+0.01} = 1{,}656.16\ldots \)</p><p>Al observar que el resultado es menor al valor objetivo, se ensayará un valor mayor.</p><p>con 0.02: \( \quad 750(1 + 0.02)^2 + \dfrac{900}{1.02} = 1{,}662.65\ldots \)</p><p>con 0.03: \( \quad 750(1 + 0.03)^2 + \dfrac{900}{1.03} = 1{,}669.46\ldots \)</p><p>El resultado es mayor al objetivo; se ensayará un valor intermedio entre 0.02 y 0.03.</p><p>con 0.025: \( \quad 750(1 + 0.025)^2 + \dfrac{900}{1.025} = 1{,}666.017\ldots \)</p><p>El resultado de 0.0250 o 2.5% trimestral se da por bueno. Comprobando:</p><img src="../img/tabla_29IC.png" alt="Tabla Tasa i=2.5% trimestral, plazo en trimestres" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Obteniendo la tasa anual que pide el problema:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i_q\) =</strong> ? anual</span><span><strong>\(m_q\) =</strong> 1 cap.</span><span><strong>\(i\) =</strong> 2.5% trimestral</span><span><strong>\(m\) =</strong> 4 cap.</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 = (1 + 0.025)^{4/1} - 1 = 1.1038\ldots - 1 \)</div><div class="formula-display">\( i_q = 0.1038\ldots \text{ o } 10.38\% \text{ anual} \)</div></div></div>
            </section>
            <div class="section-divider"></div>
            
            <section>
            <h2>Ejemplo 30: Ecuaciones de equivalencia Tasa</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Una distribuidora de artículos para el hogar ofrece un refrigerador en $8,500 de contado; a crédito lo ofrece con dos pagos de $4,300 y $5,300 a 3 y 5 quincenas, respectivamente. Determine la tasa de interés que cobra la distribuidora, así como su equivalente anual.</p><p>Situando la \(FF\) en el término del plazo, tenemos:</p></div>
            <div class="example-block"><img src="../img/ejemplo_30IC.png" alt="Diagrama Ejemplo 30" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 8,500</span><span><strong>\(P_2\) =</strong> 4,300</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> ?</span><span><strong>\(F_3\) =</strong> 5,300</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1+i)^n \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F_1 = 8{,}500(1+i)^5 \)</div><div class="formula-display">\( F_2 = 4{,}300(1+i)^2 \)</div><div class="formula-display">\( \sum \text{Ahorros} = \sum \text{Retiros} \quad \Rightarrow \quad F_3 = F_1 + F_2 \)</div><p>Sustituyendo y agrupando:</p><div class="formula-display">\( 8{,}500(1+i)^5 = 4{,}300(1+i)^2 + 5{,}300 \)</div><div class="formula-display">\( 8{,}500(1+i)^5 - 4{,}300(1+i)^2 = 5{,}300 \)</div></div>
            <div class="example-block"><p>Haciendo una tabla de ensayo de valores, considerando 5,300 como el objetivo:</p><img src="../img/tabla_30IC.png" alt="Tabla de ensayo de valores de i" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"><p>Aunque el resultado era evidente que es 0.0302, se realizaron dos últimos ensayos para cerciorarse de que un diezmilésimo arriba y abajo, no resultara una diferencia menor.</p><p>No importa si el resultado es menor o mayor al objetivo, sino el que arroje la menor diferencia.</p><p>Comprobando e interpretando:</p><img src="../img/tabla_30-1IC.png" alt="Tabla Tasa i=3.02% quincenal, plazo en quincenas" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Obteniendo la tasa anual que pide el problema:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i_q\) =</strong> ? anual</span><span><strong>\(m_q\) =</strong> 1 cap.</span><span><strong>\(i\) =</strong> 3.02% quincenal</span><span><strong>\(m\) =</strong> 24 cap.</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_q = (1+i)^{m/m_q} - 1 = (1 + 0.0302)^{24/1} - 1 = 2.042\ldots - 1 \)</div><div class="formula-display">\( i_q = 1.4228\ldots \text{ o } 104.23\% \text{ anual} \)</div></div><p>Es común en la práctica encontrar tasas de interés mayores al 100%. De ahí la importancia de dedicarle un poco de tiempo a las supuestas ofertas del mercado.</p></div>
            </section>
            <div class="section-divider"></div>

            <div class="section-divider"></div>
            <section>
            <h2>Ejemplo 31: Ecuaciones de equivalencia variación de Tasa</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un pasante de arquitectura recibe el día de hoy $10,608.05 por una inversión que efectuó hace 4 años. Durante año y medio, el banco le pagó el 3.1% semestral, y luego aumentó a 3.5% semestral, determine el depósito inicial.</p><p>Cuando \(P\) en una operación equivale a \(F\) de otra, se consideran operaciones relacionadas, por lo cual se utiliza el mismo número de flujo, y no existe ecuación de equivalencia; lo que es de considerar es la tasa de interés distinta.</p><p>\(FF\) al inicio del plazo convertido en semestres (4 años = 8 semestres).</p></div>
            <div class="example-block"><img src="../img/ejemplo_31IC.png" alt="Diagrama Ejemplo 31" style="width:100%; max-width:400px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> ?</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(F_1\) =</strong> 10,608.05</span><span><strong>\(F_2\) =</strong> \(P_1\)</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_1 = \dfrac{10{,}608.05}{(1 + 0.035)^5} = 8{,}931.69 \)</div><div class="formula-display">\( P_1 = F_2 = 8{,}931.69 \)</div><div class="formula-display">\( P_2 = \dfrac{8{,}931.69}{(1 + 0.031)^3} = 8{,}150 \)</div></div></div>
            <div class="example-block"><p>Comprobando con una tabla de operaciones:</p><img src="../img/tabla_31IC.png" alt="Tabla Tasa i variable semestral, plazo en semestres" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 32: Ecuaciones de equivalencia variación de Tasa</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un jefe de planeación invirtió hace 3 años $35,700 en una institución que le pagó el 4.1% cuatrimestral durante el primer año, 5.05% trimestral el siguiente año, y en el último la tasa alcanzó el 13% anual. Determine cuánto dinero tiene el día de hoy.</p><p>Se puede omitir el diagrama de tiempo-valor por estar la incógnita al término del plazo, y realizar solamente una tabla de operaciones con periodos y tasas variables.</p></div>
            <div class="example-block"><img src="../img/tabla_32IC.png" alt="Tabla Tasa i variable semestral, plazo en semestres" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 33: Ecuaciones de equivalencia flujos relacionados</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un franquiciatario solicita un préstamo de $750,000 con garantía hipotecaria, para emprender un proyecto productivo. Estima que puede liquidarlo con dos pagos, el primero a 5 meses y el segundo a un año. Para capitalizarse, solicitará que el primer pago sea de la mitad del segundo. Determine el valor de cada pago, considerando que le cobrarán una tasa del 35% anual.</p><p>Planteando mediante un diagrama.</p></div>
            <div class="example-block"><img src="../img/ejemplo_33IC.png" alt="Diagrama Ejemplo 33" style="width:100%; max-width:350px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 750,000</span><span><strong>\(P_2\) =</strong> \(0.5\,F_3\)</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> ?</span><span><strong>\(F_3\) =</strong> \(F_3\)</span></div><p>Cambio de tasa: \( i_q = (1 + 0.35)^{1/12} - 1 = 0.0253\ldots \text{ mensual} \)</p></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1+i)^n \)</div></div>
            <div class="example-block"><h3>Sustituyendo y simplificando:</h3><div class="formula-display">\( F_1 = 750{,}000(1.0253\ldots)^{12} = 1{,}012{,}500 \)</div><div class="formula-display">\( F_2 = 0.5\,F_3(1.0253\ldots)^7 = 0.595\ldots\,F_3 \)</div><div class="formula-display">\( F_3 = F_3 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad F_1 = F_2 + F_3 \)</div></div>
            <div class="example-block"><h3>Sustituyendo y despejando:</h3><div class="result-box"><div class="formula-display">\( 1{,}012{,}500 = 0.595\ldots\,F_3 + F_3 \)</div><div class="formula-display">\( 1{,}012{,}500 = F_3(1 + 0.595\ldots) \)</div><div class="formula-display">\( \dfrac{1{,}012{,}500}{1.595\ldots} = F_3 = 634{,}533.89 \)</div><div class="formula-display">\( 0.5\,F_3 = 634{,}533.89 \times 0.5 = 317{,}266.95 \)</div></div></div>
            <div class="example-block"><p>Comprobando e interpretando:</p><img src="../img/tabla_33IC.png" alt="Tabla Tasa i=2.53% mensual, plazo en meses" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 34: Ecuaciones de equivalencia flujos relacionados</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un padre de familia decide invertir desde el día de hoy $100,000, en una cuenta que le paga el 5% semestral, con la finalidad de costear un viaje para cada una de sus dos hijas, cuando cumplan 18 años. Si sus hijas tienen actualmente 14 y 16 años, y estima que en la mayor, gastará el 20% menos que en la segunda, ¿Cuánto gastará por cada viaje? Considere la \(FF\) el día de la inversión.</p><p>Los plazos se consideran desde el depósito a la cuenta, y el tiempo faltante para cada cumpleaños de sus hijas. El gasto de un 20% menos, implica un \(100\% - 20\% = 80\%\).</p></div>
            <div class="example-block"><img src="../img/ejemplo_34IC.png" alt="Diagrama Ejemplo 34" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 100,000</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> ?</span><span><strong>\(F_2\) =</strong> \(0.80\,F_3\)</span><span><strong>\(F_3\) =</strong> \(F_3\)</span></div><p>Cambio de tasa: \( i_q = (1 + 0.05)^{2/1} - 1 = 0.1025 \text{ anual} \)</p></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{(1+i)^n} \)</div></div>
            <div class="example-block"><h3>Sustituyendo y simplificando:</h3><div class="formula-display">\( P_1 = 100{,}000 \)</div><div class="formula-display">\( P_2 = \dfrac{0.80\,F_3}{1.1025^2} = 0.658\ldots\,F_3 \)</div><div class="formula-display">\( P_3 = \dfrac{F_3}{1.1025^4} = \dfrac{1}{1.1025^4} \times F_3 = 0.676\ldots\,F_3 \)</div><div class="formula-display">\( \sum \text{Depósitos} = \sum \text{Retiros} \quad \Rightarrow \quad P_1 = P_2 + P_3 \)</div><</div>
            <div class="example-block"><h3>Sustituyendo y despejando:</h3><div class="result-box"><div class="formula-display">\( 100{,}000 = 0.658\ldots\,F_3 + 0.676\ldots\,F_3 = 1.335\ldots\,F_3 \)</div><div class="formula-display">\( \dfrac{100{,}000}{1.335\ldots} = F_3 = 74{,}906.29 \)</div><div class="formula-display">\( 0.80\,F_3 = 74{,}906.29 \times 0.80 = 59{,}925.03 \)</div></div></div>
            <div class="example-block"><p>Comprobando con una tabla:</p><img src="../img/tabla_34IC.png" alt="Tabla Tasa i=10.25% anual, plazo en años" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 35: Ecuaciones de equivalencia flujos relacionados y anualidades</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un asesor en sistemas decide ahorrar parte de su salario a partir de hoy y durante 3 quincenas más, en una cuenta que le paga el 4% trimestral. Lo anterior con la finalidad de reunir $34,000 para comprarse un auto usado. Si desea comprárselo dentro de dos meses, ¿Cuánto deberá depositar quincenalmente? Ubique la \(FF\) al término de los 2 meses.</p></div>
            <div class="example-block"><img src="../img/ejemplo_35IC.png" alt="Diagrama Ejemplo 35" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(F_1\) =</strong> 34,000</span><span><strong>\(P_2 = P_3 = P_4 = P_5\) =</strong> \(P\)</span><span><strong>\(F_2, F_3, F_4, F_5\) =</strong> ?</span></div><p>Cambio de tasa: \( i_q = (1 + 0.04)^{1/24} - 1 = 0.0065\ldots \text{ quincenal} \)</p></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1+i)^n \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F_1 = 34{,}000 \)</div><div class="formula-display">\( F_2 = P(1 + 0.0065\ldots)^1 = 1.006\ldots \times P \)</div><div class="formula-display">\( F_3 = P(1 + 0.0065\ldots)^2 = 1.013\ldots \times P \)</div><div class="formula-display">\( F_4 = P(1 + 0.0065\ldots)^3 = 1.019\ldots \times P \)</div><div class="formula-display">\( F_5 = P(1 + 0.0065\ldots)^4 = 1.026\ldots \times P \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad F_1 = F_2 + F_3 + F_4 + F_5 \)</div><div class="formula-display">\( 34{,}000 = 1.006\ldots P + 1.013\ldots P + 1.019\ldots P + 1.026\ldots P \)</div><div class="formula-display">\( 34{,}000 = 4.066\ldots P \)</div><div class="formula-display">\( \dfrac{34{,}000}{4.066\ldots} = P = 8{,}362 \text{ quincenales} \)</div></div>
            <div class="example-block"><p>Interpretando el resultado en una tabla:</p><img src="../img/tabla_35IC.png" alt="Tabla Tasa i=0.65% quincenal, plazo en quincenas" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><p>Ahora apliquemos la siguiente fórmula, considerando que la variable \(R\) son flujos del mismo importe (iguales) y periódicos (quincenales), llamados rentas:</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R\) =</strong> ? quincenales</span><span><strong>\(i\) =</strong> 0.0065... quincenal</span><span><strong>\(n\) =</strong> 4 quincenas</span><span><strong>\(F\) =</strong> 34,000</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( R = \dfrac{F\,i}{(1+i)^{n+1} - (1+i)} \)</div><div class="formula-display">\( R = \dfrac{34{,}000 \times 0.0065\ldots}{(1 + 0.0065\ldots)^{4+1} - (1 + 0.0065\ldots)} \)</div><div class="formula-display">\( R = \dfrac{222.978\ldots}{1.033\ldots - 1.0065\ldots} = \dfrac{222.978\ldots}{0.0266\ldots} = 8{,}362 \text{ quincenales} \)</div></div><p>El lector valorará el realizar cualquiera de los dos procedimientos, considerando que en el mismo problema se requiere ahorrar durante 2 años (48 quincenas).</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 36: Ecuaciones de equivalencia en \(Is\)</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Una persona solicita un préstamo por $10,000, a una tasa de \(Is\) del 3.5% mensual. Si acuerda pagar $4,000 dentro de 3 meses, determine el importe del pago que liquide el adeudo dentro de 7 meses. Realice el cálculo con \(FF\) en cada flujo de efectivo.</p></div>
            <div class="example-block"><h3>a) \(FF\) al término del plazo</h3></div>
            <div class="example-block"><img src="../img/ejemplo_36IC.png" alt="Diagrama FF al término del plazo" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 10,000</span><span><strong>\(P_2\) =</strong> 4,000</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> ?</span><span><strong>\(F_3\) =</strong> \(F_3\)</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1 + n\,i_s) \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( F_1 = 10{,}000(1 + 7 \times 0.035) = 12{,}450 \)</div><div class="formula-display">\( F_2 = 4{,}000(1 + 4 \times 0.035) = 4{,}560 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad F_1 = F_2 + F_3 \)</div><div class="formula-display">\( 12{,}450 = 4{,}560 + F_3 \)</div><div class="formula-display">\( F_3 = 7{,}890 \)</div></div><p>La interpretación del resultado es la siguiente:</p><p>Deuda equivalente al término del plazo a \(Is\):</p><p>\( I = 10{,}000 \times 0.035 \times 7 = 2{,}450 \quad;\quad F = P + I = 10{,}000 + 2{,}450 = 12{,}450 \)</p><p>Menos pago equivalente al término del plazo a \(Is\):</p><p>\( I = 4{,}000 \times 0.035 \times 4 = 560 \quad;\quad F = P + I = 4{,}000 + 560 = 4{,}560 \)</p><p>Diferencia es igual a pago al final del plazo: \( 12{,}450 - 4{,}560 = 7{,}890 \)</p><p>La \(FF\) al término del plazo es la justa y correcta a \(Is\), ya que todos los flujos cumplen con el criterio de aplicar la tasa <em>invariablemente</em> sobre el Principal.</p></div>
            <div class="example-block"><h3>b) \(FF\) al inicio del plazo</h3></div>
            <div class="example-block"><img src="../img/ejemplo_36-1IC.png" alt="Diagrama FF al inicio del plazo" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 10,000</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> ?</span><span><strong>\(F_2\) =</strong> 4,000</span><span><strong>\(F_3\) =</strong> \(F_3\)</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \dfrac{F}{1 + n\,i_s} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_1 = 10{,}000 \)</div><div class="formula-display">\( P_2 = \dfrac{4{,}000}{1 + 3 \times 0.035} = 3{,}619.91 \)</div><div class="formula-display">\( P_3 = \dfrac{F_3}{1 + 7 \times 0.035} = \dfrac{1}{1.245} \times F_3 = 0.8032\ldots \times F_3 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad P_1 = P_2 + P_3 \)</div><div class="formula-display">\( 10{,}000 = 3{,}619.91 + 0.8032\ldots\,F_3 \)</div><div class="formula-display">\( 10{,}000 - 3{,}619.91 = 0.8032\ldots\,F_3 \)</div><div class="formula-display">\( \dfrac{6{,}380.09}{0.8032\ldots} = F_3 = 7{,}943.21 \)</div></div><p>La diferencia existente respecto de los resultados anteriores es de: \(7{,}943.21 - 7{,}890 = 53.21\). Se integra como sigue:</p><p>Interés generado por \(F_2\) desde el inicio del plazo y hasta su ubicación (mes 3): \( F - P = 4{,}000 - 3{,}619.91 = 380.09 \)</p><p>O bien, el interés de \(P_2\) hasta \(F_2\): \( I = P\,n\,i_s = 3{,}619.91 \times 0.035 \times 3 = 380.09 \)</p><p>Capitalizado hasta el término del plazo (mes 7): \( I = 380.09 \times 4 \times 0.035 = 53.21 \)</p><p>La diferencia se interpreta como el interés del interés (\(Ic\)) generado por \(F_2\) (flujo intermedio). Generalizando:</p><p>La diferencia de resultados considerando una \(FF\) al inicio del plazo, se compone por el interés generado por los <em>flujos intermedios</em>, desde el inicio del plazo y hasta la ubicación de dicho flujo, capitalizado hasta el término del mismo (<strong>teoría inédita</strong>).</p></div>
            <div class="example-block"><h3>c) \(FF\) al final del 3er mes</h3></div>
            <div class="example-block"><img src="../img/ejemplo_36-2IC.png" alt="Diagrama FF al final del 3er mes" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> 10,000</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(P_3\) =</strong> 4,000</span><span><strong>\(F_1\) =</strong> ?</span><span><strong>\(F_2\) =</strong> \(F_2\)</span></div></div>
            <div class="example-block"><h3>Fórmulas:</h3><div class="formula-display">\( F = P(1 + n\,i_s) \quad;\quad P = \dfrac{F}{1 + n\,i_s} \)</div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( F_1 = 10{,}000(1 + 3 \times 0.035) = 11{,}050 \)</div><div class="formula-display">\( P_2 = \dfrac{F_2}{1 + 4 \times 0.035} = \dfrac{1}{1.14} \times F_2 = 0.877\ldots \times F_2 \)</div><div class="formula-display">\( P_3 = 4{,}000 \)</div><div class="formula-display">\( \sum \text{Deudas} = \sum \text{Pagos} \quad \Rightarrow \quad F_1 = P_2 + P_3 \)</div><div class="formula-display">\( 11{,}050 = 0.877\ldots\,F_2 + 4{,}000 \)</div><div class="formula-display">\( 11{,}050 - 4{,}000 = 0.877\ldots\,F_2 \)</div><div class="formula-display">\( \dfrac{7{,}050}{0.877\ldots} = F_2 = 8{,}037 \)</div></div><p>La diferencia existente respecto de los resultado anterior y el inciso a) anterior es de: \(8{,}037 - 7{,}890 = 147\). Se integra como sigue:</p><p>Interés generado por \(P_1\) hasta \(F_1\) (mes 3 o \(FF\)): \( F - P = 11{,}050 - 10{,}000 = 1{,}050 \)</p><p>O bien, el interés de generado por \(P_1\): \( I = P\,n\,i_s = 10{,}000 \times 3 \times 0.035 = 1{,}050 \)</p><p>Capitalizado hasta el término del plazo (mes 7): \( I = 1{,}050 \times 4 \times 0.035 = 147 \)</p><p>La diferencia se interpreta como el interés del interés (\(Ic\)) generado por \(F_1\). Generalizando:</p><p>La diferencia de resultados considerando una \(FF\) intermedia, se compone por el interés generado por los <em>flujos anteriores a la \(FF\)</em>, desde el inicio del plazo y hasta la ubicación de dicho flujo, capitalizado hasta el término del mismo (<strong>teoría inédita</strong>).</p><p>Por lo anterior, siempre que se esté ante un problema de ecuaciones de equivalencia en \(Is\), se recomienda emplear la \(FF\) al término del plazo. Si se establece alguna otra, siempre existirá una diferencia respecto el resultado obtenido en cualquier otra (<em>discretización del tiempo</em>). Por tanto es vital establecer claramente la \(FF\) a emplear.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 37: Ecuaciones de equivalencia en \(Db\)</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Un empresario es dueño de un pagaré por $50,000 que vence dentro de 7 meses. Desea conocer cuánto recibiría por él si lo descuenta en una institución que le aplica una tasa de descuento del 2.5% mensual. Realice el cálculo considerando que a) descontará el documento el día de hoy, y b) también lo que recibiría si lo descuenta después de 3 meses.</p></div>
            <div class="example-block"><h3>a) \(FF\) al inicio del plazo</h3></div>
            <div class="example-block"><img src="../img/ejemplo_37IC.png" alt="Diagrama FF inicio del plazo" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> ?</span><span><strong>\(F_1\) =</strong> 50,000</span><span><strong>\(n\) =</strong> 7</span><span><strong>\(d\) =</strong> 2.5% mensual</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = F(1 - n\,d) \)</div></div>
            <div class="example-block"><h3>Sustitución y resultado:</h3><div class="result-box"><div class="formula-display">\( P_1 = 50{,}000(1 - 7 \times 0.025) \)</div><div class="formula-display">\( P_1 = 41{,}250 \)</div></div><p>Comprobando: \( D = 50{,}000 - 41{,}250 = 8{,}750 \quad;\quad \text{o bien } D = 50{,}000 \times 0.025 \times 7 = 8{,}750 \)</p></div>
            <div class="example-block"><h3>b) \(FF\) al final del 3er mes</h3></div>
            <div class="example-block"><img src="../img/ejemplo_37-1IC.png" alt="Diagrama FF final del 3er mes" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> ?</span><span><strong>\(F_1\) =</strong> 50,000</span><span><strong>\(n\) =</strong> 4</span><span><strong>\(d\) =</strong> 2.5% mensual</span></div></div>
            <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = F(1 - n\,d) \)</div></div>
            <div class="example-block"><h3>Sustitución y resultado:</h3><div class="result-box"><div class="formula-display">\( P_1 = 50{,}000(1 - 4 \times 0.025) \)</div><div class="formula-display">\( P_1 = 45{,}000 \)</div></div><p>Comprobando: \( D = 50{,}000 - 45{,}000 = 5{,}000 \quad;\quad \text{o bien } D = 50{,}000 \times 0.025 \times 4 = 5{,}000 \)</p><p>Veamos lo que resulta de descontar el resultado, hasta el día de la fecha inicial.</p></div>
            <div class="example-block"><h3>c) \(FF\) al inicio del plazo, con operaciones relacionadas</h3></div>
            <div class="example-block"><img src="../img/ejemplo_37-2IC.png" alt="Diagrama FF inicio con operaciones relacionadas" style="width:100%; max-width:380px; display:block; margin: 1.5rem auto;"></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1\) =</strong> ?</span><span><strong>\(P_2\) =</strong> ?</span><span><strong>\(F_1\) =</strong> 50,000</span><span><strong>\(F_2\) =</strong> \(P_1\)</span></div></div>
            <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( P_1 = 50{,}000(1 - 4 \times 0.025) = 45{,}000 \)</div><div class="formula-display">\( P_1 = F_2 = 45{,}000 \)</div><div class="formula-display">\( P_2 = 45{,}000(1 - 3 \times 0.025) = 41{,}625 \)</div></div><p>Observe que hay una diferencia con el resultado obtenido en el a): de \(41{,}625 - 41{,}250 = 375\).</p><p>La diferencia se interpreta como el interés del interés (\(Ic\)) generado por el primer descuento, y se integra como sigue:</p><p>Interés del primer descuento: \( F - P = D = 50{,}000 - 45{,}000 = 5{,}000 \)</p><p>O ya bien \( D = F\,n\,d = 50{,}000 \times 4 \times 0.025 = 5{,}000 \)</p><p>Interés descontado hasta el inicio del plazo: \( D = 5{,}000 \times 3 \times 0.025 = 375 \)</p><p>Resultado éste último que sería incorrecto, ya que al realizar cálculos parciales o intermedios en \(Db\), capitaliza intereses.</p></div>
            <div class="example-block"><p>En conclusión, el empleo de ecuaciones de equivalencia en \(Is\) o en \(Db\), deberá atender siempre a la \(FF\) especificada en la redacción. En caso de que ésta no se indique, recuerde que siempre habrá variaciones respecto de la elección de una \(FF\) distinta. Eso no debe considerarse como un error en cálculo, sino interpretar que se atribuye a la capitalización de intereses o combinación con el \(Ic\).</p><p>Como estudiante, se debe poner especial atención en la redacción, o en su caso, preguntar al profesor la ubicación de la \(FF\) para evitar obtener procedimientos y resultados distintos entre sí, todos correctos.</p><p>Por su parte, el profesor debe ser el principal interesado en obtener un solo procedimiento y resultado, por lo que deberá especificar la \(FF\) claramente. En su caso, deberá apoyar al estudiante inquieto en la integración de las diferencias resultantes.</p></div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Interes Compuesto Continuo</h2>
            </section>
                <h2>1: Monto Final en ICC</h2>
                <div class="example-block">
                     <h3>Planteamiento</h3>
                     <p>Determine a cuanto ascendera el Monto Final de una inversion de $29,000, si se invierte a una tasa del 6% trimestral cap. continua, durante 5 trimestres.</p>
                 </div>
                 <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>P= 29,000</span> 
                        <span>F=?</span>
                        <span>n= 5 trimestres</span> 
                        <span>\( i_c \)= 6% trimestral cap.continua </span>
                        <span>\( m_c \)= 50,000,000  </span>
                    </div>
                 </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \(F = P \left(1 + \frac{i_c}{m_c}\right)^{m_c n}\)
                    </div>
                </div>
                <div class="example block">
                    <p>
                        La variable \( i_c = \frac{i_c}{m_c} \) representa la tasa instantanea equivalente al 6% continuo en un trimestre. El calculo de la tasa instantanea dependera de la capacidad del equipo empleado. En este caso se obtuvo con la calculadora cientifica CASIO fx - 82 MS. Si se realiza con la hoja de calculo de Excel sera de 0.0000000012.
                    </p>
                    <p>
                        El exponente \( m_c n \) , representa el total aproximado de capitalizaciones instantaneas en cinco trimestres En este caso resultaron 50,000,000 * 5 = 250,000,000. Las capitalizaciones de la tasa, a pesar de ser continuas, estan delimitadas por el plazo, ya que recuerde que la periodicidad de la tasa determina la del plazo y viceversa.
                    </p>
                    <p>
                        Ahora empleemos la formula del ICC, la cual resulta mas practica
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>P= 29,000</span> 
                        <span>F=?</span>
                        <span>n= 5 trimestres</span> 
                        <span>\( i_c \)= 6% trimestral cap.continua </span>
                    </div>
                 </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \(F = P e^{n \cdot ic}\)
                    </div>
                </div>
                <div class="example-block">
                    <p>Dando el mismo resultado y mas preciso, pues no requiere asignar algun valos a las capitalizaciones continuas</p>
                    <h3>Nota sobre la tabla</h3>
                    <p style="font-style: italic; font-size: 1em; color: #555;">Al igual que en Ic no se requiere que la tasa o plazo sean anuales en ICC</p>
                </div>
                 
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>2: Principal en ICC</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p> 
                        Se se requieren $23,150 dentro de 3 años, y se invierte al 15% anual con cap.continua, determine cuanto debera depositarse el dia de hoy.
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = ?
                        </span>
                        <span>
                            F = 23,150
                        </span>
                        <span>
                            n = 3 años
                        </span>
                        <span>
                            \( i_c \) = 15% anual cap.continua
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \[P = \frac{F}{e^{n \cdot i \cdot c}}\]
                    </div>
                    <div class="formula-display">
                        \[P = \frac{23150}{2.7182^{3 \cdot 0.15}}\]
                    </div>
                    <div class="formula-display">
                        \[ = \frac{23150}{1.568} = 14,761.09 \]
                    </div>
                </div>
                <div class="example-block">
                    <p>
                       Comprobando de manera intuitiva, conservando el criterio del varlor arbitrario \( m_c \) 
                    </p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = 14,761.09 
                        </span>
                        <span>
                            F = ?
                        </span>
                        <span>
                            n = 3 años
                        </span>
                        <span>
                            \( i_c \) = 15% anual cap.continua
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \[F = P \left(1 + \frac{i_c}{m_c}\right)^{m_c n}\]
                    </div>
                    <div class="result-box">
                        \[F = 14,731.09 (1+0.000000003)^{150,000,000} = 23,150\]
                    </div>
                </div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2> 3: Plazo en ICC</h2>
                <div class="example-block">
                    <h3>Planteamiento</h3>
                    <p>Cuanto tiempo debera transcurrir para que $100,000 se dupliquen, si la tasa empleada es del 13.5% semestral con cap.continua</p>
                    <p>Al ser el tiempo la incognita y no tener periodicidad, esta saldra acorde con la unidad de tiempo que representa la tasa, es decir, el tiempo quedara en semestres</p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = 100,000 
                        </span>
                        <span>
                            F = 200,000
                        </span>
                        <span>
                            n = ? semestres
                        </span>
                        <span>
                            \( i_c \) = 13.5% semestral cap.continua
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \[n = \frac{\ln\left(\frac{F}{P}\right)}{i_c}\]
                    </div>
                    <div class="formula-display">
                        \[n = \frac{\ln\left(\frac{200,000}{100,000}\right)}{0.135} = 5.1344\] semestres o 2 años, 6 meses, 24 dias
                    </div>
                </div>
                <div class="example-block">
                    <p> Comprobando de manera intuitiva, conservando el criterio del valor arbitrario \( m_c \) </p>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \[F = P \left(1 + \frac{i_c}{m_c}\right)^{m_c n}\]

                        \[F = 100,000 \left(1 + \frac{0.135}{50,000,000}\right)^{50,000,000 * 5.1344}\]

                        \[F = 100,000 (1+ 0.0000000002)^{256,724,178}\]
                    </div>
                    <div class="result-box">
                        \[F = 100,000 * 1.999 ... = 200,000\]
                    </div>
                </div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2> 4: Tasa en \(Ic\) continuo</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Determine la tasa diaria cap. continua, que hará que por una inversión de $15,000 el día de hoy, se retiren $21,499.94 dentro de 2 años.</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 15,000</span><span><strong>\(F\) =</strong> 21,499.94</span><span><strong>\(n\) =</strong> 2 años = 720 días</span><span><strong>\(i_c\) =</strong> ?% diaria cap. continua</span></div></div>
                <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_c = \dfrac{\ln\!\left(\dfrac{F}{P}\right)}{n} \)</div><div class="formula-display">\( i_c = \dfrac{\ln\!\left(\dfrac{21{,}499.94}{15{,}000}\right)}{720} = 0.000499\ldots \text{ o } 0.05\% \text{ diaria cap. continua} \)</div></div><p>Al ser tan pequeñas las tasas continuas, se vuelven proporcionales al tiempo.</p><p>En el \(ICC\) se da el caso único en que se podrá convertir una tasa proporcionalmente en \(Ic\). Apreciémoslo.</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 15,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 2 años</span><span><strong>\(i_c\) =</strong> 0.05% diaria cap. continua</span><span><strong>\(i_c\) =</strong> 0.05% × 360 = 18% anual cap. continua</span></div></div>
                <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\left(1 + \dfrac{i_c}{m_c}\right)^{m_c\,n} \)</div><div class="formula-display">\( F = 15{,}000\left(1 + \dfrac{0.18}{50{,}000{,}000}\right)^{50{,}000{,}000 \times 2} \)</div><div class="formula-display">\( F = 15{,}000(1 + 0.000000003)^{100{,}000{,}000} \)</div><div class="result-box"><div class="formula-display">\( F = 15{,}000 \times 1.433\ldots = 21{,}499.94 \)</div></div><p>O ya bien:</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 15,000</span><span><strong>\(F\) =</strong> 21,499.94</span><span><strong>\(n\) =</strong> 2 años = 48 quincenas</span><span><strong>\(i_c\) =</strong> ?% por quincena cap. continua</span></div></div>
                <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( i_c = \dfrac{\ln\!\left(\dfrac{F}{P}\right)}{n} \)</div><div class="formula-display">\( i_c = \dfrac{\ln\!\left(\dfrac{21{,}499.94}{15{,}000}\right)}{48} = 0.007499\ldots \text{ o } 0.75\% \text{ quincenal cap. continua} \)</div><div class="result-box"><div class="formula-display">\( i_c = \dfrac{0.75\% \text{ quincenal cap. continua}}{15 \text{ días por quincena}} = 0.05\% \text{ diaria cap. continua} \)</div></div><p>La conversión proporcional de las tasas capitalizables en \(Ic\), únicamente se puede realizar cuando las capitalizaciones son continuas.</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 5: Independencia del plazo y Principal de las tasas equivalentes de \(ICC\)</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Compruebe la equivalencia de las tasas de \(ICC\) del problema anterior, considerando un Principal de $65,000 en un plazo de 5 años.</p></div>
            <div class="example-block"><h3>Con tasa diaria cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 65,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 5 años = 1,800 días</span><span><strong>\(i_c\) =</strong> 0.0004999... diaria cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\,e^{n\,i_c} \)</div><div class="result-box"><div class="formula-display">\( F = 65{,}000(2.7182\ldots)^{1800 \times 0.000499\ldots} = 159{,}874.18 \)</div></div></div>
            <div class="example-block"><h3>Con tasa anual cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 65,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 5 años</span><span><strong>\(i_c\) =</strong> 0.17999... anual cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\,e^{n\,i_c} \)</div><div class="result-box"><div class="formula-display">\( F = 65{,}000(2.7182\ldots)^{5 \times 0.17999\ldots} = 159{,}874.18 \)</div></div></div>
            <div class="example-block"><h3>Con tasa quincenal cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 65,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 5 años = 120 quincenas</span><span><strong>\(i_c\) =</strong> 0.00749... quincenal cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\,e^{n\,i_c} \)</div><div class="result-box"><div class="formula-display">\( F = 65{,}000(2.7182\ldots)^{120 \times 0.00749\ldots} = 159{,}874.18 \)</div></div></div>
            </section>
            <div class="section-divider"></div>

            <section>
            <h2>Ejemplo 6: Tasa de \(Ic\) equivalente a tasa de \(ICC\) con la misma periodicidad</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Determine la tasa trimestral cap. continua equivalente a una tasa del 8.5% trimestral.</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> 8.5% trimestral</span><span><strong>\(i_c\) =</strong> ?% trimestral cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i_c = \ln(1+i) = \ln(1 + 0.085) = 0.0815\ldots \text{ trimestral cap. continua} \)</div></div><p>Al ser las tasas equivalentes, se emplea cualquier plazo y Principal. Determinemos \(F\) a partir de \(P = 117{,}000\) y con \(n = 5\) trimestres.</p></div>
            <div class="example-block"><h3>Con tasa trimestral:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 117,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 5 trimestres</span><span><strong>\(i\) =</strong> 8.5% trimestral</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( F = P(1+i)^n = 117{,}000(1 + 0.085)^5 = 175{,}927.83 \)</div></div></div>
            <div class="example-block"><h3>Con tasa trimestral cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 117,000</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 5 trimestres</span><span><strong>\(i_c\) =</strong> 0.0815... trimestral cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( F = P\,e^{n\,i_c} = 117{,}000(2.7182\ldots)^{5 \times 0.0815\ldots} = 175{,}927.83 \)</div></div></div>
            </section>
            <div class="section-divider"></div>

        <section>
        <h2>Ejemplo 7: Tasa de \(ICC\) equivalente a tasa de \(Ic\) con la misma periodicidad</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Determine la tasa bimestral equivalente a la tasa del 2.84% bimestral cap. continua.</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> ?% bimestral</span><span><strong>\(i_c\) =</strong> 2.84% bimestral cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i = e^{i_c} - 1 = e^{0.0284} - 1 = 0.0288\ldots \text{ bimestral} \)</div></div><p>Al ser las tasas equivalentes, se emplea cualquier plazo y Principal. Determinemos \(F\) a partir de \(P = 68{,}500\), con \(n = 6\) bimestres.</p></div>
            <div class="example-block"><h3>Con tasa bimestral:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 68,500</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 6 bimestres</span><span><strong>\(i\) =</strong> 0.0288... bimestral</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( F = P(1+i)^n = 68{,}500(1 + 0.0288\ldots)^6 = 81{,}225.87 \)</div></div></div>
            <div class="example-block"><h3>Con tasa bimestral cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 68,500</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 6 bimestres</span><span><strong>\(i_c\) =</strong> 0.0284 bimestral cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\,e^{n\,i_c} \)</div><div class="result-box"><div class="formula-display">\( F = 68{,}500(2.7182\ldots)^{6 \times 0.0284} = 81{,}225.87 \)</div></div></div>
        </section>
        <div class="section-divider"></div>

        <section>
            <h2>Ejemplo 8: Tasa de \(ICC\) equivalente a tasa de \(Ic\) con distinta periodicidad</h2>
            <div class="example-block"><h3>Planteamiento</h3><p>Determine la tasa mensual equivalente a la tasa del 31.32% semestral cap. continua.</p><p>Al ser las tasas equivalentes de \(ICC\) proporcionales al tiempo, obtengamos primeramente la tasa mensual cap. continua:</p></div>
            <div class="example-block"><div class="formula-display">\( i_c = \dfrac{31.32\% \text{ semestral cap. continua}}{6 \text{ meses por semestre}} = 5.22\% \text{ mensual cap. continua} \)</div><p>Ahora se puede proceder a su conversión a tasa cap. mensual:</p></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(i\) =</strong> ?% mensual</span><span><strong>\(i_c\) =</strong> 5.22% mensual cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( i = e^{i_c} - 1 = e^{0.0522} - 1 = 0.05358\ldots \text{ mensual} \)</div></div><p>Comprobemos con \(F\) a partir de cualquier \(P = 9{,}250\), y cualquier \(n = 7\) meses.</p></div>
            <div class="example-block"><h3>Con tasa mensual:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 9,250</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 7 meses</span><span><strong>\(i\) =</strong> 0.05358... mensual</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="result-box"><div class="formula-display">\( F = P(1+i)^n = 9{,}250(1 + 0.05358\ldots)^7 = 13{,}330.09 \)</div></div></div>
            <div class="example-block"><h3>Con tasa semestral cap. continua:</h3></div>
            <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 9,250</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 7 meses = \(\frac{7}{6}\) semestres</span><span><strong>\(i_c\) =</strong> 31.32% semestral cap. continua</span></div></div>
            <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P\,e^{n\,i_c} \)</div><div class="formula-display">\( F = 9{,}250(2.7182\ldots)^{\frac{7}{6} \times 0.3132} \)</div><div class="result-box"><div class="formula-display">\( F = 13{,}330.09 \)</div></div></div>
        </section>
        <div class="section-divider"></div>

        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/interes_compuesto.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
