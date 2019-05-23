<?php
require_once("logica-candidato.php");
verificaCandidato();
?>
<div class="border-bottom border-primary" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Senha</h4>
  <p class="text-left font-weight-normal">Altere sua senha</p>
</div>

<div>
	<form method="post" onsubmit="return validaAlteraSenhaCandidato();" action="update-candidato.php?senha" style="min-width: 300px; max-width: 300px; padding-top: 15px;">
		<input type="hidden" name="confirmaUpdate" value="yes">
			<div class="form-group">
				<label for="idAlteraSenhaAtual">Senha Atual</label>
				<input type="password" name="senhaAtual" class="form-control" id="idAlteraSenhaAtual">
				<small id="idSmallSenhaCandidato" class="form-text text-muted"></small>
			</div>
		
			<div class="form-group">
				<label for="idAlteraSenhaCandidato">Nova Senha</label>
				<input type="password" class="form-control" name="senha" id="idAlteraSenhaCandidato">
				<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
				<small id="idSmallAlteraSenhaCandidato" class="form-text text-muted"></small>
			</div>
		
			<div class="form-group">
				<label for="idConfirmarSenhaAlteraCandidato">Confirmar Senha</label>
				<input type="password" name="senha2" class="form-control" id="idConfirmarSenhaAlteraCandidato">
				<small id="idSmallConfirmaSenhaCandidato" class="form-text text-muted"></small>
			</div>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
	</form>
</div>