<?php
include('db.php');

    session_start();
    ob_start();
    $_SESSION['sesion_exito']=0;
    
$USUARIO=$_POST['usuario'];//recoger datos de formulario
$PASSWORD=$_POST['password'];

 
    $_SESSION['usuario']=$USUARIO;
    $_SESSION['pass']=$PASSWORD;

    

if($USUARIO=="" || $PASSWORD==""){
    $_SESSION['sesion_exito']=2;
}

else{
    include('db.php');
    $_SESSION['sesion_exito']=3;
    $resultado= mysqli_query($conexion,"SELECT * FROM persona where usuario = '$USUARIO' and password ='$PASSWORD' ");
    
    
    while ($consulta = mysqli_fetch_array($resultado)){
        
        $_SESSION['sesion_exito']=1;
        $filas=mysqli_num_rows($resultado);
        if($filas){ 
            header("location:home.php");
            
        }
    mysqli_close($conexion);  
    }
}

if($_SESSION['sesion_exito']<>1){
    header('location:index.php');
}


?>
