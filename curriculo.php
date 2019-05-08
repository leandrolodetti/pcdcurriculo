<?php
require_once("cabecalho.php");
require_once("conecta.php");
require_once("banco.php");
require_once("logica-candidato.php");
//verificaCandidato();
$deficiencias = listaDeficienciasCandidato($conexao, $usuarioAtual ["idCandidato"]);
$categorias = listaCategoria($conexao);
$niveis = listaNivel($conexao);

$data = $usuarioAtual ["data_nascimento"];

$datas = explode("/", $data);
$dataNascimento = $datas[2].$datas[1].$datas[0];
$date = new DateTime($dataNascimento);
$interval = $date->diff( new DateTime( date('Y-m-d') ) ); 
$idade = $interval->format( '%Y' );

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

<div class="container border-bottom border-primary" style="padding-bottom: 20px;"></div>

<div class="container" style="padding-top: 30px;">
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
				<p class="text-left font-weight-bold">Endereço: <?php echo $usuarioAtual ["logradouro"]; ?></p>
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
			<form style="padding-bottom: 30px;">
				<div class="form-group">
					<label for="idCurriculoObjetivo">Objetivo Profissional</label>
					<input type="text" name="objetivo" class="form-control" id="idCurriculoObjetivo">
					<small class="form-text text-muted">Informe o cargo ou colocação pretendida. Exemplo, Analista de Sistemas.</small>
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
					<label for="idCurriculoNivel">Nível</label>
					<select id="idCurriculoNivel" class="form-control">
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
					<label for="idCurriculoPretSalarial">Pretensão Salarial</label>
					<input type="text" name="objetivo" class="form-control" id="idCurriculoPretSalarial">
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Editar</button>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>

			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Resumo Profissional</h3>
			</div>
			<form style="padding-bottom: 30px;">
				<div class="form-group">
					<label for="idCurriculoResumoProf">Resumo Profissional</label>
					<textarea name="resumo" class="form-control" id="idCurriculoResumoProf" rows="5"></textarea>
					<small class="form-text text-muted">Faça um resumo de suas qualificações, habilidades e realizações profissionais.</small>
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Editar</button>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Formação Acadêmica</h3>
			</div>
			<form style="padding-bottom: 30px;">
				<div class="form-group">
					<label for="idCurriculoNivelEscola">Nível Escolaridade</label>
					<select id="idCurriculoNivelEscola" class="form-control">
						<option selected>Escolher...</option>
					    <option>...</option>
					</select>
				</div>
				<div class="form-group">
					<label for="idCurriculoGraduacao">Graduação</label>
					<textarea name="txtGraduacao" class="form-control" id="idCurriculoGraduacao" rows="5"></textarea>
					<small class="form-text text-muted">Insira o nome da Universidade e a graduação.</small>
				</div>
				<div class="form-group">
					<label for="idCurriculoCursosComp">Cursos Complementares</label>
					<textarea name="txtCursoComplementares" class="form-control" id="idCurriculoCursosComp" rows="5"></textarea>
					<small class="form-text text-muted">Insira o nome da escola e o curso realizado.</small>
				</div>
				<div class="form-group">
					<label for="idCurriculoIdioma">Idiomas</label>
					<textarea name="txtIdioma" class="form-control" id="idCurriculoIdioma" rows="5"></textarea>
					<small class="form-text text-muted">Insira os idiomas e o nível de domínio.</small>
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Editar</button>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>

			<form style="padding-bottom: 30px;">
				<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
					<h3 class="text-left text-light font-weight-bold">Histórico Profissional</h3>
				</div>
				<div class="form-group">
					<label for="idCurriculoHistoricoProf">Histórico Profissional</label>
					<textarea name="txtHistoricoProf" class="form-control" id="idCurriculoHistoricoProf" rows="5"></textarea>
					<small class="form-text text-muted">Insira o nome da empresa, cargo ocupado e o período que trabalhou (Ex: 2015 até 2019).</small>
				</div>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Editar</button>
				<button type="submit" id="btnEnviar" class="btn btn-primary">Salvar</button>
			</form>
		</div>

		<div class="col-sm">
			<div class="container-fluid rounded bg-primary">
				<h3 class="text-center text-light font-weight-normal">Currículo atualizado em</h3>
				<p class="text-center text-light font-weight-normal">10/04/2019</p>
			</div>
		</div>
	</div>
</div>

<?php require_once("rodape.php"); ?>