<?php
$passs=$_POST['pass'];
echo $passs;

include('db.php');

session_start();
    ob_start();

$tokenUser=$_SESSION['tokenuser'];
$correoUser=$_SESSION['correoToken'];

if($passs!=null){
$updateClave=("UPDATE persona SET password='$passs',tokenuser='' where tokenUser='$tokenUser' and correo='$correoUser' ");
mysqli_query($conexion,$updateClave);


$_SESSION['sesion_exito']=4;
header('location:index.php');
}else{

    echo 'error';
}

?>