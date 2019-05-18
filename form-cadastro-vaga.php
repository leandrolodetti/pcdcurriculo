<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("banco-empresa.php");
require_once("conecta.php");
require_once("mostra-alerta.php");
require_once("logica-empresa.php");
verificaEmpresa();

$atualizadaEm = "";
$dataBr = "";

$chekAuditiva = "";
$chekFala = "";
$chekFisica = "";
$chekMental = "";
$chekVisual = "";
$titulo = "Nova vaga";
$vagaAtual = array('titulo' => "", 'descricao' => "", 'requisitos' => "",
						'beneficios' => "", 'carga_horaria' => "",
						'salario' => ""
						);
$action = "adiciona-vaga.php";

if (isset($_GET["id"])) {
	$action = "update-empresa.php?id=".$_GET["id"]."&update-vaga";
	$titulo = "Alterar vaga";
	$listaUmaVaga = listaUmaVaga($conexao, $_GET["id"]);
	$vagaAtual = array('titulo' => $listaUmaVaga["titulo"], 'descricao' => $listaUmaVaga["descricao"], 'requisitos' => $listaUmaVaga["requisitos"],
						'beneficios' => $listaUmaVaga["beneficios"], 'carga_horaria' => $listaUmaVaga["carga_horaria"],
						'salario' => $listaUmaVaga["salario"]
						);
	$categoria = listaCategoriaVaga($conexao, $_GET["id"]);
	$nivel = listaNivelVaga($conexao, $_GET["id"]);

	$atualizadaEm = "Vaga atualizada em";

	$data_atualizacao = $listaUmaVaga["data_atualizacao"];
	$datas = explode("-", $data_atualizacao);
	$dataBr = $datas[2]."/".$datas[1]."/".$datas[0];

	$listaRestricaoDeficiencia = listaRestricaoDeficiencia($conexao, $_GET["id"]);
	foreach ($listaRestricaoDeficiencia as $rest) {
		if ($rest["tipo_deficiencia"] == "Auditiva") {
			$chekAuditiva = "checked";
		}
		else
			if ($rest["tipo_deficiencia"] == "Fala") {
				$chekFala = "checked";
			}
			else
				if ($rest["tipo_deficiencia"] == "Física") {
					$chekFisica = "checked";
				}
				else
					if ($rest["tipo_deficiencia"] == "Intelectual/Mental") {
						$chekMental = "checked";
					}
					else
						if ($rest["tipo_deficiencia"] == "Visual") {
							$chekVisual= "checked";
						}
	}
}

