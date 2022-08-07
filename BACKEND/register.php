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

copy($ruta, $destino) ?? null;

$query = "INSERT INTO usuarios(correo,nombreUsuario,clave,nombreCompleto,image_user)
          VALUES('$correo','$usuario','$clave','$nombre','$destino')";



//verificar q el correo y el usuario no se repitan
$verificarCorreo = mysqli_query($conector, "SELECT * FROM usuarios WHERE correo = '$correo' ");
   
 if(mysqli_num_rows($verificarCorreo) > 0){

 
     echo '
     <script>
       alert("el correo ya existe intente con otro");
        window.location = "../FRONTEND/index.html";
     </script>
     ';

    exit();
} else{
    echo
    '
    <script>
    alert("Registrado correctamente");
     window.location = "../FRONTEND/index.html";
  </script>';
}



$ejecutar = mysqli_query($conector,$query);


// if($ejecutar){
//     echo
//     '<script>
//     alert(registrado correctamente);
//     window.location = "../sesion.php"
//  </script>';
    
// } else{
//     '<script>
//     alert(el correo ya existe);
//     window.location = "../sesion.php"
//     </script>';
// }



?>
