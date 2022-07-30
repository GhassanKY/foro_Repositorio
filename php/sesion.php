<?php
include "conector.php";
session_start();
$usuario = $_SESSION["welcome"];

if (!isset($_SESSION["welcome"])) {
    header("location:index.html");
} else {

    //Datos del usuario que inicio sesion
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");

    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $n = $fila["id"];
        $foto = $fila["image_user"];
        echo "<br>";
    }
    //Datos de los temas para el slect
    $datosTemas = mysqli_query($conector, " SELECT * FROM temas");
    $datosTemas1 = mysqli_query($conector, " SELECT * FROM temas");

    //con esto obtengo los datos de todos los hilos
    $datosHilos = mysqli_query($conector, "SELECT hilos.*, usuarios.*
                                           FROM hilos
                                           JOIN usuarios
                                           ON usuarios.id = hilos.usuario");

                                 

    //Cantidad de comentarios
    $CantidadComentarios = mysqli_query($conector, " SELECT * FROM mensajes");
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sesion.css">
    <title>Document</title>
    <style>
        .hilo {
            border-bottom: 1px solid black;
        }
    </style>
</head>

<body>


<header>
                <nav>
                    <img src="../image/menu.png" alt="Menu" class="imgMenu">
                    <img src="../image/logo.png" alt="Logo" class="headerLogo">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                    <img src="../image/lupa.png" alt="Lupa" class="searchbutton">

                    <div class="imgHeader">
                        <img src="<?php echo $foto; ?>" alt="" class="pfHeader">
                                <ol class="PopLR">
                                    <a style="color:white;" href="sesionDestroy.php"><li class="exit"><img src="../image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</li></a>
                                    <li class="settings"><img src="../image/config.png" alt="settings" class="buttonSettings buttonPop"> Configuración</li>
                                </ol>
                    </div>

                </nav>
            </header>

    
                <div class="list">

                    <ul>
                            <li class="listGroup"><img src="../image/chat.png" alt="Chat" class="imgBar">   Discusiones</li>
                            <li class="listGroup"><img src="../image/tag.png" alt="Chat" class="imgBar">  Tags</li>
                            <li class="listGroup"><img src="../image/question.png" alt="Chat" class="imgBar">  Ayuda</li>
                            <li class="listGroup"><img src="../image/config.png" alt="Chat" class="imgBar">  Ajustes</li>  
                    </ul>
                </div>


                <section class="sectionInfo">
                 <div class="buttonReciente">


    


     <!-- BOTONES DE LOS TEMAS -->
     <button class="botonTemas">Temas <img  src="../image/a.png" alt=""></button>
    <div class="divTema">
    <?php while ($temas1 = mysqli_fetch_assoc($datosTemas1)) { ?>
        <a href="temas.php?id=<?php echo $temas1['ID']; ?>"><p><?php echo $temas1['nombre']; ?></p></a>
    <?php } ?>
    </div>
    <button class="buttonCreate">
        Iniciar Nueva Discusión
    </button>
    <!-- CAJA DE PUBLICAR EL NUEVO HILO -->
    <div class="cajaPublicarNuevo">
    <div class="form1">
    <form class="form0" class="cajaNuevoHilo" method="POST" action="infoTemas.php?id=<?php echo $n ?>">
        <img class="x" src="../image/cross.png" alt="">
        <input  class="input1" name="namehilo" type="text" placeholder="Nombre de tu hilo">
        <textarea class="textarea1" name="descripcionHilo" placeholder="Descripcion hilo de debate"></textarea>
        <p class="temap">Elige un tema</p>
        <div class="div2">
        <select class="select1" name="select">
            <?php while ($temas = mysqli_fetch_assoc($datosTemas)) { ?>
                <option value="<?php echo $temas['ID']; ?>"><?php echo $temas['nombre']; ?></option>
            <?php } ?>
        </select>
        <button class="enviar1">enviar <img class="e" src="../image/enviar.png" alt=""></button>
        </div>
    </form>
    </div>
    </div>
 </div>

                        <div class="publication">
                        <div class="fatherHilos">
                                <?php while ($hilo = mysqli_fetch_assoc($datosHilos)) { ?>

                                   <div class="hilos">
                                        <div class="informationPublic">

                                                <div class="imgDiv">
                                                    <img src="<?php echo $hilo["image_user"]; ?>" alt="" class="pfHeader">
                                                </div>
                                                
                                                <div class="txtHilo">
                                                      <p class="titleHilo"><?php echo $hilo["nombre_Hilos"]; ?></p>
                                                      <p><?php echo $hilo["descripcion"]; ?></p>
                                                      <div class="boxInfo">
                                                          <p class="date"><?php echo $hilo["fechaCreacionHilo"]; ?></p>
                                                          <img src="../image/fecha.png" alt="date" class="calendar">
                                                     </div>
                                                     <p class="nameUser"><?php echo $hilo["nombreUsuario"]; ?></p>
                                                </div>
                                        </div> 

                                            <div class="comments">
                                               <a href="conversacion.php?id=<?php echo $hilo["ID"] ?>"><img src="../image/burbuja-de-dialogo.png" alt="comments" class="comments"></a> 
                                                <p class="countsComments">2.5k</p>
                                            </div>
                                     </div> 

                                     <?php } ?>
                                </div>
                            </div>



</div>
</section>
<script src="../js/sesion.js"></script>
</body>

</html>