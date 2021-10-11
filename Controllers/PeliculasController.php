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

    function showDetalle($idpelicula){
        $state = $this->sessionHellper->showState();
        $generos = $this->model->getGeneros();

        $pelicula = $this->model->getPelicula($idpelicula);
        $this->view->renderPelicula($pelicula, $generos, $state);
    }

    function deletePelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->model->deletePelicula($idpelicula);
            
        }
        $this->view->showHomeLocation();    
    }

    function updatePelicula($idpelicula){ 
        $state = $this->sessionHellper->showState();
            $peliculaUpdate = $this->model->getPelicula($idpelicula);
            $generos = $this->model->getGeneros();
            $this->view->renderPeliculaUpdate($peliculaUpdate, $generos, $state);
        
         //$this->view->showHomeLocation();
    }

    function editPelicula($idpelicula){
        $this->model->updatePelicula($idpelicula , $_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto']);
        $this->view->showHomeLocation();
    }

  



    

}