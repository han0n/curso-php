<?php

class Categoria {
    private $nombre;
    private $id;
    
    public function __construct($id=0, $nombre=""){
        $this->setId($id);
        $this->setNombre($nombre);
    }

    
    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId():int {
        return $this->id;
    }

    public function getCamposToBBDD():array {
        return ["id"=>$this->id,"nombre"=>$this->nombre];
    }

    public function getNombre():string {
        return $this->nombre;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    
    public function __string(){
        $cadena = "Categoría: " . $this->nombre . " con id: " . $this->id . "<br>";
        return $cadena;
    }
}