<?php
namespace controllers;
use interfaces\crud as crud;
use models\usuario as usuario;
use daos\usuarioDB as usuarioDB;
use controllers\vehiculoC as vehiculoC;
use controllers\home as home;

class User implements crud {

    public function __construct(){
    }

    public function index(){
        include(VIEWS."/login.php");
    }
 
    public function create($user){
        $db = new usuarioDB();
        $db->create($user);
    }
    public function read($email){
        $db = new usuarioDB();
        return $db->read($email);
    }
    public function readAll(){
        $db = new usuarioDB();
        $db->readAll();
    }
    public function update($user){

    }
    public function delete($user){

    }

    public function setLogIn($user){
        if(!isset($_SESSION)){
            session_start();
        }
        $_SESSION['status'] = 'on';
        $_SESSION['userLoged'] = $user;
        
    }

    public function logIn($email,$pass){
        $db = new usuarioDB();
        $user = $this->read($email);
        if(!empty($user) && $user->getPass() == $pass){
            $this->setLogIn($user);
            $homeController = new home();
            $homeController->index($user);
            
        }else{
            $errorMSG = "usuario o contraseña incorrecto";
            include(VIEWS."/login.php");
        }
    }

}

?>