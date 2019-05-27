<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");

verificaEmpresa();

$idCandidato = $_GET["id"];
$curriculoAtual = buscaCurriculo($conexao, $idCandidato);
$deficiencias = listaDeficienciasCandidato($conexao, $idCandidato);

$data = $curriculoAtual["nasc_candidato"];
$datas = explode("/", $data);
$dataNascimento = $datas[2].$datas[1].$datas[0];
$date = new DateTime($dataNascimento);
$interval = $date->diff( new DateTime( date('Y-m-d') ) ); 
$idadeCandidato = $interval->format( '%Y' );

$padding = "padding-top: 30px;";

?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="historico-candidatura.php">Histórico</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Currículo</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="historico-candidatura.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>

<div class="container" style="padding-bottom: 20px;">
	<div class="row">
		<div class="col-sm-8">
			<div style="padding-top: 20px;">
				<div class="card text-center" >
					<i class="fas fa-user-tie rounded float-left text-primary" style="font-size: 70px; padding: 10px;"></i>
				    <div class="card-body">
				      	<h5 class="tit-box text-body"><?php echo $curriculoAtual["nome_candidato"]." ".$curriculoAtual["sobrenome_candidato"]; ?></h5>
				      	<h6 class="tit-box text-body"><?php echo "E-mail: ".$curriculoAtual["email_candidato"]; ?></h6>
				      	<h6 class="tit-box text-body"><?php echo "Contato: ".$curriculoAtual["contato_candidato"]; ?></h6>
				      	<h6 class="tit-box text-body"><?php echo "CPF: ".$curriculoAtual["cpf_candidato"]; ?></h6>
				      	<h6 class="tit-box text-body"><?php echo "Estado Civil: ".$curriculoAtual["estado_civil"]; ?></h6>
				      	<h6 class="tit-box text-body"><?php echo "Idade: ".$idadeCandidato; ?></h6>
				      	<p class="card-text text-body"><?php echo "ID ".$idCandidato; ?></p>
						<p class="card-text text-body"><?php echo $dataBr; ?></p>
				    </div>
			    </div>	
			</div>

			<ul class="nav" style="padding: 10px; padding-left: 0px;">
				<li class="nav-item">
					<button type="button" class="btn border-0" data-toggle="modal" data-target="#modalExemplo" style="background-color: transparent; padding: 0px;">
					  <i class="nav-link fas fa-map-marker-alt rounded float-left text-success" style="font-size: 25px;"><span class="text-dark"><?php echo " ".$curriculoAtual["cidade"]; ?></span></i>
					</button>
				</li>
			</ul>

			<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>	
			<?php
			if ($curriculoAtual["Responsavel_idResponsavel"] != 1) {
				$padding = "padding-top: 10px;";
			?>
				<div class="form-group" style="padding-top: 30px;">
				<h5 class="text-dark">Responsável</h5>
				<p class="text-left"><?php echo $curriculoAtual["nome_responsavel"]; ?></p>
				<p class="text-left"><?php echo "CPF: ".$curriculoAtual["cpf_responsavel"]; ?></p>
				<p class="text-left"><?php echo "Contato: ".$curriculoAtual["contato_responsavel"]; ?></p>
				<p class="text-left"><?php echo "E-mail: ".$curriculoAtual["email_responsavel"]; ?></p>
			</div>
			<?php
			}
			?>
			<div class="form-group" style="<?php echo $padding; ?>">
				<h5 class="text-dark">Deficiências</h5>
				<?php
					foreach ($deficiencias as $def) {
				?>		
						<h6 class="text-left"><?php echo $def["tipo_deficiencia"]; ?></h6>
				<?php			
					}
				?>
				<h6 class="text-left"><?php echo "Código CID: ".$curriculoAtual["cid10"]; ?></h6>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Cargo Pretendido</h5>
				<p class="text-left"><?php echo $curriculoAtual["objetivo"]; ?></p>
				<p class="text-left"><?php echo "Categoria: ".$curriculoAtual["desc_categoria"]; ?></p>
				<p class="text-left"><?php echo "Nível: ".$curriculoAtual["nivel_descricao"]; ?></p>
				<p class="text-left"><?php echo "Pretensão Salarial: R$ ".$curriculoAtual["salario"]; ?></p>
				<!--textarea class="form-control text-left" rows="10"><?php echo $vagaAtual["requisitos"]; ?></textarea-->
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Resumo Profissional</h5>
				<!--p class="text-left" name="beneficios" id="idVagaBeneficios"></p-->
				<textarea class="form-control text-left" rows="10"><?php echo $curriculoAtual["resumo_profissional"]; ?></textarea>
			</div>

			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Formação Acadêmica</h5>
				<p class="text-left"><?php echo "Nível Escolaridade: ".$curriculoAtual["nivel_escolar"]; ?></p>
				<label for="idCurriculoGraduacao">Graduação</label>
				<textarea id="idCurriculoGraduacao" class="form-control text-left" rows="10"><?php echo $curriculoAtual["graduacao"]; ?></textarea>
				<label for="idCurriculoCursosComp">Cursos Complementares</label>
				<textarea id="idCurriculoCursosComp" class="form-control text-left" rows="10"><?php echo $curriculoAtual["curso_complemento"]; ?></textarea>
				<label for="idCurriculoIdioma">Idiomas</label>
				<textarea id="idCurriculoIdioma" class="form-control text-left" rows="10"><?php echo $curriculoAtual["idiomas"]; ?></textarea>
			</div>
			<div class="form-group" style="padding-top: 10px;">
				<h5 class="text-dark">Histórico Profissional</h5>
				<!--p class="text-left" name="beneficios" id="idVagaBeneficios"></p-->
				<textarea class="form-control text-left" rows="10"><?php echo $curriculoAtual["historico_profissional"]; ?></textarea>
			</div>
			<a class="btn btn-primary" href="historico-candidatura.php">Voltar</a>
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
      		<p><?php echo $curriculoAtual["logradouro"].", ".$curriculoAtual["num_logradouro"]; ?></p>
      		<p><?php echo "Bairro: ".$curriculoAtual["bairro"]; ?></p>
      		<p><?php echo "CEP: ".$curriculoAtual["cep"]; ?></p>
      		<p><?php echo $curriculoAtual["cidade"]." - ".$curriculoAtual["estado"];; ?></p>
      		<p>País: Brasil</p>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<?php require_once("rodape.php"); ?>
