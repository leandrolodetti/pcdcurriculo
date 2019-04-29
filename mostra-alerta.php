<?php

session_start();

	function mostraAlerta($tipo) {
		if (isset($_SESSION["$tipo"])) {
?>	
		<div style="padding-top: 15px; padding-bottom: 15px;">
		    <div class="alert alert-danger" role="alert" style="padding: 5px;">
		  		<?php echo $_SESSION["$tipo"]; unset($_SESSION["$tipo"]); ?>
			</div>
		</div>
<?php      	
		}
	}
?>