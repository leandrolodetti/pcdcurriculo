<?php
//require_once("PHPMailer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
		
require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");
require_once("corpo-recupera-senha.php");

$count = 0;

try {
		$emails = array("llcleandro@outlook.com", "12172100345@alunos.umc.br");
		$msg = corpoRecuperaSenha($tipo, $idCandidato, $token);
		foreach ($emails as $email) {
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

			$mail->setFrom("pcdcurriculo.mkt@gmail.com");
			$mail->addAddress($email);
			$mail->Subject = "TESTE";

			$mail->msgHTML($msg);
			$mail->AltBody = "TESTE AltBody";

			if($mail->send()) {
				$count++;
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