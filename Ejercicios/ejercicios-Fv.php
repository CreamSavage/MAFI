<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Ejercicios: Fondo de Amortización (Renta Vencida)', [
    'mathjax' => false,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Ejercicios Propuestos de Fondo de Amortización con Renta Vencida
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="ejercicios-contenido">
            <section>
                <h2>Fondo de Amortización: Ejercicios</h2>

                <div class="definition-block">
                    <h3>Ejercicio 1</h3>
                    <p>Un organismo de prestación de servicios de agua establece un Fondo de Amortización (FA) por $1,850,000 anuales durante 15 años, obteniendo una tasa del 11.5% anual; determine el saldo acumulado al término, así como la cantidad acumulada al final del 10º año. Realice una tabla que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 2</h3>
                    <p>El ayuntamiento de un municipio del Estado de México establece un FA, a una tasa de interés del 38% anual proporcional mensual, en el cual requiere invertir $855,000 cuatrimestrales durante 4 años, empezando desde el día de hoy; determine a) cuál es el Saldo Final que le permitirá hacer frente a sus obligaciones futuras; b) la cantidad acumulada en el Fondo al final de 3 años. Realice una tabla que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 3</h3>
                    <p>En el problema anterior, el ayuntamiento desea conocer la cantidad anticipada que debe invertir mensualmente en el FA, para cumplir sus obligaciones en el plazo estipulado y con la misma tasa. Realice una tabla que muestre la situación durante el primer año. Compare el resultado con la tabla del problema anterior.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 4</h3>
                    <p>Un municipio del Estado de Chiapas posee obligaciones pagaderas forzosamente dentro de 8 años, por un total de $10,000,000. Para hacer frente a esta obligación futura, establecerá un FA a una tasa del 21.33% semestral durante los primeros 2 años, y del 23.19% semestral para los 4 restantes. Determine el valor de los ahorros semestrales, antes y después del cambio de tasa. Haga la tabla que muestre la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 5</h3>
                    <p>El patronato de una prestigiosa universidad, requiere emitir obligaciones por un equivalente futuro de $5,000,000; si estima que aportando $150,000 quincenales anticipados a un FA que paga el 28% anual proporcional quincenal; determine cuánto tiempo tardará en reunir la cantidad, y el importe del ahorro final. Realice la tabla que muestre la situación de los 5 últimos periodos.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 6</h3>
                    <p>La secretaría de seguridad pública de un gran Estado proyecta la implantación de un centro de vigilancia con cámaras en las principales avenidas de la capital, para lo cual obtiene un préstamo por $350,000,000 el día de hoy. El financiamiento es a 4 años forzosos, con una tasa del 18.2% anual. Para pagar la obligación contraída, decide invertir $30,000,000 trimestrales en un FA. Determine la tasa de interés trimestral y su equivalente anual que requiere que le paguen para cumplir su objetivo. Realice la tabla de comportamiento de la deuda a plazo forzoso, y la tabla del FA que muestren la situación.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 7</h3>
                    <p>La secretaría del problema anterior, después de agotar sus opciones, encuentra que para pagar el préstamo de $683,184,415 al término de los 4 años de plazo, consigue acceder a un FA con tasa del 7.5% semestral. Determine el valor de las reservas semestrales, así como la tasa anual que realmente se terminará pagando por este préstamo. Realice la tabla del FA y la tabla que valide la tasa generada en la hipotética amortización.</p>
                </div>

                <div class="definition-block">
                    <h3>Ejercicio 8</h3>
                    <p>El consejo de Administración de una compañía telefónica estima aumentar su participación en las acciones de una filial en el extranjero, para lo cual requiere pagar $50,000,000 de dólares dentro de año y medio con pagos trimestrales. Establece un fondo de inversión para tal efecto, que le paga una tasa del 3.82% trimestral. Por causas de fuerza mayor, después de tres trimestres deja de ahorrar por un trimestre, pero mantiene el dinero en la cuenta y los retoma con posterioridad. Determine los depósitos antes y después del imprevisto, para lograr el objetivo en el plazo convenido.</p>
                </div>

            </section>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de ejercicios">
            <div class="toc-title"><i class="fas fa-list"></i> Índice de ejercicios</div>
            <nav class="toc-nav"><ul id="toc-list"></ul></nav>
        </aside>
    </div>
</div>

<a href="../Menus/fondo_rv.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
