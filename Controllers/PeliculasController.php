<?php
require_once './Models/PeliculasModel.php';
require_once './Views/PeliculasView.php';

require_once './Hellpers/StateHellper.php';
class PeliculasController {
    private $model;
    private $view;
    private $stateHellper;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new PeliculasView();
        $this->stateHellper = new StateHellper();
    }

    function showHome(){
  
        $peliculasHome = $this->model->getPeliculasEstreno();
        $this->view->renderHome($peliculasHome, $this->stateHellper->showState());

    }
    function showPeliculas(){
        $peliculas = $this->model->getPeliculas();
        $this->view->renderPeliculas($peliculas, $this->stateHellper->showState());

    }

    function showGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->renderGeneros($generos, $this->stateHellper->showState());

    }

    function showGenero($genero){
        $peliculasByGenero = $this->model->getPeliculasByGenero($genero);
        $this->view->renderPeliculas($peliculasByGenero, $this->stateHellper->showState());
       
    }

    function showDetalle($pelicula){
        $detallePelicula = $this->model->getDetallePelicula($pelicula);
        $this->view->renderDetallePelicula($detallePelicula, $this->stateHellper->showState());
       
    }

  



    

}