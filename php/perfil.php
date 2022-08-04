<?php
include "conector.php";
$id = $_GET["id"];
session_start();
$usuario = $_SESSION["welcome"];
$n = "";
$datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $idSesion = $fila["id"];
}
//Hago una consulta que me da los datos del usuario y el numero de comentarios...
$datosUsuario = mysqli_query($conector, "SELECT hilos.ID, usuarios.*, count(mensajes.texto) AS comentarios
                                        FROM hilos
                                        JOIN usuarios
                                        ON hilos.usuario = usuarios.id
                                        JOIN mensajes
                                        ON mensajes.hilo_ID = hilos.ID
                                        WHERE usuarios.id = $id");

while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $id1 = $fila["id"];
    $foto = $fila["image_user"];
    $nombreCompleto = $fila["nombreCompleto"];
    $nombreUsuario = $fila["nombreUsuario"];
    $correo = $fila["correo"];
    $link =  $fila["link"];
    $telefono = $fila["telefono"];
    $comentarios = $fila["comentarios"];
    $borrar = $fila["borrar_user"];
}

//Hago una consulta que me da el numero de hilos...
$numhilos = mysqli_query($conector, "SELECT count(hilos.ID) AS NumHilos, usuarios.id
                                            FROM hilos
                                            JOIN usuarios
                                            ON hilos.usuario = usuarios.id
                                            WHERE usuarios.id = $id");

while ($fila = mysqli_fetch_assoc($numhilos)) {
    $hilos = $fila["NumHilos"];
}


//obtengo los datos completos del hilo nombre, descripcion, fecha de ceracion...
$datoshilo = mysqli_query($conector, "   SELECT hilos.* , usuarios.*, temas.nombre AS tema
                                                FROM hilos
                                                JOIN usuarios
                                                ON hilos.usuario = usuarios.id
                                                JOIN temas
                                                ON temas.ID = hilos.tema
                                                WHERE usuarios.id = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .d {
            border-bottom: 1px solid black;
        }
    </style>
    <title>Document</title>
</head>

<body>
<?php
$error = "vaya tu cuenta a sido eliminada :/"; /* hago una comprobacion si el numero es igual a 1 el usuario existe, pero si este es igual a 0 esta eliminado */
if ($borrar == 1){ 
?>
    <img width="50px" src="<?php echo $foto ?>" alt="">
    <div class="datos">
        <a href="#">Correo<?php echo $correo ?></a>
        <a href="#">Telefono<?php echo $telefono ?></a>
        <a href="#">Link<?php echo $link ?></a>
    </div>
    <br>
    <br>
    <div class="comentarios">

        <p>Comentarios <?php echo $comentarios ?></p>
        <p>Hilos <?php echo $hilos ?></p>
    </div>
    <br>
    <br>

    <button id="eliminar_user" onclick="eliminar_user()">Eliminar cuenta</button>

    <dialog id="dialogo">
        ¿Estas seguro de querer eliminar tu cuenta?
        <form method="POST" action="borrarUser.php">
            <button id="si" value="0">Si</button>
        </form>
        <button onclick="cerrar_dialog()" id="No">No</button>
    </dialog>


    <?php while ($fila = mysqli_fetch_assoc($datoshilo)) { ?>
        <div class="d">
            <p><?php echo $fila["nombre_Hilos"]; ?></p>
            <p><?php echo $fila["descripcion"]; ?></p>
            <p><?php echo $fila["fechaCreacionHilo"]; ?></p>
            <p><?php echo  $fila["tema"]; ?></p>




            <?php if ($id == $idSesion) { ?>
                <button class="editar">Editar</button>

                <form action="editarHilo.php" method="POST">
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <input type="hidden" value="<?php echo $fila["ID"]; ?>" name="idHilo">
                    <input type="hidden" value="editar" name="accion">
                    <input name="tituloHilo" type="text" class="tituloHilo" value="<?php echo $fila["nombre_Hilos"]; ?>">
                    <input name="descripcionHilo" type="text" class="descripcionHilo" value="<?php echo $fila["descripcion"]; ?>">
                    <button>Guardar Cambios</button>
                    <button class="eliminar">Eliminar</button>
                </form>
            <?php } ?>
        </div>
    <?php } ?>

    <br>
<?php 

}else {
    header('location:login.php'); /* si el usuario esta eliminado lo retorno a login en la pestaña de inicio */
}
?>
    <script src="../js/botonEliminar.js"></script>
</body>

</html>