<div>
    <header>
        <?php 
            include "info-pruebas.php"; //Salida para los echos de __String() de cada objeto
            if(!isUserLogged()){
                include "cuadro-login.php";
            }
            else
            {
                ?> 
                    <form class="bienvenido">
                        <p>Bienvenido</p><p> <?=getUsername()?></p>
                        <p><input type="button" onclick="window.location.href='index.php?p=logout';" name="btnLogout" value="salir"></p>
                    </form>
                <?php
            }
        ?>
    </header>
</div>
<div >
    <nav>
        <ul id="horizontal-menu" >
            <li> <a href="index.php">Noticias</a> </li>
            <li> <a href="index.php?p=contacto">Contacto</a> </li>
            <li> <a href="index.php?p=subida">Subir Fichero</a> </li>
            <?php //Si el usuario está logueado, se muestran los menús de edición:
            if(isUserLogged()){ ?>
                <li> <a href="index.php?p=categorias">Admin Categorias</a> </li>
                <li> <a href="index.php?p=noticias">Admin Noticias</a> </li> <?php
            }?>
        </ul>
    </nav>
</div>
