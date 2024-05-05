<?php
require_once 'libs/mailer/src/Exception.php';
require_once 'libs/mailer/src/PHPMailer.php';
require_once 'libs/mailer/src/SMTP.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class MailService
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);
    }

    public function sendEmail($subject, $body, $email)
    {
        try {
            echo "Sending email to $email\n";
            require_once 'configs/mail.config.php';

            $this->mail->SMTPDebug = 0;
            $this->mail->isSMTP();
            $this->mail->Host = $MAIL_CONFIGS['SMTP_HOST'];
            $this->mail->SMTPAuth = true;
            $this->mail->Username = $MAIL_CONFIGS['SMTP_USERNAME'];
            $this->mail->Password = $MAIL_CONFIGS['SMTP_PASSWORD'];
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587;

            $this->mail->setFrom($MAIL_CONFIGS['SMTP_USERNAME']);
            $this->mail->addAddress($email);

            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $body;

            $this->mail->send();

            echo "Sending email to $email successful\n";
        } catch (Exception $e) {
            echo "Cant send mail to $email \n";
            throw $e;
        }
    }
}
