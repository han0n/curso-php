<?php 
if($modoEdicion) { ?>
    <form class="formularios" method="post" action="index.php?p=categorias&accion=editar&id=<?=$id?>">

    <p>
        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" value="<?=$categoria["nombre"] ?? ""?>">
    </p>

    <p class="btnGuardar">
        <input type="submit" name="btnCategorias" value="Guardar">
    </p>

    </form>

<?php 
} else { ?>
    <a class="boton" href="index.php?p=categorias&accion=editar">Crear nueva</a>
    <table class="tblListado">
        <tr>
            <th >ID</th>
            <th>Nombre</th>
            <th >Acciones</th>
        </tr>  <?php
        foreach($categorias as $cat) {
            //La categoría vacia no se puede eliminar ni editar
            if($cat["id"] == 0){?>
                <tr>
                    <td class="id"><?=$cat["id"]?></td>
                    <td><?=$cat["nombre"]?></td>
                    <td class="acciones">
                        
                    </td>
                </tr> <?php
            }else{ ?>
                <tr>
                    <td class="id"><?=$cat["id"]?></td>
                    <td><?=$cat["nombre"]?></td>
                    <td class="acciones">
                        <a class="boton" href="index.php?p=categorias&accion=editar&id=<?=$cat["id"]?>">Editar</a>
                        <a class="boton" href="index.php?p=categorias&accion=eliminar&id=<?=$cat["id"]?>">Eliminar</a>
                    </td>
                </tr> <?php
            }
        }
    ?>
    </table>

    <p class="paginador">
    <?php for($i=1;$i<=$nTotalPaginas;$i++) { ?>
        <a class="boton" href="index.php?p=categorias&page=<?=$i?>"><?=$i?></a>
    <?php } ?>
    </p><?php
} ?>
