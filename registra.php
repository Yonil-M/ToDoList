<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro ToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

  

  <form action="registra.php" method="POST" >
  <div class="mb-3">
      <label for="disabledTextInput" class="form-label">Ingrese nombre de ususario</label>
      <input type="text" id="disabledTextInput" class="form-control" placeholder="" name="user" >
    </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Ingrese su Gmail </label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="gmail">
    <div id="emailHelp" class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  
  <button type="submit" class="btn btn-primary" name="btn2">Registrarse</button>
</form>

<?php
if(isset($_POST['btn2'])){
    include('db.php');

    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $gmail=$_POST['gmail'];

    mysqli_query($conexion,"INSERT INTO persona ( usuario, password, correo) VALUES ('$user','$pass','$gmail') ");
   
    header('location:index.php');
    mysqli_close($conexion); 

}
?>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>