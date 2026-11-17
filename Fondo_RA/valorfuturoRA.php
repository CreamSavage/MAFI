<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Fondo de Amortización - Valor Futuro (F)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR FUTURO CON RENTA ANTICIPADA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE (F)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>F =</td><td class="result-field" colspan="3" id="f-result">¿?</td></tr>
                                <tr><td>Rₐ =</td><td><input type="text" inputmode="decimal" data-format-number="true" id="ra-input" placeholder="Monto del depósito"></td>
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
                <h3 class="card-title">2. Conversión de Plazo</h3>
                <table class="data-table">
                    <tbody>
                        <tr><td>n =</td><td id="n-conv-display-orig-c">-</td><td id="period-conv-display-n-orig-c">-</td><td id="freq-conv-display-n-orig-c">-</td></tr>
                        <tr><td>n =</td><td id="n-conv-display-result-c">-</td><td id="period-conv-display-n-target-c">-</td><td id="freq-conv-display-n-target-c">-</td></tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="period-substitution-c">-</p>
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
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-n', 'periodicity-i']);
        }

        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'fund-section': generateFundTable
            });
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['ra', 'n', 'i']);

            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input');

            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);

            if (!Ra || !n_original || isNaN(i_original) || i_original < 0 || isNaN(m_ra) || isNaN(m_n) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }

            const n_conv = n_original * (m_ra / m_n);
            const i_conv = Math.pow(1 + i_original, m_i / m_ra) - 1;

            let F = 0;
            if (i_conv > 0) {
                F = (Ra / i_conv) * (Math.pow(1 + i_conv, n_conv + 1) - (1 + i_conv));
            } else {
                F = Ra * n_conv;
            }

            currentCalculations = { Ra, n_original, i_original, m_ra, m_n, m_i, n_conv, i_conv, F };

            document.getElementById('f-result').textContent = formatter.format(F);
            document.getElementById('n-converted').textContent = MAFICalc.formatPeriodResult(n_conv);
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_ra];
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra];

            const raText = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            const iText = i_conv.toFixed(6);
            const nText = MAFICalc.formatPeriodResult(n_conv);
            const sustLinea1 = document.getElementById('sustitucion_linea1');
            sustLinea1.innerHTML = i_conv === 0
                ? `$$ \\Large F = \\text{${raText}}(${nText}) $$`
                : `$$ \\Large F = \\left(\\frac{\\text{${raText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}+1} - (1 + ${iText})\\right) $$`;
            MAFICalc.typesetMath([sustLinea1]);
            document.getElementById('sustitucion_linea2').textContent = formatter.format(F);

            updateDiagram(n_conv);
            populateConversionsPage();
        }

        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 0 });
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['ra-input', 'n-input', 'i-input'].forEach(id => document.getElementById(id).value = '');
                ['periodicity-ra', 'periodicity-n', 'periodicity-i'].forEach(id => document.getElementById(id).selectedIndex = 0);

                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }

            document.getElementById('f-result').textContent = '¿?';
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2'].forEach(id => {
                document.getElementById(id).textContent = '-';
            });
            ['ra', 'n', 'i'].forEach(type => {
                document.getElementById(`freq-${type}`).textContent = '?';
            });

            currentCalculations = {};
            updateDiagram(0);
            populateConversionsPage();
            const tableBody = document.getElementById('fund-table-body');
            if (tableBody) tableBody.innerHTML = '';
        }

        function populateConversionsPage() {
            const { Ra, n_original, i_original, m_ra, m_n, m_i, n_conv, i_conv } = currentCalculations;
            if (!Ra || !n_original || isNaN(i_original)) {
                ['i-conv-display-orig-c', 'period-conv-display-i-orig-c', 'freq-conv-display-i-orig-c', 'i-conv-display-result-c', 'period-conv-display-i-target-c', 'freq-conv-display-i-target-c', 'rate-substitution-c', 'n-conv-display-orig-c', 'period-conv-display-n-orig-c', 'freq-conv-display-n-orig-c', 'n-conv-display-result-c', 'period-conv-display-n-target-c', 'freq-conv-display-n-target-c', 'period-substitution-c'].forEach(id => {
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

            document.getElementById('n-conv-display-orig-c').textContent = n_original;
            document.getElementById('period-conv-display-n-orig-c').textContent = periodicityMapPlural[m_n];
            document.getElementById('freq-conv-display-n-orig-c').textContent = m_n;
            document.getElementById('n-conv-display-result-c').textContent = MAFICalc.formatPeriodResult(n_conv);
            document.getElementById('period-conv-display-n-target-c').textContent = periodicityMapPlural[m_ra];
            document.getElementById('freq-conv-display-n-target-c').textContent = m_ra;
            const periodSubst = document.getElementById('period-substitution-c');
            periodSubst.innerHTML = MAFICalc.buildPeriodConversionLatex(n_original, m_n, m_ra, n_conv);

            MAFICalc.typesetMath([rateSubst, periodSubst]);
        }

        function generateFundTable() {
            const tableBody = document.getElementById('fund-table-body');
            if (!tableBody) return;
            const rows = [];
            const { Ra, n_conv, i_conv, F, m_ra } = currentCalculations;

            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_conv) && m_ra && F > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_ra].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!Ra || isNaN(n_conv) || n_conv <= 0) {
                tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }

            const n_int = MAFICalc.resolvePeriodCount(n_conv);
            let saldoInicial = 0;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoParcial = saldoInicial + Ra;
                const interes = saldoParcial * i_conv;
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
