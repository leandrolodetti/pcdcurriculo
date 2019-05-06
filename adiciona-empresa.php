<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

$razaoSocial = $_POST["razaoSocial"];
$fantasia = $_POST["fantasia"];
$contatoEmpresa = $_POST["contatoEmpresa"];
$cnpj = $_POST["cnpj"];
$emailEmpresa = strtolower($_POST["emailEmpresa"]);

if (buscaCnpj($conexao, $cnpj) != null) {
?>
	<div class="container" style="padding-top: 20px;">
      	<div class="alert alert-danger" role="alert" style="padding: 25px;">
  			O CNPJ informado já está cadastrado!
		</div>
		<a class="btn btn-success" href="form-login-empresa.php">Login empresas</a>
    </div>
<?php
die();
}

if (buscaEmailEmpresa($conexao, $emailEmpresa) != null) {
?>
	<div class="container" style="padding-top: 20px;">
      	<div class="alert alert-danger" role="alert" style="padding: 25px;">
  			O email informado já está cadastrado!
		</div>
		<a class="btn btn-success" href="form-login-empresa.php">Login empresas</a>
    </div>
<?php
die();
}

$responsavelEmpresa = $_POST["responsavelEmpresa"];
$cepEmpresa = $_POST["cepEmpresa"];
$cidadeEmpresa = $_POST["cidadeEmpresa"];
$ufEmpresa = $_POST["ufEmpresa"];
$ruaEmpresa = $_POST["ruaEmpresa"];
$numeroRuaEmpresa = $_POST["numeroRuaEmpresa"];
$bairroEmpresa = $_POST["bairroEmpresa"];
$ComplementoEmpresa = $_POST["ComplementoEmpresa"];
$RamoAtividade = $_POST["RamoAtividade"];
$senhaEmpresa = $_POST["senhaEmpresa"];
$senhaMd5 = md5($senhaEmpresa);

if (!starTransaction($conexao)) {
?>
	<div class="container">
	    <div class="alert alert-danger" role="alert" style="padding: 25px;">
	  		Ocorreu um erro, tente novamente mais tarde!
	  		<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="index.php">Voltar</a>
    </div>
<?php
die();
}

if(!insereEmpresa($conexao, $cnpj, $fantasia, $razaoSocial, $contatoEmpresa,
				   		 $emailEmpresa, $cepEmpresa, $ufEmpresa, $cidadeEmpresa, $ruaEmpresa,
				   	     $numeroRuaEmpresa, $bairroEmpresa, $ComplementoEmpresa, $RamoAtividade, $senhaMd5,
				   		 $responsavelEmpresa)) {
?>	
	<div class="container">
	    <div class="alert alert-danger" role="alert" style="padding: 25px;">
	  		Ocorreu um erro, tente novamente mais tarde!
	  		<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="index.php">Voltar</a>
    </div>
<?php
rollback($conexao);
die();
}

if (!commit($conexao)) {
?>	
	<div class="container" style="padding-top: 20px;">
		<div class="alert alert-danger" role="alert" style="padding: 25px;">
			Ocorreu um erro, tente novamente mais tarde!
			<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="index.php">Voltar</a>
	</div>
<?php
rollback($conexao);
die();
}
?>

<div class="container" style="padding-top: 20px;">
	<div class="alert alert-success" role="alert" style="padding: 25px;">
		Empresa cadastrada com sucesso!
	</div>
	<a class="btn btn-success" href="form-login-candidato.php">Login empresas</a>
</div>

<?php require_once("rodape.php"); ?>