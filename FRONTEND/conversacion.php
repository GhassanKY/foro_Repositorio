<?php
include "../BACKEND/BD_CONVERSACION.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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

<?php
if ($activos == 1){
?>
    <form method="post" action="../BACKEND/infoMensajes.php">
        <textarea name="editorMSJ" id="ckeditor" class="ckeditor">
    This is my textarea to be replaced with HTML editor.
    </textarea>
        <input name="idHilo" type="hidden" value="<?php echo $id; ?>">
        <input type="submit" name="submit" value="SUBMIT">
    </form>

<?php
 if (!empty($info)){
  ?>
<button onclick="desactivar_hilo()">Cerrar Hilo</button>

    <dialog id="dialog_hilo">
        <p>¿Estas seguro de querer desactivar este hilo?</p>
        <p>Al desactivar este hilo no permites que alguien <br> escriba un nuevo mensaje</p>
        <div class="desactivar_Hilo">
        <form method="POST" action="../BACKEND/desactivarHilo.php">
            <input name="name_hilo" type="hidden" value="<?php echo "$id" ?>">
            <button name="close_hilo" value="0">Si</button>
        </form>
        <button>No</button>
        </div>
    </dialog>
<?php } ?>
<?php
}
?>

    <?php while ($fila = mysqli_fetch_assoc($nombreHilo)) {   ?>
        <h1><?php echo $fila["nombre_Hilos"]; ?></h1>
        <p><?php echo $fila["descripcion"]; ?></p>
        <p><?php echo $fila["nombreUsuario"]; ?></p>
    <?php } ?>


    <?php while ($hilo = mysqli_fetch_assoc($datosHiloCompleto)) { ?>
        <div class="hilo">
            <p><?php echo $hilo["texto"]; ?></p>
            <p><?php echo $hilo["nombreUsuario"]; ?></p>
            <p><?php echo $hilo["fecha"]; ?></p>
            <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>"><button>Visitar perfil</button></a>
            <br>
            <br>


            <?php if ($hilo["id"] == $idSesion) { ?>
                <button>Editar</button>
                <form action="../BACKEND/editarComentario.php" method="POST">
                    <input type="hidden" value="<?php echo $id; ?>" name="idTabla">
                    <input type="hidden" value="<?php echo $hilo["ID"]; ?>" name="idTexto">
                    <input type="hidden" value="editar" name="accion">
                    <textarea name="textoHilo" id="ckeditor" class="ckeditor">
                  <?php echo $hilo["texto"]; ?>
                </textarea>
                    <button>Guardar Cambios</button>
                    <button class="eliminar">Eliminar</button>
                </form>

            <?php } ?>
        </div>
    <?php } ?>

    <script src="ckeditor/ckeditor.js"></script>
    <script src="./js/desactivarHilo.js"></script>
</body>

</html>