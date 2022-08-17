<?php
include "conector.php";
//Cantidad de comentarios
$CantidadComentarios = mysqli_query($conector, "SELECT hilos.ID AS idTabla, COUNT(mensajes.texto) AS comentarios, mensajes.usuario_ID AS idUsuario
                                                FROM hilos
                                                JOIN mensajes
                                                ON  mensajes.hilo_ID = hilos.ID
                                                GROUP BY hilos.ID");

$datos = [];
while ($datos[] = mysqli_fetch_assoc($CantidadComentarios)){}
print_r($datos);
echo "<br>";
echo "<br>";
echo "<br>";


// $id = 14;

// foreach ($CantidadComentarios as $key) {

//     if ($key["idTabla"] == $id){
//         echo $key["comentarios"];
//     } 
// }


// for ($i=0; $i < count($datos) ; $i++) { 
//  if ($datos[$i]["idTabla"] == $id){
//     echo $datos[$i]["comentarios"];
//  } else{
//     echo "error";
//  }

?>