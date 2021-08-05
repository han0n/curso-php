<?php
    $lista = array();
    $fichero= "resultado_busqueda.csv";

    if(file_exists($fichero)) {
        $fichPasado = fopen($fichero, "r");
        while( ($datos = fgetcsv($fichPasado)) !== false ){
            array_push($lista, $datos);
        }

        fclose($fichPasado);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table { width: 50vw; margin-left:25vw; margin-right: 25vw; padding-top:10px}
        table td { padding:5px 5px; border: solid 1px;}
        table th { border: solid 1px; background-color: #aaddff;}

        table tr:nth-child(2n-1) {
            background-color: #dfdfdf;
        }
        #enlace{
            width:5vw;
            text-align: center;
        }   
    </style>
</head>
<body>
    <table>
        <?php 
        $i=0;
        foreach($lista as $item) {?>
            <tr>
                <?= $i==0 ? "<th>" : "<td>" ?>
                <?= $item[0] ?>
                <?= $i==0 ? "</th>" : "</td>" ?>
                
                <?= $i==0 ? "<th >" : "<td>" ?>
                <?= $item[2] ?>
                <?= $i==0 ? "</th>" : "</td>" ?>

                <?= $i==0 ? "<th >" : "<td id=\"enlace\">" ?>
                <?= $i==0 ? $item[1] : "<a href='{$item[1]}'>Pincha aquí</a>" ?>
                <?= $i==0 ? "</th>" : "</td>" ?>
            </tr>
        <?php 
            $i++;
        } ?>
    </table>
</body>
</html>