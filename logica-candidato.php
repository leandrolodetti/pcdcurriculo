<?php 

session_start();

function logaCandidato($email) {
	$_SESSION["candidato_logado"] = $email;
}

function candidatoEstaLogado() {
	if (isset($_SESSION["candidato_logado"])) {
		return $_SESSION["candidato_logado"];
	}
	else {
		return false;
	}
}

function verificaCandidato() {
	if (candidatoEstaLogado() == false) {
		$_SESSION["danger"] = "Faça o Login!";
		header("Location: form-login-candidato.php");
    	die();
	}
}

function logOut() {
	//session_destroy();
	unset($_SESSION["candidato_logado"]);
	$_SESSION["logout"] = "Usuário Deslogado!";
	header("Location: index.php");
	die();
}