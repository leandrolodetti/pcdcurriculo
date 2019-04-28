<?php

function listaTiposDeficiencia ($conexao) {
	$deficiencias = array();
	$resultado = mysqli_query($conexao, "select * from tiposdeficiencia");

	while ($deficiencia = mysqli_fetch_assoc($resultado)) {
		array_push($deficiencias, $deficiencia);
	}
	return $deficiencias;
}

function insereCandidato($conexao, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   		 $genero, $cpfCandidato, $emailCandidato, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   	     $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   		 $cidCandidato) {
    $query = "insert into candidato(nome, sobrenome, data_nascimento, contato, genero, cpf, email, cep, estado, cidade,
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
	$query = "select * from candidato where cpf = '{$cpf}'";
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
	$query = "select idCandidato from candidato where cpf = '{$cpf}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function insereResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel,
						   $emailResponsavel, $nascResponsavel, $idCandidato) {
	$query = "insert into responsavel(nome, cpf, contato, email, data_nascimento, Candidato_idCandidato) 
			  VALUES('{$nomeResponsavel}','{$cpfResponsavel}','{$contatoResponsavel}','{$emailResponsavel}',
			  		 '{$nascResponsavel}', {$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function insereDeficiencia($conexao, $idDeficiencia, $idCandidato) {
	$query = "insert into deficiencia(TiposDeficiencia_idTiposDeficiencia, Candidato_idCandidato) values({$idDeficiencia}, {$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

?>
