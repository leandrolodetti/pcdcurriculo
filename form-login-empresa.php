<?php
require_once("cabecalho.php");
?>
<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container" style="padding-top: 80px;">
		<div class="row">
			<div class="col-sm-5" style="padding-bottom: 30px;">
				<form method="post" action="#">
				  <div class="form-group">
				    <label for="idFormLoginCnpj" class="text-white">CNPJ</label>
				    <input type="text" class="form-control" id="idFormLoginCnpj" name="cnpj">
				  </div>
				  <div class="form-group">
				    <label for="idFormLoginEmpresaSenha" class="text-white">Senha</label>
				    <input type="password" class="form-control" id="idFormLoginEmpresaSenha" placeholder="Senha" name="senha">
				  </div>
				  <button type="submit" class="btn btn-primary">Entrar</button>
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

<?php require_once("rodape.php"); ?>