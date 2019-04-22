<?php require_once("cabecalho.php") ?>

<div class="container-fluid" id="containerCadastro">
	<h2 id="txtCadastro" class="text-center">Cadastre-se!</h2>
</div>
	<div class="container">
		<form name="form-cadastro-candidato" action="index.php" method="post" style="padding-top: 20px; padding-bottom: 20px;" onsubmit="return validaForm();">

			<div class="form-row" id="idFormResponsavel">
				<div class="form-group col-md-4">
			      	<label id="idLabelNomeResponsavel" for="idNomeResponsavel"></label>
			      	<input type="hidden" class="form-control" id="idNomeResponsavel" name="NomeResponsavel" placeholder="Nome">
			      	<small id="idSmallNomeResponsavel" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group col-md-2">
			      	<label id="idLabelCpfResponsavel" for="idCpfResponsavel"></label>
			      	<input type="hidden" class="form-control" name="cpfResponsavel" id="idCpfResponsavel">
			      	<small id="idSmallCpfResponsavel" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group col-md-2">
			      	<label id="idLabelContatoResponsavel" for="idContatoResponsavel">Contato</label>
			      	<input type="hidden" class="form-control" id="idContatoResponsavel" name="ContatoResponsavel" placeholder="Fixo ou celular">
			      	<small id="idSmallContatoResponsavel" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group col-md-4">
			      	<label id="idLabelEmailResponsavel" for="idEmail"></label>
			      	<input type="hidden" class="form-control" id="idEmailResponsavel">
			      	<small id="idSmallEmailResponsavel" class="form-text text-muted"></small>
			    </div>
			</div>

			<div class="form-row">
			    <div class="form-group col-md-4">
			      	<label for="idNome">Candidato</label>
			      	<input type="text" class="form-control" id="idNome" name="nome" placeholder="Nome" maxlength="20">
			      	<small id="idSmallNome" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group col-md-3">
			      	<label for="idSobrenome">Sobrenome</label>
			      	<input type="text" class="form-control" name="sobrenome" id="idSobrenome" maxlength="20">
			      	<small id="idSmallSobrenome" class="form-text text-muted"></small>
			    </div>
			    
			    <div class="form-group col-md-3">
			      	<label for="inputDataNascimento">Data de Nascimento</label>
			      	<input type="text" class="form-control" id="inputDataNascimento" name="dataNascimento">
			      	<small id="idSmallNascimento" class="form-text text-muted"></small>
			    </div>

			    <div class="form-group col-md-2">
			      	<label for="idContato">Contato</label>
			      	<input type="text" class="form-control" id="idContato" name="contato" placeholder="Fixo ou celular">
			      	<small id="idSmallContato" class="form-text text-muted"></small>
			    </div>
		  	</div>

			<!--fieldset class="form-group"-->
			    <div class="form-row">
			    	<legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
			      	<div class="form-group col-md-2">
			       		<div class="form-check">
				         	<input class="form-check-input" type="radio" name="gridGenero" id="idMasculino" value="masculino">
				          	<label class="form-check-label" for="idMasculino">Masculino</label>
		       			</div>
		        		<div class="form-check">
				          	<input class="form-check-input" type="radio" name="gridGenero" id="idFeminino" value="feminino">
				          	<label class="form-check-label" for="idFeminino">Feminino</label>
		        		</div>
		        		<small id="idSmallGenero" class="form-text text-danger"></small>
		      		</div>
		      		<div class="form-group col-md-2">
			      		<label for="idCpf">CPF</label>
			      		<input type="text" class="form-control" name="cpf" id="idCpf">
			      		<small id="idSmallCpf" class="form-text text-muted"></small>
			    	</div>
			    	<div class="form-group col-md-3">
			      		<label for="idEmail">E-mail</label>
			      		<input type="text" class="form-control" id="idEmail">
			      		<small id="idSmallEmail" class="form-text text-muted"></small>
			    	</div>
			    	<div class="form-group col-md-3">
			      		<label for="idConfirmarEmail">Confirmar E-mail</label>
			      		<input type="text" class="form-control" id="idConfirmarEmail">
			      		<small id="idSmallConfirmaEmail" class="form-text text-muted"></small>
			    	</div>
			    </div>
		  	<!--/fieldset-->

			<div class="form-row">
				<div class="form-group col-md-4">
			      	<label for="cep">CEP</label>
			      	<input type="text" value autocomplete="off" class="form-control" onblur="pesquisacep();" id="cep" value="">
			      	<small id="idSmallCep" class="form-text text-danger"></small>
		    	</div>
			    <div class="form-group col-md-4">
			      	<label for="cidade">Cidade</label>
			      	<input type="text" class="form-control" readonly="readonly" id="cidade">
			    </div>
			    <div class="form-group col-md-4">
			    	<label for="uf">Estado</label>
			    	<input type="text" class="form-control" readonly="readonly" id="uf">
			    </div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="rua">Endereço</label>
				    <input type="text" class="form-control" id="rua">
				    <small id="idSmallEndereco" class="form-text text-muted"></small>
				</div>
				<div class="form-group col-md-2">
				    <label for="inputNumero">Número</label>
				    <input type="text" class="form-control" id="inputNumero">
				    <small id="idSmallNumero" class="form-text text-muted"></small>
				</div>
				<div class="form-group col-md-3">
				    <label for="bairro">Bairro</label>
				    <input type="text" class="form-control" id="bairro">
				    <small id="idSmallBairro" class="form-text text-muted"></small>
				</div>
				<div class="form-group col-md-3">
				    <label for="inputComplemento">Complemento</label>
				    <input type="text" class="form-control" id="inputComplemento" placeholder="Ex: Ap 122">
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="idSenha1">Senha</label>
					<input type="password" class="form-control" name="senha1" id="idSenha1">
					<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
					<small id="idSmallSenha" class="form-text text-muted"></small>
				</div>
				<div class="form-group col-md-4">
					<label for="idConfirmarSenha">Confirmar Senha</label>
					<input type="password" name="senha2" class="form-control" id="idConfirmarSenha">
					<small id="idSmallConfirmaSenha" class="form-text text-muted"></small>
				</div>
			</div>

			<button type="submit" id="btnEnviar" class="btn btn-primary">Continuar</button>
			<a class="btn btn-success" href="index.php">Voltar</a>
		</form>
	</div>

<?php require_once("rodape.php") ?>