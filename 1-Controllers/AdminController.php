<?php

require_once './2-Models/UsersModel.php';
require_once './3-Views/AdminView.php';
require_once './3-Views/LoginView.php';
require_once './3-Views/MoviesView.php';
require_once './4-Hellpers/SessionHellper.php';


class AdminController{
    private $sessionHellper;
    private $userModel;
    private $adminView;
    private $loginView;
    private $moviesView;

    function __construct(){
        $this->userModel = new UsersModel();
        $this->sessionHellper = new SessionHellper();
        $this->adminView = new AdminView();
        $this->loginView = new LoginView();
        $this->moviesView = new MoviesView();
    }
    
    function showUsuarios(){
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->isLogged();
        if($state){
            if($rol){
                $users = $this->userModel->getUsers();
                $this->adminView->showUsers($users,$state,$rol);
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
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHellper->getLoggedUser()!= $userName->usuario){
                    $this->userModel->deleteUsuario($idUsuario);
                }
                $this->moviesView->showLocation("usuarios");
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
        if($state){
            if($rol){
                $this->userModel->upgrade($idUsuario);
                $this->moviesView->showLocation("usuarios");
            }else{
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
        if($state){
            if($rol){
                $userName = $this->userModel->getUser($idUsuario);
                if($this->sessionHellper->getLoggedUser()!= $userName->usuario){
                    $this->userModel->downgrade($idUsuario);          
                }
                $this->moviesView->showLocation("usuarios");
            }else{
                $this->moviesView->showHomeLocation();  
            }
        }
        else{
            $this->loginView->showLogin();  
        }
    }

}