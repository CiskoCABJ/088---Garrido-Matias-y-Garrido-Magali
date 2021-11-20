<?php
require_once './2-Models/GenerosModel.php';
require_once './2-Models/PeliculasModel.php';
require_once './3-Views/MoviesView.php';
require_once './4-Hellpers/SessionHellper.php';

class MoviesController {
    private $generosModel;
    private $peliculasModel;
    private $moviesView;
    private $sessionHellper;

    function __construct(){
        $this->peliculasModel = new PeliculasModel();
        $this->moviesView = new MoviesView();
        $this->generosModel = new GenerosModel();
        $this->sessionHellper = new SessionHellper();
    }

    function showHome(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Estrenos";
        $peliculasHome = $this->peliculasModel->getPeliculasEstreno();
        $generos = $this->generosModel->getGeneros();
        $this->moviesView->renderPeliculas($peliculasHome,$generos,$titulo, $state, $rol);
    }

    function showPeliculas(){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Peliculas";
        $peliculas = $this->peliculasModel->getPeliculas();
        $generos = $this->generosModel->getGeneros();
        $this->moviesView->renderPeliculas($peliculas,$generos, $titulo, $state,$rol);
    }
   
    function showDetalle($idpelicula){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->generosModel->getGeneros();
        $pelicula = $this->peliculasModel->getPelicula($idpelicula);
        $this->moviesView->renderPelicula($pelicula, $generos, $state, $rol);
    }

    function addPelicula(){ 
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){       
            $this->peliculasModel->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
            $this->moviesView->showGenero($_POST['inp_genero']);
        }else{
            $this->moviesView->showHomeLocation();
        }
    }

    function deletePelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->peliculasModel->deletePelicula($idpelicula);
        }
        $this->moviesView->showHomeLocation();            
    }

    function updatePelicula($idpelicula){ 
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){  
            $peliculaUpdate = $this->peliculasModel->getPelicula($idpelicula);
            $generos = $this->generosModel->getGeneros();
            $this->moviesView->renderPeliculaUpdate($peliculaUpdate, $generos, $state,$rol);
        }else{
            $this->moviesView->showHomeLocation();
        }
    }

    function editPelicula($idpelicula){
        if($this->sessionHellper->showRol()){
            $this->peliculasModel->updatePelicula($idpelicula , $_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
        }
        $this->moviesView->showHomeLocation();
    } 
    
    //Generos

    function showGeneros($mensaje){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Generos";
        $generos = $this->generosModel->getGeneros();
        $this->moviesView->renderGeneros($generos, $titulo, $state, $rol, $mensaje);
    }

    function showGenero($genero){        
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->generosModel->getGeneros();
        $peliculasByGenero = $this->peliculasModel->getPeliculasByGenero($genero);
        $this->moviesView->renderPeliculas($peliculasByGenero,$generos,$genero, $state, $rol);    
    }
   
    function addGenero(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        if($rol){ 
            $this->generosModel->addGenero($_POST['inp_genero']);
            $mensaje = "Nuevo genero agregado: " . $_POST['inp_genero'] ;
            $this->showGeneros($mensaje);
        }else{
            $this->moviesView->showHomeLocation();
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
            $this->moviesView->showHomeLocation();    

        }
    }

    function updateGenero($genero){
        $state = $this->sessionHellper->showState();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $peliculasByGenero=$this->peliculasModel->getPeliculasByGenero($genero);
            $this->moviesView->renderGeneroUpdate($genero, $peliculasByGenero, $state, $rol);
        }else{
            $this->moviesView->showHomeLocation();
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
            $this->moviesView->showHomeLocation();
        }
    }
}