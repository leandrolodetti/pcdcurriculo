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

	$DefFisica = 0; $DefFisica = $_POST["DefFisica"];
	$DefFala = 0; $DefFala = $_POST["DefFala"];
	$DefAuditiva = 0; $DefAuditiva = $_POST["DefAuditiva"];
	$DefMental = 0; $DefMental = $_POST["DefMental"];
	$DefVisual = 0; $DefVisual = $_POST["DefVisual"];

	$nome = $_POST["nome"];
	$sobrenome = $_POST["sobrenome"];
	$cpf = $_POST["cpf"];
	$nascimento = $_POST["nascimento"];
	$cid = $_POST["cid"];
	$gridGenero = $_POST["gridGenero"];
	$estadoCivil = $_POST["estadoCivil"];
	$email = $_POST["email"];
	$idCandidato = $usuarioAtual["idCandidato"];

	if (strcmp($cpf, $usuarioAtual["cpf"]) != 0) {

		$selectCandidatoCpf = buscaUmRegistro($conexao, $cpf, "Candidato", "cpf");
		if ($selectCandidatoCpf != null) {
			$_SESSION["danger"] = "O CPF informado já está cadastrado!";
			header("Location: altera-dados-candidato.php");
	    	die();
		}
	}

	if (strcasecmp($email, $usuarioAtual["email"]) != 0) {

		$selectCandidatoEmail = buscaUmRegistro($conexao, $email, "Candidato", "email");
		if ($selectCandidatoEmail != null) {
			$_SESSION["danger"] = "O email informado já está cadastrado!";
			header("Location: altera-dados-candidato.php");
	    	die();
		}
	}

	iniciarTransacao($conexao, "$iniciarTransacao", "index.php");

	if (!updateGeralCandidato($conexao, $cpf, $nome, $sobrenome, $nascimento, $cid, $gridGenero, $estadoCivil, $email, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateGeralCandidato".mysqli_error($conexao);
		rollback($conexao);
		header("Location: altera-dados-candidato.php");
    	die();
	}

	if (!deleteDeficiencias($conexao, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: deleteDeficiencias".mysqli_error($conexao);
		rollback($conexao);
		header("Location: altera-dados-candidato.php");
    	die();
	}

	if ($DefFisica != 0) {
		if (!insereDeficiencia($conexao, $DefFisica, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFisica";
			rollback($conexao);
			header("Location: altera-dados-candidato.php");
	    	die();
		}
	}

	if ($DefAuditiva != 0) {
		if (!insereDeficiencia($conexao, $DefAuditiva, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefAuditiva";
			rollback($conexao);
			header("Location: altera-dados-candidato.php");
    		die();
		}
	}

	if ($DefFala != 0) {
		if (!insereDeficiencia($conexao, $DefFala, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefFala";
			rollback($conexao);
			header("Location: altera-dados-candidato.php");
    		die();
		}
	}

	if ($DefMental != 0) {
		if (!insereDeficiencia($conexao, $DefMental, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefMental";
			rollback($conexao);
			header("Location: altera-dados-candidato.php");
    		die();
		}
	}

	if ($DefVisual != 0) {
		if (!insereDeficiencia($conexao, $DefVisual, $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: DefVisual";
			rollback($conexao);
			header("Location: altera-dados-candidato.php");
    		die();
		}
	}

	$_SESSION["candidato_logado"] = $email;
	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php");
	sucesso("Cadastro atualizado com sucesso!", "altera-dados-candidato.php");
	die();

}

if (isset($_GET["senha"]) && $_POST["confirmaUpdate"] == "yes") {

	$senhaAtual = md5($usuarioAtual["senha"]);
	$confirmaSenha = $_POST["senhaAtual"];
	$novaSenha = md5($_POST["senha"]);

	if ($confirmaSenha != $senhaAtual) {
		$_SESSION["danger"] = "Senha atual inválida";
		header("Location: altera-dados-candidato.php?senha");
    	die();
	}

	iniciarTransacao($conexao, "$iniciarTransacao", "altera-dados-candidato.php?senha");

	if (!updateUmCampo($conexao, "Candidato", "senha", $novaSenha, "idCandidato", $usuarioAtual["idCandidato"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateUmCampoSenha";
		rollback($conexao);
		header("Location: altera-dados-candidato.php?senha");
    	die();
	}
	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php?senha");
	sucesso("Cadastro atualizado com sucesso!", "altera-dados-candidato.php?senha");
	die();
}

if (isset($_GET["contato"]) && $_POST["confirmaUpdate"] == "yes") {

	$contato = $_POST["contato"];
	$cepCandidato = $_POST["cep"];
	$cidadeCandidato = $_POST["cidade"];
	$estadoCandidato = $_POST["estado"];
	$logradouro = $_POST["logradouro"];
	$numero = $_POST["numero"];
	$bairro = $_POST["bairro"];
	$complemento = $_POST["complemento"];
	$idCandidato = $usuarioAtual["idCandidato"];

	iniciarTransacao($conexao, "$iniciarTransacao", "altera-dados-candidato.php?contato");

	if (!updateContato($conexao, $contato, $cepCandidato, $estadoCandidato, $cidadeCandidato, $logradouro, $numero, $bairro, $complemento, $idCandidato)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateContato";
		rollback($conexao);
		header("Location: altera-dados-candidato.php?contato");
    	die();
	}
	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php?contato");
	sucesso("Cadastro atualizado com sucesso!", "altera-dados-candidato.php?contato");
}

if (isset($_GET["recebe_vagas"]) && $_POST["confirmaUpdate"] == "yes") {

	$gridRecebeVagas = $_POST["gridRecebeVagas"];

	iniciarTransacao($conexao, "$iniciarTransacao", "altera-dados-candidato.php?senha");

	if (!updateUmCampo($conexao, "Candidato", "recebe_vagas", $gridRecebeVagas, "idCandidato", $usuarioAtual["idCandidato"])) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateUmCampoVaga";
		rollback($conexao);
		header("Location: altera-dados-candidato.php?alerta");
    	die();
	}

	commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php?alerta");
	sucesso("Cadastro atualizado com sucesso!", "altera-dados-candidato.php?alerta");
}

if (isset($_GET["candidatar"]) && $_GET["vaga"] != "") {

	$idVaga = $_GET["vaga"];
	$parametro = $_GET["parametro"];
	$idCandidato = $usuarioAtual["idCandidato"];
	$dataAtual = date('Y/m/d');

	$curriculo = buscaUmRegistro($conexao, $idCandidato, "Curriculo", "Candidato_idCandidato");
	if ($curriculo["objetivo"] == "" || $curriculo["area"] == "" || $curriculo["nivel_area"] == "" || $curriculo["salario"] == "") {
		$_SESSION["danger"] = "Para se candidatar, seu currículo precisa estar completo!";
		header("Location: vaga.php?id=".$idVaga."&parametro=".$parametro);
    	die();
	}

	$vagaAtual = buscaUmRegistro($conexao, $idVaga, "Vaga", "idVaga");
	if ($vagaAtual["ativa"] == "N") {
		$_SESSION["danger"] = "Esta vaga foi inativada :(";
		header("Location: vaga.php?id=".$idVaga."&parametro=".$parametro);
    	die();
	}
	$jaExiste = buscaCandidatura($conexao, $idVaga, $idCandidato);

	if ($jaExiste != null) {
		$_SESSION["danger"] = "Você já se candidatou para esta vaga, boa sorte!";
		header("Location: vaga.php?id=".$idVaga."&parametro=".$parametro);
    	die();
	}
	else{

		iniciarTransacao($conexao, "$iniciarTransacao", "vaga.php?id=".$idVaga);

		if (!insereCandidatura($conexao, $idVaga, $idCandidato, $dataAtual)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insereCandidatura";
			rollback($conexao);
			header("Location: vaga.php?id=".$idVaga."&parametro=".$parametro);
    		die();
		}
		commitTransacao($conexao, "commitTransacao", "vaga.php?id=".$idVaga."&parametro=".$parametro);
		sucesso("Candidatura realizada com sucesso!", "vaga.php?id=".$idVaga."&parametro=".$parametro);
		die();
	}
}

if (isset($_GET["responsavel"]) && $_POST["confirmaUpdate"] == "yes") {

	$nomeResponsavel = $_POST["nomeResponsavel"];
	$cpfResponsavel = $_POST["cpfResponsavel"];
	$contatoResponsavel = $_POST["contatoResponsavel"];
	$emailResponsavel = $_POST["emailResponsavel"];
	$nascResponsavel = $_POST["nascResponsavel"];
	$idCandidato = $usuarioAtual["idCandidato"];


	if ($cpfResponsavel == $usuarioAtual["cpf"]) {
		$_SESSION["danger"] = "CPF igual ao do candidato";
		header("Location: altera-dados-candidato.php?responsavel");
		die();
	}

	if ($contatoResponsavel == $usuarioAtual["contato"]) {
		$_SESSION["danger"] = "Contato igual ao do candidato";
		header("Location: altera-dados-candidato.php?responsavel");
		die();
	}

	if ($emailResponsavel == $usuarioAtual["email"]) {
		$_SESSION["danger"] = "E-mail igual ao do candidato";
		header("Location: altera-dados-candidato.php?responsavel");
		die();
	}

	iniciarTransacao($conexao, "$iniciarTransacao", "altera-dados-candidato.php?responsavel");

		$selectResponsavel = buscaUmRegistro($conexao, $cpfResponsavel, "Responsavel", "cpf");

		if ($selectResponsavel != null) {
			$idResponsavel = $selectResponsavel["idResponsavel"];

			if (!updateResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel, $emailResponsavel,
				$nascResponsavel, $idResponsavel)) {
				$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateResponsavel";
				rollback($conexao);
				header("Location: altera-dados-candidato.php?responsavel");
	    		die();
			}
		}
		else {
			if (!insereResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel,
				$emailResponsavel, $nascResponsavel)) {
				$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: insereResponsavel";
				rollback($conexao);
				header("Location: altera-dados-candidato.php?responsavel");
	    		die();
			}
			$selectResponsavel = buscaUmRegistro($conexao, $cpfResponsavel, "Responsavel", "cpf");
			$idResponsavel = $selectResponsavel["idResponsavel"];
		}

		if (!updateUmCampo($conexao, "Candidato", "Responsavel_idResponsavel", $idResponsavel, "idCandidato", $idCandidato)) {
			$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: updateUmCampoResponsavel";
			rollback($conexao);
			header("Location: altera-dados-candidato.php?responsavel");
	    	die();
		}
		commitTransacao($conexao, "commitTransacao", "altera-dados-candidato.php?responsavel");
		sucesso("Responsável atualizado com sucesso!", "altera-dados-candidato.php?responsavel");
		die();
}

if (isset($_GET["desfazer-candidatura"]) && $_GET["vaga"] != null) {

	$idCandidato = $usuarioAtual["idCandidato"];
	$idVaga = $_GET["vaga"];

	iniciarTransacao($conexao, "$iniciarTransacao", "historico-vagas.php");

	if (!deleteCandidatura($conexao, $idCandidato, $idVaga)) {
		$_SESSION["danger"] = "Ocorreu um erro, tente novamente mais tarde! Erro: deleteCandidatura";
		rollback($conexao);
		header("Location: historico-vagas.php");
	    die();
	}

	commitTransacao($conexao, "commitTransacao", "historico-vagas.php");
	sucesso("Candidatura desfeita com sucesso!", "historico-vagas.php");
	die();
}

header("Location: candidato.php");
die();