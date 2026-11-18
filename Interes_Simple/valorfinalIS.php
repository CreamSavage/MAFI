<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Interés Simple - Monto (M)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>INTERÉS SIMPLE</h1>
                <p>VALOR FINAL (F)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Monto (F) =</td><td class="result-field" colspan="3" id="m-result">¿?</td></tr>
                                <tr><td>Capital (P) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="c-input" placeholder="Valor Presente"></td></tr>
                                <tr>
                                    <td>Tasa (iₛ ) =</td>
                                    <td><input type="text" id="i-input" placeholder="Ej: 5%, 0.05 o 5/12" inputmode="decimal"></td>
                                    <td class="unit-cell">%/dec</td>
                                    <td>
                                        <select id="periodicity-i">
                                            <?php generar_opciones($opciones_periodicidad); ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Plazo (n) =</td>
                                    <td colspan="2"><input type="number" step="any" id="n-input" placeholder="Número de periodos"></td>
                                    <td>
                                        <select id="periodicity-n">
                                            <?php generar_opciones($opciones_periodicidad_plural); ?>
                                        </select>
                                    </td>
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
                                     <td>Tasa (iₛ) convertida =</td>
                                     <td id="i-converted">-</td>
                                     <td id="i-period-text">-</td>
                                 </tr>
                                 <tr>
                                     <td>Plazo equivalente (n) =</td>
                                     <td id="n-converted">-</td>
                                     <td id="n-period-text">-</td>
                                 </tr>
                             </tbody>
                         </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">\[ F = P\,(1 + n\,i_s) \]</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="sustitucion_linea2" class="output-final">-</h2>
                    </div>
                    
                    <div class="button-grid">
                        <button class="btn btn-limpiar" onclick="limpiarFormulario()">LIMPIAR</button>
                        <button class="btn btn-navegacion" onclick="showSection('conversions-section')">VER EXPLICACIÓN</button>
                        <button class="btn btn-navegacion" onclick="showSection('simulation-section')">CUADRO SIMULACIÓN</button>
                    </div>
                    <div class="button-grid button-grid-single">
                        <a href="../Simuladores/simulador_is.php" class="btn btn-secondary">REGRESAR</a>
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
                <p class="formula-content">\( i_e = i\left(\frac{p}{m}\right) \)</p>
                <p class="substitution-text" id="rate-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Desglose de Fórmula</h3>
                <ul class="procedure-list">
                    <li id="breakdown-step1">Paso 1: -</li>
                    <li id="breakdown-step2">Paso 2: -</li>
                </ul>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
            </div>
        </div>

        <div id="table-section">
            <div class="header-box">
                <h1>CUADRO DE CAPITALIZACIÓN</h1>
            </div>
            <div id="table-container" class="calc-table-scroll">
                 <table class="data-table" id="capitalization-table">
                    <thead>
                        <tr>
                            <th>Periodo (n)</th>
                            <th>Capital</th>
                            <th>Interés</th>
                            <th>Monto</th>
                        </tr>
                    </thead>
                    <tbody id="table-body"></tbody>
                </table>
            </div>
            <div class="button-grid button-grid-single">
                 <button class="btn btn-navegacion" onclick="showSection('calculator-section')">REGRESAR AL CÁLCULO</button>
            </div>
        </div>

        <div id="simulation-section">
            <div class="header-box">
                <h1>CUADRO DE SIMULACIÓN</h1>
            </div>
            <div id="rate-info" class="rate-info-box">
                <strong>Tasa i = </strong> <span id="display-rate">-</span> % <span id="display-rate-period">-</span>
            </div>
            <div id="simulation-container" class="calc-table-scroll">
                <table class="data-table" id="simulation-table">
                    <thead>
                        <tr>
                            <th>Saldo Inicial</th>
                            <th>Interés</th>
                            <th>Saldo Final</th>
                        </tr>
                    </thead>
                    <tbody id="simulation-body"></tbody>
                </table>
            </div>
            <div class="button-grid button-grid-single">
                 <button class="btn btn-navegacion" onclick="showSection('calculator-section')">REGRESAR AL CÁLCULO</button>
            </div>
        </div>
    </div>
