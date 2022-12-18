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
</head>
<body>
<div id="recuperarclave">
            <h1 class="text-center mb-5 recuperarPass">
                Recuperar tu Clave
            </h1>


            <form action="linkClave.php" method="post">
                <div class="field-wrap">
                    <label>Correo</label>
                    <input type="email" name="email" required autocomplete="off"/>
                </div>
            
                <input type="submit" class="button button-block miBtn mt-5" value="RECUPERAR CLAVE"/>

                <a href="index.php" id="volver" class="mt-3 mb-4" title="Volver">Volver</a>
                <br><br>
            </form>
        </div>
</body>
</html>