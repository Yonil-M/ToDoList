<?php

include 'db.php';
session_start();
    ob_start();
$usuario=$_SESSION['usuario'];
$idTarea=$_GET['ID'];
if($usuario==null || $idTarea==null){
  header('location:close.php');   
} 


$sqlUpdate=mysqli_query($conexion,"select*from tarea where id='$idTarea'");

$consulta=mysqli_fetch_array($sqlUpdate);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
      *{
        margin: 0;
        padding: 0;
      }

    .header{
      background-color: #333;
      color: white;
      padding: 1rem ;

      position: fixed;
      left: 0;
      top: 0;
      width: 100%;
    }
    .header a{
      text-decoration: none;
      cursor:default
    }

    .menu{
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    nav ul {
      margin: 0;
      padding: 0;
      list-style: none;
      
    }
    nav ul li{
      display: inline-block;

    }

    nav ul li a{
      display: block;
      padding: 0.5rem 1rem;
      cursor:default;
    }
    nav ul li p{
        cursor:default;
      display: block;
      margin: 0.5rem 4rem;
      padding: 0.3rem 1rem;
      background-color: red;
      border-radius: 10px;
    }
    .logo{
      letter-spacing: 15px;
      font-size: 1.4em;
      
    }

    main{
      padding: 5rem;
    }

    form{
      padding:0rem 10rem;
    }
    .image img{
        height: 25rem;
        width: 25rem;
        
    }

    .image{
        display: flex;
        justify-content: center;
        align-items: center; 
    }
    
     
    </style>

  </head>
  <body class="bg-primary">

    <title>Update tarea</title>
</head>
<body class="bg-info">
<header class="header">
      <div class="menu ">

      <a class="logo" href=""> ToDoList</a>
      <nav>
        <ul>
        <li> <p> Usuario : <?php echo $usuario ?> </p> </li>
        <li style="width:6rem ;"><a href="close.php" class="btn btn-outline-warning">Salir 
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>
        </a></li>
     </ul> </nav>

      </div>

    </header>



<main>
<form action="update.php" method="POST">
        
        <div class="Container">
            <div class="column justify-content-center m-auto shadow bg-white mt-5 py-5">
                <h3 class="text-center text-primary font-monospace">Modificar tarea</h3>
                
                <div class="col-7 m-auto">
                <textarea class="form-control" required id="exampleFormControlTextarea1" rows="1" maxlength="100"  name="lista"><?php echo$consulta['titulo'] ?></textarea>
                </div>
                <br>
                <center>
                <div class="column">
                <button type="submit" class="col-2 btn btn-outline-primary " name="btnAtras">Volver atras
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
  <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
  <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1h7.08zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1h-7.08z"/>
</svg>
                </button>
            
                <button type="submit" class="col-2 btn btn-outline-primary " >Guardar edit
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"/>
</svg>
                </button></div>

                <input type="hidden" value="<?php echo$consulta['id'] ?>"  class="form-control" name="id">
            </div>
    
        </div>
        </form>
 </center>       <br>

    
        </main>
<?php
if(isset($_POST['btnAtras'])){
  header('location:home.php');}
?>


        <div class="image" >
            <img src="images\img1.png" alt="">
        </div>
</body>
</html>