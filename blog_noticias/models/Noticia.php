<?php

require_once 'Categoria.php';

class Noticia {
    private $id;
    private $titulo;
    private $contenido;
    private $autor;
    private $fechaPublicacion;
    private $categoria;
    
    public function __construct($id=0, $titulo="", $contenido="", $autor="", $fechaPublicacion=null, $categoria=null){
        $this->setId($id);
        $this->setTitulo($titulo);
        $this->setContenido($contenido);
        $this->setAutor($autor);
        $this->setFechaPublicacion($fechaPublicacion);
        $this->setCategoria($categoria);
    }

    public function getCamposToBBDD():array {
        $campos = [
            "id"=> $this->id,
            "titulo"=>$this->titulo, 
            "contenido"=>$this->contenido,
            "autor"=>$this->autor,
            "fechaPublicacion" => $this->fechaPublicacion,
            "idCategoria" => $this->getCategoria()->getId()
        ];

        return $campos;
    }

    public function setId(int $id) {
        $this->id = $id;
    }
    public function getId():int {
        return $this->id;
    }
    
    public function getTitulo():string {
        return $this->titulo;
    }
    public function getContenido():string {
        return $this->contenido;
    }
    public function getAutor():string {
        return $this->autor;
    }
    public function getFechaPublicacion() {
        return $this->fechaPublicacion;
    }
    public function getCategoria():Categoria {
        return $this->categoria;
    }

    public function setTitulo(string $titulo) {
        $this->titulo = $titulo;
    }
    public function setContenido(string $contenido) {
        $this->contenido = $contenido;
    }
    public function setAutor(string $autor) {
        $this->autor = $autor;
    }
    public function setFechaPublicacion($fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }
    public function setCategoria(?Categoria $categoria) {
        $this->categoria = $categoria ?? new Categoria();
    }

    public function __string(){
        $cadena = $this->titulo . " redactada por: " . $this->autor . " a las: ". 
            date('h:i \e\l d \d\e F Y ', $this->fechaPublicacion) . "<br>";
        return $cadena;
    }

    
}