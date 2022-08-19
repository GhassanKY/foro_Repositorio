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
    $SELECT = "SELECT texto from mensajes where texto = ? limit 7"; //Consulta de seguridad
    $INSERT = "INSERT INTO mensajes (texto, usuario_ID, hilo_ID) values(?,?,?)"; //Insertar datos

    $stmt = $conector->prepare($SELECT);
    $stmt->bind_param("s", $texto);
    $stmt->execute();
    $stmt->bind_result($texto);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    //Insertamos los valores en la tabla estos valores ($nombre, $precio, $m2, $ascensor, $garaje,$descripcion,$destino)
    if ($rnum < 7) {
        $stmt->close();
        $stmt = $conector->prepare($INSERT);
        $stmt->bind_param("sss", $texto, $UserID_Mensaje, $HiloID_Mensaje);
        $stmt->execute();
        header("location: ../FRONTEND/conversacion.php?id=$HiloID_Mensaje");
        echo "Mensaje enviado con exito";
    } else {
        // echo "<h1>No hagas mas spam hijo de tu xingada madre >:c</h1>";
        header("refresh: 3 ../FRONTEND/conversacion.php?id=$HiloID_Mensaje");
        $stmt->close();
        $conector->close();
    }
} else {
    echo "No puedes enviar un mensaje si el campo esta vacio :/";
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <style>
        * {
            background: black;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .spam {
            width: 38%;
        height: 100%;
        display: flex;
        align-items: center;
        margin: 0 auto;
    }
        
        h1 {
            color: white;
        border: 1px solid white;
        width: 19%;
        margin: 92px auto;
        font-size: 2vw;
        text-align: center;
        text-transform: uppercase;
        border-radius: 9px;
        padding: 8px 11px;
        }
        @media only screen and (max-width: 700px) {
            
            .spam {
        width: 99%;
        height: 100%;
        display: flex;
        align-items: center;
        margin: 0 auto;
            }
            h1 {
        color: white;
        border: 1px solid white;
        width: 85%;
        margin: 92px auto;
        font-size: 9vw;
        text-align: center;
        text-transform: uppercase;
        border-radius: 9px;
        padding: 8px 11px;
            }

        }

    </style>
</head>
<body>
    <h1>Evita el spam</h1>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c8/No-spam.svg/1024px-No-spam.svg.png" alt="stop_spam" class="spam">

</body>
</html>