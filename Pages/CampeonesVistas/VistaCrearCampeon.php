<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Campeones/Campeon.php';
include_once '../../Usuarios/Usuario.php';


$modelaux = new Usuario();

$usuarios = $modelaux->getAll();

$model = new Campeon();

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['nivel']) ? $nivel = $_POST['nivel'] : $nivel = "");
(isset($_POST['ataque']) ? $ataque = $_POST['ataque'] : $ataque = "");
(isset($_POST['armadura']) ? $armadura = $_POST['armadura'] : $armadura = "");
(isset($_POST['vida']) ? $vida = $_POST['vida'] : $vida = "");
(isset($_POST['idUsuario']) ? $idUsuario = $_POST['idUsuario'] : $idUsuario = "");

if($nombre != "" && $nivel != "" && $ataque != "" && $armadura != "" && $vida != "" && $idUsuario != "") 
{
	$model->insert($nombre,$nivel,$ataque,$armadura,$vida,$idUsuario);
	header("Location: ./VistaCampeones.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Campeon</title>
    </head>
    <body>
        <button><a href="./VistaCampeones.php">Volver</a></button>
        <h3>Nuevo Campeon</h3>
        <form method="POST" action="VistaCrearCampeon.php">
            <label>Nombre</label>
            <input type="text" name="nombre" required/>
            <label>Nivel</label>
            <input type="number" name="nivel" required/>
            <label>Daño</label>
            <input type="number" name="ataque" required/>
            <label>Armadura</label>
            <input type="number" name="armadura" required/>
            <label>Vida</label>
            <input type="number" name="vida" required/>
            <label>Usuario</label>
            <select name="idUsuario">
            <?php
            foreach($usuarios as $usuario) 
            {
                ?><option value="<?php echo $usuario['id']; ?>"><?php echo $usuario['nombre_cuenta']; ?></option><?php
            }
            ?>
            </select>
            <input type="submit" value="desar">
        </form>
    </body>
</html>