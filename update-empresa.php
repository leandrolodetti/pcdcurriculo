<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
//verificaEmpresa();

if (isset($_GET["altera_geral"])) {
	$razao_social = $_POST["razao_social"];
	$fantasia = $_POST["fantasia"];
	$cnpj = $_POST["cnpj"];
	$emailEmpresa = $_POST["emailEmpresa"];

	//var_dump($cnpj = $_POST["cnpj"]);

	if (strcmp($cnpj, $usuarioAtual ["cnpj"]) != 0) {
		logOut();
	}
}

?>