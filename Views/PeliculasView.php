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


    function renderPeliculas($peliculas, $generos, $titulo , $state , $rol){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderGeneros($generos, $state, $rol){
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->display('templates/generosLista.tpl');
    }

    function renderGeneroUpdate($genero, $peliculas, $state, $rol){
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->display('templates/updateGenero.tpl');

    }

    function renderPelicula($pelicula,$generos, $state, $rol){
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('rol' , $rol);
        
        $this->smarty->display('templates/peliculaDetalle.tpl');
    }

    function renderPeliculaUpdate($pelicula, $generos, $state,$rol){
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);

        $this->smarty->display('templates/peliculaDetalle.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

}
