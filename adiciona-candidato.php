<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");

$idResponsavel = 1; //id 1 utilizado quando não é necessário incluir um responsável
$ativo = "S";

$nomeCandidato = $_POST["nomeCandidato"];
$sobrenomeCandidato = $_POST["sobrenomeCandidato"];
$dataNascimentoCandidato = $_POST["dataNascimentoCandidato"];
$contatoCandidato = $_POST["contatoCandidato"];
$genero = $_POST["gridGenero"];
$estadoCivil = $_POST["gridCivil"];
$cpfCandidato = $_POST["cpfCandidato"];
$emailCandidato = strtolower($_POST["emailCandidato"]);

$selectCandidatoCpf = buscaUmRegistro($conexao, $cpfCandidato, "Candidato", "cpf");

if ($selectCandidatoCpf["ativo"] == "S") {
	$_SESSION["danger"] = "O CPF informado já está cadastrado!";
	//rollback($conexao);
	header("Location: index.php");
    die();
}

$selectCandidatoEmail = buscaUmRegistro($conexao, $emailCandidato, "Candidato", "email");

if ($selectCandidatoEmail["ativo"] == "S") {
	$_SESSION["danger"] = "O email informado já está cadastrado!";
	//rollback($conexao);
	header("Location: index.php");
    die();
}

iniciarTransacao($conexao, "$iniciarTransacao", "index.php");

if ($_POST["nomeResponsavel"] != "") {
	$nomeResponsavel = $_POST["nomeResponsavel"];
	$cpfResponsavel = $_POST["cpfResponsavel"];
	$contatoResponsavel = $_POST["contatoResponsavel"];
	$emailResponsavel = $_POST["emailResponsavel"];
	$nascResponsavel = $_POST["nascResponsavel"];

	//$selectResponsavel = buscarUmResponsavel($conexao, $cpfResponsavel);
	$selectResponsavel = buscaUmRegistro($conexao, $cpfResponsavel, "Responsavel", "cpf");

	if ($selectResponsavel != null) {
		$idResponsavel = $selectResponsavel["idResponsavel"];
	}
	else {
		if (!insereResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel,
			$emailResponsavel, $nascResponsavel)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insereResponsavel";
			rollback($conexao);
			header("Location: index.php");
    		die();
		}
		$selectResponsavel = buscaUmRegistro($conexao, $cpfResponsavel, "Responsavel", "cpf");
		$idResponsavel = $selectResponsavel["idResponsavel"];
	}
}

$DefFisica = 0; $DefFisica = $_POST["DefFisica"];
$DefFala = 0; $DefFala = $_POST["DefFala"];
$DefAuditiva = 0; $DefAuditiva = $_POST["DefAuditiva"];
$DefMental = 0; $DefMental = $_POST["DefMental"];
$DefVisual = 0; $DefVisual = $_POST["DefVisual"];

$cepCandidato = $_POST["cepCandidato"];
$cidadeCandidato = $_POST["cidadeCandidato"];
$ufCandidato = $_POST["ufCandidato"];
$ruaCandidato = $_POST["ruaCandidato"];
$numeroRuaCandidato = $_POST["numeroRuaCandidato"];
$bairroCandidato = $_POST["bairroCandidato"];
$ComplementoCandidato = $_POST["ComplementoCandidato"];
$cidCandidato = $_POST["cidCandidato"];
$senhaCandidato = $_POST["senhaCandidato"];
$senhaMd5 = md5($senhaCandidato);

if ($selectCandidatoEmail["ativo"] == "N") {
	$idCandidato = $selectCandidatoEmail["idCandidato"];

	if ($cpfCandidato != $selectCandidatoEmail["cpf"]) {
		$jaExiste = buscaIdCandidato($conexao, $cpfCandidato);
		if ($jaExiste != null) {
			$_SESSION["danger"] = "O CPF informado já está cadastrado!";
			rollback($conexao);
			header("Location: index.php");
    		die();
		}
	}
	if (!updateCandidato($conexao, $cpfCandidato, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   	   $genero, $emailCandidato, $estadoCivil, $cepCandidato, $ufCandidato, $cidadeCandidato,
				       $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				       $cidCandidato, $ativo, $idResponsavel, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateCandidato".mysqli_error($conexao);
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
	if (!deleteDeficiencias($conexao, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: deleteDeficiencias".mysqli_error($conexao);
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
}

if ($selectCandidatoCpf["ativo"] == "N") {
	$idCandidato = $selectCandidatoCpf["idCandidato"];

	if ($emailCandidato != $selectCandidatoCpf["email"]) {
		$jaExiste = buscaCandidatoAtual($conexao, $emailCandidato);
		if ($jaExiste != null) {
			$_SESSION["danger"] = "O e-mail informado já está cadastrado!";
			rollback($conexao);
			header("Location: index.php");
	    	die();
		}
	}
	
	if (!updateCandidato($conexao, $cpfCandidato, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   	   $genero, $emailCandidato, $estadoCivil, $cepCandidato, $ufCandidato, $cidadeCandidato,
				       $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				       $cidCandidato, $ativo, $idResponsavel, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateCandidato".mysqli_error($conexao);
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
	if (!deleteDeficiencias($conexao, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: deleteDeficiencias".mysqli_error($conexao);
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
}

$selectCandidatoEmail = buscaUmRegistro($conexao, $emailCandidato, "Candidato", "email");

if ($selectCandidatoEmail == null) {
	$jaExiste = buscaIdCandidato($conexao, $cpfCandidato);
	if ($jaExiste != null) {
		$_SESSION["danger"] = "O CPF informado já está cadastrado!";
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
	
	if(!insereCandidato($conexao, $cpfCandidato, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
					   	   $genero, $emailCandidato, $estadoCivil, $cepCandidato, $ufCandidato, $cidadeCandidato,
					       $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
					       $cidCandidato, $ativo, $idResponsavel)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insereCandidato".mysqli_error($conexao);
		rollback($conexao);
		header("Location: index.php");
	    die();
	}
	$selectCandidatoEmail = buscaUmRegistro($conexao, $emailCandidato, "Candidato", "email");
	$idCandidato = $selectCandidatoEmail["idCandidato"];

	if (!insereCurriculo($conexao, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insereCurriculo";
		rollback($conexao);
		header("Location: index.php");
	    die();
	}

}

if ($DefFisica != 0) {
	if (!insereDeficiencia($conexao, $DefFisica, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFisica";
		rollback($conexao);
		header("Location: index.php");
	   	die();
	}
}

if ($DefAuditiva != 0) {
	if (!insereDeficiencia($conexao, $DefAuditiva, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefAuditiva";
		rollback($conexao);
		header("Location: index.php");
   		die();
	}
}

if ($DefFala != 0) {
	if (!insereDeficiencia($conexao, $DefFala, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFala";
		rollback($conexao);
		header("Location: index.php");
   		die();
	}
}

if ($DefMental != 0) {
	if (!insereDeficiencia($conexao, $DefMental, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefMental";
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
}

if ($DefVisual != 0) {
	if (!insereDeficiencia($conexao, $DefVisual, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefVisual";
		rollback($conexao);
		header("Location: index.php");
    	die();
	}
}

commitTransacao($conexao, "commitTransacao", "index.php");
sucesso("Candidato cadastrado com sucesso!", "form-login-candidato.php");
die();

?>

<?php require_once("rodape.php"); ?>
