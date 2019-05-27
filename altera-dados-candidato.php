<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");
verificaCandidato();
?>

<div class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
                <li class="breadcrumb-item"><a class="font-weight-bold" href="candidato.php">Área do Candidato</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Alterar Cadastro</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container"><a class="text-danger text-bold" href="candidato.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a></div>

<div class="container" style="padding-bottom: 210px;">
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-group-vertical" style="padding-top: 30px;">
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-candidato.php?geral" role="button" style="text-align: left;"><i class="fas fa-user-cog"></i> Geral</a>
                <br>
                <a class="btn btn-outline-success btn-lg" href="altera-dados-candidato.php?senha" role="button" style="text-align: left;"><i class="fas fa-key"></i> Senha</a>
                <br>
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-candidato.php?contato" role="button" style="text-align: left;"><i class="fas fa-address-card"></i> Contato</a>
                <br>
                <a class="btn btn-outline-success btn-lg" href="altera-dados-candidato.php?responsavel" role="button" style="text-align: left;"><i class="fas fa-user-cog"></i> Responsável</a>
                <br>
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-candidato.php?alerta" role="button" style="text-align: left;"><i class="fas fas fa-envelope-open-text"></i> Alerta de Vagas</a>
                <br>
                <a class="btn btn-outline-danger btn-lg" href="altera-dados-candidato.php?remover-conta" role="button" style="text-align: left;"><i class="fas fa-trash-alt"></i> Apagar Conta</a>
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
              elseif (isset($_GET["responsavel"])) {
                require_once("altera-contato-responsavel.php");
              }
              elseif (isset($_GET["alerta"])) {
                require_once("altera-alerta-candidato.php");
              }
              elseif (isset($_GET["remover-conta"])) {
                require_once("remover-conta-candidato.php");
              }
              elseif (isset($_GET["geral"]) == null) {
                require_once("altera-geral-candidato.php");
              }
            ?>
        </div>

    </div>
</div>

<?php require_once("rodape.php"); ?>