<?php

include 'db.php';

session_start();
    ob_start();
$usuario=$_SESSION['usuario'];
$pass=$_SESSION['pass'];

   
$sql_id="select id from persona where usuario='$usuario' and password='$pass'";

 $sql_query=mysqli_query($conexion,$sql_id);

 while($idRow=mysqli_fetch_array($sql_query)){

      
     $_SESSION['id']=$idRow['id'];
     
  

}



$usuarios="select*from persona ";




?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home ToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body class="bg-primary">

    <?php
  
  echo $_SESSION['id'];
    ?>




    <h1 class="col-8 bg-white  mt-3">
        Bienvenido: 
        
        <?php

        echo $usuario ?>

        <div style="width:10% ;"><a href="close.php" class="btn btn-outline-success">Salir</a></div>
    </h1>
    <form action="insert.php" method="POST">
        
    <div class="Container">
        <div class="row justify-content-center m-auto shadow bg-white mt-5 py-3">
            <h3 class="text-center text-primary font-monospace">Todo List</h3>
            <div class="col-8">
                <input type="text"  class="form-control" name="lista">
            </div>
            <div class="col-2">
                <input class="btn btn-outline-primary" type="submit" value="ADD" name="btnAdd">
            </div> 
        </div>

    </div>
    </form>
    <br>



    

    <?php
    $id=$_SESSION['id'];
    $consultaUser= mysqli_query($conexion,"select*from tarea where idUsuario='$id'");

    
    ?>


  <div class="container">
    <div class="col-8 bg-white m-auto  mt-3">
    <table class="table">
      <tbody>
        <?php
        while($row= mysqli_fetch_array($consultaUser)){
          
        

        ?>
        <tr>
          <td><?php echo$row['id'] ?></td>
          <td><?php echo$row['titulo'] ?></td>
          <td><?php echo$row['fecha'] ?></td>
          <td style="width:10% ;"> <a href="delete.php" ID="<?php echo$row['id']" ?> class="btn btn-outline-danger">Delete</a> </td>
          <td style="width:10% ;"><a href="" class="btn btn-outline-success">Update</a></td>
        </tr>

        <?php

          }

          ?>
      </tbody>
    </table>
</div>
</div>




<br><br><br><br>
<?php
echo $id;

?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>