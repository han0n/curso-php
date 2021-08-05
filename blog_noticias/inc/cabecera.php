<div>
    <header>
        <?php 
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
        </ul>
    </nav>
</div>
