<?php
require './conector.php';

session_start();
$usuario = $_SESSION["welcome"];

$w = $_POST['close_hilo'];
$k = $_POST['name_hilo'];

$datosUsuario = mysqli_query($conector, "SELECT *
 FROM usuarios
 WHERE correo = '$usuario';");

 while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $n = $fila["id"];
}


mysqli_query($conector, "UPDATE hilos SET activo = '$w' WHERE usuario = '$n' AND ID = $k");
mysqli_close($conector);

header('location: ../FRONTEND/conversacion.php?id='.$k);