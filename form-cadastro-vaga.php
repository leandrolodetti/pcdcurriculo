<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

$categorias = listaCategoria($conexao);
$niveis = listaNivel($conexao);
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

<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
	<div class="row">
		<div class="col-sm-8">
			<div class="container-fluid rounded" style="padding: 8px; background-color: #6f42c1;">
				<h3 class="text-left text-light font-weight-bold">Vaga</h3>
			</div>
			<form style="padding-bottom: 30px;">
				<div class="form-group">
					<label for="idTituloVaga">Título</label>
					<input type="text" name="titulo" class="form-control" id="idTituloVaga">
					<small class="form-text text-muted">Informe o título da vaga. Exemplo, Gerente de projetos.</small>
				</div>
				
				<div class="form-group">
					<label for="idCurriculoArea">Categoria</label>
					<select id="idCurriculoArea" class="form-control">
						<option selected>Escolher...</option>
					    <?php
						foreach ($categorias as $cat) {
						?>
							<option value="<?php echo $cat["idCategoria"]; ?>"><?php echo $cat["descricao"]; ?></option>
						<?php	
						}
						?>
					</select>
				</div>
				
				<div class="form-group">
					<label for="idVagaNivel">Nível</label>
					<select id="idVagaNivel" class="form-control">
						<option selected>Escolher...</option>
						<?php
						foreach ($niveis as $nivel) {
						?>
							<option value="<?php echo $nivel["idNivel"]; ?>"><?php echo $nivel["descricao"]; ?></option>
						<?php	
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="idVagaDescricao">Descrição</label>
					<textarea name="descricaoVaga" class="form-control" id="idVagaDescricao" rows="5"></textarea>
					<small class="form-text text-muted">Faça um resumo sobre a vaga, atividades que o profissional irá exercer.</small>
				</div>
				<div class="form-group">
					<label for="idVagaRequisito">Requisitos</label>
					<textarea name="requisitoVaga" class="form-control" id="idVagaRequisito" rows="5"></textarea>
					<small class="form-text text-muted">Descreva os requisitos que o candidato necessita possuir.</small>
				</div>
				<div class="form-group">
					<label for="idVagaBeneficio">Benefícios</label>
					<textarea name="resumoVaga" class="form-control" id="idVagaResumo" rows="5"></textarea>
					<small class="form-text text-muted">Descreva os benefícios que a empresa oferece.</small>
				</div>
				<div class="form-group">
					<label for="idVagaCargaHoraria">Carga Horária</label>
					<input type="text" name="cargaHoraria" class="form-control" id="idVagaCargaHoraria" maxlength="80">
				</div>
				<div class="form-group">
					<label for="idVagaSalario">Salário</label>
					<input type="text" name="cargaHoraria" class="form-control" id="idVagaSalario">
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Editar</button>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>
		</div>
		<div class="col-sm">
			<div class="container-fluid rounded bg-success">
				<h3 class="text-center text-light font-weight-normal">Vaga atualizada em</h3>
				<p class="text-center text-light font-weight-normal">10/04/2019</p>
			</div>
		</div>
	</div>	
</div>



<?php require_once("rodape.php"); ?>