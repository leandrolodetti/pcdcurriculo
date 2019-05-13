<?php

function listaCategoriaVaga($conexao, $idVaga) {
	$query = "SELECT Categoria.idCategoria, Categoria.descricao FROM Categoria
			INNER JOIN Vaga ON Categoria.idCategoria = Vaga.Categoria_idCategoria
			WHERE Vaga.idVaga = {$idVaga}";
	$resultado = mysqli_query($conexao, $query);
	return mysqli_fetch_assoc($resultado);
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

function listaVagasPorTitulo($conexao, $parametro, $cidade) {
	foreach ($cidade as $cid) {
		$filtroCity = $filtroCity."AND Empresa.cidade LIKE '%{$cid}%'";
	}
	$vagas = array();
	$query = "SELECT Vaga.titulo, Vaga.descricao, Vaga.idVaga, Vaga.ativa, Vaga.data_atualizacao, Nivel.descricao AS nivel, 
				Categoria.descricao AS categoria, Empresa.fantasia, Empresa.cidade 
		FROM ((Vaga INNER JOIN Nivel ON Nivel.idNivel = Vaga.Nivel_idNivel)
		INNER JOIN Categoria ON Categoria.idCategoria = Vaga.Categoria_idCategoria)
		INNER JOIN Empresa ON Vaga.Empresa_idEmpresa = Empresa.idEmpresa
		WHERE Vaga.titulo LIKE '%{$parametro}%' AND Vaga.ativa='S'".$filtroCity;
	$resultado = mysqli_query($conexao, $query);

	while ($vaga = mysqli_fetch_assoc($resultado)) {
		array_push($vagas, $vaga);
	}
	return $vagas;
}

function listaRestricaoDeficiencia($conexao, $id) {
	$restricoes = array();
	$query = "SELECT Vaga.idVaga, Restricaodeficiencia.idRestricaoDeficiencia, Tiposdeficiencia.tipo_deficiencia FROM ((Vaga
			INNER JOIN Restricaodeficiencia ON Restricaodeficiencia.Vaga_idVaga = Vaga.idVaga)
			INNER JOIN Tiposdeficiencia ON Restricaodeficiencia.TiposDeficiencia_idTiposDeficiencia = Tiposdeficiencia.idTiposDeficiencia)
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
	$query = "insert into Restricaodeficiencia(TiposDeficiencia_idTiposDeficiencia, Vaga_idVaga) values({$idDeficiencia}, {$idVaga})";
	$resultado = mysqli_query($conexao, $query);
	return $resultado;
}

function deleteRestricoes($conexao, $idVaga) {
	$query = "DELETE FROM Restricaodeficiencia
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