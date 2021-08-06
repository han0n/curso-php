<?php

    function compruebaLogin(PDO $conexion, $usuario, $pswd):bool {
        $sql = "SELECT * FROM usuarios WHERE usuario = :user AND clave = :pswd ";
        $st = $conexion->prepare($sql);

        $st->bindParam(":user", $usuario);
        $pswdHasheada = sha1($pswd);
        $st->bindParam(":pswd", $pswdHasheada);

        $st->execute();
        $userSt = $st->fetch();

        if($usuario!=null && $userSt["usuario"]==$usuario) {
            regUltimaConexion($conexion, $usuario);
            return true;
        }
        return false;
    }

    function regUltimaConexion(PDO $conexion, $usuario){
        $sql = "UPDATE usuarios SET conexion = :ultima WHERE usuario = :user";
        $st = $conexion->prepare($sql);
        $st->bindParam(":user", $usuario);
        $st->bindParam(":ultima", time());

        $st->execute();
        $userSt = $st->fetch();
       
    }

    function getUltimaConexion(PDO $conn, $usuario):string{
        
        $q= $conn->prepare("SELECT conexion FROM usuarios WHERE usuario=? ");
        $q->execute([$usuario]);
        $ultima = $q->fetchColumn();

        return date('l dS \o\f F Y h:i:s A', $ultima);
        //return $ultima;
    }