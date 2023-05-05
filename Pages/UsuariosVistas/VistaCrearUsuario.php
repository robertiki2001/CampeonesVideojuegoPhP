<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Usuarios/Usuario.php';

$model = new Usuario();

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['password']) ? $password = $_POST['password'] : $password = "");
(isset($_POST['region']) ? $region = $_POST['region'] : $region = "");
(isset($_POST['pais']) ? $pais = $_POST['pais'] : $pais = "");

if($nombre != "" && $password != "" && $region != "" && $pais != "") 
{
	$model->insert($nombre,$password,$region,$pais);
	header("Location: ./VistaUsuarios.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Usuario</title>
    </head>
    <body>
        <button><a href="./VistaUsuarios.php">Volver</a></button>
        <h3>Nuevo Usuario</h3>
        <form method="POST" action="VistaCrearUsuario.php">
            <label>Nombre</label>
            <input type="text" name="nombre" required/>
            <label>Contraseña</label>
            <input type="password" name="password" required/>
            <label>Region</label>
            <input type="text" name="region" required/>
            <label>Pais</label>
            <input type="text" name="pais" required/>
            <input type="submit" value="desar">
        </form>
    </body>
</html>