<?php
include('db.php');
session_start();
    ob_start();
//declarar varibles
$TOKENUSER=$_SESSION['tokenuser'];
$correoToken=$_SESSION['correoToken'];


echo $correoToken;
echo $TOKENUSER;

$consultaName=mysqli_fetch_row(mysqli_query($conexion,"select usuario from persona where tokenUser='$TOKENUSER' and correo='$correoToken'"));
$user=implode(";",$consultaName);
echo $user;

$consultaExistencia=mysqli_query($conexion,"select * from persona where usuario='$user' and correo='$correoToken'and tokenUser='$$TOKENUSER' ");
$fila=mysqli_fetch_row($consultaExistencia);

if($fila=1){
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Nueva clave</title>
    <style type="text/css">
    body{
      background-color: #f9f9f9;
    }
    .div_contenedor{
      background-color: #fefefe;
      width: 100%;
      height: 100vh;
    }
    .div_centrado{
        background: yellow;
        width: 50%;       
        height: 200px;
        position: absolute;
        top:40%;
        left: 50%;           
        margin-top: -150px;
        margin-left: -350px;
    }
    .well{
      display: block;
      margin: 0 auto;
      width: 100%;
      width: 150px;
    }

    </style>
  </head>
  <body>
  <form action="updateClave.php" method="POST">
    <h3>Ayuda para recuperar contraseña</h3>
    <br>
    <br>
    <p>Hola amigo <?php echo $user ?>, </p>
    <h5>ingrese su nueva clave aqui:</h5>
    <input type="password" class="form-control" placeholder="Nueva contraseña" id="exampleInputPassword1" name="pass">
    <br><br>
    <button type="submit">Recuperar ahora</button>
  </form>
  </body>
</html>

<?php }else{
  echo 'No exite datos del usuario';
} ?>


