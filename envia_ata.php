<?php

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try{
	//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'seuemail';
	$mail->Password = 'suasenha';
	$mail->Port = 587;

	$mail->setFrom('emailorigem');
	$mail->addAddress('emaildestino');

	$mail->isHTML(true);
	$mail->Subject = $_POST['reu_titulo'];
	$mail->Body = $_POST['ata_descricao'];

	if($mail->send()){
		echo "Email enviado com sucesso";
	} else {
		echo "Email nao enviado";
	}

} catch(Exception $e){
	echo "Erro ao enviar email: {$mail->ErrorInfo}";
}
