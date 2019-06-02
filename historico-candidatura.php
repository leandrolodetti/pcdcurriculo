<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");

verificaEmpresa();
$idEmpresa = $usuarioAtual["idEmpresa"];

$candidaturas = listaCandidaturaCandidato($conexao, $idEmpresa);
?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Histórico</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="empresa.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div class="container" style="padding-top: 30px; padding-bottom: 401px;">
	<div class="table-responsive-sm">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID Vaga</th>
		      <th scope="col">Candidato</th>
		      <th scope="col">Vaga</th>
		      <th scope="col">Data candidatura</th>
		      <th scope="col">Data contratação</th>
		      <th scope="col"></th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
			foreach ($candidaturas as $cand) {
				$data_atualizacao = $cand["data_candidatura"];
				$datas = explode("-", $data_atualizacao);
				$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];

				if ($cand["data_contratacao"] != "0000-00-00") {
					$data_atualizacao = $cand["data_contratacao"];
					$datas = explode("-", $data_atualizacao);
					$dataBr2 = $datas[2]."/".$datas[1]."/".$datas[0];
				}
				else {
					$dataBr2 = "Não contratado";
				}
			?>	
				<tr>
					<th scope="row"><?php echo $cand["Vaga_idVaga"]; ?></th>
					<td><a href="visualizar-curriculo.php?id=<?php echo $cand["Candidato_idCandidato"]; ?>"><?php echo $cand["nome"]; ?></a></td>
					<td><?php echo $cand["titulo"]; ?></td>
					<td><?php echo $dataBr; ?></td>
					<td><?php echo $dataBr2; ?></td>
					<td><a class="btn btn-danger btn-sm" href="<?php echo "update-empresa.php?dispensar-candidatura&idCandidato=".$cand["Candidato_idCandidato"]."&idVaga=".$cand["Vaga_idVaga"]; ?>">Dispensar</a></td>
					<td>
						<form method="post" onsubmit="return validaContratacao();" action="update-empresa.php?contratar-candidato">
							<input type="hidden" name="idCandidato" value="<?php echo $cand["Candidato_idCandidato"]; ?>">
							<input type="hidden" name="idVaga" value="<?php echo $cand["Vaga_idVaga"]; ?>">
							<button type="submit" class="btn btn-success btn-sm">Contratar</button>
						</form>
					</td>

					<!--td><a class="btn btn-success btn-sm" href="<?php echo "update-empresa.php?contratar-candidato&cand=".$cand["Candidato_idCandidato"]; ?>">Contratar</a></td-->
				</tr>
			<?php		
			}
			?>	
		  </tbody>
		</table>
	</div>
	<a class="btn btn-primary" href="empresa.php">Voltar</a>
</div>

<?php require_once("rodape.php"); ?>