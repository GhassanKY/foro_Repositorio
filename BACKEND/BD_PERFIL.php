<?php
include "conector.php";
// include "../FRONTEND/perfil.php";
$id = $_GET["idPerfil"];
session_start();
$usuario = $_SESSION["welcome"];
$n = "";
$datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

        while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $idSesion = $fila["id"];
        $fotoSesion = $fila["image_user"];
        
        }

     //Hago una consulta que me da los datos del usuario y el numero de comentarios...
     $comentarios = 0;
    $datosUsuario = mysqli_query($conector, "SELECT hilos.ID, usuarios.*, count(mensajes.texto) AS comentarios
                                        FROM hilos
                                        JOIN usuarios
                                        ON hilos.usuario = usuarios.id
                                        JOIN mensajes
                                        ON mensajes.hilo_ID = hilos.ID
                                        WHERE usuarios.id = $id                          
                                        GROUP BY usuarios.id
                                    ");

    while($fila = mysqli_fetch_assoc($datosUsuario)){
        
        $comentarios = $fila["comentarios"] ?? null;

    } 

    //Hago una consulta que me da el numero de hilos...
    $numhilos = mysqli_query($conector, "SELECT count(hilos.ID) AS NumHilos, usuarios.id
                                            FROM hilos
                                            JOIN usuarios
                                            ON hilos.usuario = usuarios.id
                                            WHERE usuarios.id = $id");
                                            
    while($fila = mysqli_fetch_assoc($numhilos)){
        $hilos = $fila["NumHilos"];

    } 
    

//    obtengo los datos completos del hilo nombre, descripcion, fecha de creacion...
    $fotoperfil = mysqli_query($conector, "   SELECT *
                                             FROM usuarios
                                             WHERE usuarios.id = $id
                                            "); 
    while ($fila = mysqli_fetch_assoc($fotoperfil)) {
        
        $fotoPerfil = $fila["image_user"];
        $nombreUsuario = $fila["nombreUsuario"];
        $id1 = $fila["id"];
        $nombreCompleto = $fila["nombreCompleto"];
        $correo = $fila["correo"];
        $link =  $fila["link"];
        $telefono = $fila["telefono"];
        
        }               
?>