<?php

	session_start();
	// Esborrar variables de la sessió
	session_unset();
	        // unset($_SESSION['username']);

	// tancar sessio: esborrar coockie
	session_destroy();

	header('Location: ../Pages/formularioLogin.php');

?>