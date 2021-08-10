<?php

class Conector{

    private $conexion;

    public function __construct(){
        $this->conectarBD();
    }

    public function __destruct(){
        $this->conexion = null;
    }

    function conectarBD() {
        try {
            $this->conexion = new PDO(DB_DSN, DB_USER, DB_PASS);
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        } catch(PDOException $ePDO) {
            echo 'ERROR. No se ha podido establecer una conexión con la Base de Datos.' . $ePDO->getMessage();
            die();
        }

    }

    function getConexion() {
        return $this->conexion;
    }
}