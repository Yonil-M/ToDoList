<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Login</title>
</head>
<body>
  <h1>Bienvenidos</h1>
  <?php
  echo $_SESSION["usuario"];
  ?>
</body>
</html>