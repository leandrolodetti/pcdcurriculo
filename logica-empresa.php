<?php 
require_once("banco-empresa.php");
require_once("cabecalho.php");
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
