<?php
	session_start();
	if(!isset($_SESSION['usuario'])) {
		header('Location: /M7_Robert_UF1/Pages/formularioLogin.php');
		exit;
	}
?>