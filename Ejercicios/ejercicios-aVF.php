<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Anualidad Vencida e Interés Compuesto', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejercicios Propuestos de Interés Compuesto
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Interés Compuesto: Ejercicios</h2>

                <div class="definition-block">
                    <h3>Ejercicio 1</h3>
                    <p>Una niñera de medio tiempo recibió un aguinaldo de $10,250, y ha decidido invertirlo en un banco que paga una tasa de interés del 9% trimestral. Si lo va a retirar dentro de año y medio, ¿Cuánto tendrá al término del plazo? ¿Cuánto interés habrá ganado?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 2</h3>
                    <p>Un youtubero decide invertir $12,000 de las ganancias de su canal, en un fondo que ofrece una tasa de interés de 15% anual. Planea retirar el dinero después de 4 años para mejorar su equipo de grabación. ¿Cuál será el monto final que tendrá al terminar el plazo? ¿Cuánto interés ganó?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3</h3>
                    <p>Un maestro de idiomas obtiene un préstamo de $45,000 para poder rentar un salón de clases por el próximo ciclo escolar anual, acordó pagar una tasa de 4.8% bimestral en un plazo de un año. ¿Cuánto deberá pagar al término? ¿Cuánto interés generó el préstamo?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4</h3>
                    <p>Un oficial de seguridad privada, decide invertir $23,000 para poder abrir su propia agencia. El banco donde depositó su dinero paga una tasa de interés del 3% mensual. ¿Cuánto dinero tendrá después de 3 años?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5</h3>
                    <p>Un estudiante de administración compró una computadora a crédito por $16,500 en una tienda que aplica una tasa de interés del 7.2% cuatrimestral. ¿Cuánto deberá pagar después de 8 meses? ¿Cuál fue el interés que se generó?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6</h3>
                    <p>Un pasante de arquitectura, desea reunir en seis meses el dinero necesario para un curso de especialidad, el cual estima que tendrá un costo de $18,000. Ha tomado la decisión de invertir en un banco que paga una tasa de interés del 10% bimestral. ¿Cuánto dinero necesita depositar inicialmente?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7</h3>
                    <p>Una psicóloga titulada, desea abrir su propio consultorio y para ello decide invertir en un fondo que ofrece una tasa de interés del 12% semestral. Desea reunir $75,000 en 3 años y medio. ¿Cuánto dinero necesita invertir inicialmente para alcanzar esa cantidad en el plazo establecido?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8</h3>
                    <p>El velador de una fábrica tiene el propósito de invertir parte de sus ahorros en un banco que le ofrece una tasa de interés del 2.3% mensual. Su objetivo es tener $16,000 dentro de 10 meses para ayudar a pagar los estudios de su nieto. ¿Cuánto dinero deberá invertir para poder alcanzar su meta?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 9</h3>
                    <p>El dueño de una imprenta desea reunir $35,000 en dos años y medio para abrir una nueva sucursal, y para ello ha tomado la decisión de invertir su dinero en un banco que paga una tasa del 18.74% de interés cuatrimestral. ¿Cuánto dinero necesita invertir inicialmente para reunir la cantidad que necesita?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 10</h3>
                    <p>Un ayudante de cocina recibe el día de hoy $119,835.34 por un depósito bancario que realizó hace 6 años. Los primeros 2 años el banco pagó una tasa de interés de 1.73% mensual y el tiempo restante la tasa aumentó al 2.15% mensual. ¿Cuánto invirtió inicialmente?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 11</h3>
                    <p>El dueño de una papelería invierte $8,500 en un banco que paga una tasa de interés del 6% trimestral. Su objetivo es retirar $10,000 para comprar nuevo material. ¿En cuánto tiempo alcanzará su meta?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 12</h3>
                    <p>Un carpintero desea comprar una herramienta que cuesta $25,000. Por el momento solo cuenta con $17,500 y ha tomado la decisión de invertir su dinero en un fondo de ahorro que paga una tasa de interés del 4% mensual. Determine en cuánto tiempo podrá adquirir la herramienta.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 13</h3>
                    <p>Un maestro panadero invierte $18,000 en la ampliación para su negocio. El banco le ofrece una tasa de interés del 15% semestral. ¿En cuánto tiempo el panadero logrará duplicar su inversión?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 14</h3>
                    <p>El dueño de una tienda de mascotas depositó $50,000 en un fondo de ahorro que acumula el 7.38% bimestral, con el fin de comprar un nuevo local que pide un enganche de $66,000 ¿En cuánto tiempo reunirá el dinero que requiere?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 15</h3>
                    <p>El dueño de una tintorería invierte $9,500 en un banco que ofrece una tasa de interés del 19% trimestral, desea que su inversión crezca a $13,000 ¿En cuánto tiempo alcanzará su objetivo?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 16</h3>
                    <p>Convierta la tasa capitalizable dada a su equivalente indicado:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>Tasa del 5% mensual a anual.</li>
                        <li>Tasa del 0.58% quincenal a semestral.</li>
                        <li>Tasa del 3.8% bimestral a trimestral.</li>
                        <li>Tasa del 6.2% cuatrimestral a bimestral.</li>
                        <li>Tasa del 14% anual a cuatrimestral.</li>
                        <li>Tasa del 2.8% mensual a quincenal.</li>
                        <li>Tasa del 12.8% anual a semanal.</li>
                        <li>Tasa del 4.2% trimestral a mensual.</li>
                        <li>Tasa del 6.7% cuatrimestral a trimestral.</li>
                        <li>Tasa del 4.8% bimestral a semanal.</li>
                        <li>Tasa del 3.7% trimestral a quincenal.</li>
                        <li>Tasa del 0.92% quincenal a bimestral.</li>
                        <li>Tasa del 18.4% semestral a anual.</li>
                        <li>Tasa del 5.2% cuatrimestral a mensual.</li>
                        <li>Tasa del 0.045% diaria a trimestral.</li>
                        <li>Tasa del 4% semanal a anual.</li>
                    </ul>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 17</h3>
                    <p>Obtenga la tasa capitalizable dada a la periodicidad indicada. Compruebe obteniendo el valor Final con un Principal de $20,000 en un plazo de un año:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>Tasa del 5.6% mensual a su equivalente bimestral.</li>
                        <li>Tasa del 1.45% quincenal a su equivalente mensual.</li>
                        <li>Tasa del 13.22% cuatrimestral a su equivalente trimestral.</li>
                        <li>Tasa del 6.55 bimestral a su equivalente cuatrimestral.</li>
                        <li>Tasa del 23.18 semestral a su equivalente anual.</li>
                        <li>Tasa del 0.45% semanal a su equivalente diaria.</li>
                        <li>Tasa del 0.05% diaria a su equivalente quincenal.</li>
                        <li>Tasa del 49% anual su equivalente a semestral.</li>
                        <li>Tasa del 21.67% trimestral su equivalente a semanal.</li>
                    </ul>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 18</h3>
                    <p>Un atleta amateur invirtió $80,000 en un fondo de ahorro para asegurar su retiro. Después de 9 años, el monto total acumulado fue de $230,000 ¿Qué tasa de interés anual pagó el fondo en el que depositó su dinero?</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 19</h3>
                    <p>Una guía de turistas ahorró $35,000 en un banco que paga una tasa de interés trimestral, para financiar un viaje. Al paso de dos años y medio, su saldo creció a $65,000. ¿Qué tasa de interés anual le pagó el banco?</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 20</h3>
                    <p>Un tapicero solicitó un préstamo de $53,000 para comprar maquinaria nueva. Al terminar el plazo acordado de 3 años, su deuda ascendió a $77,000 ¿Qué tasa de interés anual le cobró el banco al tapicero?</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 21</h3>
                    <p>El encargado de intendencia de una escuela secundaria invierte en un banco para poder pagar la renovación de su casa como un regalo sorpresa para su esposa. Depositó $25,000 y después de año y medio retiró $32,500. ¿Qué tasa de interés anual le pagó el banco?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 22</h3>
                    <p>Una costurera compró una máquina de coser con un valor de $6,899 a crédito. Al final de un año su deuda ascendió a $9,500. ¿Qué tasa de interés mensual le cobraron por la máquina?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 23</h3>
                    <p>Un ejecutivo telefónico adquiere un equipo tecnológico para su trabajo por $13,000 con un crédito a un año, el cual cobra una tasa de interés del 3% mensual. Calcula cuánto pagará al finalizar el plazo y determina la tasa de interés anual equivalente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 24</h3>
                    <p>Una auxiliar laboratorista invierte $45,000 en una cuenta de ahorro que paga una tasa de interés del 5% bimestral para renovar su equipo de trabajo. Invierte el dinero por un semestre. ¿Cuánto es el monto que logrará reunir en ese tiempo? Determine la tasa de interés semestral equivalente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 25</h3>
                    <p>Un pasante en trabajo social necesita comprar libros con material educativo para la comunidad. Adquiere un préstamo bancario de $11,500 en un banco que cobra el 1.3% quincenal. Si liquida el préstamo en 1 año, ¿Cuánto dinero debe pagar al final? ¿Cuál es la tasa de interés equivalente?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 26</h3>
                    <p>Una fotógrafa profesional adquiere una cámara a crédito por $28,000. La tienda donde la compró cobra una tasa de interés trimestral del 6%. Acordó pagarla en 2 años. Calcula el monto final a pagar y la tasa de interés anual equivalente.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 27</h3>
                    <p>Un instructor de manejo solicita un préstamo de $75,000 para dar el enganche de un carro, en un banco que cobra una tasa de interés mensual de 2% y lo planea liquidar en 4 semestres. ¿Cuánto deberá pagar al terminar el plazo? ¿Cuál es la tasa de interés semestral equivalente?</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 28</h3>
                    <p>Ayude al cajero de una casa de bolsa que requiere conocer qué tasa de interés mensual deberá cobrar por un préstamo de $18,750 a un plazo de 7 meses, si desea obtener un rendimiento del 4.5% mensual. Obtenga la tasa de interés mensual que deberá cobrar si el plazo fuese de un año. Compare las tasas de interés mensuales obtenidas y de una conclusión.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 29</h3>
                    <p>El dueño de una agencia de colocaciones solicitó un préstamo por $35,000 a una tasa del 12.85% trimestral. Si el préstamo duró 1 año y medio, determine la tasa trimestral equivalente que le cobraron. Compruebe la equivalencia de las tasas trimestrales obteniendo el valor final en el plazo dado. Compruebe que no son equivalentes en otro plazo (un año).</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 30</h3>
                    <p>Convierta las siguientes tasas capitalizables a su equivalente anual proporcional:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>0.33% semanal.</li>
                        <li>1.21% quincenal</li>
                        <li>2.44% mensual</li>
                        <li>4.58% bimestral</li>
                        <li>8.16% trimestral</li>
                        <li>0.15% diaria</li>
                        <li>25.60% semestral</li>
                        <li>16.2% cuatrimestral</li>
                        <li>62.27% anual</li>
                    </ul>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 31</h3>
                    <p>Convierta las siguientes tasas a capitalizables por periodo:</p>
                    <ul style="list-style-type: lower-alpha; padding-left: 30px;">
                        <li>39.52% anual proporcional semanal</li>
                        <li>111.6% anual proporcional diaria</li>
                        <li>73.24% anual proporcional anual</li>
                        <li>55.62% anual proporcional semestral</li>
                        <li>83.44% anual proporcional trimestral</li>
                        <li>28.08% anual proporcional quincenal</li>
                        <li>52.5% anual proporcional bimestral</li>
                        <li>91.44% anual proporcional mensual</li>
                        <li>69.27% anual proporcional cuatrimestral</li>
                    </ul>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 32</h3>
                    <p>Convierta la tasa del 33% anual proporcional cuatrimestral, a anual proporcional mensual.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 33</h3>
                    <p>Convierta la tasa del 52% anual proporcional trimestral, a anual proporcional bimestral.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 34</h3>
                    <p>Convierta la tasa del 46.9% anual proporcional quincenal, a anual proporcional semanal.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 35</h3>
                    <p>Un desarrollador web que tiene la opción de invertir su dinero en una institución que le paga una tasa de interés del 4.52% cuatrimestral, desea saber si le conviene comprar un disco duro que se ofrece en $11,399 de contado o en $12,999 a 9 meses. Determine la mejor opción que tiene. Justifique su respuesta.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 36</h3>
                    <p>El día de hoy un torero depositó en el banco $133,000. Si después de dos meses deposita $140,000 más, cuánto tendrá al cabo de cinco meses, si el banco pagó una tasa del 15.25% semestral.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 37</h3>
                    <p>Una revolvedora de concreto eléctrica se ofrece a crédito con un enganche de $5,000 y el saldo con dos pagos de $15,000 cada uno, a un plazo de 2 y 4 meses, respectivamente. Si la tasa que le pagan por invertir su dinero es del 1.25% quincenal, determine el precio de contado del equipo.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 38</h3>
                    <p>Un médico veterinario zootecnista estima que su actual equipo de ultrasonido veterinario tiene un precio de $55,000; Para venderlo, recibe las siguientes ofertas: A) Un pago único dentro de 3 meses por $57,000; B) Dos pagos de $30,000, uno de contado y otro dentro de 9 meses. Si la tasa de interés que rige en el mercado es del 20% anual proporcional bimestral, determine cuál es la mejor oferta.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 39</h3>
                    <p>Determine cuánto podrá retirar el día de hoy, un periodista que ahorró $15,000 y $13,500 hace 3 y 5 meses, respectivamente. Considere que le pagaron una tasa de interés del 0.55% semanal.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 40</h3>
                    <p>Un electricista debe $5,000 a 3 meses de plazo y $20,000 a 9 meses. Acuerda con su acreedor en liquidarlos con un solo pago de $25,000 ($5,000 + $20,000); si se acuerda una tasa de interés del 9.44% semestral, determine la fecha promedio en que deberá liquidar el adeudo.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 41</h3>
                    <p>Realice el problema anterior, invirtiendo el orden de los importes de las deudas; $20,000 a 3 meses de plazo y $5,000 a 9 meses Determine la fecha promedio en que deberá liquidar el pago único a la tasa dada.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 42</h3>
                    <p>El dueño de una imprenta posee 3 documentos por cobrar, uno por $3,900 vencido hace 214 días, otro por $4,785 que vence el día de hoy, y otro por $6,130 que vence dentro de 89 días. Recibe la propuesta de renegociación de su deudor de firmar un único documento dentro de 30 días, por $15,686.75. Determine la tasa de interés anual que obtendría.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 43</h3>
                    <p>El dueño de una miscelánea desea traspasar su negocio, ofreciéndolo en $3,850,000 de contado; a crédito lo ofrece con dos pagos por $2,150,000 y $2,072,150 a 3 y 5 meses, respectivamente. Determine la tasa de interés que se cobra en esta operación, así como su equivalente anual.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 44</h3>
                    <p>Un agente inmobiliario recibe el día de hoy $115,680.29 por una inversión que efectuó hace 3 años. Si durante año y medio el banco le pagó el 22.5% anual proporcional semestral, y después cambió al 20.3% anual proporcional bimestral, determine cuánto depositó al inicio.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 45</h3>
                    <p>¿Cuánto dinero tendrá en su cuenta bancaria un locutor que invirtió $50,000 hace 6 años, si se sabe que le pagaron el 24.3% anual proporcional semanal durante los primeros 2 años, y posteriormente aumentó al 30.25% anual proporcional quincenal?</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 46</h3>
                    <p>El consejo de administración de una red de hospitales privados decide adquirir sistemas de gran caudal para filtración de agua, para lo cual solicita un préstamo por $1,275,000. Estima que pueda liquidarlo con tres pagos semestrales, con la característica de ser cada uno del doble del anterior. Determine el valor de cada pago, considerando que le cobrarán una tasa de interés del 47.23% anual.</p>
                </div>
                
                <div class="definition-block">
                    <h3>Ejercicio 47</h3>
                    <p>Un médico cirujano decide invertir desde el día de hoy $200,000, como regalo del cumpleaños 13 de su única hija, en una cuenta que le paga el 34% anual, con la finalidad de apoyar sus estudios; si se estima que realizará los retiros al cumplir 16 y 19 años, determine de cuánto podrá disponer en cada ocasión, considerando que el primer retiro sea de un 25% menos que el segundo.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 48</h3>
                    <p>Un operador ferroviario se propone invertir parte de su salario a partir de hoy y durante 3 meses más, en una cuenta que le paga el 24% anual proporcional semestral. Lo anterior con la finalidad de reunir $60,000 para vacacionar en tren a lo largo de la República. Determine cuánto deberá depositar mensualmente para pagar el paquete y emprender el viaje, un mes después de la última inversión.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 49</h3>
                    <p>El intendente de una lavandería solicita un préstamo de nómina por $12,500, a una tasa de interés del 4.6% bimestral. Si acuerda pagar $3,000 dentro de 3 meses, determine el importe del pago que liquide el adeudo dentro de 5 meses. Realice el cálculo con fecha focal en cada flujo de efectivo e interprete los resultados. ¿Cuál es la FF en la que no se capitalizan intereses?</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 50</h3>
                    <p>Un subgerente de una agencia de publicidad posee un pagaré por $85,000 que vence dentro de 4 meses. Desea conocer cuánto recibiría por él si lo descuenta en una financiera que le aplica una tasa de descuento del 27.55% semestral. Realice el cálculo considerando que a) descontará el documento el día de hoy, y b) también lo que recibiría si lo descuenta después de un mes. Aplique a este último cálculo, el descuento de un mes más; compare e interprete ambos cálculos en la fecha actual.</p>
                </div>

            </section>

            <section id="respuestas">
                <h2>Interés Compuesto: Respuestas</h2>
                <pre style="background:#f8fafc; border:1px solid var(--borde-color); border-radius:10px; padding:1rem 1.25rem; white-space:pre-wrap; word-break:break-word; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, 'Liberation Mono', monospace; font-size:1em; line-height:1.55;">Interés compuesto. Respuestas

