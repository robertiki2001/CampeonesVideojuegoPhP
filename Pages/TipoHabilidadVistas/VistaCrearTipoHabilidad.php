<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\TipoHabilidad\TipoHabilidad.php';
include_once '../../Usuarios/Usuario.php';


//$modelaux = new TipoHabilidad();

//$usuarios = $modelaux->getAll();

$model = new TipoHabilidad();

(isset($_POST['tipo']) ? $tipo = $_POST['tipo'] : $tipo = "");

if($tipo != "") 
{
	$model->insert($tipo);
	header("Location: ./VistaTipoHabilidades.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Tipo Habilidad</title>
    </head>
    <body>
        <button><a href="./VistaTipoHabilidades.php">Volver</a></button>
        <h3>Nuevo tipo de habilidad</h3>
        <form method="POST" action="VistaCrearTipoHabilidad.php">
            <label>Tipo</label>
            <input type="text" name="tipo" required/>
            <input type="submit" value="desar">
        </form>
    </body>
</html>