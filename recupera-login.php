<?php
require_once("cabecalho.php");

if (isset($_POST["cpf"]) && $_POST["cpf"] != null && isset($_GET["recupera-candidato"]) && $_POST["confirmaUpdate"] == "yes") {

	$cpfCandidato = $_POST["cpf"];
	$Candidato = buscaUmRegistro($conexao, $cpfCandidato, "Candidato", "cpf");

	if ($Candidato != null) {

		$emailCandidato = $Candidato["email"];
		$idCandidato = $Candidato["idCandidato"];

		//$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));

		for ($i=0; $i < 100; $i++) { 
			$random_string = $random_string.chr(rand(65,90));
		}

		//$codificada = md5(uniqid(rand(), true));
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

	commitTransacao($conexao, "commitTransacao", "form-login-candidato.php");
	sucesso("Senha resetada com sucesso!", "form-login-candidato.php");
	die();
}


header("Location: index.php");
die();

?>


<?php require_once("rodape.php"); ?>