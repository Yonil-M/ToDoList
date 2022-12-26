<?php
include('db.php');
//code libreria phpMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
       
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

//varibles
session_start();
    ob_start();
$email=$_POST['email'];
$_SESSION['correoToken']=$email;
$_SESSION['msj']=0;


$correo             = trim($email); //Quitamos algun espacion en blanco
$consulta           = ("SELECT * FROM persona WHERE correo='$correo'");
$queryconsulta      = mysqli_query($conexion, $consulta);
$cantidadConsulta   = mysqli_num_rows($queryconsulta);
$dataConsulta       = mysqli_fetch_array($queryconsulta);

if($cantidadConsulta ==0){
    $_SESSION['msj']=1; 
    header("Location:recuperarClave.php");
    exit();
}else{
    //funcion de generar tokenUser  
function generandoTokenClave($length = 20) {
    return substr(str_shuffle(str_repeat($x='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklymopkz', ceil($length/strlen($x)) )),1,$length);
}
$miTokenClave     = generandoTokenClave();

    ob_start();
$_SESSION['tokenuser']=$miTokenClave;



//Agregando Token en la tabla BD
$updateClave    = ("UPDATE persona SET tokenUser='$miTokenClave' WHERE correo='$correo' ");
$queryResult    = mysqli_query($conexion,$updateClave); 


$linkRecuperar      = $dataConsulta['id']."&tokenUser=".$miTokenClave;



$destinatario = $correo;
$asunto       = "Recuperando Clave - ToDoList";
$cuerpo = '
    <!DOCTYPE html>
    <html lang="es">
    <head>
    <title>Recuperar Clave de Usuario</title>';
$cuerpo .= ' 
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: "Roboto", sans-serif;
        font-size: 16px;
        font-weight: 300;
        color: #888;
        background-color:rgba(230, 225, 225, 0.5);
        line-height: 30px;
        text-align: center;
    }
    .contenedor{
        width: 80%;
        min-height:auto;
        text-align: center;
        margin: 0 auto;
        background: #ececec;
        border-top: 3px solid #E64A19;
    }
    .btnlink{
        padding:15px 30px;
        text-align:center;
        background-color:#cecece;
        color: crimson !important;
        font-weight: 600;
        text-decoration: blue;
    }
    .btnlink:hover{
        color: #fff !important;
    }
    .imgBanner{
        width:100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding:0px;
    }
    .misection{
        color: #34495e;
        margin: 4% 10% 2%;
        text-align: center;
        font-family: sans-serif;
    }
    .mt-5{
        margin-top:50px;
    }
    .mb-5{
        margin-bottom:50px;
    }
    </style>
';

$cuerpo .= '
</head>
<body>
    <div class="contenedor">
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
    <tr>
        <td style="padding: 0">
            <img style="padding: 0; display: block" src="https://thumbs.dreamstime.com/b/to-do-list-banner-template-ribbon-label-sign-177646727.jpg" width="100%">
        </td>
    </tr>
    
    <tr>
        <td style="background-color: #ffffff;">
            <div class="misection">
                <h2 style="color: red; margin: 0 0 7px">Hola, '.$dataConsulta['usuario'].'</h2>
                <p style="margin: 2px; font-size: 18px">entra en el link para que puedas recuperar tu clave </p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <a href="http://localhost/login/nuevaClave.php" class="btnlink">Recuperar mi clave</a>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                </div>
        </td>
    </tr>
</table>';
$cuerpo .= '
      </div>
    </body>
  </html>';


    $mail = new PHPMailer(true);

        try {
            $mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                )
            );
            //Server settings
            $mail->SMTPDebug = 0;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username='201913301c@utea.edu.pe';//este debe ir en el address?
            $mail->Password='Lomejordelomejor1408';                            // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom('201913301c@utea.edu.pe', 'ToDoList');
            $mail->addAddress($destinatario);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $asunto;
            $mail->Body    = $cuerpo;

            $mail->send();
            $_SESSION['sesion_exito']=6;
            header('location:index.php');

        } catch (Exception $e) {
            echo $e;
        }
    }



  
 //acaba el mensaje


    
   /* $headers  = "MIME-Version: 1.0\r\n"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
    $headers .= "From: ToDoList\r\n"; 
    $headers .= "Reply-To: "; 
    $headers .= "Return-path:"; 
    $headers .= "Cc:"; 
    $headers .= "Bcc:"; 
   
    if(mail($destinatario,$asunto,$cuerpo,$headers)){

        echo mail($destinatario,$asunto,$cuerpo,$headers);
        //header("Location:index.php");
        
    }  */
     

?>
