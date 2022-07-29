<?php
    include "conector.php";
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hilo</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <style>
        form
        {
            width: 60%;
        }
    </style>
    <script src="https://cdn.tiny.cloud/1/osvl1ulep3sk3lvbav27xthkna729y9e64bqcjh0aju5fczf/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
    

<?php
    //coger de POST qué hilo es
    $IDHilo = 1;
    
        
    if(isset($_POST['editordata'])) //Si se ha rellenado el campo de nuevo mensaje, entrará en este if
    {
        $emailUsuario = $_SESSION["welcome"];
        $queryUser = "SELECT id FROM usuarios WHERE correo='$emailUsuario'";

        $consulta = mysqli_query($conector, $queryUser);
        
        $idUsuario = mysqli_fetch_assoc($consulta);
        $idUsuario = $idUsuario['id']; //se coge el id del usuario que tiene iniciada la sesión para vincularlo al mensaje

        $texto = $_POST['editordata']; //lo escrito en el editor
        $datetime = new DateTime('NOW'); //fecha actual
        $datetime = $datetime->format('Y-m-d H:i:s');

        $queryMensaje = "INSERT INTO mensajes (texto, usuario, hilo, fecha)
                        VALUES ('$texto', $idUsuario, $IDHilo, '$datetime')";
        $consulta = mysqli_query($conector, $queryMensaje);
        
    }

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
    <form method="post" action="">
        <textarea id="summernote" name="editordata"></textarea>
        <button type="submit">Sumbit</button>
    </form>

    
    <script>
        $(document).ready(function() 
        {
            $('#summernote').summernote();
        });
    </script>

</body>
</html><