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

function updateUmCampo($conexao, $tabela, $set, $valor, $where, $condicao) {
	$query = "UPDATE {$tabela} SET {$set}='{$valor}' WHERE {$where} = {$condicao}";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function insereCandidato($conexao, $cpfCandidato, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   		 $genero, $emailCandidato, $estadoCivil, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   	     $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   		 $cidCandidato, $ativo, $idResponsavel) {
    $query = "insert into Candidato(cpf, nome, sobrenome, data_nascimento, contato, genero, email, estado_civil, cep, estado, cidade,
    			logradouro, num_logradouro, bairro, complemento, senha, cid10, ativo, Responsavel_idResponsavel)
    			values('{$cpfCandidato}', '{$nomeCandidato}', '{$sobrenomeCandidato}', '{$dataNascimentoCandidato}',
    		  		  '{$contatoCandidato}', '{$genero}', '{$emailCandidato}', '{$estadoCivil}', '{$cepCandidato}',
    		  		  '{$ufCandidato}', '{$cidadeCandidato}', '{$ruaCandidato}', '{$numeroRuaCandidato}', '{$bairroCandidato}',
    		  		  '{$ComplementoCandidato}', '{$senhaMd5}', '{$cidCandidato}', '{$ativo}', {$idResponsavel})";

    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function updateCandidato($conexao, $cpfCandidato, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   		 $genero, $emailCandidato, $estadoCivil, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   	     $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   		 $cidCandidato, $ativo, $idResponsavel, $idCandidato) {
	$query = "UPDATE Candidato SET cpf='{$cpfCandidato}', nome='{$nomeCandidato}', sobrenome='{$sobrenomeCandidato}',
	data_nascimento='{$dataNascimentoCandidato}', contato='{$contatoCandidato}', genero='{$genero}', email='{$emailCandidato}',
	estado_civil='{$estadoCivil}', cep='{$cepCandidato}', estado='{$ufCandidato}', cidade='{$cidadeCandidato}', logradouro='{$ruaCandidato}',
	num_logradouro='{$numeroRuaCandidato}', bairro='{$bairroCandidato}', complemento='{$ComplementoCandidato}',
	senha='{$senhaMd5}', cid10='{$cidCandidato}', ativo='{$ativo}', Responsavel_idResponsavel={$idResponsavel}
	WHERE idCandidato={$idCandidato}";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function deleteDeficiencias($conexao, $idCandidato) {
	$query = "DELETE FROM deficiencia
				WHERE Candidato_idCandidato = {$idCandidato}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function buscaUmRegistro($conexao, $parametro, $tabela, $where) {
	$thisParametro = mysqli_escape_string($conexao, $parametro);
	$query = "select * from {$tabela} where {$where} = '{$thisParametro}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaCpf($conexao, $cpfCandidato) {
	$cpf = mysqli_escape_string($conexao, $cpfCandidato);
	$query = "select * from Candidato where cpf = '{$cpf}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmail($conexao, $emailCandidato) {
	$cpf = mysqli_escape_string($conexao, $emailCandidato);
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
						   $emailResponsavel, $nascResponsavel) {
	$query = "insert into Responsavel(nome, cpf, contato, email, data_nascimento, Candidato_idCandidato) 
			  values('{$nomeResponsavel}','{$cpfResponsavel}','{$contatoResponsavel}','{$emailResponsavel}',
			  		 '{$nascResponsavel}')";
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
