<?php
if (!empty($_POST["btnIngresar"])){
    if(!empty($_POST["usuario"])and !empty($_POST["password"])){
        $USUARIO=$_POST["usuario"];
        $PASSWORD=$_POST["password"];
        $sql=$conexion->query("select*from usuario=$USUARIO and password=$PASSWORD");
        if ($datos=$sql->fetch_object()) {

            header("location:home.php");
        } else {
           echo "<div>Acceso Denegado</div>";
        }
        
    }else{
        echo "Campos vacios";
    }
}

?>