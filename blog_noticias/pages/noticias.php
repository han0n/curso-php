<?php 
if($modoEdicion) { ?>
    <form class="formularios" method="post" action="index.php?p=noticias&accion=editar&id=<?=$id?>">

    <p>
        <label for="titulo">Título: </label>
        <input type="text" id="titulo" name="titulo" value="<?=$noticia["titulo"] ?? ""?>">
    </p>

    <p>
    <label for="categorias">Categoria: </label>
        <select id="categoria" name="cat">
            <?php foreach($categorias as $cat) { ?>
                <option value="<?=$cat["id"] ?? 0 ?>" > <?=$cat["nombre"] ?> </option>
            <?php } ?>
        </select>
    </p>

    <p>
        <label for="contenido">Contenido: </label>
        <textarea type="text" id="contenido" name="contenido" value="<?=$noticia["contenido"] ?? ""?>"></textarea>
    </p>

    <p class="btnGuardar">
        <input type="submit" name="btnNoticias" value="Guardar">
    </p>

    </form>

<?php 
} else { ?>
    <a class="boton" href="index.php?p=noticias&accion=editar">Crear nueva</a>
    <table class="tblListado">
        <tr>
            <th >ID</th>
            <th>Titulo</th>
            <th >Acciones</th>
        </tr>  <?php
        foreach($noticias as $cat) {
    ?>
            <tr>
                <td class="id"><?=$cat["id"]?></td>
                <td><?=$cat["titulo"]?></td>
                <td class="acciones">
                    <a class="boton" href="index.php?p=noticias&accion=editar&id=<?=$cat["id"]?>">Editar</a>
                    <a class="boton" href="index.php?p=noticias&accion=eliminar&id=<?=$cat["id"]?>">Eliminar</a>
                </td>
            </tr>
    <?php
        }
    ?>
    </table>

    <p class="paginador">
    <?php for($i=1;$i<=$nTotalPaginas;$i++) { ?>
        <a class="boton" href="index.php?p=noticias&page=<?=$i?>"><?=$i?></a>
    <?php } ?>
    </p><?php
} ?>