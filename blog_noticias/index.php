<?php
     //La sesión debe de aparecer siempre antes de cualquier cosapara que sea efectiva
     if(session_status() === PHP_SESSION_NONE) {
        session_start(); //$_SESSION
    }
    /*
    $firstName = "Antonio"; 
    $lastName = "Varela";
    */
    //Dependencia del controlador
    require_once 'utils/functions.php';

    $username = $_SESSION["usuario"] ?? "";

    $pageParam = (array_key_exists("p", $_GET) ? $_GET["p"] : "inicio");
    $page = "pages/$pageParam.php";

    switch($pageParam){
        case "login":
            if(array_key_exists("btnLogin", $_POST)) {
                $user = $_POST["usuario"] ?? "";
                $clave = $_POST["pswd"] ?? "";

                $_SESSION["usuario"] = $user;

                header("Location: index.php?p=inicio"); //Redirigimos a la portada
                exit(); 
            }
            break;
        case "logout":
            //Nos cargamos solo la parte usuario
            $_SESSION["usuario"] = null;
            $_SESSION["usuario"] = "";
            unset($_SESSION["usuario"]);

            //Nos cargamos toda la sessión
            session_unset();
            session_destroy();

            header("Location: index.php?p=inicio"); //redirigimos a la portada
            break;
        case "inicio":
            $cabecera="Noticias";
            $noticias = array(
                array("titulo" => "Título noticia 1", "autor" => "Pedro Picapiedra", "fecha" => "12/05/21", "cuerpo" => "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis sapiente perspiciatis quae, est assumenda eum accusantium commodi, enim alias reprehenderit maxime ullam! Hic, quis sunt qui excepturi possimus, exercitationem cupiditate perferendis illum dolorem quidem ducimus, error esse assumenda. Enim debitis aliquam officia porro laborum fuga veritatis doloribus quibusdam maxime sapiente? Accusantium numquam dolorum dolore minima, quisquam facere quidem ex sint. Debitis a doloremque obcaecati, aliquid sit qui natus cupiditate? Voluptas, temporibus incidunt minus quibusdam dignissimos praesentium esse eum. Ipsum tempora itaque sequi perferendis iste! Voluptates ab pariatur officiis commodi veritatis id enim autem vero ut, dolorem, reprehenderit provident. </p>"),
                array("titulo" => "Título noticia 2", "autor" => "Charles Chaplin", "fecha" => "12/07/21", "cuerpo" => "<p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consequatur dignissimos accusantium, ea alias ad pariatur nobis aliquid, quas esse inventore minima nam quaerat eligendi tempora? Iure, repellendus aliquid! </p>"),
                array("titulo" => "Título noticia 3", "autor" => "Rick Sánchez", "fecha" => "18/07/21", "cuerpo" => "<p> LLorem ipsum dolor sit amet consectetur adipisicing elit. Magnam exercitationem repellendus, vero harum corrupti minima animi porro, cum perspiciatis natus delectus aut quos molestias. Perspiciatis voluptatibus quo nisi amet quia, necessitatibus, architecto assumenda sunt vel facere odio quisquam. Sunt repellat tempora perspiciatis in nisi possimus suscipit esse. A eveniet necessitatibus cumque modi iste dicta fugiat! Blanditiis eum quos itaque veritatis labore eveniet minus! Eveniet! </p>"),
                array("titulo" => "Título noticia 4", "autor" => "Isaac Asimov", "fecha" => "19/07/21", "cuerpo" => "<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur harum exercitationem ad officiis sunt doloribus optio eum reiciendis illum nostrum ducimus impedit, aliquam quidem minima facere quasi a perspiciatis odio, odit ex. Asperiores enim deleniti voluptate doloremque. </p>"), 
            
            );
            break;
        default:
            break;
    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Blog</title>

</head>
<body>

<?php include './inc/cabecera.php' ?>



<div id="wrapper" class="wrap_cnt">
    <?php 
    switch($pageParam){
        case "inicio":

            include './inc/barra-menu.php' ?>
            <main id="noticias"> 
                <section> 
                    <?php 
                        foreach($noticias as $noticia){
                            include './inc/contenido.php'; 
                        }
                    ?> 
                </section>
            </main>
            <div style="clear:both"></div> <?php 
            break;
        case "contacto": ?>
        
            <main id="formulario"> 
                <section>  <?php 

                    if(!array_key_exists("btnContacto", $_POST)) {
                        include "pages/contacto.php"; 
                    }else{
                        include "pages/resultado.php";
                        $nombre= $_GET["nombre"] ?? "";
                        $email= $_GET["email"] ?? "";
                        $asunto= $_GET["asunto"] ?? "";
                        $mensaje= $_GET["mensaje"] ?? "";
                    } ?>

                </section>
            </main> <?php
            break;
        case "subida": ?>
        
            <main id="formulario"> 
                <section class="btnSubida">  <?php 
                
                    if(array_key_exists("btnSubirFichero", $_POST)) {

                        uploadfile("fichero");

                    }else{
                        include "pages/fichero.php";
                    } ?>

                </section>
            </main> <?php
        default:
            break;
    }?>
</div>

<div> <?php include './inc/footer.php' ?></div>
    
</body>
</html>