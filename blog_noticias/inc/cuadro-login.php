<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="index.php?p=login" method="post">
        <p>
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required>
        </p>

        <p>
            <label for="pswd">Contraseña: </label>
            <input type="password" id="pswd" name="pswd" required>
        </p>
        <p>
            <input type="submit" name="btnLogin" value="Iniciar sesión" >
        </p>
        
    </form>

</body>
</html>

