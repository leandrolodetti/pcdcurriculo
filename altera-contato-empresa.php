<?php
require_once("logica-empresa.php");
verificaEmpresa();
?>

<div class="border-bottom border-success" style="padding-top: 20px;">
    <h4 class="text-left font-weight-normal">Contato</h4>
    <p class="text-left font-weight-normal">Altere seus dados de contato</p>
</div>

<form action="update-empresa.php?contato" method="post" onsubmit="return validaFormAlteraContato();">
    <div class="row">
        <div class="col-sm">
        	<input type="hidden" name="confirmaUpdate" value="yes">

         	<div class="form-group">
         		<label for="idAlteraContato">Contato</label>
         		<input type="text" value="<?php echo $usuarioAtual ["contato"]; ?>" class="form-control" id="idAlteraContato" name="contato" style="min-width: 200px; max-width: 200px;">
                <small id="idSmallAlteraContato" class="form-text text-danger"></small>
         	</div>

         	<div class="form-group">
         		<label for="cep">CEP</label>
         		<input type="text" class="form-control" name="cep" value="<?php echo $usuarioAtual ["cep"]; ?>" onblur="pesquisacep();" id="cep" style="min-width: 200px; max-width: 200px;">
         		<small id="idSmallCep" class="form-text text-danger"></small>
         	</div>

         	<div class="form-group">
         		<label for="cidade">Cidade</label>
         		<input type="text" class="form-control" name="cidade" value="<?php echo $usuarioAtual ["cidade"]; ?>" readonly="readonly" id="cidade" style="min-width: 300px; max-width: 300px;">
         	</div>

         	<div class="form-group">
         		<label for="uf">Estado</label>
         		<input type="text" class="form-control" name="estado" value="<?php echo $usuarioAtual ["estado"]; ?>" readonly="readonly" id="uf" style="min-width: 100px; max-width: 100px;">
         	</div>
        </div>

    <div class="col-sm">

    	<div class="form-group">
    		<label for="rua">Endereço</label>
    		<input type="text" name="logradouro" value="<?php echo $usuarioAtual ["logradouro"]; ?>" class="form-control" id="rua" style="min-width: 300px; max-width: 300px;">
            <small id="idSmallAlteraLogradouro" class="form-text text-danger"></small>
    	</div>
    	<div class="form-group">
    	  <label for="idAlteraContatoNumero">Número</label>
    	  <input type="text" class="form-control" name="numero" value="<?php echo $usuarioAtual ["num_logradouro"]; ?>" id="idAlteraContatoNumero" style="min-width: 100px; max-width: 100px;">
          <small id="idSmallNumero" class="form-text text-danger"></small>
    	</div>
    	<div class="form-group">
    	    <label for="bairro">Bairro</label>
    	    <input type="text" class="form-control" name="bairro" value="<?php echo $usuarioAtual ["bairro"]; ?>" id="bairro" style="min-width: 300px; max-width: 300px;">
            <small id="idSmallBairro" class="form-text text-danger"></small>
    	</div>
    	<div class="form-group">
    	    <label for="idAlteraContatoComplemento">Complemento</label>
    	    <input type="text" name="complemento" class="form-control" value="<?php echo $usuarioAtual ["complemento"]; ?>" id="idAlteraContatoComplemento" style="min-width: 300px; max-width: 300px;">
    	</div>

    </div>

  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>