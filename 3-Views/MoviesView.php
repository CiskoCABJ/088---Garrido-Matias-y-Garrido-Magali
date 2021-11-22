<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
require_once('./4-Hellpers/SessionHellper.php');
class MoviesView{

    private $smarty;

    function __construct(){
        $sessionHellper = new SessionHellper();
        $userLogged = $sessionHellper->getLoggedUser();

        $this->smarty = new Smarty();
        $this->smarty->assign('usuario',$userLogged);

    }

    function renderGeneros($generos, $titulo, $state, $rol, $mensaje){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('mensaje',$mensaje);

        $this->smarty->display('Templates/generosLista.tpl');
    }

    function renderGeneroUpdate($genero, $peliculas, $state, $rol){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('genero', $genero);
        $this->smarty->assign('peliculas', $peliculas);

        $this->smarty->display('Templates/updateGenero.tpl');

    }

    function showLocation($location){
        header("Location: ".BASE_URL.$location);
    }
    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

    function renderPeliculas($peliculas, $generos, $titulo , $state , $rol,$mostrarDesde,$pagina,$paginas){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('titulo', $titulo);
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('desde', $mostrarDesde);
        $this->smarty->assign('pagina', $pagina);
        $this->smarty->assign('paginas', $paginas);

        $this->smarty->display('Templates/peliculasLista.tpl');
    }


    function renderPelicula($pelicula,$generos, $state, $rol){ 
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('generos', $generos);
        
        $this->smarty->display('Templates/peliculaDetalle.tpl');
    }

    function renderPeliculaUpdate($pelicula, $generos, $state,$rol){
        $this->smarty->assign('state' , $state);
        $this->smarty->assign('rol' , $rol);
        $this->smarty->assign('pelicula', $pelicula);
        $this->smarty->assign('generos', $generos);

        $this->smarty->display('Templates/peliculaDetalle.tpl');
    }
}