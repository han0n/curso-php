<?php

    function getAllCategorias($con):array {
        $sql = "SELECT * FROM categorias ";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    function getCountCategorias($con, $campos=[]):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(*) total $subSql FROM categorias ";
    
        $stmt = $con->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        //$stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchColumn();
    }

    function getCategoriasByPage($con, int $nPage=1, int $nResultados=5):array {
    
        $sql = "SELECT * FROM categorias ";
        
        if($nPage>0) {
            $offset = ($nPage-1)*$nResultados;
            $sql.= " LIMIT $offset,$nResultados";
        }
    
        $stmt = $con->prepare($sql);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function saveCategoria($con,  $campos,$id){
        if($id==null || $id==0) {
            return insert($con, "categorias", $campos);
        } else {
            return update($con, "categorias", $campos, $id);
        }
    }