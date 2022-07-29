<?php
include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];

if (!isset($_SESSION["welcome"])) {
    header("location:index.html");
} else {

    //Datos del usuario que inicio sesion
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $n = $fila["id"];
        echo "<br>";
    }

    $datosTemas = mysqli_query($conector, " SELECT * FROM temas");



    //con esto obtengo los datos de todos los hilos
    $datosHilos = mysqli_query($conector, "SELECT hilos.*, count(mensajes.texto), usuarios.*
                                           FROM hilos
                                           JOIN mensajes
                                           ON mensajes.hilo_ID = hilos.ID
                                           JOIN usuarios
                                           ON usuarios.id = hilos.usuario
                                           GROUP BY hilos.nombre_Hilos");
}




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
    <a href="sesionDestroy.php"><button>Salir</button></a>

    <form method="POST" action="infoTemas.php">
        <input name="namehilo" type="text" placeholder="Nombre de tu hilo">
        <textarea name="descripcionHilo" placeholder="Descripcion hilo de debate"></textarea>
        <select name="select">
            <?php while ($temas = mysqli_fetch_assoc($datosTemas)) { ?>
                <option value="<?php echo $temas['ID']; ?>"><?php echo $temas['nombre']; ?></option>
            <?php } ?>
        </select>
        <input type="submit">
    </form>



    <?php while ($hilo = mysqli_fetch_assoc($datosHilos)) { ?>
        <div class="hilo">
            <h1><?php echo $hilo["nombre_Hilos"]; ?></h1>
            <h3><?php echo $hilo["descripcion"]; ?></h3>
            <p><?php echo $hilo["nombreUsuario"]; ?></p>
            <p><?php echo $hilo["count(mensajes.texto)"] . " comentarios"; ?></p>
            <p><?php echo $hilo["fechaCreacionHilo"]; ?></p>
            <a href="conversacion.php?id=<?php echo $hilo["ID"] ?>"><button>Leer mas</button></a>
        </div>
    <?php } ?>

</body>

</html>