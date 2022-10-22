<?php
include("db.php");
include 'close.php';

session_start();
    ob_start();
$usuario=$_SESSION['usuario'];
$pass=$_SESSION['pass'];

$sql_id="select id from persona where usuario='$usuario' and password='$pass'";

 $sql_query=mysqli_query($conexion,$sql_id);

 while($idRow=mysqli_fetch_array($sql_query)){

      
     $_SESSION['id']=$idRow['id'];
  echo $idRow['id'];

}
mysqli_close($conexion);

?>