<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");

verificaCandidato();

$idCandidato = $usuarioAtual["idCandidato"];
$vagas = listaHistorico($conexao, $idCandidato);
$msgBotao = "Remover";
$corBread = "text-primary";

?>

<div class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-primary" href="candidato.php">Área do candidato</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Histórico</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="candidato.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div class="container" style="padding-top: 30px; padding-bottom: 520px;">
	<div class="table-responsive-sm">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Título</th>
		      <th scope="col">Data candidatura</th>
		      <th scope="col">Status</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
			foreach ($vagas as $vaga) {
				$status = "Aguardando";
				if ($vaga["ativa"] == "S") {
					if ($vaga["contratado"] == "S") {
						$status = "Contratado";
					}
					$data_atualizacao = $vaga["data_candidatura"];
					$datas = explode("-", $data_atualizacao);
					$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];
			?>	
					<tr>
						<th scope="row"><?php echo $vaga["idVaga"]; ?></th>
						<td><a href="vaga.php?id=<?php echo $vaga["idVaga"]."&parametro=".$vaga["titulo"] ?>"><?php echo $vaga["titulo"]; ?></a></td>
						<td><?php echo $dataBr; ?></td>
						<td><?php echo $status; ?></td>
						<td><a class="btn btn-danger btn-sm" href="<?php echo "update-candidato.php?desfazer-candidatura&vaga=".$vaga["idVaga"]; ?>"><?php echo $msgBotao; ?></a></td>
					</tr>
			<?php
				}			
			}
			?>	
		  </tbody>
		</table>
	</div>
	<a class="btn btn-primary" href="candidato.php">Voltar</a>
</div>

<?php require_once("rodape.php"); ?>