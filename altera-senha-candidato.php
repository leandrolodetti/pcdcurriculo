<?php
require_once("logica-candidato.php");
verificaCandidato();
?>
<div class="border-bottom border-primary" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Senha</h4>
  <p class="text-left font-weight-normal">Altere sua senha</p>
</div>

<div>
	<form style="min-width: 300px; max-width: 
				300px; padding-top: 15px;">
		
			<div class="form-group">
				<label for="idConfirmarSenhaAlteraCandidato">Senha Atual</label>
				<input type="passwd" name="senha2" class="form-control" id="idAlteraSenhaAtual">
			</div>
		
			<div class="form-group">
				<label for="idAlteraSenha1Candidato">Nova Senha</label>
				<input type="passwd" class="form-control" name="senha1" id="idAlteraSenha1Candidato">
				<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
			</div>
		
			<div class="form-group">
				<label for="idConfirmarSenhaAlteraCandidato">Confirmar Senha</label>
				<input type="passwd" name="senha2" class="form-control" id="idConfirmarSenhaAlteraCandidato">
			</div>
		
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
	</form>
</div>