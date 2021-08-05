<?php

    function resizeImg($ruta, $ancho, $alto){ 

        //Se obtiene el ancho y alto originales
        list($ancho_, $alto_) = getImageSize($ruta);
        $lienzo= imageCreateTrueColor($ancho, $alto);

        
        $escaladoX = $ancho / $ancho_;
        $escaladoY = $alto / $alto_;
        //El de menor valor será el factor de reescalado
        $escalado = ($escaladoX < $escaladoY) ? $escaladoX : $escaladoY;

        //Reescalado del ancho y el alto
        $anchoR = $ancho_ * $escalado;
        $altoR = $alto_ * $escalado;

        //Los márgenes para el lienzo destino
        $x = ($ancho - $anchoR) / 2;
        $y = ($alto - $altoR) / 2;

        $extension = mime_content_type($ruta);

        switch($extension){
            case 'image/jpeg':
                $imagen_ = imageCreateFromJpeg( $ruta );
                break;
            case 'image/png':
                $imagen_ = imageCreateFromPng( $ruta );
                break;    
        }
        //Copia de la imagen remuestrada en el lienzo destino
        //con el factor de reescalado aplicados a alto y largo
        //y el comienzo del pintado de la imagen origen según $x, $y
        imageCopyResampled( 
            $lienzo,
                                    $imagen_, 
            $x, $y, 
                                    0, 0, 
            $anchoR, $altoR, 
                                    $ancho_, $alto_);

        //Genera enlace/uri de la imagen generada
        ob_start();
            imagePng($lienzo, null, 9);
            $contenido = ob_get_contents();
        ob_end_clean();

        $uri = "data:image/png;base64," . base64_encode($contenido);  

        //importante
        imageDestroy($imagen_);
        imageDestroy($lienzo);

        return $uri;
    }
?>

<h1>Kirby.png 1280x500</h1>
<img src="<?=resizeImg("Kirby.png", 1280, 500)?>"/>
<h1>Kirby.png 600x400</h1>
<img src="<?=resizeImg("Kirby.png", 600, 400)?>">
<h1>Kirby.png 300x600</h1>
<img src="<?=resizeImg("Kirby.png", 300, 600)?>">

<h1>Keanu.jpg 1280x500</h1>
<img src="<?=resizeImg("Keanu.jpg", 1280, 500)?>">
<h1>Keanu.jpg 600x400</h1>
<img src="<?=resizeImg("Keanu.jpg", 600, 400)?>">
<h1>Keanu.jpg 300x600</h1>
<img src="<?=resizeImg("Keanu.jpg", 300, 600)?>">
