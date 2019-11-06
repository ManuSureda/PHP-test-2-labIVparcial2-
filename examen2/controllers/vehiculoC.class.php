<?php
namespace controllers;
use interfaces\crud as crud;
use models\usuario as usuario;
use models\vehiculo as vehiculo;
use daos\usuarioDB as usuarioDB;
use daos\vehiculoDB as vehiculoDB; 

class vehiculoC implements crud {

    public function __construct(){
    }

    public function index(){
        //include(VIEWS."/login.php");
    }
 
    public function create($user){
        // $db = new usuarioDB();
        // $db->create($user);
    }
    public function read($user){
        $db = new vehiculoDB();
        
        $result = $db->read($user);
        
        return $result;
    }
    public function readAll(){
        // $db = new usuarioDB();
        // $db->readAll();
    }
    public function update($user){

    }
    public function delete($patente){
        $db = new vehiculoDB();
        $db->delete($patente);
        $homeController = new home();
        if(!isset($_SESSION)){
            session_start();
        }
        $user = $_SESSION['userLoged'];
        $homeController->index($user);
    }

}

?>