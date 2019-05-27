<?php
require_once("cabecalho.php");
//$parametro = $_GET["parametro"];
$id = $_GET["id"];

if(/*$parametro == null || */$id == null) {
	header("Location: index.php");
	die();
}

$botaoCandidatar = "<a class='btn btn-danger' href='form-login-candidato.php'>Faça login para se candidatar</a>";

if (isset($_SESSION["candidato_logado"])) {
	$botaoCandidatar = "<a class='btn btn-success' href='update-candidato.php?candidatar&vaga=".$id."&parametro=".$parametro."'>Candidatar-se</a>";
}

$vagaAtual = listaVagaEmpresa($conexao, $id);
$categoriaAtual = listaCategoriaVaga($conexao, $id);
$restricoes = listaRestricaoDeficiencia($conexao, $id);

$data_atualizacao = $vagaAtual["data_atualizacao"];
$datas = explode("-", $data_atualizacao);
$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];

?>

<!--div class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<?php
	  			if (isset($_SESSION["candidato_logado"]) && $parametro != null) {
	  				$botaoCandidatar = "<a class='btn btn-success' href='update-candidato.php?candidatar&vaga=".$id."&parametro=".$parametro."'>Candidatar-se</a>";
	  			?>
	  				<li class="breadcrumb-item font-weight-bold"><a href="candidato.php">Área do Candidato</a></li>
	  				<li class="breadcrumb-item font-weight-bold"><a href="resultado-vagas.php?parametro=<?php echo $parametro; ?>">Resultado Vagas</a></li>
	  				<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Exibir Vaga</li>
	  			<?php	
	  			}
	  			else {
	  			?>
	  				<li class="breadcrumb-item font-weight-bold"><a href="index.php">Página Inicial</a></li>
	  				<li class="breadcrumb-item font-weight-bold"><a href="resultado-vagas.php?parametro=<?php echo $parametro; ?>">Resultado Vagas</a></li>
	  				<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Exibir Vaga</li>
	  			<?php	
	  			}
	  			?>
  			</ol>
		</nav>
	</div>
</div-->

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" onClick="history.go(-1)"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div class="container" style="padding-bottom: 20px;">
	<div class="row">
		<div class="col-sm-8">
			<?php echo $botaoCandidatar; ?>
			<div style="padding-top: 20px;">
				<div class="card text-center" >
					<i class="fas fa-warehouse rounded float-left text-primary" style="font-size: 70px; padding: 10px;"></i>
				    <div class="card-body">
				      	<h5 class="tit-box text-body"><?php echo $vagaAtual["titulo"]; ?></h5>
				      	<h6 class="tit-box text-body"><?php echo $vagaAtual["razao_social"]; ?></h6>
				      	<p class="card-text text-body"><?php echo "ID ".$id; ?></p>
						<p class="card-text text-body"><?php echo $dataBr; ?></p>
				    </div>
			    </div>	
			</div>

			<ul class="nav" style="padding: 10px; padding-left: 0px;">
				<li class="nav-item">
					<i class="nav-link fas fa-coins rounded float-left text-primary" style="font-size: 25px;"><span class="text-dark"><?php echo " ".$vagaAtual["salario"]; ?></span></i>
				</li>
				<li class="nav-item">
					<button type="button" class="btn border-0" data-toggle="modal" data-target="#modalExemplo" style="background-color: transparent; padding: 0px;">
					  <i class="nav-link fas fa-map-marker-alt rounded float-left text-success" style="font-size: 25px;"><span class="text-dark"><?php echo " ".$vagaAtual["cidade"]; ?></span></i>
					</button>
				</li>
				<li class="nav-item">
					<i class="nav-link fas fa-address-card rounded float-left text-primary" style="font-size: 25px;"><span class="text-dark"><?php echo " ".$categoriaAtual["descricao"]; ?></span></i>
				</li>
			</ul>

			<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>	

			<div class="form-group" style="padding-top: 30px;">
				<h5 class="text-dark">Descrição</h5>
				<!--p class="text-left" name="descricao" id="idVagaDescricao"><?php echo $vagaAtual["descricao"]; ?></p-->
				<textarea class="form-control text-left" rows="10"><?php echo $vagaAtual["descricao"]; ?></textarea>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Requisitos</h5>
				<!--p class="text-left" name="requisitos" id="idVagaRequisitos"><?php echo $vagaAtual["requisitos"]; ?></p-->
				<textarea class="form-control text-left" rows="10"><?php echo $vagaAtual["requisitos"]; ?></textarea>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Benefícios</h5>
				<!--p class="text-left" name="beneficios" id="idVagaBeneficios"></p-->
				<textarea class="form-control text-left" rows="10"><?php echo $vagaAtual["beneficios"]; ?></textarea>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Carga Horária</h5>
				<p class="text-left" id="idVagaCargaHoraria"><?php echo $vagaAtual["carga_horaria"]; ?></p>
			</div>
				<?php
				if ($restricoes != null) {
				?>
					<div class="form-group" style="padding-top: 10px;">
						<h5 class="text-dark">Restrições Deficiências</h5>
				<?php
					foreach ($restricoes as $rest) {
					?>
						<p class="text-left"><?php echo $rest["tipo_deficiencia"]; ?></p>
					<?php
					}
					?>
					</div>
				<?php		
				}
				echo $botaoCandidatar;
			?>
		</div>
		<div class="col-sm">
			
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
      		<p><?php echo $vagaAtual["logradouro"].", ".$vagaAtual["num_logradouro"]; ?></p>
      		<p><?php echo "CEP: ".$vagaAtual["cep"]; ?></p>
      		<p><?php echo $vagaAtual["cidade"]." - ".$vagaAtual["estado"];; ?></p>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once("rodape.php"); ?>
