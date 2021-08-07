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

    function getById(PDO $con, string $tabla, int $id) {
        $sql = "SELECT * FROM $tabla WHERE id = :id";
        $stmt = $con->prepare($sql);
        $stmt->bindParam("id", $id);
        
        $stmt->execute();
        
        return $stmt->fetch();
    }

    function delById(PDO $con, string $tabla, int $id):bool {
        $sql = "DELETE FROM $tabla WHERE id = $id";
        return $con->exec($sql);
    }

    /*function update($con, $valor, $tabla, $id):bool {
        $sql = "UPDATE $tabla SET nombre = :nombre WHERE id = :id ";
        $stmt = $con->prepare($sql);
    
        $stmt->bindParam("nombre", $valor);    
        $stmt->bindParam("id", $id);    
        return $stmt->execute();
    }*/
    
    function insert(PDO $con, string $tabla, array $campos):bool {
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
        $sql = "INSERT INTO $tabla SET $subSql";  // UPDATE categorias SET nombre = :nombre WHERE id = :id
        $stmt = $con->prepare($sql);
    
        foreach($campos as $key => &$campo) {
            $stmt->bindParam($key, $campo);
        }
        
        return $stmt->execute();
    }

    function update(PDO $con, string $tabla, array $campos, int $id):bool {
        
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
        $sql = "UPDATE $tabla SET $subSql WHERE id = :id";  // UPDATE categorias SET nombre = :nombre WHERE id = :id
        $stmt = $con->prepare($sql);
    
        foreach($campos as $key => &$campo) {
            $stmt->bindParam(":".$key, $campo);
        }
        $stmt->bindParam(":id", $id);
        
        return $stmt->execute();
    }

    