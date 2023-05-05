<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\Campeones\Campeon.php';
include_once '..\..\Usuarios\Usuario.php'; 


$modelaux = new Usuario();


$model = new Campeon();
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
    <title>Campeones</title>
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
            <td class="b">Nombre Campeon</td>
            <td class="b">Nivel</td>
            <td class="b">Daño</td>
            <td class="b">Armadura</td>
            <td class="b">Vida</td>
            <td class="b">Usuario</td>
            <td class="b"><a href="./VistaCrearCampeon.php">Crear</a></td>
        </tr>
        <?php  
        $fila = "a";
        foreach($resultat as $campeon) 
        {
        ?>
            <tr>
                <td class="<?php echo $fila; ?>"><?=$campeon['nombre']?></td>
                <td class="<?php echo $fila; ?>"><?=$campeon['nivel']?></td>
                <td class="<?php echo $fila; ?>"><?=$campeon['ataque']?></td>
                <td class="<?php echo $fila; ?>"><?=$campeon['armadura']?></td>
                <td class="<?php echo $fila; ?>"><?=$campeon['vida']?></td>
                <td class="<?php echo $fila; ?>"><?=$modelaux->get($campeon['id_usuario'])['nombre_cuenta']?></td>
                <td class="<?php echo $fila; ?>">
                    <a href=".\VistaEditarCampeon.php?id=<?=$campeon['id']?>">Editar</a>
                    <a href="..\..\Campeones\DeleteCampeon.php?id=<?=$campeon['id']?>">Borrar</a>
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
            ?><a href='VistaCampeones.php?&page=<?php echo $i; ?>' ><?php echo $i; ?></a><?php
        }

    ?>
</body>
</html>