1.  $17,190.28;  $6,940.28 
2.  $20,988.08;  $8,988.07
3.  $59,618.39;  $14,618.39	
4.  $66,660.40;  $43,660.40
5.  $18,961.54;  $2,461.54
6.  $13,523.67
7.  $33,926.19
8.  $12,745.70
9.  $9,651.4
10.  $28,600		
11.  8 meses, 11 días
12.  9 meses, 3 días
13.  2 años, 5 meses, 23 días
14.  7 meses, 24 días
15.  5 meses, 12 días
16. 	a.   79.59% anual
b.   7.19% semestral
c.   5.75% trimestral 
d.   3.05% bimestral
e.   4.46% cuatrimestral
f.    1.39% quincenal
g.   0.23% semanal
h.   1.38% mensual
i.    4.98% trimestral
j.    0.56% semanal
k.   0.61% quincenal
l.    3.73% bimestral
m.  40.19% anual
n.   1.28% mensual
o.   4.13% trimestral
p.   668.66% anual (dato para quienes acostumbran pagar semanalmente).
17. 	a.  11.51% bimestral; 		 $38,458.91
	b.    2.92% mensual; 		 $28,253.95
	c.    9.76% trimestral;		 $29,026.82
	d.  13.53% cuatrimestral; 	 $29,265.15
	e.  51.73% anual; 		 $30,346.62
	f.     0.06% diaria; 		 $25,259.63
	g.    0.75% quincenal; 		 $23,943.27
	h.  22.07% semestral; 		 $29,800
	i.     1.52% semanal;		 $43,829.25
