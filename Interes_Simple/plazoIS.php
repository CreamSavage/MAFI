<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Interés Simple - Plazo (n)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>INTERÉS SIMPLE</h1>
                <p>PLAZO (n)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Monto (F) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="m-input" placeholder="Valor Futuro"></td></tr>
                                <tr><td>Capital (P) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="c-input" placeholder="Valor Presente"></td></tr>
                                <tr>
                                    <td>Tasa (iₛ) =</td>
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
                                    <td class="result-field" colspan="2" id="n-result">¿?</td>
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
                        <p class="formula-content formula-main">\[ n = \frac{\frac{F}{P} - 1}{i_s} \]</p>
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
                <p class="formula-content">iₑ = i * (p / m)</p>
                <p class="substitution-text" id="rate-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Desglose de Fórmula</h3>
                <ul class="procedure-list">
                    <li id="breakdown-step1">Paso 1: -</li>
                    <li id="breakdown-step2">Paso 2: -</li>
                    <li id="breakdown-step3">Paso 3: -</li>
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
            const M = MAFICalc.parseFormattedNumber(document.getElementById('m-input').value) || 0;
            const C = MAFICalc.parseFormattedNumber(document.getElementById('c-input').value) || 0;
            const i_original = MAFICalc.readRateFromInput('i-input') || 0;

            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            const m_n_target = parseFloat(document.getElementById('periodicity-n').value);

            if (!M || !C || !i_original || isNaN(m_i) || isNaN(m_n_target)) {
                limpiarFormulario(true);
                return;
            }

            // 1. Convertir la tasa a la periodicidad del plazo deseado
            const i_conv = i_original * (m_i / m_n_target);
            
            // 2. Calcular n usando la tasa convertida
            let n_final = NaN;
            if (i_conv > 0 && C > 0 && M > C) {
                n_final = ((M / C) - 1) / i_conv;
            }
            
            currentCalculations = { C, M, i_original, n_final, m_i, m_n_target, i_conv };

            document.getElementById('n-result').textContent = isNaN(n_final) ? "Error" : Math.ceil(n_final);
            document.getElementById('i-converted').textContent = (i_conv * 100).toFixed(4) + '%';
            document.getElementById('i-period-text').textContent = periodicityText[m_n_target];
            document.getElementById('n-converted').textContent = isNaN(n_final) ? '-' : MAFICalc.formatPeriodResult(n_final);
            document.getElementById('n-period-text').textContent = periodicityTextPlural[m_n_target] || periodicityText[m_n_target];

            document.getElementById('sustitucion_linea1').textContent = `n = ((${formatter.format(M)} / ${formatter.format(C)}) - 1) / ${i_conv}`;
            document.getElementById('sustitucion_linea2').textContent = isNaN(n_final) ? "Error" : `n = ${Math.ceil(n_final)} ${periodicityTextPlural[m_n_target].toLowerCase()}`;
            updateDiagram(n_final);
            populateConversionsPage();
        }

        function updateDiagram(n) {
            const container = document.getElementById('diagram-container');
            if (!container) return;
            container.innerHTML = '';
            if (isNaN(n) || n <= 0) return;
            container.innerHTML = `<div class="diagram-box">0</div><div class="diagram-ellipsis">...</div><div class="diagram-box">${Math.ceil(n)}</div>`;
        }

        function generateSimpleInterestTable() {
            const { C, n_final, i_conv } = currentCalculations;
            const tableBody = document.getElementById('table-body');
            const rows = [];

            if (!C || !i_conv || !n_final || isNaN(n_final)) { tableBody.innerHTML = ''; return; }

            const n_int = Math.ceil(n_final);
            const interesPorPeriodo = C * i_conv;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                let current_n = (t === n_int && n_final % 1 !== 0) ? n_final : t;
                const montoAcumulado = C + (interesPorPeriodo * current_n);
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
            const { C, n_final, i_conv, m_n_target } = currentCalculations;
            const simulationBody = document.getElementById('simulation-body');
            const rows = [];

            const displayRateEl = document.getElementById('display-rate');
            const displayRatePeriodEl = document.getElementById('display-rate-period');
            if (displayRateEl && displayRatePeriodEl) {
                if (C && !isNaN(i_conv) && m_n_target) {
                    displayRateEl.textContent = (i_conv * 100).toFixed(2);
                    displayRatePeriodEl.textContent = periodicityText[m_n_target].toLowerCase();
                } else {
                    displayRateEl.textContent = '-';
                    displayRatePeriodEl.textContent = '-';
                }
            }

            if (!C || !i_conv || !n_final || isNaN(n_final)) {
                simulationBody.innerHTML = '<tr><td colspan="3">Ingrese datos válidos para generar la tabla</td></tr>';
                return;
            }


            const n_int = Math.ceil(n_final);
            const interesPorPeriodo = C * i_conv;
            let saldoInicial = C;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                let current_n = (t === n_int && n_final % 1 !== 0) ? n_final : t;
                const interes = interesPorPeriodo * current_n;
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
            const { M, C, i_original, m_i, m_n_target, i_conv, n_final } = currentCalculations;
            if(!i_original || !C || !M){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-step2').textContent = 'Paso 2: -';
                document.getElementById('breakdown-step3').textContent = 'Paso 3: -';
                return;
            }

            document.getElementById('rate-substitution-c').textContent = `iₑ = ${i_original.toFixed(4)} * (${m_i} / ${m_n_target}) = ${i_conv.toFixed(4)}`;
            
            const step1_result = M / C;
            const step2_result = step1_result - 1;
            const step3_result = (i_conv !== 0) ? step2_result / i_conv : NaN;

            document.getElementById('breakdown-step1').textContent = `M / C = ${formatter.format(M)} / ${formatter.format(C)} = ${step1_result.toFixed(4)}`;
            document.getElementById('breakdown-step2').textContent = `${step1_result.toFixed(4)} - 1 = ${step2_result.toFixed(4)}`;
            document.getElementById('breakdown-step3').textContent = `${step2_result.toFixed(4)} / ${i_conv.toFixed(4)} = ${isNaN(step3_result) ? 'Error' : Math.ceil(step3_result)}`;
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['m-input', 'c-input', 'i-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-i').value = "";
                document.getElementById('periodicity-n').value = "";
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            document.getElementById('n-result').textContent = '¿?';
            document.getElementById('i-converted').textContent = '-';
            document.getElementById('i-period-text').textContent = '-';
            document.getElementById('n-converted').textContent = '-';
            document.getElementById('n-period-text').textContent = '-';
            document.getElementById('sustitucion_linea1').textContent = '-';
            document.getElementById('sustitucion_linea2').textContent = '-';
            currentCalculations = {};
            document.getElementById('table-body').innerHTML = '';
            document.getElementById('simulation-body').innerHTML = '';
            updateDiagram(0);
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
