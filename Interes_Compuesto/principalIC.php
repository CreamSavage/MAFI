<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Interés Compuesto - Capital (C)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>INTERÉS COMPUESTO</h1>
                <p>PRINCIPAL O CAPITAL (P)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Monto (F) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="m-input" placeholder="Valor Futuro"></td></tr>
                                <tr><td>Capital (P) =</td><td class="result-field" colspan="3" id="c-result">¿?</td></tr>
                                <tr>
                                    <td>Tasa (i) =</td>
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
                                     <td>Tasa (i) convertida =</td>
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
                        <p class="formula-content formula-main">\[ P = \frac{F}{(1+i)^n} \]</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="sustitucion_linea2" class="output-final">-</h2>
                    </div>
                    
                    <div class="button-grid">
                        <button class="btn btn-limpiar" onclick="limpiarFormulario()">LIMPIAR</button>
                        <button class="btn btn-navegacion" onclick="showSection(\'conversions-section\')">VER EXPLICACIÓN</button>
                        <button class="btn btn-navegacion" onclick="showSection(\'simulation-section\')">CUADRO SIMULACIÓN</button>
                    </div>
                    <div class="button-grid button-grid-single">
                        <a href="../Simuladores/simulador_ic.php" class="btn btn-secondary">REGRESAR</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="conversions-section">
            <div class="header-box">
                <h1>EXPLICACIÓN DE CÁLCULOS</h1>
            </div>
            <div class="data-card">
                <h3 class="card-title">1. Conversión de Tasa (Equivalente)</h3>
                <p class="formula-content">\[ i_e = (1+i)^{\left(\frac{p}{m}\right)} - 1 \]</p>
                <p class="substitution-text" id="rate-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Desglose de Fórmula para Capital (C)</h3>
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
                            <th>Capital Inicial</th>
                            <th>Interés Ganado</th>
                            <th>Monto Final</th>
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
                'table-section': generateCompoundInterestTable,
                'simulation-section': generateSimulationTable
            });
        }


        function calculate() {
            const M = MAFICalc.parseFormattedNumber(document.getElementById('m-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            
            // Correction: Use a different name for the rate variable to avoid redeclaration.
            const i_rate = MAFICalc.readRateFromInput('i-input') || 0;

            const m_i = parseFloat(document.getElementById('periodicity-i').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!M || !i_rate || !n_original || isNaN(m_i) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const i_conv = Math.pow(1 + i_rate, m_i / m_n) - 1;
            const C = M / Math.pow(1 + i_conv, n_original);
            
            currentCalculations = { C, M, i_original: i_rate, n_original, m_i, m_n, i_conv };

            document.getElementById('c-result').textContent = formatter.format(C);
            document.getElementById('i-converted').textContent = (i_conv * 100).toFixed(4) + '%';
            document.getElementById('i-period-text').textContent = periodicityText[m_n];
            document.getElementById('n-converted').textContent = MAFICalc.formatPeriodResult(n_original);
            document.getElementById('n-period-text').textContent = periodicityTextPlural[m_n] || periodicityText[m_n];

            document.getElementById('sustitucion_linea1').textContent = `P = ${formatter.format(M)} / (1 + ${i_conv.toFixed(6)})^${n_original}`;
            document.getElementById('sustitucion_linea2').textContent = formatter.format(C);
            populateConversionsPage();
            updateDiagram(n_original);
        }

        function updateDiagram(n) {
            const container = document.getElementById('diagram-container');
            if (!container) return;
            container.innerHTML = '';
            if (isNaN(n) || n <= 0) return;
            const n_int = Math.round(n);
             if (n_int <= 5) {
                let boxes = '<div class="diagram-box">0</div>';
                for (let i = 1; i <= n_int; i++) boxes += `<div class="diagram-box">${i}</div>`;
                container.innerHTML = boxes;
            } else {
                container.innerHTML = `<div class="diagram-box">0</div><div class="diagram-box">1</div><div class="diagram-ellipsis">...</div><div class="diagram-box">${n_int}</div>`;
            }
        }
        
        function populateConversionsPage(){
            const { C, M, i_original, n_original, m_i, m_n, i_conv } = currentCalculations;
            if(!M || !i_original || !n_original || isNaN(C)){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-step2').textContent = 'Paso 2: -';
                document.getElementById('breakdown-step3').textContent = 'Paso 3: -';
                return;
            }

            document.getElementById('rate-substitution-c').textContent = `iₑ = (1 + ${i_original.toFixed(4)})^(${m_i}/${m_n}) - 1 = ${i_conv.toFixed(6)}`;

            const step1_result = 1 + i_conv;
            const step2_result = Math.pow(step1_result, n_original);
            const step3_result = M / step2_result;

            document.getElementById('breakdown-step1').textContent = `1 + i = 1 + ${i_conv.toFixed(6)} = ${step1_result.toFixed(6)}`;
            document.getElementById('breakdown-step2').textContent = `(...) ^ n = ${step1_result.toFixed(6)} ^ ${n_original} = ${step2_result.toFixed(6)}`;
            document.getElementById('breakdown-step3').textContent = `M / (...) = ${formatter.format(M)} / ${step2_result.toFixed(6)} = ${formatter.format(C)}`;
        }
        
        function generateCompoundInterestTable() {
            const { C, n_original, i_conv } = currentCalculations;
            const tableBody = document.getElementById('table-body');
            const rows = [];

            if (!C || !i_conv || !n_original) { tableBody.innerHTML = ''; return; }

            const n_int = Math.round(n_original);
            let capitalInicial = C;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                const interesGanado = capitalInicial * i_conv;
                const montoFinal = capitalInicial + interesGanado;
                
                const rowHTML = `
                    <tr>
                        <td>${t}</td>
                        <td>${formatter.format(capitalInicial)}</td>
                        <td>${formatter.format(interesGanado)}</td>
                        <td>${formatter.format(montoFinal)}</td>
                    </tr>
                `;
                rows.push(rowHTML);
                capitalInicial = montoFinal; 
            }
            const limitNotice = MAFICalc.tableLimitNoticeRow(n_int, 4, maxRows);
            if (limitNotice) rows.push(limitNotice);
            tableBody.innerHTML = rows.join('');
        }

        function generateSimulationTable() {
            const { C, n_original, i_conv } = currentCalculations;
            const simulationBody = document.getElementById('simulation-body');
            const rows = [];

            if (!C || !i_conv || !n_original) { simulationBody.innerHTML = ''; return; }

            const n_int = Math.round(n_original);
            let saldoInicial = C;

            const maxRows = MAFICalc.MAX_TABLE_ROWS;
            const loopLimit = Math.min(n_int, maxRows);
            for (let t = 1; t <= loopLimit; t++) {
                const interes = saldoInicial * i_conv;
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

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['m-input', 'i-input', 'n-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-i').value = "";
                document.getElementById('periodicity-n').value = "";
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('i-input'));
            }
            document.getElementById('c-result').textContent = '¿?';
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
