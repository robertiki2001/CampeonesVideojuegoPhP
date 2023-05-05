<?php
	session_start();
	$_SESSION["mensaje"] = "";
	if(!isset($_POST['usuario'])  || !isset($_POST['password'])) {
		$_SESSION["mensaje"] = "Has de passar pel formulari";		
		header('Location: ..\Pages\formularioLogin.php');		
		exit;
	}

	
	$username = $_POST['usuario'];
	$password = $_POST['password'];
	if($username=="" || $password=="") {
		$_SESSION["mensaje"] = "Campos obligatorios";
		header('Location: ..\Pages\formularioLogin.php');		
		exit;
	}

	include_once $_SERVER['DOCUMENT_ROOT'].'\M7_Robert_UF1\Usuarios\Usuario.php';
	$model = new Usuario();

	if(!$model->valida($username,$password)) 
	{   
        $_SESSION["mensaje"] = "Usuario o contraseña incorrectos";    	
		
		header('Location: ..\Pages\formularioLogin.php');
		exit;
	}
	
	// TOT OK
	$_SESSION["usuario"] = $username;
	header('Location: ..\index.php');

?>

