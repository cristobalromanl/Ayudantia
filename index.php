<?php                                                                                               //CRISTOBAL ROMAN LEIVA
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ayudantia";
$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


if(mysqli_connect_errno()){
    echo "Error al conectar a la base de datos";
}

$idImagen = 7;                                                                                      // CODIGO DE ID IMAGEN A MOSTRAR
$Consulta = $con->query("SELECT url FROM Imagenes where id = $idImagen");
$dato = $Consulta->fetch_assoc();
$Imagen = $dato["url"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad ayudantia</title>
</head>

<body style="display:flex;justify-content:center;align-items:center; background:#000000;flex-direction:column;  margin:0; color:white;">
        

    <h1 style="color: white ; margin:5px F F F">Actividad Listar</h1>                       

    <table class="table table-striped" border="1">                                                  <!--CREACION DE LA TABLA PARA MOSTRAR POR PANTALLA-->
            
            <thead>
            <tr>
                <td>ID</td>                                                                         <!--NOMBRE DE COLUMNA PARA LAS ID-->
                <td>URL</td>                                                                        <!--NOMBRE DE COLUMNA PARA LAS URL-->
            </tr>
            </thead>
        <?php 
        $cont = 0;
        foreach ($con->query('SELECT * from Imagenes') as $row){?> 
        <tr>
            <td><?php echo $row['id']  ?></td>
            <td><?php echo $row['url'] ?></td>
        </tr>
        <?php
        }
        ?>
        </table>

    <img src="<?php echo $Imagen ?>">                                                               <!--SE MUESTRA LA IMAGEN CON LA ID SELECCIONADA-->

</body>
</html>