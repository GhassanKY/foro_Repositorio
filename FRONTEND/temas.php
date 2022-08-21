<?php
    include "../BACKEND/BD_TEMAS.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tema.css">
    <link rel="stylesheet" href="css/dialog.css">
    <title>Document</title>
</head>
<body>
<header>
        <nav>
            <img src="image/menu.png" alt="Menu" class="imgMenu">
            <a href="sesion.php"><img src="./img/letras.svg" alt="Logo" class="headerLogo"></a>
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <img src="image/lupa.png" alt="Lupa" class="searchbutton">

            <div class="imgHeader">
                <img src="<?php echo $foto ?>" alt="" class="pfHeader">
                <ol class="PopLR">
                    <a href="perfil.php?idPerfil=<?php echo $n ?>">
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
            <!-- <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li> -->
            <a href="sidebar.php?id=3"><li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li></a>
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


                

            </ul>
        </div>







        <div class="principalDiv">  
            
            
            <div class="buttonReciente">
                <button class="botonTemas">Temas <img  src="image/a.png" alt=""></button>
                    <div class="divTema">
                        <?php while ($temas1 = mysqli_fetch_assoc($datosTemas1)) { ?>
                        <a href="temas.php?id=<?php echo $temas1['ID']; ?>"><p><?php echo $temas1['nombre']; ?></p></a>
                        <?php } ?>
                        <a style="color:black;" href="sesion.php">Todos</a>
                    </div>
                    <?php while ($titulo = mysqli_fetch_assoc($tituloTema)) { ?>
                        <h1 class="titulo"><?php echo $titulo['nombre']; ?></h1>
                     <?php } ?>
            </div>


        <div class="body"> 
         
         <?php while($hilo = mysqli_fetch_assoc($datosHilos)) { ?>


         <!-- jkkkk -->
                    <div class="hiloForUsers">
                  
                                <div class="dpContInfo">                               
                                       <div class="dataUsers">
                                       <a href="perfil.php?idPerfil=<?php echo $hilo["id"]; ?>"><img src="<?php echo $hilo["image_user"]; ?>" alt="photo" class="pfHeader"></a>
                                       </div>
                                       <a style="color:black;" href="conversacion.php?id=<?php echo $hilo["ID"]?>">
                                        <div class="dataUsers">

                                            <h1><?php echo $hilo["nombre_Hilos"]; ?></h1>
                                            <p class="des"><?php echo $hilo["descripcion"]; ?></p>
                                            <p class="fecha"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                            <p class="nameUser"><?php echo $hilo["nombreUsuario"]; ?></p>
                                            
                                        </div>

                                </div>
                                    <div class="commentsAndPhoto">

                                            <div class="imgFriends">
                                                <?php
                                                    $id = $hilo["ID"];
                                                    $queryUsers = "SELECT * FROM mensajes WHERE hilo_ID = $id";
                                                    $mensaje = mysqli_query($conector, $queryUsers);
                                                    $count = 0;
                                                    while(($mensajeArray = mysqli_fetch_assoc($mensaje)) && $count < 5)
                                                    {
                                                        $idUsuario = $mensajeArray['usuario_ID'];
                                                        $queryFoto = "SELECT image_user FROM usuarios WHERE id= $idUsuario";
                                                        $foto = mysqli_query($conector, $queryFoto);
                                                        $fotoArray = mysqli_fetch_assoc($foto);
                                                        $fotoSrc = $fotoArray['image_user'];
                                                        echo "<img src='$fotoSrc' alt='' class='pfHeaderpf'>";
                                                        $count++;
                                                    }
                                                ?>
                                               
                                                
                                            </div>

                                            <a class="coment" href="conversacion.php?id=<?php echo $hilo["ID"]?>">
                                            <?php
                                                $id = $hilo["ID"];
                                                $query = "SELECT COUNT(*) AS total FROM mensajes WHERE hilo_ID = $id"; 
                                                $comentarios = mysqli_query($conector, $query);
                                                $comentariosArray = mysqli_fetch_assoc($comentarios);
                                                echo $comentariosArray['total'];
                                            ?>
                                             comentarios</a>
                                    

                                    </div>

                                    <img src="image/mas (1).png" alt="more" class="configButton puntos ">
                                   </a>
                            </div>
                          <!-- kkk -->

                          <?php } ?>
                </div>  


                </div>
            <img src="./img/fondoReparado.svg" class="fondo-imagen">
    
    
<script src="js/help.js"></script>
<script src="js/temas.js"></script>
<script src="js/temacolor.js"></script>
</body>
</html>
