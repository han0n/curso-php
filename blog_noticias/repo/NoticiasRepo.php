<?php

require_once "AbstractRepo.php";
require_once dirname(__FILE__) . "/../" . "models/Noticia.php";

class NoticiaRepo extends AbstractRepo{


    public function __construct(Conector $conexion) {
        parent::__construct($conexion, "noticias", Noticia::class);
        
    }

    function getAllNoticias():array {
        $sql = "SELECT * FROM {$this->tabla} ";
        
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    function getNoticiasByField($campos=[], int $nPage=1, int $nResultados=5):array {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
    
        $sql = "SELECT * FROM {$this->tabla} $subSql ";
        
        if($nPage>0) {
            $offset = ($nPage-1)*$nResultados;
            $sql.= " LIMIT $offset,$nResultados";
        }
    
        $stmt = $this->conexion->getConexion()->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
    
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function getCountNoticias($campos=[]):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(*) total $subSql FROM {$this->tabla} $subSql";
    
        $stmt = $this->conexion->getConexion()->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    function getCountNoticiasPorCategoria($campos=[], $cat):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(idCategoria) total $subSql FROM {$this->tabla} WHERE idCategoria = '$cat' ";
    
        $stmt = $this->conexion->getConexion()->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    function getNoticiasByPage(int $nPage=1, int $nResultados=5):array {
    
        $sql = "SELECT * FROM {$this->tabla} ";
        
        if($nPage>0) {
            $offset = ($nPage-1)*$nResultados;
            $sql.= " LIMIT $offset,$nResultados";
        }
    
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

  

}