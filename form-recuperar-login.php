<?php
require_once("cabecalho.php");

if (isset($_GET["token"]) && $_GET["token"] != null && isset($_GET["candidato"]) && $_GET["candidato"] != null) {

	$idCandidato = $_GET["candidato"];
	$token = $_GET["token"];

	$encontrou = buscaUmRegistro($conexao, $idCandidato, "RecuperaLogin", "Candidato_idCandidato");

	if ($encontrou != null) {

		if ($token != $encontrou["token"]) {
			$_SESSION["danger"] = "Token inválido";
			header("Location: index.php");
		    die();
		}
		
		$data = $encontrou["data_criacao"];
		$dteStart = new DateTime($data);
   		$dteEnd   = new DateTime("now");
   		$dteDiff  = $dteStart->diff($dteEnd);
   		$tempoTotal = $dteDiff->format("%I");

		if ($tempoTotal > 20) {
			$_SESSION["danger"] = "Link expirado! clique em recuperar senha para gerar um novo";
			header("Location: form-login-candidato.php");
		    die();
		}

		//$decodificada = base64_decode($token);
		/*
		if ($token != $encontrou["token"]) {
			$_SESSION["danger"] = "Token inválido";
			header("Location: index.php");
		    die();
		}
		*/
	}
	else {
		$_SESSION["danger"] = "Link inválido";
		header("Location: index.php");
		die();
	}
?>
	<div class="container-fluid" id="containerCadastro" style="background-color: #6f42c1;">
		<h2 id="txtCadastro" class="text-center">Recuperar Senha</h2>
	</div>
	<div class="container">
		<form action="recupera-login.php?resetPasswd" onsubmit="return validaResetaSenha();" method="post" style="padding: 10%;">
			<input type="hidden" name="confirmaUpdate" value="yes">
			<input type="hidden" name="idCandidato" value="<?php echo $idCandidato; ?>">
	        <div class="form-group">
	            <div class="col-md-6 offset-md-3">
	                <label for="idAlteraNovaSenha">Nova Senha</label>
					<input type="password" maxlength="15" class="form-control" name="senha" id="idAlteraNovaSenha">
					<small class="form-text text-muted">Use de 6 a 15 caracteres.</small>
					<small id="idSmallAlteraNovaSenha" class="form-text text-muted"></small> 
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-md-6 offset-md-3">
	                <label for="idConfirmarAlteraSenha">Confirmar Senha</label>
					<input type="password" maxlength="15" name="senha2" class="form-control" id="idConfirmarAlteraSenha">
					<small id="idSmallConfirmaAlteraSenha" class="form-text text-muted"></small>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-md-6 offset-md-3">
	                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Confirmar</button>
	            </div>
        	</div>
    	</form>
	</div>
<?php
}
else {
	header("Location: index.php");
	die();
}

require_once("rodape.php");
?>