<?php
require_once("cabecalho.php");



?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Gerenciar Vagas</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active bg-success" href="form-cadastro-vaga.php">Incluir Vaga</a>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link" href="#">Link</a>
	  </li>
	</ul>
</div>

<div class="container" style="padding-top: 30px;">
	<form class="form-inline my-2 my-lg-1">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
    </form>
	<div class="table-responsive">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Primeiro</th>
		      <th scope="col">Último</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
		    <tr>
		      <th scope="row">1</th>
		      <td>Markaaaaaaaaaaa</td>
		      <td>Otto</td>
		      <td><a class="btn btn-primary btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a></td>
		      <td><a class="btn btn-danger btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">remover</a></td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td><a class="btn btn-primary btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a></td>
		      <td><a class="btn btn-danger btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">remover</a></td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Larry</td>
		      <td>the Bird</td>
		      <td><a class="btn btn-primary btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">alterar</a></td>
		      <td><a class="btn btn-danger btn-sm" href="produto-altera-formulario.php?id=<?=$produto['id']?>">remover</a></td>
		    </tr>
		  </tbody>
		</table>
	</div>
</div>

<?php require_once("rodape.php") ?>