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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/dark.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>




    <style>
      *{
        margin: 0;
        padding: 0;
      }
      body{
        background-image: url("images/camaraLibro.jpg") ;
        width: 100%;
	      height:100%vh;
        background-size: cover;
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
      text-decoration: none;
      cursor:default;
      display: block;
      margin: 0.5rem 4rem;
      padding: 0.3rem 1rem;
      background-color: #45B39D;
      border-radius: 10px;
    }
    .logo{
      letter-spacing: 15px;
      font-size: 1.4em;
      font-weight: bold;
      color: black;
      
    }
    .logo:hover{
      color: whitesmoke;
    }

    main{
      padding: 5rem;
    }

    form{
      padding:0rem 10rem;
    }
    #deleteCuenta{
      background-color: #45B39D;
      float: left;
      color: whitesmoke;
    }
    #deleteCuenta:hover{
      background: #434343;
      color: black;
    }
    
    nav ul li ul{
      display: none;
      position: absolute;
      bottom: -75px;
      right: 180px;
      
      
    }
    nav ul li ul li a{
      margin: 2px;
      border-radius: 15px;
    }

    nav li:hover >ul{
      display: flex;
      flex-direction: column;
      background-color: #381b1ba6;
      border-radius: 10px;
    }
    button{
      background-color: transparent;
      border: 0px;
    }
    #divFormulario{
      background-color: #45B39D;
    }
    #tablaTarea{
      
      background-color: #45B39D;
    }
    .contacto{
      height: 80px;
    width: 80px;
    border-radius: 60px;
    background: url("images/email.svg");
    background-color: royalblue;
    box-shadow: 0px 3px 12px rgba(0, 0, 0, 0.2);
    background-size: 50%;
    background-position: center;
    background-repeat: no-repeat;
    position: fixed;
    bottom: 45px;
    right: 45px;
    }
    .contacto ul li{
      text-decoration: none;
      list-style: none;
      position: absolute;
      right: -4px;
      top: 5rem;
      font-weight: bold;
    }



    #tablaHeadLeft{
      border-top-left-radius: 10px;
    }
    #tablaHeadRigth{
      border-top-right-radius: 10px;
    }
    </style>

  </head>
    <script type="Text/javascript">
      function DeleteUser(){
        var texto= confirm("Al eliminar su cuenta perdera todas sus tareas guardadas. ¿Estas deacuerdo?");
        if(texto==true){
          return true;
        }else{
          return false;
        }
      }

    </script>


  <body>

    <?php
  
  //echo $_SESSION['id'];
    ?>
    <header class="header">
      <div class="menu ">

      <a class="logo" href=""> ToDoList</a>
      <nav>
        <ul>
        <li> <p> Usuario : <b style="text-transform: uppercase;"> <?php echo $usuario ?> </b> 
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
  <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z"/>
</svg>
<ul>
  <li ><button onclick="return DeleteUser()"> <a id="deleteCuenta" href="deleteCuenta.php">Eliminar Cuenta</a></button></li>

  <li><button> <a id="deleteCuenta" href="">Modo oscuro <div class="modo" id="modo">
        <i class="fas fa-toggle-on"></i>
    </div>  </a> </button></li>

</ul> 

      </li>


        <li style="width:6rem ;"><a href="close.php" class="btn btn-outline-warning">Salir 
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg>
        </a>
      
       



      </li>
     </ul> </nav>

      </div>

      <?php
    $id=$_SESSION['id'];
    $consultaUser= mysqli_query($conexion,"select*from tarea where idUsuario='$id'");

    
    ?>
    </header>

    <main>

    <form action="insert.php" method="POST" >
        
    <div class="Container" >

        <div id="divFormulario" class="row justify-content-center m-auto shadow  mt-5 py-3" style="border-radius:10px ;">

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
    <div id="tablaTarea" class="col-xl- m-auto mt-3" style="border-radius:10px ;">
    <table class="table border-dark ">
      <tbody class="" >
        <tr  class="table table-dark table-striped"  >
          <th id="tablaHeadLeft">
            <center>
          Tarea</center>
          </th>
          <th>
           
            Fecha edicion</center>
          </th>

          <th id="tablaHeadRigth" COLSPAN=2>
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
          <td style="width:15% ;"><a href="delete.php? ID=<?php echo$row['id'] ?> "  class="btn btn-outline-danger">Borrar <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
<form>
            <div class="container-clock">
            <center><h2 style="color:#000f14" id="time">00:00:00</h2></center>
            <center><h2 style="color:#000f14"><p id="date">date</p></h2></center>
          </div>
          <script src="clock.js"></script>
        </form>


</main>

<div>
  <a style="text-decoration:none; color:black" class="contacto" href="contacto.php"> 
          <ul>
            
            <li>Contactanos</li>
          </ul>
</a>
</div>

<script src="js/main.js"></script>    
  </body>
</html>