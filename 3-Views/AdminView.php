<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
require_once('./4-Hellpers/SessionHellper.php');

class AdminView{
    private $smarty;


    function __construct(){
        
       $sessionHellper = new SessionHellper();
        $userLogged = $sessionHellper->getLoggedUser();

        $this->smarty = new Smarty();
        $this->smarty->assign('usuario',$userLogged);
    }

    function showUsers($users,$state,$rol){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign("users",$users);
        $this->smarty->display("Templates/panelAdmin.tpl");

    }
}
    