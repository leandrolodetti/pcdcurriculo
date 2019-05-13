<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");
verificaCandidato();


if (isset($_GET["remover-conta"])) {
	iniciarTransacao($conexao, "iniciarTransacao", "altera-dados-candidato.php");
	inativarCandidato($conexao, "inativarCandidato", "altera-dados-candidato.php", $usuarioAtual["idCandidato"]);
	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php");
	unset($_SESSION["candidato_logado"]);
	sucesso("Conta inativada com sucesso", "index.php");
}