<?php
class SessionHelper{
    function __construct(){
    }

    function login($user){
        session_start();
        $_SESSION["usuario"] = $user->usuario;                
        $_SESSION["rol"] = $user->rol;
    }

    function logout() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        session_destroy();
    }

    function checkLoggedIn() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['usuario'])) {
            header('Location: ' . BASE_URL);
            die();
        }
        session_destroy();       
    }

    function getLoggedUser() {
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION['usuario']))
            return $_SESSION['usuario'];
        return null;
    }

    function isLogged(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if (isset($_SESSION['usuario'])){
            return true;
        }else{
            return false;
        }        
    }

    function showRol(){
        if (session_status() != PHP_SESSION_ACTIVE)
            session_start();
        if(isset($_SESSION["usuario"])){
            return $_SESSION["rol"];
        }     
        return;        
    }
}