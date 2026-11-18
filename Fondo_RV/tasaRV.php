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
                <h1>VALOR FUTURO CON RENTA VENCIDA</h1>
                <p>FONDO DE AMORTIZACIÓN VARIABLE TASA (i)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr>
                                    <td>F =</td>
                                    <td colspan="2"><input type="text" inputmode="numeric" data-format-number="true" id="f-input" placeholder="Monto futuro"></td>
                                    <td class="empty-cell"></td>
                                </tr>
                                <tr>
                                    <td>Rv =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="r-input" placeholder="Monto de la Renta"></td>
                                    <td><select id="periodicity-r"><?php generar_opciones($opciones_periodicidad); ?></select></td>
                                    <td id="freq-r">?</td>
                                </tr>
                                <tr>
                                    <td>n =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td><select id="periodicity-n"><?php generar_opciones($opciones_periodicidad_plural, "Periodicidad"); ?></select></td>
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
                                <tr>
                                    <td>n =</td>
                                    <td id="n-converted">-</td>
                                    <td id="n-period-text">-</td>
                                </tr>
                                <tr>
                                    <td>i =</td>
                                    <td id="i-converted">-</td>
                                    <td id="i-period-text">-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula Base</h3>
                        <p class="formula-content formula-main">$$F = \left(\frac{R_v}{i}\right)\left((1+i)^n - 1\right)$$</p>
                        <p class="calc-note">(La tasa 'i' se obtiene por un método matemático distinto al despeje)</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="resultado-final" class="output-final">-</h2>
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
                <h3 class="card-title">1. Tasa de Interés Periódica (Calculada)</h3>
                <table class="data-table">
                    <tbody>
                        <tr>
                            <td>i =</td>
                            <td id="i-conv-display-result">-</td>
                            <td id="period-conv-display-i-target">-</td>
                            <td id="freq-conv-display-i-target">-</td>
                        </tr>
                    </tbody>
                </table>
                <p class="calc-note">Es la tasa obtenida por algún método matemático distinto al despeje.</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Conversión de Plazo</h3>
                <table class="data-table">
                    <tbody>
                        <tr>
                            <td>n =</td>
                            <td id="n-conv-display-orig">-</td>
                            <td id="period-conv-display-n-orig">-</td>
                            <td id="freq-conv-display-n-orig">-</td>
                        </tr>
                        <tr>
                            <td>n =</td>
                            <td id="n-conv-display-result">-</td>
                            <td id="period-conv-display-n-target">-</td>
                            <td id="freq-conv-display-n-target">-</td>
                        </tr>
                    </tbody>
                </table>
                <p class="substitution-text" id="period-substitution">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="calc-subhead-note">Consiste en la sustitución en la fórmula, tanto de los datos como de la tasa calculada.</p>
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
        const periodicityUnitSingular = MAFICalc.PERIODICITY_UNIT_SINGULAR;
        const formatter = MAFICalc.currencyFormatter;
        const periodUnitText = MAFICalc.periodUnitText;
        let currentCalculations = {};
        let amortizationTableCacheKey = '';


        function setupEventListeners() {
            const calculateButton = document.getElementById('btn-calculate');
            if (calculateButton) {
                calculateButton.addEventListener('click', updateCalculations);
            }

            MAFICalc.bindPeriodicitySelectors(['periodicity-r', 'periodicity-n']);
        }
        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        function solveForRate(F, R, n, maxIter = 60, tolerance = 1e-9) {
            if (F <= 0 || R <= 0 || n <= 0) return NaN;
            const fvAtZero = R * n;
            if (Math.abs(F - fvAtZero) < tolerance) return 0;
            if (F < fvAtZero) return NaN;
            let low = 0;
            let high = 1;
            let mid = 0;

            while ((R * (Math.pow(1 + high, n) - 1) / high) < F && high < 1e6) {
                high *= 2;
            }

            if ((R * (Math.pow(1 + high, n) - 1) / high) < F) return NaN;

            for (let i = 0; i < maxIter; i++) {
                mid = (low + high) / 2;
                if (mid === 0) return 0;
                const fvAtMid = R * (Math.pow(1 + mid, n) - 1) / mid;
                if (Math.abs(fvAtMid - F) < tolerance) return mid;
                if (fvAtMid > F) high = mid;
                else low = mid;
            }
            return mid;
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['r', 'n']);
            
            const F = MAFICalc.parseFormattedNumber(document.getElementById('f-input').value) || 0;
            const R = MAFICalc.parseFormattedNumber(document.getElementById('r-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const m_r = parseFloat(document.getElementById('periodicity-r').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!F || !R || !n_original || isNaN(m_r) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const n_conv = n_original * (m_r / m_n);
            const i_conv = solveForRate(F, R, n_conv);

            currentCalculations = { F, R, n_original, m_r, m_n, n_conv, i_conv };
            amortizationTableCacheKey = '';

            const i_result_cell = document.getElementById('i-result');
            const sustitucionLinea1 = document.getElementById('sustitucion_linea1');
            const resultadoFinal = document.getElementById('resultado-final');

            if (isNaN(i_conv) || !isFinite(i_conv)) {
                if(i_result_cell) i_result_cell.textContent = 'Error';
                if(sustitucionLinea1) sustitucionLinea1.textContent = 'No se puede calcular. Verifique que F sea mayor o igual que Rv * n.';
                if(resultadoFinal) resultadoFinal.textContent = '-';
            } else {
                const iText = i_conv.toFixed(6);
                const nText = n_conv.toFixed(2);
                const rText = R.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const fCheck = i_conv === 0 ? R * n_conv : (R / i_conv) * (Math.pow(1 + i_conv, n_conv) - 1);
                const fResultText = fCheck.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const rateText = `${(i_conv * 100).toFixed(4)}% ${periodicityMap[m_r]}`;

                if(i_result_cell) i_result_cell.textContent = `${(i_conv * 100).toFixed(4)}% (${periodicityMap[m_r]})`;
                if(sustitucionLinea1) {
                    if (i_conv === 0) {
                        sustitucionLinea1.innerHTML = `$$ \\Large F = \\text{${rText}}(${nText}) $$`;
                    } else {
                        sustitucionLinea1.innerHTML = `$$ \\Large F = \\left(\\frac{\\text{${rText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}} - 1\\right) $$`;
                    }
                    MAFICalc.typesetMath([sustitucionLinea1]);
                }
                if(resultadoFinal) {
                    resultadoFinal.innerHTML = `<div>F = ${fResultText}</div><div>i = ${rateText}</div>`;
                }
            }
            
            const nConverted = document.getElementById('n-converted');
            if(nConverted) nConverted.textContent = n_conv.toFixed(2);
            
            const nPeriodText = document.getElementById('n-period-text');
            if(nPeriodText) nPeriodText.textContent = periodicityMapPlural[m_r];
            
            const iConverted = document.getElementById('i-converted');
            if(iConverted) iConverted.textContent = isNaN(i_conv) ? '-' : (i_conv * 100).toFixed(4) + '%';
            
            const iPeriodText = document.getElementById('i-period-text');
            if(iPeriodText) iPeriodText.textContent = periodicityMap[m_r];

            updateDiagram(n_conv);
            populateConversionsPage();
        }
        
        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 1 });
        }


        function limpiarFormulario(partial = false) {
            if(!partial) {
                const inputs = ['f-input', 'r-input', 'n-input'];
                inputs.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.value = '';
                });
                
                const selects = ['periodicity-r', 'periodicity-n'];
                selects.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.selectedIndex = 0;
                });
            }
            
            const iResult = document.getElementById('i-result');
            if(iResult) iResult.textContent = '¿?';
            
            const elements = [
                'n-converted', 'i-converted', 'n-period-text', 'i-period-text',
                'sustitucion_linea1', 'resultado-final',
                'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target',
                'verification-substitution', 'verification-result'
            ];
            elements.forEach(id => {
                const el = document.getElementById(id);
                if(el) el.textContent = '-';
            });
            
            ['r', 'n'].forEach(type => {
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
            const { F, R, n_original, m_r, m_n, n_conv, i_conv } = currentCalculations;
            if (!n_original || !m_r || !m_n) {
                const ids = [
                    'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target',
                    'n-conv-display-orig', 'period-conv-display-n-orig', 'freq-conv-display-n-orig',
                    'n-conv-display-result', 'period-conv-display-n-target', 'freq-conv-display-n-target',
                    'period-substitution', 'verification-substitution', 'verification-result'
                ];
                ids.forEach(id => {
                    const el = document.getElementById(id);
                    if(el) el.textContent = '-';
                });
                return;
            }

            const iConvDisplayResult = document.getElementById('i-conv-display-result');
            if(iConvDisplayResult) iConvDisplayResult.textContent = isNaN(i_conv) ? '-' : `${(i_conv * 100).toFixed(5)}%`;

            const periodConvDisplayITarget = document.getElementById('period-conv-display-i-target');
            if(periodConvDisplayITarget) periodConvDisplayITarget.textContent = periodicityMap[m_r];

            const freqConvDisplayITarget = document.getElementById('freq-conv-display-i-target');
            if(freqConvDisplayITarget) freqConvDisplayITarget.textContent = m_r;
            
            const nConvDisplayOrig = document.getElementById('n-conv-display-orig');
            if(nConvDisplayOrig) nConvDisplayOrig.textContent = n_original;
            
            const periodConvDisplayNOrig = document.getElementById('period-conv-display-n-orig');
            if(periodConvDisplayNOrig) periodConvDisplayNOrig.textContent = periodicityMapPlural[m_n];
            
            const freqConvDisplayNOrig = document.getElementById('freq-conv-display-n-orig');
            if(freqConvDisplayNOrig) freqConvDisplayNOrig.textContent = m_n;
            
            const nConvDisplayResult = document.getElementById('n-conv-display-result');
            if(nConvDisplayResult) nConvDisplayResult.textContent = n_conv.toFixed(2);
            
            const periodConvDisplayNTarget = document.getElementById('period-conv-display-n-target');
            if(periodConvDisplayNTarget) periodConvDisplayNTarget.textContent = periodicityMapPlural[m_r];
            
            const freqConvDisplayNTarget = document.getElementById('freq-conv-display-n-target');
            if(freqConvDisplayNTarget) freqConvDisplayNTarget.textContent = m_r;
            
            const periodSubstitution = document.getElementById('period-substitution');
            const originalUnitText = periodUnitText(m_n, n_original);
            const targetUnitText = periodUnitText(m_r, m_r);
            const denominatorUnitText = periodUnitText(m_n, m_n);
            if(periodSubstitution) {
                periodSubstitution.innerHTML = `$$ \\Large n = \\frac{${n_original} \\text{ ${originalUnitText}}}{1} \\times \\frac{${m_r} \\text{ ${targetUnitText}}}{${m_n} \\text{ ${denominatorUnitText}}} = \\frac{${n_original * m_r}}{${m_n}} = ${n_conv.toFixed(2)} \\text{ ${targetUnitText}} $$`;
            }

            const verificationSubstitution = document.getElementById('verification-substitution');
            const verificationResult = document.getElementById('verification-result');
            if(verificationSubstitution && verificationResult) {
                if (isNaN(i_conv) || !isFinite(i_conv)) {
                    verificationSubstitution.textContent = '-';
                    verificationResult.textContent = 'No se puede realizar la comprobación.';
                } else {
                    const rText = R.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                    const iText = i_conv.toFixed(6);
                    const nText = n_conv.toFixed(2);
                    const fCheck = i_conv === 0 ? R * n_conv : (R / i_conv) * (Math.pow(1 + i_conv, n_conv) - 1);
                    verificationSubstitution.innerHTML = i_conv === 0
                        ? `$$ \\Large F = \\text{${rText}}(${nText}) $$`
                        : `$$ \\Large F = \\left(\\frac{\\text{${rText}}}{${iText}}\\right)\\left((1 + ${iText})^{${nText}} - 1\\right) $$`;
                    verificationResult.textContent = `F = ${formatter.format(fCheck)}`;
                }
            }

            MAFICalc.typesetMath([periodSubstitution, verificationSubstitution].filter(Boolean));
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            const tableFooter = document.getElementById('amortization-table-footer');
            
            if(!tableBody) return;
            
            const { R, n_conv, i_conv, F, m_r } = currentCalculations;

            // Update rate info display
            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_conv) && isFinite(i_conv) && m_r && F > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_r]?.toLowerCase() || '';
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!F || F <= 0 || !R || isNaN(i_conv) || !isFinite(i_conv)) {
                amortizationTableCacheKey = '';
                if(tableBody) tableBody.innerHTML = '<tr><td colspan="6">Ingrese datos válidos para generar la tabla</td></tr>';
                if(tableFooter) tableFooter.innerHTML = '';
                return;
            }

            const tableCacheKey = [R, n_conv, i_conv, F, m_r].join('|');
            if (amortizationTableCacheKey === tableCacheKey && tableBody.children.length > 0) {
                return;
            }

            tableBody.innerHTML = '';
            if(tableFooter) tableFooter.innerHTML = '';

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
                let deposito = R;
                
                if (i === n_int) {
                    const totalSumado = F - saldoInicial;
                    deposito = totalSumado - interes;
                }
                
                const totalSumado = deposito + interes;
                const saldoFinal = saldoInicial + totalSumado;

                totalDepositos += deposito;
                totalIntereses += interes;

                rows[i - 1] = `
                <tr>
                    <td>${i}</td>
                    <td>${formatter.format(saldoInicial)}</td>
                    <td>${formatter.format(interes)}</td>
                    <td>${formatter.format(deposito)}</td>
                    <td>${formatter.format(totalSumado)}</td>
                    <td>${formatter.format(saldoFinal)}</td>
                </tr>`;
                saldoAnterior = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 6, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
            amortizationTableCacheKey = tableCacheKey;

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
                    <tr class="table-note-row">
                        <td colspan="6">
                            <i class="fas fa-info-circle"></i> El saldo final del período ${n_int} es igual al valor futuro F = ${formatter.format(F)}
                        </td>
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
