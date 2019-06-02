<?php
require_once("cabecalho.php");
?>
<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container" style="padding-top: 80px; padding-bottom: 20px;">
	<?php
		if (isset($_SESSION["candidato_logado"])) {
			?>
			    <div class="alert alert-danger" role="alert">
			  		Usuário logado como candidato! Faça o logout para trocar de conta
				</div>
				<a class="btn btn-success" href="logout-candidato.php">Logout</a>
			<?php
			die();
		}
		else
		if (isset($_SESSION["empresa_logada"])) {
			?>
			    <div class="alert alert-danger" role="alert">
			  		Usuário logado como empresa! Faça o logout para trocar de conta
				</div>
				<a class="btn btn-success" href="logout-empresa.php">Logout</a>
			<?php
			die();
		}
		//mostraAlerta("invalidUser");
		//mostraAlerta("danger");
	?>
		<div class="row">
			<div class="col-sm-5" style="padding-bottom: 30px;">
				<form method="post" action="login-empresa.php">
				  <div class="form-group">
				    <label for="idFormLoginCnpj" class="text-white">CNPJ</label>
				    <input type="text" class="form-control" id="idFormLoginCnpj" name="cnpj">
				  </div>
				  <div class="form-group">
				    <label for="idFormLoginEmpresaSenha" class="text-white">Senha</label>
				    <input type="password" class="form-control" id="idFormLoginEmpresaSenha" placeholder="Senha" name="senha">
				  </div>
				  <button type="submit" class="btn btn-primary">Entrar</button>
				  <a class="btn btn-danger" data-toggle="modal" data-target="#modalSenha" href="#">Recuperar senha</a>
				</form>
			</div>
			<div class="col-sm-7">
				<h3 class="text-center font-weight-normal text-white">Sua empresa não possui cadastro ?</h3>
				<p class="text-center font-weight-normal text-white">Crie sua conta agora mesmo!</p>

				<ul class="nav justify-content-center">
				  <li class="nav-item">
				    <a class="btn btn-lg btn-success" role="button" href="form-cadastro-empresa.php">Cadastre-se</a>
				  </li>
				</ul>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <!--h5 class="modal-title" id="exampleModalLabel">Endereço</h5-->
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form method="post" action="recupera-login.php?recupera-empresa">
	      	<div class="form-group">
	      		<input type="hidden" name="confirmaUpdate" value="yes">
	      		<label for="idRecuperarCnpj">Insira o CNPJ</label>
			    <input type="text" class="form-control" name="cnpj" id="idRecuperarCnpj">
	      	</div>
	      	<button type="submit" class="btn btn-primary">Enviar</button>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once("rodape.php"); ?>