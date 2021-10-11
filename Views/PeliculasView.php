<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
require_once('./Hellpers/SessionHellper.php');
class PeliculasView{

    private $smarty;

    function __construct(){
      
        $sessionHellper = new SessionHellper();
        $userLogged = $sessionHellper->getLoggedUser();

        $this->smarty = new Smarty();
        $this->smarty->assign('usuario',$userLogged);


    }

    function renderHome($peliculas, $state, $rol){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        
        $this->smarty->assign('titulo', "Estrenos");
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderPeliculas($peliculas, $state,$rol){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->assign('titulo', "Peliculas");

        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderGeneros($generos, $state){
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);

        $this->smarty->display('templates/generosLista.tpl');
    }

    function renderPelicula($pelicula,$generos, $state){
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('generos', $generos);
        
        $this->smarty->display('templates/peliculaDetalle.tpl');
    }

    function renderPeliculaUpdate($pelicula, $generos, $state){
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);

        $this->smarty->display('templates/peliculaUpdate.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

}
