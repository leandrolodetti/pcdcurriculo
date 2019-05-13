<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
verificaEmpresa();

if (isset($_GET["remover-conta"])) {
	iniciarTransacao($conexao, "iniciarTransacao", "altera-dados-empresa.php");
	inativarEmpresa($conexao, "inativarEmpresa", "altera-dados-empresa.php", $usuarioAtual["idEmpresa"]);
	commitTransacao($conexao, "commitTransacao", "altera-dados-empresa.php");
	unset($_SESSION["empresa_logada"]);
	sucesso("Conta inativada com sucesso", "index-empresa.php");
}

if (isset($_GET["altera_geral"])) {
	$razao_social = $_POST["razao_social"];
	$fantasia = $_POST["fantasia"];
	$cnpj = $_POST["cnpj"];
	$emailEmpresa = $_POST["emailEmpresa"];

	if ($razao_social == null || $cnpj == null) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	if (strcmp($cnpj, $usuarioAtual ["cnpj"]) != 0) {
		logOut();
	}
}

if (isset($_GET["id"]) && isset($_GET["inativar-vaga"])) {
		//$ativa="N";
		$idVaga = $_GET["id"];
	iniciarTransacao($conexao, "$iniciarTransacao", "form-cadastro-vaga.php");
	/*
	if (!starTransaction($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: StartTransaction";
		header("Location: form-cadastro-vaga.php");
	    die();
	}
	*/
	inativarVaga($conexao, "inativarVaga", "form-cadastro-vaga.php", $idVaga);
	/*
	if (!inativarVaga($conexao, $idVaga, $ativa)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: Update".mysqli_error($conexao);
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}
	*/
	if (!commit($conexao)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: commit";
		rollback($conexao);
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	$_SESSION["success"] = "Vaga inativada com sucesso!";
	header("Location: gerenciar-vagas.php");
	die();
}

if (isset($_GET["id"]) && isset($_GET["update-vaga"])) {

	$ativa="S";
	$idVaga = $_GET["id"];
	$idEmpresa = $usuarioAtual["idEmpresa"];

	$titulo = strtolower($_POST["titulo"]);
	$listaUmaVaga = listaUmaVaga($conexao, $idVaga);

	if ($titulo != $listaUmaVaga["titulo"]) {
		if (buscaVagaRepetida($conexao, $titulo, $idEmpresa) != null) {
			$_SESSION["danger"] = "Vaga já cadastrada";
			rollback($conexao);
			header("Location: form-cadastro-vaga.php");
		    die();
		}
	}

	$categoria = $_POST["categoria"];
	$nivel = $_POST["nivel"];
	$descricaoVaga = $_POST["descricaoVaga"];
	$requisitoVaga = $_POST["requisitoVaga"];
	$beneficios = $_POST["beneficios"];
	$cargaHoraria = $_POST["cargaHoraria"];
	$salario = $_POST["salario"];
	$data = date('Y/m/d');

	if ($titulo == null || $salario == null) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: FormNull";
		header("Location: form-cadastro-vaga.php");
	    die();
	}

	$DefFisica = 0;
	$DefFala = 0;
	$DefAuditiva = 0;
	$DefMental = 0;
	$DefVisual = 0;

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

	$_SESSION["success"] = "Vaga atualizada com sucesso!";
	header("Location: gerenciar-vagas.php");
	die();
}

?>

<?php require_once("rodape.php"); ?>