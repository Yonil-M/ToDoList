<?php

session_start();
    ob_start();
$id=$_SESSION['id'];

$titulo=$_POST['lista'];

echo $titulo;

date_default_timezone_set('America/Lima');
$fecha=date("Y-m-d H:i:s ");


if(isset($_POST['btnAdd'])){
    include('db.php');

mysqli_query($conexion,"INSERT INTO tarea ( idUsuario, titulo, fecha) VALUES ('$id','$titulo','$fecha') ");
   
header('location:home.php');
 
}
mysqli_close($conexion);
?>