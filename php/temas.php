<?php
    include "conector.php";
    session_start();


   $id = $_GET["id"];
    $query = "SELECT * FROM temas ORDER BY nombre";
    $temas = mysqli_query($conector, $query);
    $fila = [];
    while($fila[] = mysqli_fetch_assoc($temas))
    {    
    } 
   

    

    for($i=0; $i<count($fila); $i++)
    {
        if(isset($fila[$i]['ID']))
        {
            echo $fila[$i]['ID'];
            echo " " .$fila[$i]['nombre'];
            echo " Número de hilos: ";
            $otraQuery = "SELECT COUNT(tema) AS count FROM hilos WHERE tema=$i";
            $consulta = mysqli_query($conector, $otraQuery);

            $otraFila = mysqli_fetch_assoc($consulta);
            echo $otraFila['count'];
            echo "<br>";
        }
    }



    
   //con esto obtengo los hilos por categorias
   $datosHilos = mysqli_query($conector, "SELECT hilos.*, count(mensajes.texto) AS comentarios, usuarios.*, temas.ID AS idTema
                                          FROM hilos
                                          JOIN mensajes
                                          ON mensajes.hilo_ID = hilos.ID
                                          JOIN usuarios
                                          ON usuarios.id = hilos.usuario
                                          JOIN temas
                                          ON temas.ID = hilos.tema
                                          WHERE temas.ID = $id
                                          GROUP BY hilos.nombre_Hilos");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <a href="temas.php?id=1"><button>Aviones</button></a>
    <a href="temas.php?id=2"><button>Carros</button></a>
    <a href="temas.php?id=3"><button>Juguetes</button></a>
    <a href="temas.php?id=4"><button>Polittica</button></a>
    <a href="temas.php?id=5"><button>Mercador</button></a>
    <a href="sesion.php"><button>Todos</button></a>

<?php while($hilo = mysqli_fetch_assoc($datosHilos)) { ?>
    <div class="hilo">
      <h1><?php echo $hilo["nombre_Hilos"]; ?></h1>
      <h3><?php echo $hilo["descripcion"]; ?></h3>
      <p><?php echo $hilo["nombreUsuario"]; ?></p>
      <p><?php echo $hilo["fechaCreacionHilo"]; ?></p>
      <p><?php echo $hilo["comentarios"]." comentarios"; ?></p>
      <a href="conversacion.php?id=<?php echo $hilo["ID"]?>"><button>Leer mas</button></a>
    </div>
<?php } ?>
</body>
</html>