<?php
require_once __DIR__ . '/Login/auth.php';
require_once __DIR__ . '/includes/layout.php';

$carouselDir = __DIR__ . '/img/carrusel';
$carouselSlides = [];
$carouselMeta = [
    'alaslibertad' => [
        'title' => 'Alas de Libertad',
        'subtitle' => 'Patrimonio escultórico · UNAM FES Cuautitlán',
    ],
    'gobierno' => [
        'title' => 'Edificio de Gobierno',
        'subtitle' => 'Identidad institucional · Campus Cuautitlán',
    ],
    'letras' => [
        'title' => 'FES UNAM Cuautitlán',
        'subtitle' => 'Comunidad estudiantil y docencia en Matemáticas Financieras',
    ],
];
if (is_dir($carouselDir)) {
    $entries = scandir($carouselDir) ?: [];
    natcasesort($entries);
    foreach ($entries as $fileName) {
        if (!preg_match('/\.(jpe?g|png|webp)$/i', $fileName)) {
            continue;
        }
        if (!is_file($carouselDir . '/' . $fileName)) {
            continue;
        }
        $slug = strtolower(pathinfo($fileName, PATHINFO_FILENAME));
        $meta = $carouselMeta[$slug] ?? [
            'title' => ucwords(str_replace(['-', '_'], ' ', $slug)),
            'subtitle' => 'UNAM FES Cuautitlán · Matemáticas Financieras',
        ];
        $carouselSlides[] = [
            'src' => app_path('img/carrusel/' . $fileName),
            'title' => $meta['title'],
            'subtitle' => $meta['subtitle'],
        ];
    }
}

mafi_page_start('Menú - Matemáticas Financieras');
?>
<?php if (!empty($carouselSlides)): ?>
<section class="campus-showcase-section" aria-label="Bienvenida y Galería Institucional">
    <div class="campus-showcase-container">
        <div id="campusCarousel"
             class="carousel slide campus-showcase-carousel"
             data-bs-ride="carousel"
             data-bs-interval="4500"
             data-bs-pause="hover">
            <div class="carousel-inner">
                <?php foreach ($carouselSlides as $idx => $slide): ?>
                <div class="carousel-item<?php echo $idx === 0 ? ' active' : ''; ?>">
                    <img src="<?php echo e($slide['src']); ?>"
                         class="d-block w-100 campus-showcase-img"
                         alt="<?php echo e($slide['title'] . ' — ' . $slide['subtitle']); ?>"
                         loading="<?php echo $idx === 0 ? 'eager' : 'lazy'; ?>"
                         decoding="async">
                    <div class="campus-showcase-tag">
                        <span class="campus-showcase-tag-pill">FES Cuautitlán</span>
                        <span class="campus-showcase-tag-title"><?php echo e($slide['title']); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if (count($carouselSlides) > 1): ?>
            <div class="carousel-indicators">
                <?php foreach ($carouselSlides as $idx => $slide): ?>
                <button type="button"
                        data-bs-target="#campusCarousel"
                        data-bs-slide-to="<?php echo $idx; ?>"
                        class="<?php echo $idx === 0 ? 'active' : ''; ?>"
                        <?php echo $idx === 0 ? 'aria-current="true"' : ''; ?>
                        aria-label="<?php echo e('Diapositiva ' . ($idx + 1) . ': ' . $slide['title']); ?>"></button>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#campusCarousel" data-bs-slide="prev" aria-label="Imagen anterior">
                <span class="campus-carousel-control" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#campusCarousel" data-bs-slide="next" aria-label="Imagen siguiente">
                <span class="campus-carousel-control" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            </button>
            <?php endif; ?>

            <div class="campus-showcase-bar">
                <div class="campus-showcase-info">
                    <h1 class="campus-showcase-title">Sistema MAFI</h1>
                    <p class="campus-showcase-lead">Explora, practica y domina las Matemáticas Financieras con herramientas interactivas.</p>
                </div>
                <div class="campus-showcase-cta">
                    <a href="<?php echo e(app_path('Clases/gestion_clases.php')); ?>" class="btn-gold">
                        <i class="fas fa-users-gear"></i> Gestionar mis clases
                    </a>
                    <a href="#modulos" class="btn-outline-gold">
                        <i class="fas fa-th-large"></i> Ver módulos
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else: ?>
<section class="hero">
    <div class="hero-inner">
        <div class="hero-content">
            <h1 class="display-6">Sistema MAFI</h1>
            <p class="lead">Explora, practica y domina las Matemáticas Financieras con herramientas interactivas.</p>
            <div class="hero-cta">
                <a href="<?php echo e(app_path('Clases/gestion_clases.php')); ?>" class="btn-gold">
                    <i class="fas fa-users-gear"></i> Gestionar mis clases
                </a>
                <a href="#modulos" class="btn-outline-gold">
                    <i class="fas fa-th-large"></i> Ver módulos
                </a>
            </div>
        </div>
        <div class="hero-logos">
            <img src="<?php echo e(app_path('img/Banner_Login.jpg')); ?>" alt="UNAM FES Cuautitlán">
        </div>
    </div>
</section>
<?php endif; ?>

