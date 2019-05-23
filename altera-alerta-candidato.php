<?php
require_once("logica-candidato.php");
verificaCandidato();

$checkSim = "";
$checkNao = "";

if ($usuarioAtual["recebe_vagas"] == "S") {
	$checkSim = "checked='checked'";
}
else {
	$checkNao = "checked='checked'";
}

?>
<div class="border-bottom border-success" style="padding-top: 25px; padding-bottom: 25px;">
  <h4 class="text-left font-weight-normal">Alerta de Vagas</h4>
  <p class="text-left font-weight-normal">O alerta de vagas envia através do seu email, as últimas vagas publicadas no pnevagas.com.br de acordo com o perfil de seu currículo.</p>
</div>

<h5 class="text-left font-weight-bold">Deseja receber alertas de vagas?</h5>

<form method="post" action="update-candidato.php?recebe_vagas">
	<div class="form-group">
		<input type="hidden" name="confirmaUpdate" value="yes">
		<div class="form-check">
			<input class="form-check-input" <?php echo $checkSim; ?> type="radio" name="gridRecebeVagas" id="idRecebeSim" value="S">
			<label class="form-check-label" for="idRecebeSim">Sim, quero receber alertas de vagas no meu e-mail.</label>
		</div>

		<div class="form-check">
			<input class="form-check-input" <?php echo $checkNao; ?> type="radio" name="gridRecebeVagas" id="idRecebeNao" value="N">
			<label class="form-check-label" for="idRecebeNao">Não, não quero receber alertas de vagas no meu e-mail.</label>
		</div>
	</div>
		<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>

</form>