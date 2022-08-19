<?php
include "conector.php";

$idHilo = $_POST["id3"];

$numComentarios = mysqli_query($conector, "SELECT COUNT(*) AS total 
                                           FROM mensajes 
                                           WHERE hilo_ID = $idHilo");


$id = [];

while ($fila = mysqli_fetch_assoc($numComentarios)) {
    $id[] = [ 

      "idHilo" => $fila["total"],
    
    ];
  
}

$datos = json_encode($id);
print_r($idHilo);
?>