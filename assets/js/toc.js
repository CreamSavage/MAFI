/**
 * Sistema MAFI - Generador automático de Tabla de Contenidos (TOC) con ScrollSpy.
 * Utilizado en Teoría, Ejemplos y Ejercicios.
 */
document.addEventListener('DOMContentLoaded', () => {
    const scrollWithOffset = (target, id) => {
        const y = target.getBoundingClientRect().top + window.scrollY - 95;
        window.scrollTo({ top: y, behavior: 'smooth' });
        history.replaceState(null, '', `#${id}`);
    };

    const attachSpy = (links) => {
        if (links.length === 0) return;

        const targets = [];
        const byId = {};
        links.forEach((a) => {
            const href = a.getAttribute('href') || '';
            if (!href.startsWith('#')) return;
            const id = href.slice(1);
            const el = document.getElementById(id);
            if (!el) return;
            byId[id] = a;
            targets.push(el);
            a.addEventListener('click', (e) => {
                e.preventDefault();
                scrollWithOffset(el, id);
            });
        });

        if (targets.length === 0) return;

        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const link = byId[entry.target.id];
                    if (link && entry.isIntersecting) {
                        links.forEach((l) => l.classList.remove('active'));
                        link.classList.add('active');
                    }
                });
            },
            { rootMargin: '-35% 0px -55% 0px', threshold: 0.01 }
        );

        targets.forEach((el) => observer.observe(el));
    };

    const content =
        document.querySelector('[data-toc-content]') ||
        document.getElementById('teoria-contenido') ||
        document.getElementById('ejemplos-contenido') ||
        document.getElementById('ejercicios-contenido');
    const tocList = document.getElementById('toc-list');

    // Modo manual: índice estático pre-construido (.toc-tree / .toc-nav)
    if (!content || !tocList) {
        const manualLinks = [...document.querySelectorAll('.toc-sidebar a[href^="#"]')];
        attachSpy(manualLinks);
        return;
    }

    const selector =
        content.getAttribute('data-toc-levels') ||
        (content.id === 'ejemplos-contenido' ? 'h2' : 'h2, h3');
    const headings = content.querySelectorAll(selector);
    const usedIds = new Set();

    const slugify = (text) =>
        text
            .toLowerCase()
            .normalize('NFD')
            .replace(/[\u0300-\u036f]/g, '')
            .replace(/[^a-z0-9]+/g, '-')
            .replace(/(^-|-$)/g, '') || 'seccion';

    headings.forEach((h) => {
        const level = h.tagName.toLowerCase();
        let id = h.id || slugify(h.textContent.trim());
        const base = id;
        let suffix = 2;
        while (usedIds.has(id) || (document.getElementById(id) && document.getElementById(id) !== h)) {
            id = `${base}-${suffix++}`;
        }
        usedIds.add(id);
        h.id = id;

        const li = document.createElement('li');
        const a = document.createElement('a');
        a.href = `#${id}`;
        a.textContent = h.textContent.trim();
        if (level === 'h3' && selector.includes('h3')) {
            a.classList.add('toc-h3');
        }

        li.appendChild(a);
        tocList.appendChild(li);
    });

    attachSpy([...tocList.querySelectorAll('a')]);
});
