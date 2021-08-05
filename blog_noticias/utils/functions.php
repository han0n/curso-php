<?php
function isUserLogged():bool {
    return array_key_exists("usuario", $_SESSION) && $_SESSION["usuario"]!=="";
}

function getUsername():string {
    if(isUserLogged()) {
        return $_SESSION["usuario"];
    } else {
        return "";
    }
}

function uploadfile(string $inputname):string {
    $filename = $_FILES[$inputname]["name"];
    $filetype = $_FILES[$inputname]["type"];
    $isValid = false;
    if(!$_FILES[$inputname]["error"] && is_uploaded_file($_FILES["fichero"]["tmp_name"])) {
        //comprobamos condiciones extra. Tema de tamaño maximo o extensiones/formatos
        if(true) {
            $isValid = true;
        }

        $path2upload = "././" . "/uploads/".date("n")."/";
        if(!file_exists($path2upload)){
            mkdir($path2upload, 0777, true);
        }
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        $filenameSave = time()."_".slugify($filename).".".$extension;
        echo "Subido con éxito: $path2upload$filenameSave";
        if(move_uploaded_file($_FILES[$inputname]["tmp_name"], $path2upload.$filenameSave)) {
            return $path2upload.$filenameSave;
        } 
    }

    return "";
}



function slugify($text) {
    // Strip html tags
    $text = strip_tags($text);
    // Replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // Transliterate
    setlocale(LC_ALL, 'en_US.utf8');
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // Remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // Trim
    $text = trim($text, '-');
    // Remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // Lowercase
    $text = strtolower($text);
    // Check if it is empty
    if (empty($text)) {
        return 'n-a';
    }
    // Return result
    return $text;
}