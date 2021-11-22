<?php

require_once './2-Models/GenerosModel.php';
require_once './2-Models/PeliculasModel.php';
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

    function getGenero($params = null){
        $idGenero = $params[":ID"];
        $genero = $this->generosModel->getGenero($idGenero);
        $this->apiView->response($genero,200); 
    }

    function deleteGenero($params = null){
        $idGenero = $params[":ID"];
        $this->generosModel->deleteGenero($idGenero);
    }


    function deletePelicula($params = null){
        $idPelicula = $params[":ID"];
        $this->peliculasModel->deletePelicula($idPelicula);
    }

    function getPeliculas(){
        $peliculas = $this->peliculasModel->getPeliculas();
        $this->apiView->response($peliculas,200);
    }

    function getPelicula($params = null){
        $idPelicula = $params[":ID"];
        $pelicula = $this->peliculasModel->getPelicula($idPelicula);
        $this->apiView->response($pelicula,200);
    }

    function addPelicula(){
        $this->peliculasModel->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
    }

    
////////////////////////////////////////

    function getComentarios(){
        $comentarios = $this->comentariosModel->getComentarios();
        $this->apiView->response($comentarios,200);
    }
    function getComentariosPelicula($params = null){
        $idComentario = $params[":ID"];
        $comentarios = $this->comentariosModel->getComentariosPelicula($idComentario);
        $this->apiView->response($comentarios,200);
    }

    function addComentario(){      

           $comentarioPost = json_decode(file_get_contents('php://input'), true);

                $idPelicula = $comentarioPost["id_pelicula"];
                $idUser = $comentarioPost["usuario"];
                $calificacion = $comentarioPost["calificacion"];
                $comentario =$comentarioPost["comentario"];

                $this->comentariosModel->addComentario($idUser,$idPelicula, $calificacion, $comentario);  
                $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);  
                $this->apiView->response($comentarios,404);               
          
        
    }

    function deleteComentario($params = null){
        $idComentario= $params[":ID"];
        $rol =$this->sessionHellper->showRol();
        if($rol){
            $comentario = $this->comentariosModel->getComentario($idComentario);
            if($comentario){
                $idPelicula = $comentario->id_pelicula;
                $this->comentariosModel->deleteComentario($idComentario);
                $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);
                $this->apiView->response($comentarios,200);
                  
            }
        }
    }

   
}