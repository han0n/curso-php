<article class="contenido">
    <h1><?= $noticia["titulo"] ?></h1>
    <div class="cuerpo-noticia sin-margen"><?= $noticia["contenido"] ?></div>
    <footer>
        <p>Publicada el: <?= $noticia["fechaPublicacion"] ?> por <?= $noticia["autor"]?> </p>
    </footer>
</article>

