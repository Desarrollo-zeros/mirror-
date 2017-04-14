<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>WoW-Legendary</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<h3>WoW-Legendary Migration</h3>
		</div>
		<div class="row">
			<p>
				<a href="https://wow-legendary.com/Character-Migration/" class="btn btn-success">IR a Inicio</a>
			</p>
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th><PRE> ID</th>
						<th><PRE> Guid</th>
						<th><PRE> ID uenta</th>
						<th><PRE> Nombre PJ</th>
						<th><PRE> Realmlist</th>
						<th><PRE> Items</th>
						<th><PRE><font color="red"> Bloqueado </th>
						<PRE>Recomendamos Ver los pjs del server donde viene para estar seguro... 1-> Bloqueado, 0-> Activo</PRE>
						<th><PRE><font color="gree">Enviado</th>
					</tr>
				
				</thead>
				<tbody>
					<?php  
						include "database.php";
						$pdo = Database::connect();
						$sql = "SELECT *from account_transfer ORDER BY id DESC";
						$reault = $pdo->query($sql,PDO::FETCH_ASSOC);
						foreach ($reault as $row) {
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
							if ($row['cStatus'] == 1 ){
								echo '<td> <h4><span style="color:#FF0000">'.$row['cStatus'].'</td>';
							}else if ($row['cStatus'] > 1){
								echo '<td> <h4><span style="color:#FF0000">'.$row['cStatus'].'</td>';
							}
							else{
								echo '<td> <h4><span style="color:#00FF00">'.$row['cStatus'].'</td>';
							}
							
						//	echo '<td width=130><a class="btn btn-primary btn-sm" href="send.php?id='.$row['id'].'&GUID='.$row['GUID'].'&Name='.$row['cNameNEW'].'&Items='.$row['cItemRow'].'&Bloquear='.$row['Bloquear'].'">Enviar Items</a>';
						
							echo '</td>';
							echo '</tr>';
						}					
					Database::disconnect();
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>