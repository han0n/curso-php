<?php
     //La sesión debe de aparecer siempre antes de cualquier cosapara que sea efectiva
     if(session_status() === PHP_SESSION_NONE) {
        session_start(); //$_SESSION
    }
    
    //Dependencia del controlador
    require_once 'utils/functions.php';
    //Incluimos todas las dependencias del controlador
    require_once "config.php";
    require_once "repo/conector.php";
    require_once "repo/usuario-cntlr.php";
    require_once "repo/noticias-cntlr.php";
    require_once "repo/categorias-cntlr.php";

    $username = $_SESSION["usuario"] ?? "";

    $pageParam = (array_key_exists("p", $_GET) ? $_GET["p"] : "inicio");
    $page = "pages/$pageParam.php";
    $esCategoria=false;

    switch($pageParam){
        case "login":
            if(array_key_exists("btnLogin", $_POST)) {
                $user = $_POST["usuario"] ?? "";
                $clave = $_POST["pswd"] ?? "";

                //Comprobamos que esté en la BBDD
                if(compruebaLogin(conectarBD(), $user, $clave)) {
                    $_SESSION["usuario"] = $user;
                    header("Location: index.php?p=inicio"); //Redirigimos a la portada
                    exit();
                }

                header("Location: index.php?p=login&errorCode=3");
                exit();
            } else {
                $errorCode = $_GET["errorCode"] ?? "";

                if($errorCode==3) { $msgErrors = "Los datos introducidos de usuario/clave son incorrectos. "; } 
                else { $msgErrors = "No se ha recibido formulario."; }
            }
            break;
        case "logout":
            //Nos cargamos solo la parte usuario
            $_SESSION["usuario"] = null;
            $_SESSION["usuario"] = "";
            unset($_SESSION["usuario"]);

            //Nos cargamos toda la sessión
            session_unset();
            session_destroy();

            header("Location: index.php?p=inicio"); //redirigimos a la portada
            break;
        case "inicio":
            $cabecera="Noticias";
            //$noticias = getAllNoticias(conectarBD(), []);

            $filtro = [];
            //obtengo el filtro, si no hay categoria selec. muestra 5 noticias
            $idCat = $_GET["categoria"] ?? "";

            if($idCat!="") {
                $filtro["idCategoria"] = $idCat;
                $totalRegistros = getCountNoticiasPorCategoria(conectarBD(), [], $idCat);
                $nTotalPaginas = ceil($totalRegistros/5);
                $esCategoria=true;//Se usa más abajo para que redireccione a la pag según noticias o categoria
                
            }else{//Si no hay categoria, cuenta el paginado sobre las noticias totales
                $totalRegistros = getCountNoticias(conectarBD());
                $nTotalPaginas = ceil($totalRegistros/5);
            }
            
            $numPagina = $_GET["noticias"] ?? 1;
            $noticias = getNoticiasByField(conectarBD(), $filtro, $numPagina);
            
            break;
        case "categorias":
            //$categorias = getAllCategorias(conectarBD(), []);
            $totalCategorias = getCountCategorias(conectarBD(), []);
            $nTotalPaginas = ceil($totalCategorias/5);
    
            $accion = $_GET["accion"] ?? "listar";
            $id = $_GET["id"] ?? 0;
            $nPage = $_GET["page"] ?? 1;
            $categorias = getCategoriasByPage(conectarBD(), $nPage);
    
            $modoEdicion = false;
    
            if($accion=="eliminar") {
                delById(conectarBD(), "categorias",$id);
    
                header("Location: index.php?p=categorias");
                exit();
            } else if($accion=="editar") {
                $modoEdicion = true;
                //$id == 0 --> creamos  $id!=0 --> actualizamos
                $categoria = null;
                if($id!=0) {
                    $categoria = getById(conectarBD(), "categorias", $id);
                }
                if($categoria == null) {
                    $ccategoria = ["nombre"=>""];
                }
    
                
            }
            break;
        case "noticias":
            //$categorias = getAllCategorias(conectarBD(), []);
            $totalNoticias = getCountNoticias(conectarBD(), []);
            $nTotalPaginas = ceil($totalNoticias/5);
    
            $accion = $_GET["accion"] ?? "listar";
            $id = $_GET["id"] ?? 0;
            $nPage = $_GET["page"] ?? 1;
            $noticias = getNoticiasByPage(conectarBD(), $nPage);
    
            $modoEdicion = false;
    
            if($accion=="eliminar") {
                delById(conectarBD(), "noticias",$id);
    
                header("Location: index.php?p=noticias");
                exit();
            } else if($accion=="editar") {
                $modoEdicion = true;
                //$id == 0 --> creamos  $id!=0 --> actualizamos
                $noticia = null;
                if($id!=0) {
                    $noticia = getById(conectarBD(), "noticias", $id);
                }
                if($noticia == null) {
                    $noticia = ["titulo"=>"", "contenido" => "", "idCategoria" => 0, "autor" => getUsername()];
                }
    
                
            }
            break;
        default:
            break;
    }

    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/reset.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900,400italic,700italic,900italic|Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/estilos.css">
    <title>Blog</title>

