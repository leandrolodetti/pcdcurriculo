<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
verificaEmpresa();

$vagas = listaVagas($conexao, $usuarioAtual["idEmpresa"]);

?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Gerenciar Vagas</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="empresa.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div class="container" style="padding-top: 10px;">
	<ul class="nav nav-pills">
	  <li class="nav-item">
	    <a class="nav-link active bg-success" href="form-cadastro-vaga.php">Incluir Vaga</a>
	  </li>
	</ul>
</div>

<div class="container" style="padding-top: 30px; padding-bottom: 30px;">
	<!--form class="form-inline my-2 my-lg-1">
      <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
    </form-->
	<div class="table-responsive-sm">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">ID</th>
		      <th scope="col">Título</th>
		      <th scope="col">Atualizada em</th>
		      <th scope="col"></th>
		    </tr>
		  </thead>
		  <tbody>
			<?php
			foreach ($vagas as $vaga) {
				if ($vaga["ativa"] == "S") {

					$data_atualizacao = $vaga["data_atualizacao"];
					$datas = explode("-", $data_atualizacao);
					$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];
			?>	
					<tr>
						<th scope="row"><?php echo $vaga["idVaga"]; ?></th>
						<td><a href="form-cadastro-vaga.php?id=<?php echo $vaga["idVaga"]; ?>"><?php echo $vaga["titulo"]; ?></a></td>
						
						<td><?php echo $dataBr; ?></td>
						<td><a class="btn btn-danger btn-sm" href="update-empresa.php?id=<?php echo $vaga["idVaga"]; ?>&inativar-vaga">inativar</a></td>
					</tr>
			<?php
				}			
			}
			?>		
		  </tbody>
		</table>
	</div>
	<a class="btn btn-primary" href="empresa.php">Voltar</a>
</div>

<?php require_once("rodape.php") ?>