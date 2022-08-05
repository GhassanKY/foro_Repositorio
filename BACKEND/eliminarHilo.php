<?php
include "conector.php";
$id = $_POST["id"];
echo $id;

$resultado=mysqli_query($conector, "DELETE FROM hilos WHERE ID = $id;");
if($resultado){
    echo "eliminado";

} else{
    echo "error";
}
?>