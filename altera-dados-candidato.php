<?php require_once("cabecalho.php"); ?>

<div class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Área do Candidato</li>
			    <li class="breadcrumb-item"><a class="font-weight-bold" href="#">Home</a></li>
				<li class="breadcrumb-item"><a class="font-weight-bold" href="#">Biblioteca</a></li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-group-vertical" style="padding-top: 30px;">
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-candidato.php?geral" role="button" style="text-align: left;"><i class="fas fa-user-cog"></i> Geral</a>
                <br>
                <a class="btn btn-outline-success btn-lg" href="altera-dados-candidato.php?senha" role="button" style="text-align: left;"><i class="fas fa-key"></i> Senha</a>
                <br>
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-candidato.php?contato" role="button" style="text-align: left;"><i class="fas fa-address-card"></i> Contato</a>
                <br>
                <a class="btn btn-outline-success btn-lg" href="altera-dados-candidato.php?alerta" role="button" style="text-align: left;"><i class="fas fas fa-envelope-open-text"></i> Alerta de Vagas</a>
            </div>
        </div>

        <div class="col-sm">
            <?php
              if (isset($_GET["geral"])) {
                require_once("altera-geral-candidato.php");
              }
              elseif (isset($_GET["senha"])) {
                require_once("altera-senha-candidato.php");
              }
              elseif (isset($_GET["contato"])) {
                require_once("altera-contato-candidato.php");
              }
              elseif (isset($_GET["alerta"])) {
                require_once("altera-alerta-candidato.php");
              }
              elseif (isset($_GET["geral"]) == null) {
                require_once("altera-geral-candidato.php");
              }
            ?>
        </div>

    </div>
</div>

<?php require_once("rodape.php"); ?>