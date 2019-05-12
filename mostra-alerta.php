<?php

session_start();

function mostraAlerta($tipo) {
	if ($tipo == "danger") {
		$class = "alert alert-danger";
	}
	else
		if ($tipo == "success") {
			$class = "alert alert-success";
		}

	if (isset($_SESSION["$tipo"])) {
?>	
	<div style="padding-top: 15px; padding-bottom: 15px;">
	    <div class="<?php echo $class; ?>" role="alert" style="padding: 5px;">
	  		<?php echo $_SESSION["$tipo"]; unset($_SESSION["$tipo"]); ?>
		</div>
	</div>
<?php      	
	}
}
?>