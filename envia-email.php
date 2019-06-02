<?php
require_once("conecta.php");
require_once("banco.php");
require_once("corpo-nova-vaga.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
		
require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");
//require_once("corpo-recupera-senha.php");

$count = 0;
$arrayDispara = vagasParaDispararEmail($conexao);

try {
	foreach ($arrayDispara as $atual) {

		$msg = corpoNovaVaga($atual["titulo_vaga"], $atual["Vaga_idVaga"]);

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->CharSet = 'UTF-8';
		//$mail->Encoding = 'base64';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'startls';
		$mail->SMTPAuth = true;
		$mail->Username = "pcdcurriculo.mkt@gmail.com";
		$mail->Password = "Umc@2018";

		$mail->setFrom("Pcdcurrículo.com.br");
		$mail->addAddress($atual["email_candidato"]);
		$mail->Subject = "Nova Vaga Publicada!";

		$mail->msgHTML($msg);
		$mail->AltBody = "Nova Vaga Publicada - Link: https://pcdcurriculo.com.br/vaga.php?id='.$id.'";

		if($mail->send()) {
			$count = removeEmailEnviado($conexao, $atual["email_candidato"]);
			echo "enviou!";
		} else {
			echo "Não enviou!";
			$count--;
		}
	}
	die();
		
} catch (Exception $e) {
	echo $mail->ErrorInfo;
	die();
}

die();

?>