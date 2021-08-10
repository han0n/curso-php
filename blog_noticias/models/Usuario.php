<?php

class Usuario {
    private $nombre;
    private $clave;
    private $fechaConexion;
    
    public function __construct($clave="", $nombre="", $timestamp=1234567891){
        $this->setClave($clave);
        $this->setNombre($nombre);
        $this->setFechaConexion($timestamp);
    }

    
    public function setClave(string $clave) {
        $this->clave = $clave;
    }
    public function getClave():string {
        return $this->clave;
    }

    public function setFechaConexion(string $fechaConexion) {
        $this->fechaConexion = $fechaConexion;
    }


    public function getCamposToBBDD():array {
        return ["clave"=>$this->clave,"usuario"=>$this->nombre, "conexion"=>$this->fechaConexion];
    }

    public function getNombre():string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    
    public function __string(){
        $cadena = "Usuario: " . $this->nombre . " con clave: " . $this->clave ."<br>";
        return $cadena;
    }
}