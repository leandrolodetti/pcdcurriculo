<?php
//require_once("PHPMailer.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
		
require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");

$count = 0;

try {
		$emails = array("llcleandro@outlook.com", "12172100345@alunos.umc.br");

		foreach ($emails as $email) {
			$mail = new PHPMailer;

			$mail->isSMTP();
			$mail->CharSet = 'UTF-8';
			$mail->Encoding = 'base64';
			$mail->Host = 'SMTP.office365.com';
			$mail->Port = 587;
			$mail->SMTPSecure = 'STARTTLS';
			$mail->SMTPAuth = true;
			$mail->Username = "leandro_sampa_@hotmail.com";
			$mail->Password = "yaxun881D";

			$mail->setFrom("leandro_sampa_@hotmail.com");
			$mail->addAddress($email);
			$mail->Subject = "TESTE";

			$mail->msgHTML("teste");
			$mail->AltBody = "TESTE AltBody";

			if($mail->send()) {
				$count++;
			} else {
				$count--;
			}
		}
		die();
		
	} catch (Exception $e) {
		die();
	}

die();

?>