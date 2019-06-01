<?php
require_once("cabecalho.php");
$listaContratados = listarContratados($conexao, 6);
?>

<div class="container-fluid" style="background-color: #6f42c1; padding-bottom: 20px;">
	<div class="container">
		<div id="btnCabecalho">
		  <div id="btnCabecalhoRight">
		    <a class="btn btn-lg" id="btnEntrar" role="button" href="form-login-empresa.php">Login empresas</a>
		  </div>
		</div>
		<h3 class="text-center font-weight-normal text-white">Cadastre sua empresa e explore as vantagens do Pcdcurrículo.com.br</h3>

		<ul class="nav justify-content-center" style="padding-top: 50px;">
		  <li class="nav-item">
		    <a class="btn btn-lg btn-primary" role="button" href="form-cadastro-empresa.php">Cadastre sua empresa</a>
		  </li>
		</ul>
	</div>
</div>
<div id="containerContratacoes" class="container-fluid">
  <h2 class="text-center" id="txtContratacoes">Últimas Contratações</h2>

  <div class="container">
    <div class="row">
      <?php
        foreach ($listaContratados as $contratacao) {
      ?>
          <div class="col-sm-4" id="cardVagas">
            <div class="card">
              <div class="card-body" style="min-height: 230px;">
                <h5 class="card-title"><?php echo $contratacao["titulo"]; ?></h5>
                <p class="card-text"><?php echo "Data: ".$contratacao["data_contratacao"]; ?></p>
                <p class="card-text"><?php echo "Empresa: ".$contratacao["fantasia"]; ?></p>
                <p class="card-text"><?php echo "Local: ".$contratacao["cidade"]; ?></p>
              </div>
            </div>
          </div>
      <?php
        }
      ?>
    </div>
  </div>
</div>

<?php
	require_once("rodape.php");
?>
