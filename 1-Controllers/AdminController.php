<?php
require_once './2-Models/UsersModel.php';
require_once './2-Models/ComentariosModel.php';
require_once './3-Views/AdminView.php';
require_once './3-Views/LoginView.php';
require_once './3-Views/MoviesView.php';
require_once './4-Hellpers/SessionHellper.php';

class AdminController{
    private $sessionHellper;
    private $userModel;
    private $comentariosModel;
    private $adminView;
    private $loginView;
    private $moviesView;

    function __construct(){
        $this->userModel = new UsersModel();
        $this->comentariosModel = new ComentariosModel();

        $this->adminView = new AdminView();
        $this->loginView = new LoginView();
        $this->moviesView = new MoviesView();

        $this->sessionHellper = new SessionHellper();
    }
    
    function showUsuarios($mensaje = null){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();

        if($state){
            if($rol){
                $users = $this->userModel->getUsers();
                $this->adminView->showUsers($users,$state,$rol,$mensaje);
            }else{
                $this->moviesView->showHomeLocation(); 
            }
        }
        else{
            $this->loginView->showLogin();  
        }
    }

    function deleteUsuario($idUsuario){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();

        $mensaje = $idUsuario." fue borrado";
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                $comentariosDeUsuario = $this->comentariosModel->getComentariosByUsuario($idUsuario);
                if($comentariosDeUsuario){
                    if($this->sessionHellper->getLoggedUser()== $userName->usuario){
                        $mensaje = "No puedes borrarte a ti mismo!";
                    }else{
                        $mensaje = $idUsuario." tiene comentarios registrados";
                    }                    
                }else{                   
                    if($this->sessionHellper->getLoggedUser()!= $userName->usuario){
                        $this->userModel->deleteUsuario($idUsuario);
                    }else{
                        $mensaje = "No puedes borrarte a ti mismo!";
                    }
                }
                $this->showUsuarios($mensaje);
            }else{
                $this->moviesView->showHomeLocation();  
            }
        }
        else{
            $this->loginView->showLogin();  
        }
    }

    function upgrade($idUsuario){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();

        $mensaje = $idUsuario." ahora es administrador";

        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHellper->getLoggedUser()!= $userName->usuario){
                    $this->userModel->upgrade($idUsuario);
                    $this->showUsuarios($mensaje);
                }else{
                    $mensaje = "Ya tienen privilegios de administrador";
                    $this->showUsuarios($mensaje);  
                }                    
            }
            else{
                $this->moviesView->showHomeLocation();  
            }
        }
        else{
            $this->loginView->showLogin();  
        }
    }

    function downgrade($idUsuario){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();

        $mensaje = $idUsuario." ya no es administrador";
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHellper->getLoggedUser()!= $userName->usuario){
                    $this->userModel->downgrade($idUsuario); 
                    $this->showUsuarios($mensaje);         
                }else{
                    $mensaje = "No puedes quitarte los privilegios de administrador";
                    $this->showUsuarios($mensaje);  
                }
            }else{
                $this->moviesView->showHomeLocation();  
            }
        }
        else{
            $this->loginView->showLogin();  
        }
    }
}