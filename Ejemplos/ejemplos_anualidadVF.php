<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Anualidad Vencida y Fondo de Amortización', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejemplos Explicados: Anualidad Vencida y Fondo de Amortizacion
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejemplos-contenido">
            <section>
                 <h2>Ejemplo 1: Relacion de \(R_v\) e Ic a valor F</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Obtenga el valor Futuro de una serie de 3 rentas mensuales vencidas de $100 c/u, a una tasa del 10% mensual</p><p>Analizando el siguiente diagrama, se tiene que al estar la FF al termino del plazo, todos los flujos estan a su izquierda excepto \( F_3 \), por lo que son P a capitalizar; todas las rentas se ubican al final de cada periodo. El primer periodo no tiene efecto en el calculo</p><p>Operando a Ic tenemos:</p></div>
                 <div class="example-block"><img src="../img/ejemplo_1anualidadV.png" alt="Ejemplo1" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P_1 \) =</strong> 100</span><span><strong>\(P_2 \) =</strong> 100 </span><span><strong>\(P_3 \) = </strong> 100</span><span><strong>\(F_1 \) = </strong> ?</span><span><strong>\(F_2 \) = </strong> ?</span><span><strong>\(F_3 \) = </strong> ?</span></div></div>
                 <div class="example-block"><div class="formula-display">P = \(F (1+i)^1 \)</div></div>
                 <div class="example-block"><h3>Sustitucion y simplificacion:</h3></div><div class="formula-display">\( F_1 = 100(1+ 0.10)^2 = 121\) </div>
                 <div class="example-block"><div class="formula-display">\( F_2 = 100(1+ 0.10)^1 = 110\)</div><div class="formula-display">\(F_3 = 100(1+0.10)^0 = 100 \)</div></div>
                 <div class="example-block"><h3>Valor futuro =  ∑ Flujos</h3><div class="formula-display">\(F_4=F_1+F_2+F3\) </div></div>
                 <div class="example-block"><h3>Sustitución y resultado:</h3><div class="formula-display">\( F_4 = 121 + 110 + 100 \)</div><div class="formula-display">\( F_4 = 331 \)</div></div>
                <div class="example-block"><h3>Representando la operación con un diagrama, aplicando la fórmula de \(F\) en una \(AV\):</h3><img src="../img/ejemplo_1-1anualidadV.png" alt="Diagrama AV" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 100 mensuales</span><span><strong>\(n\) =</strong> 3 meses</span><span><strong>\(F\) =</strong> ?</span> </div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{100}{0.10}\right)\left((1+0.10)^3 - 1\right) \)</div><div class="formula-display">\( F = (1{,}000)(0.331) = 331 \)</div></div>
                <div class="example-block"><h3>Interpretación:</h3><p>Para visualizar la equivalencia de \(F\) en una tabla por periodo, se toman las operaciones como si fueran de la <em>misma naturaleza</em>.</p><p>Por ejemplo, se tienen 3 depósitos anticipados de $100 c/u, que ganan y acumulan intereses hasta el término del plazo. O ya bien préstamos que ganan intereses.</p></div>
                <div class="example-block"><img src="../img/tabla_anualidadV.png" alt="Tabla Tasa i=10% mensual, plazo en meses" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 2: Monto Final e Interés (Anual vs Trimestral)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un empresario solicita un préstamo de $150,000 a un año, con tasa del 5.5% trimestral...</p><p style="font-style: italic; font-size: 1em; color: #555;">Es necesario convertir el plazo a trimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 1 año = 4 trimestres</div><div class="variable-grid"><span><strong>P =</strong> 150,000</span><span><strong>i =</strong> 5.5% trimestral (0.055)</span><span><strong>n =</strong> 4 trimestres</span><span><strong>F =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Solución</h3><div class="formula-display">F = P (1 + i)<sup>n</sup></div><div class="formula-display">F = 150,000 * (1 + 0.055)<sup>4</sup> = 185,823.70</div><div class="formula-display">I = F - P = 185,823.70 - 150,000 = 35,823.70</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo2-ic-tabla.png" alt="Tabla de Interés Compuesto por Trimestre" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>Los valores finales de F e I coinciden.</p></div>
                  <div class="example-block"><h3>Resultado</h3><div class="result-box">Monto Final a Pagar (F) = $185,823.70 <br> Interés Pagado (I) = $35,823.70</div></div>
                <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">Al igual que en Is, la periodicidad de la tasa determina la del plazo, y viceversa</p></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 3: Cálculo del Principal (Valor Presente)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una pasante de veterinaria retiró $661.50 hoy, por una inversión de hace 4 meses. Si el banco pagó 5% bimestral, ¿cuánto invirtió?</p><p style="font-style: italic; font-size: 1em; color: #555;">Convertir plazo a bimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 4 meses / 2 = 2 bimestres</div><div class="variable-grid"><span><strong>F =</strong> 661.50</span><span><strong>i =</strong> 5% bimestral (0.05)</span><span><strong>n =</strong> 2 bimestres</span><span><strong>P =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ P = \frac{F}{(1 + i)^n} $$<sup></sup></div><div class="formula-display">I = F - P</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">P = 661.50 * (1 + 0.05)<sup>-2</sup> = 600</div><p style="font-style: italic; font-size: 1em; color: #555;">El factor (1+i)<sup>-n</sup> se conoce como factor de descuento...</p><div class="formula-display">I = 661.50 - 600 = 61.50</div></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo3-ic-tabla.png" alt="Tabla de Interés Compuesto Ejemplo 3" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>La tabla muestra cómo $600 crecen hasta $661.50.</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Principal Invertido (P) = $600.00 <br> Interés Ganado (I) = $61.50</div></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 4: Principal con Plazo Fraccionario</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una comisionista cobró $8,292.55 hoy, por un préstamo de hace 10 meses con interés del 4.1% cuatrimestral. Determine el préstamo original (P) y el interés (I).</p><p style="font-style: italic; font-size: 1em; color: #555;">Convertir plazo a cuatrimestres.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="formula-display">n = 10 meses / 4 = 2.5 cuatrimestres</div><div class="variable-grid"><span><strong>F =</strong> 8,292.55</span><span><strong>i =</strong> 4.1% cuatrimestral (0.041)</span><span><strong>n =</strong> 2.5 cuatrimestres</span><span><strong>P =</strong> ?</span><span><strong>I =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ P = \frac{F}{(1 + i)^n} $$<sup></sup></div><div class="formula-display">I = F - P</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">P = 8,292.55 * (1 + 0.041)<sup>-2.5</sup> = 7,500</div><div class="formula-display">I = 8,292.55 - 7,500 = 792.55</div></div>
                 <div class="example-block"><h3>Nota sobre la Tabla</h3><p style="font-style: italic; font-size: 1em; color: #555;">No se puede realizar una tabla detallada con periodos fraccionarios (2.5)...</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Cantidad del Préstamo (P) = $7,500.00 <br> Interés Ganado (I) = $792.55</div></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 5: Cálculo del Plazo (n)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>El representante de una cooperativa escolar cuenta con $7,165, y requiere $1,000 adicionales ($F = 8165$). Si le pagan 3.32% trimestral, calcule el tiempo.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>P =</strong> 7,165</span><span><strong>F =</strong> 8,165</span><span><strong>i =</strong> 3.32% trimestral (0.0332)</span><span><strong>n =</strong> ? (trimestres)</span><span><strong>I =</strong> 1,000</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ n = \frac{\log(F / P)}{\log(1 + i)} $$</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">n = log(8,165 / 7,165) / log(1.0332) ≈ 4</div><p style="font-style: italic; font-size: 1em; color: #555;">La periodicidad de la tasa determina la del plazo.</p></div>
                 <div class="example-block"><h3>Tabla por Periodo (Comprobación)</h3><img src="../img/ejemplo5-ic-tabla.png" alt="Tabla de Interés Compuesto Ejemplo 5" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto; border: 1px solid var(--borde-color); border-radius: 8px;"><p>La tabla confirma que al 4º trimestre se alcanza el monto.</p></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Plazo (n) ≈ 4 trimestres</div><p style="text-align: center; margin-top: 1rem; font-style: italic;">Resultado aproximado por redondeo.</p></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 6: Plazo (n) con Resultado Fraccionario</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una comerciante requiere saber en cuánto tiempo puede reunir $25,000, si hoy cuenta con $21,000 y le ofrecen 0.58% quincenal. Exprese el plazo en años, meses y días.</p></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>P =</strong> 21,000</span><span><strong>F =</strong> 25,000</span><span><strong>i =</strong> 0.58% quincenal (0.0058)</span><span><strong>n =</strong> ? (quincenas)</span></div></div>
                 <div class="example-block"><h3>Fórmula(s)</h3><div class="formula-display">$$ n = \frac{\log(F / P)}{\log(1 + i)} $$</div></div>
                 <div class="example-block"><h3>Sustitución y Desarrollo</h3><div class="formula-display">n = log(25,000 / 21,000) / log(1.0058) ≈ 30.148 quincenas</div><p style="font-style: italic; font-size: 1em; color: #555;">La periodicidad de la tasa determina la del plazo.</p><p>Convertimos a años, meses y días:</p><ul style="font-family: 'Courier New', monospace; font-size: 1.1em;"><li>30 quincenas = 15 meses = 1 año y 3 meses</li><li>0.148 quincenas ≈ 2 días</li></ul></div>
                 <div class="example-block"><h3>Resultado</h3><div class="result-box">Plazo (n) ≈ 30.148 quincenas <br> (Aproximadamente: 1 año, 3 meses y 2 días)</div></div>
            </section>
             <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 7: Cálculo de la Tasa (i) - Mensual y Semestral</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>El Ayuntamiento cuenta con $2,100,000 hoy y requiere $2,308,320 en 6 meses. ¿Qué tasa semestral necesita? Calcule también la tasa mensual. Realice tablas.</p></div>
                 
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
                     <p>Un obrero pide a su hermano que determine la tasa de interés semanal que le cobra su banco por un préstamo de nómina de $5,330, si deberá pagar $7,860.86 dentro de un año. Calcule también la tasa anual.</p>
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
                <h2>Monto Final en ICC</h2>
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
                <h2>Principal en ICC</h2>
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
                <h2>Plazo en ICC</h2>
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
                <div class="example-block">
                <h2>Tasa en ICC</h2>
                <p>Tasa en Ic continuo. Determine la tasa diaria cap.continua, que hara que por una inversion de $15,000 el dia de hoy, se retiren $21,499.94 dentro de 2 años</p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = 15,000
                        </span>
                        <span>
                            F = 21,499.94
                        </span>
                        <span>
                            n = 2 años = 720 dias
                        </span>
                        <span>
                            \( i_c \) = ? diaria cap.continua  
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \( i_c = \frac{\ln\left(\frac{F}{P}\right)}{n}\)
                    </div>
                    <div class="formula-display"> 
                        \( i_c = \frac{\ln\left(\frac{21,499.94}{15,000}\right)}{720} = 0.000499 ... o 0.05% diaria cap.continua \)
                    </div>
                </div>
                <div class="example-block">
                    <h3>Nota</h3>
                    <p>Al ser tan pequenas las tasas continuas, se vuelven proporcionales al tiempo.</p>
                </div>
                <div class="example-block">
                    <p>En el ICC se da el caso unico en que se podra convertir una tasa proporcionalmente en Ic</p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = 15,000
                        </span>
                        <span>
                            F = ? 
                        </span>
                        <span>
                            n = 2 años
                        </span>
                        <span>
                            \( i_c \) = 0.05% * 360 = 18% anual
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <div class="formula-display">
                        \[F = P \left(1 + \frac{i_c}{m_c}\right)^{m_c n}\]
                        \[F = 15,000 \left(1 + \frac{0.18}{50,000,000}\right)^{50,000,000 * 2}\]
                        \[F = 15,000 (1 + 0.00000000.3)^{100,000,000}\]
                        \[F = 15,000 * 1.433 ... = 21,499.94\]
                    </div>
                    <p>O ya bien</p>
                </div>
                <div class="example-block">
                    <h3>Datos</h3>
                    <div class="variable-grid">
                        <span>
                            P = 15,000
                        </span>
                        <span>
                            F = 21,499.94
                        </span>
                        <span>
                            n = 2  años = 48 quincenas
                        </span>
                        <span>
                            \( i_c \) = ? 
                        </span>
                    </div>
                </div>
                <div class="example-block">
                    <h3>Solucion</h3>
                    <!--<div class="formula-display">
                        \( i_c = \frac{\ln\left(\frac{F}{P}\right)}{n}\)
                    </div>
                    <div class="formula-display">
                        \( F  = \frac{\ln\left(\frac{21,499.94}{15,000}\right)}{48} = 0.007499 ... o 75% quincenal\)
                    </div>
                    <div class="formula-display">
                        \( i_c = \frac{(0.75% quincenal cap.continua)}{15 dias por quincena}\)
                    </div>
                    </div> -->
                </div>
            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/anualidad_vencida.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
