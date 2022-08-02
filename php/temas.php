<?php
    include "conector.php";
   
    session_start();
    $usuario = $_SESSION["welcome"];
    //Datos del usuario que inicio sesion
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");
    while ($fila = mysqli_fetch_assoc($datosUsuario)) {
        $n = $fila["id"];
        $foto = $fila["image_user"];
        echo "<br>";
    }
    
   
    $datosUsuario = mysqli_query($conector, "SELECT *
                                        FROM usuarios
                                        WHERE correo = '$usuario';");



   $id = $_GET["id"];

    // $query = "SELECT * FROM temas ORDER BY nombre";
    // $temas = mysqli_query($conector, $query);
    // $fila = [];
    // while($fila[] = mysqli_fetch_assoc($temas))
    // {    
    // } 

    // for($i=0; $i<count($fila); $i++)
    // {
    //     if(isset($fila[$i]['ID']))
    //     {
    //         echo $fila[$i]['ID'];
    //         echo " " .$fila[$i]['nombre'];
    //         echo " Número de hilos: ";
    //         $otraQuery = "SELECT COUNT(tema) AS count FROM hilos WHERE tema=$i";
    //         $consulta = mysqli_query($conector, $otraQuery);

    //         $otraFila = mysqli_fetch_assoc($consulta);
    //         echo $otraFila['count'];
    //         echo "<br>";
    //     }
    // }

     //Datos de los temas para el slect
    $datosTemas = mysqli_query($conector, " SELECT * FROM temas");
    $datosTemas1 = mysqli_query($conector, " SELECT * FROM temas");

    
   //con esto obtengo los hilos por categorias
   $datosHilos = mysqli_query($conector, "SELECT hilos.*, usuarios.*, temas.ID AS idTema
                                          FROM hilos
                                          JOIN usuarios
                                          ON usuarios.id = hilos.usuario
                                          JOIN temas
                                          ON temas.ID = hilos.tema
                                          WHERE temas.ID = $id
                                          GROUP BY hilos.nombre_Hilos");

   //titulo del tema
   $tituloTema = mysqli_query($conector, "SELECT * 
                                          FROM temas
                                          WHERE ID = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tema.css">
    <title>Document</title>
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
                            <li class="perfil1"><img src="../image/icousuario.jpg" width="20px" alt="perfil" class="buttonPerfil buttonPop">Perfil</li>
                            <a href="editarperfil.php?id=<?php echo $n ?>"><li class="settings"><img src="../image/config.png" alt="settings" class="buttonSettings buttonPop"> Editar perfil</li></a>
                            <li class="exit"><img src="../image/exit.png" alt="Exit" class="buttonExit buttonPop"> Salir</li>
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

        <div class="principalDiv">  
            
            
            <div class="buttonReciente">
                <button class="botonTemas">Temas <img  src="../image/a.png" alt=""></button>
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


            
         <?php while($hilo = mysqli_fetch_assoc($datosHilos)) { ?>


         <!-- jkkkk -->
                    <div class="hiloForUsers">
                  
                                <div class="dpContInfo">                               
                                       <div class="dataUsers">
                                            <img src="<?php echo $hilo["image_user"]; ?>" alt="photo" class="pfHeader">
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

                                    <img src="../image/mas (1).png" alt="more" class="configButton puntos ">
                                   </a>
                            </div>
                          <!-- kkk -->

                          <?php } ?>
                          


                </div>
         
<script src="../js/temas.js"></script>
</body>
</html>
