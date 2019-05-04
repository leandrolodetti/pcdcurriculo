<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

?>

<div class="container-fluid" id="containerCadastro" style="background-color: #6f42c1;">
	<h2 id="txtCadastro" class="text-center">Cadastro Empresas</h2>
</div>

<div class="container" style="padding-top: 20px;">
	<form>
		<div class="form-row">
		    <div class="form-group col-md-5">
		      	<label for="idRazaoSocial">Empresa</label>
		      	<input type="text" class="form-control" id="idRazaoSocial" name="razaoSocial" placeholder="Razão social" maxlength="50">
		      	<small id="idSmallRazaoSocial" class="form-text text-muted"></small>
		    </div>
		    <div class="form-group col-md-4">
		      	<label for="idFantasia">Nome fantasia</label>
		      	<input type="text" class="form-control" name="fantasia" id="idFantasia" maxlength="50">
		      	<small id="idSmallFantasia" class="form-text text-muted"></small>
		    </div>
		    <div class="form-group col-md-3">
		      	<label for="idContatoEmpresa">Contato</label>
		      	<input type="text" class="form-control" id="idContatoEmpresa" name="contatoEmpresa" placeholder="Fixo ou celular">
		      	<small id="idSmallContatoEmpresa" class="form-text text-muted"></small>
		    </div>
	  	</div>
	  	<div class="form-row">
		    <div class="form-group col-md-3">
			    <label for="idCNPJ">CNPJ</label>
			    <input type="text" class="form-control" name="cnpj" id="idCNPJ">
			    <small id="idSmallCnpj" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-md-3">
		  		<label for="idEmailEmpresa">E-mail</label>
		  		<input type="text" class="form-control" id="idEmailEmpresa" name="emailEmpresa" maxlength="45">
		  		<small id="idSmallEmailEmpresa" class="form-text text-muted"></small>
			</div>	
			<div class="form-group col-md-3">
		  		<label for="idConfirmarEmailEmpresa">Confirmar e-mail</label>
		  		<input type="text" class="form-control" id="idConfirmarEmailEmpresa" maxlength="45">
		  		<small id="idSmallConfirmaEmailEmpresa" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-md-3">
			  	<label for="idResponsavelEmpresa">Responsável RH</label>
			  	<input type="text" class="form-control" id="idResponsavelEmpresa" name="responsavelEmpresa" placeholder="Nome" maxlength="50">
			  	<small id="idSmallResponsavelEmpresa" class="form-text text-muted"></small>
			</div>	
	  	</div>
		<div class="form-row">
			<div class="form-group col-md-4">
		      	<label for="cep">CEP</label>
		      	<input type="text" value autocomplete="off" class="form-control" onblur="pesquisacep();" id="cep" name="cepEmpresa">
		      	<small id="idSmallCep" class="form-text text-danger"></small>
	    	</div>
		    <div class="form-group col-md-4">
		      	<label for="cidade">Cidade</label>
		      	<input type="text" class="form-control" readonly="readonly" id="cidade" name="cidadeEmpresa">
		    </div>
		    <div class="form-group col-md-4">
		    	<label for="uf">Estado</label>
		    	<input type="text" class="form-control" readonly="readonly" id="uf" name="ufEmpresa">
		    </div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="rua">Endereço</label>
			    <input type="text" class="form-control" id="rua" name="ruaEmpresa" maxlength="50">
			    <small id="idSmallEndereco" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-md-2">
			    <label for="inputNumero">Número</label>
			    <input type="text" class="form-control" id="inputNumero" name="numeroRuaEmpresa">
			    <small id="idSmallNumero" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-md-3">
			    <label for="bairro">Bairro</label>
			    <input type="text" class="form-control" id="bairro" name="bairroEmpresa" maxlength="50">
			    <small id="idSmallBairro" class="form-text text-muted"></small>
			</div>
			<div class="form-group col-md-3">
			    <label for="inputComplementoEmpresa">Complemento</label>
			    <input type="text" class="form-control" id="inputComplementoEmpresa" placeholder="Ex: Salas 1 e 2" name="ComplementoEmpresa" maxlength="20">
			</div>
		</div>	
	</form>
</div>

<?php require_once("rodape.php"); ?>