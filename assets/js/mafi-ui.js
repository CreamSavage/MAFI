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
});
