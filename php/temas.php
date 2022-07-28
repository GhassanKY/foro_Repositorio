<?php
    include "conector.php";
    session_start();

    $query = "SELECT * FROM temas ORDER BY nombre";
    $temas = mysqli_query($conector, $query);
    $fila = [];
    while($fila[] = mysqli_fetch_assoc($temas))
    {    
    } 
   

    

    for($i=0; $i<count($fila); $i++)
    {
        if(isset($fila[$i]['ID']))
        {
            echo $fila[$i]['ID'];
            echo " " .$fila[$i]['nombre'];
            echo " Número de hilos: ";
            $otraQuery = "SELECT COUNT(tema) AS count FROM hilos WHERE tema=$i";
            $consulta = mysqli_query($conector, $otraQuery);

            $otraFila = mysqli_fetch_assoc($consulta);
            {
                echo $otraFila['count'];
            }
            echo "<br>";
        }
    }

?>