<?php
include_once './TipoHabilidad.php';
$model = new TipoHabilidad();


if(!isset($_GET['id'])) {
	echo "Falta parametro!";
	exit;
}
$id = $_GET['id'];

if($id!="") 
{
	$res= $model->delete($id);
	header("Location: ../Pages/TipoHabilidadVistas/VistaTipoHabilidades.php");
}

?>