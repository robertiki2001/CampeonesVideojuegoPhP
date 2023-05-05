<?php
include_once './HabilidadesCampeones.php';
$model = new HabilidadesCampeones();


if(!isset($_GET['id'])) {
	echo "Falta parametro!";
	exit;
}
$id = $_GET['id'];

if($id!="") 
{
	$res= $model->delete($id);
	header("Location: ../Pages/HabilidadesCampeonesVistas/VistaHabilidadesCampeones.php");
}

?>