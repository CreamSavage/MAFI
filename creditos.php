<?php
require_once __DIR__ . '/Login/auth.php';
require_once __DIR__ . '/includes/layout.php';

mafi_page_start('Créditos - Sistema MAFI');
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="content-card">
                <div class="header-box mb-4">
                    <h1>Créditos del Sistema MAFI</h1>
                    <p>Matemáticas Financieras · Facultad de Estudios Superiores Cuautitlán</p>
                </div>

                <div class="definition-block">
                    <h3><i class="fas fa-code me-2"></i>Desarrollo y Programación (Synthex)</h3>
                    <ul>
                        <li>Canales Salvador Hernan</li>
                        <li>Cardoso Olguin Laura Andrea</li>
                        <li>Hernandez Escalona Sergio Ituriel</li>
                        <li>Lucio Prado Patricio</li>
                        <li>Montes Lara Eduardo</li>
                        <li>Murillo Campos Oscar Ulises</li>
                        <li>Pérez Ahumada Jesús Fernando</li>
                        <li>Villeda Luna Diana</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3><i class="fas fa-chalkboard-teacher me-2"></i>Equipo Asesor</h3>
                    <ul>
                        <li>Dr. Hugo Sánchez Nava</li>
                        <li>Dr. Leonel Gualberto López Salazar</li>
                        <li>Dr. José Juan Contreras Espinosa</li>
                        <li>Dr. Valentín Roldán Vázquez</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3><i class="fas fa-tools me-2"></i>Equipo Técnico</h3>
                    <ul>
                        <li>Mtro. Gonzalo Iván Hernández Vazquez</li>
                        <li>Mtro. Iván Nuñez Consuelos</li>
                        <li>Ing. José Juan Rico Castro</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3><i class="fas fa-university me-2"></i>Institución</h3>
                    <ul>
                        <li>Universidad Nacional Autónoma de México (UNAM)</li>
                        <li>Facultad de Estudios Superiores Cuautitlán</li>
                    </ul>
                </div>

                <div class="text-center mt-4">
                    <a href="<?php echo e(app_path('temas.php')); ?>" class="btn btn-unam-primary px-4 py-2">
                        <i class="fas fa-arrow-left me-2"></i>Regresar al Inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
mafi_page_end();
