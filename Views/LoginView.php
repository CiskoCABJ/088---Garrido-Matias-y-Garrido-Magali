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
}