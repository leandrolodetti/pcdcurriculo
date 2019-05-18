<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");
verificaCandidato();


if (isset($_GET["remover-conta"]) && $_POST["confirmaExclusao"] == "yes") {
	iniciarTransacao($conexao, "iniciarTransacao", "altera-dados-candidato.php");
	inativarCandidato($conexao, "inativarCandidato", "altera-dados-candidato.php", $usuarioAtual["idCandidato"]);
	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php");
	unset($_SESSION["candidato_logado"]);
	sucesso("Conta inativada com sucesso", "index.php");
}
/*
else{
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: parâmetroInválido";
	header("Location: altera-dados-candidato.php");
    die();
}
*/
if (isset($_GET["objetivos"]) && $_POST["confirmaUpdate"] == "yes") {
	$data = date('Y/m/d');
	$objetivo = $_POST["objetivo"];
	$categoria = $_POST["categoria"];
	$nivel = $_POST["nivel"];
	$pretensaoSalarial = $_POST["pretensaoSalarial"];
	/*
	if ($objetivo == "" || $categoria == "" || $nivel == "" ||  $pretensaoSalarial == "") {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
	*/
	$CurriculoAtual = buscaUmRegistro($conexao, $usuarioAtual["idCandidato"], "Curriculo", "Candidato_idCandidato");

	iniciarTransacao($conexao, "iniciarTransacao", "curriculo.php");

	if (!updateObjetivo($conexao, $objetivo, $categoria, $nivel, $pretensaoSalarial, $data ,$CurriculoAtual["idCurriculo"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateObjetivo";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
	commitTransacao($conexao, "$Ocorreu um erro, tente novamente mais tarde! Erro: commitTransacao", "candidato.php");
	sucesso("Currículo salvo com sucesso!", "curriculo.php");
}

if (isset($_GET["pretensao"]) && $_POST["confirmaUpdate"] == "yes") {
	$data = date('Y/m/d');
	$resumo = $_POST["resumo"];
/*
	if ($resumo == "") {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
*/
	$CurriculoAtual = buscaUmRegistro($conexao, $usuarioAtual["idCandidato"], "Curriculo", "Candidato_idCandidato");

	iniciarTransacao($conexao, "iniciarTransacao", "curriculo.php");

	if (!updateResumo($conexao, $resumo, $data, $CurriculoAtual["idCurriculo"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateResumo";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
	commitTransacao($conexao, "$Ocorreu um erro, tente novamente mais tarde! Erro: commitTransacao", "candidato.php");
	sucesso("Currículo salvo com sucesso!", "curriculo.php");
}

if (isset($_GET["formacao"]) && $_POST["confirmaUpdate"] == "yes") {
	$data = date('Y/m/d');
	$txtNivelEscolar = $_POST["txtNivelEscolar"];
	$txtGraduacao = $_POST["txtGraduacao"];
	$txtCursoComplementares = $_POST["txtCursoComplementares"];
	$txtIdioma = $_POST["txtIdioma"];
/*
	if ($txtNivelEscolar == "" || $txtGraduacao == "" || $txtCursoComplementares == "" ||  $txtIdioma == "") {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
*/
	$CurriculoAtual = buscaUmRegistro($conexao, $usuarioAtual["idCandidato"], "Curriculo", "Candidato_idCandidato");

	iniciarTransacao($conexao, "iniciarTransacao", "curriculo.php");
	if (!updateFormacao($conexao, $txtNivelEscolar, $txtGraduacao, $txtCursoComplementares, $txtIdioma, $data, $CurriculoAtual["idCurriculo"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateFormacao";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
	commitTransacao($conexao, "$Ocorreu um erro, tente novamente mais tarde! Erro: commitTransacao", "candidato.php");
	sucesso("Currículo salvo com sucesso!", "curriculo.php");
}

if (isset($_GET["historico"]) && $_POST["confirmaUpdate"] == "yes") {
	$data = date('Y/m/d');
	$txtHistoricoProf = $_POST["txtHistoricoProf"];
/*
	if ($txtHistoricoProf == "") {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
*/
	$CurriculoAtual = buscaUmRegistro($conexao, $usuarioAtual["idCandidato"], "Curriculo", "Candidato_idCandidato");

	iniciarTransacao($conexao, "iniciarTransacao", "curriculo.php");
	if (!updateHistoricoProf($conexao, $txtHistoricoProf, $data, $CurriculoAtual["idCurriculo"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateHistoricoProf";
		rollback($conexao);
		header("Location: curriculo.php");
    	die();
	}
	commitTransacao($conexao, "Ocorreu um erro, tente novamente mais tarde! Erro: commitTransacao", "candidato.php");
	sucesso("Currículo salvo com sucesso!", "curriculo.php");
}

if (isset($_GET["geral-candidato"]) && $_POST["confirmaUpdate"] == "yes") {
	
}

header("Location: candidato.php");
die();