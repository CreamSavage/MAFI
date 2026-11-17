<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Interés Compuesto', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
            Fundamentos del Interés Compuesto
        </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="teoria-contenido">
            <section>
                <h2>Definición de Interés Compuesto</h2>

                <div class="definition-block">
                    <h3>Definición</h3>
                    <p>
                        Es la cantidad de dinero que se obtiene de aplicar una tasa periódica, sobre una cantidad inicial llamada Principal o capital, la cual durante determinados periodos de tiempo se incrementa al Principal (se capitaliza), para a su vez, generar nuevo interés en un nuevo periodo, y así sucesivamente hasta el término del plazo. También es conocido como el interés sobre interés.
                    </p>
                </div>
            </section>

            <div class="section-divider"></div>

            <section>
                <h2>Variables y Fórmulas</h2>

                <h3 style="margin-top: 2.5rem;">Variables</h3>
                <ul class="variable-list">
                    <li>
                        <strong>P = Principal o capital inicial:</strong> Es la cantidad de dinero invertida o prestada al inicio de la operación financiera, y que va variando al inicio de cada periodo, al capitalizar el interés del periodo.
                    </li>
                    <li>
                        <strong>i = Tasa capitalizable por periodo:</strong> Porcentaje aplicable sobre el Principal o capital al inicio de cada periodo de capitalización.
                    </li>
                    <li>
                        <strong>I = Cantidad de interés generado:</strong> Es la diferencia entre el Monto Final y el Principal (I = F - P). El interés de cualquier periodo se obtiene de aplicar la tasa periódica al valor presente (I = P * i).
                    </li>
                    <li>
                        <strong>n = Plazo:</strong> Es el lapso que dura una operación financiera, expresado en periodos de capitalización de la tasa.
                    </li>
                    <li>
                        <strong>F = Monto Final:</strong> Es el valor equivalente al Principal, resultante de capitalizar el interés de toda la operación. Se compone de la suma del Principal y el Interés total (F = P + I).
                    </li>
                </ul>

                <h3 style="margin-top: 2.5rem;">Fórmulas</h3>
                <img src="../img/interes_compuesto.PNG" alt="Fórmulas de Interés Compuesto" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">

                <div class="didactic-note">
                    <p>
                        Para aplicar las fórmulas de <strong>Interés Compuesto</strong>, es necesario que corresponda la periodicidad de la capitalización de la tasa, y la periodicidad en que se divide el plazo.
                    </p>
                    <p>
                        El <strong>Interés Compuesto</strong> sigue las reglas del <strong>Interés Simple</strong>, tales como la conversión del plazo, la correspondencia de la periodicidad del plazo y la tasa, la tasa anual por omisión, redondeo, etc., excepto por la forma de conversión de la tasa capitalizable por periodo, ya que ésta no se comporta de una manera proporcional al tiempo, sino exponencial.
                    </p>
                    <p>
                        El término <strong>capitalizable (cap.)</strong> puede indicarse u omitirse. Para entender que la tasa es a <strong>Interés Simple</strong> se deberá indicar explícitamente.
                    </p>
                </div>
            </section>
            <div class="section-divider"></div>

        
            <div class="subtitulo">Interes Compuesto Continuo</div>
        <section>
        <div class="example-block">
            <h2>Conceptos Fundamentales de Interés Compuesto Continuo</h2>
        </div>
        
        <div class="definition-block">
        <p>
            El ICC es un fenomeno de crecimiento exponencial poblacional, mas que finaciero, ya que la capitalizacion continua no se da en la practica de los negocios. Nos da la nocion de un limite, cuando las capitalizaciones tienden a infinito. Por lo tanto, los resultados del presente estudio, a pesar de ser congruentes con la materia financiera, son solo hipoteticos.
        </p>
        <p>
            El interess compuesto continuo es aquel que se capitaliza cada instante. Para conceptualizar la capitalizacion continua, pensemos en capitalizaciones cada hora del dia en año comercia: 360 * 24 = 8,640; cada minuto: 8,640 * 60 = 518,400; cada segundo: 518,400 * 60 = 31,104,000; cada decima de segundo: 31,104,000 * 10 = 311,040,000 y asi sucesivamente cada instante
        </p>
        <p>
            Se podria pensar que entre mas se capitaliza una tasa el Monto Final crecera indefinidamente. Esto no es asi, El limite para determinar el Monto Final a partir de un Principal cualquiera, esta dada por las siguientes:
        </p>
        </div>
        </section>
        <div class="section-divider"></div>
        <section>
            <h2>Variables y Formulas ICC</h2>
            <h3 style="margin-top: 2.5rem;">Variables</h3>
            <ul class="variable-list">
                <li>
                    <strong>e = 2.718 ... (constante o numero de euler)</strong>
                </li>
                <li>
                    <strong>\( i_c = \text{Tasa capitalizable continuamente por periodo del plazo n} \)</strong>
                </li>
                <li>
                    <strong>
                        \( m_c \) = Número de capitalizaciones continuas por periodo de la tasa,
                        \( i_c \) 
                    </strong>
                </li>
                <li>
                    <strong>\( i_i = \text{Tasa instantanea por periodo del plazo n} \)</strong>
                </li>
                </li>
            </ul>
            <h3>Formulas</h3>
            <img src="../img/interes_compuesto_continuo.png" alt="Formulas de Interes Compuesto Continuo" style="width:100%; max-width:50%; display:block; margin: 1.5rem auto;">
            <section>
                <div class="section-divider"></div>
            <div class="example-block">
                <h2>Taza capitalizable instantanea</h2>
            </div>
            <div class="definition-block">
                <p>
                    Existe una tasa instantanea en ICC determinada por:
                </p>
                <p>
                    $$ i_z = \frac{i_c}{m_c} $$
                </p>
                <p>
                    La cual representara el numero de instantes de capitalizacion, por cada periodo de la tasa dada; dicha tasa estara supeditada al numero de periodos de duracion del plazo total de la operacion. 
                </p>
                <p>
                    Asi, las capitalizaciones anuales en un año son iguales a uno. Analogamente pudiera interpretarse que las capitalizaciones continuas en un instante tambien serian iguales a uno.
                </p>
            </div>
            </section>
        </section>

        </main>

        <aside class="toc-sidebar">
                <div class="toc-title"><i class="fas fa-list"></i> Índice de teoría</div>
                <nav class="toc-nav">
                    <ul id="toc-list">
                        </ul>
                </nav>
            </aside>
    </div>
</div>

<a href="../Menus/interes_compuesto.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
