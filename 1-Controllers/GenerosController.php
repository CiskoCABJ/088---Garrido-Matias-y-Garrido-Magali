<?php

require_once './2-Models/GenerosModel.php';
require_once './2-Models/PeliculasModel.php';
require_once './3-Views/GenerosView.php';
require_once './3-Views/PeliculasView.php';
require_once './4-Hellpers/SessionHellper.php';

class GenerosController {

    private $generosModel;
    private $generosView;
    private $sessionHellper;
    private $peliculasModel;
    private $peliculasView;

    function __construct(){
        $this->generosModel = new GenerosModel();
        $this->generosView = new GenerosView();
        $this->peliculasModel = new PeliculasModel();
        $this->peliculasView = new PeliculasView();
        $this->sessionHellper = new SessionHellper();
    }

    function showGeneros($mensaje){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Generos";
        $generos = $this->generosModel->getGeneros();
        $this->generosView->renderGeneros($generos, $titulo, $state, $rol, $mensaje);
    }

    function showGenero($genero){
        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->generosModel->getGeneros();
        $peliculasByGenero = $this->peliculasModel->getPeliculasByGenero($genero);
        $this->peliculasView->renderPeliculas($peliculasByGenero,$generos,$genero, $state, $rol);
       
    }
   
    function addGenero(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){ 
            $this->generosModel->addGenero($_POST['inp_genero']);
            $mensaje = "Nuevo genero agregado: " . $_POST['inp_genero'] ;
            $this->showGeneros($mensaje);
        }else{
            $this->generosView->showHomeLocation();
        }
    }

    function deleteGenero($genero){
        if($this->sessionHellper->showRol()){
            $peliculasByGenero = $this->peliculasModel->getPeliculasByGenero($genero);
            if($peliculasByGenero){
                $mensaje = "No se puede borrar el genero ya que posee peliculas asociadas";
                $this->showGeneros($mensaje);
            }else{
                $this->generosModel->deleteGenero($genero);
                $mensaje = "Genero eliminado :" . $genero;
                $this->showGeneros($mensaje);
            }
        }else{
            $this->generosView->showHomeLocation();    

        }
    }


    function updateGenero($genero){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $peliculasByGenero=$this->peliculasModel->getPeliculasByGenero($genero);
            $this->generosView->renderGeneroUpdate($genero, $peliculasByGenero, $state, $rol);
        }else{
            $this->generosView->showHomeLocation();
        }
    }
  
    function editGenero($genero){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $mensaje = $genero . " cambio a :" . $_POST['inp_genero'].
            $this->generosModel->updateGenero($genero, $_POST['inp_genero']);
            $this->showGeneros($mensaje);
        }else{
            $this->generosView->showHomeLocation();
        }
    }
}