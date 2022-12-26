<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login ToDoList</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  
    <style>
        * {
     padding: 0;
     margin: 0;
     font-family: century gothic;
     text-align: center;
 }
 
 
 
 form {
     padding: 50px 20px;
     background-color: #381b1ba6;
     margin: calc(25% + 100px);
     margin-top: 70px;
     padding-top: 28px;
     margin-bottom: 30px;
     border-radius: 10px;
 }
 
 h1 {
     
     text-align: center;
     padding: 12px;
     color: #fff ;
     
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
 
 input[type='submit']{
     border: none;
     background-color: #48e;
     color: #fff;
     width: calc(80% - 20px);
     margin: 0 10%;
     margin-top: 22px;
     border-radius: 15px;
     
 }
 
 input[type='submit']:hover{
     transform: translateY(10%);
     color: black;
     background-color: #8F8EA9;
 
 }
 body{
	background-image: url("images/fondoToDoList.jpg") ;
	width: 100%;
	height:100%vh;
	background-size: cover;
	color:#fff;
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


.alerta{
    background-color: #381b1ba6;
    border-radius: 10px;
    margin-right: 20vw;
    margin-left: 20vw;
    margin-top: 3vw; 
    color:black;
    font-weight: 900;
    font-size: 3vw;
    font-family: 
Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    
}

.contacto{
      color: white;
      letter-spacing: 5px;
      font-size: 10;
    }

label input[type="checkbox"]{
    width: 15px;
    height: 15px;
    margin: 0;
    margin-right: 5px;
}

    </style>

</head>

<body>
   <p class="alerta">
    
        <?php
        session_start();

        if(isset($_COOKIE['usuario']) && isset($_COOKIE['password'])){
            $id=$_COOKIE['usuario'];
            $pass=$_COOKIE['password'];
        }
        else{
            $id="";
            $pass="";
        }

        ob_start();
        error_reporting(0);
        $sesion=$_SESSION['sesion_exito'];

       
        if($sesion==0){
            echo "!Bienvenido!";}
        if($sesion==2){
                echo "!Los campos son obligatorios!";}
        if($sesion==3){
        echo "!Datos incorrectos!";}
        if($sesion==4){
        echo "Ingrese su nueva contraseña";
        }if($sesion==5){
        echo "Ingrese su nueva cuenta";
        }if($sesion==6){
            echo "Revise su correo por favor";
            }
            unset($_SESSION['sesion_exito']);
        
        ?>
    
        </p> 
<form action="validar.php" method="post">

<header> ToDoList</header>
<h1 class="title">Sistema de Ingreso</h1>
<p>Usuario: <input type="text"placeholder="Ingrese usuario" name="usuario" value="<?php echo $id ?>"> </p>
<br>
<p>Contraseña: <input type="password"placeholder="ingrese su contraseña" name="password" value="<?php echo $pass ?>"> </p>
<label>
    <input type="checkbox" name="recordarme">Recordar usuario y contraseña
</label> 
<input type="submit" value="ingresar" name="btn1">
<br>
<br>
<div class="row">
<div class="col">
<a href="registra.php"> <button type="button" class="btn btn-primary">!No tengo Cuenta!</button></a>
</div><div class="col">
<a href="recuperarClave.php" id="olvidar" title="Recuperar Clave"> <button type="button" class="btn btn-primary">Olvide mi clave... </button></a>
</div>  </div>   

<br/>
<br/>
<a style="text-decoration:none ;" class="contacto" href="contacto.php"> Contactanos</a>

</form>

<?php
//include 'close.php'
?>


</body>
</html>