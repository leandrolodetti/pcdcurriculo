<?php require_once("cabecalho.php"); ?>

<div class="container-fluid border-bottom border-primary"></div>

<div class="container" style="padding-top: 80px;">
	<div class="row">
		<div class="col-sm-5" style="padding-bottom: 30px;">
			<form>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Endereço de email</label>
			    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Seu email">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1">Senha</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha">
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