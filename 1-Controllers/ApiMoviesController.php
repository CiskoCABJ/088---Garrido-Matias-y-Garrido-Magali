<?php

require_once './2-Models/GenerosModel.php';
require_once './2-Models/ComentariosModel.php';
require_once './3-Views/ApiView.php';
require_once './4-Hellpers/SessionHellper.php';

class ApiMoviesController{

    private $generosModel;
    private $peliculasModel;
    private $apiView;
    private $sessionHellper;
    private $comentariosModel;
    
    function __construct(){
        $this->generosModel = new GenerosModel();
        $this->peliculasModel = new PeliculasModel();
        $this->apiView = new ApiView();
        $this->sessionHellper = new SessionHellper();
        $this->comentariosModel =new ComentariosModel();
    }

    function addGenero(){
        $this->generosModel->addGenero($_POST['inp_genero']);
    }

    function getGeneros(){
        $generos = $this->generosModel->getGeneros();
        $this->apiView->response($generos,200);
    }

    function getGenero($id){
        $genero = $this->generosModel->getGenero($id);
        $this->apiView->response($genero,200); 
    }

    function deleteGenero($id){
        $this->generosModel->deleteGenero($is);
    }


    function deletePelicula($id){
        $this->peliculasModel->deletePelicula($id);
    }

    function getPeliculas(){
        $peliculas = $this->peliculasModel->getPeliculas();
        $this->apiView->response($peliculas,200);
    }

    function getPelicula($id){
        $pelicula = $this->peliculasModel->getPelicula($id);
        $this->apiView->response($peliculas,200);
    }

    function addPelicula(){
        $this->peliculasModel->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
    }

    function getComentarios($id){
        $comentarios = $this->comentariosModel->getComentarios($id);
        $this->apiView->response($comentarios,200);

    }

    function addComentario(){

    }
   
}