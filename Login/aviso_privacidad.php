<?php
require_once __DIR__ . '/../includes/bootstrap.php';
require_once __DIR__ . '/../includes/layout.php';

mafi_page_start('Aviso de Privacidad - MAFI', [
    'showHeader' => false,
    'bodyClass'  => 'mafi-auth-body',
]);
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="content-card">
                <div class="header-box">
                    <h1>Aviso de Privacidad del Sistema MAFI</h1>
                    <p>Última actualización: 29 de agosto de 2025</p>
                </div>

                <div class="definition-block">
                    <h3>1. Datos personales que se recaban</h3>
                    <p>Para el funcionamiento del sistema, se podrán recabar y tratar los siguientes datos:</p>
                    <ul>
                        <li><strong>Datos de identificación:</strong> nombre completo, matrícula o número de empleado, y correo institucional.</li>
                        <li><strong>Datos de acceso:</strong> usuario, contraseña y rol asignado (alumno, profesor o administrador).</li>
                        <li><strong>Datos de uso académico:</strong> registros de acceso, avances en simulaciones y resultados generados dentro del sistema.</li>
                    </ul>
                    <p class="mb-0">No se solicitarán datos sensibles (como estado de salud, ideología política, religión o situación financiera personal).</p>
                </div>

                <div class="definition-block">
                    <h3>2. Finalidades del tratamiento de los datos</h3>
                    <p>Los datos personales serán utilizados para las siguientes finalidades:</p>
                    <ul>
                        <li>Permitir el acceso al sistema mediante autenticación de usuario.</li>
                        <li>Administrar roles y privilegios de acceso.</li>
                        <li>Realizar simulaciones y cálculos de matemáticas financieras con fines exclusivamente académicos y didácticos.</li>
                        <li>Generar reportes de uso y desempeño académico.</li>
                        <li>Dar seguimiento a incidencias y problemas técnicos del sistema.</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3>3. Transferencia de datos</h3>
                    <p class="mb-0">Los datos personales no serán compartidos con terceros.</p>
                </div>

                <div class="definition-block">
                    <h3>4. Medidas de seguridad</h3>
                    <p>El sistema MAFI implementa medidas técnicas y administrativas para garantizar la confidencialidad, integridad y disponibilidad de la información, incluyendo:</p>
                    <ul>
                        <li>Seguridad de acceso mediante credenciales únicas.</li>
                        <li>Restricción de acceso por roles.</li>
                        <li>Uso de servidores proporcionados y autorizados por la FES Cuautitlán.</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3>5. Derechos ARCO</h3>
                    <p>Usted tiene derecho a <strong>A</strong>cceder, <strong>R</strong>ectificar, <strong>C</strong>ancelar u <strong>O</strong>ponerse al uso de sus datos personales (derechos ARCO). Para ejercer estos derechos puede enviar una solicitud con los siguientes datos:</p>
                    <ul>
                        <li>Nombre completo y matrícula/identificación.</li>
                        <li>Descripción clara del derecho que desea ejercer.</li>
                        <li>Medio para recibir notificaciones sobre su solicitud.</li>
                    </ul>
                </div>

                <div class="definition-block">
                    <h3>6. Cambios al aviso de privacidad</h3>
                    <p class="mb-0">Cualquier modificación a este aviso será notificada a través del propio sistema MAFI.</p>
                </div>

                <div class="text-center mt-4">
                    <a href="javascript:history.back()" class="btn btn-unam-primary px-4 py-2">
                        <i class="fas fa-arrow-left me-2"></i>Regresar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
mafi_page_end();
