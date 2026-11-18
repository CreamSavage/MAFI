<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Fondo de Amortización - Tasa (i)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR FUTURO CON RENTA ANTICIPADA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE TASA (i)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>F =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="f-input" placeholder="Monto del Fondo"></td></tr>
                                <tr><td>Rₐ =</td><td><input type="text" inputmode="decimal" data-format-number="true" id="ra-input" placeholder="Monto del Depósito"></td>
                                    <td>
                                        <select id="periodicity-ra">
                                            <?php generar_opciones($opciones_periodicidad); ?>
                                        </select>
                                    </td>
                                    <td id="freq-ra">?</td>
                                </tr>
                                <tr><td>n =</td><td><input type="text" inputmode="decimal" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td>
                                        <select id="periodicity-n">
                                            <?php generar_opciones($opciones_periodicidad_plural, "Periodicidad"); ?>
                                        </select>
                                    </td>
                                    <td id="freq-n">?</td>
                                </tr>
                                <tr>
                                    <td>i =</td>
                                    <td colspan="3" class="result-field" id="i-result">¿?</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="calc-action-top">
                            <button id="btn-calculate" class="btn btn-calcular">CALCULAR</button>
                        </div>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Conversiones</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>n =</td><td id="n-converted">-</td><td id="n-period-text">-</td></tr>
                                <tr><td>i =</td><td id="i-converted">-</td><td id="i-period-text">-</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">$$F = \left(\frac{R_A}{i}\right)\left((1+i)^{n+1} - (1+i)\right)$$</p>
                        <p class="calc-note">(La tasa 'i' se calcula por aproximaciones)</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="resultado-final" class="output-final">-</h2>
                    </div>
                    <div class="button-grid">
                        <button class="btn btn-limpiar" onclick="limpiarFormulario()">LIMPIAR</button>
                        <button class="btn btn-navegacion" onclick="showSection('conversions-section')">VER EXPLICACIÓN</button>
                        <button class="btn btn-navegacion" onclick="showSection('fund-section')">VER CUADRO</button>
                    </div>
                    <div class="button-grid button-grid-single">
                        <a href="../Simuladores/simulador_Fra.php" class="btn btn-secondary">REGRESAR</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="conversions-section">
            <div class="header-box">
                <h1>EXPLICACIÓN DE CÁLCULOS</h1>
            </div>
            <div class="data-card">
                <h3 class="card-title">1. Conversión de Plazo</h3>
                <table class="data-table">
                    <tbody>
                        <tr><td>n =</td><td id="n-conv-display-orig-c">-</td><td id="period-conv-display-n-orig-c">-</td><td id="freq-conv-display-n-orig-c">-</td></tr>
                        <tr><td>n =</td><td id="n-conv-display-result-c">-</td><td id="period-conv-display-n-target-c">-</td><td id="freq-conv-display-n-target-c">-</td></tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="period-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Tasa de Interés Periódica (Calculada)</h3>
                <table class="data-table">
                    <tbody>
                        <tr>
                            <td>i =</td>
                            <td id="i-conv-display-result-c">-</td>
                            <td id="period-conv-display-i-target-c">-</td>
                            <td id="freq-conv-display-i-target-c">-</td>
                        </tr>
                    </tbody>
                </table>
                <p class="calc-note">Es la tasa obtenida por algún método matemático distinto al despeje.</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="calc-subhead-note">Consiste en la sustitución en la fórmula, tanto de los datos como de la tasa calculada.</p>
                <p class="formula-content">$$F = \left(\frac{R_A}{i}\right)\left((1+i)^{n+1} - (1+i)\right)$$</p>
                <p class="substitution-text" id="verification-substitution">-</p>
                <h4 class="output-final calc-verify-result" id="verification-result">-</h4>
            </div>
            <div class="button-grid button-grid-single">
                <button class="btn btn-navegacion" onclick="showSection('calculator-section')">REGRESAR AL CÁLCULO</button>
            </div>
        </div>

        <div id="fund-section">
            <div class="header-box">
                <h1>VALOR FUTURO CON RENTA ANTICIPADA</h1>
                <p>CUADRO DE FONDO DE AMORTIZACIÓN</p>
            </div>
            <div id="rate-info" class="rate-info-box">
                <strong>Tasa i = </strong> <span id="display-rate">-</span> % <span id="display-rate-period">-</span>
            </div>
            <div id="fund-table-container" class="calc-table-scroll">
                <table class="data-table" id="fund-table">
                    <thead>
                        <tr>
                            <th>Periodo</th><th>Saldo Inicial</th><th>Ahorro Anticipado</th><th>Saldo Parcial</th><th>Interés</th><th>Agregado al fondo</th><th>Saldo Final</th>
                        </tr>
                        <tr>
                            <th>n</th><th>SI</th><th>Rₐ</th><th>Sp = SI + Rₐ</th><th>I = Sp * i</th><th>AF = Rₐ + I</th><th>SF = SI + AF</th>
                        </tr>
                    </thead>
                    <tbody id="fund-table-body"></tbody>
                </table>
            </div>
            <div class="button-grid button-grid-single">
                <button class="btn btn-navegacion" onclick="showSection('calculator-section')">REGRESAR AL CÁLCULO</button>
            </div>
        </div>
    </div>
