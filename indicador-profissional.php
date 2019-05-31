<?php require_once("cabecalho.php");



?>
<div id="idCandidatoContainer" class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item font-weight-bold"><a href="candidato.php">Área do Candidato</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Indicador Profissional</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="candidato.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div id="containerRecentes" class="container-fluid" style="background-color: #6f42c1; padding-bottom: 20px;">
	<div class="container">
		<h2 class="text-center text-white" id="txtContratacoes">Indicador Profissional</h2>
		<br><br>
		<h4 class="text-center text-white">Esta ferramenta tem como objetivo selecionar as vagas que são indicadas para o seu perfil, de acordo com seu currículo e deficiências que possui :)</h4>
	</div>
</div>

    <div class="container">
    <div class="row" style="padding-bottom: 30px; padding-top: 20px;">
      <div class="col-sm">
        <?php
          $cores = array("badge-secondary", "badge-primary", "badge-success", "badge-warning");
          $ultimasVagas = listaUltimasVagas($conexao, 10);
          foreach ($ultimasVagas as $vaga) {
            $num = rand(0,3);
          ?>  
            <a class="badge badge-pill <?php echo $cores[$num]; ?>" style="padding: 12px; margin-right: 10px; margin-top: 10px;" href="<?php echo "vaga.php?id=".$vaga["idVaga"]; ?>"><?php echo $vaga["titulo"]; ?></a>
          <?php
          }
        ?>
      </div>
      </div>
    </div>

<?php require_once("rodape.php"); ?>