<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data" action="index.php?p=subida&estado=success">
        <p class="btnSubida">
            <input type="file" name="fichero" id="fichero" required>
        </p>
        <p class="btnSubida">
            <input type="submit"  name="btnSubirFichero" value="Subir archivo">
        </p>
    </form>
</body>
</html>