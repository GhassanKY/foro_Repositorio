<?php

include "../BACKEND/BD_SESION.php";

// $cd = $_GET["id"];



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
            <a href="sesion.php"><li class="listGroup"><img src="image/hom.png" alt="Chat" class="imgBar">  Inicio</li></a>
            <li><a style="display:none;" href="sesion.php">Inicio</a></li>
            <a href="temas.php?id=1"><li class="listGroup"><img src="image/chat.png" alt="Chat" class="imgBar"> Discusiones</li></a>
            <!-- <a href="sidebar.php?id=1"><li class="listGroup"><img src="image/tag.png" alt="Chat" class="imgBar"> Tags</li></a> -->
            <!-- <a href="sidebar.php?id=2"><li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li></a> -->
            <!-- <a href="sidebar.php?id=3"><li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li></a> -->
        </ul>
      </ul>
  </div>
       
           
           <div class="divCentral ">
                    <div class="modoNoche">
                        <h3 class="tituloTema">Elija un tema</h3>
                    </div>
                    <a class="color noche" href="sidebar.php"><button id="noche"></button></a>
                    <a class="color original" href="sidebar.php"><button id="porDefecto">Predeterminado</button></a>
                    <a class="color azul" href="sidebar.php"><button id="azul"></button></a>
                    <a class="color verde" href="sidebar.php"><button id="verde"></button></a>
                    <a class="color turquesa" href="sidebar.php"><button id="turquesa"></button></a>
                    <a class="color rojo" href="sidebar.php"><button id="rojo"></button></a>
                    <a class="color naranja" href="sidebar.php"><button id="naranja"></button></a>
                    <a class="color amarillo" href="sidebar.php"><button id="amarillo"></button></a>
                    <a class="color rosado" href="sidebar.php"><button id="rosado"></button></a>
                    <a class="color morado" href="sidebar.php"><button id="morado"></button></a>

            </div>
            <img src="./img/fondoReparado.svg" class="fondo-imagen">    
           

    









    <script src="js/editarperfil.js"></script>
    <script src="js/coloresDelTema.js"></script>
</body>        
</html>