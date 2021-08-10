<p class="info"><?php
        //Salida de cuando se conectó el usuario admin:
            if(getUsername() != "admin"){ echo "Última conexión de admin: ". $usuariosRepo->getUltimaConexion("admin") ."<br>";}
            else{
                $catPrueba = new Categoria(99, "Prueba");
                $autorPrueba = new Usuario("admin", "admin", 1234567891);
                $notPrueba = new Noticia(99, "Noticia de prueba", "Texto", $autorPrueba->getNombre(), 1234567891, $catPrueba);
                echo $notPrueba->__String();
                echo $autorPrueba->__String();
                echo $catPrueba->__String();
            }
    ?>
</p>