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
        scrollTopBtn.className = 'mafi-scroll-top-btn' + (document.querySelector('.back-to-top') ? ' has-bottom-action' : '');
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

    // 8. Switch rápido de Modo Claro / Oscuro en la barra superior
    const syncThemeIcons = (tema) => {
        document.querySelectorAll('[data-theme-toggle] i').forEach((ic) => {
            ic.classList.toggle('fa-sun', tema === 'oscuro');
            ic.classList.toggle('fa-moon', tema !== 'oscuro');
        });
    };
    syncThemeIcons(document.documentElement.getAttribute('data-theme') || 'claro');

    document.querySelectorAll('[data-theme-toggle]').forEach((btn) => {
        btn.addEventListener('click', () => {
            const current = document.documentElement.getAttribute('data-theme') || 'claro';
            const next = current === 'oscuro' ? 'claro' : 'oscuro';
            document.documentElement.setAttribute('data-theme', next);
            syncThemeIcons(next);

            const endpoint = btn.getAttribute('data-endpoint');
            const csrf = btn.getAttribute('data-csrf') || '';
            if (endpoint) {
                const body = new URLSearchParams({ tema: next, csrf_token: csrf });
                fetch(endpoint, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: body.toString(),
                    credentials: 'same-origin'
                }).catch(() => {});
            }
        });
    });

    // 9. Medidor visual de fortaleza de contraseña y coincidencia en vivo
    document.querySelectorAll('[data-password-strength]').forEach((input) => {
        const host = input.closest('.password-container') || input.parentElement;
        if (!host) return;

        const meter = document.createElement('div');
        meter.className = 'mafi-pw-meter mt-2 mb-2';
        meter.innerHTML =
            '<div class="mafi-pw-bar-track"><div class="mafi-pw-bar-fill"></div></div>' +
            '<div class="d-flex justify-content-between align-items-center mt-1">' +
            '  <span class="mafi-pw-label small fw-semibold"></span>' +
            '</div>' +
            '<div class="mafi-pw-rules">' +
            '  <span class="mafi-pw-rule" data-rule="len">8+ caracteres</span>' +
            '  <span class="mafi-pw-rule" data-rule="upper">Mayúscula</span>' +
            '  <span class="mafi-pw-rule" data-rule="lower">Minúscula</span>' +
            '  <span class="mafi-pw-rule" data-rule="num">Número</span>' +
            '  <span class="mafi-pw-rule" data-rule="spec">Especial</span>' +
            '</div>';
        host.insertAdjacentElement('afterend', meter);

        const fill = meter.querySelector('.mafi-pw-bar-fill');
        const label = meter.querySelector('.mafi-pw-label');
        const rules = {
            len: (v) => v.length >= 8,
            upper: (v) => /[A-Z]/.test(v),
            lower: (v) => /[a-z]/.test(v),
            num: (v) => /[0-9]/.test(v),
            spec: (v) => /[^A-Za-z0-9]/.test(v),
        };
        const levels = [
            { text: '', cls: '', pct: 0 },
            { text: 'Muy débil', cls: 'lvl-1', pct: 20 },
            { text: 'Débil', cls: 'lvl-2', pct: 40 },
            { text: 'Media', cls: 'lvl-3', pct: 60 },
            { text: 'Fuerte', cls: 'lvl-4', pct: 80 },
            { text: 'Excelente', cls: 'lvl-5', pct: 100 },
        ];

        const evaluate = () => {
            const val = input.value || '';
            meter.classList.toggle('is-active', val.length > 0);
            let score = 0;
            Object.keys(rules).forEach((k) => {
                const ok = rules[k](val);
                if (ok) score++;
                const chip = meter.querySelector(`[data-rule="${k}"]`);
                if (chip) chip.classList.toggle('is-ok', ok);
            });
            const lvl = levels[score];
            fill.style.width = lvl.pct + '%';
            fill.className = 'mafi-pw-bar-fill ' + lvl.cls;
            label.textContent = lvl.text;
            label.className = 'mafi-pw-label small fw-semibold ' + lvl.cls;
        };

        input.addEventListener('input', evaluate);
    });

    document.querySelectorAll('[data-password-confirm]').forEach((confirmInput) => {
        const primaryId = confirmInput.getAttribute('data-password-confirm');
        const primaryInput = document.getElementById(primaryId);
        const host = confirmInput.closest('.password-container') || confirmInput.parentElement;
        if (!primaryInput || !host) return;

        const feedback = document.createElement('div');
        feedback.className = 'mafi-pw-match small mt-1';
        host.insertAdjacentElement('afterend', feedback);

        const checkMatch = () => {
            const v1 = primaryInput.value || '';
            const v2 = confirmInput.value || '';
            if (!v2) {
                feedback.textContent = '';
                feedback.className = 'mafi-pw-match small mt-1';
                return;
            }
            if (v1 === v2) {
                feedback.innerHTML = '<i class="fas fa-check-circle me-1"></i>Las contraseñas coinciden';
                feedback.className = 'mafi-pw-match small mt-1 is-match';
            } else {
                feedback.innerHTML = '<i class="fas fa-times-circle me-1"></i>Las contraseñas no coinciden';
                feedback.className = 'mafi-pw-match small mt-1 is-mismatch';
            }
        };

        primaryInput.addEventListener('input', checkMatch);
        confirmInput.addEventListener('input', checkMatch);
    });

    // 10. Alertas descartables con cierre suave automático para éxitos
    document.querySelectorAll('.alert:not(.alert-static)').forEach((alertEl) => {
        if (!alertEl.querySelector('.btn-close')) {
            alertEl.classList.add('alert-dismissible', 'fade', 'show');
            const closeBtn = document.createElement('button');
            closeBtn.type = 'button';
            closeBtn.className = 'btn-close';
            closeBtn.setAttribute('data-bs-dismiss', 'alert');
            closeBtn.setAttribute('aria-label', 'Cerrar aviso');
            closeBtn.addEventListener('click', () => alertEl.remove());
            alertEl.appendChild(closeBtn);
        }
        if (alertEl.classList.contains('alert-success')) {
            setTimeout(() => {
                if (!alertEl.isConnected) return;
                alertEl.style.transition = 'opacity 0.4s ease';
                alertEl.style.opacity = '0';
                setTimeout(() => alertEl.remove(), 420);
            }, 5500);
        }
    });

    // 11. Modal institucional de confirmación (reemplaza confirm() nativo)
    const confirmForms = document.querySelectorAll('form[data-confirm]');
    if (confirmForms.length > 0) {
        let pendingForm = null;
        let bsModal = null;

        const modalEl = document.createElement('div');
        modalEl.className = 'modal fade';
        modalEl.id = 'mafiConfirmModal';
        modalEl.tabIndex = -1;
        modalEl.setAttribute('aria-hidden', 'true');
        modalEl.innerHTML =
            '<div class="modal-dialog modal-dialog-centered">' +
            '  <div class="modal-content mafi-confirm-modal">' +
            '    <div class="modal-header">' +
            '      <h5 class="modal-title fw-bold"><i class="fas fa-exclamation-triangle me-2 text-warning"></i><span class="mafi-confirm-title">Confirmar acción</span></h5>' +
            '      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>' +
            '    </div>' +
            '    <div class="modal-body">' +
            '      <p class="mb-0 mafi-confirm-message"></p>' +
            '    </div>' +
            '    <div class="modal-footer">' +
            '      <button type="button" class="btn btn-outline-secondary btn-sm px-3" data-bs-dismiss="modal">Cancelar</button>' +
            '      <button type="button" class="btn btn-danger btn-sm px-3 fw-semibold" id="mafiConfirmAcceptBtn">Confirmar</button>' +
            '    </div>' +
            '  </div>' +
            '</div>';
        document.body.appendChild(modalEl);

        const titleSpan = modalEl.querySelector('.mafi-confirm-title');
        const msgEl = modalEl.querySelector('.mafi-confirm-message');
        const acceptBtn = modalEl.querySelector('#mafiConfirmAcceptBtn');

        acceptBtn.addEventListener('click', () => {
            if (!pendingForm) return;
            const f = pendingForm;
            pendingForm = null;
            f.dataset.confirmApproved = '1';
            if (bsModal) bsModal.hide();
            f.submit();
        });

        confirmForms.forEach((form) => {
            form.addEventListener('submit', (e) => {
                if (form.dataset.confirmApproved === '1') return;
                e.preventDefault();
                const message = form.getAttribute('data-confirm') || '¿Estás seguro de continuar?';
                const title = form.getAttribute('data-confirm-title') || 'Confirmar acción';
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    pendingForm = form;
                    titleSpan.textContent = title;
                    msgEl.textContent = message;
                    bsModal = bootstrap.Modal.getOrCreateInstance(modalEl);
                    bsModal.show();
                } else if (window.confirm(message)) {
                    form.dataset.confirmApproved = '1';
                    form.submit();
                }
            });
        });
    }

    // 12. Envoltorio responsive automático para tablas en teoría, ejemplos, ejercicios y vistas generales
    document.querySelectorAll('.content-card table, .main-container table, .container table').forEach((tbl) => {
        if (tbl.closest('.table-responsive, .calc-table-scroll, .calc-data-table-wrap, .mafi-auto-table-wrap, #amortization-table-container, #fund-table-container, #table-container, #simulation-container, #simulation-table-container')) {
            return;
        }
        const wrap = document.createElement('div');
        wrap.className = 'table-responsive mafi-auto-table-wrap';
        tbl.parentNode.insertBefore(wrap, tbl);
        wrap.appendChild(tbl);
    });
});
