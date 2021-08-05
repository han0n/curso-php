<article class="contenido">
    <h1><?= $noticia["titulo"] ?></h1>
    <div class="cuerpo-noticia sin-margen"><?= $noticia["cuerpo"] ?></div>
    <footer>
        <p>Publicada el: <?= $noticia["fecha"] ?> por <?= $noticia["autor"]?> </p>
    </footer>
</article>