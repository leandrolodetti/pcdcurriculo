<?php require_once("cabecalho.php"); ?>

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

<div class="container" style="padding-top: 30px; padding-bottom: 100px;">
	<div class="row">
		<div class="col-sm-8">

			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Dados Pessoais</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<h4 class="text-left font-weight-normal"><?php echo $candidatoAtual ["nome"]; ?></h4>
				<p class="text-left font-weight-bold">Idade:</p>
				<p class="text-left font-weight-bold">CPF: <?php echo $candidatoAtual ["cpf"]; ?></p>
				<p class="text-left font-weight-bold">Estado Civil:</p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Endereço</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<p class="text-left font-weight-bold">País:</p>
				<p class="text-left font-weight-bold">CEP: <?php echo $candidatoAtual ["cep"]; ?></p>
				<p class="text-left font-weight-bold">Estado: <?php echo $candidatoAtual ["estado"]; ?></p>
				<p class="text-left font-weight-bold">Cidade: <?php echo $candidatoAtual ["cidade"]; ?></p>
				<p class="text-left font-weight-bold">Bairro: <?php echo $candidatoAtual ["bairro"]; ?></p>
				<p class="text-left font-weight-bold">Endereço: <?php echo $candidatoAtual ["logradouro"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Contato</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<p class="text-left font-weight-bold">E-mail: <?php echo $candidatoAtual ["email"]; ?></p>
				<p class="text-left font-weight-bold">Telefone: <?php echo $candidatoAtual ["contato"]; ?></p>
			</div>
			<div class="container-fluid rounded" style="padding: 8px; background-color: #5EC998;">
				<h3 class="text-left text-light font-weight-bold">Deficiência(s)</h3>
			</div>
			<div class="container-fluid" style="margin-top: 20px;">
				<p class="text-left font-weight-bold">Auditiva</p>
				<p class="text-left font-weight-bold">Fala</p>
				<p class="text-left font-weight-bold">Física</p>
				<p class="text-left font-weight-bold">Intelectual/Mental</p>
				<p class="text-left font-weight-bold">Visual</p>
				<p class="text-left font-weight-bold">CID:</p>
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
					<label for="idCurriculoArea">Área</label>
					<select id="idCurriculoArea" class="form-control">
						<option selected>Escolher...</option>
					    <option>...</option>
					</select>
				</div>
				
				<div class="form-group">
					<label for="idCurriculoNivel">Nível</label>
					<select id="idCurriculoNivel" class="form-control">
						<option selected>Escolher...</option>
					    <option>...</option>
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
					<textarea name="resumo" class="form-control" id="idCurriculoResumoProf"></textarea>
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
					<textarea name="txtGraduacao" class="form-control" id="idCurriculoGraduacao"></textarea>
					<small class="form-text text-muted">Insira o nome da Universidade e a graduação.</small>
				</div>
				<div class="form-group">
					<label for="idCurriculoCursosComp">Cursos Complementares</label>
					<textarea name="txtCursoComplementares" class="form-control" id="idCurriculoCursosComp"></textarea>
					<small class="form-text text-muted">Insira o nome da escola e o curso realizado.</small>
				</div>
				<div class="form-group">
					<label for="idCurriculoIdioma">Idiomas</label>
					<textarea name="txtIdioma" class="form-control" id="idCurriculoIdioma"></textarea>
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
					<textarea name="txtHistoricoProf" class="form-control" id="idCurriculoHistoricoProf"></textarea>
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