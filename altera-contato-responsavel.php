<?php
require_once("logica-candidato.php");
verificaCandidato();

$selectResponsavel = buscaUmRegistro($conexao, $usuarioAtual["Responsavel_idResponsavel"], "Responsavel", "idResponsavel");
?>

<div class="border-bottom border-primary" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Responsável</h4>
  <p class="text-left font-weight-normal">Altere ou inclua um responsável</p>
</div>

<div>
	<form onsubmit="return validaAlteraResponsavel();" method="post" action="update-candidato.php?responsavel" style="min-width: 300px; max-width: 300px; padding-top: 15px;">
		<input type="hidden" name="confirmaUpdate" value="yes">
		<div class="form-group">
	      	<label id="idLabelNomeResponsavel" for="idNomeResponsavel">Responsável</label>
	      	<input type="text" class="form-control" id="idNomeResponsavel" name="nomeResponsavel" value="<?php echo $selectResponsavel["nome"]; ?>" placeholder="Nome" maxlength="50">
	      	<small id="idSmallNomeResponsavel" class="form-text text-muted"></small>
	    </div>
	    <div class="form-group">
	      	<label id="idLabelCpfResponsavel" for="idCpfResponsavel">CPF</label>
	      	<input type="text" class="form-control" value="<?php echo $selectResponsavel["cpf"]; ?>" name="cpfResponsavel" id="idCpfResponsavel">
	      	<small id="idSmallCpfResponsavel" class="form-text text-muted"></small>
	    </div>
	    <div class="form-group">
	      	<label id="idLabelContatoResponsavel" for="idContatoResponsavel">Contato</label>
	      	<input type="text" class="form-control" value="<?php echo $selectResponsavel["contato"]; ?>" id="idContatoResponsavel" name="contatoResponsavel" placeholder="Fixo ou celular">
	      	<small id="idSmallContatoResponsavel" class="form-text text-muted"></small>
	    </div>
	    <div class="form-group">
	      	<label id="idLabelEmailResponsavel" for="idEmailResponsavel">Email</label>
	      	<input type="text" class="form-control" value="<?php echo $selectResponsavel["email"]; ?>" id="idEmailResponsavel" name="emailResponsavel" maxlength="45">
	      	<small id="idSmallEmailResponsavel" class="form-text text-muted"></small>
	    </div>
	    <div class="form-group">
	      	<label id="idLabelNascResponsavel" for="idNascResponsavel">Data de nascimento</label>
	      	<input type="text" class="form-control" value="<?php echo $selectResponsavel["data_nascimento"]; ?>" name="nascResponsavel" id="idNascResponsavel">
	      	<small id="idSmallNascResponsavel" class="form-text text-muted"></small>
	    </div>
	 	<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>   
	</form>
</div>