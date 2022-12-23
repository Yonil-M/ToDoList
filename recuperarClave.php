<?php
include('db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recupera Clave</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        
        body{
        background-image: url("images/fondoTec1.jpg");
        width: 100%;
	    height:100%vh;
        background-size: cover;
      }

      .formulario{
        display: flex;
        justify-content: center;

      }
    form{
    width: 35vw;
      background-color: #381b1ba6;
      align-items: center;
      font-family: Georgia, 'Times New Roman', Times, serif;
      font-weight: bold;

      padding: 6rem;
      border-radius: 15px;

      position: absolute;
      left: 75rem;
      top: 15rem;

    }

    img{
        
        width: 45rem;
        height: 45rem;
      position: absolute;
      left: 5rem;
      top: 8rem;

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
     input a :hover{
        border: #fff
        
     }

     h1{
        margin-top: 15px;
    text-align: center;
     padding: 0px;
     color: #fff ;
     }
     header{
	border: solid 1px white;
	margin-left: 35px;
	margin-right: 35px;
	text-align: center;
	padding: 10px;
	color: rgb(206, 203, 203);
	font-size: 35px;
	color: #fff;
	font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
	background-color: black;
}
label{
    color: white;
}

    </style>
</head>
<body>
   
<div class="formulario">
           
            
            <form action="linkClave.php" method="post">
            <header> ToDoList</header>
            <h1 >
                Recuperar tu Clave
            </h1>
                <div >
                    <label>Correo: </label>
                    <br>
                    <input type="email" name="email" placeholder="Ejemplo@gmail.com" required autocomplete="off"/>
                </div>
                
                <input type="submit" class="button button-block miBtn mt-5" value="RECUPERAR CLAVE"/>

                <br><br>
                <a href="index.php" id="volver" class="mt-3 mb-4" title="Volver">Volver</a>
                <br><br>
            </form>
        </div>
             <h1><?php 
        session_start();
        ob_start();
        error_reporting(0);
        $msj=$_SESSION['msj'];
        unset($_SESSION['msj']);
   
        if($msj==1){
            echo "El correo no esta vinculado a ninguna cuenta";
        }

        ?>
        </h1>
</body>
</html>

