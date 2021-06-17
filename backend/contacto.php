<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Los Hermanos - Taller Mecanico</title>
    <link rel="stylesheet" href="contacto.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital@1&display=swap" rel="stylesheet">
</head>
<body>
  <div class="titulo">
      <h4>Taller mecanico</h4>
      <h1>Los Hermanos</h1>
  </div>
    <div id="contenedor">
        <h1 id="informacion"></h1>
        <a href="../index.html">Volver a la pagina principal</a>
        <p id="redireccion"></p>
    </div>
</body>
</html>

<?php

$codigoMail = 0;

if(!empty($_POST['correo'] && isset($_POST['enviar']))){//verifica que haya un correo y se haya dado a submit, aunque la ultima verificacion no es necesaria
/*
    $correo = $_POST['correo'];

    if(isset($_POST['nombre'])) $nombre = $_POST['nombre'];
    else $nombre = 'No dado';
    if(isset($_POST['telefono'])) $telefono = $_POST['telefono'];
    else $telefono = 'No dado';
    if(isset($_POST['texto'])) $texto = $_POST['texto'];
    else $texto = 'No dado';

    $mailPersonal = 'mollo.matias03@gmail.com';
    $asunto = 'Alguien quiere contactarse con vos! Desarrollo web.';

    $informacion = 'Alguien quiere contactarse con vos!
                    Email: ' . $correo . '
                    Telefono: ' . $telefono . '
                    Nombre: ' . $nombre . '
                    Mensaje: ' . $texto;

    $header = 'From: noreply@example.com' . '\r\n';
    $header .= 'Reply-To: noreply@example.com' . '\r\n';
    $header .= "X-Mailer: PHP/" . phpversion();

    $mail = @mail($mailPersonal,$asunto,$informacion,$header);
    */

    require_once '../vendor/autoload.php';

    if(!isset($_POST['correo'])){
        header('location:../index.html');
        exit;
    }
    if(isset($_POST['nombre'])) $nombre = $_POST['nombre'];
    else $nombre = "-";

    if(isset($_POST['tel'])) $tel = $_POST['$tel'];
    else $tel = "-";

    if(isset($_POST['texto'])) $desc = $_POST['texto'];
    else $desc = "-";
    
    $email = $_POST['correo'];

    

    $transport = (new Swift_SmtpTransport('smtp.gmail.com',587,'tls'))
    ->setUsername('botemailsmm@gmail.com')
    ->setPassword('themaxter10');

    $mailer = new Swift_Mailer($transport);


    $mensaje = (new Swift_Message('Contacto Desarrollo Web'))
    ->setFrom('botemailsmm@gmail.com')
    ->setTo(['matiasmollo@protonmail.com', 'matuchiqui@gmail.com'])
    ->setBody("Nombre: $nombre \n\nEmail: $email \n\nTeléfono: $tel \n\nComentario: $desc");

    //Se envia en el IF

    if($mailer->send($mensaje))$codigoMail = 1; //Email enviado exitosamente
    else $codigoMail = 2; //Fallo al enviar el mail

}
else $codigoMail = 3; //Falllo en la verificacion de los datos


?>

<script type="text/javascript">

let informacion = document.getElementById('informacion');

let codigo = "<?php echo $codigoMail; ?>"; //variable php en javascript 

if(codigo == 1) informacion.innerHTML = 'El Email se ha enviado satisfactoriamente y sera respondido a la brevedad. Muchas gracias por comunicarse.';
else if(codigo == 2) informacion.innerHTML = 'Ha ocurrido un error, vuelva a intentarlo mas tarde.';
else if(codigo == 3) informacion.innerHTML = 'No se han podido verificar los datos correctamente, vuelva a intentarlo mas tarde.';

redireccion = document.getElementById('redireccion');

let segundo=30;

redireccion.innerHTML = 'redireccionando en 30 segundos';

var intervalo = setInterval(function(){
    segundo--;
    redireccion.innerHTML = `redireccionando en ${segundo} segundos`;

    if(segundo == 0){
         clearInterval(intervalo);
         window.location.href = '../index.html';
    }

},1000);



//redireccion.innerHTML = `Redireccionando en ${segundo} segundos`;

</script>

<?php //se deja abierto el php para que no puedan poner scripts
