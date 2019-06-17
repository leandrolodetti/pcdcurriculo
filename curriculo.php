<?php
require_once("cabecalho.php");
require_once("logica-candidato.php");
verificaCandidato();

$deficiencias = listaDeficienciasCandidato($conexao, $usuarioAtual ["idCandidato"]);
$CurriculoAtual = buscaUmRegistro($conexao, $usuarioAtual["idCandidato"], "Curriculo", "Candidato_idCandidato");

$data = $usuarioAtual["data_nascimento"];
$datas = explode("/", $data);
$dataNascimento = $datas[2].$datas[1].$datas[0];
$date = new DateTime($dataNascimento);
$interval = $date->diff( new DateTime( date('Y-m-d') ) ); 
$idade = $interval->format( '%Y' );

$data_atualizacao = $CurriculoAtual["data_atualizacao"];
$dataExplode = explode("-", $data_atualizacao);
$dataBr = $dataExplode[2]."/".$dataExplode[1]."/".$dataExplode[0];

?>

<div id="idCandidatoContainer" class="container-fluid" style="background-color: #5EC998;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" id="idCandidatoBreadcrumb" style="background-color: transparent; padding-left: 0;">
	  			<li class="breadcrumb-item font-weight-bold"><a href="candidato.php">Área do Candidato</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Currículo</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container">
	<a class="text-danger text-bold" href="candidato.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a>
