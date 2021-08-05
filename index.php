<?php
    $firstName = "Antonio"; 
    $lastName = "Varela";
?>
<!DOCTYPE html>
<html>
<head>  
    <meta charset="ISO-8859-1">
    <style>
        .vertical-menu {
            width: 200px;
            height: 1080px;
            float: left;
            background-color: aqua;
            display: block;
        }

        header{
            background-color: brown;
            height: 100px;
        }

        footer{
            background-color: indigo;
            height: 100px;
        }

        .contenido{
            background-color: gold;
        }

    </style>

    <link rel="stylesheet" href="" >
</head>
<body>
    <header>
        <h1>Ejemplo de cabecera</h1>
        <h1> Bienvenido, <?= $firstName, " ", $lastName ?> </h1>
    </header>

    <nav class="vertical-menu">
        <ul>
            <li><a href="#" >Entrada1</a></li>
            <li><a href="#" >Entrada2</a></li>
        </ul>
        
    </nav>

    <div class="contenido">
        <p>Aqui vendria el contenido de la web.</p> 
        <p>Aqui vendria el contenido de la web.</p> 
        <p>Aqui vendria el contenido de la web.</p> 
        <p>Aqui vendria el contenido de la web.</p> 
        <p>Aqui vendria el contenido de la web.</p> 
        <p>Aqui vendria el contenido de la web.</p> 
    </div>

    <footer>
        <p>Ejemplo de footer</p>
    </footer>
</body>
</html>