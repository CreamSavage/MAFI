<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Fondo de Amortización (Renta Anticipada)', [
    'mathjax' => true,
    'mathjaxInlineDollar' => true,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejercicios propuestos $AA$ y $FA$ con $R_A$ a valor $F$
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Ejercicios</h2>

                <div class="definition-block">
                <h3>Ejercicio 1</h3>
                    <p>
                        Obtenga el valor $F$uturo de las siguientes series anticipadas:<br>
                        a) 150 pagos semanales de \$1,321 c/u, a una tasa del 0.54% semanal.<br>
                        b) 24 depósitos bimestrales de \$13,750 c/u, a una tasa del 3% bimestral.<br>
                        c) 6 rentas anuales de \$1,850,000 c/u, a una tasa del 12.16% semestral.<br>
                        d) 12 rentas mensuales de \$3,444 c/u, a una tasa del 0.9% semanal.<br>
                        e) 14 ahorros trimestrales de \$6,800 c/u, a una tasa anual proporcional trimestral del 32.7%.<br>
                        f) 36 abonos cuatrimestrales de \$12,520 c/u, a una tasa anual proporcional diaria del 52.6%.
                    </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 2</h3>
                    <p>¿A cuánto asciende el saldo de la cuenta de un cerrajero que ahorra \$7,400 quincenales durante 3 meses a partir de hoy, si la tasa que le paga el banco es del 5.27% bimestral? </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3</h3>
                    <p>¿Cuánto tendrá en su cuenta de ahorros un actor teatral que decide ahorrar desde el día de hoy \$15,000 quincenales durante un año y medio, con la finalidad de impulsar su carrera artística en el extranjero? Considere que el banco le garantiza una tasa de interés del 18.75% anual?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4</h3>
                    <p>Una cadena local de restaurantes requiere adquirir un paquete de 10 máquinas fabricadoras de hielo comercial, cuyo precio en paquete se estima que será de \$178,150 dentro de un año. Determine cuánto deberá depositar trimestralmente a partir de hoy, en un banco que le paga el 11.15% de interés semestral.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5</h3>
                    <p>Para reunir el costo de \$200,000 por concepto de renta a final de cada mes, de un local de 20 m2 en una plaza comercial prestigiada, un locatario prevé reservar una cantidad fija de sus ganancias; si lo deposita en línea a partir de hoy en una cuenta que le paga una tasa del 0.35% diario, determine ¿cuánto deberá depositar diariamente? ¿y cuánto semanalmente?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6</h3>
                    <p>¿En cuánto tiempo se lograrán reunir \$500,000 depositando a partir del día de hoy, \$1,000 semanales a una tasa de interés del 37.96 % anual proporcional semanal?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7</h3>
                    <p>Un director comercial en retiro apoya con alojamiento temporal y comida a migrantes. Si puede aportar de su pensión \$35,000 mensuales anticipados para abrir otro albergue que estima le cueste \$750,000, determine cuánto tiempo le llevará reunirlos en una cuenta que le paga el 28% anual</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8</h3>
                    <p>Una pareja de novios planea casarse hasta que logre reunir \$80,000 para tal evento; como ambos trabajan, en total realizarán depósitos semanales anticipados de \$5,500 en una cuenta que le paga una tasa del 8% semestral. Determine en cuánto tiempo logrará realizar su objetivo, así como el valor del depósito final para alcanzarlo. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9</h3>
                    <p>Un viaje a Venecia todo incluido está cuesta actualmente \$35,000 por persona. Considerando un efecto inflacionario del 10%, se requerirán \$38,500 en un futuro inmediato. Como un regalo a su esposa, un doctor planea reunir \$77,000 para viajar ambos y cumplir una promesa añeja. Si logra ahorrar \$5,000 quincenales a partir de hoy, en una cuenta que le paga un interés del 18% anual, Determine cuándo podrá realizar su meta, así como el importe del ahorro final para lograr su objetivo. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10</h3>
                    <p>Con motivo de ahorrar para acudir a un concierto de ópera en primera fila, un estudiante de música se propone reunir \$9,500; si se sabe que el concierto tardará en llegar a su ciudad en 7 meses, y el estudiante puede ahorrar \$1,200 mensuales a partir de hoy, ¿qué tasa de interés necesita para alcanzar su objetivo? Obtenga también su equivalente anual. </p>
                </div>    
                    
                <div class="definition-block">
                    <h3>Ejercicio 11</h3>
                    <p>Una caja de ahorro popular ofrece entregar \$200,000 dentro de 2 años a las personas que a partir de hoy aporten \$3,000 quincenales. Obtenga la tasa de interés quincenal y su equivalente anual que paga la institución financiera.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12</h3>
                    <p>Un organismo de prestación de servicios de agua establece un $FA$ por \$1,850,000 anuales anticipados durante 15 años, obteniendo una tasa del 11.5% anual; determine el saldo acumulado al término, así como la cantidad acumulada al final del 10º año. Realice una tabla que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 13</h3>
                    <p>El ayuntamiento de un municipio del Estado de México establece un $FA$, a una tasa de interés del 38% anual proporcional mensual, en el cual requiere invertir \$855,000 cuatrimestrales durante 4 años, empezando desde el día de hoy; determine: <br> a) cuál es el Saldo Final que le permitirá hacer frente a sus obligaciones futuras<br> b) la cantidad acumulada en el Fondo al final de 3 años. Realice una tabla que muestre la situación. </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 14</h3>
                    <p>En el problema anterior, el ayuntamiento desea conocer la cantidad anticipada que debe invertir mensualmente en el $FA$, para cumplir sus obligaciones en el plazo estipulado y con la misma tasa. Realice una tabla que muestre la situación durante el primer año. Compare el resultado con la tabla del problema anterior </p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 15</h3>
                    <p>El patronato de una prestigiosa universidad, requiere emitir obligaciones por un equivalente futuro de \$5,000,000; si estima que aportando \$150,000 quincenales anticipados a un $FA$ que paga el 28% anual proporcional quincenal; determine cuánto tiempo tardará en reunir la cantidad, y el importe del ahorro final. Realice la tabla que muestre la situación de los 5 últimos periodos.</p>
                </div>
            </section>
            <div class="section-divider"></div>

                <section>
                    <h2>Resultados</h2> <div class="definition-block">
                        <p><strong>1.</strong> a)  $F$= \$305,720.27		b)  $F$= \$487,564.88	c)  $F$= \$26,731,603.58
                                                d)  $F$= \$53,670.94		e)  $F$= \$180,368.54	f)  $F$= \$42,659,982.52 </p>
                        <p><strong>2.</strong> $F$= \$46,451.95</p>
                        <p><strong>3.</strong> $F$= \$618,193.83 </p>
                        <p><strong>4.</strong> $R_A$= \$38,956.60 trimestrales</p>
                        <p><strong>5.</strong> $R_A$= \$6,312.35 diarios </p>
                        <p><strong>6.</strong> $n$= 210.5129… semanas, o 4 años, 17 días </p>
                        <p><strong>7.</strong> $n$= 17.6010… meses, o 1 año, 5 meses, 18 días </p>
                        <p><strong>8.</strong> $n$= 3 meses, 8 días;	lograrán reunirlos con 14 depósitos semanales anticipados de \$5,500 y un último de \$1,265.86 al inicio de la semana 15 </p>
                        <p><strong>9.</strong> $n$= 7 meses, 9 días;	logrará reunirlos con 14 depósitos quincenales anticipados de \$5,000 y un último de \$3,255.61 al inicio de la quincena 15 </p>
                        <p><strong>10.</strong> $i$= 3.08% mensual 		$i$= 43.86% anual </p>
                        <p><strong>11.</strong> $i$= 1.29% quincenal  		$i$= 35.87% anual </p>
                        <p><strong>12.</strong> $F$= \$73,869,191.59; 	$F_10$= \$35,334,850.58 <br>
                        <div class="table-responsive"><table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-family: Arial, sans-serif; font-size: 0.9em; text-align: right;"><thead><tr style="border-bottom: 2px solid #333; background-color: #f8f9fa;">
                <th style="padding: 8px; text-align: center;">Plazo (n)</th><th style="padding: 8px;">Saldo inicial (SI)</th><th style="padding: 8px;">Ahorro Anticipado (R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Parcial (Sp = SI + R<sub>A</sub>)</th><th style="padding: 8px;">Interés (I = Sp * i)</th><th style="padding: 8px;">Agregado al fondo (AF = I + R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Final (SF = SI + AF)</th></tr></thead>
        <tbody><tr><td style="padding: 5px; text-align: center;">1</td><td>0.00</td><td>1,850,000.00</td><td>1,850,000.00</td><td>212,750.00</td><td>2,062,750.00</td><td>2,062,750.00</td></tr>
            <tr><td style="padding: 5px; text-align: center;">2</td><td>2,062,750.00</td><td>1,850,000.00</td><td>3,912,750.00</td><td>449,966.25</td><td>2,299,966.25</td><td>4,362,716.25</td></tr>
            <tr><td style="padding: 5px; text-align: center;">3</td><td>4,362,716.25</td><td>1,850,000.00</td><td>6,212,716.25</td><td>714,462.37</td><td>2,564,462.37</td><td>6,927,178.62</td></tr>
            <tr><td style="padding: 5px; text-align: center;">4</td><td>6,927,178.62</td><td>1,850,000.00</td><td>8,777,178.62</td><td>1,009,375.54</td><td>2,859,375.54</td><td>9,786,554.16</td></tr>
            <tr><td style="padding: 5px; text-align: center;">5</td><td>9,786,554.16</td><td>1,850,000.00</td><td>11,636,554.16</td><td>1,338,203.73</td><td>3,188,203.73</td><td>12,974,757.89</td></tr>
            <tr><td style="padding: 5px; text-align: center;">6</td><td>12,974,757.89</td><td>1,850,000.00</td><td>14,824,757.89</td><td>1,704,847.16</td><td>3,554,847.16</td><td>16,529,605.05</td></tr>
            <tr><td style="padding: 5px; text-align: center;">7</td><td>16,529,605.05</td><td>1,850,000.00</td><td>18,379,605.05</td><td>2,113,654.58</td><td>3,963,654.58</td><td>20,493,259.63</td></tr>
            <tr><td style="padding: 5px; text-align: center;">8</td><td>20,493,259.63</td><td>1,850,000.00</td><td>22,343,259.63</td><td>2,569,474.86</td><td>4,419,474.86</td><td>24,912,734.48</td></tr>
            <tr><td style="padding: 5px; text-align: center;">9</td><td>24,912,734.48</td><td>1,850,000.00</td><td>26,762,734.48</td><td>3,077,714.47</td><td>4,927,714.47</td><td>29,840,448.95</td></tr>
            <tr style="background-color: #fff9db; font-weight: bold;">
                <td style="padding: 5px; text-align: center;">10</td><td>29,840,448.95</td><td>1,850,000.00</td><td>31,690,448.95</td><td>3,644,401.63</td><td>5,494,401.63</td><td style="border: 2px solid #333;">35,334,850.58</td></tr><tr><td style="padding: 5px; text-align: center;">11</td><td>35,334,850.58</td><td>1,850,000.00</td><td>37,184,850.58</td><td>4,276,257.82</td><td>6,126,257.82</td><td>41,461,108.39</td></tr><tr><td style="padding: 5px; text-align: center;">12</td><td>41,461,108.39</td><td>1,850,000.00</td><td>43,311,108.39</td><td>4,980,777.47</td><td>6,830,777.47</td><td>48,291,885.86</td></tr><tr><td style="padding: 5px; text-align: center;">13</td><td>48,291,885.86</td><td>1,850,000.00</td><td>50,141,885.86</td><td>5,766,316.87</td><td>7,616,316.87</td><td>55,908,202.73</td></tr><tr><td style="padding: 5px; text-align: center;">14</td><td>55,908,202.73</td><td>1,850,000.00</td><td>57,758,202.73</td><td>6,642,193.31</td><td>8,492,193.31</td><td>64,400,396.05</td></tr><tr style="background-color: #e7f5ff; font-weight: bold;"><td style="padding: 5px; text-align: center;">15</td><td>64,400,396.05</td><td>1,850,000.00</td><td>66,250,396.05</td><td>7,618,795.55</td><td>9,468,795.55</td><td style="border: 2px solid #333;">73,869,191.59</td></tr></tbody><tfoot><tr style="border-top: 2px solid #333; font-weight: bold; background-color: #f8f9fa;"><td style="padding: 8px; text-align: center;">Totales</td><td></td><td style="padding: 8px;">27,750,000.00</td><td></td><td style="padding: 8px;">46,119,191.59</td><td></td><td></td></tr></tfoot></table></div></p>
                    <p><strong>13.</strong> a) $F_12$= \$25,274,438.10 ; 	b) $F_9$= \$15,110,331.90 <br>
                <div class="table-responsive"><table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-family: Arial, sans-serif; font-size: 0.9em; text-align: right;"><thead><tr style="border-bottom: 2px solid #333; background-color: #f8f9fa;"><th style="padding: 8px; text-align: center;">Plazo (n)</th><th style="padding: 8px;">Saldo inicial (SI)</th><th style="padding: 8px;">Ahorro Anticipado (R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Parcial (Sp = SI + R<sub>A</sub>)</th><th style="padding: 8px;">Interés (I = Sp * i)</th><th style="padding: 8px;">Agregado al fondo (AF = I + R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Final (SF = SI + AF)</th></tr></thead><tbody><tr><td style="padding: 5px; text-align: center;">1</td><td>0.00</td><td>855,000.00</td><td>855,000.00</td><td>113,553.71</td><td>968,553.71</td><td>968,553.71</td></tr><tr><td style="padding: 5px; text-align: center;">2</td><td>968,553.71</td><td>855,000.00</td><td>1,823,553.71</td><td>242,188.64</td><td>1,097,188.64</td><td>2,065,742.35</td></tr><tr><td style="padding: 5px; text-align: center;">3</td><td>2,065,742.35</td><td>855,000.00</td><td>2,920,742.35</td><td>387,907.76</td><td>1,242,907.76</td><td>3,308,650.11</td></tr><tr><td style="padding: 5px; text-align: center;">4</td><td>3,308,650.11</td><td>855,000.00</td><td>4,163,650.11</td><td>552,980.02</td><td>1,407,980.02</td><td>4,716,630.13</td></tr><tr><td style="padding: 5px; text-align: center;">5</td><td>4,716,630.13</td><td>855,000.00</td><td>5,571,630.13</td><td>739,975.76</td><td>1,594,975.76</td><td>6,311,605.90</td></tr><tr><td style="padding: 5px; text-align: center;">6</td><td>6,311,605.90</td><td>855,000.00</td><td>7,166,605.90</td><td>951,806.66</td><td>1,806,806.66</td><td>8,118,412.55</td></tr><tr><td style="padding: 5px; text-align: center;">7</td><td>8,118,412.55</td><td>855,000.00</td><td>8,973,412.55</td><td>1,191,771.10</td><td>2,046,771.10</td><td>10,165,183.65</td></tr><tr><td style="padding: 5px; text-align: center;">8</td><td>10,165,183.65</td><td>855,000.00</td><td>11,020,183.65</td><td>1,463,605.55</td><td>2,318,605.55</td><td>12,483,789.20</td></tr><tr style="background-color: #fff9db; font-weight: bold;"><td style="padding: 5px; text-align: center;">9</td><td>12,483,789.20</td><td>855,000.00</td><td>13,338,789.20</td><td>1,771,542.70</td><td>2,626,542.70</td><td style="border: 2px solid #333;">15,110,331.90</td></tr><tr><td style="padding: 5px; text-align: center;">10</td><td>15,110,331.90</td><td>855,000.00</td><td>15,965,331.90</td><td>2,120,377.40</td><td>2,975,377.40</td><td>18,085,709.31</td></tr><tr><td style="padding: 5px; text-align: center;">11</td><td>18,085,709.31</td><td>855,000.00</td><td>18,940,709.31</td><td>2,515,541.31</td><td>3,370,541.31</td><td>21,456,250.62</td></tr><tr style="background-color: #e7f5ff; font-weight: bold;"><td style="padding: 5px; text-align: center;">12</td><td>21,456,250.62</td><td>855,000.00</td><td>22,311,250.62</td><td>2,963,187.48</td><td>3,818,187.48</td><td style="border: 2px solid #333;">25,274,438.10</td></tr></tbody><tfoot><tr style="border-top: 2px solid #333; font-weight: bold; background-color: #f8f9fa;"><td style="padding: 8px; text-align: center;">Totales</td><td></td><td style="padding: 8px;">10,260,000.00</td><td></td><td style="padding: 8px;">15,014,438.10</td><td></td><td></td></tr></tfoot></table></div></p>
                    <p><strong>14.</strong> $F_4$= \$968,553.73 Saldo cuatrimestral ≈ $F_1$= \$968,553.71 de la tabla anterior <br> $F_8$= \$2,065,742.39 Saldo cuatrimestral ≈ $F_2$= \$2,065,742.35 de la tabla anterior <br> $F_12$= \$3,308,650.17 Saldo cuatrimestral ≈ $F_3$= \$3,308,650.11 de la tabla anterior <br>
                <div class="table-responsive"><table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-family: Arial, sans-serif; font-size: 0.9em; text-align: right;"><thead><tr style="border-bottom: 2px solid #333; background-color: #f8f9fa;"><th style="padding: 8px; text-align: center;">Plazo (n)</th><th style="padding: 8px;">Saldo inicial (SI)</th><th style="padding: 8px;">Ahorro Anticipado (R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Parcial (Sp = SI + R<sub>A</sub>)</th><th style="padding: 8px;">Interés (I = Sp * i)</th><th style="padding: 8px;">Agregado al fondo (AF = I + R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Final (SF = SI + AF)</th></tr></thead><tbody><tr><td style="padding: 5px; text-align: center;">1</td><td>0.00</td><td>223,847.09</td><td>223,847.09</td><td>7,088.49</td><td>230,935.58</td><td>230,935.58</td></tr><tr><td style="padding: 5px; text-align: center;">2</td><td>230,935.58</td><td>223,847.09</td><td>454,782.67</td><td>14,401.45</td><td>238,248.54</td><td>469,184.12</td></tr><tr><td style="padding: 5px; text-align: center;">3</td><td>469,184.12</td><td>223,847.09</td><td>693,031.21</td><td>21,945.99</td><td>245,793.08</td><td>714,977.20</td></tr><tr style="background-color: #fff9db; font-weight: bold;"><td style="padding: 5px; text-align: center;">4</td><td>714,977.20</td><td>223,847.09</td><td>938,824.29</td><td>29,729.44</td><td>253,576.53</td><td style="border: 2px solid #333;">968,553.73</td></tr><tr><td style="padding: 5px; text-align: center;">5</td><td>968,553.73</td><td>223,847.09</td><td>1,192,400.82</td><td>37,759.36</td><td>261,606.45</td><td>1,230,160.18</td></tr><tr><td style="padding: 5px; text-align: center;">6</td><td>1,230,160.18</td><td>223,847.09</td><td>1,454,007.27</td><td>46,043.56</td><td>269,890.65</td><td>1,500,050.83</td></tr><tr><td style="padding: 5px; text-align: center;">7</td><td>1,500,050.83</td><td>223,847.09</td><td>1,723,897.92</td><td>54,590.10</td><td>278,437.19</td><td>1,778,488.02</td></tr><tr style="background-color: #fff9db; font-weight: bold;"><td style="padding: 5px; text-align: center;">8</td><td>1,778,488.02</td><td>223,847.09</td><td>2,002,335.11</td><td>63,407.28</td><td>287,254.37</td><td style="border: 2px solid #333;">2,065,742.39</td></tr><tr><td style="padding: 5px; text-align: center;">9</td><td>2,065,742.39</td><td>223,847.09</td><td>2,289,589.48</td><td>72,503.67</td><td>296,350.76</td><td>2,362,093.15</td></tr><tr><td style="padding: 5px; text-align: center;">10</td><td>2,362,093.15</td><td>223,847.09</td><td>2,585,940.24</td><td>81,888.11</td><td>305,735.20</td><td>2,667,828.34</td></tr><tr><td style="padding: 5px; text-align: center;">11</td><td>2,667,828.34</td><td>223,847.09</td><td>2,891,675.43</td><td>91,569.72</td><td>315,416.81</td><td>2,983,245.15</td></tr><tr style="background-color: #e7f5ff; font-weight: bold;"><td style="padding: 5px; text-align: center;">12</td><td>2,983,245.15</td><td>223,847.09</td><td>3,207,092.24</td><td>101,557.92</td><td>325,405.01</td><td style="border: 2px solid #333;">3,308,650.17</td></tr></tbody><tfoot><tr style="border-top: 2px solid #333; font-weight: bold; background-color: #f8f9fa;"><td style="padding: 8px; text-align: center;">Totales</td><td></td><td style="padding: 8px;">2,686,165.08</td><td></td><td style="padding: 8px;">622,485.09</td><td></td><td></td></tr></tfoot></table></div></p>
                        <p><strong>15.</strong> $n$= 1 año, 2 meses, 1 día	<br>
                        <div class="table-responsive"><table style="width: 100%; border-collapse: collapse; margin-top: 15px; font-family: Arial, sans-serif; font-size: 0.9em; text-align: right;"><thead><tr style="border-bottom: 2px solid #333; background-color: #f8f9fa;"><th style="padding: 8px; text-align: center;">Plazo (n)</th><th style="padding: 8px;">Saldo inicial (SI)</th><th style="padding: 8px;">Ahorro Anticipado (R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Parcial (Sp = SI + R<sub>A</sub>)</th><th style="padding: 8px;">Interés (I = Sp * i)</th><th style="padding: 8px;">Agregado al fondo (AF = I + R<sub>A</sub>)</th><th style="padding: 8px;">Saldo Final (SF = SI + AF)</th></tr></thead><tbody><tr><td style="padding: 5px; text-align: center;">25</td><td>4,175,125.07</td><td>150,000.00</td><td>4,325,125.07</td><td>50,459.79</td><td>200,459.79</td><td>4,375,584.86</td></tr><tr><td style="padding: 5px; text-align: center;">26</td><td>4,375,584.86</td><td>150,000.00</td><td>4,525,584.86</td><td>52,798.49</td><td>202,798.49</td><td>4,578,383.35</td></tr><tr><td style="padding: 5px; text-align: center;">27</td><td>4,578,383.35</td><td>150,000.00</td><td>4,728,383.35</td><td>55,164.47</td><td>205,164.47</td><td>4,783,547.82</td></tr><tr><td style="padding: 5px; text-align: center;">28</td><td>4,783,547.82</td><td>150,000.00</td><td>4,933,547.82</td><td>57,558.06</td><td>207,558.06</td><td>4,991,105.88</td></tr><tr style="background-color: #e7f5ff; font-weight: bold;"><td style="padding: 5px; text-align: center;">29</td><td>4,991,105.88</td><td>8,894.12</td><td>5,000,000.00</td><td>0.00</td><td>8,894.12</td><td style="border: 2px solid #333;">5,000,000.00</td></tr></tbody><tfoot><tr style="border-top: 2px solid #333; font-weight: bold; background-color: #f8f9fa;"><td style="padding: 8px; text-align: center;">Totales</td><td></td><td style="padding: 8px;">4,208,894.12</td><td></td><td style="padding: 8px;">791,105.88</td><td style="padding: 8px;">5,000,000.00</td><td></td></tr></tfoot></table></div></p>
            </div>
            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/fondo_ra.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
