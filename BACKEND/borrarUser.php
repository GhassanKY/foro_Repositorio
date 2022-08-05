<?php
require 'conector.php';
session_start();
$usuario = $_SESSION["welcome"];


//Datos del usuario que inicio sesion
$datosUsuario = mysqli_query($conector, "SELECT *
 FROM usuarios
 WHERE correo = '$usuario';");

 while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $n = $fila["id"];
}

$Si = $_POST['si'] ?? null;
$id_User = $n;

mysqli_query($conector, "UPDATE usuarios SET borrar_user = '$Si' WHERE id = '$id_User'");
mysqli_close($conector);

header('location: ../FRONTEND/login.php');
