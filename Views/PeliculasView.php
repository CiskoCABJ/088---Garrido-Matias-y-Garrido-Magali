<?php
require_once('./libs/smarty-3.1.39/libs/Smarty.class.php');
class PeliculasView{

    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

    function renderHome($peliculas){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Estrenos");
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderPeliculas($peliculas){
        $this->smarty->assign('peliculas', $peliculas);
        $this->smarty->assign('titulo', "Peliculas");
        $this->smarty->display('templates/peliculasLista.tpl');
    }

    function renderGeneros($generos){
        $this->smarty->assign('generos', $generos);
        $this->smarty->display('templates/generosLista.tpl');
    }

    function renderDetallePelicula($detallePelicula){
        $this->smarty->assign('detallePelicula', $detallePelicula);
        $this->smarty->display('templates/peliculaDetalle.tpl');
    }

    function showHomeLocation(){
        header("Location: ".BASE_URL."home");
    }

}
