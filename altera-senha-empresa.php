<?php
require_once("logica-empresa.php");
verificaEmpresa();
?>
<div class="border-bottom border-primary" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Senha</h4>
  <p class="text-left font-weight-normal">Altere sua senha</p>
</div>

<div>
	<form method="post" onsubmit="return validaAlteraSenha();" action="update-empresa.php?senha" style="min-width: 300px; max-width: 300px; padding-top: 15px;">
		<input type="hidden" name="confirmaUpdate" value="yes">
			<div class="form-group">
				<label for="idAlteraSenhaAtual">Senha Atual</label>
				<input type="password" maxlength="15" name="senhaAtual" class="form-control" id="idAlteraSenhaAtual">
				<small id="idSmallAlteraSenha" class="form-text text-muted"></small>
			</div>
		
			<div class="form-group">
				<label for="idAlteraNovaSenha">Nova Senha</label>
				<input type="password" maxlength="15" class="form-control" name="senha" id="idAlteraNovaSenha">
				<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
				<small id="idSmallAlteraNovaSenha" class="form-text text-muted"></small>
			</div>
		
			<div class="form-group">
				<label for="idConfirmarAlteraSenha">Confirmar Senha</label>
				<input type="password" maxlength="15" name="senha2" class="form-control" id="idConfirmarAlteraSenha">
				<small id="idSmallConfirmaAlteraSenha" class="form-text text-muted"></small>
			</div>
			<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
	</form>
</div>