<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Valor Presente con Renta Anticipada - Tasa (i)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA ANTICIPADA</h1>
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
                                    <td>Rₐ =</td>
                                    <td><input type="text" inputmode="numeric" data-format-number="true" id="ra-input" placeholder="Monto de la Renta"></td>
                                    <td>
                                        <select id="periodicity-ra">
                                            <?php generar_opciones($opciones_periodicidad, "Periodicidad"); ?>
                                        </select>
                                    </td>
                                    <td id="freq-ra">?</td>
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
                        <p class="formula-content formula-main">$$P = \left(\frac{R_a}{i}\right) \left(1 + i - (1 + i)^{-(n-1)}\right)$$</p>
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
                        <a href="../Simuladores/simulador_ra.php" class="btn btn-secondary">REGRESAR</a>
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
                <div class="substitution-box">
                    <p class="substitution-text" id="period-substitution">-</p>
                </div>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Tasa de Interés Periódica (Calculada)</h3>
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
                <p class="calc-note">
                    Es la tasa obtenida por algún método matemático distinto al despeje.
                </p>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="calc-subhead-note">
                    Consiste en la sustitución en la fórmula:
                </p>
                <p class="formula-content">
                    $$P = \left(\frac{R_a}{i}\right) \left(1 + i - (1 + i)^{-(n-1)}\right)$$
                </p>
                <div class="verification-box">
                    <p class="substitution-text" id="verification-substitution">-</p>
                    <p class="output-final calc-verify-result" id="verification-result">-</p>
                </div>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
            </div>
        </div>

        <div id="amortization-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA ANTICIPADA</h1>
                <p>CUADRO DE AMORTIZACIÓN</p>
            </div>
            <div id="rate-info" class="rate-info-box">
                <strong>Tasa i = </strong> <span id="display-rate">-</span> % <span id="display-rate-period">-</span>
            </div>
            <div id="amortization-table-container" class="calc-table-scroll">
                <table class="data-table" id="amortization-table">
                    <thead>
                        <tr>
                            <th>Periodo<br>n</th><th>Saldo Inicial<br>SI</th><th>Pago Anticipado<br>Rₐ</th>
                            <th>Saldo Parcial<br>SP = SI - Rₐ</th><th>Interés<br>I = SP * i</th>
                            <th>Amortización<br>Am = Rₐ - I</th><th>Saldo Final<br>SF = SI - Am</th>
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
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-n']);
        }

        // --- FUNCIÓN showSection - PARA LOS BOTONES VER EXPLICACIÓN Y VER CUADRO ---
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        // --- Función para resolver la tasa en renta anticipada ---
        function solveRateAnnuityDue(P, Ra, n, maxIter = 100, tolerance = 1e-9) {
            if (P <= 0 || Ra <= 0 || n <= 0) return NaN;
            if (n === 1) {
                return Math.abs(P - Ra) < 1e-6 ? 0 : NaN;
            }
            if (Math.abs(P - Ra * n) < 1e-6) return 0;
            if (P > Ra * n || P <= Ra) return NaN;

            const pvFunc = (rate) => {
                if (Math.abs(rate) < 1e-12) return Ra * n;
                const factor = (1 - Math.pow(1 + rate, -(n - 1))) / rate;
                return Ra * (1 + factor);
            };

            let low = 0;
            let high = 0.1;
            const maxHigh = 1000;
            while (pvFunc(high) > P && high < maxHigh) {
                high *= 2;
            }
            if (pvFunc(high) > P) return NaN;

            let mid = 0;
            for (let i = 0; i < maxIter; i++) {
                mid = (low + high) / 2;
                if (mid === low || mid === high) break;
                const pvMid = pvFunc(mid);
                if (Math.abs(pvMid - P) < tolerance) return mid;
                if (pvMid > P) {
                    low = mid;
                } else {
                    high = mid;
                }
            }
            return mid;
        }

        function updateCalculations() {
            ['ra', 'n', 'i'].forEach(type => {
                const select = document.getElementById(`periodicity-${type}`);
                if (select && document.getElementById(`freq-${type}`)) {
                    document.getElementById(`freq-${type}`).textContent = select.value || '?';
                }
            });

            const P = MAFICalc.parseFormattedNumber(document.getElementById('p-input').value) || 0;
            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!P || !Ra || !n_original || isNaN(m_ra) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const n_conv = n_original * (m_ra / m_n);
            const i_base = solveRateAnnuityDue(P, Ra, n_conv);

            currentCalculations = { P, Ra, n_original, m_ra, m_n, n_conv, i_base };

            const i_result_cell = document.getElementById('i-result');
            const sustLinea1 = document.getElementById('sustitucion_linea1');
            const resultadoFinal = document.getElementById('resultado-final');
            
            if (isNaN(i_base) || !isFinite(i_base) || i_base < 0) {
                i_result_cell.textContent = "Error";
                sustLinea1.textContent = "No se puede calcular. Verificar que P < (Ra * n).";
                resultadoFinal.textContent = "";
            } else {
                const i_text = `i = ${(i_base * 100).toFixed(4)}% (${periodicityMap[m_ra] || ''})`;
                i_result_cell.textContent = i_text;

                const p_text = P.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_base.toFixed(6);
                const n_val = n_conv.toFixed(2);

                sustLinea1.innerHTML = i_base === 0
                    ? `$$ \\Large \\text{${p_text}} = \\text{${ra_text}}(${n_val}) $$`
                    : `$$ \\Large \\text{${p_text}} = \\left(\\frac{\\text{${ra_text}}}{${i_val}}\\right) \\left(1 + ${i_val} - (1 + ${i_val})^{-(${n_val} - 1)}\\right) $$`;
                MAFICalc.typesetMath([sustLinea1]);

                resultadoFinal.textContent = i_text;
            }
            
            document.getElementById('n-converted').textContent = n_conv.toFixed(2);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_ra] || '';
            document.getElementById('i-converted').textContent = isNaN(i_base) ? '-' : (i_base * 100).toFixed(4) + '%';
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra] || '';
            
            updateRateDisplay();
            populateConversionsPage();
        }
        
        function limpiarFormulario(partial = false) {
            if(!partial) {
                ['p-input', 'ra-input', 'n-input'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.value = '';
                });
                ['periodicity-ra', 'periodicity-n'].forEach(id => {
                    const select = document.getElementById(id);
                    if(select) select.selectedIndex = 0;
                });
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
            ['ra', 'n', 'i'].forEach(type => {
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

        function updateRateDisplay() {
            const i_base = currentCalculations.i_base;
            const m_ra = currentCalculations.m_ra || 0;
            const rateSpan = document.getElementById('display-rate');
            const periodSpan = document.getElementById('display-rate-period');
            
            if (rateSpan && periodSpan) {
                if (typeof i_base === 'number' && isFinite(i_base) && i_base >= 0 && m_ra) {
                    rateSpan.textContent = (i_base * 100).toFixed(4);
                    periodSpan.textContent = periodicityMap[m_ra] ? `(${periodicityMap[m_ra]})` : '';
                } else {
                    rateSpan.textContent = '-';
                    periodSpan.textContent = '-';
                }
            }
        }

        function populateConversionsPage() {
            const { P, Ra, n_original, m_ra, m_n, n_conv, i_base } = currentCalculations;
            
            const idsToReset = [
                'n-conv-display-orig', 'period-conv-display-n-orig', 'freq-conv-display-n-orig',
                'n-conv-display-result', 'period-conv-display-n-target', 'freq-conv-display-n-target',
                'period-substitution', 'i-conv-display-result', 'period-conv-display-i-target',
                'freq-conv-display-i-target', 'verification-substitution', 'verification-result'
            ];

            if (!n_original || !m_ra || !m_n || !P || !Ra) {
                idsToReset.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '-';
                });
                return;
            }
            
            // 1. Conversión de Plazo
            document.getElementById('n-conv-display-orig').textContent = n_original;
            document.getElementById('period-conv-display-n-orig').textContent = periodicityMapPlural[m_n] || m_n;
            document.getElementById('freq-conv-display-n-orig').textContent = m_n;
            document.getElementById('n-conv-display-result').textContent = n_conv.toFixed(2);
            document.getElementById('period-conv-display-n-target').textContent = periodicityMapPlural[m_ra] || m_ra;
            document.getElementById('freq-conv-display-n-target').textContent = m_ra;
            
            const periodSubstElement = document.getElementById('period-substitution');
            const n_orig_text = periodicityMapPlural[m_n] || '';
            const n_target_text = periodicityMapPlural[m_ra] || '';
            const periodLatex = `$$ \\Large n = \\frac{${n_original} \\text{ ${n_orig_text}}}{1} \\times \\frac{${m_ra} \\text{ ${n_target_text}}}{${m_n} \\text{ ${n_orig_text}}} = \\frac{${n_original * m_ra}}{${m_n}} = ${n_conv.toFixed(2)} \\text{ ${n_target_text}} $$`;
            periodSubstElement.innerHTML = periodLatex;

            // 2. Tasa de Interés Periódica (Calculada)
            const iConvResult = document.getElementById('i-conv-display-result');
            const periodITarget = document.getElementById('period-conv-display-i-target');
            const freqITarget = document.getElementById('freq-conv-display-i-target');
            
            if (iConvResult) {
                if (isNaN(i_base) || !isFinite(i_base) || i_base < 0) {
                    iConvResult.textContent = 'Error';
                } else {
                    iConvResult.textContent = `${(i_base * 100).toFixed(4)}%`;
                }
            }
            if (periodITarget) periodITarget.textContent = periodicityMap[m_ra] || m_ra;
            if (freqITarget) freqITarget.textContent = m_ra;

            // 3. Comprobación
            const verificationSubstEl = document.getElementById('verification-substitution');
            const verificationResultEl = document.getElementById('verification-result');
            
            if (isNaN(i_base) || !isFinite(i_base) || i_base < 0) {
                verificationSubstEl.textContent = '-';
                verificationResultEl.textContent = 'No se puede realizar la comprobación.';
            } else {
                const P_check = i_base === 0 ? Ra * n_conv : (Ra / i_base) * (1 + i_base - Math.pow(1 + i_base, -(n_conv - 1)));
                const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_base.toFixed(6);
                const n_val = n_conv.toFixed(2);
                const verificationLatex = i_base === 0
                    ? `$$ \\Large P = \\text{${ra_text}}(${n_val}) $$`
                    : `$$ \\Large P = \\left(\\frac{\\text{${ra_text}}}{${i_val}}\\right) \\left(1 + ${i_val} - (1 + ${i_val})^{-(${n_val} - 1)}\\right) $$`;
                verificationSubstEl.innerHTML = verificationLatex;
                verificationResultEl.textContent = `P = ${formatter.format(P_check)}`;
            }

            MAFICalc.typesetMath([periodSubstElement, verificationSubstEl]);
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            if (!tableBody) return;
            tableBody.innerHTML = '';
            
            const { Ra, n_conv, i_base, P } = currentCalculations;
            
            if (!P || P <= 0 || isNaN(n_conv) || !isFinite(n_conv) || isNaN(i_base) || !isFinite(i_base) || i_base < 0) {
                tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }
            
            const n_int = Math.ceil(n_conv);
            let saldoAnterior = P;
            const rows = [];

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoInicial = saldoAnterior;
                let rentaDeEstePeriodo = Ra;
                let balanceParaInteres = saldoInicial - rentaDeEstePeriodo;
                let interes = balanceParaInteres * i_base;
                let amortizacion = rentaDeEstePeriodo - interes;

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
                        <td>${formatter.format(rentaDeEstePeriodo)}</td>
                        <td>${formatter.format(balanceParaInteres)}</td>
                        <td>${formatter.format(interes)}</td>
                        <td>${formatter.format(amortizacion)}</td>
                        <td>${formatter.format(saldoFinal < 0.01 ? 0 : saldoFinal)}</td>
                    </tr>`);
                saldoAnterior = saldoFinal;
                if (saldoAnterior <= 0.01) break;
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
