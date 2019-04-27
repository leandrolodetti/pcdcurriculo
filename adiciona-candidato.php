<?php
require_once("cabecalho.php");
require_once("banco.php");
require_once("conecta.php");

if ($_POST["NomeResponsavel"] != "") { 
	$NomeResponsavel = $_POST["NomeResponsavel"];
	$idCpfResponsavel = $_POST["idCpfResponsavel"];
	$ContatoResponsavel = $_POST["ContatoResponsavel"];
	$idEmailResponsavel = $_POST["idEmailResponsavel"];
	$idNascResponsavel = $_POST["idNascResponsavel"];
}

$nomeCandidato = $_POST["nomeCandidato"];
$sobrenomeCandidato = $_POST["sobrenomeCandidato"];
$dataNascimentoCandidato = $_POST["dataNascimentoCandidato"];
$contatoCandidato = $_POST["contatoCandidato"];

$genero = $_POST["gridGenero"];

$cpfCandidato = $_POST["cpfCandidato"];
$emailCandidato = $_POST["emailCandidato"];
$cepCandidato = $_POST["cepCandidato"];
$cidadeCandidato = $_POST["cidadeCandidato"];
$ufCandidato = $_POST["ufCandidato"];
var_dump($ufCandidato);
$ruaCandidato = $_POST["ruaCandidato"];
$numeroRuaCandidato = $_POST["numeroRuaCandidato"];
$bairroCandidato = $_POST["bairroCandidato"];
$ComplementoCandidato = $_POST["ComplementoCandidato"];

if (isset($_POST['DefFisica'])) {
  $DefFisica = "true";
}
if (isset($_POST['DefAuditiva'])) {
  $DefAuditiva = "true";
}
if (isset($_POST['DefFala'])) {
  $DefFala = "true";
}
if (isset($_POST['DefMental'])) {
  $DefMental = "true";
}
if (isset($_POST['DefVisual'])) {
  $DefVisual = "true";
}

$cidCandidato = $_POST["cidCandidato"];
$senhaCandidato = $_POST["senhaCandidato"];
$senhaMd5 = md5($senhaCandidato);

if(insereCandidato($conexao, $nomeCandidato, $sobrenomeCandidato, $dataNascimentoCandidato, $contatoCandidato,
				   $genero, $cpfCandidato, $emailCandidato, $cepCandidato, $ufCandidato, $cidadeCandidato,
				   $ruaCandidato, $numeroRuaCandidato, $bairroCandidato, $ComplementoCandidato, $senhaMd5,
				   $cidCandidato)) {
?>
    <div class="container" style="padding-top: 20px;">
      	<div class="alert alert-success" role="alert" style="padding: 25px;">
  			Usuário cadastrado com sucesso!
		</div>
		<a class="btn btn-success" href="form-login-candidato.php">Login</a>
    </div>
<?php
}
else {
?>
    <div class="container">
      	<div class="alert alert-danger" role="alert" style="padding: 25px;">
  			Ocorreu um erro, tente novamente mais tarde!
		</div>
		<a class="btn btn-success" href="index.php">Voltar</a>
    </div>
<?php
}
?>

<?php require_once("rodape.php"); ?>