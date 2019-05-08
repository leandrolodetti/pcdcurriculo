<?php

function listaDeficienciasCandidato($conexao, $id) {
	$deficiencias = array();
	$query = "SELECT Candidato.nome, Deficiencia.Candidato_idCandidato, Tiposdeficiencia.tipo_deficiencia
			  FROM ((Candidato
			  INNER JOIN Deficiencia ON Candidato.idCandidato = Deficiencia.Candidato_idCandidato)
			  INNER JOIN Tiposdeficiencia ON Deficiencia.TiposDeficiencia_idTiposDeficiencia = Tiposdeficiencia.idTiposDeficiencia)
			  WHERE Candidato_idCandidato = {$id}";
	$resultado = mysqli_query($conexao, $query);

	while ($deficiencia = mysqli_fetch_assoc($resultado)) {
		array_push($deficiencias, $deficiencia);
	}
	return $deficiencias;
}

function listaCategoria($conexao) {
	$categorias = array();
	$query = "SELECT * FROM Categoria";
	$resultado = mysqli_query($conexao, $query);

	while ($categoria = mysqli_fetch_assoc($resultado)) {
		array_push($categorias, $categoria);
	}
	return $categorias;
}

function listaNivel($conexao) {
	$niveis = array();
	$query = "SELECT * FROM Nivel";
	$resultado = mysqli_query($conexao, $query);

	while ($nivel = mysqli_fetch_assoc($resultado)) {
		array_push($niveis, $nivel);
	}
	return $niveis;
}

function insereCandidato($conexao, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   		 $genero, $cpfCandidato, $emailCandidato, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   	     $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   		 $cidCandidato, $estadoCivil) {
    $query = "insert into Candidato(nome, sobrenome, data_nascimento, contato, genero, cpf, email, cep, estado, cidade,
    								logradouro, num_logradouro, bairro, complemento, senha, cid10, estado_civil)
    		  values('{$nomeCandidato}', '{$sobrenomeCandidato}', '{$dataNascimentoCandidato}', '{$contatoCandidato}',
    		  		  '{$genero}', '{$cpfCandidato}', '{$emailCandidato}', '{$cepCandidato}', '{$ufCandidato}',
    		  		  '{$cidadeCandidato}', '{$ruaCandidato}', '{$numeroRuaCandidato}', '{$bairroCandidato}', '{$ComplementoCandidato}',
    		  		  '{$senhaMd5}', '{$cidCandidato}', '{$estadoCivil}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function insereEmpresa($conexao, $cnpj, $fantasia, $razao_social, $contato,
				   		 $email, $cep, $estado, $cidade, $logradouro,
				   	     $num_logradouro, $bairro, $complemento, $ramo_atividade, $senhaMd5,
				   		 $responsavel) {
    $query = "insert into Empresa(cnpj, fantasia, razao_social, contato, email, cep, estado, cidade,
    								logradouro, num_logradouro, bairro, complemento, ramo_atividade, senha, responsavel)
    		  values('{$cnpj}', '{$fantasia}', '{$razao_social}', '{$contato}',
    		  		  '{$email}', '{$cep}', '{$estado}', '{$cidade}', '{$logradouro}',
    		  		  '{$num_logradouro}', '{$bairro}', '{$complemento}', '{$ramo_atividade}', '{$senhaMd5}',
    		  		  '{$responsavel}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function insereVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios,
					$salario, $cargaHoraria, $data, $idEmpresa,
					$categoria, $nivel) {
	$query = "INSERT INTO Vaga(titulo, descricao, requisitos, beneficios, salario, carga_horaria,
						  data_atualizacao, Empresa_idEmpresa, Categoria_idCategoria, Nivel_idNivel)
				VALUES('{$titulo}', '{$descricaoVaga}', '{$requisitoVaga}', '{$beneficios}',
					   '{$salario}', '{$cargaHoraria}', '{$data}',
					    {$idEmpresa}, {$categoria}, {$nivel})";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}


function buscaCnpj($conexao, $cnpj) {
	$cnpj = mysqli_escape_string($conexao, $cnpj);
	//$senhaMd5 = md5($senha);
	$query = "select * from Empresa where cnpj = '{$cnpj}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaCpf($conexao, $cpfCandidato) {
	$cpf = mysqli_escape_string($conexao, $cpfCandidato);
	//$senhaMd5 = md5($senha);
	$query = "select * from Candidato where cpf = '{$cpf}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmailEmpresa($conexao, $email) {
	$email = mysqli_escape_string($conexao, $email);
	//$senhaMd5 = md5($senha);
	$query = "select * from Empresa where email = '{$email}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmail($conexao, $emailCandidato) {
	$cpf = mysqli_escape_string($conexao, $emailCandidato);
	//$senhaMd5 = md5($senha);
	$query = "select * from Candidato where email = '{$emailCandidato}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function starTransaction($conexao) {
	$query = "START TRANSACTION";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function rollback($conexao) {
	$query = "ROLLBACK";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function commit($conexao) {
	$query = "COMMIT";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function buscaIdCandidato($conexao, $cpfCandidato) {
	$cpf = mysqli_escape_string($conexao, $cpfCandidato);
	//$senhaMd5 = md5($senha);
	$query = "select idCandidato from Candidato where cpf = '{$cpf}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaCandidatoAtual($conexao, $emailCandidato) {
	$query = "select * from Candidato where email = '{$emailCandidato}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmpresaAtual($conexao, $cnpj) {
	$query = "select * from Empresa where cnpj = '{$cnpj}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function insereResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel,
						   $emailResponsavel, $nascResponsavel, $idCandidato) {
	$query = "insert into Responsavel(nome, cpf, contato, email, data_nascimento, Candidato_idCandidato) 
			  values('{$nomeResponsavel}','{$cpfResponsavel}','{$contatoResponsavel}','{$emailResponsavel}',
			  		 '{$nascResponsavel}', {$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function insereCurriculo($conexao, $idCandidato) {
	$query = "insert into Curriculo(Candidato_idCandidato) values({$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function insereDeficiencia($conexao, $idDeficiencia, $idCandidato) {
	$query = "insert into Deficiencia(TiposDeficiencia_idTiposDeficiencia, Candidato_idCandidato) values({$idDeficiencia}, {$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function buscaCandidato($conexao, $email, $senha) {
	$email = mysqli_escape_string($conexao, $email);
	$senhaMd5 = md5($senha);
	$query = "select * from Candidato where email = '{$email}' and senha = '{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmpresa($conexao, $cnpj, $senha) {
	//$email = mysqli_escape_string($conexao, $email);
	$senhaMd5 = md5($senha);
	$query = "select * from Empresa where cnpj = '{$cnpj}' and senha = '{$senhaMd5}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

?>
