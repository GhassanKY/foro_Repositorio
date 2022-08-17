<?php
    include "conector.php";
   
    session_start();
    $usuario = $_SESSION["welcome"];
    //Datos del usuario que inicio sesion
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");
    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $n = $fila["id"];
        $foto = $fila["image_user"];
        echo "<br>";
    }
    
    $c = null; 
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");



   $id = $_GET["id"];


     //Datos de los temas para el slect
    $datosTemas = mysqli_query($conector, " SELECT * FROM temas");
    $datosTemas1 = mysqli_query($conector, " SELECT * FROM temas");

    
   //con esto obtengo los hilos por categorias
   $datosHilos = mysqli_query($conector, "SELECT hilos.*, usuarios.*, temas.ID AS idTema
                                          FROM hilos
                                          JOIN usuarios
                                          ON usuarios.id = hilos.usuario
                                          JOIN temas
                                          ON temas.ID = hilos.tema
                                          WHERE temas.ID = $id
                                          GROUP BY hilos.nombre_Hilos
                                          ORDER BY hilos.fechaCreacionHilo DESC ");

   //titulo del tema
   $tituloTema = mysqli_query($conector, "SELECT * 
                                          FROM temas
                                          WHERE ID = $id");