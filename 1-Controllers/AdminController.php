<?php
require_once './2-Models/UsersModel.php';
require_once './2-Models/ComentariosModel.php';

require_once './3-Views/AdminView.php';
require_once './3-Views/LoginView.php';
require_once './3-Views/MoviesView.php';

require_once './4-Helpers/SessionHelper.php';

class AdminController{
    private $userModel;
    private $comentariosModel;

    private $adminView;
    private $loginView;
    private $moviesView;
    
    private $sessionHelper;

    function __construct(){
        $this->userModel = new UsersModel();
        $this->comentariosModel = new ComentariosModel();

        $this->adminView = new AdminView();
        $this->loginView = new LoginView();
        $this->moviesView = new MoviesView();

        $this->sessionHelper = new SessionHelper();
    }
    
    function showUsuarios($mensaje = null){
        $rol = $this->sessionHelper->showRol();
        $state = $this->sessionHelper->isLogged();

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
        $rol = $this->sessionHelper->showRol();
        $state = $this->sessionHelper->isLogged();

        $mensaje = $idUsuario." fue borrado";
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                $comentariosDeUsuario = $this->comentariosModel->getComentariosByUsuario($idUsuario);
                if($comentariosDeUsuario){
                    if($this->sessionHelper->getLoggedUser()== $userName->usuario){
                        $mensaje = "No puedes borrarte a ti mismo!";
                    }else{
                        $mensaje = $idUsuario." tiene comentarios registrados";
                    }                    
                }else{                   
                    if($this->sessionHelper->getLoggedUser()!= $userName->usuario){
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
        $rol = $this->sessionHelper->showRol();
        $state = $this->sessionHelper->isLogged();

        $mensaje = $idUsuario." ahora es administrador";

        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHelper->getLoggedUser()!= $userName->usuario){
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
        $rol = $this->sessionHelper->showRol();
        $state = $this->sessionHelper->isLogged();

        $mensaje = $idUsuario." ya no es administrador";
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHelper->getLoggedUser()!= $userName->usuario){
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