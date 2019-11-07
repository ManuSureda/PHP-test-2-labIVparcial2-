<?php
namespace controllers;
use interfaces\crud as crud;
use controllers\vehiculoC as vehiculoC;

class Home implements crud {
    
    public function __construct(){
    }

    public function index($user){
        $vehiculoController = new vehiculoC();
        $userLoged = $user;
        $array = $vehiculoController->read($user);

        if($array){
            if(!is_array($array)){
                $vehiculoList[] = $array;
            }else{
                $vehiculoList = $array;
            }
        }else{
            $vehiculoList = array();
        }
        

        var_dump($vehiculoList);
        include(VIEWS."/misVehiculos.php");
    }
 
    public function create($user){

    }
    public function read($user){

    }
    public function readAll(){

    }
    public function update($user){

    }
    public function delete($user){
        
    }
}

?>