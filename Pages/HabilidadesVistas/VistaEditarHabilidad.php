<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Habilidades/Habilidades.php';
include_once '../../TipoHabilidad/TipoHabilidad.php';


$modelaux = new TipoHabilidad();

$tipo_habilidades = $modelaux->getAll();


if(!isset($_GET['id'])) {
	echo "<br>Falta el codi!";
	exit;
}

$id = $_GET['id'];

$model = new Habilidades();

$resultado = $model->get($id);

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['descripcion']) ? $descripcion = $_POST['descripcion'] : $descripcion = "");
(isset($_POST['idTipoHabilidad']) ? $idTipoHabilidad = $_POST['idTipoHabilidad'] : $idTipoHabilidad = "");

if($nombre != "" && $descripcion != "" && $idTipoHabilidad != "") 
{
	$model->update($id,$nombre,$descripcion,$idTipoHabilidad);
	header("Location: ./VistaHabilidades.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Habilidad</title>
    </head>
    <body>
        <button><a href="./VistaHabilidades.php">Volver</a></button>
        <h3>Editar Habilidad <?php echo $resultado['nombre']; ?></h3>
        <form method="POST" action="VistaEditarHabilidad.php?id=<?php echo $id; ?>">
            <label>Nombre</label>
            <input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>"/>
            <label>Descripcion</label>
            <input type="text" name="descripcion" value="<?php echo $resultado['descripcion']; ?>"/>
            <label>Tipo de Habilidad</label>
            <select name="idTipoHabilidad">
            <?php
            foreach($tipo_habilidades as $tipo_habilidad) 
            {
                ?><option value="<?php echo $tipo_habilidad['id']; ?>" <?php echo ($resultado['id_tipo_habilidad'] == $tipo_habilidad['id'] ? "selected" : ""); ?>><?php echo $tipo_habilidad['tipo']; ?></option><?php
            }
            ?>
            </select>
            <input type="submit" value="desar">
        </form>
    </body>
</html>