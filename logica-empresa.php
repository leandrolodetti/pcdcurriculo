<?php 
require_once("banco-empresa.php");
require_once("cabecalho.php");
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
		
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

function logaEmpresa($cnpj) {
	$_SESSION["empresa_logada"] = $cnpj;
}

function empresaEstaLogada() {
	if (isset($_SESSION["empresa_logada"])) {
		return $_SESSION["empresa_logada"];
	}
	else {
		return false;
	}
}

function verificaEmpresa() {
	if (empresaEstaLogada() == false) {
		$_SESSION["danger"] = "Faça o Login!";
		header("Location: form-login-empresa.php");
    	die();
	}
}

function logOut() {
	unset($_SESSION["empresa_logada"]);
	$_SESSION["danger"] = "Empresa Deslogada!";
	header("Location: index-empresa.php");
	die();
}

function inativarVaga($conexao, $msgErro, $location, $id) {
	if (!updateUmCampo($conexao, "Vaga", "ativa", "N", "idVaga", $id)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: ".$msgErro;
		rollback($conexao);
		header("Location: ".$location);
	    die();
	}
}

function inativarEmpresa($conexao, $msgErro, $location, $id) {
	if (!updateUmCampo($conexao, "Empresa", "ativa", "N", "idEmpresa", $id)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: ".$msgErro;
		rollback($conexao);
		header("Location: ".$location);
	    die();
	}
}

function dispararEmail($arrayDispararEmail, $idVaga) {
	$count = 0;
/*
	$listaEmail = listaCandidatoEnviarEmail($conexao, $categoria);
	$arrayDispararEmail = array();

	foreach ($listaEmail as $lista) {

		foreach ($arrayRestricoes as $rest) {
			if (($rest != 0) && ($rest != $lista["TiposDeficiencia_idTiposDeficiencia"])) {
				if (!array_key_exists($lista["email"], $arrayDispararEmail)) {
					array_push($arrayDispararEmail, $lista["email"]);
				}
			}
		}
	}

	foreach ($listaEmail as $lista) {

		foreach ($arrayRestricoes as $rest) {
			if (($rest != 0) && ($rest == $lista["TiposDeficiencia_idTiposDeficiencia"])) {
				$key = array_search($lista["email"], $arrayDispararEmail);
				if($key !== false){
    				unset($arrayDispararEmail[$key]);
				}
			}
		}
	}
*/
	foreach ($arrayDispararEmail as $email) {

		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'SMTP.office365.com';
		$mail->Port = 587;
		$mail->SMTPSecure = 'STARTTLS';
		$mail->SMTPAuth = true;
		$mail->Username = "leandro_sampa_@hotmail.com";
		$mail->Password = "yaxun881D";

		$mail->setFrom("leandro_sampa_@hotmail.com");
		$mail->addAddress($email);
		$mail->Subject = "Nova Vaga Publicada!";

		$mail->msgHTML("<html>Link: http://localhost/pcdcurriculo/vaga.php?id={$idVaga}&parametro=php<br/>email: {$email}</html>");
		$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";
		if($mail->send()) {
			$count = $count + 1;
			/*
		    $_SESSION["success"] = "Mensagem enviada com sucesso";
		    header("Location: index.php");
		    */
		} else {
			$count = $count - 1;
			/*
		    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
		    header("Location: index.php");
		    */
		}
	}
	return $count;
die();
}
/*
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
*/