<?php

function listaVagaEmpresa($conexao, $idVaga) {
	$query = "SELECT * FROM Vaga INNER JOIN Empresa ON Vaga.Empresa_idEmpresa=Empresa.idEmpresa WHERE idVaga={$idVaga}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function listaUltimasVagas($conexao, $limite) {
	$vagas = array();
	$query = "SELECT * FROM Vaga WHERE ativa='S' ORDER BY data_atualizacao DESC LIMIT {$limite}";

	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
	return $vagas;
}

function contratarCandidato($conexao, $idCandidato, $idVaga, $data) {
	$query = "UPDATE Candidatura SET contratado='S', data_contratacao='{$data}'
			WHERE Candidato_idCandidato={$idCandidato} AND Vaga_idVaga={$idVaga}";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function listaCategoriaVaga($conexao, $idVaga) {
	$query = "SELECT Categoria.idCategoria, Categoria.descricao FROM Categoria
			INNER JOIN Vaga ON Categoria.idCategoria = Vaga.Categoria_idCategoria
			WHERE Vaga.idVaga = {$idVaga}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function listaCandidaturaCandidato($conexao, $idEmpresa) {
	$candidaturas = array();
	$query = "SELECT Candidatura.Vaga_idVaga, Candidato.nome, Candidatura.data_candidatura, Candidatura.Candidato_idCandidato,
				Candidatura.data_contratacao, Vaga.titulo FROM Candidatura INNER JOIN Candidato ON Candidatura.Candidato_idCandidato=Candidato.idCandidato
				INNER JOIN Vaga ON Candidatura.Vaga_idVaga=Vaga.idVaga
				WHERE Vaga.Empresa_idEmpresa={$idEmpresa}";

	$resultado = mysqli_query($conexao, $query);

	while ($candidatura = mysqli_fetch_assoc($resultado)) {
		array_push($candidaturas, $candidatura);
	}
	return $candidaturas;
}

function buscaCurriculo($conexao, $idCandidato) {
	$query = "SELECT Candidato.nome AS nome_candidato, Candidato.sobrenome AS sobrenome_candidato, Curriculo.salario, Curriculo.area,
				Categoria.descricao AS desc_categoria, Candidato.logradouro, Candidato.num_logradouro, Candidato.cep, Candidato.cidade,
				Candidato.estado, Candidato.bairro, Candidato.email AS email_candidato, Candidato.contato AS contato_candidato,
				Candidato.cpf AS cpf_candidato, Candidato.estado_civil, Candidato.data_nascimento AS nasc_candidato, Candidato.cid10,
				Curriculo.objetivo, Nivel.descricao AS nivel_descricao, Curriculo.resumo_profissional, Curriculo.nivel_escolar,
				Curriculo.graduacao, Curriculo.curso_complemento, Curriculo.idiomas, Curriculo.historico_profissional,
				Candidato.Responsavel_idResponsavel, Responsavel.nome AS nome_responsavel, Responsavel.cpf AS cpf_responsavel,
				Responsavel.contato AS contato_responsavel, Responsavel.email AS email_responsavel
				FROM Candidato INNER JOIN Responsavel ON Responsavel.idResponsavel=Candidato.Responsavel_idResponsavel
				INNER JOIN Curriculo ON Curriculo.Candidato_idCandidato=Candidato.idCandidato
                INNER JOIN Categoria ON Categoria.idCategoria=Curriculo.area
                INNER JOIN Nivel ON Nivel.idNivel=Curriculo.nivel_area
				WHERE Candidato.idCandidato={$idCandidato}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);			
}

function listaCandidatoEnviarEmail($conexao, $categoria, $nivel, $cidade, $palavrasChaves, $arrayRestricoes) {
	
	$arrayLike = " Curriculo.objetivo LIKE ''";

	foreach ($palavrasChaves as $chave) {
		$arrayLike = $arrayLike." OR Curriculo.objetivo LIKE '%{$chave}%'";
	}
	
	$candidatos = array();

	$query = "SELECT Candidato.email, Deficiencia.TiposDeficiencia_idTiposDeficiencia FROM Candidato INNER JOIN Curriculo ON Curriculo.Candidato_idCandidato=Candidato.idCandidato INNER JOIN Deficiencia ON Deficiencia.Candidato_idCandidato=Candidato.idCandidato WHERE Candidato.recebe_vagas='S' AND Curriculo.area='{$categoria}' AND Curriculo.nivel_area='{$nivel}' AND Candidato.cidade='{$cidade}' AND (".$arrayLike." )";

	$resultado = mysqli_query($conexao, $query);

	while ($candidato = mysqli_fetch_assoc($resultado)) {
		array_push($candidatos, $candidato);
	}

	$listaEmail = $candidatos;
	$arrayDispararEmail = array();

	foreach ($listaEmail as $lista) {
		foreach ($arrayRestricoes as $rest) {
			if ($rest != $lista["TiposDeficiencia_idTiposDeficiencia"]) {
				if (in_array($lista["email"], $arrayDispararEmail)) {
					$c=1;
				}
				else {
					array_push($arrayDispararEmail, $lista["email"]);
				}
			}
		}
	}
	
	foreach ($listaEmail as $lista) {
		foreach ($arrayRestricoes as $rest) {
			if ($rest == $lista["TiposDeficiencia_idTiposDeficiencia"]) {
				$key = array_search($lista["email"], $arrayDispararEmail);
				if($key !== false){
    				unset($arrayDispararEmail[$key]);
				}
			}
		}
	}
	return $arrayDispararEmail;
}

