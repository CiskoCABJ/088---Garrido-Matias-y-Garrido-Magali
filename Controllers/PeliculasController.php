<?php

require_once './Models/GenerosModel.php';
require_once './Models/PeliculasModel.php';
require_once './Views/PeliculasView.php';

require_once './Hellpers/SessionHellper.php';
class PeliculasController {
    private $genero;
    private $model;
    private $view;
    private $sessionHellper;

    function __construct(){
        $this->model = new PeliculasModel();
        $this->view = new PeliculasView();
        $this->genero = new GenerosModel();
        $this->sessionHellper = new SessionHellper();
    }

    function showHome(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Estrenos";
        $peliculasHome = $this->model->getPeliculasEstreno();
        $generos = $this->genero->getGeneros();
        $this->view->renderPeliculas($peliculasHome,$generos,$titulo, $state, $rol);

    }
    function showPeliculas(){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Peliculas";
        $peliculas = $this->model->getPeliculas();
        $generos = $this->genero->getGeneros();
        $this->view->renderPeliculas($peliculas,$generos, $titulo, $state,$rol);

    }
   
    function showDetalle($idpelicula){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->genero->getGeneros();

        $pelicula = $this->model->getPelicula($idpelicula);
        $this->view->renderPelicula($pelicula, $generos, $state, $rol);
    }
    function addPelicula(){ 
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){       
            $this->model->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
        }
        $this->view->showHomeLocation();
    }

    function deletePelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->model->deletePelicula($idpelicula);
        }
        $this->view->showHomeLocation();    
    }

    function updatePelicula($idpelicula){ 
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){  
            $peliculaUpdate = $this->model->getPelicula($idpelicula);
            $generos = $this->genero->getGeneros();
            $this->view->renderPeliculaUpdate($peliculaUpdate, $generos, $state,$rol);
        }else{
            $this->view->showHomeLocation();
        }
    }

    function editPelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->model->updatePelicula($idpelicula , $_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
        }
        $this->view->showHomeLocation();
    }   

}