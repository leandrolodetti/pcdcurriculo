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
		mostraAlerta("invalidUser");
		mostraAlerta("danger");
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

<?php require_once("rodape.php"); ?>