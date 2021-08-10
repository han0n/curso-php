<?php

require_once "AbstractRepo.php";
require_once dirname(__FILE__) . "/../" . "models/Categoria.php";

class CategoriaRepo extends AbstractRepo{


    public function __construct(Conector $conexion) {
        parent::__construct($conexion, "categorias", Categoria::class);
        
    }

    function getAllCategorias():array {
        $sql = "SELECT * FROM {$this->tabla} ";
        
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getCountCategorias($campos=[]):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(*) total $subSql FROM {$this->tabla} ";
    
        $stmt = $this->conexion->getConexion()->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchColumn();
    }

    function getCategoriasByPage(int $nPage=1, int $nResultados=5):array {
    
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

    