<?php
$inlineJs = <<<'JS'
const formatter = MAFICalc.currencyFormatter;
        const periodicityText = MAFICalc.PERIODICITY_SINGULAR;
        const periodicityTextPlural = MAFICalc.PERIODICITY_UNITS;
        let currentCalculations = {};

        function setupEventListeners() {
            document.getElementById('btn-calculate').addEventListener('click', calculate);
        }

        
        function showSection(sectionId) {
            MAFICalc.showSection(sectionId, {
                'conversions-section': populateConversionsPage,
                'table-section': generateSimpleInterestTable,
                'simulation-section': generateSimulationTable
            });
        }


        function calculate() {
            const C = MAFICalc.parseFormattedNumber(document.getElementById('c-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            
            // Correction: Use a different name for the rate variable to avoid redeclaration.
            const i_rate = MAFICalc.readRateFromInput('i-input') || 0;

            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!C || !i_rate || !n_original || isNaN(m_i) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const i_conv = i_rate * (m_i / m_n);
            const M = C * (1 + i_conv * n_original);
            
            currentCalculations = { C, i_original: i_rate, n_original, m_i, m_n, i_conv, M };

            document.getElementById('m-result').textContent = formatter.format(M);
            document.getElementById('i-converted').textContent = (i_conv * 100).toFixed(4) + '%';
            document.getElementById('i-period-text').textContent = periodicityText[m_n];
            document.getElementById('n-converted').textContent = MAFICalc.formatPeriodResult(n_original);
            document.getElementById('n-period-text').textContent = periodicityTextPlural[m_n] || periodicityText[m_n];

            document.getElementById('sustitucion_linea1').textContent = `F = ${formatter.format(C)} * (1 + ${i_conv} * ${n_original})`;
            document.getElementById('sustitucion_linea2').textContent = formatter.format(M);
            populateConversionsPage();
            // updateDiagram(n_original); // Diagram logic can be added here if needed
            // updateRateDiagram(i_conv, m_n); // Diagram logic can be added here if needed
        }
        
        function generateSimpleInterestTable() {
            const { C, n_original, i_conv } = currentCalculations;
            const tableBody = document.getElementById('table-body');
            const rows = [];

            if (!C || !i_conv || !n_original) { tableBody.innerHTML = ''; return; }

            const n_int = Math.round(n_original);
            const interesPorPeriodo = C * i_conv;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                const montoAcumulado = C + (interesPorPeriodo * t);
                const rowHTML = `
                    <tr>
                        <td>${t}</td>
                        <td>${formatter.format(C)}</td>
                        <td>${formatter.format(interesPorPeriodo)}</td>
                        <td>${formatter.format(montoAcumulado)}</td>
                    </tr>
                `;
                rows.push(rowHTML);
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 4, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
        }

        function generateSimulationTable() {
            const { C, n_original, i_conv, m_n } = currentCalculations;
            const simulationBody = document.getElementById('simulation-body');
            const rows = [];

            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (C && !isNaN(i_conv) && m_n) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(2);
                    displayRatePeriodEl.textContent = periodicityText[m_n].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!C || !i_conv || !n_original) {
                simulationBody.innerHTML = '<tr><td colspan="3">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }

            const n_int = Math.round(n_original);
            const interesPorPeriodo = C * i_conv;
            let saldoInicial = C;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                const interes = interesPorPeriodo;
                const saldoFinal = saldoInicial + interes;
                const rowHTML = `
                    <tr>
                        <td>${formatter.format(saldoInicial)}</td>
                        <td>${formatter.format(interes)}</td>
                        <td>${formatter.format(saldoFinal)}</td>
                    </tr>
                `;
                rows.push(rowHTML);
                saldoInicial = saldoFinal;
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 3, maxRows);
            if (limitNotice) rows.push(limitNotice);
            simulationBody.innerHTML = rows.join('');
        }
        
        function populateConversionsPage(){
             const { i_original, m_i, m_n, i_conv, C, n_original, M } = currentCalculations;
            if(!i_original || !C){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-step2').textContent = 'Paso 2: -';
                return;
            }

            document.getElementById('rate-substitution-c').textContent = `iₑ = ${i_original.toFixed(4)} * (${m_i} / ${m_n}) = ${i_conv.toFixed(4)}`;

            const step1_result = i_conv * n_original;
            const step2_result = C * (1 + step1_result);
            document.getElementById('breakdown-step1').textContent = `1 + (${i_conv.toFixed(4)} * ${n_original}) = ${1 + step1_result}`;
            document.getElementById('breakdown-step2').textContent = `${formatter.format(C)} * ${1 + step1_result} = ${formatter.format(step2_result)}`;
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['c-input', 'i-input', 'n-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-i').value = "";
                document.getElementById('periodicity-n').value = "";
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            document.getElementById('m-result').textContent = '¿?';
            document.getElementById('i-converted').textContent = '-';
            document.getElementById('i-period-text').textContent = '-';
            document.getElementById('n-converted').textContent = '-';
            document.getElementById('n-period-text').textContent = '-';
            document.getElementById('sustitucion_linea1').textContent = '-';
            document.getElementById('sustitucion_linea2').textContent = '-';
            currentCalculations = {};
            document.getElementById('table-body').innerHTML = '';
            document.getElementById('simulation-body').innerHTML = '';
        }
        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
