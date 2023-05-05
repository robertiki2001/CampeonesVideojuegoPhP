<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Usuarios/Usuario.php';

if(!isset($_GET['id'])) {
	echo "<br>Falta el codi!";
	exit;
}

$id = $_GET['id'];

$model = new Usuario();

$resultado = $model->get($id);

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['password']) ? $password = $_POST['password'] : $password = "");
(isset($_POST['region']) ? $region = $_POST['region'] : $region = "");
(isset($_POST['pais']) ? $pais = $_POST['pais'] : $pais = "");

if($nombre != "" && $password != "" && $region != "" && $pais != "") 
{
	$model->update($id,$nombre,$password,$region,$pais);
	header("Location: ./VistaUsuarios.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Usuario</title>
    </head>
    <body>
        <button><a href="./VistaUsuarios.php">Volver</a></button>
        <h3>Editar Usuario <?php echo $resultado['nombre_cuenta']; ?></h3>
        <form method="POST" action="VistaEditarUsuario.php?id=<?php echo $id; ?>">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $resultado['nombre_cuenta']; ?>"/>
            <label>Contraseña</label>
            <input type="password" name="password" value="<?php echo $resultado['password']; ?>"/>
            <label>Region</label>
            <input type="text" name="region" value="<?php echo $resultado['region']; ?>"/>
            <label>Pais</label>
            <input type="text" name="pais" value="<?php echo $resultado['pais']; ?>"/>
            <input type="submit" value="desar">
        </form>
    </body>
</html>