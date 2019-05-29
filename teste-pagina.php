<DOCTYPE html>
	<html>
	<head>
		<title>Recuperar Login</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
<body>
	<div class="container">
		<form action=""  method="post">
			<input type="hidden" name="confirmaUpdate" value="yes">
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
	                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Confirmar</button>
	            </div>
        	</div>
    	</form>
	</div>
</body>
</html>