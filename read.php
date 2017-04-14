<?php 
	require 'database.php';
	$id = null;
	$pass1 = "159753456wae";
	if(!empty($_GET['id']) and base64_decode($_GET['encode'])==$pass1)
		$id = $_REQUEST['id'];
		$Usuario = $_REQUEST['usuario'];
		$Contraseña =  base64_decode($_REQUEST['pass']);
		$Realmlist = $_REQUEST['Real'];
	if($id==null)
		header("Location: index.php");
	else {
		
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-9 col-md-offset-2">
			<div class="col-md-offset-2">
				<h2>Informacion Usuario</h2>
			</div>
			<div class="form-horizontal">
			
				<div class="form-group">
					<label class="control-label col-md-3" for="ID">ID</label>
					<div class="col-md-7">
					<input type="text" id="ID" value="<?php echo $id ?>" readonly>
					</div>
				</div>
			
				<div class="form-group">
					<label class="control-label col-md-3" for="Usuario">Usuario</label>
					<div class="col-md-7">
					<input type="text" id="Usuario" value="<?php echo $Usuario ?>" readonly>
					</div>
				</div>
		
				<div class="form-group">
					<label class="control-label col-md-3" for="Contraseña">Contraseña</label>
					<div class="col-md-7">
					<input type="text" id="Contraseña" value="<?php echo $Contraseña ?>" readonly>
					</div>
				</div>
				
				<div class="form-group">
					<label class="control-label col-md-3" for="Realmlist">Realmlist</label>
					<div class="col-md-7">
					<input type="text" id="Realmlist" value="<?php echo $Realmlist ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-offset-4">
					     <a href="playerside.php"> <button class="btn btn-info">Inicio</button> </a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>