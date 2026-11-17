<?php
/**
 * Helper centralizado para envío de correos electrónicos con PHPMailer.
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('mafi_enviar_correo')) {
    /**
     * Envía un correo HTML usando la configuración SMTP institucional de Sistema MAFI.
     *
     * @param string|null $toEmail Destinatario principal (opcional si se usa $bccList)
     * @param string      $toName  Nombre del destinatario principal
     * @param string      $subject Asunto en texto plano
     * @param string      $htmlBody Cuerpo en HTML
     * @param array       $options Opciones: fromName, bcc => [['email'=>..., 'name'=>...]], error => reference
     */
    function mafi_enviar_correo(?string $toEmail, string $toName, string $subject, string $htmlBody, array $options = [], ?string &$errorMsg = null): bool
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'sistemamafi@gmail.com';
            $mail->Password   = 'cilyautnzosawmoo';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
            $mail->CharSet    = 'UTF-8';

            $fromName = $options['fromName'] ?? 'Sistema MAFI';
            $mail->setFrom('sistemamafi@gmail.com', $fromName);

            if ($toEmail !== null && $toEmail !== '') {
                $mail->addAddress($toEmail, $toName);
            }

            if (!empty($options['bcc']) && is_array($options['bcc'])) {
                foreach ($options['bcc'] as $dest) {
                    if (!empty($dest['email'])) {
                        $mail->addBCC($dest['email'], $dest['name'] ?? '');
                    }
                }
            }

            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $htmlBody;

            $mail->send();
            return true;
        } catch (Exception $e) {
            $errorMsg = $mail->ErrorInfo;
            return false;
        }
    }
}
