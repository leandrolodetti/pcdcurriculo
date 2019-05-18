<?php
require_once("cabecalho.php");

//$parametro = $_GET["parametro"];
$parametro = mysqli_escape_string($conexao, $_GET["parametro"]);
$filtroCity = array();
$filtroCategoria = array();
$filtroNivel = array();

if (isset($_GET["cidade"])) {
	foreach ($_GET["cidade"] as $cid) {
		array_push($filtroCity, $cid);
	}
}
if (isset($_GET["categoria"])) {
	foreach ($_GET["categoria"] as $cat) {
		array_push($filtroCategoria, $cat);
	}
}
if (isset($_GET["nivel"])) {
	foreach ($_GET["nivel"] as $niv) {
		array_push($filtroNivel, $niv);
	}
}

if (isset($_GET["parametro"]) && $_GET["parametro"] != null) {
	$vagasEncontradas = listaVagasPorTitulo($conexao, $parametro, $filtroCity, $filtroCategoria, $filtroNivel);
	if ($vagasEncontradas != null) {
		$naoRepetidas = array_unique($vagasEncontradas);
	?>
		<div class="container-fluid" style="background-color: #5EC998;">
			<div class="container">
				<nav aria-label="breadcrumb">
			  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
			  			<?php
			  			if (isset($_SESSION["candidato_logado"])) {
			  			?>
			  				<li class="breadcrumb-item font-weight-bold"><a href="candidato.php">Área do Candidato</a></li>
			  				<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Resultado Vagas</li>
			  			<?php	
			  			}
			  			else {
			  			?>
			  				<li class="breadcrumb-item font-weight-bold"><a href="index.php">Página Inicial</a></li>
			  				<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Resultado Vagas</li>
			  			<?php	
			  			}
			  			?>
		  			</ol>
				</nav>
			</div>
		</div>

		<div class="container">
			<div class="border-bottom" style="padding-top: 40px;">
			  <h4 class="text-left font-weight-normal"><?php echo count($vagasEncontradas)." vagas encontradas para ".$parametro; ?></h4>
			</div>

			<div class="row" style="padding-top: 30px;">

				<div class="col-sm-4">
				<form id="idFormBuscar" action="resultado-vagas.php" method="get">
					<h4 class="text-left font-weight-normal">Filtrar Busca</h4>
					<!--div class="btn-group" role="group">
					  	<button type="submit" class="btn btn-success">Filtrar Busca</button-->
 					<?php
 					if ($filtroNivel != null || $filtroCategoria != null || $filtroCity != null) {
					?>	
						<div class="btn-group" role="group">
						<a class="btn btn-danger" href="resultado-vagas.php?parametro=<?php echo $parametro; ?>">Limpar Filtros</a>
						</div>
					<?php
 					}
 					?>
 					<!--/div-->
					<input type="hidden" name="parametro" value="<?php echo $parametro; ?>">
					<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Cidade</h5>

					<?php
						foreach ($naoRepetidas as $nRep) {
							$checked = "";
							foreach ($filtroCity as $city) {
								if ($nRep["cidade"] == $city) {
									$checked = "checked";
								}
							}
					?>
						<div class="form-check">
						  <input class="form-check-input" onclick="document.getElementById('idFormBuscar').submit();" <?php echo $checked; ?> name="cidade[]" type="checkbox" value="<?php echo $nRep["cidade"]; ?>" id="idFiltroCidade">
						  <label class="form-check-label" for="idFiltroCidade">
						    <?php echo $nRep["cidade"]; ?>
						  </label>
						</div>
					<?php
						}
					?>

					<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Categoria</h5>

					<?php
						foreach ($naoRepetidas as $nRep) {
							$checked = "";
							foreach ($filtroCategoria as $cate) {
								if ($nRep["categoria"] == $cate) {
									$checked = "checked";
								}
							}
					?>
						<div class="form-check">
						  <input class="form-check-input" onclick="document.getElementById('idFormBuscar').submit();" <?php echo $checked; ?> name="categoria[]" type="checkbox" value="<?php echo $nRep["categoria"]; ?>" id="idFiltroCategoria">
						  <label class="form-check-label" for="idFiltroCategoria">
						    <?php echo $nRep["categoria"]; ?>
						  </label>
						</div>
					<?php
						}
					?>

					<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Nível</h5>

					<?php
						foreach ($naoRepetidas as $nRep) {
							$checked = "";
							foreach ($filtroNivel as $niv) {
								if ($nRep["nivel"] == $niv) {
									$checked = "checked";
								}
							}
					?>
						<div class="form-check">
						  <input class="form-check-input" onclick="document.getElementById('idFormBuscar').submit();" <?php echo $checked; ?> name="nivel[]" type="checkbox" value="<?php echo $nRep["nivel"]; ?>" id="idFiltroNivel">
						  <label class="form-check-label" for="idFiltroNivel">
						    <?php echo $nRep["nivel"]; ?>
						  </label>
						</div>
					<?php
						}
					?>
					<div style="padding-bottom: 30px;"></div>
				</form>
				</div>

				<div class="col-sm-8">

					<?php
						foreach ($vagasEncontradas as $vaga) {
							$data_atualizacao = $vaga["data_atualizacao"];
							$datas = explode("-", $data_atualizacao);
							$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];
					?>
							<div class="card text-left">
							  <div class="card-header">
							    <h5 class="text-muted font-weight-bold"><i class="fas fa-building text-success" style="font-size: 35px; padding-right: 10px;"></i><?php echo $vaga["fantasia"]; ?></h5>
							  </div>
							  <div class="card-body">
							    <h5 class="card-title text-success font-weight-light"><?php echo $vaga["titulo"]; ?></h5>
							    <p class="card-text text-muted font-weight-bold"><?php echo $vaga["nivel"]; ?></p>
							    <p class="card-text text-muted"><?php echo $vaga["descricao"]; ?></p>
							    <a href="vaga.php?id=<?php echo $vaga["idVaga"]; ?>&parametro=<?php echo $parametro; ?>" class="btn btn-primary">Visitar</a>
							  </div>
							  <div class="card-footer text-muted">
							    <?php echo "Atualizada em ".$dataBr; ?>
							  </div>
							</div>
							<div style="padding-bottom: 30px;"></div>
					<?php
						}
					?>

				</div>

			</div>

		</div>	
	<?php
	}
	else {
		$location = "index.php";
		$_SESSION["danger"] = "Nenhuma Vaga encontrada! :(";
		if (isset($_SESSION["candidato_logado"])) {
			$location = "candidato.php";
		}
		header("Location: ".$location);
	}
}	
else {
	$location = "index.php";
	$_SESSION["danger"] = "Nenhuma Vaga encontrada! :(";
	if (isset($_SESSION["candidato_logado"])) {
		$location = "candidato.php";
	}
	header("Location: ".$location);
}
?>

<?php require_once("rodape.php"); ?>
