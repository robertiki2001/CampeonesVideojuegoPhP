<?php
	session_start();
	if(isset($_SESSION["usuario"]))
	{
		header('Location: ..\index.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<form method="POST" action="../DB/validarUsuario.php">
		Usuario: <input type="text" name="usuario"><br>
		Contraseña: <input type="password" name="password"><br>
		<input type="submit" value="validar">
	</form>
	<?php
		if(isset($_SESSION["mensaje"]))
			echo "<br>".$_SESSION["mensaje"];
	?>
</body>
</html>