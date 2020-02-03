<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

public function sendRecoveryCode()
{
    if (isset($_POST["txtCorreoElectronico"]) && trim($_POST["txtCorreoElectronico"] != '')) {
        $correoElectronico = $_POST['txtCorreoElectronico'];
        $codigo = $this->createRandomCode();
        $fechaRecuperacion = date("Y-m-d H:i:s", strtotime('+24 hours'));
        $userModel = new User();
        $user = $userModel->getUserWithEmail($correoElectronico);

        if ($user === false) {
            $mensaje = 'El correo electrónico no se encuentra registrado en el sistema.';
            $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
        } else {
            $respuesta = $userModel->recoverPassword($correoElectronico, $codigo, $fechaRecuperacion);
        
            if ($respuesta) {
                $this->sendMail($correoElectronico, $user->nombreCompleto, $codigo);
                
                $mensaje = 'Se ha enviado un correo electrónico con las instrucciones para el cambio de tu contraseña. Por favor verifica la información enviada.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            } else {
                $mensaje = 'No se recuperar la cuenta. Si los errores persisten comuniquese con el administrador del sitio.';
                $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
            }
        }
    } else {
        $mensaje = 'El campo de correo electrónico es requerido.';
        $this->render('login/recover', 'Recuperar Contraseña', array('mensaje' => $mensaje), false);
    }
}
public function sendMail($correoElectronico, $nombre, $codigo)
    {
        $template = file_get_contents(APP.'view/login/template.php');
        $template = str_replace("{{name}}", $nombre, $template);
        $template = str_replace("{{action_url_2}}", '<b>http:'.URL.'login/newPassword/'.$codigo.'</b>', $template);
        $template = str_replace("{{action_url_1}}", 'http:'.URL.'login/newPassword/'.$codigo, $template);
        $template = str_replace("{{year}}", date('Y'), $template);
        $template = str_replace("{{operating_system}}", Helper::getOS(), $template);
        $template = str_replace("{{browser_name}}", Helper::getBrowser(), $template);

        $mail = new PHPMailer(true);
        $mail->CharSet = "UTF-8";

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'latipicahn@gmail.com';   //username
            $mail->Password = 'najera2716.';   //password
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;                    //smtp port

            $mail->setFrom('latipicahn@gmail.com', 'Condimentos La Tipica');
            $mail->addAddress($correoElectronico, $nombre);

            $mail->isHTML(true);

            $mail->Subject = 'Recuperación de contraseña - Variedades y Comunicaciones';
            $mail->Body    = $template;

            if (!$mail->send()) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
            // echo 'Message could not be sent.';
            // echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }
    public function createRandomCode()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz0123456789";
        srand((double)microtime()*1000000);
        $i = 0;
        $pass = '' ;
    
        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }
    
        return time().$pass;
    }