<?php

function listaDeficienciasCandidato($conexao, $id) {
	$deficiencias = array();
	$query = "SELECT Candidato.nome, Deficiencia.Candidato_idCandidato, TiposDeficiencia.tipo_deficiencia,
			  Deficiencia.TiposDeficiencia_idTiposDeficiencia FROM ((Candidato
			  INNER JOIN Deficiencia ON Candidato.idCandidato = Deficiencia.Candidato_idCandidato)
			  INNER JOIN TiposDeficiencia ON Deficiencia.TiposDeficiencia_idTiposDeficiencia = TiposDeficiencia.idTiposDeficiencia)
			  WHERE Candidato_idCandidato = {$id}";
	$resultado = mysqli_query($conexao, $query);

	while ($deficiencia = mysqli_fetch_assoc($resultado)) {
		array_push($deficiencias, $deficiencia);
	}
	return $deficiencias;
}

function listaIdDeficienciasCandidato($conexao, $idCandidato) {
	$deficiencias = array();

	$query = "SELECT Deficiencia.TiposDeficiencia_idTiposDeficiencia FROM Deficiencia
			WHERE Candidato_idCandidato={$idCandidato}";
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

function updateContato($conexao, $contato, $cepCandidato, $estadoCandidato, $cidadeCandidato, $logradouro, $numero, $bairro, $complemento, $idCandidato) {
	$query = "UPDATE Candidato SET contato='{$contato}', cep='{$cepCandidato}', estado='{$estadoCandidato}',
			cidade='{$cidadeCandidato}', logradouro='{$logradouro}', num_logradouro='{$numero}',
			bairro='{$bairro}', complemento='{$complemento}'
			WHERE idCandidato={$idCandidato}";

	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;	
}

function updateResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel, $emailResponsavel, $nascResponsavel, $idResponsavel) {
	$query = "UPDATE Responsavel SET nome='{$nomeResponsavel}', cpf='{$cpfResponsavel}', contato='{$contatoResponsavel}',
			email='{$emailResponsavel}', data_nascimento='{$nascResponsavel}'
			WHERE idResponsavel={$idResponsavel}";
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
	$query = "DELETE FROM Deficiencia
				WHERE Candidato_idCandidato = {$idCandidato}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function deleteCandidatura($conexao, $idCandidato, $idVaga) {
	$query = "DELETE FROM Candidatura WHERE Candidato_idCandidato={$idCandidato} AND Vaga_idVaga={$idVaga}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function buscaUmRegistro($conexao, $parametro, $tabela, $where) {
	$thisParametro = mysqli_escape_string($conexao, $parametro);
	$query = "select * from {$tabela} where {$where} = '{$thisParametro}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function insereCandidatura($conexao, $idVaga, $idCandidato, $dataAtual) {
	$query = "INSERT INTO Candidatura(Vaga_idVaga, Candidato_idCandidato, data_candidatura, data_contratacao, contratado)
				VALUES ({$idVaga}, {$idCandidato}, '{$dataAtual}', '', 'N')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;			

}

function buscaCandidatura($conexao, $idVaga, $idCandidato) {
	$query = "SELECT * FROM Candidatura WHERE Vaga_idVaga={$idVaga} AND Candidato_idCandidato={$idCandidato}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}
/*
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
*/
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
	$query = "INSERT INTO Responsavel(nome, cpf, contato, email, data_nascimento)
				VALUES('{$nomeResponsavel}','{$cpfResponsavel}', '{$contatoResponsavel}',
					'{$emailResponsavel}', '{$nascResponsavel}')";
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

function updateObjetivo($conexao, $objetivo, $categoria, $nivel, $salario, $data, $idCurriculo) {
	$query = "UPDATE Curriculo SET objetivo='{$objetivo}', area='{$categoria}', nivel_area='{$nivel}', salario='{$salario}', data_atualizacao='{$data}'
	WHERE idCurriculo={$idCurriculo}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function updateResumo($conexao, $resumo, $data, $idCurriculo) {
	$query = "UPDATE Curriculo SET resumo_profissional='{$resumo}', data_atualizacao='{$data}'
	WHERE idCurriculo={$idCurriculo}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function updateFormacao($conexao, $txtNivelEscolar, $txtGraduacao, $txtCursoComplementares, $txtIdioma, $data, $idCurriculo) {
	$query = "UPDATE Curriculo SET nivel_escolar='{$txtNivelEscolar}', graduacao='{$txtGraduacao}', curso_complemento='{$txtCursoComplementares}',
	idiomas='{$txtIdioma}', data_atualizacao='{$data}'
	WHERE idCurriculo={$idCurriculo}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function updateHistoricoProf($conexao, $txtHistoricoProf, $data, $idCurriculo) {
	$query = "UPDATE Curriculo SET historico_profissional='{$txtHistoricoProf}', data_atualizacao='{$data}'
	WHERE idCurriculo={$idCurriculo}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function listaHistorico($conexao, $idCandidato) {
	$candidaturas = array();
	$query = "SELECT * FROM Vaga INNER JOIN Candidatura ON Vaga.idVaga=Candidatura.Vaga_idVaga WHERE Candidatura.Candidato_idCandidato = {$idCandidato}";
	$resultado = mysqli_query($conexao, $query);

	while ($candidatura = mysqli_fetch_assoc($resultado)) {
		array_push($candidaturas, $candidatura);
	}
	return $candidaturas;
}

function updateGeralCandidato($conexao, $cpf, $nome, $sobrenome, $nascimento, $cid, $gridGenero, $estadoCivil, $email, $idCandidato) {
	$query = "UPDATE Candidato SET cpf='{$cpf}', nome='{$nome}', sobrenome='{$sobrenome}',
			data_nascimento='{$nascimento}', cid10='{$cid}', genero='{$gridGenero}',
			estado_civil='{$estadoCivil}', email='{$email}'
			WHERE idCandidato={$idCandidato}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function insertUpdateTokenCandidato($conexao, $chavePrivada, $idCandidato) {
	$query = "REPLACE INTO RecuperaLogin(token, data_criacao, Candidato_idCandidato)
			VALUES('{$chavePrivada}', now(), {$idCandidato})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function selectIndicadorProfissional($conexao, $categoria, $nivel, $cidade, $palavrasChaves, $arrayRestricoes, $limite) {

	$arrayLike = " Vaga.titulo LIKE ''";

	foreach ($palavrasChaves as $chave) {
		$arrayLike = $arrayLike." OR Vaga.titulo LIKE '%{$chave}%'";
	}

	$vagas = array();

	$query = "SELECT Vaga.idVaga FROM Vaga INNER JOIN Empresa ON Empresa.idEmpresa=Vaga.Empresa_idEmpresa WHERE Vaga.Categoria_idCategoria={$categoria} AND Vaga.Nivel_idNivel={$nivel} AND Vaga.ativa='S' AND Empresa.cidade='{$cidade}' AND (".$arrayLike." ) LIMIT {$limite}";

	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
/*
	$arrayVagasIndicadas = array();

	foreach ($vagas as $vagaAtual) {
		foreach ($arrayRestricoes as $rest) {
			if ($rest != $vagaAtual["TiposDeficiencia_idTiposDeficiencia"]) {
				if (in_array($vagaAtual["idVaga"], $arrayVagasIndicadas)) {
					$c=1;
				}
				else {
					array_push($arrayVagasIndicadas, $vagaAtual["idVaga"]);
				}
			}
		}
	}

	foreach ($vagas as $vagaAtual) {
		foreach ($arrayRestricoes as $rest) {
			if ($rest == $vagaAtual["TiposDeficiencia_idTiposDeficiencia"]) {
				$key = array_search($vagaAtual["idVaga"], $arrayVagasIndicadas);
				if($key !== false){
    				unset($arrayVagasIndicadas[$key]);
				}
			}
		}
	}
*/	
	return $vagas;
}

function listarContratados($conexao, $limite) {

	$arrayContratacoes = array();

	$query = "SELECT Candidatura.data_contratacao, Vaga.titulo, Empresa.cidade, Empresa.fantasia FROM Candidatura
			INNER JOIN Vaga ON Candidatura.Vaga_idVaga=Vaga.idVaga INNER JOIN Empresa ON Vaga.Empresa_idEmpresa=Empresa.idEmpresa
			WHERE Candidatura.contratado='S' LIMIT {$limite}";

	$resultado = mysqli_query($conexao, $query);

	while ($contratado = mysqli_fetch_assoc($resultado)) {
		array_push($arrayContratacoes, $contratado);
	}

	return $arrayContratacoes;
}

function removerTokenRecuperaLogin($conexao, $where, $id) {

	$query = "DELETE FROM RecuperaLogin WHERE {$where}={$id}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function vagasParaDispararEmail($conexao) {
	$vagas = array();

	$query = "SELECT * FROM DisparaEmail";

	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
	return $vagas;
}

function removeEmailEnviado($conexao, $email) {
	$query = "DELETE FROM DisparaEmail WHERE email_candidato='{$email}'";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

?>
