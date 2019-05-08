<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");
require_once("logica-empresa.php");
verificaEmpresa();

$titulo = $_POST["titulo"];
$categoria = $_POST["categoria"];
$nivel = $_POST["nivel"];
$descricaoVaga = $_POST["descricaoVaga"];
$requisitoVaga = $_POST["requisitoVaga"];
$beneficios = $_POST["beneficios"];
$cargaHoraria = $_POST["cargaHoraria"];
$salario = $_POST["salario"];
$data = date('Y/m/d');


$idEmpresa = $usuarioAtual["idEmpresa"];

$DefFisica = 0;
$DefFala = 0;
$DefAuditiva = 0;
$DefMental = 0;
$DefVisual = 0;

if (isset($_POST["DefFisica"])) {
	$DefFisica = $_POST["DefFisica"];
}
if (isset($_POST["DefFala"])) {
	$DefFala = $_POST["DefFala"];
}
if (isset($_POST["DefAuditiva"])) {
	$DefAuditiva = $_POST["DefAuditiva"];
}
if (isset($_POST["DefMental"])) {
	$DefMental = $_POST["DefMental"];
}
if (isset($_POST["DefVisual"])) {
	$DefVisual = $_POST["DefVisual"];
}

if (!starTransaction($conexao)) {
?>
	<div class="container">
	    <div class="alert alert-danger" role="alert" style="padding: 25px;">
	  		Ocorreu um erro, tente novamente mais tarde!
	  		<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="gerenciar-vagas.php">Voltar</a>
    </div>
<?php
die();
}

if (!insereVaga($conexao, $titulo, $descricaoVaga, $requisitoVaga, $beneficios, $salario, $cargaHoraria, $data, $idEmpresa, $categoria, $nivel)) {
?>
	<div class="container">
	    <div class="alert alert-danger" role="alert" style="padding: 25px;">
	  		Ocorreu um erro, tente novamente mais tarde!
	  		<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="gerenciar-vagas.php">Voltar</a>
    </div>
<?php
die();
}

/*
if ($DefFisica != null) {
	if (!insereDeficiencia($conexao, $DefFisica, $idCandidato)) {
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
}

if ($DefAuditiva != null) {
	if (!insereDeficiencia($conexao, $DefAuditiva, $idCandidato)) {
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
}

if ($DefFala != null) {
	if (!insereDeficiencia($conexao, $DefFala, $idCandidato)) {
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
}

if ($DefMental != null) {
	if (!insereDeficiencia($conexao, $DefMental, $idCandidato)) {
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
}

if ($DefVisual != null) {
	if (!insereDeficiencia($conexao, $DefVisual, $idCandidato)) {
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
}
*/

if (!commit($conexao)) {
?>	
	<div class="container" style="padding-top: 20px;">
		<div class="alert alert-danger" role="alert" style="padding: 25px;">
			Ocorreu um erro, tente novamente mais tarde!
			<p><?php echo mysqli_error($conexao); ?></p>
		</div>
		<a class="btn btn-success" href="gerenciar-vagas.php">Voltar</a>
	</div>
<?php
rollback($conexao);
die();
}
?>

<div class="container" style="padding-top: 20px; padding-bottom: 10px;">
	<div class="alert alert-success" role="alert" style="padding: 25px;">
		Vaga cadastrada com sucesso!
	</div>
	<a class="btn btn-success" href="gerenciar-vagas.php">Voltar</a>
</div>

<?php require_once("rodape.php"); ?>