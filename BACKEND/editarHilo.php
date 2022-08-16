<?php
include "conector.php";
$id = $_POST["id"];
$tituloHilo = $_POST["titulo"];
$descripcionHilo = $_POST["descripcion"];

mysqli_query($conector, "UPDATE  hilos  
                         SET  nombre_Hilos = '$tituloHilo', descripcion = '$descripcionHilo'
                         WHERE ID = $id;");
?>