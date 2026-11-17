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
                <h1>VALOR FUTURO CON RENTA VENCIDA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE (F)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>F =</td><td class="result-field" colspan="3" id="f-result">¿?</td></tr>
                                <tr><td>Rv =</td><td><input type="text" inputmode="numeric" data-format-number="true" id="r-input" placeholder="Monto"></td>
                                    <td><select id="periodicity-r"><?php generar_opciones($opciones_periodicidad); ?></select></td>
                                    <td id="freq-r">?</td>
                                </tr>
                                <tr><td>n =</td><td><input type="text" inputmode="numeric" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td><select id="periodicity-n"><?php generar_opciones($opciones_periodicidad_plural, "Periodicidad"); ?></select></td>
                                    <td id="freq-n">?</td>
                                </tr>
                                <tr><td>i =</td><td><input type="text" inputmode="decimal" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12"></td>
                                    <td><select id="periodicity-i"><?php generar_opciones($opciones_periodicidad); ?></select></td>
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
                        <p class="formula-content formula-main">$$F = \left(\frac{R_v}{i}\right)\left((1+i)^n - 1\right)$$</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="sustitucion_linea2" class="output-final">-</h2>
                    </div>
                    <div class="button-grid">
                        <button class="btn btn-limpiar" onclick="limpiarFormulario()">LIMPIAR</button>
                        <a href="#" class="btn btn-navegacion" onclick="showSection('conversions-section'); return false;">VER EXPLICACIÓN</a>
                        <a href="#" class="btn btn-navegacion" onclick="showSection('amortization-section'); return false;">VER CUADRO</a>
                    </div>
                     <div class="button-grid button-grid-single">
                        <a href="../Simuladores/simulador_Frv.php" class="btn btn-secondary">REGRESAR</a>                       
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
                        <tr><td>i original =</td><td id="i-conv-display-orig">-</td><td id="period-conv-display-i-orig">-</td><td id="freq-conv-display-i-orig">-</td></tr>
                        <tr><td>i<sub>q</sub> =</td><td id="i-conv-display-result">-</td><td id="period-conv-display-i-target">-</td><td id="freq-conv-display-i-target">-</td></tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="rate-substitution">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Conversión de Plazo</h3>
                <table class="data-table">
                    <tbody>
                        <tr><td>n original =</td><td id="n-conv-display-orig">-</td><td id="period-conv-display-n-orig">-</td><td id="freq-conv-display-n-orig">-</td></tr>
                        <tr><td>n =</td><td id="n-conv-display-result">-</td><td id="period-conv-display-n-target">-</td><td id="freq-conv-display-n-target">-</td></tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="period-substitution">-</p>
            </div>
            <div class="button-grid button-grid-single">
                 <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
            </div>
        </div>

        <div id="amortization-section">
            <div class="header-box">
                <h1>VALOR FUTURO CON RENTA VENCIDA</h1>
                <p>CUADRO DE FONDO DE AMORTIZACIÓN</p>
            </div>
            <div id="rate-info" class="rate-info-box">
                <strong>Tasa i = </strong> <span id="display-rate">-</span> % <span id="display-rate-period">-</span>
            </div>
            <div id="amortization-table-container" class="calc-table-scroll">
                <table class="data-table" id="amortization-table">
                    <thead>
                        <tr>
                            <th>Plazo</th>
                            <th>Saldo Inicial</th>
                            <th>Interés</th>
                            <th>Ahorro Vencido</th>
                            <th>Agregado al fondo</th>
                            <th>Saldo Final</th>
                        </tr>
                        <tr>
                            <th>n</th>
                            <th>SI</th>
                            <th>I = SI × i</th>
                            <th>Rv</th>
                            <th>AF = I + Rv</th>
                            <th>SF = SI + AF</th>
                        </tr>
                    </thead>
                    <tbody id="amortization-table-body"></tbody>
                    <tfoot id="amortization-table-footer"></tfoot>
                </table>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
            </div>
        </div>
    </div>
