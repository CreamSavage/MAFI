<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Descuento Bancario - Monto (M)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>DESCUENTO BANCARIO</h1>
                <p>MONTO (M)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Valor Futuro (F) =</td><td class="result-field" colspan="3" id="m-result">¿?</td></tr>
                                <tr><td>Valor Presente (P) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="c-input" placeholder="Valor Presente o Líquido"></td></tr>
                                <tr><td>Descuento (D) =</td><td class="result-field" colspan="3" id="d-result">¿?</td></tr>
                                <tr>
                                    <td>Tasa de Descuento (d) =</td>
                                    <td><input type="text" id="d-input" placeholder="Ej: 5%, 0.05 o 5/12" inputmode="decimal"></td>
                                    <td class="unit-cell">%/dec</td>
                                    <td>
                                        <select id="periodicity-d">
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
                                     <td>Tasa (d) convertida =</td>
                                     <td id="d-converted">-</td>
                                     <td id="d-period-text">-</td>
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
                        <h3 class="card-title">Fórmulas</h3>
                        <p class="formula-content formula-main">\[ F = \frac{P}{1-nd} \]</p>
                    </div>
                    <div class="data-card">
                        <h3 class="card-title">Sustitución y Resultado</h3>
                        <p class="substitution-text" id="sustitucion_linea1">-</p>
                        <h2 id="sustitucion_linea2" class="output-final">-</h2>
                    </div>
                    
                    <div class="button-grid button-grid-single">
                        <button class="btn btn-limpiar" onclick="limpiarFormulario()">LIMPIAR</button>
                        <button class="btn btn-navegacion" onclick="showSection(\'conversions-section\')">VER EXPLICACIÓN</button>
                    </div>
                    <div class="button-grid button-grid-single">
                        <a href="../Simuladores/simulador_db.php" class="btn btn-secondary">REGRESAR</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="conversions-section">
            <div class="header-box">
                <h1>EXPLICACIÓN DE CÁLCULOS</h1>
            </div>
            <div class="data-card">
                <h3 class="card-title">1. Conversión de Tasa de Descuento</h3>
                <p class="formula-content">\[ d_e = d\left(\frac{p}{m}\right) \]</p>
                <p class="substitution-text" id="rate-substitution-c">-</p>
            </div>
            <div class="data-card">
                <h3 class="card-title">2. Desglose de Fórmula para Monto (M)</h3>
                <ul class="procedure-list">
                    <li id="breakdown-m-step1">Paso 1: -</li>
                    <li id="breakdown-m-step2">Paso 2: -</li>
                    <li id="breakdown-m-step3">Paso 3: -</li>
                </ul>
            </div>
             <div class="data-card">
                <h3 class="card-title">3. Desglose de Fórmula para Descuento (D)</h3>
                <ul class="procedure-list">
                    <li id="breakdown-d-step1">Paso 1: -</li>
                </ul>
            </div>
            <div class="button-grid button-grid-single">
                <a href="#" class="btn btn-navegacion" onclick="showSection('calculator-section'); return false;">REGRESAR AL CÁLCULO</a>
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
                'conversions-section': populateConversionsPage
            });
        }


        function calculate() {
            const C = MAFICalc.parseFormattedNumber(document.getElementById('c-input').value) || 0;
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            
            const d_original = MAFICalc.readRateFromInput('d-input') || 0;

            const m_d = parseFloat(document.getElementById('periodicity-d').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!C || !d_original || !n_original || isNaN(m_d) || isNaN(m_n)) {
                limpiarFormulario(true);
                return;
            }

            const d_conv = d_original * (m_d / m_n);
            
            let M = 0;
            let D = 0;
            const denominator = 1 - d_conv * n_original;

            if (denominator > 0) {
                M = C / denominator;
                D = M - C;
            }
            
            currentCalculations = { C, M, D, d_original, n_original, m_d, m_n, d_conv };

            document.getElementById('m-result').textContent = (M > 0) ? formatter.format(M) : "Error";
            document.getElementById('d-result').textContent = (D > 0) ? formatter.format(D) : "---";
            document.getElementById('d-converted').textContent = (d_conv * 100).toFixed(4) + '%';
            document.getElementById('d-period-text').textContent = periodicityText[m_n];
            document.getElementById('n-converted').textContent = MAFICalc.formatPeriodResult(n_original);
            document.getElementById('n-period-text').textContent = periodicityTextPlural[m_n] || periodicityText[m_n];

            document.getElementById('sustitucion_linea1').textContent = `M = ${formatter.format(C)} / (1 - ${d_conv.toFixed(6)} * ${n_original})`;
            document.getElementById('sustitucion_linea2').textContent = (M > 0) ? formatter.format(M) : "El descuento es >= 100%";
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
            const { M, C, D, d_original, n_original, m_d, m_n, d_conv } = currentCalculations;
            if(!C || !d_original || !n_original || isNaN(M) || M <= 0){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-m-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-m-step2').textContent = 'Paso 2: -';
                document.getElementById('breakdown-m-step3').textContent = 'Paso 3: -';
                document.getElementById('breakdown-d-step1').textContent = 'Paso 1: -';
                return;
            }

            document.getElementById('rate-substitution-c').textContent = `dₑ = ${d_original.toFixed(4)} * (${m_d} / ${m_n}) = ${d_conv.toFixed(4)}`;

            const step_m1_result = d_conv * n_original;
            const step_m2_result = 1 - step_m1_result;
            const step_m3_result = M;

            document.getElementById('breakdown-m-step1').textContent = `d * n = ${d_conv.toFixed(6)} * ${n_original} = ${step_m1_result.toFixed(6)}`;
            document.getElementById('breakdown-m-step2').textContent = `1 - (...) = 1 - ${step_m1_result.toFixed(6)} = ${step_m2_result.toFixed(6)}`;
            document.getElementById('breakdown-m-step3').textContent = `C / (...) = ${formatter.format(C)} / ${step_m2_result.toFixed(6)} = ${formatter.format(M)}`;
            
            document.getElementById('breakdown-d-step1').textContent = `M - C = ${formatter.format(M)} - ${formatter.format(C)} = ${formatter.format(D)}`;
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['c-input', 'd-input', 'n-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-d').value = "";
                document.getElementById('periodicity-n').value = "";
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('d-input'));
            }
            document.getElementById('m-result').textContent = '¿?';
            document.getElementById('d-result').textContent = '¿?';
            document.getElementById('d-converted').textContent = '-';
            document.getElementById('d-period-text').textContent = '-';
            document.getElementById('n-converted').textContent = '-';
            document.getElementById('n-period-text').textContent = '-';
            document.getElementById('sustitucion_linea1').textContent = '-';
            document.getElementById('sustitucion_linea2').textContent = '-';
            currentCalculations = {};
            updateDiagram(0);
        }

        window.onload = function() {
            setupEventListeners();
            limpiarFormulario();
        };
    
JS;
mafi_page_end(['inlineJs' => $inlineJs]);
?>
