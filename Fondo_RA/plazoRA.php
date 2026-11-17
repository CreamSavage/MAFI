<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Fondo de Amortización - Plazo (n)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR FUTURO CON RENTA ANTICIPADA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE PLAZO (n)</p>
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
                                <tr>
                                    <td>n =</td>
                                    <td colspan="3" class="result-field" id="n-result">¿?</td>
                                </tr>
                                <tr><td>i = j/m</td><td><input type="text" inputmode="decimal" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12"></td>
                                    <td>
                                        <select id="periodicity-i">
                                            <?php generar_opciones($opciones_periodicidad); ?>
                                        </select>
                                    </td>
                                    <td id="freq-i">?</td>
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
                                <tr><td>i =</td><td id="i-converted">-</td><td id="i-period-text">-</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">$$n = \frac{\log\left(\frac{F \cdot i}{R_A} + 1 + i\right)}{\log(1+i)} - 1$$</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="sustitucion_linea2" class="output-final">-</h2>
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
                <h3 class="card-title">1. Conversión de Tasa</h3>
                <table class="data-table">
                    <tbody>
                        <tr><td>i =</td><td id="i-conv-display-orig-c">-</td><td id="period-conv-display-i-orig-c">-</td><td id="freq-conv-display-i-orig-c">-</td></tr>
                        <tr><td>i<sub>q</sub> =</td><td id="i-conv-display-result-c">-</td><td id="period-conv-display-i-target-c">-</td><td id="freq-conv-display-i-target-c">-</td></tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="rate-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Plazo Calculado</h3>
                <p class="output-final" id="n-calculated-explanation">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="calc-subhead-note">Consiste en la sustitución en la fórmula, tanto de los datos como el plazo calculado.</p>
                <p class="formula-content">$$F = \left(\frac{R_A}{i}\right)\left((1+i)^{n+1} - (1+i)\right)$$</p>
                <p class="substitution-text" id="verification-substitution">-</p>
                <h4 class="output-final calc-verify-result" id="verification-result">-</h4>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
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
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-i']);
        }

        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'fund-section': generateFundTable
            });
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['ra', 'i']);

            const F = MAFICalc.parseFormattedNumber(document.getElementById('f-input').value) || 0;
            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input');

            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);

            if (!F || !Ra || isNaN(i_original) || i_original < 0 || isNaN(m_ra) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }

            const i_conv = Math.pow(1 + i_original, m_i / m_ra) - 1;

            let n_base = NaN;
            if (i_conv > 0 && Ra > 0) {
                const term1 = (F * i_conv) / Ra + 1 + i_conv;
                if (term1 > 0) {
                    const numerator = Math.log(term1);
                    const denominator = Math.log(1 + i_conv);
                    if (denominator > 0) {
                        n_base = (numerator / denominator) - 1;
                    }
                }
            } else if (i_conv === 0 && Ra > 0) {
                n_base = F / Ra;
            }

            currentCalculations = { F, Ra, i_original, m_ra, m_i, i_conv, n_base };

            const nDisplay = isNaN(n_base) || !isFinite(n_base) ? 'Error' : `${MAFICalc.formatPeriodResult(n_base)} (${periodicityMapPlural[m_ra]})`;
            document.getElementById('n-result').textContent = nDisplay;
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra];

            const sustLinea1 = document.getElementById('sustitucion_linea1');
            const sustLinea2 = document.getElementById('sustitucion_linea2');
            if (isNaN(n_base) || !isFinite(n_base) || n_base <= 0) {
                sustLinea1.textContent = 'No existe un plazo válido con estos datos.';
                sustLinea2.textContent = 'Error';
            } else {
                const fText = F.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const raText = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const iText = i_conv.toFixed(6);
                sustLinea1.innerHTML = i_conv === 0
                    ? `$$ \\Large n = \\frac{\\text{${fText}}}{\\text{${raText}}} $$`
                    : `$$ \\Large n = \\frac{\\log\\left(\\frac{\\text{${fText}}(${iText})}{\\text{${raText}}} + 1 + ${iText}\\right)}{\\log(1 + ${iText})} - 1 $$`;
                MAFICalc.typesetMath([sustLinea1]);
                sustLinea2.textContent = `n ≈ ${MAFICalc.formatPeriodResult(n_base)} ${periodicityMapPlural[m_ra]}`;
            }

            updateDiagram(n_base);
            populateConversionsPage();
        }

        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 0 });
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['f-input', 'ra-input', 'i-input'].forEach(id => document.getElementById(id).value = '');
                ['periodicity-ra', 'periodicity-i'].forEach(id => document.getElementById(id).selectedIndex = 0);

                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }

            document.getElementById('n-result').textContent = '¿?';
            ['i-converted', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2', 'n-calculated-explanation', 'verification-substitution', 'verification-result'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = '-';
            });
            ['ra', 'i'].forEach(type => {
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
            const { F, Ra, i_original, m_ra, m_i, i_conv, n_base } = currentCalculations;
            if (!F || !Ra || isNaN(i_original)) {
                ['i-conv-display-orig-c', 'period-conv-display-i-orig-c', 'freq-conv-display-i-orig-c', 'i-conv-display-result-c', 'period-conv-display-i-target-c', 'freq-conv-display-i-target-c', 'rate-substitution-c', 'n-calculated-explanation', 'verification-substitution', 'verification-result'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '-';
                });
                return;
            }

            document.getElementById('i-conv-display-orig-c').textContent = i_original;
            document.getElementById('period-conv-display-i-orig-c').textContent = periodicityMap[m_i];
            document.getElementById('freq-conv-display-i-orig-c').textContent = m_i;
            document.getElementById('i-conv-display-result-c').textContent = i_conv.toFixed(6);
            document.getElementById('period-conv-display-i-target-c').textContent = periodicityMap[m_ra];
            document.getElementById('freq-conv-display-i-target-c').textContent = m_ra;
            const rateSubst = document.getElementById('rate-substitution-c');
            rateSubst.innerHTML = `$$ \\Large i_q = (1 + i)^{\\frac{m}{m_q}} - 1 = (1 + ${i_original})^{\\frac{${m_i}}{${m_ra}}} - 1 = ${i_conv.toFixed(6)} $$`;

            const nExplEl = document.getElementById('n-calculated-explanation');
            const verSubstEl = document.getElementById('verification-substitution');
            const verResEl = document.getElementById('verification-result');

            if (isNaN(n_base) || !isFinite(n_base) || n_base <= 0) {
                nExplEl.textContent = 'Error de cálculo';
                verSubstEl.textContent = '-';
                verResEl.textContent = 'No se puede realizar la comprobación.';
            } else {
                const nText = MAFICalc.formatPeriodResult(n_base);
                const raText = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const iText = i_conv.toFixed(6);
                const fCheck = i_conv === 0
                    ? Ra * n_base
                    : (Ra / i_conv) * (Math.pow(1 + i_conv, n_base + 1) - (1 + i_conv));
                nExplEl.textContent = `n = ${nText} ${(periodicityMapPlural[m_ra] || '').toLowerCase()}`;
                verSubstEl.innerHTML = i_conv === 0
                    ? `$$ \\Large F = \\text{${raText}}(${nText}) $$`
                    : `$$ \\Large F = \\left(\\frac{\\text{${raText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}+1} - (1 + ${iText})\\right) $$`;
                verResEl.textContent = `F = ${formatter.format(fCheck)}`;
            }

            MAFICalc.typesetMath([rateSubst, verSubstEl]);
        }

        function generateFundTable() {
            const tableBody = document.getElementById('fund-table-body');
            if (!tableBody) return;
            const rows = [];
            const { F, Ra, n_base, i_conv, m_ra } = currentCalculations;

            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            const rateInfoDiv = document.getElementById('rate-info');

            if (displayRateEl && displayRatePeriodEl && rateInfoDiv) {
                if (!isNaN(i_conv) && m_ra && F > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_ra].toLowerCase();
                    rateInfoDiv.style.display = 'block';
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                    rateInfoDiv.style.display = 'none';
                }
            }

            if (!Ra || isNaN(n_base) || n_base <= 0) {
                tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }

            const n_int = MAFICalc.resolvePeriodCount(n_base);
            let saldoInicial = 0;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                let current_Ra = Ra;
                if (i === n_int && Math.abs(n_base - n_int) >= 1e-4) {
                    current_Ra = Math.max(0, (F / (1 + i_conv)) - saldoInicial);
                }
                const saldoParcial = saldoInicial + current_Ra;
                const interes = saldoParcial * i_conv;
                const agregadoAlFondo = current_Ra + interes;
                const saldoFinal = saldoInicial + agregadoAlFondo;

                rows.push(`<tr>
                    <td>${i}</td>
                    <td>${formatter.format(saldoInicial)}</td>
                    <td>${formatter.format(current_Ra)}</td>
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
