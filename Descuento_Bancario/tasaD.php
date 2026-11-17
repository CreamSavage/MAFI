<?php
require_once '../Login/auth.php';
require_once '../includes/layout.php';
require_once '../includes/calc_helpers.php';

mafi_page_start('Descuento Bancario - Tasa (d)', [
    'mathjax' => true,
    'calcJs' => true,
]);
?>
    <div class="main-container calc-shell">
        <div id="calculator-section">
            <div class="header-box">
                <h1>DESCUENTO BANCARIO</h1>
                <p>TASA DE DESCUENTO (d)</p>
            </div>
            <div class="main-grid">
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Datos de Entrada</h3>
                        <table class="data-table">
                            <tbody>
                                <tr><td>Valor Futuro (F) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="m-input" placeholder="Valor Futuro o Nominal"></td></tr>
                                <tr><td>Valor Presente (P) =</td><td colspan="3"><input type="text" inputmode="decimal" data-format-number="true" id="c-input" placeholder="Valor Presente o Líquido"></td></tr>
                                <tr><td>Descuento (D) =</td><td class="result-field" colspan="3" id="d-calc-result">¿?</td></tr>
                                <tr>
                                    <td>Tasa de Descuento (d) =</td>
                                    <td class="result-field" id="d-result">¿?</td>
                                    <td class="unit-cell">%</td>
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
                                     <td>Tasa Base (calculada) =</td>
                                     <td id="d-base">-</td>
                                     <td id="d-base-period-text">-</td>
                                 </tr>
                             </tbody>
                         </table>
                    </div>
                </div>
                <div>
                    <div class="data-card">
                        <h3 class="card-title">Fórmula</h3>
                        <p class="formula-content formula-main">\[ d = \frac{1-\left(\frac{P}{F}\right)}{n} \]</p>
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
                <h3 class="card-title">1. Desglose de Fórmula (Tasa Base)</h3>
                <ul class="procedure-list">
                    <li id="breakdown-step1">Paso 1: -</li>
                    <li id="breakdown-step2">Paso 2: -</li>
                    <li id="breakdown-step3">Paso 3: -</li>
                </ul>
            </div>
             <div class="data-card">
                <h3 class="card-title">2. Conversión de Tasa (Final)</h3>
                <p class="formula-content">\[ d_e = d_{base}\left(\frac{p}{m}\right) \]</p>
                <p class="substitution-text" id="rate-substitution-c">-</p>
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
            const n_original = MAFICalc.parseFormattedNumber(document.getElementById('n-input').value) || 0;
            
            const m_d_target = parseFloat(document.getElementById('periodicity-d').value);
            const m_n = parseFloat(document.getElementById('periodicity-n').value);

            if (!M || !C || !n_original || isNaN(m_d_target) || isNaN(m_n) || M < C || C === 0 || n_original === 0) {
                limpiarFormulario(true);
                return;
            }

            const D = M - C;

            const d_base = (1 - (C / M)) / n_original;
            
            const d_final = d_base * (m_n / m_d_target);
            
            currentCalculations = { C, M, D, n_original, m_n, d_base, m_d_target, d_final };

            document.getElementById('d-result').textContent = (d_final * 100).toFixed(4);
            document.getElementById('d-calc-result').textContent = formatter.format(D);
            
            document.getElementById('d-base').textContent = (d_base * 100).toFixed(4) + '%';
            document.getElementById('d-base-period-text').textContent = periodicityText[m_n];

            document.getElementById('sustitucion_linea1').textContent = `d = (1 - (${formatter.format(C)} / ${formatter.format(M)})) / ${n_original}`;
            document.getElementById('sustitucion_linea2').textContent = `d ≈ ${(d_final * 100).toFixed(4)}% ${periodicityText[m_d_target]}`;
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
            const { M, C, n_original, m_d_target, m_n, d_base, d_final } = currentCalculations;
            if(!M || !C || !n_original || isNaN(d_base)){
                document.getElementById('rate-substitution-c').textContent = '-';
                document.getElementById('breakdown-step1').textContent = 'Paso 1: -';
                document.getElementById('breakdown-step2').textContent = 'Paso 2: -';
                document.getElementById('breakdown-step3').textContent = 'Paso 3: -';
                return;
            }
            
            const step1_result = C / M;
            const step2_result = 1 - step1_result;
            const step3_result = (n_original !== 0) ? step2_result / n_original : NaN;

            document.getElementById('breakdown-step1').textContent = `C / M = ${formatter.format(C)} / ${formatter.format(M)} = ${step1_result.toFixed(6)}`;
            document.getElementById('breakdown-step2').textContent = `1 - (...) = 1 - ${step1_result.toFixed(6)} = ${step2_result.toFixed(6)}`;
            document.getElementById('breakdown-step3').textContent = `(...) / n = ${step2_result.toFixed(6)} / ${n_original} = ${step3_result.toFixed(6)}`;
            
            document.getElementById('rate-substitution-c').textContent = `dₑ = ${d_base.toFixed(6)} * (${m_n} / ${m_d_target}) = ${d_final.toFixed(6)}`;
        }

        function limpiarFormulario(partial = false) {
            if (!partial) {
                ['m-input', 'c-input', 'n-input'].forEach(id => document.getElementById(id).value = '');
                document.getElementById('periodicity-d').value = "";
                document.getElementById('periodicity-n').value = "";
            }
            document.getElementById('d-result').textContent = '¿?';
            document.getElementById('d-calc-result').textContent = '¿?';
            document.getElementById('d-base').textContent = '-';
            document.getElementById('d-base-period-text').textContent = '-';
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
