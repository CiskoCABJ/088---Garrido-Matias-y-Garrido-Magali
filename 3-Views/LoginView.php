<?php

require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');

class LoginView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($state, $error=""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('state' , $state);     

        $this->smarty->display('templates/login.tpl');
    }

    function showRegister($state,$error=""){
        $this->smarty->assign('titulo', 'Crear cuenta');
        $this->smarty->assign('error', $error);
        $this->smarty->assign('state' , $state); 

        $this->smarty->display('templates/register.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
      
    }
}