<?php 
require_once("banco.php");
require_once("banco-empresa.php");
require_once("cabecalho.php");
session_start();
verificaCandidato();

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
	unset($_SESSION["candidato_logado"]);
	$_SESSION["logout"] = "Usuário Deslogado!";
	header("Location: index.php");
	die();
}

function inativarCandidato($conexao, $msgErro, $location, $id) {
	if (!updateUmCampo($conexao, "Candidato", "ativo", "N", "idCandidato", $id)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: ".$msgErro;
		rollback($conexao);
		header("Location: ".$location);
	    die();
	}
}