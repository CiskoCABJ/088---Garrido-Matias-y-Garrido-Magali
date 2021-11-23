<?php
require_once './2-Models/ComentariosModel.php';
require_once './3-Views/ApiView.php';
require_once './4-Hellpers/SessionHellper.php';

class ApiMoviesController{

    private $comentariosModel;

    private $apiView;

    private $sessionHellper;
    
    function __construct(){
        $this->comentariosModel =new ComentariosModel();

        $this->apiView = new ApiView();

        $this->sessionHellper = new SessionHellper();
    }


    //falta agregar response

    function getComentarios(){
        $comentarios = $this->comentariosModel->getComentarios();
        $this->apiView->response($comentarios,200);
    }

    function getComentariosPelicula($params = null){
        $idPelicula = $params[":ID"];

        if(isset($_GET["sort"]) && isset($_GET["order"])){
            $sort = $_GET["sort"];
            $order = $_GET["order"];
            $comentarios = $this->comentariosModel->getComentariosPeliculaOrden($idPelicula,$sort,$order);
            $this->apiView->response($comentarios,200);
        }else{
            $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);
            $this->apiView->response($comentarios,200);
        }   
        
     
    }

    function addComentario(){      

           $comentarioPost = $this->getBody();

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

    private function getBody(){
        return  json_decode(file_get_contents('php://input'), true);
    }

   
}