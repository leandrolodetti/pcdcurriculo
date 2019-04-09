<?php require_once("cabecalho.php") ?>

<div id="idCandidatoContainer" class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Área do Candidato</li>
			    <li class="breadcrumb-item font-weight-bold"><a href="#">Home</a></li>
				<li class="breadcrumb-item font-weight-bold"><a href="#">Biblioteca</a></li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-sm-4">
			<h3 class="text-left font-weight-normal">Nome do Candidato</h3>
			<br>
			<h4 class="text-left font-weight-normal">Cargo Desejado</h4>
			<p class="text-left font-weight-normal">Desenvolvedor de Sistemas Sênior / Arquitetura</p>

			<div style="padding-top: 30px; padding-bottom: 40px;">
				<h5 class="text-left font-weight-normal">Mantenha seu currículo atualizado!</h5>
				<button type="button" class="btn btn-primary btn-lg">Atualizar Currículo</button>
			</div>
		
		</div>


		<div class="col-sm-8">
			<form class="txtBuscaVaga" action="/action_page.php">
		    	<input type="text" placeholder="Digite um Cargo" name="">
		        <button type="submit"><i class="fa fa-search"></i></button>
    		</form>

    		<div class="row" style="padding: 15px;">

				<div class="col-sm-6">
					<a class="nav-link" href="">
				    	<div class="card text-center">
					    	<i class="fas fas fa-book rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Currículo</h5>
							    <p class="card-text text-body">Atualizado em 29/03/2019</p>
					      	</div>
				    	</div>
				    </a>
				</div>

				<div class="col-sm-6">
					<a class="nav-link" href="">
				    	<div class="card text-center">
					    	<i class="fas fa-chart-line rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Indicador Profissional</h5>
							    <p class="card-text text-body">Contratações por tipo de deficiência</p>
					      	</div>
				    	</div>
				    </a>
				</div>

				<div class="col-sm-6">
					<a class="nav-link" href="altera-dados-candidato.php">
				    	<div class="card text-center">

					    	<i class="fab fa-wpforms rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Alterar Cadastro</h5>
							    <p class="card-text text-body">Editar seu cadastro pessoal</p>
					      	</div>
				    	</div>
				    </a>
				</div>

				<div class="col-sm-6">
					<a class="nav-link" href="">
				    	<div class="card text-center">
				    		
					    	<i class="fas fa-history rounded float-left text-success" style="font-size: 70px; padding: 10px;"></i>
					      	<div class="card-body">
					      		<h5 class="tit-box text-body">Histórico</h5>
							    <p class="card-text text-body">Veja seu histórico de candidaturas</p>
					      	</div>
				    	</div>
				    </a>
				</div>

			</div>
		</div>
	</div>
</div>




<?php require_once("rodape.php") ?>