18.  12.45% anual
19.  28.10% anual
20.  13.26% anual
21.  19.11% anual
22.  2.70% mensual
23.  $18,534.89;	 42.58% anual
24.  $52,093.13;	 15.76% semestral
25.  $15,679.22;	 36.34% anual
26.  $48,627.75;	 26.25% anual
27.  $120,632.79;	 12.62% semestral
28.  5.16% mensual con  7 meses;	 5.80% mensual con  1 año; 
      Se concluye que las tasas de  y de  sólo son equivalentes en un plazo dado
29. Con  año y medio y con  9.99% trimestral resulta  $61,985 en ambos casos. Con  1 año y con  12.85% trimestral, resulta  $52.990; con  9.99% trimestral; Resulta  $51,232.68. Se concluye que las tasas trimestrales de  e  equivalentes en año y medio, no producen el mismo rendimiento en otro plazo, es decir, no son equivalentes.
	30. a)  17.16% anual proporcional semanal
	      b)  29.04% anual proporcional quincenal
      c)  29.28% anual proporcional mensual
      d)  27.48% anual proporcional bimestral
      e)  32.64% anual proporcional trimestral	
      f)  54% anual proporcional diaria
      g)  51.2% anual proporcional semestral
      h)  48.6% anual proporcional cuatrimestral
      i)   62.7% anual proporcional anual     
