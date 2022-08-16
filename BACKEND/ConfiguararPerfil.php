<?php
include "conector.php";
$id = $_POST["id"];
header("location: ../FRONTEND/perfil.php?idPerfil=$id");


$datosUsuario = mysqli_query($conector, "SELECT *
                                         FROM usuarios
                                         WHERE id = $id;");


 while ($fila = mysqli_fetch_assoc($datosUsuario)) { 
        $foto = $fila["image_user"]; 
}

$nombreUsuario2 = $_POST["nombre"] ?? null;
$telefono = $_POST["telefono"] ?? null;
$link = $_POST["link"] ?? null;
$imagen = $_FILES["foto"]['name'] ?? null;
$ruta = $_FILES["foto"] ['tmp_name'] ?? null;
echo $id;
$destino = "image/".$imagen;
$destinoCopia = "../FRONTEND/image/".$imagen;


if(is_uploaded_file($ruta)){
  copy($ruta, $destinoCopia);
} else{
  $destinoCopia = "../FRONTEND/image/".$imagen;
  $destino = $foto;

}




mysqli_query($conector, "UPDATE  usuarios  
                         SET  nombreUsuario = '$nombreUsuario2',telefono = '$telefono', link = '$link', image_user = '$destino'
                         WHERE id = $id;");


?>