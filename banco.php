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

?>
