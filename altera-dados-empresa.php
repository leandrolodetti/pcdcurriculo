<?php
require_once("cabecalho.php");
require_once("logica-empresa.php");
verificaEmpresa();
?>

<div class="container-fluid" style="background-color: #6f42c1;">
	<div class="container">
		<nav aria-label="breadcrumb">
	  		<ol class="breadcrumb" style="background-color: transparent; padding-left: 0;">
                <li class="breadcrumb-item"><a class="font-weight-bold text-warning" href="empresa.php">Área da empresa</a></li>
	  			<li class="breadcrumb-item active font-weight-bold" style="color: white;" aria-current="page">Alterar Cadastro</li>
  			</ol>
		</nav>
	</div>
</div>

<div class="container-fluid border-bottom border-primary" style="padding-bottom: 20px;"></div>
<div class="container"><a class="text-danger text-bold" href="empresa.php"><i class="far fa-arrow-alt-circle-left" style="font-size: 45px; padding: 10px;"></i></a></div>

<div class="container" style="padding-bottom: 6%;">
    <div class="row">
        <div class="col-sm-4">
            <div class="btn-group-vertical" style="padding-top: 30px;">
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-empresa.php?geral" role="button" style="text-align: left;"><i class="fas fa-user-cog"></i> Geral</a>
                <br>
                <a class="btn btn-outline-success btn-lg" href="altera-dados-empresa.php?senha" role="button" style="text-align: left;"><i class="fas fa-key"></i> Senha</a>
                <br>
                <a class="btn btn-outline-primary btn-lg" href="altera-dados-empresa.php?contato" role="button" style="text-align: left;"><i class="fas fa-address-card"></i> Contato</a>
                <br>
                <a class="btn btn-outline-danger btn-lg" href="altera-dados-empresa.php?remover-conta" role="button" style="text-align: left;"><i class="fas fa-trash-alt"></i> Apagar Conta</a>
            </div>
        </div>
        <?php mostraAlerta("danger"); mostraAlerta("success"); ?>
        <div class="col-sm">
            <?php
              if (isset($_GET["geral"])) {
                require_once("altera-geral-empresa.php");
              }
              elseif (isset($_GET["senha"])) {
                require_once("altera-senha-empresa.php");
              }
              elseif (isset($_GET["contato"])) {
                require_once("altera-contato-empresa.php");
              }
              elseif (isset($_GET["remover-conta"])) {
                require_once("remover-conta-empresa.php");
              }
              elseif (isset($_GET["geral"]) == null) {
                require_once("altera-geral-empresa.php");
              }
            ?>
        </div>
    </div>
</div>

<?php require_once("rodape.php"); ?>