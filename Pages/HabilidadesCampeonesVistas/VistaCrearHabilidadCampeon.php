<?php
include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\HabilidadesCampeones\HabilidadesCampeones.php';
include_once '..\..\Campeones\Campeon.php';
include_once '..\..\Habilidades\Habilidades.php'; 


$modelaux1 = new Habilidades();
$modelaux2 = new Campeon();

$habilidades = $modelaux1->getAll();
$campeones = $modelaux2->getAll();

$model = new HabilidadesCampeones();

(isset($_POST['campeon']) ? $campeon = $_POST['campeon'] : $campeon = "");
(isset($_POST['habilidad']) ? $habilidad = $_POST['habilidad'] : $habilidad = "");

if($campeon != "" && $habilidad != "") 
{
	$model->insert($campeon,$habilidad);
	header("Location: ./VistaHabilidadesCampeones.php");
}

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crear Campeon Habilidad</title>
    </head>
    <body>
        <button><a href="./VistaHabilidadesCampeones.php">Volver</a></button>
        <h3>Nuevo Campeon Habilidad</h3>
        <form method="POST" action="VistaCrearHabilidadCampeon.php">
            <label>Campeon</label>
            <select name="campeon">
            <?php
            foreach($campeones as $campeon) 
            {
                ?><option value="<?php echo $campeon['id']; ?>"><?php echo $campeon['nombre']; ?></option><?php
            }
            ?>
            </select>
            <label>Habilidad</label>
            <select name="habilidad">
            <?php
            foreach($habilidades as $habilidad) 
            {
                ?><option value="<?php echo $habilidad['id']; ?>"><?php echo $habilidad['nombre']; ?></option><?php
            }
            ?>
            </select>
            <input type="submit" value="desar">
        </form>
    </body>
</html>