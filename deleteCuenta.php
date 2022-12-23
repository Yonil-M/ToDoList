<?php
include('db.php');

session_start();
    ob_start();
    $_SESSION['msj']="Al eliminar tu cuenta se eliminaran las tareas guardas,¿Deseas eliminar tu cuenta?";
    $id=$_SESSION['id'];
    $usuario=$_SESSION['usuario'];

    mysqli_query($conexion,"DELETE FROM persona where id='$id' and usuario='$usuario' ");
    mysqli_query($conexion,"DELETE FROM tarea where idUsuario='$id'");

    header('location:index.php');
    include('close.php');
?>