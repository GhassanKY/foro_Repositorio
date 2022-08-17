<?php
include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];
$datosUsuario = mysqli_query($conector, "SELECT *
FROM usuarios
WHERE correo = '$usuario';");

$id = $_POST["id"];



$idsesion;
$datoshilo = mysqli_query($conector, "   SELECT hilos.* , usuarios.*, temas.nombre AS tema
                                                FROM hilos
                                                JOIN usuarios
                                                ON hilos.usuario = usuarios.id
                                                JOIN temas
                                                ON temas.ID = hilos.tema
                                                WHERE usuarios.id = $id
                                                ORDER BY hilos.ID DESC");


$array = [];
$id = [];



while($row = mysqli_fetch_array($datoshilo)){


    $array[] = [

         "descripcion" => $row["descripcion"],
         "titulo"  => $row["nombre_Hilos"],
         "idhilo" => $row["ID"],
         "fecha" => $row["fechaCreacionHilo"],
         "idusuario" => $row["id"],
         "foto" => $row["image_user"]
        
];
    }

    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $id[] = [ 
    
          "idsesion" => $fila["id"],
          
             
        ];
      
        // $foto = $fila["image_user"];
    }


    $data = [
   
      "hilo" => $array,
      "id" => $id
    
    ];
    $datos = json_encode($data);
    print_r($datos);



