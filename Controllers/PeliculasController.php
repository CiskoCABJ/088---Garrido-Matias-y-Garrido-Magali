<?php
require_once './Models/PeliculasModel.php';
require_once './Views/PeliculasView.php';

require_once './Hellpers/SessionHellper.php';
class PeliculasController {
    private $model;
    private $view;
    private $sessionHellper;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new PeliculasView();
        $this->sessionHellper = new SessionHellper();
    }

    function showHome(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
  
        $peliculasHome = $this->model->getPeliculasEstreno();
        $this->view->renderHome($peliculasHome, $state, $rol);

    }
    function showPeliculas(){
        
     
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();

        $peliculas = $this->model->getPeliculas();
        $this->view->renderPeliculas($peliculas, $state,$rol);

    }

    function showGeneros(){
        $state = $this->sessionHellper->showState();

        $generos = $this->model->getGeneros();
        $this->view->renderGeneros($generos, $state);

    }

    function showGenero($genero){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();

        $peliculasByGenero = $this->model->getPeliculasByGenero($genero);
        $this->view->renderPeliculas($peliculasByGenero, $state, $rol);
       
    }

    function showDetalle($pelicula){
        
        $state = $this->sessionHellper->showState();

        $detallePelicula = $this->model->getDetallePelicula($pelicula);
        $this->view->renderDetallePelicula($detallePelicula, $state);
       
    }

  



    

}