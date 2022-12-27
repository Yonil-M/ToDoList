<?php
include 'db.php';
session_start();
    ob_start();
$idUser=$_SESSION['id'];
mysqli_query($conexion,"DELETE FROM tarea where idUsuario='$idUser'");
header("location:home.php");

?>