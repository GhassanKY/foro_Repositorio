<?php
require 'conector.php';
require 'sesion.php';

$id_usuario = $n;
$nombre_hilo = $_POST['namehilo'];
$descripcion_hilo = $_POST['descripcionHilo'];
$select_tema = $_POST['select'];

if (!empty($nombre_hilo) || !empty($descripcion_hilo) || !empty($id_usuario) || !empty($select_tema)) {
    $SELECT = "SELECT nombre_Hilos from hilos where nombre_Hilos = ? limit 1"; //Consulta de seguridad
    $INSERT = "INSERT INTO hilos (nombre_Hilos, descripcion, tema, usuario) values(?,?,?,?)"; //Insertar datos

    $stmt = $conector->prepare($SELECT);
    $stmt->bind_param("s", $nombre_hilo);
    $stmt->execute();
    $stmt->bind_result($nombre_hilo);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    //Insertamos los valores en la tabla estos valores ($nombre, $precio, $m2, $ascensor, $garaje,$descripcion,$destino)
    if ($rnum == 0) {
        $stmt->close();
        $stmt = $conector->prepare($INSERT);
        $stmt->bind_param("ssii", $nombre_hilo, $descripcion_hilo, $select_tema, $id_usuario);
        $stmt->execute();
        echo "Hilo creado con exito";
    } else {
        echo "vaya :/ alguien ya ah registrado un hilo con este nombre.";
        $stmt->close();
        $conector->close();
    }
} else {
    echo "cuidado faltan algunos datos por rellenar :/";
    die();
}
