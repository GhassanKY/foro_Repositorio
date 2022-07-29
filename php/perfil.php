<?php
include "conector.php";
$id = $_GET["id"];

$datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE id = '$id';");

    $array = [];
    while($fila = mysqli_fetch_assoc($datosUsuario)){
        echo $fila["id"]." id ";
        echo $fila["nombreCompleto"];
        echo $fila["clave"];
        echo $fila["nombreUsuario"];
        echo $fila["correo"];

    } 

?>