<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Amortización - Tasa (i) con Renta Vencida', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA VENCIDA</h1>
                <p>AMORTIZACIÓN VARIABLE TASA (i)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr>
                                    <td>P =</td>
                                    <td colspan="3"><input type="text" inputmode="numeric" data-format-number="true" id="p-input" placeholder="Monto del préstamo"></td>
                                </tr>
                                <tr>
                                    <td>Rᵥ =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="rv-input" placeholder="Monto de la Renta"></td>
                                    <td>
                                        <select id="periodicity-rv">
                                            <?php generar_opciones($opciones_periodicidad, "Periodicidad"); ?>
                                        </select>
                                    </td>
                                    <td id="freq-rv">?</td>
                                </tr>
                                <tr>
                                    <td>n =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td>
                                        <select id="periodicity-n">
                                            <?php generar_opciones($opciones_periodicidad_plural, "Periodicidad"); ?>
                                        </select>
                                    </td>
                                    <td id="freq-n">?</td>
                                </tr>
                                <tr>
                                    <td>i = j/m</td>
                                    <td colspan="3" class="result-field" id="i-result">¿?</td>
                                </tr>
                            </tbody>
                         </table>
                        <div class="calc-action-top">
                            <button id="btn-calculate" class="btn btn-calcular">CALCULAR</button>
                        </div>
                    </div>
                    
                    <!-- Conversiones debajo de los datos de entrada -->
                    <div class="data-card">
                        <h3 class="card-title">Conversiones</h3>
                        <table class="data-table">
                            <tbody>
                                <tr>
                                    <td>n =</td>
                                    <td id="n-converted">-</td>
                                    <td id="n-period-text">-</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>i =</td>
                                    <td id="i-converted">-</td>
                                    <td id="i-period-text">-</td>
                                    <td></td>
                                </tr>
                            </tbody>
                         </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">$$P = \left(\frac{R_v}{i}\right) \left(1 - (1 + i)^{-n}\right)$$</p>
                        <p class="calc-note">(La tasa 'i' se calcula por aproximaciones)</p>
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
                        <a href="../Simuladores/simulador_rv.php" class="btn btn-secondary">REGRESAR</a>
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
                <p class="formula-content">$$ P = \left(\frac{R_v}{i}\right) \left(1 - (1 + i)^{-n}\right) $$</p>
                <p class="substitution-text" id="verification-substitution">-</p>
                <h4 class="output-final calc-verify-result" id="verification-result">-</h4>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
            </div>
        </div>

        <div id="amortization-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA VENCIDA</h1>
                <p>CUADRO DE AMORTIZACIÓN</p>

            </div>
            <div id="rate-info" class="rate-info-box">
                <strong>Tasa i = </strong> <span id="display-rate">-</span> % <span id="display-rate-period">-</span>
            </div>
            <div id="amortization-table-container" class="calc-table-scroll">
                <table class="data-table" id="amortization-table">
                    <thead>
                        <tr>
                            <th>Plazo<br>n</th><th>Saldo incial<br>SI</th><th>Interés<br>I = SI * i</th><th>Pago vencido<br>Rv</th>
                            <th>Amortización<br>Am = Rv - I</th><th>Saldo Final<br>SF = SI - Am</th>
                        </tr>
                    </thead>
                    <tbody id="amortization-table-body"></tbody>
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
        let currentCalculations = {};


        function setupEventListeners() {
            document.getElementById('btn-calculate').addEventListener('click', updateCalculations);

            // Add listeners to just update the frequency display on dropdown change
            MAFICalc.bindPeriodicitySelectors(['periodicity-rv', 'periodicity-n']);
        }
        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        function updateRateDisplay() {
            const i_conv = currentCalculations.i_conv || 0;
            const m_rv = currentCalculations.m_rv || 0;
            const rateSpan = document.getElementById('display-rate');
            const periodSpan = document.getElementById('display-rate-period');
            
            if (rateSpan && periodSpan) {
                if (i_conv && m_rv && !isNaN(i_conv)) {
                    rateSpan.textContent = (i_conv * 100).toFixed(4);
                    periodSpan.textContent = periodicityMap[m_rv] ? `(${periodicityMap[m_rv]})` : '';
                } else {
                    rateSpan.textContent = '-';
                    periodSpan.textContent = '-';
                }
            }
        }

        function solveForRatePV(P, R, n, maxIter = 100, tolerance = 1e-9) {
            if (P <= 0 || R <= 0 || n <= 0) return NaN;

            const pvForRate = (rate) => {
                if (Math.abs(rate) < tolerance) return R * n;
                return R * (1 - Math.pow(1 + rate, -n)) / rate;
            };

            const pvAtZero = pvForRate(0);
            if (Math.abs(P - pvAtZero) < tolerance) return 0;
            if (P > pvAtZero) return NaN;

            let low = 0;
            let high = 1;
            let mid = 0;

            while (pvForRate(high) > P && high < 1e6) {
                high *= 2;
            }

            if (pvForRate(high) > P) return NaN;

            for (let i = 0; i < maxIter; i++) {
                mid = (low + high) / 2;
                if (mid < tolerance) return mid > 0 ? mid : 0;
                const pvAtMid = pvForRate(mid);
                if (Math.abs(pvAtMid - P) < tolerance) return mid;
                if (pvAtMid > P) low = mid;
                else high = mid;
            }
            return mid;
        }

        function updateCalculations() {
            ['rv', 'n'].forEach(type => {
                const select = document.getElementById(`periodicity-${type}`);
                if (select && document.getElementById(`freq-${type}`)) {
                    document.getElementById(`freq-${type}`).textContent = select.value || '?';
                }
            });
            
            const P = MAFICalc.parseFormattedNumber(document.getElementById('p-input').value) || 0;
            const Rv = MAFICalc.parseFormattedNumber(document.getElementById('rv-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const m_rv = parseFloat(document.getElementById('periodicity-rv').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!P || !Rv || !n_original || isNaN(m_rv) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const n_conv = n_original * (m_rv / m_n);
            const i_conv = solveForRatePV(P, Rv, n_conv);

            currentCalculations = { P, Rv, n_original, m_rv, m_n, n_conv, i_conv };

            // Mostrar resultado
            const i_result_cell = document.getElementById('i-result');
            const sustLinea1 = document.getElementById('sustitucion_linea1');
            const resultadoFinal = document.getElementById('resultado-final');
            
            if (isNaN(i_conv) || !isFinite(i_conv)) {
                if (i_result_cell) i_result_cell.textContent = "Error";
                if (sustLinea1) sustLinea1.textContent = "No se puede calcular. Verificar que P < (Rv * n).";
                if (resultadoFinal) resultadoFinal.textContent = "";
            } else {
                const i_text = `i = ${(i_conv * 100).toFixed(4)}% (${periodicityMap[m_rv] || ''})`;
                if (i_result_cell) i_result_cell.textContent = i_text;

                // Rellenar la sustitución con formato MathJax
                const p_text = P.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const rv_text = Rv.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_conv.toFixed(6);
                const n_val = n_conv.toFixed(2);

                sustLinea1.innerHTML = `$$ \\Large \\text{${p_text}} = \\left(\\frac{\\text{${rv_text}}}{${i_val}}\\right) \\left(1 - (1 + ${i_val})^{-${n_val}}\\right) $$`;
                MAFICalc.typesetMath([sustLinea1]);

                if (resultadoFinal) resultadoFinal.textContent = i_text;
            }
            
            // Conversiones
            const nConverted = document.getElementById('n-converted');
            const nPeriodText = document.getElementById('n-period-text');
            if (nConverted) nConverted.textContent = n_conv.toFixed(2);
            if (nPeriodText) nPeriodText.textContent = periodicityMapPlural[m_rv] || '';
            
            const iConverted = document.getElementById('i-converted');
            const iPeriodText = document.getElementById('i-period-text');
            if (iConverted) iConverted.textContent = isNaN(i_conv) ? '-' : (i_conv * 100).toFixed(4) + '%';
            if (iPeriodText) iPeriodText.textContent = periodicityMap[m_rv] || '';
            
            updateRateDisplay();
            populateConversionsPage();
        }
        
        function limpiarFormulario(partial = false) {
            if(!partial) {
                const pInput = document.getElementById('p-input');
                const rvInput = document.getElementById('rv-input');
                const nInput = document.getElementById('n-input');
                if (pInput) pInput.value = '';
                if (rvInput) rvInput.value = '';
                if (nInput) nInput.value = '';
                
                const periodicityRv = document.getElementById('periodicity-rv');
                const periodicityN = document.getElementById('periodicity-n');
                if (periodicityRv) periodicityRv.selectedIndex = 0;
                if (periodicityN) periodicityN.selectedIndex = 0;
            }
            
            const iResult = document.getElementById('i-result');
            if (iResult) iResult.textContent = '¿?';
            
            const sustLinea1 = document.getElementById('sustitucion_linea1');
            if (sustLinea1) sustLinea1.textContent = '-';
            
            const resultadoFinal = document.getElementById('resultado-final');
            if (resultadoFinal) resultadoFinal.textContent = '-';
            
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = '-';
            });
            ['rv', 'n'].forEach(type => {
                const freqEl = document.getElementById(`freq-${type}`);
                if (freqEl) freqEl.textContent = '?';
            });
            
            currentCalculations = {};
            
            const displayRate = document.getElementById('display-rate');
            const displayRatePeriod = document.getElementById('display-rate-period');
            if (displayRate) displayRate.textContent = '-';
            if (displayRatePeriod) displayRatePeriod.textContent = '-';
            
            populateConversionsPage();
            const tableBody = document.getElementById('amortization-table-body'); if (tableBody) tableBody.innerHTML = '';
        }

        function populateConversionsPage() {
            const { P, Rv, n_original, m_rv, m_n, n_conv, i_conv } = currentCalculations;
            
            const idsToReset = [
                'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target',
                'n-conv-display-orig', 'period-conv-display-n-orig', 'freq-conv-display-n-orig',
                'n-conv-display-result', 'period-conv-display-n-target', 'freq-conv-display-n-target',
                'period-substitution', 'verification-substitution', 'verification-result'
            ];

            if (!n_original || !m_rv || !m_n || !P || !Rv) {
                idsToReset.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '-';
                });
                return;
            }
            
            // 1. Tasa de Interés Periódica (Calculada)
            const iConvResult = document.getElementById('i-conv-display-result');
            const periodITarget = document.getElementById('period-conv-display-i-target');
            const freqITarget = document.getElementById('freq-conv-display-i-target');
            
            if (iConvResult) iConvResult.textContent = isNaN(i_conv) ? '-' : `${(i_conv * 100).toFixed(4)}%`;
            if (periodITarget) periodITarget.textContent = periodicityMap[m_rv] || m_rv;
            if (freqITarget) freqITarget.textContent = m_rv;

            // 2. Conversión de Plazo
            document.getElementById('n-conv-display-orig').textContent = n_original;
            document.getElementById('period-conv-display-n-orig').textContent = periodicityMapPlural[m_n] || m_n;
            document.getElementById('freq-conv-display-n-orig').textContent = m_n;
            document.getElementById('n-conv-display-result').textContent = n_conv.toFixed(2);
            document.getElementById('period-conv-display-n-target').textContent = periodicityMapPlural[m_rv] || m_rv;
            document.getElementById('freq-conv-display-n-target').textContent = m_rv;
            
            const periodSubstElement = document.getElementById('period-substitution');
            const n_original_text = periodicityMapPlural[m_n] || '';
            const n_target_text = periodicityMapPlural[m_rv] || '';
            const periodLatex = `$$ \\Large n = \\frac{${n_original} \\text{ ${n_original_text}}}{1} \\times \\frac{${m_rv} \\text{ ${n_target_text}}}{${m_n} \\text{ ${n_original_text}}} = \\frac{${n_original * m_rv}}{${m_n}} = ${n_conv.toFixed(2)} \\text{ ${n_target_text}} $$`;
            periodSubstElement.innerHTML = periodLatex;

            // 3. Comprobación
            const verificationSubstEl = document.getElementById('verification-substitution');
            const verificationResultEl = document.getElementById('verification-result');
            
            if (isNaN(i_conv) || !isFinite(i_conv)) {
                verificationSubstEl.textContent = '-';
                verificationResultEl.textContent = 'No se puede realizar la comprobación.';
            } else {
                const P_check = (Rv / i_conv) * (1 - Math.pow(1 + i_conv, -n_conv));
                const rv_text = Rv.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_conv.toFixed(6);
                const n_val = n_conv.toFixed(2);
                const verificationLatex = `$$ \\Large P = \\left(\\frac{\\text{${rv_text}}}{${i_val}}\\right) \\left(1 - (1 + ${i_val})^{-${n_val}}\\right) $$`;
                verificationSubstEl.innerHTML = verificationLatex;
                verificationResultEl.textContent = `P = ${formatter.format(P_check)}`;
            }

            MAFICalc.typesetMath([periodSubstElement, verificationSubstEl]);
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            if (!tableBody) return;
            tableBody.innerHTML = '';
            
            const { Rv, n_conv, i_conv, P } = currentCalculations;
            
            if (!P || P <= 0 || isNaN(n_conv) || !isFinite(n_conv) || isNaN(i_conv) || !isFinite(i_conv)) {
                tableBody.innerHTML = '<tr><td colspan="6">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }
            
            const n_int = Math.ceil(n_conv);
            let saldoAnterior = P;
            const rows = [];

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoInicial = saldoAnterior;
                const interes = saldoInicial * i_conv;
                let rentaDeEstePeriodo = Rv;
                let amortizacion = Rv - interes;

                // Ajuste robusto para el último periodo, para asegurar que el saldo final sea cero.
                // Se activa si es la última iteración o si el pago regular ya cubre el saldo.
                if (i === n_int || (amortizacion >= saldoInicial && saldoInicial > 0.01)) {
                    if (saldoInicial > 0.01) {
                        amortizacion = saldoInicial;
                        rentaDeEstePeriodo = amortizacion + interes;
                    }
                }
                
                const saldoFinal = saldoInicial - amortizacion;

                rows.push(`<tr>
                        <td>${i}</td>
                        <td>${formatter.format(saldoInicial)}</td>
                        <td>${formatter.format(interes)}</td>
                        <td>${formatter.format(rentaDeEstePeriodo)}</td>
                        <td>${formatter.format(amortizacion)}</td>
                        <td>${formatter.format(saldoFinal < 0.01 ? 0 : saldoFinal)}</td>
                    </tr>`);
                saldoAnterior = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 6, maxRows);
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
