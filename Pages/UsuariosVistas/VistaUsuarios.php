<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once '..\..\Utilidades\seguridad.php';
include_once '..\..\Usuarios\Usuario.php'; 


$model = new Usuario();
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
    <title>Usuarios</title>
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
            <td class="b">Nombre cuenta</td>
            <td class="b">Contraseña</td>
            <td class="b">Region</td>
            <td class="b">Pais</td>
            <td class="b"><a href="./VistaCrearUsuario.php">Crear</a></td>
        </tr>
        <?php  
        $fila = "a";
        foreach($resultat as $usuario) 
        {
        ?>
            <tr>
                <td class="<?php echo $fila; ?>"><?=$usuario['nombre_cuenta']?></td>
                <td class="<?php echo $fila; ?>"><?=$usuario['password']?></td>
                <td class="<?php echo $fila; ?>"><?=$usuario['region']?></td>
                <td class="<?php echo $fila; ?>"><?=$usuario['pais']?></td>
                <td class="<?php echo $fila; ?>">
                    <a href=".\VistaEditarUsuario.php?id=<?=$usuario['id']?>">Editar</a>
                    <a href="..\..\Usuarios\DeleteUsuario.php?id=<?=$usuario['id']?>">Borrar</a>
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
            ?><a href='VistaUsuarios.php?&page=<?php echo $i; ?>' ><?php echo $i; ?></a><?php
        }

    ?>
</body>
</html>