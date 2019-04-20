<?php require_once("cabecalho.php"); ?>

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

<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px; padding-bottom: 100px;">
	<div class="row">
		<div class="col-sm-8">
			<button type="button" class="btn btn-success btn-lg">Candidatar-se</button>
			<div style="padding-top: 20px;">
				<div class="card text-center" style="width: 300px;">
					<i class="fas fa-warehouse rounded float-left text-primary" style="font-size: 70px; padding: 10px;"></i>
				    <div class="card-body">
				      	<h5 class="tit-box text-body">Programação em PHP</h5>
				      	<h6 class="tit-box text-body">Universidade de Mogi das Cruzes</h6>
				      	<p class="card-text text-body">ID 124487</p>
						<p class="card-text text-body">Atualizado em 29/03/2019</p>
				    </div>
			    </div>	
			</div>

			<ul class="nav" style="padding: 10px; padding-left: 0px;">
				<li class="nav-item">
					<i class="nav-link fas fa-dollar-sign rounded float-left text-primary" style="font-size: 25px;"><span class="text-dark"> 1500,00</span></i>
				</li>
				<li class="nav-item">
					<!--i class="nav-link fas fa-map-marker-alt rounded float-left text-success" style="font-size: 25px;"><span class="text-dark"> Osasco</span></i-->
					<button type="button" class="btn border-0" data-toggle="modal" data-target="#modalExemplo" style="background-color: transparent; padding: 0px;">
					  <i class="nav-link fas fa-map-marker-alt rounded float-left text-success" style="font-size: 25px;"><span class="text-dark"> Osasco</span></i>
					</button>
				</li>
				<li class="nav-item">
					<i class="nav-link fas fa-address-card rounded float-left text-primary" style="font-size: 25px;"><span class="text-dark"> Tecnologia da Informação</span></i>
				</li>
			</ul>

			<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>	

			<div class="form-group" style="padding-top: 30px;">
				<h5 class="text-dark">Descrição</h5>
				<p name="descricao" id="idVagaDescricao">Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container. Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Requisitos</h5>
				<p name="requisitos" id="idVagaRequisitos">Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container. Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Benefícios</h5>
				<p name="beneficios" id="idVagaBeneficios">Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container. Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Carga Horária</h5>
				<p name="beneficios" id="idVagaCargaHoraria">Ele usa classes utilitárias para tipografia e espaçamento de conteúdo, dentro do maior container.</p>
			</div>

			<button type="button" class="btn btn-success btn-lg">Candidatar-se</button>
		</div>
		<div class="col-sm-4">
			
		</div>
	</div>
</div>	

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Endereço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group" style="padding-top: 10px;">
      		<p>Av dos Autonomistas, 1455</p>
      		<p>CEP: 05488-455</p>
      		<p>Osasco - SP</p>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once("rodape.php"); ?>