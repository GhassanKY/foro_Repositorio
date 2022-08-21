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


    <div class="list">

        <ul>

            <li><a style="display:none;" href="sesion.php">Inicio</a></li>

            <a href="temas.php?id=1">
                <li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar"> Discusiones</li>
            </a>
            <!-- <a href="sidebar.php?id=1"><li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar"> Tags</li></a> -->
            <a href="sidebar.php?id=2">
                <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
            </a>
            <a href="sidebar.php?id=3">
                <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
            </a>
        </ul>
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
</body>

</html>