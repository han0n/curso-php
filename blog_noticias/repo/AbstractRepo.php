<?php

class AbstractRepo {

    protected $conexion;
    protected $tabla; 

    public function __construct(Conector $conector, string $tabla) {
        $this->conexion = $conector;
        $this->tabla = $tabla;
    }

    function getById(int $id) {
        $sql = "SELECT * FROM {$this->tabla} WHERE id = :id";
        $stmt = $this->conexion->getConexion()->prepare($sql);
        $stmt->bindParam("id", $id);
        
        $stmt->execute();
        
        return $stmt->fetch();
    }

    function delById(int $id):bool {
        $sql = "DELETE FROM {$this->tabla} WHERE id = $id";
        return $this->conexion->getConexion()->exec($sql);
    }
    
    function insert(array $campos):bool {
        $subSql = "";
        $i=0;
        foreach($campos as $key => $campo) {
            if($i!==0) {
                $subSql.= ", ";
            }
            $subSql.= " $key = :$key";
            
            $i++;
        }
        //$subsql = nombre = :nombre
        $sql = "INSERT INTO {$this->tabla} SET $subSql";  // UPDATE categorias SET nombre = :nombre WHERE id = :id
        $stmt = $this->conexion->getConexion()->prepare($sql);
    
        foreach($campos as $key => &$campo) {
            $stmt->bindParam($key, $campo);
        }
        
        return $stmt->execute();
    }

    function update(array $campos, int $id):bool {
        
        $subSql = "";
        $i=0;
        foreach($campos as $key => $campo) {
            if($i!==0) {
                $subSql.= ", ";
            }
            $subSql.= " $key = :$key";
            
            $i++;
        }
        //$subsql = nombre = :nombre
        $sql = "UPDATE {$this->tabla} SET $subSql WHERE id = :id";  // UPDATE categorias SET nombre = :nombre WHERE id = :id
        $stmt = $this->conexion->getConexion()->prepare($sql);
    
        foreach($campos as $key => &$campo) {
            $stmt->bindParam(":".$key, $campo);
        }
        $stmt->bindParam(":id", $id);
        
        return $stmt->execute();
    }

    function save($campos, $id){
        if($id==null || $id==0) {
            return $this->insert($campos);
        } else {
            return $this->update($campos, $id);
        }
    }

}