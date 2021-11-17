
<?php

require_once './2-Models/GenerosModel.php';
require_once './3-Views/ApiView.php';

class ApiGenerosController{

    private $model;
    private $view;
    
    function __construct(){
        $this->model = new GenerosModel();
        $this->view = new ApiView();
    }

    function getGeneros(){
        $generos = $this->model->getGeneros();
        $this->view->response($generos,200);
    }

    function getGenero($id){
        $genero = $this->model->getGenero($id);
        $this->view->response($genero,200); 
    }

    function addGenero(){
        $this->model->addGenero($_POST['inp_genero']);
    }

    function deleteGenero($id){
        $this->model->deleteGenero($is);
    }
}