</div>
<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Dados Pessoais</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<h4 class="text-left font-weight-normal"><?php echo $usuarioAtual ["nome"]." ".$usuarioAtual ["sobrenome"]; ?></h4>
				<p class="text-left font-weight-bold">Idade: <?php echo $idade; ?></p>
				<p class="text-left font-weight-bold">CPF: <?php echo $usuarioAtual ["cpf"]; ?></p>
				<p class="text-left font-weight-bold">Estado Civil: <?php echo $usuarioAtual ["estado_civil"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Endereço</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<p class="text-left font-weight-bold">País: Brasil</p>
				<p class="text-left font-weight-bold">CEP: <?php echo $usuarioAtual ["cep"]; ?></p>
				<p class="text-left font-weight-bold">Estado: <?php echo $usuarioAtual ["estado"]; ?></p>
				<p class="text-left font-weight-bold">Cidade: <?php echo $usuarioAtual ["cidade"]; ?></p>
				<p class="text-left font-weight-bold">Bairro: <?php echo $usuarioAtual ["bairro"]; ?></p>
				<p class="text-left font-weight-bold">Endereço: <?php echo $usuarioAtual ["logradouro"].", ".$usuarioAtual ["num_logradouro"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Contato</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<p class="text-left font-weight-bold">E-mail: <?php echo $usuarioAtual ["email"]; ?></p>
				<p class="text-left font-weight-bold">Telefone: <?php echo $usuarioAtual ["contato"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Deficiência(s)</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
			<?php
			foreach ($deficiencias as $def) {
			?>				
				<p class="text-left font-weight-bold"><?php echo $def ["tipo_deficiencia"]; ?></p>
			<?php
			}
			?>			
				<p class="text-left font-weight-bold">CID: <?php echo $usuarioAtual ["cid10"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Objetivos</h3>
			</div>
			<form action="update-candidato.php?objetivos" onsubmit="return validaCurriculoObjetivo();" method="post" style="padding-bottom: 30px;">
				<input type="hidden" name="confirmaUpdate" value="yes">
				<div class="form-group">
					<label for="idCurriculoObjetivo">Objetivo Profissional</label>
					<input type="text" name="objetivo" class="form-control" id="idCurriculoObjetivo" value="<?php echo $CurriculoAtual["objetivo"]; ?>">
					<small class="form-text text-muted">Informe o cargo ou colocação pretendida. Exemplo, Analista de Sistemas.</small>
					<small id="idSmallObjetivos" class="form-text text-muted"></small>
				</div>
				
				<div class="form-group">
					<label for="idCurriculoArea">Categoria</label>
					<select id="idCurriculoArea" name="categoria" class="form-control" required>
						<option value="" selected="selected">Escolher...</option>
					    <?php
					    $categorias = listaCategoria($conexao);
						foreach ($categorias as $cat) {
							$selecao = "";
							if ($cat ["idCategoria"] == $CurriculoAtual["area"]) {
							  $selecao = "selected='selected'";
							}
						?>
							<option <?php echo $selecao ?> value="<?php echo $cat["idCategoria"]; ?>"><?php echo $cat["descricao"]; ?></option>
						<?php	
						}
						?>
					</select>
					<small id="idSmallArea" class="form-text text-muted"></small>
				</div>
				
				<div class="form-group">
					<label for="idCurriculoNivel">Nível</label>
					<select name="nivel" id="idCurriculoNivel" class="form-control" required>
						<option value="" selected="selected">Escolher...</option>
						<?php
						$niveis = listaNivel($conexao);
						foreach ($niveis as $nivel) {
							$selecao = "";
							if ($nivel ["idNivel"] == $CurriculoAtual["nivel_area"]) {
							  $selecao = "selected='selected'";
							}
						?>
							<option <?php echo $selecao ?> value="<?php echo $nivel["idNivel"]; ?>"><?php echo $nivel["descricao"]; ?></option>
						<?php	
						}
						?>
					</select>
					<small id="idSmallNivel" class="form-text text-muted"></small>
				</div>

				<div class="form-group">
					<label for="idCurriculoPretSalarial">Pretensão Salarial</label>
					<input type="text" name="pretensaoSalarial" class="form-control" id="idCurriculoPretSalarial" value="<?php echo $CurriculoAtual["salario"]; ?>" maxlength="9">
					<small id="idSmallPretensaoSalarial" class="form-text text-muted"></small>
				</div>
				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>

			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Resumo Profissional</h3>
			</div>
			<form action="update-candidato.php?pretensao" onsubmit="return validaCurriculoPretensao();" method="post" style="padding-bottom: 30px;">
				<input type="hidden" name="confirmaUpdate" value="yes">
				<div class="form-group">
					<label for="idCurriculoResumoProf">Resumo Profissional</label>
					<textarea name="resumo" class="form-control" id="idCurriculoResumoProf" rows="5"><?php echo $CurriculoAtual["resumo_profissional"]; ?></textarea>
					<small class="form-text text-muted">Faça um resumo de suas qualificações, habilidades e realizações profissionais.</small>
					<small id="idSmallResumoProf" class="form-text text-muted"></small>
				</div>
				<button type="submit" class="btn btn-primary">Salvar</button>
			</form>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Formação Acadêmica</h3>
			</div>
			<form action="update-candidato.php?formacao" onsubmit="return validaCurriculoFormacao();" method="post" style="padding-bottom: 30px;">
				<input type="hidden" name="confirmaUpdate" value="yes">
				<div class="form-group">
					<label for="idCurriculoNivelEscolar">Nível Escolaridade</label>
					<input class="form-control" type="text" id="idCurriculoNivelEscolar" value="<?php echo $CurriculoAtual["nivel_escolar"]; ?>" name="txtNivelEscolar" maxlength="40">
					<small class="form-text text-muted">Insira seu grau de escolaridade. Ex: Superior completo.</small>
					<small id="idSmallNivelEscolar" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idCurriculoGraduacao">Graduação</label>
					<textarea name="txtGraduacao" class="form-control" id="idCurriculoGraduacao" rows="5"><?php echo $CurriculoAtual["graduacao"]; ?></textarea>
					<small class="form-text text-muted">Insira o nome da Universidade e a graduação.</small>
					<small id="idSmallGraduacao" class="form-text text-muted"></small>
				</div>
				<div class="form-group">
					<label for="idCurriculoCursosComp">Cursos Complementares</label>
					<textarea name="txtCursoComplementares" class="form-control" id="idCurriculoCursosComp" rows="5"><?php echo $CurriculoAtual["curso_complemento"]; ?></textarea>
					<small class="form-text text-muted">Insira o nome da escola e o curso realizado.</small>
				</div>
				<div class="form-group">
					<label for="idCurriculoIdioma">Idiomas</label>
					<textarea name="txtIdioma" class="form-control" id="idCurriculoIdioma" rows="5"><?php echo $CurriculoAtual["idiomas"]; ?></textarea>
					<small class="form-text text-muted">Insira os idiomas e o nível de domínio.</small>
					<small id="idSmallIdioma" class="form-text text-muted"></small>
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>

			<form action="update-candidato.php?historico" method="post" style="padding-bottom: 30px;">
				<input type="hidden" name="confirmaUpdate" value="yes">
				<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
					<h3 class="text-left text-light font-weight-bold">Histórico Profissional</h3>
				</div>
				<div class="form-group">
					<label for="idCurriculoHistoricoProf">Histórico Profissional</label>
					<textarea name="txtHistoricoProf" class="form-control" id="idCurriculoHistoricoProf" rows="5"><?php echo $CurriculoAtual["historico_profissional"]; ?></textarea>
					<small class="form-text text-muted">Insira o nome da empresa, cargo ocupado e o período que trabalhou (Ex: 2015 até 2019).</small>
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>
		</div>

		<div class="col-sm">
			<div class="container-fluid rounded bg-primary">
				<h3 class="text-center text-light font-weight-normal">Currículo atualizado em</h3>
				<p class="text-center text-light font-weight-normal"><?php echo $dataBr; ?></p>
			</div>
		</div>
	</div>
</div>

<?php require_once("rodape.php"); ?>