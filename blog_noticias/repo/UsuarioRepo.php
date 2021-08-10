<?php

require_once "AbstractRepo.php";
require_once dirname(__FILE__) . "/../" . "models/Usuario.php";

class UsuarioRepo extends AbstractRepo{


    public function __construct(Conector $conexion) {
        parent::__construct($conexion, "usuarios", Usuario::class);
        
    }

    function compruebaLogin($usuario, $pswd):bool {
        $sql = "SELECT * FROM usuarios WHERE usuario = :user AND clave = :pswd ";
        $st = $this->conexion->getConexion()->prepare($sql);

        $st->bindParam(":user", $usuario);
        $pswdHasheada = sha1($pswd);
        $st->bindParam(":pswd", $pswdHasheada);

        $st->execute();
        $userSt = $st->fetch();

        if($usuario!=null && $userSt["usuario"]==$usuario) {
            $this->regUltimaConexion($usuario);
            return true;
        }
        return false;
    }

    function regUltimaConexion($usuario){
        $sql = "UPDATE usuarios SET conexion = :ultima WHERE usuario = :user";
        $st = $this->conexion->getConexion()->prepare($sql);
        $st->bindParam(":user", $usuario);
        $st->bindParam(":ultima", time());

        $st->execute();
        $userSt = $st->fetch();
       
    }

    function getUltimaConexion($usuario):string{
        
        $q= $this->conexion->getConexion()->prepare("SELECT conexion FROM usuarios WHERE usuario=? ");
        $q->execute([$usuario]);
        $ultima = $q->fetchColumn();

        return date('d \d\e F Y \a \l\a\s h:i', $ultima);
        //return $ultima;
    }
}