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
        $this->setCategoriaId($categoria);
    }

    public function getToBD():array {
        $campos = [
            "titulo"=>$this->titulo, 
            "contenido"=>$this->contenido,
            "autor"=>$this->autor,
            "idCategoria" => $this->categoria
        ];

        return $campos;
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
    public function getFechaPublicacion(): int {
        return $this->fechaPublicacion;
    }
    public function getCategoriaId():int {
        return $this->categoria;
    }

    public function setId(int $id) {
        $this->titulo = $id;
    }
    public function setTitulo(string $titulo) {
        $this->titulo = $titulo;
    }
    public function setContenido(string $contenido) {
        $this->contenido = $contenido;
    }
    public function setFechaPublicacion(?int $fechaPublicacion) {
        $this->fechaPublicacion = $fechaPublicacion;
    }
    public function setAutor(string $autor) {
        $this->autor = $autor;
    }
    
    public function setCategoriaId($categoria) {
        $this->categoria = $categoria;
    }

    public function __string(){
        $cadena = $this->titulo . " redactada por: " . $this->autor . " a las: ". 
            date('h:i \e\l d \d\e F Y ', $this->fechaPublicacion) . "<br>";
        return $cadena;
    }

    
}