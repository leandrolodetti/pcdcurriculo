<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

$nomeResponsavel = "";

if ($_POST["nomeResponsavel"] != "") { 
	$nomeResponsavel = $_POST["nomeResponsavel"];
	$cpfResponsavel = $_POST["cpfResponsavel"];
	$contatoResponsavel = $_POST["contatoResponsavel"];
	$emailResponsavel = $_POST["emailResponsavel"];
	$nascResponsavel = $_POST["nascResponsavel"];
}

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

$idCandidato = 0;

$nomeCandidato = $_POST["nomeCandidato"];
$sobrenomeCandidato = $_POST["sobrenomeCandidato"];
$dataNascimentoCandidato = $_POST["dataNascimentoCandidato"];
$contatoCandidato = $_POST["contatoCandidato"];
$genero = $_POST["gridGenero"];
$cpfCandidato = $_POST["cpfCandidato"];

if (buscaCpf($conexao, $cpfCandidato) != null) {
?>
	<div class="container" style="padding-top: 20px;">
      	<div class="alert alert-danger" role="alert" style="padding: 25px;">
  			Usuário já possui cadastro!
		</div>
		<a class="btn btn-success" href="form-login-candidato.php">Faça o Login</a>
    </div>
<?php
die();
}

$emailCandidato = $_POST["emailCandidato"];
$cepCandidato = $_POST["cepCandidato"];
$cidadeCandidato = $_POST["cidadeCandidato"];
$ufCandidato = $_POST["ufCandidato"];
$ruaCandidato = $_POST["ruaCandidato"];
$numeroRuaCandidato = $_POST["numeroRuaCandidato"];
$bairroCandidato = $_POST["bairroCandidato"];
$ComplementoCandidato = $_POST["ComplementoCandidato"];
$cidCandidato = $_POST["cidCandidato"];
$senhaCandidato = $_POST["senhaCandidato"];
$senhaMd5 = md5($senhaCandidato);

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

if(!insereCandidato($conexao, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   	   $genero, $cpfCandidato, $emailCandidato, $cepCandidato, $ufCandidato, $cidadeCandidato,
				       $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				       $cidCandidato)) {
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

$buscaIdCandidato = buscaIdCandidato($conexao, $cpfCandidato);
$idCandidato = $buscaIdCandidato["idCandidato"];

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

if ($nomeResponsavel != "") {
	if (!insereResponsavel($conexao, $nomeResponsavel, $cpfResponsavel, $contatoResponsavel,
						   $emailResponsavel, $nascResponsavel, $idCandidato)) {
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

if (!insereCurriculo($conexao, $idCandidato)) {
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
		Usuário cadastrado com sucesso!
	</div>
	<a class="btn btn-success" href="form-login-candidato.php">Login</a>
</div>

<?php require_once("rodape.php"); ?>