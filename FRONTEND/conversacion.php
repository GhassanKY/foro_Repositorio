<?php
include "../BACKEND/BD_CONVERSACION.php";
include "../BACKEND/conector.php";
include "../BACKEND/BD_SESION.php";

$datosUsuario = mysqli_query($conector, "SELECT * FROM usuarios WHERE correo = '$usuario';");

$desactivado = "[usuario desactivado]";

while ($fila = mysqli_fetch_assoc($datosUsuario)) {
    $n = $fila["id"];
    $foto = $fila["image_user"];
    echo "<br>";
}

$codiGod = $_GET["id"];

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>FORO</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/conversacion.css">
    <link rel="stylesheet" href="css/lista.css">
    <link rel="stylesheet" href="css/sesion.css">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
    <!-- Iconos -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Estilos -->
    <header>
        <nav>
            <img src="image/menu.png" alt="Menu" class="imgMenu">
            <a href="sesion.php"><img src="./img/letras.svg" alt="Logo" class="headerLogo"></a>
            <img src="image/lupa.png" alt="Lupa" class="searchbutton">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">

            <div class="imgHeader">
                <img src="<?php echo $foto; ?>" alt="" class="pfHeader">
                <ol class="PopLR">
                    <a href="perfil.php?idPerfil=<?php echo $n ?>">
                        <li class="perfil1"><img src="image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop">Perfil</li>
                    </a>
                    <a href="editarperfil.php">
                        <li class="settings"><img src="image/config.png" alt="settings" class="buttonSettings buttonPop"> Editar perfil</li>
                    </a>
                    <form action="../BACKEND/fecha-sesion.php" method="POST">
                        <input type="hidden" name="fecha-sesion" value="1">
                        <!-- <a href="../BACKEND/sesionDestroy.php"> -->
                        <button class="exit"><img src="image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</button>
                        <!-- </a> -->
                    </form>

                </ol>
            </div>

        </nav>
    </header>
    <!--barra lateral  -->
    <div class="list">

        <ul>
            <a href="sesion.php">
                <li class="listGroup"><img src="image/hom.png" alt="Chat" class="imgBar"> Inicio</li>
            </a>
            <!-- <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li> -->
            <a href="sidebar.php?id=3">
                <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
            </a>
        </ul>
    </div>

    



