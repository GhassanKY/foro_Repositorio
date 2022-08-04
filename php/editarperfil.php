<?php
include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];
$datosUsuario = mysqli_query($conector, "SELECT *
                                FROM usuarios
                                WHERE correo = '$usuario';");

 while ($fila = mysqli_fetch_assoc($datosUsuario)) {

        $n = $fila["id"];
        $foto = $fila["image_user"];
        $nombre = $fila["nombreUsuario"];
        $tel = $fila["telefono"];
        $red = $fila["link"];
        
}





?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editarperfil</title>
    <link rel="stylesheet" href="../css/editarperfil.css">
</head>
<body>
  <header>
    <nav>
        <img src="../image/menu.png" alt="Menu" class="imgMenu">
        <a href="sesion.php"><img src="../image/logo.png" alt="Logo" class="headerLogo"></a>
        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
        <img src="../image/lupa.png" alt="Lupa" class="searchbutton">

        <div class="imgHeader">
            <img src="<?php echo $foto ?>" alt="" class="pfHeader">
                    <ol class="PopLR">
                            <a href="perfil.php?idPerfil=<?php echo $n ?>"><li class="perfil1"><img src="../image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop">Perfil</li></a>
                            <a href="editarperfil.php?id=<?php echo $n ?>"><li class="settings"><img src="../image/config.png" alt="settings" class="buttonSettings buttonPop"> Editar perfil</li></a>
                            <a href="sesionDestroy.php"><li class="exit"><img src="../image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</li></a>
                    </ol>
        </div>

    </nav>
  </header>
  <div class="list">
      <ul>
          <li class="listGroup"><img src="../image/chat.png" alt="Chat" class="imgBar"> Discusiones</li>
          <li class="listGroup"><img src="../image/tag.png" alt="Chat" class="imgBar"> Tags</li>
          <li class="listGroup"><img src="../image/question.png" alt="Chat" class="imgBar"> Ayuda</li>
          <li class="listGroup"><img src="../image/config.png" alt="Chat" class="imgBar"> Ajustes</li>
      </ul>
  </div>
        <a href="sesion.php"><img class="salir1" src="../image/salir.png" alt=""></a>
            <form method="POST" action="configuararPerfil.php"  enctype="multipart/form-data">
                <div class="parteCentral">
                  
                    <div class="img_name">
                      <img class="perfil" id="file" src="<?php echo $foto ?>" alt="">
                      <div class="actualizaimg">
                         <input type="hidden" value="<?php echo $n ?>" name="id">
                        <input name="foto" type="file" placeholder="actualiza tu foto" id="costumFile" aria-label="Archivo" onchange="vista_preliminar(event)">
                        <label for="costumFile" class="formFile">Cambiar foto</label>
                        <p class="icono"><img src="../image/usuario.png" alt=""> <?php echo $nombre ?></p>
                        <p class="icono"><img src="../image/whatsapp.png" alt=""> <?php echo $tel ?></p>
                        <p class="icono"><img  src="../image/facebook.png" alt=""> <?php echo $red ?></p>
                      </div>
                    </div>
                
                    <div class="userOptions">
                      <h3>Editar datos de usuario</h3>
                      <div class="cajaInput">

                        <input name="nombre" type="text"  placeholder="Nuevo Nombre Completo"class="input" value="<?php echo $nombre ?>" required>
                        <input name="telefono" type="number" placeholder="Nuevo Telefono" class="input" value="<?php echo $tel ?>" required>
                        <input name="link" type="text" placeholder="Nuevo link" class="input" value="<?php echo $red ?>" required>

                      </div>
                      <div class="botones">
                         <button class="guardar">Guardar Cambios</button>
                      </div>
                    </div>
                </div>
             </form>
            <script src="../js/editarperfil.js"></script>
    
</body>        
</html>