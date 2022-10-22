<?php

include 'db.php';

echo $idTarea=$_GET['ID'];

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
  
    <title>Update tarea</title>
</head>
<body class="bg-info">
<form action="update.php" method="POST">
        
        <div class="Container">
            <div class="row justify-content-center m-auto shadow bg-white mt-5 py-3">
                <h3 class="text-center text-primary font-monospace">Modificar tarea</h3>
                <div class="col-8">
                    <input type="text" value="<?php echo$consulta['titulo'] ?>"  class="form-control" name="lista">
                </div>
                <div class="col-2">
                    <input class="btn btn-outline-primary" type="submit" value="Update" name="btnUpdate">
                </div> 
                <input type="hidden" value="<?php echo$consulta['id'] ?>"  class="form-control" name="id">
            </div>
    
        </div>
        </form>
        <br>

    

</body>
</html>