<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
require_once('./4-Helpers/SessionHelper.php');

class AdminView{
    private $smarty;

    function __construct(){        
       $sessionHelper = new SessionHelper();
        $userLogged = $sessionHelper->getLoggedUser();

        $this->smarty = new Smarty();
        $this->smarty->assign('usuario',$userLogged);
    }

    function showUsers($users,$state,$rol,$mensaje){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign("users",$users);
        $this->smarty->assign("mensaje",$mensaje);
        
        $this->smarty->display("Templates/panelAdmin.tpl");
    }
}
    