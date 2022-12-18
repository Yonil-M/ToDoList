<?php

include 'db.php';

session_start();
    ob_start();
$usuario=$_SESSION['usuario'];
$pass=$_SESSION['pass'];
if($usuario==null || $pass==null){
  header('location:close.php');   
}else{
$sql_id="select id from persona where usuario='$usuario' and password='$pass'";

 $sql_query=mysqli_query($conexion,$sql_id);

 while($idRow=mysqli_fetch_array($sql_query)){
  $id=$idRow['id'];
      
     $_SESSION['id']=$id;
     
}}
   

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home ToDoList</title>
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
      cursor:default;
      display: block;
      padding: 0.5rem 1rem;
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

    
     
    </style>

  </head>
  <body class="bg-primary">

    <?php
  
  //echo $_SESSION['id'];
    ?>
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

    <form action="insert.php" method="POST" >
        
    <div class="Container" >
        <div class="row justify-content-center m-auto shadow bg-white mt-5 py-3" style="border-radius:10px ;">
            <h3 class="text-center text-primary font-monospace">Todo List</h3>
            <div class="col-8">
            <textarea class="form-control" required id="exampleFormControlTextarea1" rows="1" maxlength="100"  name="lista" placeholder="Escriba la tarea que que decea agregar" ></textarea>
                </div>

            <div class="col-2">
            </button>
            
            <button type="submit" class="row-2 btn btn-outline-primary " name="btnAdd">Agregar
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
            </button></div> 
        </div>

    </div>
    </form>
    <br>



    

    <?php
    $id=$_SESSION['id'];
    $consultaTarea= mysqli_query($conexion,"select*from tarea where idUsuario='$id' order by id desc");

    
    ?>


  <div class="container ">
    <div class="col-xl- bg-white m-auto mt-3" style="border-radius:10px ;">
    <table class="table border-dark ">
      <tbody class="" >
        <tr class="table table-dark table-striped" >
          <th >
            <center>
          Tarea</center>
          </th>
          <th>
           
            Fecha edicion
          </th>
          <th COLSPAN=2>
            <center>
            opciones:</center>
          </th>
        </tr>

        <?php
        while($row= mysqli_fetch_array($consultaTarea)){
          
        

        ?>
        <tr>
          
          <td><?php echo$row['titulo'] ?></td>
          <td><?php echo$row['fecha'] ?></td>
          <td style="width:15% ;"> <a href="delete.php? ID=<?php echo$row['id'] ?> "  class="btn btn-outline-danger">Borrar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg></a> </td>
          <td style="width:15% ;"><a href="formUpdate.php? ID=<?php echo$row['id'] ?> " class="btn btn-outline-success">Editar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a></td>
        </tr>

        <?php

          }

          ?>
      </tbody>
    </table>
</div>
</div>





</main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>