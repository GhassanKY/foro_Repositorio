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
$fechaSesion = $fila["fecha_sesion"];

}

$datosTemas = mysqli_query($conector, " SELECT * FROM temas");
$datosTemas1 = mysqli_query($conector, " SELECT * FROM temas");
$populares = mysqli_query($conector, "SELECT hilos.*, usuarios.*, count(mensajes.ID) AS comentarios
                                            FROM hilos
                                            JOIN mensajes
                                            ON hilos.ID = mensajes.hilo_ID
                                            JOIN usuarios
                                            ON usuarios.id = hilos.usuario
                                            GROUP BY hilos.id
                                            ORDER BY comentarios DESC");

        // while ($hilo = mysqli_fetch_assoc($populares)) {
        //         $fotoHilo= $hilo["image_user"];
        //         $fecha = $hilo["fechaCreacionHilo"];
        //         $titulo = $hilo["nombre_Hilos"];
        //         $descripcion = $hilo["descripcion"];
        //         $idHilo = $hilo["ID"];
        //         $nombreUsuario = $hilo["nombreUsuario"];
        //         $comentarios = $hilo["comentarios"];
                
        // }






?>