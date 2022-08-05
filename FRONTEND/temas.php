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
    <title>Document</title>
</head>
<body>
<header>
        <nav>
            <img src="image/menu.png" alt="Menu" class="imgMenu">
            <a href="sesion.php"><img src="image/logo.png" alt="Logo" class="headerLogo"></a>
            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
            <img src="image/lupa.png" alt="Lupa" class="searchbutton">

            <div class="imgHeader">
                <img src="<?php echo $foto ?>" alt="" class="pfHeader">
                        <ol class="PopLR">
                            <a href="perfil.php?idPerfil=<?php echo $n ?>"><li class="perfil1"><img src="image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop">Perfil</li></a>
                            <a href="editarperfil.php"><li class="settings"><img src="image/config.png" alt="settings" class="buttonSettings buttonPop"> Editar perfil</li></a>
                            <a href="../BACKEND/sesionDestroy.php"><li class="exit"><img src="image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</li></a>
                        </ol>
            </div>

        </nav>
    </header>


        <div class="list">

            <ul>
                    <li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar">   Discusiones</li>
                    <li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar">  Tags</li>
                    <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar">  Ayuda</li>
                    <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar">  Ajustes</li>  
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
                                            <p><?php echo $hilo["descripcion"]; ?></p>
                                            <p class="fecha"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                            <p><?php echo $hilo["nombreUsuario"]; ?></p>
                                            
                                        </div>

                                </div>
                                    <div class="commentsAndPhoto">

                                            <div class="imgFriends">
                                                <img src="img/pf.jpg" alt="" class="pfHeaderpf photoOne">
                                                <img src="img/pf.jpg" alt="" class="pfHeaderpf photoTwo">
                                                <img src="img/pf.jpg" alt="" class="pfHeaderpf">
                                                <img src="img/pf.jpg" alt="" class="pfHeaderpf">
                                                <img src="img/pf.jpg" alt="" class="pfHeaderpf">
                                                
                                            </div>

                                            <a style="color:black;" href="conversacion.php?id=<?php echo $hilo["ID"]?>">43 comentarios</a>
                                    

                                    </div>

                                    <img src="image/mas (1).png" alt="more" class="configButton puntos ">
                                   </a>
                            </div>
                          <!-- kkk -->

                          <?php } ?>
                </div>  


                </div>
         
<script src="js/temas.js"></script>
</body>
</html>