function listaNivelVaga($conexao, $idNivel) {
	$query = "SELECT Nivel.idNivel, Nivel.descricao FROM Nivel
			INNER JOIN Vaga ON Vaga.Nivel_idNivel = Nivel.idNivel
			WHERE Vaga.idVaga = {$idNivel}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function listaUmaVaga($conexao, $id) {
	$query = "SELECT * FROM Vaga WHERE idVaga = {$id}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function listaVagasPorTitulo($conexao, $parametro, $cidade, $categoria, $nivel) {
	foreach ($cidade as $cid) {
		$filtroCity = $filtroCity."AND Empresa.cidade LIKE '%{$cid}%'";
	}
	foreach ($categoria as $cat) {
		$filtroCat = $filtroCat."AND Categoria.descricao LIKE '%{$cat}%'";
	}
	foreach ($nivel as $niv) {
		$filtroNiv = $filtroNiv."AND Nivel.descricao LIKE '%{$niv}%'";
	}

	$vagas = array();
	$query = "SELECT Vaga.titulo, Vaga.descricao, Vaga.idVaga, Vaga.ativa, Vaga.data_atualizacao, Nivel.descricao AS nivel, 
				Categoria.descricao AS categoria, Empresa.fantasia, Empresa.cidade 
		FROM ((Vaga INNER JOIN Nivel ON Nivel.idNivel = Vaga.Nivel_idNivel)
		INNER JOIN Categoria ON Categoria.idCategoria = Vaga.Categoria_idCategoria)
		INNER JOIN Empresa ON Vaga.Empresa_idEmpresa = Empresa.idEmpresa
		WHERE Vaga.titulo LIKE '%{$parametro}%' AND Vaga.ativa='S' AND Empresa.ativa='S' ".$filtroCity.$filtroCat.$filtroNiv;
	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
	return $vagas;
}

function listaRestricaoDeficiencia($conexao, $id) {
	$restricoes = array();
	$query = "SELECT Vaga.idVaga, RestricaoDeficiencia.idRestricaoDeficiencia, TiposDeficiencia.tipo_deficiencia FROM ((Vaga
			INNER JOIN RestricaoDeficiencia ON RestricaoDeficiencia.Vaga_idVaga = Vaga.idVaga)
			INNER JOIN TiposDeficiencia ON RestricaoDeficiencia.TiposDeficiencia_idTiposDeficiencia = TiposDeficiencia.idTiposDeficiencia)
			WHERE Vaga.idVaga = {$id}";
	$resultado = mysqli_query($conexao, $query);

	while ($restricao = mysqli_fetch_assoc($resultado)) {
		array_push($restricoes, $restricao);
	}
	return $restricoes;
}