<section id="modulos" class="section-modulos">
    <div class="section-inner">
        <div class="section-title">
            <div class="gold-divider"></div>
            <h2>Módulos principales</h2>
        </div>

        <div class="modules-filter-bar mb-4" role="tablist" aria-label="Filtrar temas">
            <button type="button" class="filter-pill active" data-filter="all">
                <i class="fas fa-th-large me-1"></i> Todos <span class="filter-pill-count">8</span>
            </button>
            <button type="button" class="filter-pill" data-filter="base">
                <i class="fas fa-calculator me-1"></i> Básicos y Descuento <span class="filter-pill-count">4</span>
            </button>
            <button type="button" class="filter-pill" data-filter="amortizacion">
                <i class="fas fa-file-invoice-dollar me-1"></i> Amortización <span class="filter-pill-count">2</span>
            </button>
            <button type="button" class="filter-pill" data-filter="fondos">
                <i class="fas fa-piggy-bank me-1"></i> Fondos de Ahorro <span class="filter-pill-count">2</span>
            </button>
        </div>

        <div class="feature-grid">
            <a class="feature-card" data-category="base" href="<?php echo e(app_path('Menus/fundamentos.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-book"></i></span>
                    <span class="feature-badge">Base</span>
                </div>
                <h3>FUNDAMENTOS</h3>
                <p>Conceptos base de Matemáticas Financieras.</p>
                <span class="feature-tools-count"><i class="fas fa-book-open me-1"></i>Teoría y Conceptos</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="base" href="<?php echo e(app_path('Menus/interes_simple.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-calculator"></i></span>
                    <span class="feature-badge">Base</span>
                </div>
                <h3>INTERÉS SIMPLE</h3>
                <p>Cálculo de valor final, principal, tasa y plazo.</p>
                <span class="feature-tools-count"><i class="fas fa-layer-group me-1"></i>4 calculadoras + simulador</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="base" href="<?php echo e(app_path('Menus/interes_compuesto.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-chart-line"></i></span>
                    <span class="feature-badge">Base</span>
                </div>
                <h3>INTERÉS COMPUESTO</h3>
                <p>Capitalización y conversión de tasas por periodo.</p>
                <span class="feature-tools-count"><i class="fas fa-layer-group me-1"></i>4 calculadoras + simulador</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="base" href="<?php echo e(app_path('Menus/descuento_bancario.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-receipt"></i></span>
                    <span class="feature-badge">Base</span>
                </div>
                <h3>DESCUENTO BANCARIO</h3>
                <p>Descuento, monto, capital, tasa y plazo.</p>
                <span class="feature-tools-count"><i class="fas fa-layer-group me-1"></i>4 calculadoras + simulador</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="amortizacion" href="<?php echo e(app_path('Menus/amortizacion_con_rv.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-file-invoice-dollar"></i></span>
                    <span class="feature-badge">Valor Presente</span>
                </div>
                <h3>VALOR PRESENTE CON RENTA VENCIDA (AMORTIZACIÓN)</h3>
                <p>Valor presente, renta, tasa, plazo y tablas.</p>
                <span class="feature-tools-count"><i class="fas fa-table-list me-1"></i>4 calculadoras + tablas</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="amortizacion" href="<?php echo e(app_path('Menus/amortizacion_con_ra.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-hand-holding-dollar"></i></span>
                    <span class="feature-badge">Valor Presente</span>
                </div>
                <h3>VALOR PRESENTE CON RENTA ANTICIPADA (AMORTIZACIÓN)</h3>
                <p>Valor presente, renta, tasa, plazo y tablas.</p>
                <span class="feature-tools-count"><i class="fas fa-table-list me-1"></i>4 calculadoras + tablas</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="fondos" href="<?php echo e(app_path('Menus/fondo_rv.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-piggy-bank"></i></span>
                    <span class="feature-badge">Valor Futuro</span>
                </div>
                <h3>VALOR FUTURO CON RENTA VENCIDA (FONDO DE AMORTIZACIÓN)</h3>
                <p>Valor futuro, renta, tasa, plazo y tablas.</p>
                <span class="feature-tools-count"><i class="fas fa-table-list me-1"></i>4 calculadoras + tablas</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
            <a class="feature-card" data-category="fondos" href="<?php echo e(app_path('Menus/fondo_ra.php')); ?>">
                <div class="feature-card-top">
                    <span class="feature-icon"><i class="fas fa-piggy-bank"></i></span>
                    <span class="feature-badge">Valor Futuro</span>
                </div>
                <h3>VALOR FUTURO CON RENTA ANTICIPADA (FONDO DE AMORTIZACIÓN)</h3>
                <p>Valor futuro, renta, tasa, plazo y tablas.</p>
                <span class="feature-tools-count"><i class="fas fa-table-list me-1"></i>4 calculadoras + tablas</span>
                <i class="fas fa-arrow-right feature-arrow"></i>
            </a>
        </div>
    </div>
</section>
<?php
$inlineFilterJs = <<<JS
document.querySelectorAll('.filter-pill').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.filter-pill').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.feature-card').forEach(card => {
            if (filter === 'all' || card.dataset.category === filter) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
JS;
mafi_page_end(['inlineJs' => $inlineFilterJs]);
