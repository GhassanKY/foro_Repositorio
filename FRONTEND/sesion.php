<?php
include "../BACKEND/BD_SESION.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sesion.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <title>Document</title>
    <style>
       .p{
            border-bottom: 1px solid rgb(56, 56, 56);
            padding: 7px;
        }

        .item4 a{
            text-decoration: none;
            color: #505153;
        }
        .oscuro .item4{
            color:white;
        }
        .oscuro .p{
            border-bottom: 1px solid rgb(214, 51, 255);
        }
    </style>
</head>

<body>


    <form class="d-flex">
        <input class="form-control" id="buscar" name="buscar" onkeyup="buscar_ahora($('#buscar').val());" type="search" placeholder="buscar" aria-label="Search">
    </form>
    <img src="./img/fondoReparado.svg" class="fondo-imagen">
    <header>
        <nav>
            <img src="image/menu.png" alt="Menu" class="imgMenu">
            <img src="./img/letras.svg" alt="Logo" class="headerLogo" href="sesion.php">
            <img src="image/lupa.png" alt="Lupa" class="searchbutton">

            <div class="imgHeader">
                <img src="<?php echo $foto; ?>" alt="" class="pfHeader">
                <ol class="PopLR">
                    <a href="perfil.php?idPerfil=<?php echo $n ?>">
                        <li class="perfil1"><img src="image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop"> Perfil</li>
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


    <div class="list">

        <ul>

            <li><a style="display:none;" href="sesion.php">Inicio</a></li>

            <a href="temas.php?id=1">
                <li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar"> Discusiones</li>
            </a>
            <!-- <a href="sidebar.php?id=1"><li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar"> Tags</li></a> -->
            
                <li class="listGroup buttonHelp"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
            
            <a href="sidebar.php?id=3">
                <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
            </a>
        </ul>
        </ul>
    </div>

        <div class="dialog slide-in-left">
            
            <div class="hear">
           
                                        <a href="../FRONTEND/sesion.php">
                                           
                                                <img src="image/500horas.png" alt="buttonHome" class="buttonHomeCOming">
                                            
                                        </a>
                 
                <h1>Vaya, parece que necesitas ayuda :/.</h1>
            </div>

                    
            <p>Esta es una pequeña guia para que entiendas, donde se encuentran cada una de las funciones que buscas </p>
            <ul>
                <li><h2>Como crear una nueva Conversacion/Discusión.</h2></li>
                <p>Haciendo click en el boton (Iniciar una Nueva Discusion), podras comenzar un nuevo hilo.</p>
                <p>Este hilo puede ser de temas variados, incluso puedes tener varios hilos a la vez.</p>
                <li><img src="./img/SessionAyuda.svg" alt="img_config" srcset="" class="imgPc"></li>
                
                <p>Una vez le hayas dado click (Iniciar nueva discusion) te deberia de aparecer algo como esto</p>
                <p>desde aqui podras crear tu hilo el cual te solicita un (nombre) y una (descripcion) sobre que trata el hilo creado</p>
                <li><img src="./img/CrearHiloAyuda.svg" alt="img_config" srcset="" class="imgMovil"></li>
                
                <p>Una vez creada tu nueva discusion deberia verse algo asi</p>
                <li><img src="./img/discusionCreada.svg" alt="" srcset="" class="imgPc"></li>
                

                <h2>Como agregar un comentario</h2>
                <p>Una vez que hagas click sobre tu discusion deberia desplegarse algo asi</p>
                <li><img src="./img/discusionCreadaAyuda (2).svg" alt="" srcset="" class="imgPc"></li>
                <p>Desde aqui puedes agregar nuevos comentarios a tu discusion y otros usuarios tambien pueden comentar</p>
                <li><img src="./img/CrearComentarioAyuda.svg" alt="" srcset="" class="imgPc"></li>
                <p>En la barra superior que tienes en el recuadro de agregar un nuevo comentario <br>
                puedes agregar emoticos, estilos de colores, distintas fuentes, incluso agregar un link</p>
                <li><img src="./img/barraComentarioAyuda.svg" alt="" srcset="" class="imgPc"></li>
                <p>Una vez que hagas click en (Agregar Comentario), tu comentario automaticamente se subira a la conversacion</p>
                <li><img src="./img/comentarioRealizado.svg" alt="" srcset="" class="imgPc"></li>

                <h1>Como entrar a tu perfil</h1>

                <p>Para acceder a tu tu informacion, solo tienes que hacer click a tu foto en la parte superior derecha y seleccionar el apartado (perfil), veras toda tu información, ademas de los hilos creados.</p>
                <img src="./img/image_01.svg" alt="perfil" class="imgPc">
                
                <h2>Elimación de cuenta</h2>


                    <p>Para la correcta eliminación de tu cuenta, deberas hacer click en el boton (Elimar cuenta)</p>
                    <p>Al eliminar tu cuenta sera borrada de manera de permanente y no podras iniciar sesión nuevamente.</p>
                    <img src="./img/image_02.svg" alt="borrado" class="imgPc">


                    <h2>Información de tu cuenta</h2>

                    <p>Al hacer click en boton de información, se desplegara 3 apartados con tu correo, numero de telefono y red social.</p>

                    <img src="./img/image_03.svg" alt="informacion" class="imgPc">

                    <h1>Como Editar tu Perfil</h1>

                    <p>Para poder editar información correspondiente a tu perfil, tienes que hacer click a tu foto en la parte superior derecha y seleccionar el apartado (Editar perfil), donde podras editar información a tu gusto.</p>

                    <p>En este apartado puedes cambiar la imagen de tu perfil, el numero de telefono agregado y el link a una red social (facebook).</p>

                    <img src="./img/image_04.svg" alt="configuracion" class="imgPc">


                    <h1>Configuración de temas</h1>

                    <p>Para acceder a este apartado basta con hacer click en la barra lateral izquierda, o bien, dar el click en boton de la parte superior, si estas en un dispositivo movil</p>

                    <p>Aqui puedes cambiar a gusto propio, el tema que mas te agrade para el foro.</p>
                    
                    <img src="./img/image_05.svg" alt="temas" class="imgPc">

            </ul>
        </div>



    <section class="sectionInfo">
        <div class="buttonReciente">
            <!-- <p><?php // echo $numeroPublicacionesNuevas  
                    ?> Publiciones nuevas</p> -->

            <!-- BOTONES DE LOS TEMAS -->
            <button class="botonTemas">Temas <img src="image/a.png" alt=""></button>
            <div class="divTema">
                <?php while ($temas1 = mysqli_fetch_assoc($datosTemas1)) { ?>
                    <a href="temas.php?id=<?php echo $temas1['ID']; ?>">
                        <p><?php echo $temas1['nombre']; ?></p>
                    </a>
                <?php } ?>
            </div>

            <div class="item4">
                    <p class="p">Principal</p>
                    <p><a href="popular.php">Popular</a></p>
            </div>

            <button class="buttonCreate">Iniciar Nueva Discusión </button>

            <!-- CAJA DE PUBLICAR EL NUEVO HILO -->
            <div class="cajaPublicarNuevo">
                <div class="form1">
                    <form class="form0" class="cajaNuevoHilo" method="POST" action="../BACKEND/infoTemas.php?id=<?php echo $n ?>">
                        <img class="x" src="image/cross.png" alt="">
                        <input class="input1" name="namehilo" type="text" placeholder="Nombre de tu hilo" required>
                        <textarea class="textarea1" name="descripcionHilo" placeholder="Descripcion hilo de debate"></textarea>
                        <p class="temap">Elige un tema</p>
                        <div class="div2">
                            <select class="select1" name="select">
                                <?php while ($temas = mysqli_fetch_assoc($datosTemas)) { ?>

                                    <option value="<?php echo $temas['ID']; ?>"><?php echo $temas['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <button class="enviar1">enviar <img class="e" src="image/enviar.png" alt=""></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="publication">
            <div id="fatherHilos" class="fatherHilos">


            </div>
        </div>
    </section>
    <script type="text/javascript">
        function buscar_ahora(buscar) {
            var parametros = {
                "buscar": buscar
            };
            $.ajax({
                data: parametros,
                type: 'POST',
                url: 'buscador.php',
                success: function(data) {
                    document.getElementById("fatherHilos").innerHTML = data;
                }
            });
        }
        buscar_ahora();
    </script>
    <script src="js/temacolor.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/buscador.js"></script>
    <script src="js/help.js"></script>
</body>

</html>