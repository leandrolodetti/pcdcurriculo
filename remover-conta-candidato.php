<?php
require_once("cabecalho.php");
verificaCandidato();
?>
<div class="border-bottom border-success" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Remover Conta</h4>
</div>

<div style="padding-top: 10px;">
	<h4 class="text-left font-weight-bold">Confirma exclusão da conta ?</h4>
	<p class="text-left font-weight-bold text-danger">Todos os dados serão excluídos</p>
</div>

<form onsubmit="return validaRemover();" method="post" action="update-candidato.php?remover-conta" style="padding-top: 5px; min-width: 300px; max-width: 300px;">
	<div class="form-group form-check">
    	<input type="checkbox" class="form-check-input" id="idConfirmaExclusao" name="confirmaExclusao" value="yes">
    	<label class="form-check-label" for="idConfirmaExclusao">Sim</label>
    	<small id="idSmallConfirmaExclusao" class="form-text text-danger"></small>
  	</div>

	<button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Confirmar</button>
	<a class="btn btn-primary" href="altera-dados-candidato.php">Cancelar</a>
</form>