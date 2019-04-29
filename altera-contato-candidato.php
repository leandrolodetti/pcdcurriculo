<?php
require_once("logica-candidato.php");
verificaCandidato();
?>
<div class="border-bottom border-success" style="padding-top: 25px;">
  <h4 class="text-left font-weight-normal">Contato</h4>
  <p class="text-left font-weight-normal">Altere seus dados de contato</p>
</div>

<form action="candidato.php" method="post" onsubmit="return validaFormAlteraContato();">
  <div class="row">
    <div class="col-sm">
			
 			<div class="form-group">
 				<label for="idAlteraContatoCandidato">Contato</label>
 				<input type="text" value="<?php echo $candidatoAtual ["contato"]; ?>" class="form-control" id="idAlteraContatoCandidato" name="contato" style="min-width: 200px; max-width: 200px;">
 			</div>

 			<div class="form-group">
 				<label for="cep">CEP</label>
 				<input type="text" class="form-control" value="<?php echo $candidatoAtual ["cep"]; ?>" onblur="pesquisacep();" id="cep" style="min-width: 200px; max-width: 200px;">
 				<small id="idSmallCep" class="form-text text-danger"></small>
 			</div>

 			<div class="form-group">
 				<label for="cidade">Cidade</label>
 				<input type="text" class="form-control" value="<?php echo $candidatoAtual ["cidade"]; ?>" readonly="readonly" id="cidade" style="min-width: 300px; max-width: 300px;">
 			</div>

 			<div class="form-group">
 				<label for="uf">Estado</label>
 				<input type="text" class="form-control" value="<?php echo $candidatoAtual ["estado"]; ?>" readonly="readonly" id="uf" style="min-width: 100px; max-width: 100px;">
 			</div>

    </div>

    <div class="col-sm">

    	<div class="form-group">
    		<label for="rua">Endereço</label>
    		<input type="text" value="<?php echo $candidatoAtual ["logradouro"]; ?>" class="form-control" id="rua">
    	</div>
    	<div class="form-group">
    	  <label for="idAlteraContatoCandidatoNumero">Número</label>
    	  <input type="text" class="form-control" value="<?php echo $candidatoAtual ["num_logradouro"]; ?>" id="idAlteraContatoCandidatoNumero" style="min-width: 100px; max-width: 100px;">
    	</div>
    	<div class="form-group">
    	    <label for="bairro">Bairro</label>
    	    <input type="text" class="form-control" value="<?php echo $candidatoAtual ["bairro"]; ?>" id="bairro" style="min-width: 300px; max-width: 300px;">
    	</div>
    	<div class="form-group">
    	    <label for="idAlteraContatoCandidatoComplemento">Complemento</label>
    	    <input type="text" class="form-control" value="<?php echo $candidatoAtual ["complemento"]; ?>" id="idAlteraContatoCandidatoComplemento" style="min-width: 300px; max-width: 300px;">
    	</div>

    </div>

  </div>
  <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Salvar</button>
</form>






<!--form style="padding-top: 15px;">
	
	<div class="form-row">
		<div class="form-group col-md-3">
			<label for="idAlteraContatoCandidato">Contato</label>
			<input type="text" class="form-control" id="idAlteraContatoCandidato" name="contato" style="min-width: 200px;">
		</div>
	</div>
	
	<div class="form-row">	
		<div class="form-group col-md-4">
			<label for="cep">CEP</label>
			<input type="text" class="form-control" onblur="pesquisacep(this.value);" id="cep" style="min-width: 200px;">
		</div>

		<div class="form-group col-md-6">
			<label for="cidade">Cidade</label>
			<input type="text" class="form-control" readonly="readonly" id="cidade">
		</div>

 		<div class="form-group col-md-2">
			<label for="uf">Estado</label>
			<input type="text" class="form-control" readonly="readonly" id="uf">
		</div>
	</div>

	<div class="form-row">
		<div class="form-group col-md-9">
			<label for="rua">Endereço</label>
			<input type="text" class="form-control" id="rua">
		</div>

		<div class="form-group col-md-3">
		  <label for="idAlteraContatoCandidatoNumero">Número</label>
		  <input type="text" class="form-control" id="idAlteraContatoCandidatoNumero">
		</div>
	</div>	

	<div class="form-row">		
				<div class="form-group col-md-7">
				    <label for="bairro">Bairro</label>
				    <input type="text" class="form-control" id="bairro">
				</div>

				<div class="form-group col-md-5">
				    <label for="idAlteraContatoCandidatoComplemento">Complemento</label>
				    <input type="text" class="form-control" id="idAlteraContatoCandidatoComplemento">
				</div>
	</div>

</form-->