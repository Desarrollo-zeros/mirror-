<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WoW-Legendary</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body background="https://images2.alphacoders.com/159/159670.jpg">
	<div class="container">
		<div class="row">			
		</div>
		<div class="row"><hr>
		<br>
		<br>
		<br><br><br>
			<p>
			<h1>WoW-Legendary Migration</h1>
				<a href="https://wow-legendary.com/Character-Migration/" class="btn btn-success">IR a Inicio</a>
			</p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr><hr>		
						<th><PRE> ID</th>
						<th><PRE> Guid</th>
						<th><PRE> ID uenta</th>
						<th><PRE> Nombre PJ</th>
						<th><PRE> Realmlist</th>
						<th><PRE> Items</th>
						<th><PRE><font color="red"> Bloqueado </th>
						<PRE>Recomendamos Ver los pjs del server donde viene para estar seguro... 1-> Bloqueado, 0-> Activo</PRE>
						<th><PRE>Enviar items</th>
						<th><PRE>Ver Cuenta</th>
					</tr>
				
				</thead>
				<tbody>
				
					<?php  
					$id = null;
					$UsuarioError = null;
					$ContraseñaError = null;
					$GMl = null;
					$rr= null;
					
					if(!empty($_GET['id']) and !empty($_GET['GMl']) and !empty($_GET['rr']) and !empty($_GET['Real']) and $_GET['GMl'] =(4) and base64_decode($_GET['encode'])==$pass1 ){
						$id = $_REQUEST['id'];
						$GMl = $_REQUEST['GMl'];
						$rr = $_REQUEST['rr'];
						$val = true;
							
						include "database.php";
						$pdo = Database::connect();
						$sql = "SELECT *from account_transfer where id = ".$id."";
						$reault = $pdo->query($sql,PDO::FETCH_ASSOC);
						foreach ($reault as $row) {
							if ($row['Bloquear'] ==1){
								
							}else{
								echo '<tr>';
							echo '<td> '.$row['id'].'</td>';
							echo '<td> '.$row['GUID'].'</td>';
							echo '<td> '.$row['cAccount'].'</td>';
							echo '<td> '.$row['cNameNEW'].'</td>';
							echo '<td> '.$row['oRealmlist'].'</td>';
							echo '<td> '.$row['cItemRow'].'</td>';
							//echo '<td> '.$row['Bloquear'].'</td>';
							
							if ($row['Bloquear']==1){
								echo '<td> <h4><span style="color:#FF0000">'.$row['Bloquear'].'</td>';
							}else{
								echo '<td> <h4><span style="color:#00FF00">'.$row['Bloquear'].'</td>';
							}
							$pass1 = base64_encode("159753456wae");
							
							echo '<td width=130><a class="btn btn-primary btn-sm" href="send.php?id='.$row['id'].'&GUID='.$row['GUID'].'&Name='.$row['cNameNEW'].'&Items='.$row['cItemRow'].'&Bloquear='.$row['Bloquear'].'">Enviar Items</a>';
							echo '<td width=130><a class="btn btn-primary btn-sm" href="read.php?id='.$row['id'].'&usuario='.$row['oAccount'].'&pass='.$row["oPassword"].'&Real='.$row['oRealmlist'].'">Ver Informacion</a>';
						}
							
						
							
							echo '</td>';
							echo '</tr>';
						}						
						/*foreach ($reault as $row) {
							echo '<tr>';
							echo '<td> '.$row['id'].'</td>';
							echo '<td> '.$row['oAccount'].'</td>';
							echo '<td> '.base64_decode($row["oPassword"]).'</td>';
							
							echo '<td> '.$row["oRealmlist"].'</td>';
							echo '<td width=130><a class="btn btn-primary btn-sm" href="Leer.php?id='.$row['id'].'&usuario='.$row['oAccount'].'&pass='.$pass.'&Real='.$row["oRealmlist"].'">Ver Informacion</a>';
							echo '</tr>';
						}*/
						
					Database::disconnect();				
					}
					else{
					echo"<script type=\"text/javascript\">alert('Para Evitar Fraude tu Ingreso falso a sido regitrado y avisado a un gm de tu inicio de seccion'); window.location='playerside.php';</script>";  
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>