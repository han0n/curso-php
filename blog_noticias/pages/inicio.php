<div id="wrapper" class="wrap_cnt">
    <?php include dirname(__FILE__).'/../inc/barra-menu.php' ?>
    <main id="noticias"> 
        <section> 
            <?php 
                foreach($noticias as $noticia){
                    include '../inc/contenido.php'; 
                }
            ?> 
        </section>
    </main>
    <div style="clear:both"></div>
</div>