<?php


include "conector.php";

// header("location: ../index.html");

$mensaje = "";
$nombre = $_POST["nombre"] ??  null;
$correo = $_POST["correo"] ??  null;
$clave = $_POST["clave"] ??  null;
$usuario = $_POST["usuario"]?? null ;
// $destino = $_POST["src-file1"] ?? null;
//agregar imagen
$imagen = $_FILES['src-file1']['name'] ?? null;
$ruta = $_FILES['src-file1'] ['tmp_name'] ?? null;
$destino = "image/".$imagen;
$destinoCopia = "../FRONTEND/image/".$imagen;




if(is_uploaded_file($ruta)){
  copy($ruta, $destinoCopia);
} else{
  $destinoCopia = "../FRONTEND/image/usu.jpg";
  $destino = "image/usu.jpg";

}


;

$query = "INSERT INTO usuarios(correo,nombreUsuario,clave,nombreCompleto,image_user,telefono,link,borrar_user)
          VALUES('$correo','$usuario','$clave','$nombre','$destino','vacio','vacio','1')";



//verificar q el correo y el usuario no se repitan
$verificarCorreo = mysqli_query($conector, "SELECT * FROM usuarios WHERE correo = '$correo' ");
   
 if(mysqli_num_rows($verificarCorreo) > 0){

 
     echo '
     <script>
       swal("el correo ya existe intente con otro");
        window.location = "../FRONTEND/index.html";
     </script>
     ';

    exit();
} else{
    echo
    '
    <script>
    swal("Registrado correctamente");
     window.location = "../FRONTEND/index.html";
  </script>';
}



$ejecutar = mysqli_query($conector,$query);


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <title>Document</title>
</head>
<body>
  
</body>
</html>