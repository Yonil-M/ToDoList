<?php
include 'db.php';

echo $idTarea=$_GET['ID'];

mysqli_query($conexion,"DELETE FROM `tarea` WHERE id='$idTarea'");

header("location:home.php");

?>