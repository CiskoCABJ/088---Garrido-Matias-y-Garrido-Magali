<?php
require_once './Models/PeliculasModel.php';
require_once './Views/PeliculasView.php';
class PeliculasController {
    private $model;
    private $view;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new PeliculasView();
    }

    function showHome(){
        $peliculasHome = $this->model->getPeliculasEstreno();
        $this->view->renderHome($peliculasHome);

    }
    function showPeliculas(){
        $peliculas = $this->model->getPeliculas();
        $this->view->renderPeliculas($peliculas);

    }

    function showGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->renderGeneros($generos);

    }

    function showGenero($genero){
        $peliculasByGenero = $this->model->getPeliculasByGenero($genero);
        $this->view->renderHome($peliculasByGenero);
       
    }

    function showDetalle($pelicula){
        $detallePelicula = $this->model->getDetallePelicula($pelicula);
        $this->view->renderDetallePelicula($detallePelicula);
       
    }


}