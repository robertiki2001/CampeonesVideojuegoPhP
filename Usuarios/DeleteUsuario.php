<?php
include_once './Usuario.php';
$model = new Usuario();


if(!isset($_GET['id'])) {
	echo "Falta parametro!";
	exit;
}
$id = $_GET['id'];

if($id!="") 
{
	$res= $model->delete($id);
	header("Location: ../Pages/UsuariosVistas/VistaUsuarios.php");
}

?>