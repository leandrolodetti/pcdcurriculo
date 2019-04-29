<?php

function listaDeficienciasCandidato ($conexao, $id) {
	$deficiencias = array();
	$query = "SELECT Candidato.nome, Deficiencia.Candidato_idCandidato, Tiposdeficiencia.tipo_deficiencia
			  FROM ((Candidato
			  INNER JOIN Deficiencia ON candidato.idCandidato = deficiencia.Candidato_idCandidato)
			  INNER JOIN Tiposdeficiencia ON deficiencia.TiposDeficiencia_idTiposDeficiencia = tiposdeficiencia.idTiposDeficiencia)
			  WHERE Candidato_idCandidato = {$id}";
	$resultado = mysqli_query($conexao, $query);

	while ($deficiencia = mysqli_fetch_assoc($resultado)) {
		array_push($deficiencias, $deficiencia);
	}
	return $deficiencias;
}

function insereCandidato($conexao, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   		 $genero, $cpfCandidato, $emailCandidato, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   	     $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   		 $cidCandidato) {
    $query = "insert into Candidato(nome, sobrenome, data_nascimento, contato, genero, cpf, email, cep, estado, cidade,
    								logradouro, num_logradouro, bairro, complemento, senha, cid10)
    		  values('{$nomeCandidato}', '{$sobrenomeCandidato}', '{$dataNascimentoCandidato}', '{$contatoCandidato}',
    		  		  '{$genero}', '{$cpfCandidato}', '{$emailCandidato}', '{$cepCandidato}', '{$ufCandidato}',
    		  		  '{$cidadeCandidato}', '{$ruaCandidato}', '{$numeroRuaCandidato}', '{$bairroCandidato}', '{$ComplementoCandidato}',
    		  		  '{$senhaMd5}', '{$cidCandidato}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function buscaCpf($conexao, $cpfCandidato) {
	$cpf = mysqli_escape_string($conexao, $cpfCandidato);
	//$senhaMd5 = md5($senha);
	$query = "select * from Candidato where cpf = '{$cpf}'";
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

?>
