<?php
include_once './Campeon.php';
$model = new Campeon();


if(!isset($_GET['id'])) {
	echo "Falta parametro!";
	exit;
}
$id = $_GET['id'];

if($id!="") 
{
	$res= $model->delete($id);
	header("Location: ../Pages/CampeonesVistas/VistaCampeones.php");
}

?>