function listaVagas($conexao, $idEmpresa) {
	$vagas = array();
	$query = "SELECT idVaga, titulo, data_atualizacao, ativa FROM Vaga WHERE Empresa_idEmpresa = {$idEmpresa}";
	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
	return $vagas;
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

function insereEmpresa($conexao, $cnpj, $fantasia, $razao_social, $contato,
				   		 $email, $cep, $estado, $cidade, $logradouro,
				   	     $num_logradouro, $bairro, $complemento, $ramo_atividade, $senhaMd5,
				   		 $responsavel, $ativa) {
    $query = "insert into Empresa(cnpj, fantasia, razao_social, contato, email, cep, estado, cidade,
    								logradouro, num_logradouro, bairro, complemento, ramo_atividade, senha, responsavel, ativa)
    		  values('{$cnpj}', '{$fantasia}', '{$razao_social}', '{$contato}',
    		  		  '{$email}', '{$cep}', '{$estado}', '{$cidade}', '{$logradouro}',
    		  		  '{$num_logradouro}', '{$bairro}', '{$complemento}', '{$ramo_atividade}', '{$senhaMd5}',
    		  		  '{$responsavel}', '{$ativa}')";

    $resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function ativarEmpresa($conexao, $fantasia, $razao_social, $contato,
				   		 $email, $cep, $estado, $cidade, $logradouro,
				   	     $num_logradouro, $bairro, $complemento, $ramo_atividade, $senhaMd5,
				   		 $responsavel, $ativa, $idEmpresa) {
	$query = "UPDATE Empresa SET fantasia='{$fantasia}', razao_social='{$razao_social}', contato='{$contato}', email='{$email}',
				cep='{$cep}', estado='{$estado}', cidade='{$cidade}', logradouro='{$logradouro}', num_logradouro='{$num_logradouro}',
				bairro='{$bairro}', complemento='{$complemento}', ramo_atividade='{$ramo_atividade}', senha='{$senhaMd5}',
				responsavel='{$responsavel}', ativa='{$ativa}'
				WHERE idEmpresa = {$idEmpresa}";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;			
}

function updateVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios,
					$salario, $cargaHoraria, $data, $idEmpresa,
					$categoria, $nivel, $idVaga, $ativa) {
	$query = "UPDATE Vaga SET titulo='{$titulo}', descricao='{$descricaoVaga}', requisitos='{$requisitoVaga}', beneficios='{$beneficios}',
				salario='{$salario}', carga_horaria='{$cargaHoraria}', data_atualizacao='{$data}', Empresa_idEmpresa={$idEmpresa},
				Categoria_idCategoria={$categoria}, Nivel_idNivel={$nivel}, ativa='{$ativa}'
				WHERE idVaga = {$idVaga}";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function insereVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios,
					$salario, $cargaHoraria, $data, $idEmpresa,
					$categoria, $nivel, $ativa) {
	$query = "INSERT INTO Vaga(titulo, descricao, requisitos, beneficios, salario, carga_horaria,
						  data_atualizacao, Empresa_idEmpresa, Categoria_idCategoria, Nivel_idNivel, ativa)
				VALUES('{$titulo}', '{$descricaoVaga}', '{$requisitoVaga}', '{$beneficios}',
					   '{$salario}', '{$cargaHoraria}', '{$data}',
					    {$idEmpresa}, {$categoria}, {$nivel}, '{$ativa}')";
	$resultadoDaInsercao = mysqli_query($conexao, $query);
    return $resultadoDaInsercao;
}

function buscaVagasAtivas($conexao, $titulo, $idEmpresa) {
	$query = "SELECT * FROM Vaga WHERE titulo = '{$titulo}' AND Empresa_idEmpresa = {$idEmpresa} AND ativa='S'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaVagaRepetida($conexao, $titulo, $idEmpresa) {
	$query = "SELECT * FROM Vaga WHERE titulo = '{$titulo}' AND Empresa_idEmpresa = {$idEmpresa}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmailEmpresa($conexao, $email) {
	$email = mysqli_escape_string($conexao, $email);
	$query = "select * from Empresa where email = '{$email}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaIdVaga($conexao, $titulo, $idEmpresa) {
	$query = "SELECT idVaga FROM Vaga WHERE titulo = '{$titulo}' AND Empresa_idEmpresa = {$idEmpresa}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function buscaEmpresaAtual($conexao, $cnpj) {
	$query = "select * from Empresa where cnpj = '{$cnpj}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function insereRestricoes($conexao, $idDeficiencia, $idVaga) {
	$query = "insert into RestricaoDeficiencia(TiposDeficiencia_idTiposDeficiencia, Vaga_idVaga) values({$idDeficiencia}, {$idVaga})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function deleteRestricoes($conexao, $idVaga) {
	$query = "DELETE FROM RestricaoDeficiencia
				WHERE Vaga_idVaga = {$idVaga}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function buscaEmpresa($conexao, $cnpj, $senha) {
	$cnpj = mysqli_escape_string($conexao, $cnpj);
	//$senhaMd5 = md5($senha);
	$query = "select * from Empresa where cnpj = '{$cnpj}' and senha = '{$senha}'";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
}

function updateGeralEmpresa($conexao, $razao_social, $fantasia, $emailEmpresa, $cnpj, $responsavelRh, $ramoAtividade, $idEmpresa) {
	$query = "UPDATE Empresa SET razao_social='{$razao_social}', fantasia='{$fantasia}', email='{$emailEmpresa}',
			cnpj='{$cnpj}', responsavel='{$responsavelRh}', ramo_atividade='{$ramoAtividade}'
			WHERE idEmpresa={$idEmpresa}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function updateContatoEmpresa($conexao, $contato, $cep, $cidade, $estado, $logradouro, $numero, $bairro, $complemento, $idEmpresa) {
	$query = "UPDATE Empresa SET contato='{$contato}', cep='{$cep}', cidade='{$cidade}', estado='{$estado}',
			logradouro='{$logradouro}', num_logradouro='{$numero}', bairro='{$bairro}', complemento='{$complemento}'
			WHERE idEmpresa={$idEmpresa}";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function insereReplaceDisparaEmail($conexao, $email, $titulo, $idVaga) {
	$query = "REPLACE INTO DisparaEmail(email_candidato, titulo_vaga, Vaga_idVaga)
			VALUES('{$email}', '{$titulo}', {$idVaga})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;		
}

function insertUpdateTokenEmpresa($conexao, $chavePrivada, $idEmpresa) {
	$query = "REPLACE INTO RecuperaLogin(token, data_criacao, Empresa_idEmpresa)
			VALUES('{$chavePrivada}', now(), {$idEmpresa})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}