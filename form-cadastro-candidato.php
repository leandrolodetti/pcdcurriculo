<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

if ($usuarioAtual == null) {
?>
	<div class="container-fluid" id="containerCadastro">
		<h2 id="txtCadastro" class="text-center">Cadastro Candidato</h2>
	</div>
		<div class="container">
			<form name="form-cadastro-candidato" action="adiciona-candidato.php" method="post" style="padding-top: 20px; padding-bottom: 20px;" onsubmit="return validaForm();">

				<div class="form-row" id="idFormResponsavel">
					<div class="form-group col-md-3">
				      	<label id="idLabelNomeResponsavel" for="idNomeResponsavel"></label>
				      	<input type="hidden" class="form-control" id="idNomeResponsavel" name="nomeResponsavel" placeholder="Nome" maxlength="50">
				      	<small id="idSmallNomeResponsavel" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group col-md-2">
				      	<label id="idLabelCpfResponsavel" for="idCpfResponsavel"></label>
				      	<input type="hidden" class="form-control" name="cpfResponsavel" id="idCpfResponsavel">
				      	<small id="idSmallCpfResponsavel" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group col-md-2">
				      	<label id="idLabelContatoResponsavel" for="idContatoResponsavel">Contato</label>
				      	<input type="hidden" class="form-control" id="idContatoResponsavel" name="contatoResponsavel" placeholder="Fixo ou celular">
				      	<small id="idSmallContatoResponsavel" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group col-md-3">
				      	<label id="idLabelEmailResponsavel" for="idEmailResponsavel"></label>
				      	<input type="hidden" class="form-control" id="idEmailResponsavel" name="emailResponsavel" maxlength="45">
				      	<small id="idSmallEmailResponsavel" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group col-md-2">
				      	<label id="idLabelNascResponsavel" for="idNascResponsavel"></label>
				      	<input type="hidden" class="form-control" name="nascResponsavel" id="idNascResponsavel">
				      	<small id="idSmallNascResponsavel" class="form-text text-muted"></small>
				    </div>
				</div>

				<div class="form-row">
				    <div class="form-group col-md-3">
				      	<label for="idNome">Candidato</label>
				      	<input type="text" class="form-control" id="idNome" name="nomeCandidato" placeholder="Nome" maxlength="20">
				      	<small id="idSmallNome" class="form-text text-muted"></small>
				    </div>
				    <div class="form-group col-md-3">
				      	<label for="idSobrenome">Sobrenome</label>
				      	<input type="text" class="form-control" name="sobrenomeCandidato" id="idSobrenome" maxlength="30">
				      	<small id="idSmallSobrenome" class="form-text text-muted"></small>
				    </div>
				    
				    <div class="form-group col-md-3">
				      	<label for="inputDataNascimento">Data nascimento</label>
				      	<input type="text" class="form-control" id="inputDataNascimento" name="dataNascimentoCandidato">
				      	<small id="idSmallNascimento" class="form-text text-muted"></small>
				    </div>

				    <div class="form-group col-md-3">
				      	<label for="idContato">Contato</label>
				      	<input type="text" class="form-control" id="idContato" name="contatoCandidato" placeholder="Fixo ou celular">
				      	<small id="idSmallContato" class="form-text text-muted"></small>
				    </div>
			  	</div>

				<!--fieldset class="form-group"-->
				    <div class="form-row">
				    	<legend class="col-form-label col-sm-2 pt-0">Gênero</legend>
				      	<div class="form-group col-md-2">
				       		<div class="form-check">
					         	<input class="form-check-input" type="radio" name="gridGenero" id="idMasculino" value="M">
					          	<label class="form-check-label" for="idMasculino">Masculino</label>
			       			</div>
			        		<div class="form-check">
					          	<input class="form-check-input" type="radio" name="gridGenero" id="idFeminino" value="F">
					          	<label class="form-check-label" for="idFeminino">Feminino</label>
			        		</div>
			        		<small id="idSmallGenero" class="form-text text-danger"></small>
			      		</div>
			      		<div class="form-group col-md-2">
				      		<label for="idCpf">CPF</label>
				      		<input type="text" class="form-control" name="cpfCandidato" id="idCpf">
				      		<small id="idSmallCpf" class="form-text text-muted"></small>
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="idEmail">E-mail</label>
				      		<input type="text" class="form-control" id="idEmail" name="emailCandidato" maxlength="45">
				      		<small id="idSmallEmail" class="form-text text-muted"></small>
				    	</div>
				    	<div class="form-group col-md-3">
				      		<label for="idConfirmarEmail">Confirmar e-mail</label>
				      		<input type="text" class="form-control" id="idConfirmarEmail" maxlength="45">
				      		<small id="idSmallConfirmaEmail" class="form-text text-muted"></small>
				    	</div>
				    </div>
			  	<!--/fieldset-->

				<div class="form-row">
					<div class="form-group col-md-4">
				      	<label for="cep">CEP</label>
				      	<input type="text" value autocomplete="off" class="form-control" onblur="pesquisacep();" id="cep" name="cepCandidato">
				      	<small id="idSmallCep" class="form-text text-danger"></small>
			    	</div>
				    <div class="form-group col-md-4">
				      	<label for="cidade">Cidade</label>
				      	<input type="text" class="form-control" readonly="readonly" id="cidade" name="cidadeCandidato">
				    </div>
				    <div class="form-group col-md-4">
				    	<label for="uf">Estado</label>
				    	<input type="text" class="form-control" readonly="readonly" id="uf" name="ufCandidato">
				    </div>
				</div>

				<div class="form-row">
					<div class="form-group col-md-4">
						<label for="rua">Endereço</label>
					    <input type="text" class="form-control" id="rua" name="ruaCandidato" maxlength="50">
					    <small id="idSmallEndereco" class="form-text text-muted"></small>
					</div>
					<div class="form-group col-md-2">
					    <label for="inputNumero">Número</label>
					    <input type="text" class="form-control" id="inputNumero" name="numeroRuaCandidato">
					    <small id="idSmallNumero" class="form-text text-muted"></small>
					</div>
					<div class="form-group col-md-3">
					    <label for="bairro">Bairro</label>
					    <input type="text" class="form-control" id="bairro" name="bairroCandidato" maxlength="50">
					    <small id="idSmallBairro" class="form-text text-muted"></small>
					</div>
					<div class="form-group col-md-3">
					    <label for="inputComplemento">Complemento</label>
					    <input type="text" class="form-control" id="inputComplemento" placeholder="Ex: Ap 122" name="ComplementoCandidato" maxlength="20">
					</div>
				</div>

				<div class="form-row">
					<legend class="col-form-label col-sm-2 pt-0">Tipo(s) deficiência</legend>
				    <div class="form-group col-md-2">
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefAuditiva" id="idDefAuditiva" value="1">
					        <label class="form-check-label" for="idDefAuditiva">Auditiva</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefFala" id="idDefFala" value="2">
					        <label class="form-check-label" for="idDefFala">Fala</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefFisica" id="idDefFisica" value="3">
					        <label class="form-check-label" for="idDefFisica">Física</label>
			       		</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefMental" id="idDefMental" value="4">
					       	<label class="form-check-label" for="idDefMental">Intelectual/Mental</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefVisual" id="idDefVisual" value="5">
					        <label class="form-check-label" for="idDefVisual">Visual</label>
			        	</div>
			        	<small id="idSmallDeficiencia" class="form-text text-danger"></small>
			      	</div>
		      		<div class="form-group col-md-2">
			      		<label for="idCid">CID10</label>
			      		<input type="text" class="form-control" name="cidCandidato" id="idCid" maxlength="45">
			      		<small id="idSmallCid" class="form-text text-muted"></small>
			    	</div>
			    	<div class="form-group col-md-3">
			    		<label for="idSenha1">Senha</label>
			    		<input type="password" class="form-control" name="senhaCandidato" id="idSenha1" maxlength="15">
			    		<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
			    		<small id="idSmallSenha" class="form-text text-muted"></small>
			    	</div>
			    	<div class="form-group col-md-3">
			    		<label for="idConfirmarSenha">Confirmar Senha</label>
			    		<input type="password" name="senha2" class="form-control" id="idConfirmarSenha" maxlength="15">
			    		<small id="idSmallConfirmaSenha" class="form-text text-muted"></small>
			    	</div>     	
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Continuar</button>
				<a class="btn btn-success" href="index.php">Voltar</a>
			</form>
		</div>
<?php
}
else {
?>
<div class="container" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="alert alert-danger" role="alert" style="padding: 5px;">
  		Usuário Já Logado!
	</div>
	<a class="btn btn-lg btn-success" role="button" href="index.php">Voltar</a>
</div>
<?php
}
?>

<?php require_once("rodape.php"); ?>
