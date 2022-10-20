<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validar</title>
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
	background-image:url("https://images8.alphacoders.com/718/718915.jpg");
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

    </style>

</head>

<body>
    
<form action="validar.php" method="post">

<header> ToDoList</header>
<h1 class="title">Sistema de Ingreso</h1>
<p>Usuario <input type="text"placeholder="Ingrese usuario" name="usuario" > </p>
<br>
<p>Contraseña<input type="password"placeholder="ingrese su contraseña" name="password" > </p>

<input type="submit" value="ingresar">


</form>


</body>
</html>