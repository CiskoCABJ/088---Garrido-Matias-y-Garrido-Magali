<?php

class LoginView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLogin($error=""){
        $this->smarty->assign('titulo', 'Log In');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/login.tpl');

    }

    function showRegister($error=""){
        $this->smarty->assign('titulo', 'Crear cuenta');
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/register.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
    
}