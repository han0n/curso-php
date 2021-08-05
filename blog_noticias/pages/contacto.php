<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" action="index.php?p=contacto&estado=submited">
        <p>
            <label for="nombre">Nombre: </label>
            <input type="text" id="nombre" name="nombre" value="<?=$nombre=$_GET["nombre"] ?? "" ?>">
        </p>
        <p>
            <label for="email">E-mail: </label>
            <input type="email" id="email" name="email" value="<?=$email=$_GET["email"] ?? "" ?>" required>
        </p>
        <p>
            <label for="asunto">Asunto: </label>
            <input type="text" id="asunto" name="asunto" value="<?=$asunto=$_GET["asunto"] ?? "" ?>">
        </p>
        <p>
            <label for="mensaje">Mensaje: </label>
            <textarea type="text" id="mensaje" name="mensaje" value="<?=$mensaje=$_GET["mensaje"] ?? "" ?>"></textarea>
        </p>
        <p class="btnGuardar">
            <input type="submit" value="Enviar" name="btnContacto">
        </p>
    </form>
</body>
</html>