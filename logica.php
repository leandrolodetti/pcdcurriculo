<?php

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