<?php
include "../BACKEND/conector.php";
session_start();
$usuario = $_SESSION["welcome"];
$datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $idSesion = $fila["id"];
}


$id = $_GET["id"];
//Obtengo el nombre de quien creo el hilo
$nombreHilo = mysqli_query($conector, "SELECT hilos.*, usuarios.nombreUsuario
                                        FROM hilos
                                        JOIN usuarios
                                        ON usuarios.id = hilos.usuario
                                        WHERE hilos.ID = $id");


//obtengo todos lo comentarios del hilo
$datosHiloCompleto = mysqli_query($conector, "SELECT hilos.ID, mensajes.*, usuarios.*
                                            FROM hilos
                                            JOIN mensajes
                                            ON mensajes.hilo_ID = hilos.ID
                                            JOIN usuarios
                                            ON mensajes.usuario_ID = usuarios.id
                                            WHERE hilos.ID = $id; ");
?>