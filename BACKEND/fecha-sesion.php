<?php
include "conector.php";
header("location: sesionDestroy.php");
session_start();
$usuario = $_SESSION["welcome"];
$datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario' ");

while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $id = $fila["id"];
    
    }

$fecha = $_POST["fecha-sesion"];
$fecha = date("Y-m-d H:i:s");
echo $fecha;

$ejecutar = mysqli_query($conector, "UPDATE usuarios SET  
                                     fecha_sesion = '$fecha'
                                     WHERE id = $id ");


?>