?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="gerenciar-vagas.php">Gerenciar Vagas</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Cadastro de Vaga</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-sm-8">
			<div class="container-fluid rounded" style="padding: 8px; background-color: #6f42c1;">
				<h3 class="text-left text-light font-weight-bold"><?php echo $titulo; ?></h3>
			</div>
			<form style="padding-bottom: 30px;" action="<?php echo $action; ?>" onsubmit="return validaCadastroVaga();" method="post">
				<div class="form-group">
					<label for="idTituloVaga">Título</label>
					<input type="text" name="titulo" class="form-control" id="idTituloVaga" value="<?php echo $vagaAtual["titulo"]; ?>">
					<small class="form-text text-muted">Informe o título da vaga. Exemplo, Gerente de projetos.</small>
					<small id="idSmallTituloVaga" class="form-text text-muted"></small>
				</div>
				
				<div class="form-group">
					<label for="idCurriculoCategoria">Categoria</label>
					<select name="categoria" id="idCurriculoCategoria" class="form-control">
						<option value="">Escolher...</option>
					    <?php
					    $categorias = listaCategoria($conexao);
						foreach ($categorias as $cat) {
							$selecao = "";
							if ($cat ["idCategoria"] == $categoria ["idCategoria"]) {
							  $selecao = "selected='selected'";
							}
						?>
							<option value="<?php echo $cat["idCategoria"]; ?>"<?php echo $selecao ?>><?php echo $cat["descricao"]; ?></option>
						<?php
						}
						?>
					</select>
					<small id="idSmallCategoriaVaga" class="form-text text-muted"></small>
				</div>
				
				<div class="form-group">
					<label for="idVagaNivel">Nível</label>
					<select name="nivel" id="idVagaNivel" class="form-control">
						<option value="" selected>Escolher...</option>
						<?php
						$niveis = listaNivel($conexao);
						foreach ($niveis as $niv) {
							$selecao = "";
							if ($niv["idNivel"] == $nivel["idNivel"]) {
								$selecao = "selected='selected'";
							}
						?>
							<option value="<?php echo $niv["idNivel"]; ?>"<?php echo $selecao ?>><?php echo $niv["descricao"]; ?></option>
						<?php	
						}
						?>
					</select>
					<small id="idSmallNivelVaga" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idVagaDescricao">Descrição</label>
					<textarea name="descricaoVaga" class="form-control" id="idVagaDescricao" rows="5"><?php echo $vagaAtual["descricao"]; ?></textarea>
					<small class="form-text text-muted">Faça um resumo sobre a vaga, atividades que o profissional irá exercer.</small>
					<small id="idSmallDescricaoVaga" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idVagaRequisito">Requisitos</label>
					<textarea name="requisitoVaga" class="form-control" id="idVagaRequisito" rows="5"><?php echo $vagaAtual["requisitos"]; ?></textarea>
					<small class="form-text text-muted">Descreva os requisitos que o candidato necessita possuir.</small>
					<small id="idSmallRequisitoVaga" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idVagaBeneficio">Benefícios</label>
					<textarea name="beneficios" class="form-control" id="idVagaBeneficio" rows="5"><?php echo $vagaAtual["beneficios"]; ?></textarea>
					<small class="form-text text-muted">Descreva os benefícios que a empresa oferece.</small>
					<small id="idSmallBeneficioVaga" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idVagaCargaHoraria">Carga Horária</label>
					<input type="text" name="cargaHoraria" class="form-control" id="idVagaCargaHoraria" value="<?php echo $vagaAtual["carga_horaria"]; ?>" maxlength="80">
					<small id="idSmallCargaHoraria" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idVagaSalario">Salário</label>
					<input type="text" name="salario" class="form-control" id="idVagaSalario" value="<?php echo $vagaAtual["salario"]; ?>">
					<small id="idSmallSalario" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<legend class="col-form-label col-sm-2 pt-0">Deficiência(s) Restritas</legend>
				    <div class="form-group col-md-2">
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefAuditiva" id="idDefAuditiva" value="1" <?php echo $chekAuditiva; ?>>
					        <label class="form-check-label" for="idDefAuditiva">Auditiva</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefFala" id="idDefFala" value="2" <?php echo $chekFala; ?>>
					        <label class="form-check-label" for="idDefFala">Fala</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefFisica" id="idDefFisica" value="3" <?php echo $chekFisica; ?>>
					        <label class="form-check-label" for="idDefFisica">Física</label>
			       		</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefMental" id="idDefMental" value="4" <?php echo $chekMental; ?>>
					       	<label class="form-check-label" for="idDefMental">Intelectual/Mental</label>
			        	</div>
			        	<div class="form-check">
					        <input class="form-check-input" type="checkbox" name="DefVisual" id="idDefVisual" value="5" <?php echo $chekVisual ?>>
					        <label class="form-check-label" for="idDefVisual">Visual</label>
			        	</div>
			        	<small id="idSmallDeficiencia" class="form-text text-danger"></small>
			      	</div>		
				</div>
				<button type="submit" id="btnSalvar" class="btn btn-primary">Salvar</button>
				<a class="btn btn-danger" href="gerenciar-vagas.php">Cancelar</a>
			</form>
		</div>
		<div class="col-sm">
			<div class="container-fluid rounded bg-success">
				<h3 class="text-center text-light font-weight-normal"><?php echo $atualizadaEm; ?></h3>
				<p class="text-center text-light font-weight-normal"><?php echo $dataBr; ?></p>
			</div>
		</div>
	</div>	
</div>



<?php require_once("rodape.php"); ?>