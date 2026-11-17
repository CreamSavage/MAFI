<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';

mafi_page_start('Teoría: Progresiones Aritméticas y Geométricas', [
    'mathjax' => true,
    'mathjaxInlineDollar' => false,
    'tocJs' => true,
]);
?>
<div class="main-container">
    <header class="header-box">
        <h1>Progresiones Aritméticas y Geométricas</h1>
    </header>

    <div class="content-toc-grid">
        <main class="content-card content-main" id="contenido-teoria">
            <!-- ==================== GENERALIDADES ==================== -->
            <h2 id="generalidades">Generalidades</h2>
            
            <h3 id="introduccion">Introducción Progresiones</h3>
            <p>El tema de progresiones ilustra el comportamiento aritmético o lineal, y el comportamiento geométrico o exponencial, mismos que se equiparan al comportamiento del interés simple y el interés compuesto, base de la materia financiera.</p>
            <p>Como idea intuitiva de la aplicación de las progresiones en la práctica, trate de determinar, qué opción le conviene más a un empleado que le ofrecen un sueldo mensual inicial de \$5,000, con la opción 1) de aumentarle \$150 mensuales, o la opción 2) de aumentarle el 2.7% mensual. Determine cuál opción le conviene en un año, y cuál dentro de 5 años.</p>
            
            <h3 id="definicion">Definición progresión</h3>
            <p>Es una sucesión de números llamados términos, ordenados de forma cardinal, denotados por una literal y un subíndice, el cual indica la posición o lugar que guarda en la serie. Las puede haber finitas o infinitas.</p>
            <p><strong>Ejemplo 1.</strong> Progresión finita creciente: \(1,\ 3,\ 5,\ 7,\ 9\) → Notación: \(a_{1},\ a_{2},\ a_{3},\ a_{4},\ a_{5} = a_{n}\)</p>
            <p><strong>Ejemplo 2.</strong> Progresión infinita decreciente: \(16,\ 8,\ 4,\ 2\ldots\) → Notación: \(a_{1},\ a_{2},\ a_{3},\ a_{4}\ldots = a_{n}\)</p>
            <p>Los puntos suspensivos denotan una serie sin fin. Lo que se requiere saber en la práctica, es cómo diferenciar el comportamiento de una progresión Aritmética, de una Geométrica, y la diferencia entre ambas.</p>
            
            <h3 id="variables">Variables de las progresiones</h3>
            <ul>
                <li>\(a_{1} =\) Primer término de la sucesión numérica</li>
                <li>\(a_{n} =\) Término enésimo de la sucesión. Se adecúa al último término conocido</li>
                <li>\(n =\) Número de términos de la sucesión. Si es infinita, se puede delimitar al término que se desee</li>
                <li>\(S_{n} =\) Suma del primero hasta el enésimo término</li>
                <li>\(d =\) Diferencia común. Caracteriza a una Progresión Aritmética (\(PA\)). Para términos consecutivos, se obtiene de restar cualquier término menos el anterior, excepto \(a_{1}\) que no tiene antecedente: \(d = a_{n} - a_{n-1}\)</li>
                <li>\(r =\) Razón común. Caracteriza a una Progresión Geométrica (\(PG\)). Para términos consecutivos, se obtiene de dividir cualquier término entre el anterior, excepto \(a_{1}\) que no tiene antecedente: \(r = \frac{a_{n}}{a_{n-1}}\)</li>
            </ul>
            
            <h3 id="diferencia-razon">Diferencia o razón común</h3>
            <p>En la práctica, nunca se sabrá si un problema se ajusta al comportamiento aritmético o geométrico, por lo cual, habrá que determinar si se está ante una diferencia o razón común. En caso de no ajustarse a ninguna de las dos, no se puede emplear esta teoría y se tendrá que buscar otros modelos que resuelvan la problemática.</p>
            <p>Para determinar si existe una diferencia común, se resta cualquier término menos su antecesor. Si el resultado es constante, se trata de una \(PA\).</p>
            <p>Para determinar si existe una razón común, se divide cualquier término entre su antecesor. Si el resultado es constante, se trata de una \(PG\).</p>

            <!-- ==================== PROGRESIÓN ARITMÉTICA ==================== -->
            <h2 id="progresion-aritmetica">Progresión Aritmética \(PA\)</h2>
            
            <h3 id="definicion-pa">Definición \(PA\)</h3>
            <p>Es aquella en la que los términos están separados por una diferencia común \(d\), la cual se obtiene de restar a cualquier término, el que le antecede (excepto \(a_{1}\) que no tiene antecedente). Los términos posteriores se obtienen de sumar la diferencia común a cualquier término.</p>
            <p>\[ d = a_{n} - a_{n-1} \]</p>
            
            <h3 id="formulas-pa-termino">Fórmulas Término enésimo \(PA\)</h3>
            <div class="formula-block">
                <p>\[ a_n = a_1 + (n - 1) \, d \quad \text{PA1} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PA1</h4>
            <div class="formula-block">
                <p>\[ a_1 = a_n - (n - 1) \, d \quad \text{PA2} \]</p>
                <p>\[ d = \frac{a_n - a_1}{n - 1} \quad \text{PA3} \]</p>
                <p>\[ n = \frac{a_n - a_1}{d} + 1 \quad \text{PA4} \]</p>
            </div>
            
            <h3 id="formulas-pa-suma">Fórmula Suma de Términos \(PA\)</h3>
            <div class="formula-block">
                <p>\[ S_n = \frac{n}{2} (a_1 + a_n) \quad \text{PA5} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PA5</h4>
            <div class="formula-block">
                <p>\[ a_1 = \frac{2 S_n}{n} - a_n \quad \text{PA6} \]</p>
                <p>\[ a_n = \frac{2 S_n}{n} - a_1 \quad \text{PA7} \]</p>
                <p>\[ n = \frac{2 S_n}{a_1 + a_n} \quad \text{PA8} \]</p>
            </div>
            
            <h3 id="formulas-pa-suma-alternativa">Fórmula alternativa Suma de Términos \(PA\)</h3>
            <div class="formula-block">
                <p>\[ S_n = \frac{n}{2} \left( 2a_1 + (n-1)d \right) \quad \text{PA9} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PA9</h4>
            <div class="formula-block">
                <p>\[ a_1 = \frac{S_n}{n} - \frac{(n-1)d}{2} \quad \text{PA10} \]</p>
                <p>\[ d = \frac{2 \left( S_n - a_1 n \right)}{n^2 - n} \quad \text{PA11} \]</p>
                <p>\[ n \, \text{por fórmula general:} \quad d \, n^2 + n \left( 2a_1 - d \right) - 2S_n = 0 \quad \text{PA12} \]</p>
            </div>
            
            <h3 id="interpolacion-pa">Interpolación aritmética \(PA\)</h3>
            <p>Es el proceso de insertar o colocar dentro de una serie, un determinado número de términos desconocidos, entre dos extremos, para que en conjunto conformen una \(PA\).</p>
            <p>Para interpolar \(k\) términos entre \(a_1\) y \(a_n\): \(d = \frac{a_n - a_1}{n-1}\) donde \(n = k + 2\).</p>

            <!-- ==================== PROGRESIÓN GEOMÉTRICA ==================== -->
            <h2 id="progresion-geometrica">Progresión Geométrica \(PG\)</h2>
            
            <h3 id="definicion-pg">Definición \(PG\)</h3>
            <p>Es aquella en la que los términos están separados por una razón común \(r\), la cual se obtiene de dividir cualquier término entre el que le antecede (excepto \(a_{1}\) que no tiene antecesor). Los términos posteriores se obtienen de multiplicar la razón común por cualquier término.</p>
            <p>\[ r = \frac{a_n}{a_{n-1}} \]</p>
            
            <h3 id="formulas-pg-termino">Fórmulas Término enésimo \(PG\)</h3>
            <div class="formula-block">
                <p>\[ a_n = a_1 r^{\,n-1} \quad \text{PG1} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PG1</h4>
            <div class="formula-block">
                <p>\[ a_1 = \frac{a_n}{r^{\,n-1}} \quad \text{PG2} \]</p>
                <p>\[ r = \sqrt[n-1]{\frac{a_n}{a_1}} \quad \text{PG3} \]</p>
                <p>\[ n = \frac{\log \left( \frac{a_n}{a_1} \right)}{\log r} + 1 \quad \text{PG4} \]</p>
            </div>
            
            <h3 id="formulas-pg-suma">Fórmula Suma de Términos \(PG\)</h3>
            <div class="formula-block">
                <p>\[ S_n = \frac{r a_n - a_1}{r - 1} \quad \text{PG5} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PG5</h4>
            <div class="formula-block">
                <p>\[ a_1 = r a_n + S_n (1 - r) \quad \text{PG6} \]</p>
                <p>\[ a_n = \frac{S_n (r - 1) + a_1}{r} \quad \text{PG7} \]</p>
                <p>\[ r = \frac{S_n - a_1}{S_n - a_n} \quad \text{PG8} \]</p>
            </div>
            
            <h3 id="formulas-pg-suma-alternativa">Fórmula alternativa Suma de Términos \(PG\)</h3>
            <div class="formula-block">
                <p>\[ S_n = \frac{a_1 (r^{\,n} - 1)}{r - 1} \quad \text{PG9} \]</p>
            </div>
            
            <h4>Fórmulas despejadas PG9</h4>
            <div class="formula-block">
                <p>\[ a_1 = \frac{S_n (r - 1)}{r^{\,n} - 1} \quad \text{PG10} \]</p>
                <p>\[ n = \frac{\log \left( \frac{S_n (r - 1)}{a_1} + 1 \right)}{\log r} \quad \text{PG11} \]</p>
                <p>\(r\) por tanteo en PG9 sin despeje</p>
            </div>
            
            <h3 id="tanteo-pg">Tanteo o ensayo de valores \(PG\)</h3>
            <p>El procedimiento de tanteo consiste en sustituir los valores conocidos en la fórmula original, y ensayar varios valores en \( r \) hasta lograr la igualdad de la ecuación. Como en este caso conocemos el valor de \( r = 0.25 \), sólo ilustraremos posibles valores de ensayo, los cuales son totalmente arbitrarios.</p>
            <p>\[ 23.90625 = \frac{18 \left( r^4 - 1 \right)}{r - 1} \]</p>
            <table class="info-table">
                <thead>
                    <tr>
                        <th>Valor de \( r \)</th>
                        <th>Resultado de sustituir en ecuación</th>
                        <th>Diferencia vs. 23.90625</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td style="text-align: center;">1</td><td style="text-align: center;">Error matemático</td><td style="text-align: center;">El denominador no puede ser cero</td></tr>
                    <tr><td style="text-align: center;">0.5</td><td style="text-align: center;">33.75</td><td style="text-align: center;">9.84375</td></tr>
                    <tr><td style="text-align: center;">0.35</td><td style="text-align: center;">27.27675</td><td style="text-align: center;">3.3705</td></tr>
                    <tr><td style="text-align: center;">0.2</td><td style="text-align: center;">22.464</td><td style="text-align: center;">– 1.44225</td></tr>
                    <tr><td style="text-align: center;">0.25</td><td style="text-align: center;">23.90625</td><td style="text-align: center;">0.00</td></tr>
                </tbody>
            </table>
            
            <h3 id="interpolacion-pg">Interpolación geométrica \(PG\)</h3>
            <p>Es el proceso de insertar términos desconocidos entre dos extremos para que formen una \(PG\).</p>
            <p>Para interpolar \(k\) términos entre \(a_1\) y \(a_n\): \(r = \sqrt[n-1]{\frac{a_n}{a_1}}\) donde \(n = k + 2\).</p>

            <div class="section-divider"></div>
        </main>

        <aside class="toc-sidebar" aria-label="Índice de temas">
            <div class="toc-title">Índice Progresiones</div>
            <nav class="toc-nav">
                <ul>
                    <li><a href="#generalidades">Generalidades</a>
                        <ul class="toc-sub">
                            <li><a href="#introduccion">Introducción Progresiones</a></li>
                            <li><a href="#definicion">Definición progresión</a></li>
                            <li><a href="#variables">Variables de las progresiones</a></li>
                            <li><a href="#diferencia-razon">Diferencia o razón común</a></li>
                        </ul>
                    </li>
                    <li><a href="#progresion-aritmetica">Progresión Aritmética PA</a>
                        <ul class="toc-sub">
                            <li><a href="#definicion-pa">Definición PA</a></li>
                            <li><a href="#formulas-pa-termino">Fórmulas Término enésimo PA</a></li>
                            <li><a href="#formulas-pa-suma">Fórmula Suma de Términos PA</a></li>
                            <li><a href="#formulas-pa-suma-alternativa">Fórmula alternativa Suma de Términos PA</a></li>
                            <li><a href="#interpolacion-pa">Interpolación aritmética PA</a></li>
                        </ul>
                    </li>
                    <li><a href="#progresion-geometrica">Progresión Geométrica PG</a>
                        <ul class="toc-sub">
                            <li><a href="#definicion-pg">Definición PG</a></li>
                            <li><a href="#formulas-pg-termino">Fórmulas Término enésimo PG</a></li>
                            <li><a href="#formulas-pg-suma">Fórmula Suma de Términos PG</a></li>
                            <li><a href="#formulas-pg-suma-alternativa">Fórmula alternativa Suma de Términos PG</a></li>
                            <li><a href="#tanteo-pg">Tanteo o ensayo de valores PG</a></li>
                            <li><a href="#interpolacion-pg">Interpolación geométrica PG</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </aside>
    </div>
</div>

<a href="../Menus/progresiones.php" class="back-to-top"><i class="fas fa-arrow-left"></i> Regresar al Menú</a>
<?php mafi_page_end(); ?>
