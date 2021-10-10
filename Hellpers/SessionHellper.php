<?php
class SessionHellper{
    function __construct(){
       
    }


    function login($user){
        session_start();
        $_SESSION["usuario"] = $user->usuario;                
        $_SESSION["rol"] = $user->rol;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function checkLoggedIn() {
        session_start();
        if (!isset($_SESSION['usuario'])) {
            header('Location: ' . LOGIN);
            die();
        }       
    }

    public function getLoggedUserName() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        return $_SESSION['usuario'];
    }



    function showState(){
        session_start();
        if (isset($_SESSION['usuario'])){
            return "Logout";
        }else{
            return "Login";
        }
        
    }
    function showRol(){
       
        if(isset($_SESSION["usuario"])){
            return $_SESSION["rol"];
        }     
        return ;
        
    }
}