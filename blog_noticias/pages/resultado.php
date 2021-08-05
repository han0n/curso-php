<?php
    $nombre =$_POST["nombre"] ?? "";
    $email = $_POST["email"] ?? "";
    $asunto = $_POST["asunto"] ?? "";
    $mensaje = $_POST["mensaje"] ?? "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p> 
        Nombre: <?=$nombre;?><br><br>
        E-mail: <?=$email;?><br><br>
        Asunto: <?=$asunto;?><br><br>
        Mensaje: <?=$mensaje;?><br><br>
    <p>
    
</body>
</html>