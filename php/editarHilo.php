<?php
include "conector.php";
$id = $_POST["id"];
header("location: perfil.php?id=$id");

$tituloHilo = $_POST["tituloHilo"];
$descripcionHilo = $_POST["descripcionHilo"];
$idHilo = $_POST["idHilo"];

mysqli_query($conector, "UPDATE  hilos  
                         SET  nombre_Hilos = '$tituloHilo', descripcion = '$descripcionHilo'
                         WHERE ID = $idHilo;");
?>