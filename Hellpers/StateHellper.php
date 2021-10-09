<?php
class StateHellper{
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
}