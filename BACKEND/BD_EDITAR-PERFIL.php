<?php

include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];
$datosUsuario = mysqli_query($conector, "SELECT *
                                FROM usuarios
                                WHERE correo = '$usuario';");

 while ($fila = mysqli_fetch_assoc($datosUsuario)) {

        $n = $fila["id"];
        $foto = $fila["image_user"];
        $nombre = $fila["nombreUsuario"];
        $tel = $fila["telefono"];
        $red = $fila["link"];
        
}
?>