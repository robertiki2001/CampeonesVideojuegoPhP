<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '../../Habilidades/Habilidades.php';
include_once '../../TipoHabilidad/TipoHabilidad.php';


$modelaux = new TipoHabilidad();

$tipo_habilidades = $modelaux->getAll();

$model = new Habilidades();

(isset($_POST['nombre']) ? $nombre = $_POST['nombre'] : $nombre = "");
(isset($_POST['descripcion']) ? $descripcion = $_POST['descripcion'] : $descripcion = "");
(isset($_POST['idTipoHabilidad']) ? $idTipoHabilidad = $_POST['idTipoHabilidad'] : $idTipoHabilidad = "");

if($nombre != "" && $descripcion != "" && $idTipoHabilidad != "") 
{
	$model->insert($nombre,$descripcion,$idTipoHabilidad);
	header("Location: ./VistaHabilidades.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Habilidad</title>
    </head>
    <body>
        <button><a href="./VistaHabilidades.php">Volver</a></button>
        <h3>Nueva Habilidad</h3>
        <form method="POST" action="VistaCrearHabilidad.php">
            <label>Nombre</label>
            <input type="text" name="nombre" required/>
            <label>Descripcion</label>
            <input type="text" name="descripcion" required/>
            <label>Tipo de habilidad</label>
            <select name="idTipoHabilidad">
            <?php
            foreach($tipo_habilidades as $tipo_habilidad) 
            {
                ?><option value="<?php echo $tipo_habilidad['id']; ?>"><?php echo $tipo_habilidad['tipo']; ?></option><?php
            }
            ?>
            </select>
            <input type="submit" value="desar">
        </form>
    </body>
</html>