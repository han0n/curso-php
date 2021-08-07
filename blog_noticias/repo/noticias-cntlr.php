<?php

    function getAllNoticias($con):array {
        $sql = "SELECT * FROM noticias ";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }

    function getNoticiasByField($con, $campos=[], int $nPage=1, int $nResultados=5):array {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
    
        $sql = "SELECT * FROM noticias $subSql ";
        
        if($nPage>0) {
            $offset = ($nPage-1)*$nResultados;
            $sql.= " LIMIT $offset,$nResultados";
        }
    
        $stmt = $con->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
    
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    function getCountNoticias($con, $campos=[]):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(*) total $subSql FROM noticias ";
    
        $stmt = $con->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    function getCountNoticiasPorCategoria($con, $campos=[], $cat):int {
        $subSql = "";
        if(count($campos)>0) {
            $subSql = "WHERE ";
            foreach($campos as $key => $campo) {
                $subSql.= " $key = :$key";
            }
        }
        $sql = "SELECT count(idCategoria) total $subSql FROM noticias WHERE idCategoria = '$cat' ";
    
        $stmt = $con->prepare($sql);
        if(count($campos)>0) {
            foreach($campos as $key => &$campo) {
                $stmt->bindParam($key, $campo);
            }
        }
        $stmt->execute();
    
        return $stmt->fetchColumn();
    }

    function getNoticiasByPage($con, int $nPage=1, int $nResultados=5):array {
    
        $sql = "SELECT * FROM noticias ";
        
        if($nPage>0) {
            $offset = ($nPage-1)*$nResultados;
            $sql.= " LIMIT $offset,$nResultados";
        }
    
        $stmt = $con->prepare($sql);
        $stmt->execute();
    
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    

    function saveNoticia($con, $campos, $id){
        if($id==null || $id==0) {
            return insert($con, "noticias", $campos);
        } else {
            return update($con, "noticias", $campos, $id);
        }
    }