<body>
    <!-- <a href="temas.php?id=1"><button>Aviones</button></a>
    <a href="temas.php?id=2"><button>Carros</button></a>
    <a href="temas.php?id=3"><button>Juguetes</button></a>
    <a href="temas.php?id=4"><button>Polittica</button></a>
    <a href="temas.php?id=5"><button>Mercador</button></a>
    <a href="sesion.php"><button>Todos</button></a> -->


    <section class="sectionInfo">

        <div class="publication">
            <div class="hilosGrand">
                <div class="hilosModifi">
                    <div class='comments-container'>

                        <?php
                        if ($activos == 1) {
                        ?>

                            <div class="buttoncambiado">
                                <button class="buttonAggComments">Agregar comentario</button>
                            </div>

                            <div class="formTxtarea">




                                <form method="post" action="../BACKEND/infoMensajes.php" class="txtComments">

                                    <div class="mandos">
                                        <a href="conversacion.php?id=<?php echo $codiGod ?>">
                                            <div class="face">
                                                <img src="image/500horas.png" alt="buttonHome" class="buttonHome">
                                            </div>
                                        </a>

                                        <textarea name="editorMSJ" id="ckeditor" class="ckeditor txtCommentss" placeholder="...">
                            </textarea>
                                        <input name="idHilo" type="hidden" value="<?php echo $id; ?>">
                                        <input type="submit" name="asd" value="Agregar comentario" class="submitButton">
                                </form>
                            </div>



                            <?php
                            if (!empty($info)) {
                            ?>
                                <button onclick="desactivar_hilo()" class="buttonClose">Cerrar Hilo</button>

                                <dialog id="dialog_hilo">
                                    <p>??Estas seguro de querer desactivar este hilo?</p>
                                    <p>Al desactivar este hilo no permites que alguien <br> escriba un nuevo mensaje</p>
                                    <div class="desactivar_Hilo">
                                        <form method="POST" action="../BACKEND/desactivarHilo.php">
                                            <input name="name_hilo" type="hidden" value="<?php echo "$id" ?>">
                                            <button name="close_hilo" value="0" class="buttonClose">Si</button>
                                        </form>
                                        <button onclick="cerrar_dialog()" class="buttonClose">No</button>
                                    </div>
                                </dialog>
                            <?php } ?>
                        <?php
                        }
                        ?>

                        <!-- Activar hilo -->
                        <?php if ($activos == 0 && !empty($info)) { ?>
                            <form method="POST" action="../BACKEND/activarHilo.php">
                                <input name="activar_name_hilo" type="hidden" value="<?php echo "$id" ?>">
                                <input name="activar_hilo" type="hidden" value="1">
                                <button class="buttonClose buttonOpen">Activar hilo</button>
                            </form>
                        <?php } ?>
                        <!-- creador de hilo, titulo principal, y una breve descripci??n -->

                        <?php while ($fila = mysqli_fetch_assoc($nombreHilo)) {   ?>

                            <div class="titleDiv">
                                <div class="publicateFor">
                                    <p class="publicatedForTxt">Publicado por u/<?php
                                                                                $activo = $fila["borrar_user"];
                                                                                if ($activo == 1) {
                                                                                    echo $fila["nombreUsuario"];
                                                                                } else {
                                                                                    echo $desactivado;
                                                                                }
                                                                                ?></p>
                                </div>
                                <h1 class="titleTxt"><?php echo $fila["nombre_Hilos"]; ?></h1>
                                <div class="descripDiv">
                                    <p class="descripTxt"><?php echo $fila["descripcion"]; ?></p>
                                </div>
                            </div>
                        <?php } ?>


                        <!--  -->

                        <?php while ($hilo = mysqli_fetch_assoc($datosHiloCompleto)) { ?>
                            <div class="hilo">


                                <!-- <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>"><button>Visitar perfil</button></a> -->






                                <ul id="comments-list reply-list" class="comments-list">



                                    <li>
                                        <div class='comment-main-level'>
                                            <!-- Avatar -->
                                            <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>">
                                                <div class='comment-avatar'><img src='<?php echo $hilo["image_user"]; ?>' alt='photo'></div>
                                            </a>
                                            <!-- Contenedor del Comentario -->
                                            <div class='comment-box'>
                                                <div class='comment-head'>
                                                    <h6 class='comment-name'>
                                                        <?php
                                                        $activo = $hilo["borrar_user"];
                                                        if ($activo == 1) {
                                                            echo $hilo["nombreUsuario"];
                                                        } else {
                                                            echo $desactivado;
                                                        }
                                                        ?>
                                                        <a href=''></a>
                                                    </h6>

                                                    <i class='fa fa-reply' onclick="respuesta()"></i>

                                                    <script>
                                                        function respuesta() {

                                                            alert("hola");
                                                        }
                                                    </script>

                                                    <i class='fa fa-heart'></i>
                                                </div>
                                                <div class='comment-content'>
                                                    <div class="comentPrincipsd">
                                                        <p class="comentInPublic"><?php echo $hilo["texto"]; ?></p>
                                                    </div>
                                                    <div class="dateComents">
                                                        <p class="dateOfComments"><?php echo $hilo["fecha"]; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </li>

                                    <!-- Respuestas de los comentarios -->
                                    <!-- <ul class='comments-list reply-list'>
                                           
                                                <li>
                                                    <-- Avatar -->
                                    <!-- <div class='comment-avatar'><img src='../image/avatar_o.png' alt=''></div> -->
                                    <!-- Contenedor del Comentario -->
                                    <!-- <div class='comment-box'> -->
                                    <!-- <div class='comment-head'> -->
                                    <!-- <h6 class='comment-name'><a href=''>".$row2['username']."</a></h6> -->

                                    <!-- <i class='fa fa-heart'></i>
                                                        </div>
                                                        <div class='comment-content'></div>
                                                    </div> -->
                                    <!-- </li> -->



                                    <!-- </ul> -->


                                    <?php if ($hilo["id"] == $idSesion) { ?>
                                        <form action="../BACKEND/editarComentario.php" method="POST">
                                            <input type="hidden" value="<?php echo $id; ?>" name="idTabla">
                                            <input type="hidden" value="<?php echo $hilo["ID"]; ?>" name="idTexto">
                                            <input type="hidden" value="editar" name="accion">
                                        </form>

                                    <?php } ?>

                                <?php } ?>



                            </div>
                    </div>
                </div>
            </div>

    </section>
    <img src="./img/fondoReparado.svg" class="fondo-imagen">


    <script src="./js/temacolor.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/commets.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="js/desactivarHilo.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/help.js"></script>



</body>

</html>