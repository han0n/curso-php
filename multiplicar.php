<?php
    echo "<table>";
    for($y=0; $y <= 10; $y++){
        echo "<tr>";
        for($x=1; $x < 10; $x++){
            echo "<th>";
            echo $x, "x", $y, "=", $y*$x;
            echo "</th>";

        }
        echo "</tr>";
    }
    echo "</table>";
?>