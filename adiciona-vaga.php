<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");
require_once("logica-empresa.php");
verificaEmpresa();

$ativa = "S";
$titulo = strtolower($_POST["titulo"]);
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

$DefFisica = 0;
$DefFala = 0;
$DefAuditiva = 0;
$DefMental = 0;
$DefVisual = 0;

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

	if ($titulo == null || $salario == null) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	if (isset($_POST["DefFisica"])) {
		$DefFisica = $_POST["DefFisica"];
	}
	if (isset($_POST["DefFala"])) {
		$DefFala = $_POST["DefFala"];
	}
	if (isset($_POST["DefAuditiva"])) {
		$DefAuditiva = $_POST["DefAuditiva"];
	}
	if (isset($_POST["DefMental"])) {
		$DefMental = $_POST["DefMental"];
	}
	if (isset($_POST["DefVisual"])) {
		$DefVisual = $_POST["DefVisual"];
	}

	if (!starTransaction($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: StartTransaction";
		header("Location: form-cadastro-vaga.php");
	    die();
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

	if ($DefFisica != null) {
		if (!insereRestricoes($conexao, $DefFisica, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefAuditiva != null) {
		if (!insereRestricoes($conexao, $DefAuditiva, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefFala != null) {
		if (!insereRestricoes($conexao, $DefFala, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefMental != null) {
		if (!insereRestricoes($conexao, $DefMental, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if ($DefVisual != null) {
		if (!insereRestricoes($conexao, $DefVisual, $idVaga)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	if (!commit($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: commit";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	$_SESSION["success"] = "Vaga ativada com sucesso!";
	header("Location: gerenciar-vagas.php");
	die();
}

if (isset($_POST["DefFisica"])) {
	$DefFisica = $_POST["DefFisica"];
}
if (isset($_POST["DefFala"])) {
	$DefFala = $_POST["DefFala"];
}
if (isset($_POST["DefAuditiva"])) {
	$DefAuditiva = $_POST["DefAuditiva"];
}
if (isset($_POST["DefMental"])) {
	$DefMental = $_POST["DefMental"];
}
if (isset($_POST["DefVisual"])) {
	$DefVisual = $_POST["DefVisual"];
}

if (!starTransaction($conexao)) {
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: StartTransaction";
	header("Location: form-cadastro-vaga.php");
    die();
}

if (!insereVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios, $salario, $cargaHoraria, $data, $idEmpresa, $categoria, $nivel, $ativa)) {
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!  Erro: Insert".mysqli_error($conexao);
	rollback($conexao);
	header("Location: form-cadastro-vaga.php");
    die();
}

$buscaIdVaga = buscaIdVaga($conexao, $titulo, $idEmpresa);
$idVaga = $buscaIdVaga["idVaga"];

if ($DefFisica != null) {
	if (!insereRestricoes($conexao, $DefFisica, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefAuditiva != null) {
	if (!insereRestricoes($conexao, $DefAuditiva, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefFala != null) {
	if (!insereRestricoes($conexao, $DefFala, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefMental != null) {
	if (!insereRestricoes($conexao, $DefMental, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if ($DefVisual != null) {
	if (!insereRestricoes($conexao, $DefVisual, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
}

if (!commit($conexao)) {
	$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde!";
	rollback($conexao);
	header("Location: form-cadastro-vaga.php");
    die();
}

$_SESSION["success"] = "Vaga cadastrada com sucesso!";
header("Location: gerenciar-vagas.php");
die();

?>

<?php require_once("rodape.php"); ?>