<?php
$inlineJs = <<<'JS'
const periodicityMap = MAFICalc.PERIODICITY_SINGULAR;
        const periodicityMapPlural = MAFICalc.PERIODICITY_UNITS;
        const periodicityUnitSingular = MAFICalc.PERIODICITY_UNIT_SINGULAR;
        const formatter = MAFICalc.currencyFormatter;
        const formatPeriodResult = MAFICalc.formatPeriodResult;
        let currentCalculations = {};
        let amortizationTableCacheKey = '';




        function setupEventListeners() {
            const calculateButton = document.getElementById('btn-calculate');
            if (calculateButton) {
                calculateButton.addEventListener('click', updateCalculations);
            }

            MAFICalc.bindPeriodicitySelectors(['periodicity-r', 'periodicity-n', 'periodicity-i']);
        }
        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['r', 'n', 'i']);
            const R = MAFICalc.parseFormattedNumber(document.getElementById('r-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input');
            const m_r = parseFloat(document.getElementById('periodicity-r').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            
            if (!R || !n_original || !i_original || isNaN(m_r) || isNaN(m_n) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }
            
            const n_conv = n_original * (m_r / m_n);
            const i_conv = Math.pow(1 + i_original, m_i / m_r) - 1;
            let F = (i_conv !== 0) ? (R / i_conv) * (Math.pow(1 + i_conv, n_conv) - 1) : R * n_conv;
            
            currentCalculations = { R, n_original, i_original, m_r, m_n, m_i, n_conv, i_conv, F };
            
            document.getElementById('f-result').textContent = formatter.format(F);
            document.getElementById('n-converted').textContent = n_conv.toFixed(2);
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_r];
            document.getElementById('i-period-text').textContent = periodicityMap[m_r];
            
            const sustElement = document.getElementById('sustitucion_linea1');
            const rText = R.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            const iText = i_conv.toFixed(6);
            const nText = n_conv.toFixed(2);
            sustElement.innerHTML = `$$ \\Large F = \\left(\\frac{\\text{${rText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}} - 1\\right) $$`;
            MAFICalc.typesetMath([sustElement]);
            document.getElementById('sustitucion_linea2').textContent = `F = ${formatter.format(F)}`;
            
            populateConversionsPage();
            amortizationTableCacheKey = '';
        }

        function limpiarFormulario(partial = false) {
            if(!partial) {
                const inputs = ['r-input', 'n-input', 'i-input'];
                inputs.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.value = '';
                });
                
                const selects = ['periodicity-r', 'periodicity-n', 'periodicity-i'];
                selects.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.selectedIndex = 0;
                });
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            
            const fResult = document.getElementById('f-result');
            if(fResult) fResult.textContent = '¿?';
            
            const elements = ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2'];
            elements.forEach(id => {
                const el = document.getElementById(id);
                if(el) el.textContent = '-';
            });
            
            ['r', 'n', 'i'].forEach(type => {
                const el = document.getElementById(`freq-${type}`);
                if(el) el.textContent = '?';
            });
            
            currentCalculations = {};
            amortizationTableCacheKey = '';
            
            const tableBody = document.getElementById('amortization-table-body');
            if(tableBody) tableBody.innerHTML = '';
            
            const tableFooter = document.getElementById('amortization-table-footer');
            if(tableFooter) tableFooter.innerHTML = '';
            
            const displayRate = document.getElementById('display-rate');
            if(displayRate) displayRate.textContent = '-';
            
            const displayRatePeriod = document.getElementById('display-rate-period');
            if(displayRatePeriod) displayRatePeriod.textContent = '-';
        }

        function populateConversionsPage() {
            const { R, n_original, i_original, m_r, m_n, m_i, n_conv, i_conv } = currentCalculations;
            if (!R || !n_original || !i_original) {
                const ids = ['i-conv-display-orig', 'period-conv-display-i-orig', 'freq-conv-display-i-orig', 'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target', 'rate-substitution', 'n-conv-display-orig', 'period-conv-display-n-orig', 'freq-conv-display-n-orig', 'n-conv-display-result', 'period-conv-display-n-target', 'freq-conv-display-n-target', 'period-substitution'];
                ids.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.textContent = '-';
                });
                return;
            }
            
            const iConvDisplayOrig = document.getElementById('i-conv-display-orig');
            if(iConvDisplayOrig) iConvDisplayOrig.textContent = i_original;
            
            const periodConvDisplayIOrig = document.getElementById('period-conv-display-i-orig');
            if(periodConvDisplayIOrig) periodConvDisplayIOrig.textContent = periodicityMap[m_i];
            
            const freqConvDisplayIOrig = document.getElementById('freq-conv-display-i-orig');
            if(freqConvDisplayIOrig) freqConvDisplayIOrig.textContent = m_i;
            
            const iConvDisplayResult = document.getElementById('i-conv-display-result');
            if(iConvDisplayResult) iConvDisplayResult.textContent = i_conv.toFixed(5);
            
            const periodConvDisplayITarget = document.getElementById('period-conv-display-i-target');
            if(periodConvDisplayITarget) periodConvDisplayITarget.textContent = periodicityMap[m_r];
            
            const freqConvDisplayITarget = document.getElementById('freq-conv-display-i-target');
            if(freqConvDisplayITarget) freqConvDisplayITarget.textContent = m_r;
            
            const rateSubstitution = document.getElementById('rate-substitution');
            if(rateSubstitution) {
                rateSubstitution.innerHTML = `$$ \\Large i_q = \\left(1 + i\\right)^{\\frac{m}{m_q}} - 1 = \\left(1 + ${i_original}\\right)^{\\frac{${m_i}}{${m_r}}} - 1 \\Rightarrow i_q = ${i_conv.toFixed(6)} $$`;
                MAFICalc.typesetMath([rateSubstitution]);
            }
            
            const nConvDisplayOrig = document.getElementById('n-conv-display-orig');
            if(nConvDisplayOrig) nConvDisplayOrig.textContent = n_original;
            
            const periodConvDisplayNOrig = document.getElementById('period-conv-display-n-orig');
            if(periodConvDisplayNOrig) periodConvDisplayNOrig.textContent = periodicityMapPlural[m_n];
            
            const freqConvDisplayNOrig = document.getElementById('freq-conv-display-n-orig');
            if(freqConvDisplayNOrig) freqConvDisplayNOrig.textContent = m_n;
            
            const nConvDisplayResult = document.getElementById('n-conv-display-result');
            if(nConvDisplayResult) nConvDisplayResult.textContent = formatPeriodResult(n_conv);
            
            const periodConvDisplayNTarget = document.getElementById('period-conv-display-n-target');
            if(periodConvDisplayNTarget) periodConvDisplayNTarget.textContent = periodicityMapPlural[m_r];
            
            const freqConvDisplayNTarget = document.getElementById('freq-conv-display-n-target');
            if(freqConvDisplayNTarget) freqConvDisplayNTarget.textContent = m_r;
            
            const periodSubstitution = document.getElementById('period-substitution');
            if(periodSubstitution) {
                const nOriginalText = (periodicityMapPlural[m_n] || '').toLowerCase();
                const nTargetText = (periodicityMapPlural[m_r] || '').toLowerCase();
                const nOriginalUnit = periodicityUnitSingular[m_n] || nOriginalText;
                periodSubstitution.innerHTML = `$$ \\Large n = \\frac{${n_original} \\text{ ${nOriginalText}}}{1} \\times \\frac{${m_r} \\text{ ${nTargetText}}}{${m_n} \\text{ ${nOriginalUnit}}} = \\frac{${n_original * m_r}}{${m_n}} \\Rightarrow n = ${formatPeriodResult(n_conv)} \\text{ ${nTargetText}} $$`;
                MAFICalc.typesetMath([periodSubstitution]);
            }
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            const tableFooter = document.getElementById('amortization-table-footer');
            
            if(!tableBody) return;
            
            const { R, n_conv, i_conv, F, m_r } = currentCalculations;
            const tableCacheKey = [R, n_conv, i_conv, F, m_r].join('|');

            // Update rate info display
            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_conv) && m_r && F > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_r]?.toLowerCase() || '';
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!F || F <= 0 || !R || !i_conv) {
                amortizationTableCacheKey = '';
                if(tableBody) tableBody.innerHTML = '<tr><td colspan="6">Ingrese datos válidos para generar la tabla</td></tr>';
                if(tableFooter) tableFooter.innerHTML = '';
                return;
            }
            
            if (amortizationTableCacheKey === tableCacheKey && tableBody.children.length > 0) {
                return;
            }
            
            const n_int = Math.round(n_conv);
            let saldoAnterior = 0;
            let totalDepositos = 0;
            let totalIntereses = 0;
            const rows = new Array(n_int);
            
            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoInicial = saldoAnterior;
                const interes = saldoInicial * i_conv;
                const totalSumado = R + interes;
                const saldoFinal = saldoInicial + totalSumado;
                
                totalDepositos += R;
                totalIntereses += interes;
                
                // Orden correcto: Plazo, Saldo Inicial, Interés, Ahorro Vencido, Agregado al fondo, Saldo Final
                rows[i - 1] = `<tr><td>${i}</td><td>${formatter.format(saldoInicial)}</td><td>${formatter.format(interes)}</td><td>${formatter.format(R)}</td><td>${formatter.format(totalSumado)}</td><td>${formatter.format(saldoFinal)}</td></tr>`;
                saldoAnterior = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 6, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
            
            // Add footer with totals
            if(tableFooter) {
                tableFooter.innerHTML = `<tr class="table-highlight-row"><td><strong>TOTALES</strong></td><td>-</td><td>${formatter.format(totalIntereses)}</td><td>${formatter.format(totalDepositos)}</td><td>${formatter.format(totalDepositos + totalIntereses)}</td><td>${formatter.format(saldoAnterior)}</td></tr>`;
            }
            amortizationTableCacheKey = tableCacheKey;
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
