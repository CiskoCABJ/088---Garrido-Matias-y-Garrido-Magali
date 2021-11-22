<?php


require_once './1-Controllers/ApiMoviesController.php'; // por ahora para probar
require_once './2-Models/GenerosModel.php';
require_once './2-Models/PeliculasModel.php';
require_once './2-Models/ComentariosModel.php';
require_once './3-Views/MoviesView.php';
require_once './4-Hellpers/SessionHellper.php';

class MoviesController {

    private $generosModel;
    private $peliculasModel;
    private $moviesView;
    private $sessionHellper;
    private $api;
    private $comentariosModel;

    function __construct(){
        $this->peliculasModel = new PeliculasModel();
        $this->generosModel = new GenerosModel();
        $this->comentariosModel = new ComentariosModel();

        $this->moviesView = new MoviesView();

        $this->sessionHellper = new SessionHellper();

        $this->api = new ApiMoviesController();
    }

    function showHome(){
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Estrenos";
        $peliculasHome = $this->peliculasModel->getPeliculasEstreno();
        $generos = $this->generosModel->getGeneros();
        $this->moviesView->renderPeliculas($peliculasHome,$generos,$titulo, $state, $rol,null,null,null);
    }

    function showPeliculas($params = null){

        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Peliculas";
        $generos = $this->generosModel->getGeneros();

        if( $state){
            $paginas =$this->peliculasModel->countPeliculas()/ITEM_POR_PAGINA;
            if(($paginas - round($paginas) ) != 0){
                $paginas =(round($this->peliculasModel->countPeliculas()/ITEM_POR_PAGINA));
            }
            $mostrarDesde = 0;
            $pagina =1;
            if(isset($params[1])){
                if($params[1] >$paginas || $params[1]<=0 ){
                    header("Location: ".BASE_URL."peliculas");
                }else{
                    $pagina=$params[1];
                }
                $mostrarDesde= intval($pagina)*ITEM_POR_PAGINA;
            }
           
            $peliculas = $this->peliculasModel->getPeliculas($mostrarDesde);
          
            $this->moviesView->renderPeliculas($peliculas,$generos, $titulo, $state,$rol,$mostrarDesde,$pagina,$paginas);
        }else{
            $peliculas = $this->peliculasModel->getAllPeliculas();          
            $this->moviesView->renderPeliculas($peliculas,$generos,$titulo, $state, $rol,null,null,null);
        }

        
       
    }
   
    function showDetalle($idpelicula){
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->generosModel->getGeneros();
        $pelicula = $this->peliculasModel->getPelicula($idpelicula);
        $comentarios =$this->comentariosModel->getComentarios($idpelicula);//esta esta hecha desde el servidor,piden api rest
        //puedo renderizar desde javascript
 
        $this->moviesView->renderPelicula($pelicula, $generos, $state, $rol,$comentarios); // para probar
    }

    function addPelicula(){ 
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();
        if($rol){       
            if( isset($_POST['inp_img']) && isset($_POST['inp_titulo']) && isset($_POST['inp_genero']) && isset($_POST['inp_descripcion']) && isset($_POST['inp_duracion']) && isset($_POST['inp_reparto']) && isset($_POST['inp_estreno']) ){
                $this->peliculasModel->addPelicula($_POST['inp_img'],$_POST['inp_titulo'],$_POST['inp_genero'],$_POST['inp_descripcion'],$_POST['inp_duracion'],$_POST['inp_reparto'],$_POST['inp_estreno']);
                $this->moviesView->showGenero($_POST['inp_genero']);
            }
        }else{
            $this->moviesView->showHomeLocation();
        }
    }

    function showPeliculasFiltradas(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();
        if($state){

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
        $state = $this->sessionHellper->isLogged();
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
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        $titulo = "Generos";
        $generos = $this->generosModel->getGeneros();
        $this->moviesView->renderGeneros($generos, $titulo, $state, $rol, $mensaje);
    }

    function showGenero($genero){  
    
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        $generos = $this->generosModel->getGeneros();
        $peliculasByGenero = $this->peliculasModel->getPeliculasByGenero($genero);
     
        $this->moviesView->renderPeliculas($peliculasByGenero,$generos,$genero, $state, $rol,null,null,null);  
        
    }
   
    function addGenero(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();
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
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $peliculasByGenero=$this->peliculasModel->getPeliculasByGenero($genero);
            $this->moviesView->renderGeneroUpdate($genero, $peliculasByGenero, $state, $rol);
        }else{
            $this->moviesView->showHomeLocation();
        }
    }
  
    function editGenero($genero){
        $state = $this->sessionHellper->isLogged();
        $rol = $this->sessionHellper->showRol();
        if($rol){ 
            $mensaje = $genero . " cambio a :" . $_POST['inp_genero'].
            $this->generosModel->updateGenero($genero, $_POST['inp_genero']);
            $this->showGeneros($mensaje);


        }else{
            $this->moviesView->showHomeLocation();
        }
    }

    function addComentario($idPelicula){
        $usuario =$this->sessionHellper->getLoggedUser();
        if($usuario){

            if( isset($_POST['inp-calificacion']) && isset($_POST['inp-comentario'])){
                $calificacion = $_POST['inp-calificacion'];
                $comentario =$_POST['inp-comentario'];
                $this->comentariosModel->addComentario($usuario,$idPelicula, $calificacion, $comentario); 
                $this->showDetalle($idPelicula);               

            }
        }
    }

    function deleteComentario($idComentario){
        $rol =$this->sessionHellper->showRol();
        if($rol){
            $comentario = $this->comentariosModel->getComentario($idComentario);
            if($comentario){
                $idPelicula = $comentario->id_pelicula;
                $this->comentariosModel->deleteComentario($idComentario);
                $this->showDetalle($idPelicula);  
            }
          
        }
    }
    // function getComentarios($idPelicula){
    //     $state = $this->sessionHellper->isLogged();
    //     if($state){
    //         $this->comentariosModel->getComentarios($idPelicula);
    //     }
    // }
}