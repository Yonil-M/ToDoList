<?php
        include('db.php');
    
    $list=$_POST['lista'];
    $idTarea=$_POST['id'];
    date_default_timezone_set('America/Lima');
    $fecha=date("Y-m-d H:i:s ");    
    
    mysqli_query($conexion,"UPDATE tarea SET titulo='$list',fecha='$fecha' WHERE id='$idTarea' ");
       
    header('location:home.php');
     
    
    mysqli_close($conexion);
    

    ?>