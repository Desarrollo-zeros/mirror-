<?php
	$GUID = null;
	$id = null;
    $Name = null;
	$Items = null;
	$Titulo = "Bienvenido a WoW-Legendary";
	$Mensaje = "Heroesss se Bienvenido";
	$Bloquear = null;
	if(!empty($_GET['GUID']))
		$id = $_REQUEST['id'];
		$GUID = $_REQUEST['GUID'];
		$Name = $_REQUEST['Name'];
		$Items= $_REQUEST["Items"];
		$Bloquear = $_REQUEST["Bloquear"];
	if($id==null or $Bloquear == 1 ){
		header("Location: status.php");
	}
	else {
		try {
				$conn = new SoapClient(NULL, array(
						'location' => "http://127.0.0.1:7878/",
						'uri'      => 'urn:TC',
						'style'    => SOAP_RPC,
						'login'    => 'usuario',
						'password' => 'pass'
					));
				$item_array = explode(" ", trim($Items));
				$by10       = 0;
				$toSend     = "";
				$needSend   = count($item_array);
				for($i = 0; $i < count($item_array); $i++) {
					$toSend .= $item_array[$i];
					$toSend .= " ";
					if($by10 == 10) {
							//conn->executeCommand(new SoapParam('send items '.$id.' "'.$Titulo.'" "'.$Mensaje.'" '.$Item.' ', 'command'));
							echo $conn->executeCommand(new SoapParam('send items '.$Name.' "'.$Titulo.'" "'.$Mensaje.'" '.$toSend.' ', 'command'));
						$needSend = $needSend - $by10;
						$by10    = 1;
						$toSend = "";
					} else if($needSend - $by10 == 0) {
					   // $conn->executeCommand(new SoapParam(".send items ". $Name ." \"". $Titulo ."\" \"". $Mensaje ."\" ". $toSend));
						 echo $conn->executeCommand(new SoapParam('send items '.$Name.' "'.$Titulo.'" "'.$Mensaje.'" '.$toSend.' ', 'command'));
						$toSend = "";
						
					} else $by10++;
				}		
				$conn->executeCommand(new SoapParam('.character  changefaction '.$Name.' ', 'command'));
			} catch (Exception $e) {
					print_r($e);
			}
			require "database.php";
			$Bloquear = 1;
			try {
				$conn = Database::connect();
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("UPDATE account_transfer SET Bloquear= :Bloquear WHERE id= :id");
				$stmt->execute(array(":Bloquear"=>$Bloquear,":id"=>$id));
				Database::disconnect();
			} catch (PDOException $e) {
				echo "Error: ".$e->getMessage();
			}
		//$conn->executeCommand(new SoapParam('character rename'.$Name.' ', 'command'));
		//echo $conn->executeCommand(new SoapParam('kick '.$Name.' ', 'command'));
		//echo"<script type=\"text/javascript\">alert('Items Enviado con exito el personaje se ha bloqueado para evitar fraudes'); window.location='status.php';</script>";  
		//header("Location: status.php");
		}
	

	
	

	
	