<?php
$inlineJs = <<<'JS'
const periodicityMap = MAFICalc.PERIODICITY_SINGULAR;
        const periodicityMapPlural = MAFICalc.PERIODICITY_UNITS;
        const formatter = MAFICalc.currencyFormatter;
        let currentCalculations = {};

        function setupEventListeners() {
            document.getElementById('btn-calculate').addEventListener('click', updateCalculations);
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-n']);
        }

        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'fund-section': generateFundTable
            });
        }

        function solveRateFundDue(F, Ra, n, maxIter = 100, tolerance = 1e-9) {
            if (F <= 0 || Ra <= 0 || n <= 0) return NaN;
            if (Math.abs(F - Ra * n) < 1e-6) return 0;
            if (F < Ra * n) return NaN;

            const fvFunc = (rate) => {
                if (rate === 0) return Ra * n;
                return (Ra / rate) * (Math.pow(1 + rate, n + 1) - (1 + rate));
            };

            let low = 0;
            let high = 0.1;
            const maxHigh = 1000;
            while (fvFunc(high) < F && high < maxHigh) {
                high *= 2;
            }
            if (fvFunc(high) < F) return NaN;

            for (let i = 0; i < maxIter; i++) {
                const mid = (low + high) / 2;
                if (mid === low || mid === high) return mid;
                const fv_mid = fvFunc(mid);
                if (Math.abs(fv_mid - F) < tolerance) return mid;
                if (fv_mid < F) {
                    low = mid;
                } else {
                    high = mid;
                }
            }
            return (low + high) / 2;
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['ra', 'n']);

            const F = MAFICalc.parseFormattedNumber(document.getElementById('f-input').value) || 0;
            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;

            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!F || !Ra || !n_original || isNaN(m_ra) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const n_conv = n_original * (m_ra / m_n);
            const i_base = solveRateFundDue(F, Ra, n_conv);

            currentCalculations = { F, Ra, n_original, m_ra, m_n, n_conv, i_base };

            updateDiagram(n_conv);

            document.getElementById('n-converted').textContent = MAFICalc.formatPeriodResult(n_conv);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_ra];
            document.getElementById('i-converted').textContent = isNaN(i_base) ? '-' : (i_base * 100).toFixed(4) + '%';
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra];

            const iResultCell = document.getElementById('i-result');
            const subLine1 = document.getElementById('sustitucion_linea1');
            const resultadoFinal = document.getElementById('resultado-final');

            if (isNaN(i_base) || !isFinite(i_base)) {
                iResultCell.textContent = 'Error';
                subLine1.textContent = 'No se pudo calcular la tasa. Verifique que F > (Rₐ * n).';
                resultadoFinal.textContent = '-';
            } else {
                const iText = i_base.toFixed(6);
                const nText = MAFICalc.formatPeriodResult(n_conv);
                const raText = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const fCheck = i_base === 0 ? Ra * n_conv : (Ra / i_base) * (Math.pow(1 + i_base, n_conv + 1) - (1 + i_base));
                const fResultText = fCheck.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const rateText = `${(i_base * 100).toFixed(4)}% ${periodicityMap[m_ra]}`;

                iResultCell.textContent = `${(i_base * 100).toFixed(4)}% (${periodicityMap[m_ra]})`;
                subLine1.innerHTML = i_base === 0
                    ? `$$ \\Large F = \\text{${raText}}(${nText}) $$`
                    : `$$ \\Large F = \\left(\\frac{\\text{${raText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}+1} - (1 + ${iText})\\right) $$`;
                MAFICalc.typesetMath([subLine1]);
                resultadoFinal.innerHTML = `<div>F = ${fResultText}</div><div>i = ${rateText}</div>`;
            }

            populateConversionsPage();
        }

        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 0 });
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['f-input', 'ra-input', 'n-input'].forEach(id => document.getElementById(id).value = '');
                ['periodicity-ra', 'periodicity-n'].forEach(id => document.getElementById(id).selectedIndex = 0);
            }

            document.getElementById('i-result').textContent = '¿?';
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'resultado-final', 'i-conv-display-result-c', 'period-conv-display-i-target-c', 'freq-conv-display-i-target-c', 'verification-substitution', 'verification-result'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = '-';
            });
            ['ra', 'n'].forEach(type => {
                const el = document.getElementById(`freq-${type}`);
                if (el) el.textContent = '?';
            });

            currentCalculations = {};
            updateDiagram(0);
            populateConversionsPage();
            const tableBody = document.getElementById('fund-table-body');
            if (tableBody) tableBody.innerHTML = '';
        }

        function populateConversionsPage() {
            const { F, Ra, n_original, m_ra, m_n, n_conv, i_base } = currentCalculations;
            if (!F || !Ra || !n_original) {
                ['n-conv-display-orig-c', 'period-conv-display-n-orig-c', 'freq-conv-display-n-orig-c', 'n-conv-display-result-c', 'period-conv-display-n-target-c', 'freq-conv-display-n-target-c', 'period-substitution-c', 'i-conv-display-result-c', 'period-conv-display-i-target-c', 'freq-conv-display-i-target-c', 'verification-substitution', 'verification-result'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '-';
                });
                return;
            }

            document.getElementById('n-conv-display-orig-c').textContent = n_original;
            document.getElementById('period-conv-display-n-orig-c').textContent = periodicityMapPlural[m_n];
            document.getElementById('freq-conv-display-n-orig-c').textContent = m_n;
            document.getElementById('n-conv-display-result-c').textContent = MAFICalc.formatPeriodResult(n_conv);
            document.getElementById('period-conv-display-n-target-c').textContent = periodicityMapPlural[m_ra];
            document.getElementById('freq-conv-display-n-target-c').textContent = m_ra;
            const periodSubst = document.getElementById('period-substitution-c');
            periodSubst.innerHTML = MAFICalc.buildPeriodConversionLatex(n_original, m_n, m_ra, n_conv);

            document.getElementById('i-conv-display-result-c').textContent = isNaN(i_base) ? '-' : `${(i_base * 100).toFixed(5)}%`;
            document.getElementById('period-conv-display-i-target-c').textContent = periodicityMap[m_ra];
            document.getElementById('freq-conv-display-i-target-c').textContent = m_ra;

            const verSubst = document.getElementById('verification-substitution');
            const verRes = document.getElementById('verification-result');
            if (isNaN(i_base) || !isFinite(i_base)) {
                verSubst.textContent = '-';
                verRes.textContent = 'No se puede realizar la comprobación.';
            } else {
                const raText = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const iText = i_base.toFixed(6);
                const nText = MAFICalc.formatPeriodResult(n_conv);
                const fCheck = i_base === 0 ? Ra * n_conv : (Ra / i_base) * (Math.pow(1 + i_base, n_conv + 1) - (1 + i_base));
                verSubst.innerHTML = i_base === 0
                    ? `$$ \\Large F = \\text{${raText}}(${nText}) $$`
                    : `$$ \\Large F = \\left(\\frac{\\text{${raText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}+1} - (1 + ${iText})\\right) $$`;
                verRes.textContent = `F = ${formatter.format(fCheck)}`;
            }

            MAFICalc.typesetMath([periodSubst, verSubst]);
        }

        function generateFundTable() {
            const tableBody = document.getElementById('fund-table-body');
            if (!tableBody) return;
            const rows = [];
            const { F, Ra, n_conv, i_base, m_ra } = currentCalculations;

            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_base) && m_ra && F > 0) {
                    displayRateEl.textContent = (i_base * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_ra].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!Ra || isNaN(n_conv) || n_conv <= 0 || isNaN(i_base)) {
                tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }

            const n_int = MAFICalc.resolvePeriodCount(n_conv);
            let saldoInicial = 0;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoParcial = saldoInicial + Ra;
                const interes = saldoParcial * i_base;
                const agregadoAlFondo = Ra + interes;
                const saldoFinal = saldoInicial + agregadoAlFondo;

                rows.push(`<tr>
                    <td>${i}</td>
                    <td>${formatter.format(saldoInicial)}</td>
                    <td>${formatter.format(Ra)}</td>
                    <td>${formatter.format(saldoParcial)}</td>
                    <td>${formatter.format(interes)}</td>
                    <td>${formatter.format(agregadoAlFondo)}</td>
                    <td>${formatter.format(saldoFinal)}</td>
                </tr>`);
                saldoInicial = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 7, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
