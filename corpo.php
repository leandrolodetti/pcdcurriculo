<?php require_once("cabecalho.php"); ?>

<!--body-->
  <div id="containerCabecalho" class="container-fluid">
    <div class="container">
      <div id="btnCabecalho">
        <div id="btnCabecalhoRight">
          <a class="btn btn-lg" id="btnEntrar" role="button" href="form-login-candidato.php">Entrar</a>
          <a class="btn btn-lg btn-primary" role="button" id="btnCadastreSe" href="form-cadastro-candidato.php">Cadastre-se</a>
        </div>
      </div>

      <div id="txtEmprego">
        <h2 class="text-center">Procurando Uma Oportunidade de Emprego ?</h2>
      </div>

      <form class="txtBuscaVaga" method="get" action="resultado-vagas.php">
        <input type="text" placeholder="Digite um Cargo" name="parametro">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
  </div>

  <div id="containerContratacoes" class="container-fluid">
    <h2 class="text-center" id="txtContratacoes">Últimas Contratações</h2>

    <div class="container">
      <div class="row">
        <?php
          for($i=0;$i<6;$i++) {
        ?>
            <div class="col-sm-4" id="cardVagas">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Desenvolvedor de Sistemas Sênior / Arquitetura</h5>
                  <p class="card-text">Data: 22/03/2019</p>
                  <p class="card-text">Empresa: Universidade de Mogi das Cruzes</p>
                  <p class="card-text">Local: São Paulo</p>
                </div>
              </div>
            </div>
        <?php
          }
        ?>
      </div>
    </div>
  </div>

  <!--div class="container-fluid" style="background-color: rgb(60, 179, 125); padding: 30px;"></div-->

  <div id="containerRecentes" class="container-fluid">
    <h2 class="text-center" id="txtContratacoes">Vagas Recentes</h2>

    <div class="container">
    <div class="row" style="padding-bottom: 30px;">
      <div class="col-sm">
        <?php
          $cores = array("badge-secondary", "badge-primary", "badge-success", "badge-warning");
          $ultimasVagas = listaUltimasVagas($conexao, 10);
          foreach ($ultimasVagas as $vaga) {
            $num = rand(0,3);
          ?>  
            <a class="badge badge-pill <?php echo $cores[$num]; ?>" style="padding: 12px; margin-right: 10px; margin-top: 10px;" href=""><?php echo $vaga["titulo"]; ?></a>
          <?php
          }
        ?>
      </div>
      </div>
    </div>

  </div>

<!--/body-->
