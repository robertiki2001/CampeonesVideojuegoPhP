<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\Habilidades\Habilidades.php';
include_once '..\..\TipoHabilidad\TipoHabilidad.php'; 


$modelaux = new TipoHabilidad();


$model = new Habilidades();
$resultat = $model->getAll();

$numeroFilas = 4;
$numPages = $model->numPages($numeroFilas);

$page = 1;
if (isset($_GET['page'])) {
	$page = $_GET['page']; 
}

$resultat = $model->getPage($page,$numeroFilas);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habilidades</title>
    <style>
        table
        {
            background-color: #4c4c4c;
        }
        td
        {
            border: 1px solid #4c4c4c;
            border-spacing: 0;
            padding: 5px 2px;
            text-align: center;
        }
        .a
        {
            background-color: #a3ffbed1;
        }
        .b
        {
            background-color: #87b8ffd1;
        }
    </style>
</head>
<body>
    <?php 
        include_once '..\..\Utilidades\NavBar.php';
    ?>
    <table>
        <tr>
            <td class="b">Nombre Habilidad</td>
            <td class="b">Descripcion</td>
            <td class="b">Tipo de habilidad</td>
            <td class="b"><a href="./VistaCrearHabilidad.php">Crear</a></td>
        </tr>
        <?php  
        $fila = "a";
        foreach($resultat as $tipo_habilidad) 
        {
        ?>
            <tr>
                <td class="<?php echo $fila; ?>"><?=$tipo_habilidad['nombre']?></td>
                <td class="<?php echo $fila; ?>"><?=$tipo_habilidad['descripcion']?></td>
                <td class="<?php echo $fila; ?>"><?=$modelaux->get($tipo_habilidad['id_tipo_habilidad'])['tipo']?></td>
                <td class="<?php echo $fila; ?>">
                    <a href=".\VistaEditarHabilidad.php?id=<?=$tipo_habilidad['id']?>">Editar</a>
                    <a href="..\..\Habilidades\DeleteHabilidad.php?id=<?=$tipo_habilidad['id']?>">Borrar</a>
                </td>
            </tr>
        <?php
            if($fila == "a")
            {
                $fila = "b";
            }
            else
            {
                $fila = "a";
            }
        }  
        ?>
        
    </table>


    <?php
        for ($i=1; $i<=$numPages; $i++) 
        {
            ?><a href='VistaHabilidades.php?&page=<?php echo $i; ?>' ><?php echo $i; ?></a><?php
        }

    ?>
</body>
</html>