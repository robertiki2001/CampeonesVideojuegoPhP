<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\TipoHabilidad\TipoHabilidad.php';
include_once '../../Usuarios/Usuario.php';


//$modelaux = new Usuario();

//$usuarios = $modelaux->getAll();


if(!isset($_GET['id'])) {
	echo "<br>Falta el codi!";
	exit;
}

$id = $_GET['id'];

$model = new TipoHabilidad();

$resultado = $model->get($id);

(isset($_POST['tipo']) ? $tipo = $_POST['tipo'] : $tipo = "");

if($tipo != "") 
{
	$model->update($id,$tipo);
	header("Location: ./VistaTipoHabilidades.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Tipo habilidad</title>
    </head>
    <body>
        <button><a href="./VistaTipoHabilidades.php">Volver</a></button>
        <h3>Editar Habilidad <?php echo $resultado['tipo']; ?></h3>
        <form method="POST" action="VistaEditarTipoHabilidad.php?id=<?php echo $id; ?>">
            <label>Tipo</label>
            <input type="text" name="tipo" value="<?php echo $resultado['tipo']; ?>"/>
            <input type="submit" value="desar">
        </form>
    </body>
</html>