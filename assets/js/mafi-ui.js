/**
 * Sistema MAFI - Utilidades globales de UI, micro-interacciones y optimización.
 */
window.MAFI = window.MAFI || {};

// Alternar visibilidad de contraseña
window.MAFI.togglePassword = function (inputId, iconOrId) {
    const input = document.getElementById(inputId);
    const icon = typeof iconOrId === 'string' ? document.getElementById(iconOrId) : iconOrId;
    if (!input) return;

    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';

    if (icon) {
        icon.classList.toggle('fa-eye', !isPassword);
        icon.classList.toggle('fa-eye-slash', isPassword);
    }
};

// Copiar al portapapeles con feedback visual
window.MAFI.copyToClipboard = function (text, btnElement) {
    if (!navigator.clipboard) {
        const textarea = document.createElement('textarea');
        textarea.value = text;
        textarea.style.position = 'fixed';
        textarea.style.opacity = '0';
        document.body.appendChild(textarea);
        textarea.select();
        try {
            document.execCommand('copy');
            if (btnElement) window.MAFI.showCopiedState(btnElement);
        } catch (e) {
            console.error('Error al copiar:', e);
        }
        document.body.removeChild(textarea);
        return;
    }

    navigator.clipboard.writeText(text).then(() => {
        if (btnElement) window.MAFI.showCopiedState(btnElement);
    }).catch((err) => {
        console.error('Error al copiar al portapapeles:', err);
    });
};

window.MAFI.showCopiedState = function (btnElement) {
    const originalHtml = btnElement.innerHTML;
    btnElement.classList.add('copied');
    btnElement.innerHTML = '<i class="fas fa-check"></i> ¡Copiado!';
    setTimeout(() => {
        btnElement.classList.remove('copied');
        btnElement.innerHTML = originalHtml;
    }, 1800);
};

document.addEventListener('DOMContentLoaded', () => {
    // 1. Alternar contraseñas
    document.querySelectorAll('[data-toggle-password]').forEach((trigger) => {
        trigger.addEventListener('click', () => {
            const targetId = trigger.getAttribute('data-toggle-password');
            const icon = trigger.querySelector('i') || trigger;
            window.MAFI.togglePassword(targetId, icon);
        });
    });

    // 2. Inicializar tooltips de Bootstrap de forma segura
    if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach((el) => {
            new bootstrap.Tooltip(el);
        });
    }

    // 3. Optimización de carga de imágenes (Lazy loading nativo diferido)
    document.querySelectorAll('img:not([loading])').forEach((img) => {
        // Excluir logos de encabezado de lazy-loading para evitar parpadeos
        if (!img.classList.contains('header-logo-fesc') && !img.closest('.navbar-brand')) {
            img.loading = 'lazy';
            img.decoding = 'async';
        }
    });

    // 4. Barra de progreso de lectura en módulos teóricos
    const isTheoryPage = window.location.pathname.toLowerCase().includes('/teoria/') ||
        document.querySelector('.teoria-container, .theory-card, .teoria-section');
    if (isTheoryPage) {
        const bar = document.createElement('div');
        bar.className = 'reading-progress-bar';
        document.body.appendChild(bar);

        let ticking = false;
        window.addEventListener('scroll', () => {
            if (!ticking) {
                window.requestAnimationFrame(() => {
                    const scrollTotal = document.documentElement.scrollHeight - window.innerHeight;
                    const progress = scrollTotal > 0 ? (window.scrollY / scrollTotal) * 100 : 0;
                    bar.style.width = Math.min(100, Math.max(0, progress)) + '%';
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }

    // 5. Soporte automático para botones con [data-copy-target]
    document.querySelectorAll('[data-copy-target]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-copy-target');
            const targetEl = document.getElementById(targetId);
            if (targetEl) {
                const text = targetEl.innerText || targetEl.textContent || '';
                window.MAFI.copyToClipboard(text.trim(), btn);
            }
        });
    });

    // 6. Visor Zoom (Lightbox) para imágenes de teoría, ejemplos y fórmulas
    const zoomableImgs = Array.from(document.querySelectorAll('.content-card img')).filter((img) => {
        return !img.classList.contains('header-logo-fesc') &&
            !img.classList.contains('footer-logo-img') &&
            !img.closest('a');
    });

    if (zoomableImgs.length > 0) {
        const overlay = document.createElement('div');
        overlay.className = 'mafi-lightbox-overlay';
        overlay.setAttribute('role', 'dialog');
        overlay.setAttribute('aria-modal', 'true');
        overlay.setAttribute('aria-label', 'Vista ampliada de imagen');
        overlay.innerHTML =
            '<button type="button" class="mafi-lightbox-close" aria-label="Cerrar vista ampliada"><i class="fas fa-times"></i></button>' +
            '<img class="mafi-lightbox-img" alt="">' +
            '<div class="mafi-lightbox-caption"></div>';
        document.body.appendChild(overlay);

        const lbImg = overlay.querySelector('.mafi-lightbox-img');
        const lbCaption = overlay.querySelector('.mafi-lightbox-caption');
        const lbClose = overlay.querySelector('.mafi-lightbox-close');

        const closeLightbox = () => {
            overlay.classList.remove('is-open');
            document.body.style.overflow = '';
        };

        overlay.addEventListener('click', (e) => {
            if (e.target === overlay || e.target === lbImg || e.target.closest('.mafi-lightbox-close')) {
                closeLightbox();
            }
        });

        lbClose.addEventListener('click', closeLightbox);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && overlay.classList.contains('is-open')) {
                closeLightbox();
            }
        });

        zoomableImgs.forEach((img) => {
            img.classList.add('mafi-zoomable');
            if (!img.title) {
                img.title = 'Haz clic para ampliar';
            }
            img.addEventListener('click', () => {
                lbImg.src = img.currentSrc || img.src;
                lbImg.alt = img.alt || '';
                lbCaption.textContent = img.alt || '';
                lbCaption.style.display = img.alt ? 'block' : 'none';
                overlay.classList.add('is-open');
                document.body.style.overflow = 'hidden';
            });
        });
    }

    // 7. Botón flotante discreto "Volver arriba" en páginas con scroll largo
    if (!document.getElementById('mafi-scroll-top')) {
        const scrollTopBtn = document.createElement('button');
        scrollTopBtn.type = 'button';
        scrollTopBtn.id = 'mafi-scroll-top';
        scrollTopBtn.className = 'mafi-scroll-top-btn';
        scrollTopBtn.setAttribute('aria-label', 'Volver al inicio de la página');
        scrollTopBtn.title = 'Volver arriba';
        scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
        document.body.appendChild(scrollTopBtn);

        let scrollTick = false;
        window.addEventListener('scroll', () => {
            if (!scrollTick) {
                window.requestAnimationFrame(() => {
                    scrollTopBtn.classList.toggle('is-visible', window.scrollY > 360);
                    scrollTick = false;
                });
                scrollTick = true;
            }
        }, { passive: true });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
