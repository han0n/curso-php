<?php
 $content = file_get_contents("https://www.google.com/search?q=Desarrollo+web");
 $contentF = mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8, ISO-8859-1');
 //echo $contentF;

 $salida = [];
 $salida = array();
 $patron = '/<div class="kCrYT"><a href="\/url\?q=([^"&]+).*?"><h3 class="zBAuLc"><div class="BNeawe vvjwJb AP7Wnd">([\w .,&;:(\/|+)?!-]+)<\/div><\/h3><div class="BNeawe UPmit AP7Wnd">[\w. &#;\/|-]+<\/div><\/a><\/div><div class="x54gtf"><\/div><div class="kCrYT">((<div><div class="BNeawe s3v9rd AP7Wnd"><div><div><div class="BNeawe s3v9rd AP7Wnd">(<span .*<\/span>&iquest;)*([\w .,&;:(\/|+)?!-]+))|<a.*<span class="r0bn4c rQMQod"> &middot; <\/span>([^<]+))*/';
 preg_match_all($patron, $contentF, $salida);

$arr2csv = array();
array_push($arr2csv, array("Título", "Enlace", "Descripción"));
for($i=0; $i<count($salida[0]);$i++){
    echo "Título: ".$salida[2][$i]."<br>";
    echo "Enlace: ".$salida[1][$i]."<br>";

    
    if(!$salida[7][$i]){
        echo "Descripción: ".$salida[6][$i]."<br><br>";  
        array_push($arr2csv, array($salida[2][$i], $salida[1][$i], $salida[6][$i]));
    }else{
        echo "Descripción: ".$salida[7][$i]."<br><br>";  
        array_push($arr2csv, array($salida[2][$i], $salida[1][$i], $salida[7][$i]));
    }
    

    

    
    
    
}

echo "<br><br>";
echo "<pre>";
print_r($arr2csv);
echo "<pre>";

$fid = fopen("resultado_busqueda.csv", "w");
foreach($arr2csv as $row){
    fputcsv($fid, $row);
}
fclose($fid);

?>
