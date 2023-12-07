<?php

    require_once "../../vendor/phpmailer/phpmailer/src/PHPMailer.php";
    require_once "../../vendor/phpmailer/phpmailer/src/SMTP.php";
    require_once "../../vendor/phpmailer/phpmailer/src/Exception.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    class EnvioEmail{

        private $mail;

        public function __construct(){

            require_once "../../vendor/autoload.php";
            $this->mail = new PHPMailer(true);

        }

        public function enviarEmail($destinatario, $assunto, $mensagem) {

            try {

                // Configurações do servidor SMTP

                $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $this->mail->isSMTP();
                $this->mail->Host       = 'smtp.office365.com';
                $this->mail->SMTPAuth   = true;
                $this->mail->Username   = 'tectionportalaluno@outlook.com';
                $this->mail->Password   = 'Tection@1234';
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $this->mail->Port       = 587;
                $this->mail->SMTPSecure = 'tls';
                $this->mail->SMTPDebug = 0; // Desativa a depuração

                // Configurações de remetente e destinatário

                $this->mail->setFrom('tectionportalaluno@outlook.com', 'Portal Aluno');
                $this->mail->addAddress($destinatario);
                $this->mail->isHTML(true);
                $this->mail->Subject = $assunto;
                $this->mail->Body = $mensagem;

                // Envie o e-mail

                $this->mail->send();

                return 'Message has been sent';

            } catch (Exception $e) {

                return "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";

            }

        }

    }

?>
