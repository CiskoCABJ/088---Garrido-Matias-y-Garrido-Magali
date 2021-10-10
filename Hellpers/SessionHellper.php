<?php
class SessionHellper{
    function __construct(){
    }

    function showState(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            return "Login";
        }else{
      
            return "Logout";
        } 
    }

    function showRol(){
        session_start();
        if(isset($_SESSION["usuario"])){
            return $_SESSION["rol"];
        }     
        return ;
        
    }
}