<?php

include 'db.php';

echo $idTarea=$_GET['ID'];

mysqli_query($conexion,"DELETE FROM `tarea` ");

header("location:home.php");

?>