<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro ToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      body{
        background-image: url("images/dibujoLibro.jpg");
        width: 100%;
	      height:100%vh;
        background-size: cover;
      }

      .formulario{
        display: flex;
        justify-content: center; 
      }

    form{
      background-color: #381b1ba6;
      align-items: center;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: bold;

      padding: 5rem;
      border-radius: 15px;

      position: relative;
      left: 25rem;
      top: 12rem;

    }

    .image{
      position: absolute;
      left: 2rem;
      bottom: 15rem;
    }
    h1{
      color: whitesmoke;
    }

    label{
      color: whitesmoke;
    }

    </style>
  
  </head>
  <body>

  
<div class="formulario">
  <form action="registra.php" method="POST" >
  <h1>Registro de nuevo usuario</h1>
  <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Ingrese nombre de ususario</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="Ingrese nombre de batalla" name="user" >
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingrese su Gmail </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="user@gmail.com" name="gmail">
    <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="No olvide su contraseña" id="exampleInputPassword1" name="pass">
  </div>
  <center>
  <div class="col-4 ">
  <button type="submit" class="btn btn-primary" name="btn2">Registrarse</button>
  <br><br>
  <button type="submit" class="btn btn-primary " name="btnClose">!Ya tengo cuenta!
            </div></center>
</form>
</div>
<?php
if(isset($_POST['btn2'])){
    include('db.php');

    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $gmail=$_POST['gmail'];

    mysqli_query($conexion,"INSERT INTO persona ( usuario, password, correo) VALUES ('$user','$pass','$gmail') ");
    session_start();
    ob_start();
    $_SESSION['sesion_exito']=5;
    header('location:index.php'); 
}
if(isset($_POST['btnClose'])){
  header('location:index.php');}
?>


    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>