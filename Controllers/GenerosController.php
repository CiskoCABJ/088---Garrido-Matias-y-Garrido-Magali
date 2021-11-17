<?php

require_once './Models/GenerosModel.php';
require_once './Views/GenerosView.php';
require_once './Models/PeliculasModel.php';
require_once './Views/PeliculasView.php';

require_once './Hellpers/SessionHellper.php';

class GenerosController {

    private $model;
    private $view;
    private $sessionHellper;
    private $peliculasModel;
    private $peliculasView;

    function __construct(){
        $this->model = new GenerosModel();
        $this->view = new GenerosView();
        $this->peliculasModel = new PeliculasModel();
        $this->peliculasView = new PeliculasView();
        $this->sessionHellper = new SessionHellper();
    }

    function showGeneros(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Generos";
        $generos = $this->model->getGeneros();
        $this->view->renderGeneros($generos, $titulo, $state, $rol);
    }

    function showGenero($genero){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->model->getGeneros();
        $peliculasByGenero = $this->model->getPeliculasByGenero($genero);
        $this->peliculasView->renderPeliculas($peliculasByGenero,$generos,$genero, $state, $rol);
       
    }
   
    function addGenero(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){ 
            $this->model->addGenero($_POST['inp_genero']);
            $this->showGeneros();
        }else{
            $this->view->showHomeLocation();
        }
    }

    function deleteGenero($genero){
        if($this->sessionHellper->showRol()){
            $this->model->deleteGenero($genero);
            $this->showGeneros();
        }else{
            $this->view->showHomeLocation();    

        }
    }


    function updateGenero($genero){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $peliculasByGenero=$this->peliculasModel->getPeliculasByGenero($genero);
            $this->view->renderGeneroUpdate($genero, $peliculasByGenero, $state, $rol);
        }else{
            $this->view->showHomeLocation();
        }
    }
  
    function editGenero($genero){
        $this->model->updateGenero($genero, $_POST['inp_genero']);
        $this->view->showHomeLocation();
    }
}