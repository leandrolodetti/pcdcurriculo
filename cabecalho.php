<?php
require_once("mostra-alerta.php");
require_once("conecta.php");
require_once("banco.php");
error_reporting(E_ALL ^ E_NOTICE);
$navlink = "nav-link";

if (isset($_SESSION["candidato_logado"])) {
	$candidatoAtual = buscaCandidatoAtual($conexao, $_SESSION["candidato_logado"]);
	$navlink = "nav-link active";
}
else {
	$candidatoAtual = null;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Tcc Vagas</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">

	  	<!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"-->
	  	<link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
	</head>

<body style="background: #F4F4F4;">
  	<div class="container-fluid" style="background-color: #F4F4F4;">
  		<div class="container" style="padding: 8px;">
  			<div class="row">
  				<div class="col-4">
		      		<ul class="nav nav-pills">
				        <li class="nav-item">
				          <a class="<?php echo $navlink; ?>" href="index.php">Candidatos</a>
				        </li>
				        <li class="nav-item">
				          <a class="nav-link" href="index-empresa.php">Empresas</a>
				        </li>
		      		</ul>
		      	</div>
		      	<div class="col">
<?php 				
				if ($candidatoAtual != null) {
?>	
		      		<ul class="nav justify-content-end">
  						<li class="nav-item">
    						<a class="nav-link active" href="candidato.php"><?php echo $candidatoAtual ["nome"]; ?></a>
  						</li>

  						
						<div class="dropleft">
						  	<button id="dLabel" type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	<i class="fas fa-align-justify"></i>
						  	</button>
							<div class="dropdown-menu">
							   	<a class="dropdown-item" href="#">Alguma ação</a>
							   	<a class="dropdown-item" href="#">Outra ação</a>
							   	<a class="dropdown-item" href="#">Alguma coisa aqui</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="logout-candidato.php">Logout</a>
							</div>
						</div>
  					</ul>
<?php
				}
?>  					
		      	</div>
	      	</div>
	    <?php mostraAlerta("logout"); ?> 
    	</div>
  	</div>

  	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>