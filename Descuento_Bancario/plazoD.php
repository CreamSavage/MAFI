<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Descuento Bancario - Plazo (n)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>DESCUENTO BANCARIO</h1>
                <p>PLAZO (n)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Valor Futuro (F) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="m-input" placeholder="Valor Futuro o Nominal"></td></tr>
                                <tr><td>Valor Presente (P) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="c-input" placeholder="Valor Presente o Líquido"></td></tr>
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
                                     <td>Tasa (d) convertida =</td>
                                     <td id="d-converted">-</td>
                                     <td id="d-period-text">-</td>
                                 </tr>
                             </tbody>
                         </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">\[ n = \frac{1-\left(\frac{P}{F}\right)}{d} \]</p>
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
                <h3 class="card-title">2. Desglose de Fórmula para Plazo (n)</h3>
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
            const M = MAFICalc.parseFormattedNumber(document.getElementById('m-input').value) || 0;
            const C = MAFICalc.parseFormattedNumber(document.getElementById('c-input').value) || 0;
            
            const d_original = MAFICalc.readRateFromInput('d-input') || 0;

            const m_d = parseFloat(document.getElementById('periodicity-d').value);
            const m_n_target = parseFloat(document.getElementById('periodicity-n').value);

            if (!M || !C || !d_original || isNaN(m_d) || isNaN(m_n_target) || M < C) {
                limpiarFormulario(true);
                return;
            }

            const d_conv = d_original * (m_d / m_n_target);
            
            let n_final = NaN;
            if (d_conv > 0 && M > 0) {
                n_final = (1 - (C / M)) / d_conv;
            }
            
            currentCalculations = { C, M, d_original, n_final, m_d, m_n_target, d_conv };

            document.getElementById('n-result').textContent = isNaN(n_final) ? "Error" : n_final.toFixed(4);
            document.getElementById('d-converted').textContent = (d_conv * 100).toFixed(4) + '%';
            document.getElementById('d-period-text').textContent = periodicityText[m_n_target];

            document.getElementById('sustitucion_linea1').textContent = `n = (1 - (${formatter.format(C)} / ${formatter.format(M)})) / ${d_conv.toFixed(6)}`;
            document.getElementById('sustitucion_linea2').textContent = isNaN(n_final) ? "Error" : `n ≈ ${n_final.toFixed(4)} ${periodicityTextPlural[m_n_target].toLowerCase()}`;
            updateDiagram(n_final);
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
            const { M, C, d_original, n_final, m_d, m_n_target, d_conv } = currentCalculations;
            if(!M || !C || !d_original || isNaN(n_final)){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-step2').textContent = 'Paso 2: -';
                document.getElementById('breakdown-step3').textContent = 'Paso 3: -';
                return;
            }

            document.getElementById('rate-substitution-c').textContent = `dₑ = ${d_original.toFixed(4)} * (${m_d} / ${m_n_target}) = ${d_conv.toFixed(4)}`;

            const step1_result = C / M;
            const step2_result = 1 - step1_result;
            const step3_result = (d_conv > 0) ? step2_result / d_conv : NaN;
            
            document.getElementById('breakdown-step1').textContent = `C / M = ${formatter.format(C)} / ${formatter.format(M)} = ${step1_result.toFixed(6)}`;
            document.getElementById('breakdown-step2').textContent = `1 - (...) = 1 - ${step1_result.toFixed(6)} = ${step2_result.toFixed(6)}`;
            document.getElementById('breakdown-step3').textContent = `${step2_result.toFixed(6)} / ${d_conv.toFixed(6)} = ${step3_result.toFixed(4)}`;
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['m-input', 'c-input', 'd-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-d').value = "";
                document.getElementById('periodicity-n').value = "";
            
                if (typeof MAFICalc !== 'undefined') MAFICalc.updateRateHelper(document.getElementById('d-input'));
            }
            document.getElementById('n-result').textContent = '¿?';
            document.getElementById('d-converted').textContent = '-';
            document.getElementById('d-period-text').textContent = '-';
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
