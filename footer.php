<?php
require_once __DIR__ . '/includes/bootstrap.php';
?>
<footer class="site-footer">
    <div class="footer-compact-container">
        <div class="footer-info">
            <div class="footer-brand">
                <img src="<?php echo e(app_path('img/logo_unam.jpeg?v=' . (defined('MAFI_ASSET_VERSION') ? MAFI_ASSET_VERSION : '20261117c'))); ?>" alt="Escudo UNAM" class="footer-logo-img footer-logo-unam">
                <div class="footer-brand-text">
                    <span class="footer-brand-inst">Universidad Nacional Autónoma de México</span>
                    <span class="footer-brand-fac">Facultad de Estudios Superiores Cuautitlán</span>
                </div>
            </div>
            <span>
                <i class="fas fa-code"></i> Desarrollo: Synthex
            </span>
            <span>
                <i class="fas fa-users"></i> Equipo de desarrollo: Canales Salvador Hernan · Cardoso Olguin Laura Andrea · Hernandez Escalona Sergio Ituriel · Lucio Prado Patricio · Montes Lara Eduardo · Murillo Campos Oscar Ulises · Pérez Ahumada Jesús Fernando · Villeda Luna Diana
            </span>
            <span>
                <i class="fas fa-users"></i> Equipo asesor: Dr. Hugo Sánchez Nava · Dr. Leonel Gualberto López Salazar · Dr. José Juan Contreras Espinosa · Dr. Valentín Roldán Vázquez
            </span>
            <span>
                <i class="fas fa-users"></i> Equipo técnico: Mtro. Gonzalo Iván Hernández Vazquez · Mtro. Iván Nuñez Consuelos · Ing. José Juan Rico Castro
            </span>
        </div>

        <div class="footer-links-group">
            <span class="d-none d-md-inline-block">|</span>
            <span>
                <i class="fas fa-envelope"></i>
                <a href="mailto:sistemamafi@gmail.com">sistemamafi@gmail.com</a>
            </span>
            <a href="<?php echo e(app_path('Login/aviso_privacidad.php')); ?>">Aviso de Privacidad y Términos</a>
            <a href="<?php echo e(app_path('creditos.php')); ?>">Créditos</a>
        </div>

        <div class="footer-copyright">
            Sistema MAFI © <?php echo date('Y'); ?>. Todos los derechos reservados.
        </div>
    </div>
</footer>
