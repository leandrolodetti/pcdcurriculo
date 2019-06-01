<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
		
require_once("src/PHPMailer.php");
require_once("src/SMTP.php");
require_once("src/Exception.php");
require_once("corpo-recupera-senha.php");

function iniciarTransacao($conexao, $msgErro, $location) {
	if (!starTransaction($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: ".$msgErro;
		header("Location: ".$location);
	    die();
	}
}

function commitTransacao($conexao, $msgErro, $location) {
	if (!commit($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: ".$msgErro;
		rollback($conexao);
		header("Location: ".$location);
	    die();
	}
}

function sucesso($msg, $location) {
	$_SESSION["success"] = $msg;
	header("Location: ".$location);
	die();
}

function disparaEmailRecuperaLogin($email, $token, $id, $tipo) {

    $link = "https://pcdcurriculo.com.br/form-recuperar-login.php?{$tipo}={$id}&token={$token}";
	$msg = corpoRecuperaSenha($link);

	try {
		$mail = new PHPMailer;

        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPSecure = 'startls';
        $mail->SMTPAuth = true;
        $mail->Username = "pcdcurriculo.mkt@gmail.com";
        $mail->Password = "Umc@2018";

        $mail->setFrom("pcdcurriculo.mkt@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Recuperar Senha Pcdcurrículo";

		$mail->msgHTML($msg);
		$mail->AltBody = "Link: https://pcdcurriculo.com.br/form-recuperar-login.php?{$tipo}={$id}&token={$token}";
		
		if($mail->send()) {
			return true;
		} else {
			return false;
		}
		
	} catch (Exception $e) {
        //echo $mail->ErrorInfo;
		return false;
	}
}