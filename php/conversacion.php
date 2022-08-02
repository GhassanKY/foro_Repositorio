<?php
include "conector.php";

$id = $_GET["id"];
//Obtengo el nombre de quien creo el hilo
$nombreHilo = mysqli_query($conector, "SELECT hilos.*, usuarios.nombreUsuario
FROM hilos
JOIN usuarios
ON usuarios.id = hilos.usuario
WHERE hilos.ID = $id");


//obtengo todos lo comentarios del hilo
$datosHiloCompleto = mysqli_query($conector, "SELECT hilos.ID, mensajes.texto, usuarios.*
                                              FROM hilos
                                              JOIN mensajes
                                              ON mensajes.hilo_ID = hilos.ID
                                              JOIN usuarios
                                              ON mensajes.usuario_ID = usuarios.id
                                              WHERE hilos.ID = $id; ");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hilo {
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>

    <a href="temas.php?id=1"><button>Aviones</button></a>
    <a href="temas.php?id=2"><button>Carros</button></a>
    <a href="temas.php?id=3"><button>Juguetes</button></a>
    <a href="temas.php?id=4"><button>Polittica</button></a>
    <a href="temas.php?id=5"><button>Mercador</button></a>
    <a href="sesion.php"><button>Todos</button></a>

    <form method="post" action="infoMensajes.php">
        <textarea name="editorMSJ" id="ckeditor" class="ckeditor">
    This is my textarea to be replaced with HTML editor.
    </textarea>
        <input name="idHilo" type="hidden" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="SUBMIT">
    </form>



    <?php while ($fila = mysqli_fetch_assoc($nombreHilo)) {   ?>
        <h1><?php echo $fila["nombre_Hilos"]; ?></h1>
        <p><?php echo $fila["descripcion"]; ?></p>
        <p><?php echo $fila["nombreUsuario"]; ?></p>
    <?php } ?>


    <?php while ($hilo = mysqli_fetch_assoc($datosHiloCompleto)) { ?>
        <div class="hilo">
            <p><?php echo $hilo["texto"]; ?></p>
            <p><?php echo $hilo["nombreUsuario"]; ?></p>
            <p><?php echo $hilo["fechaCreacion"]; ?></p>
            <a href="perfil.php?id=<?php echo $hilo["id"]; ?>"><button>Visitar perfil</button></a>
        </div>
    <?php } ?>

    <script src="../ckeditor/ckeditor.js"></script>
</body>

</html>