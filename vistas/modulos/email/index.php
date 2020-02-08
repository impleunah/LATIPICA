<?php
	require 'PHPMailer/PHPMailerAutoload.php';
	//require 'conexion.php';
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tipo seguridad';//Modificar
	$mail->Host = 'host';//Modificar
	$mail->Port = 'puerto';//Modificar
	$mail->Username = 'correo electronico'; //Modificar
	$mail->Password = 'password'; //Modificar
	
	$mail->setFrom('correo electronico', 'nombre');//Modificar
	
	$mail->addAddress('correo destinatario', 'destinatario');//Modificar
	
	$mail->Subject = 'Asunto';//Modificar
	$mail->Body = 'cuerpo'; //Modificar
	$mail->IsHTML(true);
	
	if($mail->send()){
		echo 'Enviado';
		} else {
		echo 'Error';
	}
?>