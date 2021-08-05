<?php
    $firstName = "Antonio"; 
    $lastName = "Varela";

    $noticias = array(
        array("titulo" => "Título noticia 1", "autor" => "Pedro Picapiedra", "fecha" => "12/05/21", "cuerpo" => "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis sapiente perspiciatis quae, est assumenda eum accusantium commodi, enim alias reprehenderit maxime ullam! Hic, quis sunt qui excepturi possimus, exercitationem cupiditate perferendis illum dolorem quidem ducimus, error esse assumenda. Enim debitis aliquam officia porro laborum fuga veritatis doloribus quibusdam maxime sapiente? Accusantium numquam dolorum dolore minima, quisquam facere quidem ex sint. Debitis a doloremque obcaecati, aliquid sit qui natus cupiditate? Voluptas, temporibus incidunt minus quibusdam dignissimos praesentium esse eum. Ipsum tempora itaque sequi perferendis iste! Voluptates ab pariatur officiis commodi veritatis id enim autem vero ut, dolorem, reprehenderit provident. </p>"),
        array("titulo" => "Título noticia 2", "autor" => "Charles Chaplin", "fecha" => "12/07/21", "cuerpo" => "<p> Lorem ipsum, dolor sit amet consectetur adipisicing elit. Beatae consequatur dignissimos accusantium, ea alias ad pariatur nobis aliquid, quas esse inventore minima nam quaerat eligendi tempora? Iure, repellendus aliquid! </p>"),
        array("titulo" => "Título noticia 3", "autor" => "Rick Sánchez", "fecha" => "18/07/21", "cuerpo" => "<p> LLorem ipsum dolor sit amet consectetur adipisicing elit. Magnam exercitationem repellendus, vero harum corrupti minima animi porro, cum perspiciatis natus delectus aut quos molestias. Perspiciatis voluptatibus quo nisi amet quia, necessitatibus, architecto assumenda sunt vel facere odio quisquam. Sunt repellat tempora perspiciatis in nisi possimus suscipit esse. A eveniet necessitatibus cumque modi iste dicta fugiat! Blanditiis eum quos itaque veritatis labore eveniet minus! Eveniet! </p>"),
        array("titulo" => "Título noticia 4", "autor" => "Isaac Asimov", "fecha" => "19/07/21", "cuerpo" => "<p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aspernatur harum exercitationem ad officiis sunt doloribus optio eum reiciendis illum nostrum ducimus impedit, aliquam quidem minima facere quasi a perspiciatis odio, odit ex. Asperiores enim deleniti voluptate doloremque. </p>"), 
    
    );
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Blog</title>

</head>
<body>

<div> <?php include './inc/cabecera.php' ?></div>



<div id="wrapper" class="wrap_cnt">
    <?php include './inc/barra-menu.php' ?>
    <main id="noticias"> 
        <section> 
            <?php 
                foreach($noticias as $noticia){
                    include './inc/contenido.php'; 
                }
            ?> 
        </section>
    </main>
    <div style="clear:both"></div>
</div>

<div> <?php include './inc/footer.php' ?></div>
    
</body>
</html>