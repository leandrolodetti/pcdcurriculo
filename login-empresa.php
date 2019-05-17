<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");
require_once("logica-empresa.php");

$cnpj = $_POST["cnpj"];
$senhaMd5 = md5($_POST["senha"]);
$usuario = buscaEmpresa($conexao, $cnpj, $senhaMd5);

if ($usuario && ($usuario["ativa"] == "S")) {
	logaEmpresa($usuario["cnpj"]);
	header("Location: empresa.php");
}
else {
	$_SESSION["danger"] = "CNPJ ou Senha Inválidos!";
	header("Location: form-login-empresa.php");
}
die();