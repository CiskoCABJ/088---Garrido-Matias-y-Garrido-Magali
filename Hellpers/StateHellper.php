<?php
class StateHellper{
    function __construct(){
    }

    function showState(){
        session_start();
        if(!isset($_SESSION["usuario"])){
            return "login";
        }else{
      
            return "logout";
        } 
    }
}