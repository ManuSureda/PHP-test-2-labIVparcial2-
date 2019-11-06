<?php
namespace daos;

use \PDO as PDO;
use \Exception as Exception;
use daos\QueryType as QueryType;
use models\usuario as usuario;

class usuarioDB 
{
    private $connection;

    public function __construct(){
    }

    public function create($user){
        $sql = "INSERT INTO Usuarios (Nombre,Apellido,Email,Pass) VALUES (:Nombre,:Apellido,:Email,:Pass)";
    
        $values['Nombre'] = $user->getNombre();
        $values['Apellido'] = $user->getApellido();
        $values['Email'] = $user->getEmail();
        $values['Pass'] = $user->getPass();

        try{
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            return $this->connection->ExecuteNonQuery($sql,$values);
        }catch(\PDOExeption $ex){
            throw $ex;
        }
    }

    public function read($Uemail){

        $sql = "SELECT * FROM Usuarios u WHERE u.Email = :email";

        $values['email'] = $Uemail;
        try{
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            $result = $this->connection->Execute($sql,$values);
        }catch(\PDOException $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->Map($result);
        }else{
            return false;
        }
    }
    public function readAll(){
        $sql = "SELECT * FROM Usuarios";

        try{
            $this->connection = Connection ::getInstance();
            $result = $this->connection->Execute($sql);
        }catch(\PDOExeption $ex){
            throw $ex;
        }
        if(!empty($result)){
            return $this->Map($result);
        }else{
            return false;
        }
    }
    public function update($user){

    }
    public function delete($user){
        
    }

    protected function Map($value) {
        $value = is_array($value) ? $value : [];
        $resp = array_map(function ($u) {
            return new usuario($u['Nombre'], $u['Apellido'], $u['Email'], $u['Pass']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}

?>