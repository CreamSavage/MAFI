<?php
/**
 * Helper centralizado para envío de correos electrónicos con PHPMailer.
 * Lee las credenciales SMTP desde variables de entorno o archivo local .env (ignorado por Git).
 */

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (!function_exists('mafi_env')) {
    function mafi_env(string $key, string $default = ''): string
    {
        static $dotEnv = null;

        $val = getenv($key);
        if ($val !== false && $val !== '') {
            return (string) $val;
        }
        if (isset($_ENV[$key]) && $_ENV[$key] !== '') {
            return (string) $_ENV[$key];
        }

        if ($dotEnv === null) {
            $dotEnv = [];
            $envFile = dirname(__DIR__) . '/.env';
            if (is_file($envFile) && is_readable($envFile)) {
                $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) ?: [];
                foreach ($lines as $line) {
                    $trimmed = trim($line);
                    if ($trimmed === '' || str_starts_with($trimmed, '#') || !str_contains($trimmed, '=')) {
                        continue;
                    }
                    [$k, $v] = explode('=', $trimmed, 2);
                    $k = trim($k);
                    $v = trim($v);
                    if (
                        (str_starts_with($v, '"') && str_ends_with($v, '"'))
                        || (str_starts_with($v, "'") && str_ends_with($v, "'"))
                    ) {
                        $v = substr($v, 1, -1);
                    }
                    $dotEnv[$k] = $v;
                }
            }
        }

        return isset($dotEnv[$key]) && $dotEnv[$key] !== '' ? $dotEnv[$key] : $default;
    }
}

if (!function_exists('mafi_enviar_correo')) {
    /**
     * Envía un correo HTML usando la configuración SMTP institucional de Sistema MAFI.
     *
     * @param string|null $toEmail  Destinatario principal (opcional si se usa $bccList)
     * @param string      $toName   Nombre del destinatario principal
     * @param string      $subject  Asunto en texto plano
     * @param string      $htmlBody Cuerpo en HTML
     * @param array       $options  Opciones: fromName, bcc => [['email'=>..., 'name'=>...]]
     */
    function mafi_enviar_correo(?string $toEmail, string $toName, string $subject, string $htmlBody, array $options = [], ?string &$errorMsg = null): bool
    {
        $smtpHost = mafi_env('MAFI_SMTP_HOST', 'smtp.gmail.com');
        $smtpPort = (int) mafi_env('MAFI_SMTP_PORT', '465');
        $smtpUser = mafi_env('MAFI_SMTP_USER', 'sistemamafi@gmail.com');
        $smtpPass = mafi_env('MAFI_SMTP_PASS', '');
        $smtpFrom = mafi_env('MAFI_SMTP_FROM', $smtpUser);

        if ($smtpPass === '') {
            $errorMsg = 'Configuración SMTP incompleta: define MAFI_SMTP_PASS en el archivo .env o en las variables de entorno del servidor.';
            error_log('MAFI mailer: ' . $errorMsg);
            return false;
        }

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = $smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUser;
            $mail->Password   = $smtpPass;
            $mail->SMTPSecure = ($smtpPort === 587) ? PHPMailer::ENCRYPTION_STARTTLS : PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = $smtpPort;
            $mail->CharSet    = 'UTF-8';

            $fromName = $options['fromName'] ?? 'Sistema MAFI';
            $mail->setFrom($smtpFrom, $fromName);

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