31. a)  0.76% semanal		b)  0.31% diaria		    c)  73.24% anual
      d) 27.81% semestral		e)  20.86% trimestral	    f)   1.17% quincenal
      g) 8.75% bimestral		h)  7.62% mensual	    i)   23.09% cuatrimestral
32.  31.72% anual proporcional mensual 
33.  50.93% anual proporcional bimestral
34.  46.66% anual proporcional semanal		
35. Si invierte tendrá  $12,591.15, no le alcanza para pagar $12,999 a crédito; le conviene comprar al contado; o bien:
      Tasa cuatrimestral que le pagan de  4.52%, es menor de la que le cobran 6.01% 
36.    $299,995.44	
37.    $32,853.84
38.   Oferta A)  $54,264.30; Oferta B)  $55,884.47 conviene más para vender
39.    $31,312.18
40.    7 meses, 23 días
41.    4 meses, 5 días
42.    0.1% diaria;  43.31% anual
43.    2.35% mensual;  32.15% anual (con 4 decimales);  32.17% anual
44.    $62,273.68
45.  $270,245
46. 1er. pago = $288,355.90; 2º pago = $576,711.79; 3er. pago = $1,153,423.58
47. Primer retiro = $309,636.77; segundo retiro = $412,849.02
48. 4 depósitos mensuales empezando desde el día de hoy de $14,304.97
49.  al término del plazo:  $10,799.50;  en el l 3er. mes: 	$10,839.78;
       al inicio del plazo:  $10,808.41; La  correcta a  es el término del plazo.
