<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Campeones/Campeon.php';
include_once '../../Usuarios/Usuario.php';


$modelaux = new Usuario();

$usuarios = $modelaux->getAll();


if(!isset($_GET['id'])) {
	echo "<br>Falta el codi!";
	exit;
}

$id = $_GET['id'];

$model = new Campeon();

$resultado = $model->get($id);

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['nivel']) ? $nivel = $_POST['nivel'] : $nivel = "");
(isset($_POST['ataque']) ? $ataque = $_POST['ataque'] : $ataque = "");
(isset($_POST['armadura']) ? $armadura = $_POST['armadura'] : $armadura = "");
(isset($_POST['vida']) ? $vida = $_POST['vida'] : $vida = "");
(isset($_POST['idUsuario']) ? $idUsuario = $_POST['idUsuario'] : $idUsuario = "");

if($nivel != "" && $ataque != "" && $armadura != "" && $vida != "" && $idUsuario != "") 
{
	$model->update($id,$nombre,$nivel,$ataque,$armadura,$vida,$idUsuario);
	header("Location: ./VistaCampeones.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Campeon</title>
    </head>
    <body>
        <button><a href="./VistaCampeones.php">Volver</a></button>
        <h3>Editar Campeon <?php echo $resultado['nombre']; ?></h3>
        <form method="POST" action="VistaEditarCampeon.php?id=<?php echo $id; ?>">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>"/>
            <label>Nivel</label>
            <input type="number" name="nivel" value="<?php echo $resultado['nivel']; ?>"/>
            <label>Daño</label>
            <input type="number" name="ataque" value="<?php echo $resultado['ataque']; ?>"/>
            <label>Armadura</label>
            <input type="number" name="armadura" value="<?php echo $resultado['armadura']; ?>"/>
            <label>Vida</label>
            <input type="number" name="vida" value="<?php echo $resultado['vida']; ?>"/>
            <label>Usuario</label>
            <select name="idUsuario">
            <?php
            foreach($usuarios as $usuario) 
            {
                ?><option value="<?php echo $usuario['id']; ?>" <?php echo ($resultado['id_usuario'] == $usuario['id'] ? "selected" : ""); ?>><?php echo $usuario['nombre_cuenta']; ?></option><?php
            }
            ?>
            </select>
            <input type="submit" value="desar">
        </form>
    </body>
</html>