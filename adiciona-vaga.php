<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
verificaEmpresa();

$ativa = "S";
//mb_convert_case($string, MB_CASE_LOWER, "UTF-8");
//$titulo = mb_convert_case($_POST["titulo"], MB_CASE_LOWER, "UTF-8");
$titulo = $_POST["titulo"];
$categoria = $_POST["categoria"];
$nivel = $_POST["nivel"];
$descricaoVaga = $_POST["descricaoVaga"];
$requisitoVaga = $_POST["requisitoVaga"];
$beneficios = $_POST["beneficios"];
$cargaHoraria = $_POST["cargaHoraria"];
$salario = $_POST["salario"];
$data = date('Y/m/d');
$idEmpresa = $usuarioAtual["idEmpresa"];
$buscaVagaRepetida = buscaVagaRepetida($conexao, $titulo, $idEmpresa);

$cidadeEmpresa = $usuarioAtual["cidade"];

$DefFisica = 0; $DefFisica = $_POST["DefFisica"];
$DefFala = 0; $DefFala = $_POST["DefFala"];
$DefAuditiva = 0; $DefAuditiva = $_POST["DefAuditiva"];
$DefMental = 0; $DefMental = $_POST["DefMental"];
$DefVisual = 0; $DefVisual = $_POST["DefVisual"];

$arrayRestricoes = array($DefFisica, $DefFala, $DefAuditiva, $DefMental, $DefVisual);

if ($titulo == null || $salario == null) {
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
	header("Location: form-cadastro-vaga.php");
    die();
}

if ($buscaVagaRepetida["ativa"] == "S") {
	$_SESSION["danger"] = "Vaga já cadastrada";
	header("Location: form-cadastro-vaga.php");
    die();
}

iniciarTransacao($conexao, "iniciarTransacao", "form-cadastro-vaga.php");

if ($buscaVagaRepetida["ativa"] == "N") {

	$idVaga = $buscaVagaRepetida["idVaga"];
	$listaUmaVaga = listaUmaVaga($conexao, $idVaga);

	if ($titulo != $listaUmaVaga["titulo"]) {
		if (buscaVagasAtivas($conexao, $titulo, $idEmpresa) != null) {
			$_SESSION["danger"] = "Vaga já cadastrada";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if (!updateVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios, $salario, $cargaHoraria, $data, $idEmpresa, $categoria, $nivel, $idVaga, $ativa)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: Update".mysqli_error($conexao);
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	if (!deleteRestricoes($conexao, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DeleteRestricoes".mysqli_error($conexao);
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	if ($DefFisica != 0) {
		if (!insereRestricoes($conexao, $DefFisica, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefAuditiva != 0) {
		if (!insereRestricoes($conexao, $DefAuditiva, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefFala != 0) {
		if (!insereRestricoes($conexao, $DefFala, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefMental != 0) {
		if (!insereRestricoes($conexao, $DefMental, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefVisual != 0) {
		if (!insereRestricoes($conexao, $DefVisual, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	$palavrasChaves = explode(" ", $titulo);
	$arrayDispararEmail = listaCandidatoEnviarEmail($conexao, $categoria, $nivel, $cidadeEmpresa, $palavrasChaves, $arrayRestricoes);

	commitTransacao($conexao, "commitTransacao", "form-cadastro-vaga.php");

	if (count($arrayDispararEmail) > 0) {
		foreach ($arrayDispararEmail as $email) {
			$resultado = insereReplaceDisparaEmail($conexao, $email, $titulo, $idVaga);
		}
		//sleep(10);
	}

	sucesso("Vaga ativada com sucesso!", "gerenciar-vagas.php");

}

if (!insereVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios, $salario, $cargaHoraria, $data, $idEmpresa, $categoria, $nivel, $ativa)) {
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: Insert".mysqli_error($conexao);
	rollback($conexao);
	header("Location: form-cadastro-vaga.php");
    die();
}

$buscaIdVaga = buscaIdVaga($conexao, $titulo, $idEmpresa);
$idVaga = $buscaIdVaga["idVaga"];

if ($DefFisica != 0) {
	if (!insereRestricoes($conexao, $DefFisica, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFisica";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefAuditiva != 0) {
	if (!insereRestricoes($conexao, $DefAuditiva, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefAuditiva";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefFala != 0) {
	if (!insereRestricoes($conexao, $DefFala, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFala";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefMental != 0) {
	if (!insereRestricoes($conexao, $DefMental, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefMental";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefVisual != 0) {
	if (!insereRestricoes($conexao, $DefVisual, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefVisual";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

$palavrasChaves = explode(" ", $titulo);
$arrayDispararEmail = listaCandidatoEnviarEmail($conexao, $categoria, $nivel, $cidadeEmpresa, $palavrasChaves, $arrayRestricoes);

commitTransacao($conexao, "commitTransacao", "form-cadastro-vaga.php");

if (count($arrayDispararEmail) > 0) {
	foreach ($arrayDispararEmail as $email) {
		$resultado = insereReplaceDisparaEmail($conexao, $email, $titulo, $idVaga);
	}
	//sleep(10);
}

sucesso("Vaga cadastrada com sucesso!", "gerenciar-vagas.php");

?>

<?php require_once("rodape.php"); ?>