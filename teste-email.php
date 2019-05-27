<?php require_once("cabecalho.php"); ?>

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"crossorigin="anonymous"></script>
<div class="w3-container" style="margin-left: 14%;">
	<form action="envia-email.php" method="post">
		<table>
			<tr>
				<td>Nome</td>
				<td><input type="text" name="nome" class="form-control"></td>
			</tr>
			 <tr>
	            <td>Email</td>
	            <td><input type="email" name="email" class="form-control"></td>
	        </tr>
	        <tr>
	            <td>Mensagem</td>
	            <td><textarea class="form-control" name="mensagem"></textarea></td>
	        </tr>
	        <tr>
	            <td><button type="submit" class="btn btn-primary">Enviar</button></td>
	        </tr>
		</table>
	</form>
</div>
<?php require_once("rodape.php"); ?>