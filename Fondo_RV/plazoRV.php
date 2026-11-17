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
                <h1>VALOR FUTURO CON RENTA VENCIDA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE PLAZO (n)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>F =</td>
                                    <td colspan="2"><input type="text" inputmode="numeric" data-format-number="true" id="f-input" placeholder="Monto futuro"></td>
                                    <td class="empty-cell"></td>
                                </tr>
                                <tr><td>Rv =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="r-input" placeholder="Monto de la Renta"></td>
                                    <td><select id="periodicity-r"><?php generar_opciones($opciones_periodicidad); ?></select></td>
                                    <td id="freq-r">?</td>
                                </tr>
                                <tr><td>n =</td>
                                    <td class="result-field" colspan="3" id="n-result">¿?</td>
                                </tr>
                                <tr><td>i =</td>
                                    <td><input type="text" inputmode="decimal" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12"></td>
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
                                <tr><td>i =</td>
                                    <td id="i-converted">-</td>
                                    <td id="i-period-text">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">$$n = \frac{\log\left(\frac{F i}{R_v} + 1\right)}{\log(1+i)}$$</p>
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
                        <tr><td>i =</td>
                            <td id="i-conv-display-orig">-</td>
                            <td id="period-conv-display-i-orig">-</td>
                            <td id="freq-conv-display-i-orig">-</td>
                        </tr>
                        <tr><td>i<sub>q</sub> =</td>
                            <td id="i-conv-display-result">-</td>
                            <td id="period-conv-display-i-target">-</td>
                            <td id="freq-conv-display-i-target">-</td>
                        </tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="rate-substitution">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Plazo Calculado</h3>
                <p class="output-final" id="n-calculated-explanation">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="formula-content">$$F = \left(\frac{R_v}{i}\right)\left((1+i)^n - 1\right)$$</p>
                <p class="substitution-text" id="verification-substitution">-</p>
                <h4 class="output-final calc-verify-result" id="verification-result">-</h4>
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
                            <th>Periodo</th>
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
        const formatter = MAFICalc.currencyFormatter;
        const formatPeriodResult = MAFICalc.formatPeriodResult;
        let currentCalculations = {};
        let amortizationTableCacheKey = '';




        function setupEventListeners() {
            const calculateButton = document.getElementById('btn-calculate');
            if (calculateButton) {
                calculateButton.addEventListener('click', updateCalculations);
            }

            MAFICalc.bindPeriodicitySelectors(['periodicity-r', 'periodicity-i']);
        }
        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['r', 'i']);
            
            const F = MAFICalc.parseFormattedNumber(document.getElementById('f-input').value) || 0;
            const R = MAFICalc.parseFormattedNumber(document.getElementById('r-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input');
            const m_r = parseFloat(document.getElementById('periodicity-r').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            
            if (!F || !R || !i_original || isNaN(m_r) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }

            const i_conv = Math.pow(1 + i_original, m_i / m_r) - 1;
            
            let n = 0;
            if (i_conv > 0) {
                const term = (F * i_conv) / R + 1;
                if (term > 0) {
                    n = Math.log(term) / Math.log(1 + i_conv);
                }
            } else if (i_conv === 0 && R > 0) {
                n = F / R;
            }

            currentCalculations = { F, R, i_original, m_r, m_i, i_conv, n };
            amortizationTableCacheKey = '';

            const n_result_cell = document.getElementById('n-result');
            if(n_result_cell) n_result_cell.textContent = `${formatPeriodResult(n)} (${periodicityMapPlural[m_r]})`;

            const iConverted = document.getElementById('i-converted');
            if(iConverted) iConverted.textContent = i_conv.toFixed(6);
            
            const iPeriodText = document.getElementById('i-period-text');
            if(iPeriodText) iPeriodText.textContent = periodicityMap[m_r];

            const sustitucionLinea1 = document.getElementById('sustitucion_linea1');
            if(sustitucionLinea1) {
                const fText = F.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const rText = R.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const iText = i_conv.toFixed(6);
                sustitucionLinea1.innerHTML = `$$ \\Large n = \\frac{\\log\\left(\\frac{\\text{${fText}}(${iText})}{\\text{${rText}}} + 1\\right)}{\\log(1 + ${iText})} $$`;
                MAFICalc.typesetMath([sustitucionLinea1]);
            }
            
            const sustitucionLinea2 = document.getElementById('sustitucion_linea2');
            if(sustitucionLinea2) sustitucionLinea2.textContent = `n ≈ ${formatPeriodResult(n)} ${periodicityMapPlural[m_r]}`;
            
            updateDiagram(n);
            populateConversionsPage();
        }
        
        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 1 });
        }

        function limpiarFormulario(partial = false) {
            if(!partial) {
                const inputs = ['f-input', 'r-input', 'i-input'];
                inputs.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.value = '';
                });
                
                const selects = ['periodicity-r', 'periodicity-i'];
                selects.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.selectedIndex = 0;
                });
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            
            const nResult = document.getElementById('n-result');
            if(nResult) nResult.textContent = '¿?';
            
            const elements = ['i-converted', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2', 'n-calculated-explanation', 'verification-substitution', 'verification-result'];
            elements.forEach(id => {
                const el = document.getElementById(id);
                if(el) el.textContent = '-';
            });
            
            ['r', 'i'].forEach(type => {
                const el = document.getElementById(`freq-${type}`);
                if(el) el.textContent = '?';
            });
            
            currentCalculations = {};
            amortizationTableCacheKey = '';
            updateDiagram(0);
            
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
            const { i_original, m_r, m_i, i_conv, F, R, n } = currentCalculations;
            
            if (!i_original || !m_r || !m_i || !F || !R || isNaN(n)) {
                const ids = ['i-conv-display-orig', 'period-conv-display-i-orig', 'freq-conv-display-i-orig', 'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target', 'rate-substitution', 'n-calculated-explanation', 'verification-substitution', 'verification-result'];
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
                rateSubstitution.innerHTML = `$$ \\Large i_q = (1 + i)^{\\frac{m}{m_q}} - 1 = (1 + ${i_original})^{\\frac{${m_i}}{${m_r}}} - 1 = ${i_conv.toFixed(6)} $$`;
                MAFICalc.typesetMath([rateSubstitution]);
            }

            const nCalculatedEl = document.getElementById('n-calculated-explanation');
            if(nCalculatedEl) nCalculatedEl.textContent = `n = ${formatPeriodResult(n)} ${(periodicityMapPlural[m_r] || '').toLowerCase()}`;

            const verificationSubstitution = document.getElementById('verification-substitution');
            const verificationResult = document.getElementById('verification-result');
            if(verificationSubstitution && verificationResult) {
                const rvText = R.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const iText = i_conv.toFixed(6);
                const nText = formatPeriodResult(n);
                const fCheck = (R / i_conv) * (Math.pow(1 + i_conv, n) - 1);
                verificationSubstitution.innerHTML = `$$ \\Large F = \\left(\\frac{\\text{${rvText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}} - 1\\right) $$`;
                verificationResult.textContent = `F = ${formatter.format(fCheck)}`;
                MAFICalc.typesetMath([verificationSubstitution]);
            }
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            const tableFooter = document.getElementById('amortization-table-footer');
            
            if(!tableBody) return;
            
            const { R, n, i_conv, F, m_r } = currentCalculations;

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

            if (!F || F <= 0 || isNaN(n) || isNaN(i_conv) || !R) {
                amortizationTableCacheKey = '';
                if(tableBody) tableBody.innerHTML = '<tr><td colspan="6" class="py-3">Ingrese los datos del formulario</td></tr>';
                if(tableFooter) tableFooter.innerHTML = '';
                return;
            }

            const tableCacheKey = [R, n, i_conv, F, m_r].join('|');
            if (amortizationTableCacheKey === tableCacheKey && tableBody.children.length > 0) {
                return;
            }

            tableBody.innerHTML = '';
            if(tableFooter) tableFooter.innerHTML = '';

            const n_int = MAFICalc.resolvePeriodCount(n);
            let saldoAnterior = 0;
            let totalDepositos = 0;
            let totalIntereses = 0;
            const rows = new Array(n_int);
            
            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoInicial = saldoAnterior;
                const interes = saldoInicial * i_conv;
                let deposito = R;
                
                if (i === n_int) {
                    const totalSumado = F - saldoInicial;
                    deposito = totalSumado - interes;
                }

                const totalSumado = deposito + interes;
                const saldoFinal = saldoInicial + totalSumado;

                totalDepositos += deposito;
                totalIntereses += interes;

                rows[i - 1] = `<tr><td>${i}</td><td>${formatter.format(saldoInicial)}</td><td>${formatter.format(interes)}</td><td>${formatter.format(deposito)}</td><td>${formatter.format(totalSumado)}</td><td>${formatter.format(saldoFinal)}</td></tr>`;
                saldoAnterior = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 6, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
            amortizationTableCacheKey = tableCacheKey;

            // Add footer with totals
                      // Add footer with totals
                      if(tableFooter) {
                tableFooter.innerHTML = `
                    <tr class="table-highlight-row">
                        <td class="cell-accent"><strong>TOTALES</strong></td>
                        <td>-</td>
                        <td class="cell-accent">${formatter.format(totalIntereses)}</td>
                        <td class="cell-accent">${formatter.format(totalDepositos)}</td>
                        <td class="cell-accent">${formatter.format(totalDepositos + totalIntereses)}</td>
                        <td class="cell-accent">${formatter.format(saldoAnterior)}</td>
                    </tr>
                `;
            }
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
