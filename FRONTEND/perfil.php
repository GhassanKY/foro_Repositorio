<?php
include "../BACKEND/BD_PERFIL.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ba10ce0731.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/perfil.css">



    
    
    <style>
         .d{
          border-bottom: 1px solid black;  
         }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="mandos">
      <a href="sesion.php"><p>HOMME</p><img src="image/der.png" alt=""></a>
    </div>
    <header>
        <nav>
            <img src="image/menu.png" alt="Menu" class="imgMenu">
            <a href="sesion.php"><img src="image/logo.png" alt="Logo" class="headerLogo"></a>
            <img src="image/lupa.png" alt="Lupa" class="searchbutton">
            <div class="imgHeader">
                <img src="<?php echo $fotoSesion; ?>" alt="" class="pfHeader">
                <ol class="PopLR">
                    <a href="perfil.php?idPerfil=<?php echo $idSesion ?>">
                        <li class="perfil1"><img src="image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop">Perfil</li>
                    </a>
                    <a href="editarperfil.php">
                        <li class="settings"><img src="image/config.png" alt="settings" class="buttonSettings buttonPop"> Editar perfil</li>
                    </a>
                        <form action="../BACKENd/fecha-sesion.php" method="POST">
                            <input type="hidden" name="fecha-sesion" value="1">
                            <!-- <a href="../BACKEND/sesionDestroy.php"> -->
                                <button class="exit"><img src="image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</button>
                            <!-- </a> -->
                        </form>
                </ol>
            </div>
        </nav>
    </header>
    <div class="list">
        <ul>

            <a href="sesion.php"><li class="listGroup"><img src="image/hom.png" alt="Chat" class="imgBar">  Inicio</li></a>
            <li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar"> Discusiones</li>
            <li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar"> Tags</li>
            <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
            <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
        </ul>
    </div>

    <div>
        <div class="barradedatos">
            <div class="user_image">
                    <img class="img_user" src="<?php echo $fotoPerfil ?>">
                <div class="nombres">
                    <h2><?php echo $nombreUsuario ?></h2>
                </div>
            </div>
            <div class="box_options">
                <div class="menu_options">
                    <p>Comentarios</p>
                    <div class="icon">
                        <img class="i2" src="image/chateando.png" alt="">
                        <p class="NumComentarios"><?php echo $comentarios ?></p>
                    </div>
                </div>
                <div class="menu_options o2">
                    <p>Hilos</p>
                    <div class="icon2">
                        <img class="i1" src="image/hilos.png" alt="">
                        <p class="NumHilos"><?php echo $hilos ?></p>
                    </div>
                </div>
                <div class="menu_options informacion1">
                    <img width="20px" src=" image/i.png" alt="">
                    <p class="info">Informacion</p>
                    <div class="datos">
                        <a href="mailto:<?php echo $correo ?>"><img src="image/gmail.png" alt=""><?php echo $correo ?></a>
                        <a href="https://wa.me/<?php echo $telefono?>"><img src="image/whatsap.png" alt=""><?php echo $telefono?></a>
                        <a href="<?php echo $link ?>"><img src="image/internet.png" alt=""><?php echo $link ?></a>
                    </div>
                </div>

                <?php
                $SesionActual = $_GET['idPerfil'];
                if ($idSesion == $SesionActual){
                ?>
                <button  class="botonEliminar" onclick="eliminar_user ()"><img class="iconoTrash" src="../FRONTEND/image/trash-can.png">Eliminar Cuenta</button>
                <dialog id="dialogo">
                    ¿Estas seguro de querer eliminar tu cuenta?
                    <div class="boton_fiting">
                    <form method="POST" action="../BACKEND/borrarUser.php"><button class="botonEliminar" id="Si" value="0">Si</button></form>
                    <button class="botonEliminar" onclick="cerrar_dialog()">No</button>
                    </div>
                </dialog>
                <?php
                }
                ?>

            </div>
        </div>
        <div class="box_options_mobile">
        <div class="menu_options">
                    <p>Comentarios</p>
                    <div class="icon">
                        <img class="i2" src="image/chateando.png" alt="">
                        <p class="NumComentarios"><?php echo $comentarios ?></p>
                    </div>
                </div>
                <div class="menu_options o2">
                    <p>Hilos</p>
                    <div class="icon2">
                        <img class="i1" src="image/hilos.png" alt="">
                        <p class="NumHilos"><?php echo $hilos ?></p>
                    </div>
                </div>
                <div class="box_OP">
                <div class="menu_options informacion">
                    <img width="20px" src="image/i.png" alt="">
                    <p class="info2">Informacion</p>
                    <div class="datos2">
                    <a href="mailto:<?php echo $correo ?>"><img src="image/gmail.png" alt=""><?php echo $correo ?></a>
                        <a href="https://wa.me/<?php echo $telefono?>"><img src="image/whatsap.png" alt=""><?php echo $telefono?></a>
                        <a href="<?php echo $link ?>"><img src="image/internet.png" alt=""><?php echo $link ?></a>
                    </div>
                </div>

                <button  class="botonEliminar" onclick="eliminar_userMobile()"><img class="iconoTrash" src="../FRONTEND/image/trash-can.png">Eliminar Cuenta</button>
                <dialog class="dialog2" id="dialog2">
                    ¿Estas seguro de querer eliminar tu cuenta?
                    <div class="boton_fiting">
                    <form method="POST" action="../BACKEND/borrarUser.php"><button class="botonEliminar" id="Si" value="0">Si</button></form>
                    <button class="botonEliminar" onclick="cerrar_dialog2()">No</button>
                    </div>
                </dialog>
                </div>
        </div>
    </div>

    <div class="parteCentral">
       
    </div>
   <div class="caja1">
   <div class="caja">
        <form class="item1" id="form1">
            <img class="x" src="image/salir.png">
            <input id="titulohilo"  placeholder="Titulo del hilo">
            <input id="descripcionhilo" placeholder="Descripcion del hilo">
            <button class="guardar">guardar</button>
        </form>
    </div>
   </div>
</div>

    <script src="./js/temacolor.js"></script>
    <script src="js/perfil.js"></script>
    <script src="js/editarHilo.js"></script>
    <script src="./js/botonEliminar.js"></script>

</body>
</html>