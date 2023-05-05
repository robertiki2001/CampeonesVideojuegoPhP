<?php

function conectar() {
	$usuario="Robert";
	$contraseña="Robert123";    
	$database ="campeoneslol";
	$host = "localhost";

	try 
	{
		
		$bd = new PDO('mysql:host='.$host.';dbname='.$database, $usuario, $contraseña);
	} 
	catch(PDOException $e) 
	{
		echo "Error de conexión";
		exit;
	}

	return $bd;
}

?>