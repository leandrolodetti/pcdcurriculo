<?php
require_once("cabecalho.php");
?>

<div class="container-fluid border-bottom border-primary"></div>

<div class="container" style="padding-top: 80px;">
	<?php
		if (isset($_SESSION["candidato_logado"])) {
			?>
			    <div class="alert alert-danger" role="alert">
			  		Usuário logado como candidato! Faça o logout para trocar de conta
				</div>
				<a class="btn btn-success" href="logout-candidato.php">Logout</a>
				<?php require_once("rodape.php"); ?>
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
				<?php require_once("rodape.php"); ?>
			<?php
			die();
		}
		//mostraAlerta("invalidUser");
		//mostraAlerta("danger");
	?>
	<div class="row">
		<div class="col-sm-5" style="padding-bottom: 30px;">
			<form method="post" action="login-candidato.php">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Endereço de email</label>
			    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Seu email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Senha</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
			  </div>
			  <button type="submit" class="btn btn-primary">Entrar</button>
			  <a class="btn btn-danger" data-toggle="modal" data-target="#modalSenha" href="#">Recuperar senha</a>
			</form>
		</div>
		<div class="col-sm-7">
			<h3 class="text-center font-weight-normal">Ainda não possui cadastro ?</h3>
			<p class="text-center font-weight-normal">Crie sua conta agora mesmo!</p>

			<ul class="nav justify-content-center">
			  <li class="nav-item">
			    <a class="btn btn-lg btn-success" role="button" href="form-cadastro-candidato.php">Cadastre-se</a>
			  </li>
			</ul>
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
      	<form method="post" action="recupera-login.php?recupera-candidato">
	      	<div class="form-group">
	      		<input type="hidden" name="confirmaUpdate" value="yes">
	      		<label for="idRecuperarCpf">Insira seu CPF</label>
			    <input type="text" class="form-control" name="cpf" id="idRecuperarCpf">
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