<?php
include('db.php');
session_start();
    ob_start();
//declarar varibles
$TOKENUSER=$_SESSION['tokenuser'];
$correoToken=$_SESSION['correoToken'];

$consultaName=mysqli_fetch_row(mysqli_query($conexion,"select usuario from persona where tokenUser='$TOKENUSER' and correo='$correoToken'"));
$user=implode(";",$consultaName);

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
    <style>
    *{
      padding: 0px;
      border: 0px;
    }

    body{
        background-image: url("images/fondoTec2.jpg");
        width: 100%;
	    height:100%vh;
        background-size: cover;
      }

      .newClave{
        display: flex;
        justify-items: center;

      }
    form{
    
      background-color: #ECF0F1 ;
      align-items: center;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: bold;

      padding: 6rem;
      border-radius: 15px;

      position: relative;
      left: 39rem;
      top: 23rem;
   
    }

    img{
      height: 30%;
      width: 45%;
      position: absolute;
      left: 32.5rem;
      top: 3rem;
      border-radius: 20px;

    }

       input {
     width: calc(100% - 20px);
     padding: 9px;
     margin: auto;
     margin-top: 12px;
     font-size: 16px;
     border-radius: 10px;
     color:black

     }
     h1{
    text-align: center;
     padding: 0px;
     color: #fff ;
     cursor: none;
     }
     div{
      padding: 5px;
      
      border-radius: 10px;
      
     }

     button{
      background-color: #1C2833;
      color: white;
      padding: 8px;
      border-radius: 15px;
     }
     button:hover{
      background-color: black;
      color: grey;
      transform: translateY(10%);
     }

    </style>
  </head>
  <body>
    <img src="https://recursosparapymes.com/wp-content/uploads/2022/03/todolist-herramientas-gestion-de-tareas.jpg" alt="">
    <div class="newClave">
  <form action="updateClave.php" method="POST">
    <div>
    <h3>Soporte para recuperar contraseña</h3></div>
    <br>
    
    <p>Hola amigo <?php echo $user ?>, </p>
    <h5>Ingrese su nueva clave aqui:</h5>
    <input type="password" class="form-control" placeholder="Nueva contraseña" id="exampleInputPassword1" name="pass">
    <br>
    <button type="submit">Recuperar ahora</button>
  </form></div>
  </body>
</html>

<?php }else{
  echo 'No exite datos del usuario';
} ?>


