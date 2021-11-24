<?php
require_once './2-Models/ComentariosModel.php';
require_once './2-Models/PeliculasModel.php';

require_once './3-Views/ApiView.php';

require_once './4-Helpers/SessionHelper.php';

class ApiMoviesController{

    private $comentariosModel;
    private $peliculasModel;

    private $apiView;

    private $sessionHelper;
    
    function __construct(){
        $this->comentariosModel =new ComentariosModel();
        $this->peliculasModel =new PeliculasModel();

        $this->apiView = new ApiView();

        $this->sessionHelper = new SessionHelper();
    }

    function getComentarios(){
        $comentarios = $this->comentariosModel->getComentarios();
        if($comentarios){
            $this->apiView->response($comentarios,200);
        }else{
            $this->apiView->response($comentarios,204);
        }
    }

    function getComentariosPelicula($params = null){
        $idPelicula = $params[":ID"];
        $comentarios= null;

        if(isset($_GET["sort"]) && isset($_GET["order"])){
            $sort = $_GET["sort"];
            $order = $_GET["order"];
            $comentarios = $this->comentariosModel->getComentariosPeliculaOrden($idPelicula,$sort,$order);
        }else{
            $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);           
        } 

        if($comentarios){
            $this->apiView->response($comentarios,200);
        }else{
            if($this->peliculasModel->getPelicula($idPelicula))
                $this->apiView->response($comentarios,204);
            else 
             $this->apiView->response($comentarios,404);
        }
    }

    function addComentario(){ 
        $state =$this->sessionHelper->isLogged();
        if($state){
            $comentarioPost = $this->getBody();

            $idPelicula = $comentarioPost["id_pelicula"];
            $idUser = $comentarioPost["usuario"];
            $calificacion = $comentarioPost["calificacion"];
            $comentario =$comentarioPost["comentario"];

            $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);  

            if($idPelicula && $idUser &&  $calificacion && $comentario){
                    $this->comentariosModel->addComentario($idUser,$idPelicula, $calificacion, $comentario);  
                    $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula); 
                    $this->apiView->response($comentarios,200); 
            }else{
                $this->apiView->response($comentarios,400);        
            }  
        }else{
            $this->apiView->response($comentarios,511);
        }          
    }

    function deleteComentario($params = null){
        $idComentario= $params[":ID"];

        $rol =$this->sessionHelper->showRol();
        if($rol){  
            $comentario = $this->comentariosModel->getComentario($idComentario);
            if($comentario){
                $idPelicula = $comentario->id_pelicula;
                $comentarios = $this->comentariosModel->getComentariosPelicula($idPelicula);                            
                $this->comentariosModel->deleteComentario($idComentario);
                $this->apiView->response($comentarios,200);                            
            }else{
                $this->apiView->response(null,404);
            }
        }else{
            $this->apiView->response($comentarios,511);
        }
    }

    private function getBody(){
        return  json_decode(file_get_contents('php://input'), true);
    }
}