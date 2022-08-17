<?php
include "conector.php";
$idTabla = $_POST["idTabla"];
header("location: ../FRONTEND/conversacion.php?id=$idTabla");

$texto = $_POST["textoHilo"];
$idtexto = $_POST["idTexto"];

mysqli_query($conector, "UPDATE  mensajes
                         SET  texto = '$texto'
                         WHERE ID = $idtexto;");
?>