</head>
<body>

<?php include './inc/cabecera.php' ?>



<div id="wrapper" class="wrap_cnt">
    <?php 
    switch($pageParam){
        case "inicio":
            //Salida de cuando se conectó el usuario admin:
            if(getUsername() != "admin"){ echo "Última conexión de admin: ". getUltimaConexion(conectarBD(), "admin");}

            include './inc/barra-menu.php'; ?>
            <main id="noticias"> 
                <section> 
                    <?php 
                        foreach($noticias as $noticia){
                            include './inc/contenido.php'; 
                        }
                    ?>
                </section>
                <div class="paginador sin-margen"> <!--paginación-->
                    <?php 
                        if($nTotalPaginas!=0){?>
                            <p > <?php 
                                for($i=1;$i<=$nTotalPaginas;$i++) { 
                                    if(!$esCategoria){ ?>
                                        <a class="boton" href="index.php?noticias=<?=$i?>"><?=$i?></a> <?php 
                                    }else{ ?>
                                        <a class="boton" href="index.php?categoria=<?=$idCat?>&page=<?=$i?>"><?=$i?></a> <?php 
                                    }
                            } ?>
                            </p><?php
                        }//HECHO: Falta hacer que pagine si es categoria
                    ?> 
                </div>
            </main>
            <div style="clear:both"></div> <?php 
            
            break;
        case "contacto": ?>
        
            <main id="formulario"> 
                <section>  <?php 

                    if(!array_key_exists("btnContacto", $_POST)) {
                        include "pages/contacto.php"; 
                    }else{
                        include "pages/resultado.php";
                        $nombre= $_GET["nombre"] ?? "";
                        $email= $_GET["email"] ?? "";
                        $asunto= $_GET["asunto"] ?? "";
                        $mensaje= $_GET["mensaje"] ?? "";
                    } ?>

                </section>
            </main> <?php
            break;
        case "subida": ?>
        
            <main id="formulario"> 
                <section class="btnSubida">  <?php 
                
                    if(array_key_exists("btnSubirFichero", $_POST)) {

                        uploadfile("fichero");

                    }else{
                        include "pages/fichero.php";
                    } ?>

                </section>
            </main> <?php
            break;
        case "login": //Si no se han introducido bien los datos ?>

            <main id="formulario"> 
                <section class="btnSubida">  <?php 
                        
                        echo "$msgErrors"; 
                     ?>
                    

                </section>
            </main> <?php
            break;
        case "categorias": ?>
            <main id="formulario"> 
                <section> 
                    <?php 
                            
                            if(!array_key_exists("btnCategorias", $_POST)) {
                                include 'pages/categorias.php';
                                
                            } else{
                                
                                //.... obtener valores de post
                                $nombre = $_POST["nombre"] ?? "Sin Categoria";
                                if(saveCategoria(conectarBD(), ["nombre" => $nombre], $id)) {
                                    header("Location: index.php?p=categorias");
                                   
                                }
                            }
                        
                    ?>
                </section>
            </main> <?php
            break;
        case "noticias": ?>
            <main id="formulario"> 
                <section> 
                    <?php 
                            
                            if(!array_key_exists("btnNoticias", $_POST)) {
                                $categorias = getAllCategorias(conectarBD(), []);//Para el selector
                                include 'pages/noticias.php';
                                
                            } else{
                                
                                //.... obtener valores de post
                                $titulo = $_POST["titulo"] ?? "Sin Título";
                                $contenido = $_POST["contenido"] ?? "Sin Contenido";
                                $categoria = $_POST["cat"] ?? "Sin Categoría";
                                // Se almacenan en un array como clave => valor para su tratamiento en el save
                                $valores = ["titulo" => $titulo, 
                                                "contenido" => $contenido, 
                                                "idCategoria" => $categoria, 
                                                "autor" => strval(getUsername())];
                                if(saveNoticia(conectarBD(), $valores, $id)) {
                                    header("Location: index.php?p=noticias");
                                    
                                }
                            }
                        
                    ?>
                </section>
            </main> <?php
            break;
        default:
            break;
    }?>
</div>

<div> <?php include './inc/footer.php' ?></div>
    
</body>
</html>