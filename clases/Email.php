<?php
namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;

class Email
{

    public $email;
    public $nombre;
    public $Token;

    public function __construct($email, $nombre, $Token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->Token = $Token;
    }

    public function Confirmation()
    {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('CosmicPizza@Cuentas.com');
        $mail->addAddress('Cuentas@CosmicPizza.com', 'CosmicPizza.com');
        $mail->Subject = 'Confirme Su cuenta';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $Content = "<html>";
        $Content .= "<p><strong>Hola " . $this->nombre .  "</strong> Has creado tú cuentas en CosmicPizza, Confirma tú cuenta precionando el Siguiente enlace</p>";
        $Content .= "<p>Preciona Aqui: <a href= '". $_ENV['APP_URL'] ."/Confirmation?Token=" . $this->Token . "'>Confimar Cuenta</a></p>";
        $Content .= "<p>Si no solicitaste esta cuenta puedes ignorar el mensaje</p>";
        $Content .= "</html>";


        $mail->Body = $Content;

        $mail->send();
    }


    public function Instructions()
    {

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];

        $mail->setFrom('CosmicPizza@Cuentas.com');
        $mail->addAddress('Cuentas@CosmicPizza.com', 'CosmicPizza.com');
        $mail->Subject = 'Restablecer Password';

        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $Content = "<html>";
        $Content .= "<p><strong>Hola " . $this->nombre .  "</strong> Has Solicitado restablecer tú password</p>";
        $Content .= "<p> Restablecer: <a href='". $_ENV['APP_URL'] ."/Recover?Token=" . $this->Token . "'>Password</a></p>";
        $Content .= "<p>Si tú no solicitaste este cambio por favor cambia tú contraseña</p>";
        $Content .= "</html>";

        $mail->Body = $Content;

        $mail->send();
    }
}
