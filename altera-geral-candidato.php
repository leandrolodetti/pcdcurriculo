<?php
require_once("logica-candidato.php");
verificaCandidato();
?>
<div class="border-bottom border-success" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Configurações básicas</h4>
  <p class="text-left font-weight-normal">Altere suas configurações básicas</p>
</div>

<form style="padding-top: 15px; min-width: 300px; max-width: 300px;">

  <div class="form-group">
    <label for="idAlteraNomeCandidato">Candidato</label>
    <input type="text" class="form-control" id="idAlteraNomeCandidato" value="<?php echo $candidatoAtual ["nome"]; ?>" name="nome">
  </div>

  <div class="form-group">
      <label for="idAlteraSobrenomeCandidato">Sobrenome</label>
      <input type="text" class="form-control" value="<?php echo $candidatoAtual ["sobrenome"]; ?>" name="sobrenome" id="idAlteraSobrenomeCandidato">
  </div>

  <div class="form-group">
    <label for="idAlteraEmailCandidato">E-mail</label>
    <input type="txt" class="form-control" value="<?php echo $candidatoAtual ["email"]; ?>" id="idAlteraEmailCandidato">
  </div>

  <div class="form-group">
    <label for="idConfirmarEmailAlteradoCandidato">Confirmar E-mail</label>
    <input type="txt" class="form-control" id="idConfirmarEmailAlteradoCandidato">
  </div>

  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>