<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
require_once('./Hellpers/SessionHellper.php');
class GenerosView{

    private $smarty;

    function __construct(){
        $sessionHellper = new SessionHellper();
        $userLogged = $sessionHellper->getLoggedUser();

        $this->smarty = new Smarty();
        $this->smarty->assign('usuario',$userLogged);
    }

    function renderGeneros($generos, $titulo, $state, $rol){
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('titulo', $titulo);

        $this->smarty->display('Templates/generosLista.tpl');
    }

    function renderGeneroUpdate($genero, $peliculas, $state, $rol){
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->display('Templates/updateGenero.tpl');

    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }
}