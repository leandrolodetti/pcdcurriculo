<?php
require_once("logica-empresa.php");
//verificaEmpresa();
?>
<div class="border-bottom border-success" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Configurações básicas</h4>
  <p class="text-left font-weight-normal">Altere as configurações básicas</p>
</div>

<form action="update-empresa.php?altera_geral" method="post" onsubmit="return validaAlteraGeralEmpresa();" style="padding-top: 15px; min-width: 300px; max-width: 300px;">

  <div class="form-group">
    <label for="idAlteraRazaoSocial">Razão Social</label>
    <input type="text" class="form-control" id="idAlteraRazaoSocial" value="<?php echo $usuarioAtual ["razao_social"]; ?>" name="razao_social">
    <small id="idSmallRazaoSocial" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
      <label for="idAlteraFantasia">Fantasia</label>
      <input type="text" class="form-control" value="<?php echo $usuarioAtual ["fantasia"]; ?>" name="fantasia" id="idAlteraFantasia">
      <small id="idSmallFantasia" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
  	<label for="idAlteraCnpj">CNPJ</label>
  	<input type="text" class="form-control" value="<?php echo $usuarioAtual ["cnpj"]; ?>" name="cnpj" id="idAlteraCnpj">
    <small id="idSmallCnpj" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="idAlteraEmailEmpresa">E-mail</label>
    <input type="txt" class="form-control" value="<?php echo $usuarioAtual ["email"]; ?>" name="emailEmpresa" id="idAlteraEmailEmpresa">
    <small id="idSmallEmailEmpresa" class="form-text text-muted"></small>
  </div>

  <div class="form-group">
    <label for="idConfirmarEmailEmpresa">Confirmar E-mail</label>
    <input type="txt" class="form-control" id="idConfirmarEmailEmpresa">
    <small id="idSmallConfirmaEmailEmpresa" class="form-text text-muted"></small>
  </div>

  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>