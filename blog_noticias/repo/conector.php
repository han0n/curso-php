<?php

    function conectarBD() {
        try {
            $conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        } catch(PDOException $ePDO) {
            echo 'ERROR. No se ha podido establecer una conexión con la Base de Datos.' . $ePDO->getMessage();
            die();
        }

        return $conexion;
    }