/**
 * Sistema MAFI - Núcleo compartido para las 28 calculadoras financieras.
 * - Detección inteligente de tasas (porcentajes, decimales y fracciones).
 * - Formateo numérico y monetario uniforme (es-MX).
 * - Manejo seguro de diagramas de tiempo, secciones y MathJax.
 */
(function (global) {
    'use strict';

    const NUMERIC_RE = /^[+-]?(?:\d+\.?\d*|\.\d+)$/;
    const MAX_TABLE_ROWS = 2500;
    const INT_FORMATTER = new Intl.NumberFormat('es-MX');
    const CURRENCY_FORMATTER = new Intl.NumberFormat('es-MX', { style: 'currency', currency: 'MXN' });
    const NUMBER_FORMATTERS = Object.create(null);

    /**
     * Parsea una tasa ingresada en %, decimal o fracción con autodetección inteligente.
     *
     * Reglas de interpretación:
     * - Si incluye '%' en cualquier posición (ej. '5%', '0.5%', '5/12%', '5%/12'): divide entre 100.
     * - En modo 'percent': siempre divide el valor o fracción entre 100.
     * - En modo 'decimal': toma el valor o fracción tal cual en forma decimal.
     * - En modo 'auto' (por defecto, sin '%'):
     *   * Número >= 1 (ej. '5', '12.5') -> porcentaje (0.05, 0.125).
     *   * Número < 1 (ej. '0.05', '0.15') -> decimal (0.05, 0.15).
     *   * Fracción a/b con |a| >= 1 (ej. '5/12', '18/360') -> (a/b)/100.
     *   * Fracción a/b con |a| < 1 (ej. '0.05/12') -> a/b directamente.
     */
    function parseRateDetailed(rawValue, forceMode = 'auto') {
        const original = String(rawValue ?? '').trim().replace(/,/g, '.');
        if (original === '') {
            return { rate: NaN, percent: NaN, detectedMode: forceMode, isFraction: false, valid: false };
        }

        const hasPercent = original.includes('%');
        const cleaned = original.replace(/%/g, '').replace(/\s+/g, '');
        if (cleaned === '') {
            return { rate: NaN, percent: NaN, detectedMode: forceMode, isFraction: false, valid: false };
        }

        let numericValue = NaN;
        let isFraction = false;
        let baseMagnitude = NaN;

        if (cleaned.includes('/')) {
            const parts = cleaned.split('/');
            if (parts.length !== 2 || !NUMERIC_RE.test(parts[0]) || !NUMERIC_RE.test(parts[1])) {
                return { rate: NaN, percent: NaN, detectedMode: forceMode, isFraction: true, valid: false };
            }
            const num = parseFloat(parts[0]);
            const den = parseFloat(parts[1]);
            if (!isFinite(num) || !isFinite(den) || den === 0) {
                return { rate: NaN, percent: NaN, detectedMode: forceMode, isFraction: true, valid: false };
            }
            isFraction = true;
            baseMagnitude = Math.abs(num);
            numericValue = num / den;
        } else {
            if (!NUMERIC_RE.test(cleaned)) {
                return { rate: NaN, percent: NaN, detectedMode: forceMode, isFraction: false, valid: false };
            }
            numericValue = parseFloat(cleaned);
            baseMagnitude = Math.abs(numericValue);
        }

        let rate = numericValue;
        let detectedMode = 'decimal';

        if (hasPercent) {
            rate = numericValue / 100;
            detectedMode = 'percent_explicit';
        } else if (forceMode === 'percent') {
            rate = numericValue / 100;
            detectedMode = 'percent_forced';
        } else if (forceMode === 'decimal') {
            rate = numericValue;
            detectedMode = 'decimal_forced';
        } else {
            if (baseMagnitude >= 1) {
                rate = numericValue / 100;
                detectedMode = 'auto_percent';
            } else {
                rate = numericValue;
                detectedMode = 'auto_decimal';
            }
        }

        return {
            rate,
            percent: rate * 100,
            detectedMode,
            isFraction,
            valid: isFinite(rate)
        };
    }

    function parseRate(rawValue, forceMode) {
        return parseRateDetailed(rawValue, forceMode || 'auto').rate;
    }

    function readRateFromInput(inputId) {
        const el = document.getElementById(inputId);
        if (!el) return NaN;
        const mode = el.getAttribute('data-rate-mode') || 'auto';
        return parseRateDetailed(el.value, mode).rate;
    }

    function formatPreviewNum(n, maxDecimals = 6) {
        if (!isFinite(n)) return '—';
        const rounded = parseFloat(n.toFixed(maxDecimals));
        return String(rounded);
    }

    function updateRateHelper(inputEl) {
        if (!inputEl) return;
        const bar = inputEl.closest('td')?.querySelector('.rate-helper-bar');
        if (!bar) return;
        const info = bar.querySelector('.rate-interpretation');
        if (!info) return;

        const raw = inputEl.value.trim();
        if (raw === '') {
            info.textContent = 'Acepta % (5%), dec (0.05) o fracción (5/12)';
            info.classList.remove('is-error');
            return;
        }

        const mode = inputEl.getAttribute('data-rate-mode') || 'auto';
        const parsed = parseRateDetailed(raw, mode);
        if (!parsed.valid) {
            info.textContent = 'Formato inválido';
            info.classList.add('is-error');
            return;
        }

        info.classList.remove('is-error');
        const label =
            parsed.detectedMode === 'percent_explicit' ? 'Explícito %' :
            parsed.detectedMode === 'percent_forced'   ? 'Modo %' :
            parsed.detectedMode === 'decimal_forced'   ? 'Modo Dec' :
            parsed.detectedMode === 'auto_percent'     ? 'Auto %' : 'Auto Dec';

        info.textContent = `${label}: ${formatPreviewNum(parsed.percent, 4)}% (dec ${formatPreviewNum(parsed.rate, 6)})`;
    }

    function attachRateHelper(inputEl) {
        if (!inputEl || inputEl.dataset.rateHelperAttached === 'true') return;
        inputEl.dataset.rateHelperAttached = 'true';

        if (!inputEl.getAttribute('data-rate-mode')) {
            inputEl.setAttribute('data-rate-mode', 'auto');
        }

        const td = inputEl.closest('td');
        if (!td) return;

        const bar = document.createElement('div');
        bar.className = 'rate-helper-bar';
        bar.innerHTML = `
            <div class="rate-mode-pills" role="group" aria-label="Modo de tasa">
                <button type="button" class="rate-mode-btn active" data-mode="auto" title="Detección automática">Auto</button>
                <button type="button" class="rate-mode-btn" data-mode="percent" title="Interpretar siempre como porcentaje">%</button>
                <button type="button" class="rate-mode-btn" data-mode="decimal" title="Interpretar siempre como decimal">Dec</button>
            </div>
            <span class="rate-interpretation">Acepta % (5%), dec (0.05) o fracción (5/12)</span>
        `;

        td.appendChild(bar);

        bar.querySelectorAll('.rate-mode-btn').forEach((btn) => {
            btn.addEventListener('click', () => {
                const newMode = btn.getAttribute('data-mode');
                inputEl.setAttribute('data-rate-mode', newMode);
                bar.querySelectorAll('.rate-mode-btn').forEach((b) => b.classList.toggle('active', b === btn));
                updateRateHelper(inputEl);
                inputEl.dispatchEvent(new Event('change', { bubbles: true }));
            });
        });

        ['input', 'change'].forEach((evt) => {
            inputEl.addEventListener(evt, () => updateRateHelper(inputEl));
        });

        updateRateHelper(inputEl);
    }

    function formatNumber(value, decimals = 2) {
        if (!isFinite(value)) return '-';
        if (!NUMBER_FORMATTERS[decimals]) {
            NUMBER_FORMATTERS[decimals] = new Intl.NumberFormat('es-MX', {
                minimumFractionDigits: decimals,
                maximumFractionDigits: decimals
            });
        }
        return NUMBER_FORMATTERS[decimals].format(value);
    }

    function formatCurrency(value, decimals = 2) {
        if (!isFinite(value)) return '-';
        return '$' + formatNumber(value, decimals);
    }

    function formatPeriodResult(value) {
        if (!isFinite(value)) return '¿?';
        return Math.abs(value - Math.round(value)) < 1e-6
            ? String(Math.round(value))
            : value.toFixed(2);
    }

    function resolvePeriodCount(value) {
        if (!isFinite(value) || value <= 0) return 0;
        const rounded = Math.round(value);
        if (Math.abs(value - rounded) < 1e-5) {
            return rounded;
        }
        return Math.ceil(value - 1e-9);
    }

    function buildPeriodConversionLatex(nOriginal, mFrom, mTo, nConv) {
        const origUnit = periodUnitText(mFrom, nOriginal);
        const targetUnit = periodUnitText(mTo, mTo);
        const denUnit = periodUnitText(mFrom, mFrom);
        const numeratorText = formatPeriodResult(nOriginal * mTo);
        const resultText = formatPeriodResult(nConv);
        return `$$ \\Large n = \\frac{${nOriginal} \\text{ ${origUnit}}}{1} \\times \\frac{${mTo} \\text{ ${targetUnit}}}{${mFrom} \\text{ ${denUnit}}} = \\frac{${numeratorText}}{${mFrom}} = ${resultText} \\text{ ${targetUnit}} $$`;
    }

    function parseFormattedNumber(rawValue) {
        if (rawValue === null || typeof rawValue === 'undefined') return 0;
        const cleaned = String(rawValue).replace(/,/g, '').trim();
        const num = parseFloat(cleaned);
        return isFinite(num) ? num : 0;
    }

    function applyThousandFormatting(selector = 'input[data-format-number="true"]') {
        document.querySelectorAll(selector).forEach((input) => {
            if (input.dataset.thousandAttached === 'true') return;
            input.dataset.thousandAttached = 'true';

            input.addEventListener('input', (e) => {
                const el = e.target;
                const originalValue = el.value;
                const cursor = el.selectionStart || 0;
                const origLen = originalValue.length;
                const cleaned = originalValue.replace(/,/g, '');
                const parts = cleaned.split('.');
                const intPart = parts[0].replace(/[^0-9]/g, '');
                const decPart = parts.length > 1 ? parts[1].replace(/[^0-9]/g, '') : undefined;

                if (intPart === '' && decPart === undefined) {
                    el.value = '';
                    return;
                }

                let formatted = INT_FORMATTER.format(intPart ? parseInt(intPart, 10) : 0);
                if (decPart !== undefined) {
                    formatted += '.' + decPart.substring(0, 6);
                }

                el.value = formatted;
                const diff = formatted.length - origLen;
                if (typeof el.setSelectionRange === 'function') {
                    const nextPos = Math.max(0, cursor + diff);
                    el.setSelectionRange(nextPos, nextPos);
                }
            });
        });
    }

    function typesetMath(targets) {
        if (!global.MathJax || typeof global.MathJax.typesetPromise !== 'function') return;
        const list = targets ? (Array.isArray(targets) ? targets : [targets]).filter(Boolean) : undefined;
        global.MathJax.typesetPromise(list).catch(() => {});
    }

    function renderTimeline(options) {
        const {
            containerId = 'diagram-container',
            nValue = 0,
            paymentText = '',
            initialText = '',
            finalText = '',
            mode = 'vencida'
        } = options || {};

        const container = document.getElementById(containerId);
        if (!container) return;

        if (!isFinite(nValue) || nValue <= 0) {
            container.innerHTML = '';
            return;
        }

        const maxVisible = 6;
        let html = '';

        if (initialText) {
            html += `<div class="diagram-box">${initialText}</div>`;
        }

        if (nValue <= maxVisible) {
            const count = Math.max(1, Math.round(nValue));
            for (let k = 0; k < count; k++) {
                const marker = mode === 'anticipada' ? (k === 0 ? paymentText : '↑') : '↑';
                html += `<div class="diagram-box">${paymentText || marker}</div>`;
            }
        } else {
            html += `<div class="diagram-box">${paymentText}</div>`;
            html += `<div class="diagram-box">${paymentText}</div>`;
            html += '<div class="diagram-ellipsis">...</div>';
            html += `<div class="diagram-box">${paymentText}</div>`;
        }

        if (finalText) {
            html += `<div class="diagram-box">${finalText}</div>`;
        }

        container.innerHTML = html;
    }

    function showSection(sectionId, onShowMap) {
        const knownIds = [
            'calculator-section',
            'table-section',
            'conversions-section',
            'simulation-section',
            'amortization-section',
            'fund-section',
            'perpetuity-section'
        ];
        knownIds.forEach((id) => {
            const el = document.getElementById(id);
            if (el) el.style.display = 'none';
        });

        const target = document.getElementById(sectionId);
        if (target) target.style.display = 'block';

        if (onShowMap && typeof onShowMap[sectionId] === 'function') {
            onShowMap[sectionId]();
        }
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    const PERIODICITY_SINGULAR = {
        1: 'Anual',
        2: 'Semestral',
        3: 'Cuatrimestral',
        4: 'Trimestral',
        6: 'Bimestral',
        12: 'Mensual',
        24: 'Quincenal',
        52: 'Semanal',
        360: 'Diario'
    };

    const PERIODICITY_PLURAL = {
        1: 'Anuales',
        2: 'Semestrales',
        3: 'Cuatrimestrales',
        4: 'Trimestrales',
        6: 'Bimestrales',
        12: 'Mensuales',
        24: 'Quincenales',
        52: 'Semanales',
        360: 'Diarios'
    };

    const PERIODICITY_UNITS = {
        1: 'Años',
        2: 'Semestres',
        3: 'Cuatrimestres',
        4: 'Trimestres',
        6: 'Bimestres',
        12: 'Meses',
        24: 'Quincenas',
        52: 'Semanas',
        360: 'Días'
    };

    const PERIODICITY_UNIT_SINGULAR = {
        1: 'año',
        2: 'semestre',
        3: 'cuatrimestre',
        4: 'trimestre',
        6: 'bimestre',
        12: 'mes',
        24: 'quincena',
        52: 'semana',
        360: 'día'
    };

    function periodLabel(freq, plural) {
        const key = Number(freq);
        if (plural) {
            return PERIODICITY_PLURAL[key] || (freq + ' veces al año');
        }
        return PERIODICITY_SINGULAR[key] || (freq + ' veces al año');
    }

    function periodUnitText(freq, quantity) {
        const key = Number(freq);
        const singular = PERIODICITY_UNIT_SINGULAR[key] || '';
        const plural = (PERIODICITY_UNITS[key] || (singular ? singular + 's' : '')).toLowerCase();
        return Number(quantity) === 1 ? singular : plural;
    }

    function renderPeriodDiagram(n, options) {
        const {
            containerId = 'diagram-container',
            start = 1,
            perpetuity = false
        } = options || {};

        const container = document.getElementById(containerId);
        if (!container) return;

        if (perpetuity) {
            container.innerHTML = '<div class="diagram-box">∞</div>';
            return;
        }

        const nInt = Math.round(n);
        if (!isFinite(nInt) || nInt <= 0) {
            container.innerHTML = '';
            return;
        }

        const boxes = [];
        if (nInt <= 5) {
            for (let k = 0; k < nInt; k++) {
                boxes.push(`<div class="diagram-box">${start + k}</div>`);
            }
        } else if (start === 0) {
            boxes.push(
                '<div class="diagram-box">0</div>',
                '<div class="diagram-box">1</div>',
                '<div class="diagram-ellipsis">...</div>',
                `<div class="diagram-box">${nInt - 1}</div>`
            );
        } else {
            boxes.push(
                '<div class="diagram-box">1</div>',
                '<div class="diagram-ellipsis">...</div>',
                `<div class="diagram-box">${nInt - 1}</div>`,
                `<div class="diagram-box">${nInt}</div>`
            );
        }
        container.innerHTML = boxes.join('');
    }

    function tableLimitNoticeRow(totalPeriods, colSpan = 6, maxRows = MAX_TABLE_ROWS) {
        if (!isFinite(totalPeriods) || totalPeriods <= maxRows) {
            return '';
        }
        return `<tr class="table-note-row"><td colspan="${colSpan}">Mostrando los primeros ${INT_FORMATTER.format(maxRows)} de ${INT_FORMATTER.format(totalPeriods)} periodos para mantener el rendimiento del navegador.</td></tr>`;
    }

    function bindPeriodicitySelectors(ids) {
        if (!Array.isArray(ids)) return;
        ids.forEach((id) => {
            const element = document.getElementById(id);
            if (!element || element.dataset.freqBound === '1') return;
            element.dataset.freqBound = '1';
            element.addEventListener('change', (e) => {
                const type = e.target.id.split('-')[1];
                const freqEl = document.getElementById(`freq-${type}`);
                if (freqEl) {
                    freqEl.textContent = e.target.value || '?';
                }
            });
        });
    }

    function syncPeriodicityLabels(types) {
        if (!Array.isArray(types)) return;
        types.forEach((type) => {
            const select = document.getElementById(`periodicity-${type}`);
            const freqEl = document.getElementById(`freq-${type}`);
            if (select && freqEl) {
                freqEl.textContent = select.value || '?';
            }
        });
    }

    function attachEnterToCalculate() {
        const calcSection = document.getElementById('calculator-section');
        if (!calcSection || calcSection.dataset.enterCalculateBound === '1') {
            return;
        }
        calcSection.dataset.enterCalculateBound = '1';
        calcSection.addEventListener('keydown', (event) => {
            if (event.key !== 'Enter') {
                return;
            }
            const target = event.target;
            if (!target || (target.tagName !== 'INPUT' && target.tagName !== 'SELECT')) {
                return;
            }
            if (target.tagName === 'INPUT' && (target.type === 'button' || target.type === 'submit' || target.type === 'reset')) {
                return;
            }
            const btn = document.getElementById('btn-calculate');
            if (btn) {
                event.preventDefault();
                btn.click();
            }
        });
    }

    const MODULE_META = {
        'Interes_Simple': { name: 'Interés Simple', menu: 'interes_simple.php' },
        'Interes_Compuesto': { name: 'Interés Compuesto', menu: 'interes_compuesto.php' },
        'Descuento_Bancario': { name: 'Descuento Bancario', menu: 'descuento_bancario.php' },
        'Amortizacion_con_RV': { name: 'Amortización (Renta Vencida)', menu: 'amortizacion_con_rv.php' },
        'Amortizacion_con_RA': { name: 'Amortización (Renta Anticipada)', menu: 'amortizacion_con_ra.php' },
        'Fondo_RV': { name: 'Fondo de Ahorro (Renta Vencida)', menu: 'fondo_rv.php' },
        'Fondo_RA': { name: 'Fondo de Ahorro (Renta Anticipada)', menu: 'fondo_ra.php' }
    };

    function attachCalculatorNav() {
        const calcSection = document.getElementById('calculator-section');
        if (!calcSection || calcSection.dataset.navAttached === '1') return;
        calcSection.dataset.navAttached = '1';

        const path = window.location.pathname.replace(/\\/g, '/');
        let matchedKey = null;
        for (const key of Object.keys(MODULE_META)) {
            if (path.includes('/' + key + '/')) {
                matchedKey = key;
                break;
            }
        }
        if (!matchedKey) return;
        const meta = MODULE_META[matchedKey];
        const h1El = calcSection.querySelector('.header-box h1') || calcSection.querySelector('h1');
        const calcTitle = h1El ? h1El.textContent.trim() : 'Calculadora';

        const topNav = document.createElement('div');
        topNav.className = 'calc-top-nav';
        topNav.innerHTML = `
            <a href="../Menus/${meta.menu}" class="calc-back-btn">
                <i class="fas fa-arrow-left me-1"></i> Volver a Menú ${meta.name}
            </a>
            <nav class="calc-breadcrumbs" aria-label="Ruta de navegación">
                <a href="../temas.php" class="calc-crumb-link"><i class="fas fa-home me-1"></i>Inicio</a>
                <span class="calc-crumb-sep">/</span>
                <a href="../Menus/${meta.menu}" class="calc-crumb-link">${meta.name}</a>
                <span class="calc-crumb-sep">/</span>
                <span class="calc-crumb-current">${calcTitle}</span>
            </nav>
        `;
        const headerBox = calcSection.querySelector('.header-box') || calcSection.firstElementChild;
        if (headerBox) {
            calcSection.insertBefore(topNav, headerBox);
        } else {
            calcSection.prepend(topNav);
        }
    }

    function limpiarFormulario() {
        const calcSection = document.getElementById('calculator-section') || document;
        calcSection.querySelectorAll('input[type="text"]').forEach((inp) => {
            inp.value = '';
            inp.classList.remove('is-invalid', 'is-valid');
        });
        calcSection.querySelectorAll('select').forEach((sel) => {
            sel.selectedIndex = 0;
            sel.dispatchEvent(new Event('change', { bubbles: true }));
        });
        calcSection.querySelectorAll('.result-field, .output-final').forEach((el) => {
            el.textContent = '¿?';
            el.classList.remove('calc-result-pop');
        });
        calcSection.querySelectorAll('.substitution-text, [id^="sustitucion_"]').forEach((el) => {
            el.textContent = '-';
        });
        calcSection.querySelectorAll('[id$="-converted"], [id$="-period-text"]').forEach((el) => {
            el.textContent = '-';
        });
        calcSection.querySelectorAll('[id^="freq-"]').forEach((el) => {
            el.textContent = '?';
        });
        const tContainer = document.getElementById('diagram-container');
        if (tContainer) tContainer.innerHTML = '';

        const amortBody = document.getElementById('amortization-table-body');
        if (amortBody) amortBody.innerHTML = '';
        const capBody = document.getElementById('capitalization-table-body');
        if (capBody) capBody.innerHTML = '';
        const simBody = document.getElementById('simulation-table-body');
        if (simBody) simBody.innerHTML = '';

        const summaryBar = calcSection.querySelector('.calc-table-summary-bar');
        if (summaryBar) summaryBar.style.display = 'none';

        const firstInput = calcSection.querySelector('input[type="text"]');
        if (firstInput) firstInput.focus();
    }

    function buildAmortizationSchedule(options) {
        const {
            principal = 0,
            payment = 0,
            rate = 0,
            periods = 0,
            mode = 'vencida',
            tableBodyId = 'amortization-table-body'
        } = options || {};

        const tableBody = document.getElementById(tableBodyId);
        if (!tableBody) return [];

        if (principal <= 0 || payment <= 0 || periods <= 0) {
            tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-muted py-3">Ingrese datos válidos para generar la tabla</td></tr>';
            return [];
        }

        const nInt = Math.round(periods);
        const loopLimit = Math.min(nInt, MAX_TABLE_ROWS);
        const rows = [];
        let saldoInicial = principal;

        if (mode === 'anticipada') {
            for (let k = 1; k <= loopLimit; k++) {
                const saldoConRenta = saldoInicial - payment;
                const interes = Math.max(0, saldoConRenta * rate);
                const amortizacion = payment - interes;
                let saldoFinal = saldoConRenta + interes;
                if (k === nInt || Math.abs(saldoFinal) < 0.05) saldoFinal = 0;

                rows.push(`<tr>
                    <td>${k}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoInicial)}</td>
                    <td>${CURRENCY_FORMATTER.format(payment)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoConRenta)}</td>
                    <td>${CURRENCY_FORMATTER.format(interes)}</td>
                    <td>${CURRENCY_FORMATTER.format(amortizacion)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoFinal)}</td>
                </tr>`);
                saldoInicial = saldoFinal;
            }
        } else {
            for (let k = 1; k <= loopLimit; k++) {
                const interes = saldoInicial * rate;
                const amortizacion = payment - interes;
                let saldoFinal = saldoInicial - amortizacion;
                if (k === nInt || Math.abs(saldoFinal) < 0.05) saldoFinal = 0;

                rows.push(`<tr>
                    <td>${k}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoInicial)}</td>
                    <td>${CURRENCY_FORMATTER.format(interes)}</td>
                    <td>${CURRENCY_FORMATTER.format(payment)}</td>
                    <td>${CURRENCY_FORMATTER.format(amortizacion)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoFinal)}</td>
                </tr>`);
                saldoInicial = saldoFinal;
            }
        }

        if (nInt > MAX_TABLE_ROWS) {
            const limitNotice = tableLimitNoticeRow(mode === 'anticipada' ? 7 : 6, nInt);
            if (limitNotice) rows.push(limitNotice);
        }

        tableBody.innerHTML = rows.join('');
        return rows;
    }

    function buildFundSchedule(options) {
        const {
            futureValue = 0,
            payment = 0,
            rate = 0,
            periods = 0,
            mode = 'vencida',
            tableBodyId = 'capitalization-table-body'
        } = options || {};

        const tableBody = document.getElementById(tableBodyId);
        if (!tableBody) return [];

        if (payment <= 0 || periods <= 0) {
            tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-muted py-3">Ingrese datos válidos para generar la tabla</td></tr>';
            return [];
        }

        const nInt = Math.round(periods);
        const loopLimit = Math.min(nInt, MAX_TABLE_ROWS);
        const rows = [];
        let saldoInicial = 0;

        for (let k = 1; k <= loopLimit; k++) {
            let interes = 0;
            let saldoFinal = 0;
            if (mode === 'anticipada') {
                const saldoConRenta = saldoInicial + payment;
                interes = saldoConRenta * rate;
                saldoFinal = saldoConRenta + interes;
                if (k === nInt && futureValue > 0 && Math.abs(saldoFinal - futureValue) < 1) saldoFinal = futureValue;
                rows.push(`<tr>
                    <td>${k}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoInicial)}</td>
                    <td>${CURRENCY_FORMATTER.format(payment)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoConRenta)}</td>
                    <td>${CURRENCY_FORMATTER.format(interes)}</td>
                    <td>${CURRENCY_FORMATTER.format(payment + interes)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoFinal)}</td>
                </tr>`);
            } else {
                interes = saldoInicial * rate;
                saldoFinal = saldoInicial + interes + payment;
                if (k === nInt && futureValue > 0 && Math.abs(saldoFinal - futureValue) < 1) saldoFinal = futureValue;
                rows.push(`<tr>
                    <td>${k}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoInicial)}</td>
                    <td>${CURRENCY_FORMATTER.format(interes)}</td>
                    <td>${CURRENCY_FORMATTER.format(payment)}</td>
                    <td>${CURRENCY_FORMATTER.format(interes + payment)}</td>
                    <td>${CURRENCY_FORMATTER.format(saldoFinal)}</td>
                </tr>`);
            }
            saldoInicial = saldoFinal;
        }

        if (nInt > MAX_TABLE_ROWS) {
            const limitNotice = tableLimitNoticeRow(mode === 'anticipada' ? 7 : 6, nInt);
            if (limitNotice) rows.push(limitNotice);
        }

        tableBody.innerHTML = rows.join('');
        return rows;
    }

    function attachCopyResultButton() {
        const calcSection = document.getElementById('calculator-section');
        if (!calcSection || calcSection.querySelector('.btn-copiar-resultado')) return;

        const outputEl = calcSection.querySelector('.output-final') || document.getElementById('sustitucion_linea2');
        if (!outputEl) return;
        const targetCard = outputEl.closest('.data-card') || outputEl.parentElement;
        if (!targetCard) return;

        const copyBtn = document.createElement('button');
        copyBtn.type = 'button';
        copyBtn.className = 'btn btn-sm btn-copiar-resultado mt-2';
        copyBtn.title = 'Copiar resultado al portapapeles';
        copyBtn.innerHTML = '<i class="far fa-copy me-1"></i> Copiar resultado';

        copyBtn.addEventListener('click', async () => {
            const textToCopy = outputEl.textContent.trim();
            if (!textToCopy || textToCopy === '-' || textToCopy === '¿?') return;
            try {
                await navigator.clipboard.writeText(textToCopy);
                copyBtn.innerHTML = '<i class="fas fa-check text-success me-1"></i> ¡Copiado!';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="far fa-copy me-1"></i> Copiar resultado';
                }, 2000);
            } catch (err) {
                const ta = document.createElement('textarea');
                ta.value = textToCopy;
                document.body.appendChild(ta);
                ta.select();
                document.execCommand('copy');
                document.body.removeChild(ta);
                copyBtn.innerHTML = '<i class="fas fa-check text-success me-1"></i> ¡Copiado!';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="far fa-copy me-1"></i> Copiar resultado';
                }, 2000);
            }
        });

        targetCard.appendChild(copyBtn);
    }

    function exportTableToCSV(tableEl, defaultName = 'tabla_financiera.csv') {
        if (!tableEl) return;
        const rows = [];
        tableEl.querySelectorAll('tr').forEach((tr) => {
            const cells = [];
            tr.querySelectorAll('th, td').forEach((cell) => {
                let text = cell.innerText.replace(/"/g, '""').trim();
                cells.push(`"${text}"`);
            });
            if (cells.length > 0) rows.push(cells.join(','));
        });
        if (rows.length === 0) return;
        const csvContent = '\uFEFF' + rows.join('\r\n');
        const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = defaultName;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }

    function attachTableEnhancements() {
        const tableEls = document.querySelectorAll('#amortization-table, #capitalization-table');
        tableEls.forEach((table) => {
            const parentSection = table.closest('section') || table.parentElement;
            if (!parentSection || parentSection.dataset.enhancedTable === '1') return;
            parentSection.dataset.enhancedTable = '1';

            const toolbar = document.createElement('div');
            toolbar.className = 'calc-table-toolbar';
            toolbar.innerHTML = `
                <div class="d-flex align-items-center gap-2 mb-2">
                    <button type="button" class="btn btn-sm btn-outline-primary btn-export-csv">
                        <i class="fas fa-file-csv me-1"></i> Exportar a Excel (CSV)
                    </button>
                    <button type="button" class="btn btn-sm btn-outline-secondary btn-print-table">
                        <i class="fas fa-print me-1"></i> Imprimir tabla
                    </button>
                </div>
            `;
            const isAmort = table.id.includes('amortization');
            toolbar.querySelector('.btn-export-csv').addEventListener('click', () => {
                exportTableToCSV(table, isAmort ? 'tabla_amortizacion.csv' : 'tabla_fondo_ahorro.csv');
            });
            toolbar.querySelector('.btn-print-table').addEventListener('click', () => {
                window.print();
            });

            table.parentElement.insertBefore(toolbar, table);
        });
    }

    function initCommonCalculators() {
        applyThousandFormatting();
        document.querySelectorAll('#i-input, #d-input, [data-rate-input="true"]').forEach((el) => {
            attachRateHelper(el);
        });
        attachEnterToCalculate();
        attachCalculatorNav();
        attachCopyResultButton();
        attachTableEnhancements();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initCommonCalculators);
    } else {
        initCommonCalculators();
    }

    global.showSection = showSection;
    global.limpiarFormulario = limpiarFormulario;

    global.MAFICalc = {
        parseRate,
        parseRateDetailed,
        readRateFromInput,
        updateRateHelper,
        attachRateHelper,
        formatNumber,
        formatCurrency,
        currencyFormatter: CURRENCY_FORMATTER,
        MAX_TABLE_ROWS,
        tableLimitNoticeRow,
        bindPeriodicitySelectors,
        syncPeriodicityLabels,
        formatPeriodResult,
        resolvePeriodCount,
        buildPeriodConversionLatex,
        parseFormattedNumber,
        applyThousandFormatting,
        typesetMath,
        renderTimeline,
        renderPeriodDiagram,
        showSection,
        limpiarFormulario,
        buildAmortizationSchedule,
        buildFundSchedule,
        exportTableToCSV,
        PERIODICITY_SINGULAR,
        PERIODICITY_PLURAL,
        PERIODICITY_UNITS,
        PERIODICITY_UNIT_SINGULAR,
        periodLabel,
        periodUnitText
    };
})(window);
