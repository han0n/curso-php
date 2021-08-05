<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        //Ejercicio 1: Generar array de 10 números aleatorios

        $nums;
        for ($i =0; $i<=10; $i++){
            $nums[$i] = rand(0, 100);
            //echo $nums[$i], "<br>";
        }

        //De mayor a menor
        rsort($nums);

        //Muestra de mayor a menor
        /*
        foreach($nums as $num){
            echo $num, "<br>";
        }
        */
        print_r($nums); echo "<br>";

        echo "<br>";echo "<br>";
        //Función que comprueba según $b si es par o impar $a
        function comparacion($a, $b) {

            $aEsImpar = ($a % 2 != 0);
            $bEsImpar = ($b % 2 != 0);

            if($aEsImpar && !$bEsImpar) {
                return -1;
            } else if(!$aEsImpar && $bEsImpar){
                return 1;
            } else {
                return $a <=> $b;
            }
        }

        //De menor a mayor, primero impares y luego pares
        usort($nums, "comparacion");
        print_r($nums); echo "<br>";

        //Suma de todos los números
        array_sum($nums);

        echo "<br>";echo "<br>";

        //Muestra la suma
        echo "Sumatoria = ", array_sum($nums);

        //Ejercicio 2: Generar array de 10 nombres de personas

        $nombres = array(
            "María", "José", "Ana", "Pepe", "Manolo", "Juan", "Mario", "Julio", "Ernesto", "Antonio"
        );

        echo "<br>";echo "<br>";
        print_r($nombres); echo "<br>";

        //Encuentra la pos. de un elemento concreto
        echo "<br>";echo "<br>";
        print_r("Pepe se encuentra en la posición: ".array_search("Pepe", $nombres)); echo "<br>";

        //Ordena el array de forma aleatoria
        shuffle($nombres);
        echo "<br>";echo "<br>";
        print_r($nombres); echo "<br>";
        
        //Reemplaza el elemento de la pos 5 y añade dos nombres
        array_splice($nombres, 4, 1, array("Alberto", "Carlos"));
        echo "<br>";echo "<br>";
        print_r($nombres); echo "<br>";


        //Ejercicio 3: 

        $str ="manzana pera limón sandia melón";

        //De string a array
        $frutas = explode(" ", $str);
        echo "<br>";echo "<br>";
        print_r($frutas); echo "<br>";

        //Elimina índice 1 (pera)
        //unset($frutas[1]);
        array_splice($frutas, array_search("pera", $frutas), 0, array());

        //Añade al principio naranja
        //array_splice($frutas, 0, 0, array("naranja"));
        array_unshift($frutas, "naranja");

        //Añade al final mandarina
        array_push($frutas,"mandarina");
        echo "<br>";echo "<br>";
        print_r($frutas); echo "<br>";

        //De array a cadena
        $str2 = implode(" ", $frutas);
        echo "<br>";echo "<br>";
        print_r($str2); echo "<br>";

    ?> 
    
</body>
</html>