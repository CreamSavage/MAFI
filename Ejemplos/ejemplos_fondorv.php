<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejemplos: Fondo de Amortización (Renta Vencida)', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Ejemplos Explicados: Anualidad Vencida y Fondo de Amortización con Renta Vencida</h1>
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
                 <div class="example-block"><h3>Sustitución y resultado:</h3><div class="formula-display">\( F_4 = 121 + 110 + 100 \)</div><div class="result-box"><div class="formula-display">\( F_4 = 331 \)</div></div></div>
                 <div class="example-block"><h3>Representando la operación con un diagrama, aplicando la fórmula de \(F\) en una \(AV\):</h3><img src="../img/ejemplo_1-1anualidadV.png" alt="Diagrama AV" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 100 mensuales</span><span><strong>\(n\) =</strong> 3 meses</span><span><strong>\(F\) =</strong> ?</span> </div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{100}{0.10}\right)\left((1+0.10)^3 - 1\right) \)</div><div class="result-box"><div class="formula-display">\( F = (1{,}000)(0.331) = 331 \)</div></div></div>
                 <div class="example-block"><h3>Interpretación:</h3><div class="didactic-note"><p>Para visualizar la equivalencia de \(F\) en una tabla por periodo, se toman las operaciones como si fueran de la misma naturaleza</p></div>.</p><p>Por ejemplo, se tienen 3 depósitos anticipados de $100 c/u, que ganan y acumulan intereses hasta el término del plazo. O ya bien préstamos que ganan intereses.</p></div>
                 <div class="example-block"><img src="../img/tabla_anualidadV.png" alt="Tabla Tasa i=10% mensual, plazo en meses" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 2: Valor F, Renta  \(R_v\) , Plazo n,Tasa i</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un estudiante de secundaria desea saber cuánto logrará reunir en un año, si se propone ahorrar $200 semanales de lo que recibe para sus gastos. Ayúdelo con la solución si consideramos que le pagarán una tasa del 2% mensual.</p><p>Como no se indica explícitamente que ahorrará desde el día inicial, se considera <em>AV</em>.</p></div>
                 <div class="example-block"><img src="../img/ejemplo_2anualidad.png" alt="Diagrama Ejemplo 2" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 200 semanales</span><span><strong>\(n\) =</strong> 52 semanas</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Cambio de tasa:</h3><div class="formula-display">\( i_q = (1 + 0.02)^{1/52} - 1 = 0.0045\ldots \text{ semanal} \)</div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{200}{0.0045\ldots}\right)\left((1 + 0.0045\ldots)^{52} - 1\right) \)</div><div class="result-box"><div class="formula-display">\( F = (43{,}665.31)(0.268\ldots) = 11{,}712.86 \)</div></div></div>
                 <div class="example-block"><div class="didactic-note"><p>En problemas donde se tienen tablas con múltiples periodos, se recomienda emplear el simulador elaborado para este fin.</p></div><p>A continuación se reproducen los 3 últimos periodos de una tabla.</p></div>
                 <div class="example-block"><img src="../img/tabla_2anualidadV.png" alt="Tabla Tasa i=2% mensual, plazo en meses" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 3: Valor F de \(R_v\) </h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una familia desea saber cuánto dinero tendrá dentro de un año, si por la compra de un calentador solar podrá ahorrar $1,500 de gas bimestralmente, depositando esa cantidad en una cuenta que le paga una tasa del 3.4% bimestral.</p></div>
                 <div class="example-block"><img src="../img/ejemplo_3anualidadV.png" alt="Diagrama Ejemplo 3" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 1,500 bimestrales</span><span><strong>\(n\) =</strong> 1 año = 6 bimestres</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{1{,}500}{0.034}\right)\left((1 + 0.034)^6 - 1\right) \)</div><div class="formula-display">\( F = (44{,}117.65)(0.222\ldots) \)</div><div class="result-box"><div class="formula-display">\( F = 9{,}800.58 \)</div></div></div>
                 <div class="example-block"><p>Comprobando con una tabla:</p><img src="../img/tabla_3anualidadV.png" alt="Tabla Tasa i=3.4% bimestral" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 4:\(R_v\) a valor de F </h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un estudiante de turismo necesita reunir $3,500 dentro de 2 meses, para lo cual decide ahorrar en un banco que le paga el 1.5875% quincenal. Determine cuánto necesita depositar cada quincena.</p></div>
                 <div class="example-block"><img src="../img/ejemplo_4anualidad.png" alt="Diagrama Ejemplo 4" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? quincenales</span><span><strong>\(F\) =</strong> 3,500</span><span><strong>\(n\) =</strong> 2 meses = 4 quincenas</span></div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{F \, i}{(1+i)^n - 1} \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{3{,}500 \times 0.015875}{(1 + 0.015875)^4 - 1} \)</div><div class="formula-display">\( R_v = \dfrac{55.5625}{0.0650\ldots} \)</div><div class="result-box"><div class="formula-display">\( R_v = 854.44 \text{ quincenales} \)</div></div></div>
                 <div class="example-block"><p>Comprobando mediante una tabla:</p><img src="../img/tabla_4anualidadV.png" alt="Tabla Tasa i=1.5875%" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

            <section>
                 <h2>Ejemplo 5: \(R_v\) a valor de F</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Un ingeniero mecánico electricista desea poner un taller, para lo cual proyecta requerir $250,000 dentro de dos años. Si invierte su dinero a una tasa del 0.65% semanal, determine cuánto deberá invertir mensualmente.</p></div>
                 <div class="example-block"><img src="../img/ejemplo_5anualidadV.png" alt="Diagrama Ejemplo 5" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? mensuales</span><span><strong>\(F\) =</strong> 250,000</span><span><strong>\(n\) =</strong> 2 años = 24 meses</span></div></div>
                 <div class="example-block"><h3>Cambio de tasa:</h3><div class="formula-display">\( i_q = (1 + 0.0065)^{52/12} - 1 = 0.0284\ldots \text{ mensual} \)</div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{F \, i}{(1+i)^n - 1} \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{250{,}000 \times 0.0284\ldots}{(1 + 0.0284\ldots)^{24} - 1} \)</div><div class="formula-display">\( R_v = \dfrac{7{,}118.337\ldots}{0.9617\ldots} \)</div><div class="result-box"><div class="formula-display">\( R_v = 7{,}401.81 \text{ mensuales} \)</div></div></div>
                 <div class="example-block"><p>A continuación los 3 últimos periodos de la tabla:</p><img src="../img/tabla_5anualidadV.png" alt="Tabla Tasa i=0.0284% mensual, plazo en meses" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>

             <section>
             <h2>Ejemplo 6: Plazo de \(R_v\) a valor \(F\)</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>Una estilista desea remodelar su estética, para lo cual cotizó el día de hoy un equipo en $30,000. Estima que para cuando lo pueda comprar, tendrá que pagar $33,350 por el efecto de la inflación. Si puede ahorrar $7,550 trimestrales, y le pagarán una tasa del 6.65% trimestral, determine en cuánto tiempo logrará su objetivo.</p></div>
             <div class="example-block"><img src="../img/ejemplo_6anualidadV.png" alt="Diagrama Ejemplo 6" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 7,550 trimestrales</span><span><strong>\(F\) =</strong> 33,350</span><span><strong>\(n\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{F\,i}{R_v} + 1\right)}{\log(1+i)} \)</div></div>
             <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{33{,}350 \times 0.0665}{7{,}550} + 1\right)}{\log(1 + 0.0665)} \)</div><div class="formula-display">\( n = \dfrac{\log(1.2937\ldots)}{\log(1.0665)} = \dfrac{0.1118\ldots}{0.0279\ldots} \)</div><div class="result-box"><div class="formula-display">\( n = 4.00\ldots \text{ trimestres} = 1 \text{ año} \)</div></div></div>
             <div class="example-block"><p>La periodicidad del plazo está determinada por las de la \(R_v\) y tasa.</p><p>Comprobando mediante una tabla:</p><img src="../img/tabla_6anualidadV.png" alt="Tabla Tasa i=6.65% trimestral, plazo en trimestres" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><p>Como el plazo no es exacto, la diferencia se ajustó en el último ahorro.</p></div>
            </section>
             <div class="section-divider"></div>

             <section>
             <h2>Ejemplo 7: Plazo de \(R_v\) a valor \(F\)</h2>
             <div class="example-block"><h3>Planteamiento</h3><p>¿Cuánto tiempo le llevará a un comerciante el poder reunir $50,000 para renovar su camioneta de reparto, si sólo puede ahorrar $4,000 quincenales, por los cuales consigue que le paguen una tasa del 14.58% semestral?</p><p>Como la periodicidad de la renta es quincenal, se requiere una conversión de tasa, y en consecuencia, el plazo saldrá en quincenas.</p></div>
             <div class="example-block"><img src="../img/ejemplo_7anualidadV.png" alt="Diagrama Ejemplo 7" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 4,000 quincenales</span><span><strong>\(F\) =</strong> 50,000</span><span><strong>\(n\) =</strong> ?</span></div></div>
             <div class="example-block"><h3>Cambio de tasa:</h3><div class="formula-display">\( i_q = (1 + 0.1458)^{2/24} - 1 = 0.0114\ldots \text{ quincenal} \)</div></div>
             <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{F\,i}{R_v} + 1\right)}{\log(1+i)} \)</div></div>
             <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( n = \dfrac{\log\!\left(\dfrac{50{,}000 * 0.0114\ldots}{4{,}000} + 1\right)}{\log(1 + 0.0114\ldots)} \)</div><div class="formula-display">\( n = \dfrac{\log(1.142\ldots)}{\log(1.014\ldots)} = \dfrac{0.0578\ldots}{0.0049\ldots} \)</div><div class="result-box"><div class="formula-display">\( n = 11.751\ldots \text{ quincenas} \)</div></div></div>
             <div class="example-block"><p>A continuación se muestran los 3 últimos periodos de la tabla:</p><img src="../img/tabla_7anualidadV.png" alt="Tabla Tasa i=0.0114% quincenal, plazo en quincenas" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
             <div class="example-block"><p>Observe que aún no se alcanza a reunir los $50,000. Más adelante se aprenderá a ajustar la última renta en el periodo, o un periodo después.</p></div>
            </section>
             <div class="section-divider"></div>

             <section>
                 <h2>Ejemplo 8: Tasa de interés de \(R_v\) a valor \(F\)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>Una compañía ofrece a sus empleados, un plan de ahorro consistente en un pago único por $21,190 al final del año, a las personas que ahorren $300 semanales. Determine la tasa semanal que paga la compañía, así como la tasa anual.</p><p>Al tener las variables de renta y plazo en semanas, la tasa saldrá semanal.</p></div>
                 <div class="example-block"><img src="../img/ejemplo_8anualidadV.png" alt="Diagrama Ejemplo 8" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 300 semanales</span><span><strong>\(F\) =</strong> 21,190</span><span><strong>\(n\) =</strong> 1 año = 52 semanas</span></div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="result-box"><div class="formula-display">\( 21{,}190 = \left(\dfrac{300}{i}\right)\left((1+i)^{52} - 1\right) \)</div></div></div>
                 <div class="example-block"><div class="didactic-note"<p>Los valores de ensayo de \(i\), al tratarse de la variable \(F\), se comportan de una manera directa al resultado obtenido. Es decir, si el resultado se quiere disminuir, la tasa se debe disminuir. Si por el contrario dicho resultado se desea aumentar, la tasa se deberá aumentar.</p></div><p>Para el ensayo de valores se puede emplear un algoritmo con calculadora científica, la función SOLVE que sólo ciertos modelos poseen, la función TASA de las hojas de cálculo, interpolando, tabular los valores de ensayo de \(i\), al sustituirlos en la ecuación simplificada del diagrama anterior, o ya bien, emplear el simulador provisto para dicho fin.</p><p>Se dará por bueno el valor de ensayo de \(i\) que más se aproxime a la igualdad, bajo el criterio de 4 decimales, no importando queda por abajo o encima de 21,190. Se sugieren los valores de ensayo de \(i\) en un rango de 0.01 a 0.05.</p></div>
                 <div class="example-block"><img src="../img/tabla_8anualidadV.png" alt="Tabla de ensayo de valores de i" style="width:100%; max-width:500px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><p>Se da por bueno el valor de 0.0115 o 1.15% semanal, ya que resultó el valor con menor diferencia para cumplir con la igualdad.</p><p>Seguidamente se ilustran los 3 últimos periodos de una tabla.</p><img src="../img/tabla_8-1anualidadV.png" alt="Tabla Tasa i=0.0115% semanal, plazo en semanas" style="width:100%; max-width:600px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>La tasa equivalente anual resulta:</h3><div class="formula-display">\( i_q = (1.0115)^{52/1} - 1 = 0.8122\ldots \text{ o } 81.23\% \text{ anual} \)</div></div>
                 <div class="example-block"><h3>Comprobación:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div><div class="formula-display">\( F = \left(\dfrac{300}{0.0115}\right)\left((1 + 0.0115)^{52} - 1\right) \)</div><div class="formula-display">\( F = (26{,}086.95\ldots)(0.812\ldots) = 21{,}190 \)</div></div>
                 <div class="example-block"><p>Si se anualizan los 52 pagos semanales de 300 cada uno tenemos: \(300 \times 52 = 15{,}600\) para considerarlos \(P\) con el fin de obtener el interés anual y tasarlo, tendremos que: \(I = F - P = 21{,}190 - 15{,}600 = 5{,}590\) en un año. Si en base a ello, determinamos la tasa de interés generada tendremos:</p><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{5{,}590}{21{,}190} = 0.2638\ldots \text{ o } 26.38\% \text{ anual} \)</div><p>Lo cual evidentemente es un error, dado que tan sólo anualizar proporcionalmente la tasa de interés obtenida, como en \(Is\) resultaría: 1.15% semanal \(\times\) 52 semanas = 59.80% anual. Ambos cálculos serán erróneos en \(Ic\).</p><p>La forma correcta de obtener el interés y la tasa aplicada en toda la serie requerirá obtener el valor \(P\) de la serie, al día inicial, y equipararlo con un <em>Principal</em> para obtener la tasa equivalente:</p></div>
                 <div class="example-block"><h3>Datos:</h3><div class="variable-grid"><span><strong>\(P\) =</strong> ?</span><span><strong>\(R_v\) =</strong> 300 semanal</span><span><strong>\(n\) =</strong> 52 semanas</span><span><strong>\(i\) =</strong> 1.15% semanal</span></div></div>
                 <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( P = \left(\dfrac{R_v}{i}\right)\left(1 - (1+i)^{-n}\right) = \left(\dfrac{300}{0.0115}\right)\left(1 - (1 + 0.0115)^{-52}\right) \)</div><div class="formula-display">\( P = (26{,}086.95\ldots)(0.4482\ldots) = 11{,}692.43 \)</div></div>
                 <div class="example-block"><h3>Interés:</h3><div class="formula-display">\( I = F - P = 21{,}190 - 11{,}692.43 = 9{,}497.57 \)</div></div>
                 <div class="example-block"><h3>Tasa:</h3><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{9{,}497.57}{11{,}692.43} = 0.81228\ldots \text{ u } 81.23\% \text{ anual} \)</div><p>Lo cual es la interpretación correcta del interés y tasa generados en una anualidad.</p></div>
                 <div class="example-block"><p>La otra forma de interpretar la equivalencia de las tasas es obtener \(F\) a partir de cualquier \(P\), por ejemplo 7,543, obtener el interés y compararlos mediante una razón como ya se ha realizado anteriormente. Tomemos el mismo plazo de un año:</p></div>
                 <div class="example-block"><h3>Datos:</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 7,543</span><span><strong>\(F\) =</strong> ?</span><span><strong>\(n\) =</strong> 1 año = 52 semanas</span><span><strong>\(i_q\) =</strong> ? anual</span></div></div>
                 <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n = 7{,}543(1 + 0.0115)^{52} = 13{,}670.05 \)</div><div class="formula-display">\( I = F - P = 13{,}670.05 - 7{,}543 = 6{,}127.05 \)</div><div class="result-box"><div class="formula-display">\( i_q = \dfrac{I}{P} = \dfrac{6{,}127.05}{7{,}543} = 0.81228\ldots \text{ u } 81.23\% \text{ anual} \)</div></div><p>Tome en cuenta este ejemplo al interpretar el interés total de una anualidad y la tasa de interés generada, ya que será de mucha utilidad en temas posteriores, para obtener e interpretar la tasa anual.</p></div>
            </section>
                <div class="section-divider"></div>
            <section>
                 <h2>Ejemplo 9: \(FA\) con \(R_v\)</h2>
                 <div class="example-block"><h3>Planteamiento</h3><p>La Alcaldía de una ciudad establece un \(FA\) en el cual planea depositar $450,000 anuales durante 20 años, obteniendo una tasa del 5% anual; determine el saldo acumulado al término, así como la cantidad acumulada al final del 8º año. Realice una tabla que muestre la situación.</p><p>Como puede apreciarse, se trata de aplicar la teoría de las anualidades con la \(R_v\) anteriormente estudiada. Determinemos primero el valor \(F\).</p></div>
                 <div class="example-block"><img src="../img/ejemplo_9FA.png" alt="Diagrama FA n=20" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 450,000 anuales</span><span><strong>\(n\) =</strong> 20 años</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{450{,}000}{0.05}\right)\left((1.05)^{20} - 1\right) \)</div><div class="formula-display">\( F = (9{,}000{,}000)(1.6532\ldots) \)</div><div class="result-box"><div class="formula-display">\( F = 14{,}879{,}679.35 \)</div></div></div>
                 <div class="example-block"><h3>Ahora determinemos el \(S_f\) del año 8.</h3></div>
                 <div class="example-block"><img src="../img/ejemplo_9-1FA.png" alt="Diagrama FA n=8" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 450,000 anuales</span><span><strong>\(n\) =</strong> 8 años</span><span><strong>\(F\) =</strong> ?</span></div></div>
                 <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                 <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{450{,}000}{0.05}\right)\left((1.05)^8 - 1\right) \)</div><div class="formula-display">\( F = (9{,}000{,}000)(0.477\ldots) \)</div><div class="result-box"><div class="formula-display">\( F = 4{,}297{,}098.99 \)</div></div></div>
                 <div class="example-block"><p>Por último realicemos una tabla del \(FA\):</p><img src="../img/tabla_9FA.png" alt="Tabla FA Tasa i=5% anual, plazo en años" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                 <div class="example-block"><p>La mecánica de las tablas por periodo es muy similar, sólo que ahora se integra una columna llamada Agregado al Fondo (\(AF\)), el cual se obtiene con \(I + R_v\).</p></div>                 
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 10: \(FA\) con cambio de tasa en \(R_v\)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>Un municipio de una pequeña provincia emite obligaciones pagaderas forzosamente dentro de 10 años, por un total de $500,000, con el fin de disponer de recursos inmediatos para obras de alcantarillado, desazolve y alumbrado público. Para poder pagar dichas obligaciones, invertirá en un \(FA\) a una tasas semestrales del 22.5% y 20.9% durante 5 y 5 años, respectivamente. Determine el valor de los ahorros semestrales, antes y después del cambio de tasa. Haga una tabla por periodo.</p><p>Para empezar se debe considerar que no se conoce cuándo cambiará la tasa, y se debe calcular la primera renta con el plazo total; en caso de calcularlo con 5 años, se obtendrá la renta que reúna el total en 5 años, y eso es incorrecto. Con ella se deberá realizar la primera parte de la tabla del \(FA\).</p></div>
                <div class="example-block"><img src="../img/ejemplo_10FA.png" alt="Diagrama FA parte 1 n=20" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? semestrales</span><span><strong>\(F\) =</strong> 500,000</span><span><strong>\(n\) =</strong> 10 años = 20 semestres</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{F\,i}{(1+i)^n - 1} \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{500{,}000 \times 0.225}{(1 + 0.225)^{20} - 1} \)</div><div class="formula-display">\( R_v = \dfrac{112{,}500}{56.9057\ldots} \)</div><div class="formula-display">\( R_v = 1{,}976.95 \text{ semestrales} \)</div></div>
                <div class="example-block"><img src="../img/tabla_10FA.png" alt="Tabla FA Tasa i=22.5% semestral parte 1" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Ahora mediante diagrama y fórmula de \(F\) a final del 10º semestre:</h3></div>
                <div class="example-block"><img src="../img/ejemplo_10-1FA.png" alt="Diagrama FA F al semestre 10" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 1,976.95 semestrales</span><span><strong>\(n\) =</strong> 10 semestres</span><span><strong>\(F\) =</strong> ?</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = \left(\dfrac{1{,}976.95}{0.225}\right)\left((1.225)^{10} - 1\right) \)</div><div class="formula-display">\( F = (8{,}786.44\ldots)(6.6095\ldots) \)</div><div class="formula-display">\( F = 58{,}074.74 \)</div></div>
                <div class="example-block"><p>El \(S_f\) obtenido se capitaliza hasta el final del periodo 20, se compara con el \(S_m\), y el faltante se considerará el valor \(F\) de la nueva serie de \(R_v\). Tome en cuenta que la tasa cambió al 20.9% semestral:</p></div>
                <div class="example-block"><img src="../img/ejemplo_10-2FA.png" alt="Diagrama capitalización saldo inicial" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos Saldo inicial:</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 58,074.74</span><span><strong>\(n\) =</strong> 10 semestres</span><span><strong>\(F\) =</strong> ?</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = P(1+i)^n \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( F = 58{,}074.74(1 + 0.209)^{10} \)</div><div class="formula-display">\( F = 387{,}480.88 \)</div><div class="formula-display"><strong>Saldo Meta:</strong> \( S_m = F_i = 500{,}000 \)</div><div class="formula-display"><strong>Nueva Meta:</strong> \( F = S_m - S_i = 500{,}000 - 387{,}480.88 = 112{,}519.12 \)</div></div>
                <div class="example-block"><p>La nueva meta será el valor \(F\) respecto de la nueva serie de \(R_v\).</p></div>
                <div class="example-block"><img src="../img/ejemplo_10-3FA.png" alt="Diagrama FA parte 2 nueva Rv" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? semestrales</span><span><strong>\(F\) =</strong> 112,519.12</span><span><strong>\(n\) =</strong> 5 años = 10 semestres</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{F\,i}{(1+i)^n - 1} \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{112{,}519.12 \times 0.209}{(1 + 0.209)^{10} - 1} \)</div><div class="formula-display">\( R_v = \dfrac{23{,}516.49\ldots}{5.672\ldots} \)</div><div class="result-box"><div class="formula-display">\( R_v = 4{,}145.99 \text{ semestrales} \)</div></div></div>
                <div class="example-block"><p>Concluyamos la segunda parte de la tabla, retomando el \(S_f\) del 10º periodo.</p><img src="../img/tabla_10-1FA.png" alt="Tabla FA segunda parte Tasa i=22.5% semestral" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
            </section>
            <div class="section-divider"></div>
            <section>
                <h2>Ejemplo 11: \(FA\). Tasa de Interés en \(R_v\)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>El departamento de la tesorería del cierto estado proyecta la repavimentación de las principales avenidas de la capital, para lo cual requerirá hoy de $30,000,000. Se financia a 5 años, ofreciendo pagar una tasa del 24% anual. Para cumplir con el pago de la obligación contraída, estima que puede invertir $2,150,000 trimestrales en un \(FA\). Determine la tasa de interés trimestral y anual que requiere que le paguen para cumplir su objetivo. Realice una tabla que muestre la situación.</p><p>Obtengamos primero el importe a pagar al término:</p></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(P\) =</strong> 30,000,000</span><span><strong>\(i\) =</strong> 24% anual</span><span><strong>\(n\) =</strong> 5 años</span><span><strong>\(F\) =</strong> ?</span></div></div>
                <div class="example-block"><h3>Solución:</h3><div class="formula-display">\( F = P(1+i)^n \)</div><div class="formula-display">\( F = 30{,}000{,}000(1.05)^5 = 87{,}948{,}751.87 \)</div><p>Ahora determinemos la tasa trimestral y anual requeridas.</p></div>
                <div class="example-block"><img src="../img/ejemplo_11FA.png" alt="Diagrama Ejemplo 14" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 2,150,000 trimestrales</span><span><strong>\(F\) =</strong> 87,948,751.87</span><span><strong>\(n\) =</strong> 5 años = 20 trimestres</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( F = \left(\dfrac{R_v}{i}\right)\left((1+i)^n - 1\right) \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( 87{,}948{,}751.87 = \left(\dfrac{2{,}150{,}000}{i}\right)\left((1+i)^{20} - 1\right) \)</div><div class="formula-display">\( i = 0.0698 \text{ trimestral por tanteo} \)</div><div class="formula-display">\( i_q = (1 + 0.0698)^{4/1} = 0.3098\ldots \)</div><div class="result-box"><div class="formula-display">\( i_q = 30.98\% \text{ anual} \)</div></div></div>
                <div class="example-block"><p>La tasa del 0.0698 trimestral obtenida mediante el criterio de 4 decimales un buen referente. Si se prefiere, puede seguir el tanteo a más decimales, o emplear otro método como el simulador provisto y obtener la tasa más exacta: \(i = 0.0698007201281353\).</p><p>La tasa anual obtenida es mayor a la tasa del préstamo en casi 7 puntos porcentuales: \(30.98\% - 24\% = 6.98\%\). Lo cual no es factible de encontrar porque en cualquier contexto, la tasa que nos cobran por un préstamo siempre será mayor a la que nos paguen por invertir.</p></div>
                <div class="example-block"><p>Para ejemplo en México, por muchos años predominó una tasa de interés en inversiones de máximo el 8% anual, mientras que si se solicitaba un préstamo o se disponía de créditos de cualquier tipo, la tasa a pagar era de hasta un 45%. Resulta obvio que la diferencial representa la ganancia de los centros financieros, puesto a eso se dedican: Captar recursos a una tasa baja y prestarlos a una tasa altísima.</p><p>Realicemos una tabla del \(FA\) que muestra la situación:</p><img src="../img/tabla_11FA.png" alt="Tabla FA Tasa i=6.98% trimestral por tanteo, plazo en trimestres" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><p>El resultado es aproximado al igual que la tasa. Si gusta se puede referir al llenado de la tabla, mediante la aplicación de los algoritmos de calculadora científica o empleando el simulador.</p></div>
            </section>
            <div class="section-divider"></div>
            <section>
                <div class="example-block">
                <h2>Ejemplo 12: \(FA\) vs. \(AM\) con \(R_v\)</h2>
                <div class="example-block"><h3>Planteamiento</h3><p>El departamento de la tesorería del estado del problema anterior, después de agotar sus opciones, encuentra que para pagar el préstamo de $87,948,751.87 al término de los 5 años de plazo, consigue crear un \(FA\) a una tasa del 15% anual. Determine el valor de las reservas anuales, así como la tasa anual que realmente se terminará pagando por este préstamo. Realice la tabla que muestre la situación.</p><p>Determinemos primero el valor de las reservas anuales y su tabla por periodo.</p></div>
                <div class="example-block"><img src="../img/ejemplo_12FA.png" alt="Diagrama FA Ejemplo 15" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? anuales</span><span><strong>\(n\) =</strong> 5 años</span><span><strong>\(F\) =</strong> 87,948,751.87</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{F\,i}{(1+i)^n - 1} \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{87{,}948{,}751.87 \times 0.15}{(1 + 0.15)^5 - 1} \)</div><div class="formula-display">\( R_v = \dfrac{13{,}192{,}312.78\ldots}{(1 + 0.15)^5 - 1} \)</div><div class="formula-display">\( R_v = \dfrac{13{,}192{,}312.78\ldots}{1.0113\ldots} \)</div><div class="result-box"><div class="formula-display">\( R_v = 13{,}044{,}167.72 \text{ anuales} \)</div></div></div>
                <div class="example-block"><img src="../img/tabla_12FA.png" alt="Tabla FA Tasa i=15% anual, plazo en años" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><p>Determinemos ahora la tasa anual que realmente se terminará pagando por el préstamo original de $30,000,000 del ejemplo previo. Para ello, se debe relacionar solamente el valor del préstamo original, y los pagos anuales a realizar en el plazo.</p></div>
                <div class="example-block"><img src="../img/ejemplo_12-1FA.png" alt="Diagrama AM Ejemplo 15" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> 13,044,167.72 anuales</span><span><strong>\(P\) =</strong> 30,000,000</span><span><strong>\(n\) =</strong> 5 años</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( P = \left(\dfrac{R_v}{i}\right)\left(1 - (1+i)^{-n}\right) \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( 30{,}000{,}000 = \left(\dfrac{13{,}044{,}167.72}{i}\right)\left(1 - (1+i)^{-5}\right) \)</div><div class="result-box"><div class="formula-display">\( i = 0.3305 = 33.05\% \text{ anual por tanteo} \)</div></div></div>
                <div class="example-block"><p>Para comprobar la tasa resultante, realicemos una tabla de \(AM\) hipotética, ya que el préstamo lo adeuda a su acreedor, y los pagos los realiza a la institución donde constituyó el \(FA\).</p><img src="../img/tabla_12-1FA.png" alt="Tabla AM Tasa i=33.05% anual, plazo en años" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><p>Una forma aproximada de obtener la tasa anual que realmente se termina pagando por el préstamo, es obtener la diferencia entre las tasas del préstamo original y del \(FA\): \(24\% - 15\% = 9\%\), y adicionarla a la tasa del préstamo inicial: \(24\% + 9\% = 33\%\). Situación para tomar en cuenta cuando se vea en la necesidad de pedir un préstamo que no permita su amortización, sino que se estipula a un plazo forzoso.</p><p>Ahora calculemos la \(R_v\) <em>si se pudiera amortizar</em> el préstamo original, elaborando una tabla para contrastar las dos soluciones.</p></div>
                <div class="example-block"><img src="../img/ejemplo_12-2FA.png" alt="Diagrama AM amortización directa Ejemplo 15" style="width:100%; max-width:300px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><h3>Datos</h3><div class="variable-grid"><span><strong>\(R_v\) =</strong> ? anuales</span><span><strong>\(P\) =</strong> 30,000,000</span><span><strong>\(n\) =</strong> 5 años</span></div></div>
                <div class="example-block"><h3>Fórmula:</h3><div class="formula-display">\( R_v = \dfrac{P\,i}{1 - (1+i)^{-n}} \)</div></div>
                <div class="example-block"><h3>Sustitución y simplificación:</h3><div class="formula-display">\( R_v = \dfrac{30{,}000{,}000 \times 0.24}{1 - (1 + 0.24)^{-5}} \)</div><div class="formula-display">\( R_v = \dfrac{7{,}200{,}000}{0.6588\ldots} \)</div><div class="result-box"><div class="formula-display">\( R_v = 10{,}927{,}431.45 \text{ anuales} \)</div></div></div>
                <div class="example-block"><p>Era de esperarse que los pagos resultaran menores (\(13{,}044{,}167.72\) vs. \(10{,}927{,}431.45\)) ya que amortizar las deudas siempre será menos oneroso que constituir \(FA\) para pagarlas con todo e intereses al término del plazo.</p><img src="../img/tabla_12-2FA.png" alt="Tabla AM Tasa i=24% anual, plazo en años" style="width:100%; max-width:700px; display:block; margin: 1.5rem auto;"></div>
                <div class="example-block"><p>Por lo tanto, siempre será muy importante agotar las opciones de pago que se tengan, antes de optar por crear \(FA\). Ese lujo sólo se lo pueden dar los gobiernos porque los costos recaen en el gasto público que emana de los impuestos a la población.</p></div>
                </div>
            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejemplos">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejemplos</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/fondo_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
