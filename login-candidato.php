<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");
require_once("logica-candidato.php");

$email = strtolower($_POST["email"]);
$usuario = buscaCandidato($conexao, $email, $_POST["senha"]);

if ($usuario) {
	logaCandidato($usuario["email"]);
	header("Location: candidato.php");
}
else {
	$_SESSION["invalidUser"] = "Usuário ou Senha Inválidos!";
	header("Location: form-login-candidato.php");
}
die();