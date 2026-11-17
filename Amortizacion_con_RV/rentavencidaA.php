<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Renta Vencida', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA VENCIDA</h1>
                <p>AMORTIZACIÓN VARIABLE RENTA (Rᵥ)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>P =</td><td colspan="3"><input type="text" inputmode="numeric" data-format-number="true" id="p-input" placeholder="Monto del Préstamo"></td></tr>
                                <tr><td>Rv =</td><td class="result-field" id="rv-result">¿?</td>
                                    <td><select id="periodicity-rv"><?php generar_opciones($opciones_periodicidad, "Periodicidad"); ?></select></td>
                                    <td id="freq-rv">?</td>
                                </tr>
                                <tr><td>n =</td><td><input type="text" inputmode="numeric" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td><select id="periodicity-n"><?php generar_opciones($opciones_periodicidad_plural); ?></select></td>
                                    <td id="freq-n">?</td>
                                </tr>
                                <tr><td>i = j/m</td><td><input type="text" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12" inputmode="decimal"></td>
                                    <td><select id="periodicity-i"><?php generar_opciones($opciones_periodicidad, "Periodicidad"); ?></select></td>
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
                        <p class="formula-content formula-main">$$R_v = \frac{P i}{1 - (1 + i)^{-n}}$$</p>
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
                            <th>Plazo</th><th>Saldo Inicial</th><th>Interés</th><th>Pago Vencido</th><th>Amortización</th><th>Saldo Final</th>
                        </tr>
                        <tr>
                            <th>n</th><th>SI</th><th>I = SI * i</th><th>Rv</th><th>Am = Rv - I</th><th>SF = SI - Am</th>
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
// --- CONSTANTES Y FORMATO ---
        const periodicityMap = MAFICalc.PERIODICITY_SINGULAR;
        const periodicityMapPlural = MAFICalc.PERIODICITY_UNITS;
        const formatter = MAFICalc.currencyFormatter;
        let currentCalculations = {};


        // --- MANEJO DE EVENTOS ---
        function setupEventListeners() {
            document.getElementById('btn-calculate').addEventListener('click', updateCalculations);

            // Add listeners to just update the frequency display on dropdown change
            MAFICalc.bindPeriodicitySelectors(['periodicity-rv', 'periodicity-n', 'periodicity-i']);
        }

        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        // --- CÁLCULO PRINCIPAL ---
        function updateCalculations() {
            const P = MAFICalc.parseFormattedNumber(document.getElementById('p-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input') || 0;
            const m_rv = parseFloat(document.getElementById('periodicity-rv').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            
            if (!P || !n_original || !i_original || isNaN(m_rv) || isNaN(m_n) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }
            
            const n_conv = n_original * (m_rv / m_n);
            const i_conv = Math.pow(1 + i_original, m_i / m_rv) - 1;
            
            let Rv = 0;
            if (n_conv > 0 && i_conv !== 0) {
                const factor = (1 - Math.pow(1 + i_conv, -n_conv));
                if (factor !== 0) Rv = P * (i_conv / factor);
            } else if (n_conv > 0) {
                Rv = P / n_conv;
            }
            
            currentCalculations = { P, n_original, i_original, m_rv, m_n, m_i, n_conv, i_conv, Rv };

            document.getElementById('rv-result').textContent = formatter.format(Rv);
            document.getElementById('n-converted').textContent = n_conv.toFixed(2);
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_rv];
            document.getElementById('i-period-text').textContent = periodicityMap[m_rv];
            
            const sustElement = document.getElementById('sustitucion_linea1');
            const p_text = P.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            const i_val = i_conv.toFixed(6);
            const n_val = n_conv.toFixed(2);

            sustElement.innerHTML = `$$ \\Large R_v = \\frac{\\text{${p_text}} \\cdot ${i_val}}{1 - (1 + ${i_val})^{-${n_val}}} $$`;
            
            MAFICalc.typesetMath([sustElement]);
            document.getElementById('sustitucion_linea2').textContent = `Rᵥ = ${formatter.format(Rv)}`;
            
            populateConversionsPage();
        }

        // --- POBLAR SECCIONES ADICIONALES ---
        function populateConversionsPage() {
            const { P, n_original, i_original, m_rv, m_n, m_i, n_conv, i_conv, Rv } = currentCalculations;
            if (!Rv) return;

            // Llenar datos de conversión de tasa
            document.getElementById('i-conv-display-orig').textContent = i_original;
            document.getElementById('period-conv-display-i-orig').textContent = periodicityMap[m_i];
            document.getElementById('freq-conv-display-i-orig').textContent = m_i;
            document.getElementById('i-conv-display-result').textContent = i_conv.toFixed(6);
            document.getElementById('period-conv-display-i-target').textContent = periodicityMap[m_rv];
            document.getElementById('freq-conv-display-i-target').textContent = m_rv;
            
            const rateSubstElement = document.getElementById('rate-substitution');
            const latexString = `$$ \\Large i_q = (1 + i)^{\\frac{m}{m_q}} - 1 = (1 + ${i_original})^{\\frac{${m_i}}{${m_rv}}} - 1 = ${i_conv.toFixed(6)} $$`;
            rateSubstElement.innerHTML = latexString;
            MAFICalc.typesetMath([rateSubstElement]);
            
            // Llenar datos de conversión de plazo
            document.getElementById('n-conv-display-orig').textContent = n_original;
            document.getElementById('period-conv-display-n-orig').textContent = periodicityMapPlural[m_n];
            document.getElementById('freq-conv-display-n-orig').textContent = m_n;
            document.getElementById('n-conv-display-result').textContent = n_conv.toFixed(2);
            document.getElementById('period-conv-display-n-target').textContent = periodicityMapPlural[m_rv];
            document.getElementById('freq-conv-display-n-target').textContent = m_rv;

            const periodSubstElement = document.getElementById('period-substitution');
            const n_original_text = periodicityMapPlural[m_n] || '';
            const n_target_text = periodicityMapPlural[m_rv] || '';
            const periodLatex = `$$ \\Large n = \\frac{${n_original} \\text{ ${n_original_text}}}{1} \\times \\frac{${m_rv} \\text{ ${n_target_text}}}{${m_n} \\text{ ${n_original_text}}} = \\frac{${n_original * m_rv}}{${m_n}} = ${n_conv.toFixed(2)} \\text{ ${n_target_text}} $$`;
            periodSubstElement.innerHTML = periodLatex;
            MAFICalc.typesetMath([periodSubstElement]);
        }

       function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            const { P, Rv, n_conv, i_conv, m_rv } = currentCalculations;

            // Update rate info display
            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (P > 0 && !isNaN(i_conv) && m_rv) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_rv].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!P || P <= 0) {
                tableBody.innerHTML = '<tr><td colspan="6">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }
            
            const n_int = Math.round(n_conv);
            let saldoInicial = P;
            const rows = [];
            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);

            for (let i = 1; i <= loopLimit; i++) {
                const interes = saldoInicial * i_conv;
                let amortizacion = Rv - interes;
                let rentaDeEstePeriodo = Rv;
                if (i === n_int && n_conv % 1 !== 0) {
                    rentaDeEstePeriodo = saldoInicial + interes;
                    amortizacion = saldoInicial;
                }
                const saldoFinal = saldoInicial - amortizacion;
                rows.push(`<tr><td>${i}</td><td>${formatter.format(saldoInicial)}</td><td>${formatter.format(interes)}</td><td>${formatter.format(rentaDeEstePeriodo)}</td><td>${formatter.format(amortizacion)}</td><td>${formatter.format(saldoFinal < 0.01 ? 0 : saldoFinal)}</td></tr>`);
                saldoInicial = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 6, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
        }
        
        // --- LIMPIEZA Y ESTADO INICIAL ---
        function limpiarFormulario(partial = false) {
            if(!partial){
                document.getElementById('p-input').value = '';
                document.getElementById('n-input').value = '';
                document.getElementById('i-input').value = '';
                document.getElementById('periodicity-rv').selectedIndex = 0;
                document.getElementById('periodicity-n').selectedIndex = 0;
                document.getElementById('periodicity-i').selectedIndex = 0;
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }

            document.getElementById('rv-result').textContent = '¿?';
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2'].forEach(id => {
                document.getElementById(id).textContent = '-';
            });
            ['rv', 'n', 'i'].forEach(type => {
                 document.getElementById(`freq-${type}`).textContent = '?';
            });
            currentCalculations = {};
            populateConversionsPage();
            const tableBody = document.getElementById('amortization-table-body'); if (tableBody) tableBody.innerHTML = '';
            if (!partial) {
                ['rv', 'n', 'i'].forEach(type => {
                    document.getElementById(`freq-${type}`).textContent = '?';
                });
            }
        }

        // --- INICIO ---
        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
