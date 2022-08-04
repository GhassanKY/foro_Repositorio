<?php
include "conector.php";
session_start();


$correo = $_POST["correo"] ?? null;
$clave = $_POST["clave"] ?? null;


$validar = mysqli_query($conector, "SELECT * FROM usuarios 
                                    WHERE correo = '$correo' and clave = '$clave' and borrar_user = 1");
                            

if(mysqli_num_rows($validar) > 0){
    $_SESSION["welcome"] = $correo;  
    header("location: sesion.php");
    
    
} else{
    echo
    "<script>
       alert('Usuario no existe');
       window.location = '../index.html'
    </script>";
}

