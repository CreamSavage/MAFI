<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Valor Presente con Renta Anticipada', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
             <div class="header-box">
                <h1>VALOR PRESENTE CON RENTA ANTICIPADA</h1>
                <p>AMORTIZACIÓN VARIABLE (P)</p>
            </div>
             <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>P =</td><td class="result-field" colspan="3" id="p-result">¿?</td></tr>
                                <tr><td>Rₐ =</td><td><input type="text" inputmode="numeric" data-format-number="true" id="ra-input" placeholder="Monto"></td>
                                    <td>
                                        <select id="periodicity-ra">
                                            <?php generar_opciones($opciones_periodicidad); ?>
                                        </select>
                                    </td>
                                    <td id="freq-ra">?</td>
                                </tr>
                                <tr><td>n =</td><td><input type="text" inputmode="numeric" data-format-number="true" id="n-input" placeholder="Plazo"></td>
                                    <td>
                                        <select id="periodicity-n">
                                            <?php generar_opciones($opciones_periodicidad_plural); ?>
                                        </select>
                                    </td>
                                    <td id="freq-n">?</td>
                                </tr>
                                <tr><td>i = j/m</td><td><input type="text" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12" inputmode="decimal"></td>
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
                        <p class="formula-content formula-main">$$P = \frac{R_A}{i}\left(1 + i - (1+i)^{-(n-1)}\right)$$</p>
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
                            <th>Plazo</th><th>Saldo Inicial</th><th>Pago Anticipado</th><th>Saldo Parcial</th><th>Interés</th><th>Amortización</th><th>Saldo Final</th>
                        </tr>
                        <tr>
                            <th>n</th><th>SI</th><th>Rₐ</th><th>SP = SI - Rₐ</th><th>I = SP * i</th><th>Am = Rₐ - I</th><th>SF = SI - Am</th>
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
            MAFICalc.bindPeriodicitySelectors(['periodicity-ra', 'periodicity-n', 'periodicity-i']);
        }

        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'amortization-section': generateAmortizationTable
            });
        }

        function updateCalculations() {
            MAFICalc.syncPeriodicityLabels(['ra', 'n', 'i']);

            const Ra = MAFICalc.parseFormattedNumber(document.getElementById('ra-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input') || 0;
            
            const m_ra = parseFloat(document.getElementById('periodicity-ra').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);
            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            
            if (!Ra || !n_original || !i_original || isNaN(m_ra) || isNaN(m_n) || isNaN(m_i)) {
                limpiarFormulario(true);
                return;
            }
            
            const n_conv = n_original * (m_ra / m_n);
            const i_conv = Math.pow(1 + i_original, m_i / m_ra) - 1;
            
            let P = 0;
            if (n_conv < 1) {
                P = 0;
            } else if (i_conv > 0) {
                const factor = (1 - Math.pow(1 + i_conv, -(n_conv - 1))) / i_conv;
                P = Ra * (1 + factor);
            } else {
                 P = Ra * n_conv;
            }
            
            currentCalculations = { Ra, n_original, i_original, m_ra, m_n, m_i, n_conv, i_conv, P };

            document.getElementById('p-result').textContent = formatter.format(P);
            document.getElementById('n-converted').textContent = n_conv.toFixed(2);
            document.getElementById('i-converted').textContent = i_conv.toFixed(6);
            document.getElementById('n-period-text').textContent = periodicityMapPlural[m_ra];
            document.getElementById('i-period-text').textContent = periodicityMap[m_ra];
            
            // Rellenar la sustitución con formato MathJax
            const sustElement = document.getElementById('sustitucion_linea1');
            const ra_text = Ra.toLocaleString('es-MX', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
            const i_val = i_conv.toFixed(6);
            const n_val = n_conv.toFixed(2);

            sustElement.innerHTML = `$$ \\Large P = \\frac{\\text{${ra_text}}}{${i_val}}\\left(1 + ${i_val} - (1 + ${i_val})^{-(${n_val}-1)}\\right) $$`;
            
            // Renderizar con MathJax
            MAFICalc.typesetMath([sustElement]);
            document.getElementById('sustitucion_linea2').textContent = `P = ${formatter.format(P)}`;
            
            updateDiagram(n_conv);
            populateConversionsPage();
        }
        
        function updateDiagram(n) {
            MAFICalc.renderPeriodDiagram(n, { start: 0 });
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['ra-input', 'n-input', 'i-input'].forEach(id => document.getElementById(id).value = '');
                ['periodicity-ra', 'periodicity-n', 'periodicity-i'].forEach(id => {
                    const select = document.getElementById(id);
                    if (select) select.selectedIndex = 0;
                });
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }

            document.getElementById('p-result').textContent = '¿?';
            ['n-converted', 'i-converted', 'n-period-text', 'i-period-text', 'sustitucion_linea1', 'sustitucion_linea2'].forEach(id => {
                document.getElementById(id).textContent = '-';
            });
            ['ra', 'n', 'i'].forEach(type => {
                 const select = document.getElementById(`periodicity-${type}`);
                if(select) document.getElementById(`freq-${type}`).textContent = select.value || '?';
            });

            currentCalculations = {};
            updateDiagram(0);
            populateConversionsPage();
            const tableBody = document.getElementById('amortization-table-body'); if (tableBody) tableBody.innerHTML = '';
        }

        function populateConversionsPage() {
            const { Ra, n_original, i_original, m_ra, m_n, m_i, n_conv, i_conv, P } = currentCalculations;
            if (!Ra || !n_original || !i_original || isNaN(P) || P <= 0) {
                 ['i-conv-display-orig', 'period-conv-display-i-orig', 'freq-conv-display-i-orig', 'i-conv-display-result', 'period-conv-display-i-target', 'freq-conv-display-i-target', 'rate-substitution', 'n-conv-display-orig', 'period-conv-display-n-orig', 'freq-conv-display-n-orig', 'n-conv-display-result', 'period-conv-display-n-target', 'freq-conv-display-n-target', 'period-substitution'].forEach(id => document.getElementById(id).textContent = '-');
                 return;
            }

            document.getElementById('i-conv-display-orig').textContent = i_original;
            document.getElementById('period-conv-display-i-orig').textContent = periodicityMap[m_i];
            document.getElementById('freq-conv-display-i-orig').textContent = m_i;
            document.getElementById('i-conv-display-result').textContent = i_conv.toFixed(5);
            document.getElementById('period-conv-display-i-target').textContent = periodicityMap[m_ra];
            document.getElementById('freq-conv-display-i-target').textContent = m_ra;
            
            // Fórmula de conversión de tasa con MathJax
            const rateEl = document.getElementById('rate-substitution');
            rateEl.innerHTML = `$$ \\Large i_q = (1 + i)^{\\frac{m}{m_q}} - 1 = (1 + ${i_original})^{\\frac{${m_i}}{${m_ra}}} - 1 = ${i_conv.toFixed(6)} $$`;
            MAFICalc.typesetMath([rateEl]);
            
            document.getElementById('n-conv-display-orig').textContent = n_original;
            document.getElementById('period-conv-display-n-orig').textContent = periodicityMapPlural[m_n];
            document.getElementById('freq-conv-display-n-orig').textContent = m_n;
            document.getElementById('n-conv-display-result').textContent = n_conv.toFixed(2);
            document.getElementById('period-conv-display-n-target').textContent = periodicityMapPlural[m_ra];
            document.getElementById('freq-conv-display-n-target').textContent = m_ra;
            
            // Fórmula de conversión de plazo con MathJax
            const periodEl = document.getElementById('period-substitution');
            periodEl.innerHTML = MAFICalc.buildPeriodConversionLatex(n_original, m_n, m_ra, n_conv);
            MAFICalc.typesetMath([periodEl]);
        }

        function generateAmortizationTable() {
            const tableBody = document.getElementById('amortization-table-body');
            const rows = [];
            const { Ra, n_conv, i_conv, P, m_ra } = currentCalculations;

            // Update rate info display
            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (!isNaN(i_conv) && m_ra && P > 0) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(4);
                    displayRatePeriodEl.textContent = periodicityMap[m_ra].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!P || P <= 0 || isNaN(Ra) || Ra <= 0) {
                tableBody.innerHTML = '<tr><td colspan="7">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }
            
            const n_int = Math.round(n_conv);
            let saldoInicial = P;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let i = 1; i <= loopLimit; i++) {
                let rentaDeEstePeriodo = Ra;
                let interes;
                let amortizacion;
                
                let balanceParaInteres = saldoInicial - rentaDeEstePeriodo;
                interes = (balanceParaInteres > 0) ? balanceParaInteres * i_conv : 0;
                amortizacion = rentaDeEstePeriodo - interes;

                if (i === n_int && saldoInicial > 0) {
                    amortizacion = saldoInicial;
                    interes = (saldoInicial - Ra > 0) ? (saldoInicial - Ra) * i_conv : 0;
                     if(interes < 0) interes = 0;
                    rentaDeEstePeriodo = amortizacion + interes;
                }
                
                let saldoFinal = saldoInicial - amortizacion;

                const rowHTML = `
                    <tr>
                        <td>${i}</td>
                        <td>${formatter.format(saldoInicial)}</td>
                        <td>${formatter.format(rentaDeEstePeriodo)}</td>
                        <td>${formatter.format(balanceParaInteres)}</td>
                        <td>${formatter.format(interes)}</td>
                        <td>${formatter.format(amortizacion)}</td>
                        <td>${formatter.format(saldoFinal < 0.01 ? 0 : saldoFinal)}</td>
                    </tr>`;
                rows.push(rowHTML);
                saldoInicial = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 7, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
            showSection('calculator-section');
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
