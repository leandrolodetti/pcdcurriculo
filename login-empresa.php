<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");
require_once("logica-empresa.php");

$cnpj = $_POST["cnpj"];
$usuario = buscaEmpresa($conexao, $cnpj, $_POST["senha"]);

if ($usuario) {
	logaEmpresa($usuario["cnpj"]);
	header("Location: empresa.php");
}
else {
	$_SESSION["invalidUser"] = "CNPJ ou Senha Inválidos!";
	header("Location: form-login-empresa.php");
}
die();