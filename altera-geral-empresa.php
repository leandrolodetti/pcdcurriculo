<?php
require_once("logica-empresa.php");
verificaEmpresa();
?>

<div class="border-bottom border-success" style="padding-top: 20px;">
    <h4 class="text-left font-weight-normal">Configurações básicas</h4>
    <p class="text-left font-weight-normal">Altere as configurações básicas</p>
</div>

<form action="update-empresa.php?altera_geral" method="post" onsubmit="return validaAlteraGeralEmpresa();">
    <input type="hidden" name="confirmaUpdate" value="yes">
    <div class="row">
        <div class="col-sm">
            <div class="form-group">
                <label for="idAlteraRazaoSocial">Razão Social</label>
                <input type="text" class="form-control" id="idAlteraRazaoSocial" maxlength="50" value="<?php echo $usuarioAtual ["razao_social"]; ?>" name="razao_social" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallRazaoSocial" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="idAlteraFantasia">Fantasia</label>
                <input type="text" class="form-control" maxlength="50" value="<?php echo $usuarioAtual ["fantasia"]; ?>" name="fantasia" id="idAlteraFantasia" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallFantasia" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="idAlteraResponsavelRh">Responsável RH</label>
                <input type="text" class="form-control" maxlength="50" value="<?php echo $usuarioAtual ["responsavel"]; ?>" name="responsavelRh" id="idAlteraResponsavelRh" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraResponsavelRh" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="idAlteraRamo">Rama de Atividade</label>
                <input type="text" class="form-control" maxlength="50" value="<?php echo $usuarioAtual ["ramo_atividade"]; ?>" name="ramoAtividade" id="idAlteraRamo" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallAlteraRamo" class="form-text text-muted"></small>
            </div>
        </div>

        <div class="col-sm">
            <div class="form-group">
                <label for="idAlteraCnpj">CNPJ</label>
                <input type="text" class="form-control" value="<?php echo $usuarioAtual ["cnpj"]; ?>" name="cnpj" id="idAlteraCnpj" style="min-width: 200px; max-width: 200px;">
                <small id="idSmallCnpj" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="idAlteraEmailEmpresa">E-mail</label>
                <input type="txt" class="form-control" maxlength="45" value="<?php echo $usuarioAtual ["email"]; ?>" name="emailEmpresa" id="idAlteraEmailEmpresa" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallEmailEmpresa" class="form-text text-muted"></small>
            </div>

            <div class="form-group">
                <label for="idConfirmarEmailEmpresa">Confirmar E-mail</label>
                <input type="txt" class="form-control" maxlength="45" id="idConfirmarEmailEmpresa" style="min-width: 300px; max-width: 300px;">
                <small id="idSmallConfirmaEmailEmpresa" class="form-text text-muted"></small>
            </div>
        </div>    
    </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>