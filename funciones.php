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
        $num = 0;
        function isPar($num) :bool{
            if($num%2 == 0){
                return true;
            }else{
                return false;
            }
        }

        isPar($num)? 'es par': 'es impar';


        function cuadrado($num) :int{
            return $num**2;
        }

        function mesActual() :String{
            setlocale(LC_TIME, "es_ES");
            $mes = date("F");

            return $mes;
        }
        
        function mediaN(int ...$nums) :float{
            $total = count($nums);
            
            $suma = 0;
            for($i = 0; $i < $total; $i++ ){
                $suma = $nums[$i] + $suma;
            }

            return $suma / $total;
        }

        function iVA($precio, $iva=0.21){
            return $precio*0.21;

        }
        echo isPar(3) ? "Es par" : "Es impar ", "<br>";
        echo cuadrado(3), "<br>";
        echo mesActual(), "<br>";
        echo mediaN(0, 6, 0, 6, 0, 6), "<br>";
        echo mediaN(1, 2), "<br>";
        echo iVA(26);
    ?>
    
</body>
</html>