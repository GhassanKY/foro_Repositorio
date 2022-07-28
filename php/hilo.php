<?php
    include "conector.php";
    session_start();
    //coger de POST qué hilo es
    $IDHilo = 1;

    $query = "SELECT * FROM hilos WHERE ID=$IDHilo";
    $temas = mysqli_query($conector, $query);
    $fila = [];
    while($fila[] = mysqli_fetch_assoc($temas))
    {    
    } 

    if(isset($fila[0]['ID']))
    {
        echo "Hilo ";
        echo $fila[0]['nombre']; //nombre del hilo
        echo "<br>Descripción: ";
        echo $fila[0]['descripcion']; //descripción del hilo
        echo "<br>Creador: ";
        $idUsuario = $fila[0]['usuario']; //ID del usuario que ha creado el hilo
        $queryUsuario = "SELECT nombreUsuario FROM usuarios WHERE id=$idUsuario";
        $consulta = mysqli_query($conector, $queryUsuario);

        $usuario = mysqli_fetch_assoc($consulta);
        echo $usuario['nombreUsuario']; //nombre del usuario que ha creado el hilo
        echo "<br>";

        $queryMensajes = "SELECT * FROM mensajes WHERE hilo=$IDHilo";
        $consulta = mysqli_query($conector, $queryMensajes);
        $mensajes = [];
        while($mensajes[] = mysqli_fetch_assoc($consulta))
        {
            
        }

        for($i=0; $i<(count($mensajes)-1); $i++)
        {
            $idUsuarioMsg = $mensajes[$i]['usuario']; //id del usuario que ha escrito este mensaje
            $queryUsername = "SELECT nombreUsuario FROM usuarios WHERE id=$idUsuarioMsg";
            $consulta = mysqli_query($conector, $queryUsername);

            $nombreUsuario = mysqli_fetch_assoc($consulta);
            echo "@" .$nombreUsuario['nombreUsuario']; //nombre del usuario que ha escrito este mensaje

            echo " " .$mensajes[$i]['fecha']; //fecha y hora en la que se creó el mensaje
            echo "<br>";
            echo "<pre>";
            echo $mensajes[$i]['texto']; //texto del mensaje. Se pone <pre> para que se reconozcan las etiquetas html que puede haber en el mensaje
            echo "</pre>";
            echo "<br>";
        }
    }

?>