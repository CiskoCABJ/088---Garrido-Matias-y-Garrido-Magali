<?php

require_once './2-Models/PeliculasModel.php';
require_once './3-Views/ApiView.php';

class ApiPeliculasController{

    private $model;
    private $view;

    function __construct() {

        $this->model = new PeliculasModel();
        $this->view = new ApiView();
    }

    function getPeliculas(){

        $peliculas = $this->model->getPeliculas();
        $this->view->response($peliculas,200);
    }

    function getPelicula($id){
        $pelicula = $this->model->getPelicula($id);
        $this->view->response($peliculas,200);
    }

    function addPelicula(){
        $this->model->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
        
    }

    function deletePelicula($id){
        $this->model->deletePelicula($id);
    }

    // function updatePelicula($id){
    //     $peliculaUpdate = $this->model->getPelicula($id);
    // }



}