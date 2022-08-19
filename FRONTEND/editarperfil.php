<?php
include "../BACKEND/BD_EDITAR-PERFIL.php";


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editarperfil</title>
    <link rel="stylesheet" href="css/editarperfil.css">
</head>
<body> 
  
    <div class="mandos">
        <a href="perfil.php?idPerfil=<?php echo $n  ?>"><div class="face">
          <img src="image/izq.png" alt=""><p>PERFIL</p>
        </div></a>
        <a href="sesion.php"><div class="homme">
          <p>HOMME</p><img src="image/der.png" alt="">
        </div></a>
    </div>
  <header>
    <nav>
        <img src="image/menu.png" alt="Menu" class="imgMenu">
        <a href="sesion.php"><img src="./img/letras.svg" alt="Logo" class="headerLogo" href="sesion.php"></a>
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
            <li class="listGroup"><img src="image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
            <a href="sidebar.php?id=3"><li class="listGroup"><img src="image/config.png" alt="Chat" class="imgBar"> Ajustes</li></a>
        </ul>
      </ul>
  </div>
       
            <form method="POST" action="../BACKEND/ConfiguararPerfil.php"  enctype="multipart/form-data">
            <!-- <img src="./img/fondoReparado.svg" class="fondo-imagen"> -->
                <div class="parteCentral">
                  
                  
                    <div class="img_name">
                      <img class="perfil" id="file" src="<?php echo $foto ?>" alt="">
                      <div class="actualizaimg">
                         <input type="hidden" value="<?php echo $n ?>" name="id">
                        <input name="foto" type="file" placeholder="actualiza tu foto" id="costumFile" aria-label="Archivo" onchange="vista_preliminar(event)"  enctype='multipart/form-data'>
                        <label for="costumFile" class="formFile">Cambiar foto</label>
                        <p class="icono"><img src="image/usuario.png" alt=""> <?php echo $nombre ?></p>
                        <p class="icono"><img src="image/whatsapp.png" alt=""> <?php echo $tel ?></p>
                        <p class="icono"><img  src="image/facebook.png" alt=""> <?php echo $red ?></p>
                      </div>
                    </div>
                
                    <div class="userOptions">
                      <h3>Editar datos de usuario</h3>
                      <div class="cajaInput">

                        <input name="nombre" type="text"  placeholder="Nuevo Nombre Completo"class="input" value="<?php echo $nombre ?>">
                        <input name="telefono" type="number" placeholder="Nuevo Telefono" class="input" value="<?php echo $tel ?>">
                        <input name="link" type="text" placeholder="Nuevo link" class="input" value="<?php echo $red ?>">

                      </div>
                      <div class="botones">
                         <button class="guardar">Guardar Cambios</button>
                      </div>
                    </div>
                </div>
             </form>
             <img src="./img/fondoReparado.svg" class="fondo-imagen">
            <script src="js/editarperfil.js"></script>
            <script src="js/temacolor.js"></script>
    
</body>        
</html>