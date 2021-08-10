<?php
    $categorias = $categoriasRepo->getAllCategorias([]);
?>
<nav id="vertical-menu">
    <ul><?php
        foreach($categorias as $categoria){ ?>
            <li>
                <a href="index.php?categoria=<?= $categoria["id"]?>" > 
                <?= $categoria["nombre"]?> </a>
            </li> <?php
        }?>
    </ul>
        
</nav>