50. a)  $69,388.33; b)  $69,925.96; El descontar en fechas intermedias capitaliza el interés, por lo que el descuento correcto sólo es el a)</pre>
            </section>
        <section>
            <h2>Interés Compuesto Continuo: Ejercicios</h2>
            <div class="definition-block">
                <h3>
                    Ejercicio 1
                </h3>
                <p>
                    Cual sera el Monto Final de una inversion de $181,300, si se invierte a una tasa del 6% trimestral, capitalizable continuamente durante 5 trimestres?
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 2
                </h3>
                <p>
                    Un cuidador de mascotas requiere $13,400 dentro de un 1 año y medio, y se invierte al 18.45% anual con cap.continua, determine cuanto debera depositarse el dia de hoy.
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 3
                </h3>
                <p>
                    Cuanto tiempo se requiere para que una inversion de triplique, si la tasa que se ofrece es del 15.21% cuatrimestral con cap.continua? 
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 4
                </h3>
                <p>
                    Cual sera la tasa diaria cap.continua necesaria, para que una inversion de $23,000 el dia de hoy se convierta en $31,699.97 dentro de 2 años y medio? Recuerde que las tasas de interes compuesto continuo se vuelven proporcionales en el mismo plazo. Por lo tanto, obtenga las tasas bimestral y anual con capitalizacion continua, y compruebe su caracter proporcional.
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 5
                </h3>
                <p>
                    Determine la tasa trimestral equivalente a la tasa del 5.29% trimestral cap.continua. Compruebe con P a partir de F = 14,920 y con n = 2 cuatrimestres 
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 6
                </h3>
                <p>
                    Determine la tasa semanal con cap.continua equivalente a la tasa del 1.31% semanal. Compruebe con F a partir de P = 42,166 y con n = 10 dias.
                </p>
            </div>
            <div class="definition-block">
                <h3>
                    Ejercicio 7
                </h3>
                <p>
                    Determine la tasa quincenal equivalente a la tasa de 40.28% cuatrimestral cap.continua. Compruebe con P a partir de F = 31,131 y con n = 360 dias.
                </p>
            </div>
        </section>
        <section id="respuestas">
            <h2>Interés Compuesto Continuo: Respuestas</h2>
            <pre style="background:#f8fafc; border:1px solid var(--borde-color); border-radius:10px; padding:1rem 1.25rem; white-space:pre-wrap; word-break:break-word; font-family: ui-monospace, SFMono-Regular, Menlo, Consolas, 'Liberation Mono', monospace; font-size:1em; line-height:1.55;">Interés compuesto continuo. Respuestas

1.  F = $244,729.40 
2.  P = $10,160.47 
3.  n = 2 años, 4 meses, 27 días, intente comprobación intuitiva con \( m_c \) = 51,735,000 
4.  \( i_c \) = 0.0356 diaria cap. continua; \( i_c \) = 2.14% bimestral cap. continua; \( i_c \) = 12.83% anual cap.continua 
5.  i = 5.43% trimestral; P = $13,422.10 
6.  \( i_c \) = 1.30% semanal cap. continua; F = $42,957.32; o bien F = $42,966.19 
7.  i = 5.16% quincenal; P = $9,298.04 


</pre>
        </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/anualidad_vencida.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
