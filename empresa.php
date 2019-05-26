<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
verificaEmpresa();
?>

<div id="idCandidatoContainer" class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Área da empresa</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-sm-4">
			<h3 class="text-left font-weight-normal"><?php echo $usuarioAtual ["razao_social"]; ?></h3>
			<br>
			<h4 class="text-left font-weight-normal"><?php echo "CNPJ: ".$usuarioAtual["cnpj"]; ?></h4>
			<br>
			<h4 class="text-left font-weight-normal"><?php echo "Ramo: ".$usuarioAtual["ramo_atividade"]; ?></h4>
		</div>
		<div class="col-sm-8">
			<div class="row" style="padding: 15px;">

				<div class="col-sm-6">
					<a class="nav-link" href="gerenciar-vagas.php">
				    	<div class="card text-center">
					    	<i class="fas fa-folder-open rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Vagas</h5>
							    <p class="card-text text-body">Gerenciar vagas</p>
					      	</div>
				    	</div>
				    </a>
				</div>

				<div class="col-sm-6">
					<a class="nav-link" href="altera-dados-empresa.php">
				    	<div class="card text-center">

					    	<i class="fab fa-wpforms rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Alterar Cadastro</h5>
							    <p class="card-text text-body">Editar dados da empresa</p>
					      	</div>
				    	</div>
				    </a>
				</div>

				<div class="col-sm-6">
					<a class="nav-link" href="historico-candidatura.php">
				    	<div class="card text-center">
				    		
					    	<i class="fas fa-history rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Histórico</h5>
							    <p class="card-text text-body">Histórico de candidaturas por vaga</p>
					      	</div>
				    	</div>
				    </a>
				</div>
			</div>	
		</div>
	</div>
</div>

<?php require_once("rodape.php"); ?>