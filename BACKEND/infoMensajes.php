<?php
session_start();
$usuario = $_SESSION["welcome"];
require 'conector.php';

//Datos del usuario que inicio sesion
$datosUsuario = mysqli_query($conector, "SELECT *
 FROM usuarios
 WHERE correo = '$usuario';");

 while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $n = $fila["id"];
}

$UserID_Mensaje = $n;
$HiloID_Mensaje = $_POST['idHilo'];
$texto = $_POST['editorMSJ'];


if (!empty($UserID_Mensaje) || !empty($HiloID_Mensaje) || !empty($texto)) {
    $SELECT = "SELECT texto from mensajes where texto = ? limit 1"; //Consulta de seguridad
    $INSERT = "INSERT INTO mensajes (texto, usuario_ID, hilo_ID) values(?,?,?)"; //Insertar datos

    $stmt = $conector->prepare($SELECT);
    $stmt->bind_param("s", $texto);
    $stmt->execute();
    $stmt->bind_result($texto);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    //Insertamos los valores en la tabla estos valores ($nombre, $precio, $m2, $ascensor, $garaje,$descripcion,$destino)
    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conector->prepare($INSERT);
        $stmt->bind_param("sss", $texto, $UserID_Mensaje, $HiloID_Mensaje);
        $stmt->execute();
        header("location: ../FRONTEND/conversacion.php?id=$HiloID_Mensaje");
        echo "Mensaje enviado con exito";
    } else {
        echo "vaya no puedes enviar el mismo mensaje mas de 1 vez :/";
        $stmt->close();
        $conector->close();
    }
} else {
    echo "No puedes enviar un mensaje si el campo esta vacio :/";
    die();
}
