<?php
include_once './Habilidades.php';
$model = new Habilidades();


if(!isset($_GET['id'])) {
	echo "Falta parametro!";
	exit;
}
$id = $_GET['id'];

if($id!="") 
{
	$res= $model->delete($id);
	header("Location: ../Pages/HabilidadesVistas/VistaHabilidades.php");
}

?>