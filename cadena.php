<?php

    $texto = <<<EOF
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur iaculis placerat maximus. Sed fermentum
    eu velit nec sollicitudin. Morbi varius bibendum rutrum. Suspendisse in egestas sem. Etiam varius
    vestibulum arcu, vel euismod magna sagittis eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
    Mauris pretium neque eros. ** Mauris nec erat nec lacus accumsan ullamcorper. **
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et vehicula odio. Etiam gravida sit amet
    mauris sed lobortis. ** Curabitur imperdiet nisl magna, quis hendrerit velit rutrum vitae. ** Pellentesque
    interdum libero nec risus cursus faucibus.
    EOF;
    

    /* EJERCICIO 1 */
    //script que nos indique la posición en la que se encuentra la palabra “Lorem”
    echo "Lorem está en la posición: ", stripos($texto, "Lorem");


    /* EJERCICIO 2 */
    //una función capaz de contar el número de palabras de un texto dado
    function contarPalabras(string $texto): int{
        $textoArray = explode(" ", $texto);
        
        $contador =0;
        foreach($textoArray as $palabra){
            if ($palabra = '[\w]'){
                $contador++;
            }
        }

        return $contador;
    };

    echo "<br><br>";
    echo  "En el texto hay un total de: ", contarPalabras($texto), " palabras.";


    /* EJERCICIO 3 */
    // función capaz de contar el número de caracteres de un texto dado
    //strlen(string $string): int
    function contarCaracteres(string $texto): int{

        return strlen($texto);

    };

    echo "<br><br>";
    echo  "En el texto hay un total de: ", contarCaracteres($texto), " caracteres.";


    /* EJERCICIO 4 */
    // función capaz de contar el número de caracteres de un texto dado
    //strlen(string $string): int
    function cambioVocal(string $texto): string{

        $vocales = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U"];
        
        $textoCopia = "";

        for($i=0 ; $i<strlen($texto) ;$i++){

            $caracter = substr($texto, $i, 1);
            $contieneVocal=false;

            for($z=0; $z<count($vocales); $z++){

                if($caracter == $vocales[$z]){
                    $textoCopia .= "#";
                    //substr_replace($texto, '#', $i, 0);

                    $contieneVocal=true;
                } 
                
            }

            if($z == count($vocales) && $contieneVocal==false){
                $textoCopia .= $caracter;
            }

            $caracter = "";
        }

        return $textoCopia;

    };

    echo "<br><br>";
    echo cambioVocal($texto);


    /* EJERCICIO 5 */
    //función que da un array con el numero de ocurrencias de cada palabra en el texto. 
    //Ordenando de más frecuencia a menos y alfabéticamente.
    function palabrasOcurrencia(string $texto): array{

        $textoPalabras = preg_replace('/[^A-Za-z]/', ' ', $texto);
        
        $textoPalabritas = strtolower($textoPalabras);
        
        $palabrasArray = explode(" ", $textoPalabritas);

        for($i=0; $i<count($palabrasArray); $i++){//Recorre todo

            $ocurrencia=0;
            //Recorre según i todo para comprar e ir recogiendo cuantas veces se repite $i
            for($z=0; $z<count($palabrasArray); $z++){
                if($palabrasArray[$i] == $palabrasArray[$z]){
                    $ocurrencia++;
                }
                
            }

            $palabra = $palabrasArray[$i];

            if($palabra != ""){//Para quitar los espacios que se han contado
                $clavesValor[$palabra] = $ocurrencia;
            }
                
            
        }

        

        //Ordenar según num ocurrencias:
        //1º Determinar el valor máximo de num ocurr. de una key palabra:
        $i=0;
        $palabraMayor="";
        foreach($clavesValor as $clave=>$valor){
            if($i==0){
                $ocurrPalabraMayor = $valor;
            }
            if($i>0){
                if($ocurrPalabraMayor<$valor){
                    $ocurrPalabraMayor = $valor;
                }
            }

            $i++;//Para saber que no es la primera vez que se entra al bucle

        }//Aquí sacamos el valor de la máxima ocurrencia

        //2º Ordenar por num de ocurrencia y hacer un ksort al ordenamiento según valor actual:
        $i=0;//Se veleve a resetear para usarla de nuevo
        do{//Se ejecutará hasta que el valor de $ocurrPalabraMayor sea igual a 0
            
            if($i==0){
                foreach($clavesValor as $clave=>$valor){

                    if($ocurrPalabraMayor==$valor){
                        $segunOcurrencias[$clave] = $valor;
                    }
                }

                ksort($segunOcurrencias);//una vez añadidas las de 4, las ordena según clave
            }//Si es la primera vuelta, el valor mayor es el encontrado antes
            
            if($i>0){
                
                $ocurrPalabraMayor--;//Se baja la ocurrencia

                foreach($clavesValor as $clave=>$valor){

                    if($ocurrPalabraMayor==$valor){
                        $segunOcurrencias2[$clave] = $valor;
                    }
                    
                }

                if(isset($segunOcurrencias2)){//Por si no hay ocurrs. con valor consec.
                    // a $ocurrPalabraMayor para cuando decrementa $ocurrPalabraMayor--;

                    ksort($segunOcurrencias2);//Una vez añadidas las de n<4, las ordena según clave
                    $segunOcurrencias = array_merge($segunOcurrencias, $segunOcurrencias2);
                    //Las añade a segúnOcurrencias

                }
                
                
            }//Si son las siguientes, se va bajando y comparando

            $i++;//Para saber que no es la primera vez que se entra al bucle
                  
        }while($ocurrPalabraMayor>0);

        

        
            
        

        return $segunOcurrencias;

    };

    echo "<br><br>";
    print_r(palabrasOcurrencia($texto));


    /* EJERCICIO 6 */
    // función capaz de eliminar el texto contenido entre los marcadores **
    function eliminar(string $texto): string{

        $marcador = "*";
        
        $textoCopia = "";

        for($i=0 ; $i<strlen($texto) ;$i++){

            $caracter = substr($texto, $i, 1);

            if($caracter == $marcador){//Se comprueba si hay asterísco
                $i++;
                $caracter = substr($texto, $i, 1);

                if($caracter == $marcador){//Se comprueba si hay doble asterísco
                    do{
                        $i++;
                        $caracter = substr($texto, $i, 1);
                    }while ($caracter != $marcador);

                }else{
                    $i--;//para que no se coma un posible espacio u otro carácter
                    //después de comprobar un segundo asterísco
                }

            }else{
                $textoCopia .= $caracter;
            }

        }

        return $textoCopia;

    };

    echo "<br><br>";
    echo eliminar($texto);

