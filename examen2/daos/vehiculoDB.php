<?php
namespace daos;

use \PDO as PDO;
use \Exception as Exception;
use daos\QueryType as QueryType;
use models\vehiculo as vehiculo;

class vehiculoDB 
{
    private $connection;

    public function __construct(){
    }

    public function create($vehiculo){
        //$sql = "INSERT INTO Usuarios (Nombre,Apellido,Email,Pass) VALUES (:Nombre,:Apellido,:Email,:Pass)";
    
        $values['Patente'] = $vehiculo->getPatente();
        $values['Marca'] = $vehiculo->getMarca();
        $values['Anio'] = $vehiculo->getAnio();
        $values['Titular'] = $vehiculo->getTitular();

        try{
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            return $this->connection->ExecuteNonQuery($sql,$values);
        }catch(\PDOExeption $ex){
            throw $ex;
        }
    }

    public function read($user){

        $sql = "SELECT * FROM Vehiculos v WHERE v.Titular = :email";

        $values['email'] = $user->getEmail();
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
        $sql = "SELECT * FROM Vehiculos";

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
    public function delete($patente){
        $sql = "DELETE FROM Vehiculos WHERE Vehiculos.Patente = :Patente";

        $values['Patente'] = $patente;

        try{
            $this->connection = Connection::getInstance();
            $this->connection->connect();
            return $this->connection->ExecuteNonQuery($sql,$values);
        }catch(\PDOExeption $ex){
            throw $ex;
        }
    }

    protected function Map($value) {
        $value = is_array($value) ? $value : [];
        $resp = array_map(function ($v) {
            return new vehiculo($v['Patente'], $v['Marca'], $v['Anio'], $v['Titular']);
        }, $value);
        return count($resp) > 1 ? $resp : $resp['0'];
    }
}

?>