<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Valor Presente con Renta Anticipada - Plazo (n)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA ANTICIPADA</h1>
                <p>AMORTIZACIÓN VARIABLE PLAZO (n)</p>
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
                                    <td class="result-field" colspan="3" id="n-result">¿?</td>
                                </tr>
                                <tr>
                                    <td>i = j/m</td>
                                    <td><input type="text" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12" inputmode="decimal"></td>
                                    <td>
                                        <select id="periodicity-i">
                                            <?php generar_opciones($opciones_periodicidad, "Periodicidad"); ?>
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
                        <table class="data-table"><tbody>
                             <tr><td>n =</td><td id="n-converted">-</td><td id="n-period-text">-</td></tr>
                             <tr><td>i =</td><td id="i-converted">-</td><td id="i-period-text">-</td></tr>
                        </tbody></table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">$$n = \frac{\log\left(1 + i - \frac{P \cdot i}{R_a}\right)}{-\log(1+i)} + 1$$</p>
                        <div id="perpetuity-warning" style="display: none;" class="perpetuity-message">
                            <i class="fas fa-exclamation-triangle"></i>
                            <strong>¡Atención!</strong> La renta (Rₐ) es menor o igual al interés generado. La deuda NUNCA podrá liquidarse. Es una PERPETUIDAD.
                        </div>
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
                <h3 class="card-title">1. Conversión de Tasa</h3>
                <table class="data-table"><tbody>
                     <tr><td>i =</td><td id="i-conv-display-orig">-</td><td id="period-conv-display-i-orig">-</td><td id="freq-conv-display-i-orig">-</td></tr>
                     <tr><td>i<sub>q</sub> =</td><td id="i-conv-display-result">-</td><td id="period-conv-display-i-target">-</td><td id="freq-conv-display-i-target">-</td></tr>
                </tbody></table>
                <p class="formula-content" id="rate-formula">$$i_q = (1+i)^{m/m_q} - 1$$</p>
                <div class="substitution-box">
                    <p class="substitution-text" id="rate-substitution">-</p>
                </div>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Plazo Calculado</h3>
                <div class="calc-stat-wrap">
                    <p class="calc-stat-title">
                        <strong>n =</strong> <span id="n-calculated-display" class="calc-stat-value">-</span>
                    </p>
                    <p class="calc-stat-sub">
                        <span id="n-calculated-period">-</span>
                    </p>
                </div>
                <div class="substitution-box">
                    <p class="substitution-text" id="period-substitution">-</p>
                </div>
            </div>
            <div class="data-card">
                <h3 class="card-title">3. Comprobación</h3>
                <p class="calc-subhead-note">
                    Consiste en la sustitución en la fórmula:
                </p>
                <p class="formula-content">
                    $$P = \frac{R_a}{i} \left(1 + i - (1+i)^{-(n-1)}\right)$$
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
            <div id="perpetuity-section" style="display: none;">
                <div class="perpetuity-message mb-3">
                    <i class="fas fa-infinity"></i>
                    <strong>¡PERPETUIDAD!</strong> Con una renta (Rₐ = <span id="perpetuity-ra">-</span>) que es menor o igual al interés generado, la deuda NUNCA se liquidará.
                </div>
                <div class="data-card">
                    <h3 class="card-title">Ejemplo: Primeros 2 Periodos</h3>
                    <table class="perpetuity-table">
                        <thead>
                            <tr><th>Periodo (n)</th><th>Saldo Inicial (SI)</th><th>Pago Anticipado (Rₐ)</th><th>Saldo Parcial (SP)</th><th>Interés I = SP × i</th><th>Amortización Am = Rₐ - I</th><th>Saldo Final SF = SI - Am</th></tr>
                        </thead>
                        <tbody id="perpetuity-table-body"></tbody>
                    </table>
                    <p class="perpetuity-note"><i class="fas fa-chart-line"></i> El saldo NO disminuye, la deuda permanece igual (o incluso aumenta).</p>
                </div>
            </div>
            <div id="normal-amortization">
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
        let isPerpetuity = false;


        function setupEventListeners() {
            document.getElementById('btn-calculate').addEventListener('click', updateCalculations);

            // Add listeners to just update the frequency display on dropdown change
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-i']);
        }

        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': () => {
                    if (isPerpetuity) {
                        generatePerpetuityTable();
                    } else {
                        generateAmortizationTable();
                    }
                }
            });
        }

        function updateCalculations() {
            ['ra', 'i'].forEach(type => {
                const select = document.getElementById(`periodicity-${type}`);
                if (select && document.getElementById(`freq-${type}`)) {
                    document.getElementById(`freq-${type}`).textContent = select.value || '?';
                }
            });

            const P = MAFICalc.parseFormattedNumber(document.getElementById('p-input').value) || 0;
            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input') || 0;
            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            
            if (!P || !Ra || !i_original || isNaN(m_ra) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }

            // Convertir tasa a la periodicidad de la renta
            const i_conv = Math.pow(1 + i_original, m_i / m_ra) - 1;
            
            // VERIFICAR PERPETUIDAD: Si la renta es menor o igual al interés generado
            const minPaymentNeeded = (P * i_conv) / (1 + i_conv);
            const isPerpetuityCheck = Ra <= minPaymentNeeded;
            
            let n = NaN;
            
            if (isPerpetuityCheck) {
                n = Infinity;
            } else if (i_conv > 0) {
                // Fórmula correcta para renta anticipada:
                // n = log(1 + i - P*i/Ra) / (-log(1+i)) + 1
                const innerTerm = 1 + i_conv - (P * i_conv / Ra);
                if (innerTerm > 0) {
                    n = Math.log(innerTerm) / -Math.log(1 + i_conv) + 1;
                }
            } else if (i_conv === 0) {
                n = P / Ra;
            }
            
            currentCalculations = {
                P, Ra, i_original, m_ra, m_i, i_conv, n, 
                isPerpetuity: isPerpetuityCheck,
                minPaymentNeeded
            };
            isPerpetuity = isPerpetuityCheck;
            
            // Mostrar advertencia de perpetuidad
            const warningDiv = document.getElementById('perpetuity-warning');
            if (warningDiv) {
                warningDiv.style.display = isPerpetuityCheck ? 'block' : 'none';
            }
            
            const n_result_cell = document.getElementById('n-result');
            const sustLinea1 = document.getElementById('sustitucion_linea1');
            const sustLinea2 = document.getElementById('sustitucion_linea2');
            
            if (isPerpetuityCheck) {
                n_result_cell.textContent = '∞ (Perpetuidad)';
                sustLinea1.innerHTML = `<p class="calc-note">La renta de <strong>${formatter.format(Ra)}</strong> es menor o igual al interés generado por periodo (<strong>${formatter.format(minPaymentNeeded)}</strong>).</p>`;
                sustLinea2.textContent = '⚠️ La deuda NUNCA se liquidará';
            } else if (isNaN(n) || !isFinite(n) || n <= 0) {
                n_result_cell.textContent = "Error de cálculo";
                sustLinea1.textContent = "No existe un plazo válido con esos datos.";
                sustLinea2.textContent = "";
            } else {
                n_result_cell.textContent = `${n.toFixed(2)} ${periodicityMapPlural[m_ra]}`;
                
                const p_text = P.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_conv.toFixed(6);

                sustLinea1.innerHTML = `$$ \\Large n = \\frac{\\log\\left(1 + ${i_val} - \\frac{\\text{${p_text}} \\cdot ${i_val}}{\\text{${ra_text}}}\\right)}{-\\log(1+${i_val})} + 1 $$`;
                
                MAFICalc.typesetMath([sustLinea1]);

                sustLinea2.textContent = `n = ${n.toFixed(2)} ${periodicityMapPlural[m_ra].toLowerCase()}`;
            }

            document.getElementById('n-converted').textContent = (isPerpetuityCheck || isNaN(n) || !isFinite(n)) ? '∞' : n.toFixed(4);
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_ra];
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra];
            
            populateConversionsPage();
        }
        
        function limpiarFormulario(partial = false) {
            if(!partial){
                ['p-input', 'ra-input', 'i-input'].forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.value = '';
                });
                ['periodicity-ra', 'periodicity-i'].forEach(id => {
                    const select = document.getElementById(id);
                    if(select) select.selectedIndex = 0;
                });
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            document.getElementById('n-result').textContent = '¿?';
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = '-';
            });
            ['ra', 'i'].forEach(type => {
                const freqEl = document.getElementById(`freq-${type}`);
                if (freqEl) freqEl.textContent = '?';
            });
            currentCalculations = {};
            isPerpetuity = false;
            
            const warningDiv = document.getElementById('perpetuity-warning');
            if (warningDiv) warningDiv.style.display = 'none';
            
            const perpetuitySection = document.getElementById('perpetuity-section');
            const normalAmort = document.getElementById('normal-amortization');
            if (perpetuitySection) perpetuitySection.style.display = 'none';
            if (normalAmort) normalAmort.style.display = 'block';
            
            document.getElementById('amortization-table-body').innerHTML = '';
        }

        function populateConversionsPage() {
            const { P, Ra, i_original, m_ra, m_i, i_conv, n, isPerpetuity } = currentCalculations;
            
            const idsToReset = [
                'i-conv-display-orig', 'period-conv-display-i-orig', 'freq-conv-display-i-orig',
                'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target',
                'rate-substitution', 'n-calculated-display', 'n-calculated-period',
                'period-substitution', 'verification-substitution', 'verification-result'
            ];

            if (!i_original || !m_ra || !m_i || !P || !Ra) {
                idsToReset.forEach(id => {
                    const el = document.getElementById(id);
                    if (el) el.textContent = '-';
                });
                return;
            }

            // 1. Conversión de Tasa
            document.getElementById('i-conv-display-orig').textContent = i_original;
            document.getElementById('period-conv-display-i-orig').textContent = periodicityMap[m_i] || m_i;
            document.getElementById('freq-conv-display-i-orig').textContent = m_i;
            document.getElementById('i-conv-display-result').textContent = i_conv.toFixed(6);
            document.getElementById('period-conv-display-i-target').textContent = periodicityMap[m_ra] || m_ra;
            document.getElementById('freq-conv-display-i-target').textContent = m_ra;
            
            const rateSubstElement = document.getElementById('rate-substitution');
            const rateLatex = `$$ \\Large i_q = (1 + ${i_original})^{\\frac{${m_i}}{${m_ra}}} - 1 = ${i_conv.toFixed(6)} $$`;
            rateSubstElement.innerHTML = rateLatex;

            // 2. Plazo Calculado
            const nDisplayEl = document.getElementById('n-calculated-display');
            const nPeriodEl = document.getElementById('n-calculated-period');
            
            if (isPerpetuity) {
                nDisplayEl.textContent = '∞ (Perpetuidad)';
                nPeriodEl.textContent = '';
            } else if (isNaN(n) || !isFinite(n) || n <= 0) {
                nDisplayEl.textContent = 'Error de cálculo';
                nPeriodEl.textContent = '';
            } else {
                nDisplayEl.textContent = n.toFixed(4);
                nPeriodEl.textContent = periodicityMapPlural[m_ra];
            }
            
            const periodSubstElement = document.getElementById('period-substitution');
            if (isPerpetuity) {
                periodSubstElement.innerHTML = '<strong>⚠️ PERPETUIDAD:</strong> El pago es insuficiente para cubrir los intereses.';
            } else if (isNaN(n) || !isFinite(n) || n <= 0) {
                periodSubstElement.textContent = 'No existe plazo válido';
            } else {
                const p_text = P.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_conv.toFixed(6);
                const n_val = n.toFixed(4);
                periodSubstElement.innerHTML = `$$ \\Large n = \\frac{\\log\\left(1 + ${i_val} - \\frac{${p_text} \\times ${i_val}}{${ra_text}}\\right)}{-\\log(1+${i_val})} + 1 = ${n_val} $$`;
            }

            // 3. Comprobación
            const verificationSubstEl = document.getElementById('verification-substitution');
            const verificationResultEl = document.getElementById('verification-result');
            
            if (isPerpetuity || isNaN(n) || !isFinite(n) || n <= 0) {
                verificationSubstEl.textContent = '-';
                verificationResultEl.textContent = 'No se puede realizar la comprobación.';
            } else {
                const P_check = (Ra / i_conv) * (1 + i_conv - Math.pow(1 + i_conv, -(n - 1)));
                const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
                const i_val = i_conv.toFixed(6);
                const n_val = n.toFixed(4);
                const verificationLatex = `$$ \\Large P = \\left(\\frac{\\text{${ra_text}}}{${i_val}}\\right) \\left(1 + ${i_val} - (1 + ${i_val})^{-(${n_val} - 1)}\\right) $$`;
                verificationSubstEl.innerHTML = verificationLatex;
                verificationResultEl.textContent = `P = ${formatter.format(P_check)}`;
            }

            MAFICalc.typesetMath([rateSubstElement, periodSubstElement, verificationSubstEl]);
        }

        function generatePerpetuityTable() {
            const { P, Ra, i_conv } = currentCalculations;
            const tableBody = document.getElementById('perpetuity-table-body');
            if (!tableBody) return;
            
            const rows = [];
            
            const perpetuityRa = document.getElementById('perpetuity-ra');
            if (perpetuityRa) perpetuityRa.textContent = formatter.format(Ra);
            
            const perpetuitySection = document.getElementById('perpetuity-section');
            const normalAmort = document.getElementById('normal-amortization');
            if (perpetuitySection) perpetuitySection.style.display = 'block';
            if (normalAmort) normalAmort.style.display = 'none';
            
            let saldoInicial = P;
            
            for (let i = 1; i <= 2; i++) {
                let balanceParaInteres = saldoInicial - Ra;
                let interes = balanceParaInteres * i_conv;
                let renta = Ra;
                let amortizacion = renta - interes;
                let saldoFinal = saldoInicial - amortizacion;
                
                const rowHTML = `<tr>
                        <td>${i}</td>
                        <td>${formatter.format(saldoInicial)}</td>
                        <td>${formatter.format(renta)}</td>
                        <td>${formatter.format(balanceParaInteres)}</td>
                        <td>${formatter.format(interes)}</td>
                        <td>${formatter.format(amortizacion)}</td>
                        <td>${formatter.format(saldoFinal)}</td>
                    </tr>`;
                rows.push(rowHTML);
                saldoInicial = saldoFinal;
            }
            
            const noteRow = `
                <tr class="perpetuity-row">
                    <td colspan="7">
                        <i class="fas fa-infinity"></i> El saldo NO disminuye. La deuda NUNCA se liquidará.
                    </td>
                </tr>`;
            rows.push(noteRow);
            tableBody.innerHTML = rows.join('');
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            if (!tableBody) return;

            const { Ra, n, i_conv, P, isPerpetuity, m_ra } = currentCalculations;

            // Actualizar información de la tasa
            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_conv) && m_ra && !isPerpetuity && isFinite(n) && n > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_ra].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            // Gestionar visibilidad y datos inválidos
            const perpetuitySection = document.getElementById('perpetuity-section');
            const normalAmort = document.getElementById('normal-amortization');
            if (isPerpetuity || !P || P <= 0 || isNaN(Ra) || Ra <= 0 || isNaN(n) || !isFinite(n) || n <= 0) {
                if (isPerpetuity) {
                    if (perpetuitySection) perpetuitySection.style.display = 'block';
                    if (normalAmort) normalAmort.style.display = 'none';
                    generatePerpetuityTable();
                } else {
                    if (perpetuitySection) perpetuitySection.style.display = 'none';
                    if (normalAmort) normalAmort.style.display = 'block';
                    tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                }
                return;
            }

            if (perpetuitySection) perpetuitySection.style.display = 'none';
            if (normalAmort) normalAmort.style.display = 'block';

            const n_int = MAFICalc.resolvePeriodCount(n);
            let saldoAnterior = P;
            const rows = [];

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                const saldoInicial = saldoAnterior;
                let balanceParaInteres = saldoInicial - Ra;
                let interes = balanceParaInteres * i_conv;
                let rentaDeEstePeriodo = Ra;
                let amortizacion = rentaDeEstePeriodo - interes;

                // Ajuste para el último periodo
                if (i === n_int || amortizacion >= saldoInicial) {
                    if (saldoInicial > 0.01) {
                        amortizacion = saldoInicial;
                        rentaDeEstePeriodo = saldoInicial + interes;
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

        // Inicialización al cargar la página
        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
