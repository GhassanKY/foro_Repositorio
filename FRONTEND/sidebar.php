<?php

include "../BACKEND/BD_SESION.php";

$cd = $_GET["id"];



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editarperfil</title>
    <link rel="stylesheet" href="css/editarperfil.css">
    <link rel="stylesheet" href="css/sidebar.css">
</head>
<body> 
    <div class="mandos">
        <a href="sesion.php">
            <div class="homme">
          <img src="image/izq.png" alt=""><p>HOMME</p>
        </div></a>
        
            <div class="">
                <p></p>
                
            </div>
        </a>
    </div>
  <header>
    <nav>
        <img src="image/menu.png" alt="Menu" class="imgMenu">
        <a href="sesion.php"><img src="image/logo.png" alt="Logo" class="headerLogo"></a>
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
            <li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar"> Discusiones</li>
            <li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar"> Tags</li>
            <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
            <li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
        </ul>
      </ul>
  </div>
       
           
                <div class="divCentral ">
                  
                <?php if ($cd == 1) { ?>


                    <div class="temaDiv">
                            <?php while ($temas1 = mysqli_fetch_assoc($datosTemas1)) { ?>
                                <a href="temas.php?id=<?php echo $temas1['ID']; ?>" class="links">
                                <div class="contentImg">
                                    <img src="image/hash.png" alt="tags" class="tagname">
                                    <p class="linktags"><?php echo $temas1['nombre']; ?></p>
                                 </div>
                                </a>
                            <?php } ?>
                     </div>
                    





                


                <?php } elseif ($cd == 2) { ?>



                        <p>ayuda</p>








                <?php } elseif ($cd == 3) { ?>


                <p>ajustes</p>
                


                
                <?php } ?>
                </div>
            
            <script src="js/editarperfil.js"></script>

    
</body>        
</html>