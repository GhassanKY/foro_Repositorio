<?php
include "../BACKEND/conector.php";

if(!isset($_SESSION)){
    session_start();
}

$idHilo;
$usuario = $_SESSION["welcome"];
if (!isset($_SESSION["welcome"])) {
    header("location: index.html");
} else {
    
    
    //Datos del usuario que inicio sesion
    $datosUsuario = mysqli_query($conector, "SELECT *
                                             FROM usuarios
                                             WHERE correo = '$usuario';");

    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $n = $fila["id"];
        $foto = $fila["image_user"];
        $fechaSesion = $fila["fecha_sesion"];
       
    }
    //Datos de los temas para el select
    $datosTemas = mysqli_query($conector, " SELECT * FROM temas");
    $datosTemas1 = mysqli_query($conector, " SELECT * FROM temas");




    //Cantidad de comentarios

    $CantidadComentarios = mysqli_query($conector, "SELECT hilos.ID AS idTabla, COUNT(mensajes.texto) AS comentarios, mensajes.usuario_ID AS idUsuario
                                                    FROM hilos
                                                    JOIN mensajes
                                                    ON  mensajes.hilo_ID = hilos.ID
                                                    GROUP BY idTabla");

}

//fecha actual
$fechaActual = date("Y-m-d H:i:s");

?>