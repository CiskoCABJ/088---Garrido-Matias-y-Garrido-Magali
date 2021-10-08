<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
class PeliculasView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderHome($peliculas, $state){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);
        
        $this->smarty->assign('titulo', "Estrenos");
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderPeliculas($peliculas, $state){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('state' , $state);

        $this->smarty->assign('titulo', "Peliculas");
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderGeneros($generos, $state){
        $this->smarty->assign('generos', $generos);
        $this->smarty->assign('state' , $state);

        $this->smarty->display('templates/generosLista.tpl');
    }

    function renderDetallePelicula($detallePelicula, $state){
        $this->smarty->assign('detallePelicula', $detallePelicula);
        $this->smarty->assign('state' , $state);
        
        $this->smarty->display('templates/peliculaDetalle.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

}
