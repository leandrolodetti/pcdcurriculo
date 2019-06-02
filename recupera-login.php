<?php
require_once("cabecalho.php");
require_once("banco-empresa.php");

if (isset($_POST["cpf"]) && $_POST["cpf"] != null && isset($_GET["recupera-candidato"]) && $_POST["confirmaUpdate"] == "yes") {

	$cpfCandidato = $_POST["cpf"];
	$Candidato = buscaUmRegistro($conexao, $cpfCandidato, "Candidato", "cpf");

	if ($Candidato != null) {

		$emailCandidato = $Candidato["email"];
		$idCandidato = $Candidato["idCandidato"];

		for ($i=0; $i < 100; $i++) { 
			$random_string = $random_string.chr(rand(65,90));
		}

		$codificada = crypt($random_string);

		iniciarTransacao($conexao, "$iniciarTransacao", "form-login-candidato.php");

		if (!insertUpdateTokenCandidato($conexao, $codificada, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insertUpdateTokenCandidato";
			rollback($conexao);
			header("Location: form-login-candidato.php");
    		die();
		}

		if (!disparaEmailRecuperaLogin($emailCandidato, $codificada, $idCandidato, "candidato")) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: disparaEmailRecuperaLogin";
			rollback($conexao);
			header("Location: form-login-candidato.php");
    		die();
		}

		commitTransacao($conexao, "commitTransacao", "form-login-candidato.php");
		sucesso("Um e-mail foi enviado para {$emailCandidato}. Clique no link para recuperar a senha", "form-login-candidato.php");
		die();
	}
	else {
		$_SESSION["danger"] = "CPF não encontrado!";
		header("Location: form-login-candidato.php");
    	die();
	}
}

if (isset($_GET["resetPasswd"]) && $_POST["confirmaUpdate"] == "yes" && isset($_POST["idCandidato"]) && $_POST["idCandidato"] !=null) {
	
	$senhaMd5 = md5($_POST["senha"]);
	$idCandidato = $_POST["idCandidato"];

	iniciarTransacao($conexao, "$iniciarTransacao", "form-login-candidato.php");

	if (!updateUmCampo($conexao, "Candidato", "senha", $senhaMd5, "idCandidato", $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateUmCampoResetPasswd";
		rollback($conexao);
		header("Location: form-login-candidato.php");
	    die();
	}

	if (!removerTokenRecuperaLogin($conexao, "Candidato_idCandidato", $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: removerTokenRecuperaLogin";
		rollback($conexao);
		header("Location: form-login-candidato.php");
	    die();
	}

	commitTransacao($conexao, "commitTransacao", "form-login-candidato.php");
	sucesso("Senha resetada com sucesso!", "form-login-candidato.php");
	die();
}

if (isset($_POST["cnpj"]) && $_POST["cnpj"] != null && isset($_GET["recupera-empresa"]) && $_POST["confirmaUpdate"] == "yes") {
	
	$cnpjEmpresa = $_POST["cnpj"];
	$empresa = buscaUmRegistro($conexao, $cnpjEmpresa, "Empresa", "cnpj");

	if ($empresa != null) {

		$emailEmpresa = $empresa["email"];
		$idEmpresa = $empresa["idEmpresa"];

		for ($i=0; $i < 100; $i++) { 
			$random_string = $random_string.chr(rand(65,90));
		}

		$codificada = crypt($random_string);

		iniciarTransacao($conexao, "$iniciarTransacao", "form-login-empresa.php");

		if (!insertUpdateTokenEmpresa($conexao, $codificada, $idEmpresa)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insertUpdateTokenEmpresa";
			rollback($conexao);
			header("Location: form-login-empresa.php");
    		die();
		}

		if (!disparaEmailRecuperaLogin($emailEmpresa, $codificada, $idEmpresa, "empresa")) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: disparaEmailRecuperaLogin";
			rollback($conexao);
			header("Location: form-login-empresa.php");
    		die();
		}

		commitTransacao($conexao, "commitTransacao", "form-login-empresa.php");
		sucesso("Um e-mail foi enviado para {$emailEmpresa}. Clique no link para recuperar a senha", "form-login-empresa.php");
		die();
	}
	else {
		$_SESSION["danger"] = "CNPJ não encontrado!";
		header("Location: form-login-empresa.php");
    	die();
	}
}

if (isset($_GET["resetPasswd"]) && $_POST["confirmaUpdate"] == "yes" && isset($_POST["idEmpresa"]) && $_POST["idEmpresa"] !=null) {
	
	$senhaMd5 = md5($_POST["senha"]);
	$idEmpresa = $_POST["idEmpresa"];

	iniciarTransacao($conexao, "$iniciarTransacao", "form-login-empresa.php");

	if (!updateUmCampo($conexao, "Empresa", "senha", $senhaMd5, "idEmpresa", $idEmpresa)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateUmCampoResetPasswd";
		rollback($conexao);
		header("Location: form-login-empresa.php");
	    die();
	}
	if (!removerTokenRecuperaLogin($conexao, "Empresa_idEmpresa", $idEmpresa)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: removerTokenRecuperaLogin";
		rollback($conexao);
		header("Location: form-login-empresa.php");
	    die();
	}

	commitTransacao($conexao, "commitTransacao", "form-login-empresa.php");
	sucesso("Senha resetada com sucesso!", "form-login-empresa.php");
	die();
}

header("Location: index.php");
die();

?>


<?php require_once("rodape.php"); ?>