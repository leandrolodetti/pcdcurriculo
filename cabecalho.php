<?php
require_once("mostra-alerta.php");
require_once("conecta.php");
require_once("banco.php");
require_once("banco-empresa.php");
require_once("logica.php");
error_reporting(E_ALL ^ E_NOTICE);

$navlinkCandidato = "nav-link";
$navlinkEmpresa = "nav-link";
$usuarioAtual = null;

if (isset($_SESSION["candidato_logado"])) {
	$usuarioAtual = buscaCandidatoAtual($conexao, $_SESSION["candidato_logado"]);
	$navlinkCandidato = "nav-link active";
	$campo = "nome";
	$href = "candidato.php";
	$logout = "logout-candidato.php";
	$acao1 = "curriculo.php"; $msg1 = "Currículo";
	$acao2 = "altera-dados-candidato.php";
	$acao3 = "historico-vagas.php"; $msg3 = "Histórico";
}

if (isset($_SESSION["empresa_logada"])) {
	$usuarioAtual = buscaEmpresaAtual($conexao, $_SESSION["empresa_logada"]);
	$navlinkEmpresa = "nav-link active";
	$campo = "cnpj";
	$href = "empresa.php";
	$logout = "logout-empresa.php";
	$acao1 = ""; $msg1 = "";
	$acao2 = "altera-dados-empresa.php";
	$acao3 = ""; $msg3 = "";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Tcc Vagas</title>
		<link rel="shortcut icon" href="img/favicon-32x32.png">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
	  	<link href="fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
	</head>

<body style="background: #F4F4F4; padding-bottom: 100px;">
  	<div class="container-fluid" style="background-color: #F4F4F4;">
  		<div class="container" style="padding: 8px;">
  			<div class="row">
  				<div class="col-4">
		      		<ul class="nav nav-pills">
				        <li class="nav-item">
				          <a class="<?php echo $navlinkCandidato; ?>" href="index.php">Candidatos</a>
				        </li>
				        <li class="nav-item">
				          <a class="<?php echo $navlinkEmpresa; ?>" href="index-empresa.php">Empresas</a>
				        </li>
		      		</ul>
		      	</div>
		      	<div class="col">
<?php 				
				if ($usuarioAtual != null) {
?>	
		      		<ul class="nav justify-content-end">
  						<li class="nav-item">
    						<a class="nav-link active" href="<?php echo $href; ?>"><?php echo $usuarioAtual ["$campo"]; ?></a>
  						</li>

  						
						<div class="dropleft">
						  	<button id="dLabel" type="button" class="btn btn-outline-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    	<i class="fas fa-align-justify"></i>
						  	</button>
							<div class="dropdown-menu">
							   	<a class="dropdown-item" href="<?php echo $acao1; ?>"><?php echo $msg1; ?></a>
							   	<a class="dropdown-item" href="<?php echo $acao2; ?>">Alterar Cadastro</a>
							   	<a class="dropdown-item" href="<?php echo $acao3; ?>"><?php echo $msg3; ?></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?php echo $logout; ?>">Logout</a>
							</div>
						</div>
  					</ul>
<?php
				}
?>  					
		      	</div>
	      	</div>
	    <?php mostraAlerta("danger"); mostraAlerta("success"); ?>
    	</div>
  	</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>