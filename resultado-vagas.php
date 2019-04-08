<?php require_once("cabecalho.php"); ?>

<div class="container">
	<div class="border-bottom" style="padding-top: 40px;">
	  <h4 class="text-left font-weight-normal">xx vagas encontradas para xpto</h4>
	</div>

	<div class="row" style="padding-top: 30px;">

		<div class="col-sm-4">

			<div class="clearfix">
			  <button type="button" class="btn btn-success float-left" style="min-width: 220px;">Filtrar Busca</button>
			</div>

			<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Cidade</h5>

			<?php
				for ($i=0; $i < 20; $i++) {
			?>
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="<?php echo $i; ?>">
				  <label class="form-check-label" for="<?php echo $i; ?>">
				    São Paulo(X)
				  </label>
				</div>
			<?php
				}
			?>

			<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Áreas</h5>

			<?php
				for ($i=0; $i < 10; $i++) {
			?>
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
				    Administração de Empresas
				  </label>
				</div>
			<?php
				}
			?>

			<h5 class="text-left text-muted font-weight-bold" style="padding-top: 25px;">Nível</h5>

			<?php
				for ($i=0; $i < 5; $i++) {
			?>
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
				  <label class="form-check-label" for="defaultCheck1">
				    Auxiliar/Operacional(X)
				  </label>
				</div>
			<?php
				}
			?>
			<div style="padding-bottom: 30px;"></div>

		</div>

		<div class="col-sm-8">

			<?php
				for ($i=0; $i < 20; $i++) {
			?>
					<div class="card text-left">
					  <div class="card-header">
					    <h5 class="text-muted font-weight-bold"><i class="fas fa-building text-success" style="font-size: 35px; padding-right: 10px;"></i>Universidade de Mogi das Cruzes</h5>
					  </div>
					  <div class="card-body">
					    <h5 class="card-title text-success font-weight-light">Desenvolvedor de Sistemas Sênior / Arquitetura</h5>
					    <p class="card-text text-muted font-weight-bold">Estágio</p>
					    <p class="card-text text-muted">Criação de landing pages (utilizando HTML, CSS, PHP e jQuery);- Criação de templates de e-mail marketing;- conhecimento em HTML5, CSS3, JavaScript, JQuery, PHP e Wordpress;- Desejável conhecimento em AngularJS</p>
					    <a href="#" class="btn btn-primary">Visitar</a>
					  </div>
					  <div class="card-footer text-muted">
					    Publicada há 2 dias.
					  </div>
					</div>
					<div style="padding-bottom: 30px;"></div>
			<?php
				}
			?>

		</div>

	</div>

</div>







<?php require_once("rodape.php"); ?>
