
<?php
include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];

if(!isset($_SESSION["welcome"])){
    header("location:index.html");

} else{


    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

    

    $array = [];

    while($fila = mysqli_fetch_assoc($datosUsuario)){
        echo $fila["id"]." id ";
        echo $fila["nombreCompleto"];
        echo $fila["clave"];
        echo $fila["nombreUsuario"];
        echo $fila["correo"];


    } 

    

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<a href="sesionDestroy.php"><button>Salir</button></a> 


</body>
</html>