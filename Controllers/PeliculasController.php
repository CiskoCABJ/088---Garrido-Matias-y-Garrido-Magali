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
        $titulo = "Estrenos";
        $peliculasHome = $this->model->getPeliculasEstreno();
        $generos = $this->model->getGeneros();
        $this->view->renderPeliculas($peliculasHome,$generos,$titulo, $state, $rol);

    }
    function showPeliculas(){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Peliculas";

        $peliculas = $this->model->getPeliculas();
        $generos = $this->model->getGeneros();
        $this->view->renderPeliculas($peliculas,$generos, $titulo, $state,$rol);

    }

    function showGeneros(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();

        $generos = $this->model->getGeneros();
        $this->view->renderGeneros($generos, $state, $rol);

    }

    function showGenero($genero){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->model->getGeneros();
        $peliculasByGenero = $this->model->getPeliculasByGenero($genero);
        $this->view->renderPeliculas($peliculasByGenero,$generos,$genero, $state, $rol);
       
    }

    function showDetalle($idpelicula){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->model->getGeneros();

        $pelicula = $this->model->getPelicula($idpelicula);
        $this->view->renderPelicula($pelicula, $generos, $state, $rol);
    }

    function addPelicula(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $this->model->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
        $this->view->showHomeLocation();
    }

    function deletePelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->model->deletePelicula($idpelicula);
            
        }
        $this->view->showHomeLocation();    
    }

    function updatePelicula($idpelicula){ 
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
            $peliculaUpdate = $this->model->getPelicula($idpelicula);
            $generos = $this->model->getGeneros();
            $this->view->renderPeliculaUpdate($peliculaUpdate, $generos, $state,$rol);
        
         //$this->view->showHomeLocation();
    }

    function editPelicula($idpelicula){
        $this->model->updatePelicula($idpelicula , $_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto']);
        $this->view->showHomeLocation();
    }

    function addGenero(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $this->model->addGenero($_POST['inp_genero']);
        $this->showGeneros();
    }

    function deleteGenero($genero){
        if($this->sessionHellper->showRol()){
            $this->model->deleteGenero($genero);
            
        }
        $this->showGeneros();    
    }


    function updateGenero($genero){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $peliculasByGenero=$this->model->getPeliculasByGenero($genero);
        $this->view->renderGeneroUpdate($genero, $peliculasByGenero, $state, $rol);
    }
  
    function editGenero($genero){
        $this->model->updateGenero($genero, $_POST['inp_genero']);
        $this->view->showHomeLocation();
    }




    

}