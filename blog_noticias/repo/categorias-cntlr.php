<?php

    function getAllCategorias($con):array {
        $sql = "SELECT * FROM categorias ";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }