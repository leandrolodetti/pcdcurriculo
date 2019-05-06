<?php 

session_start();

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
	//session_destroy();
	unset($_SESSION["empresa_logada"]);
	$_SESSION["logout"] = "Empresa Deslogada!";
	header("Location: index-empresa.php");
	die();
}