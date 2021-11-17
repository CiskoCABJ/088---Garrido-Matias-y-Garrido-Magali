<?php
require_once './2-Models/UserModel.php';
require_once './3-Views/LoginView.php';


require_once './4-Hellpers/SessionHellper.php';



class LoginController{
    private $model;
    private $view;
    private $sessionHellper;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->sessionHellper = new SessionHellper();
    }

    function logout(){ 
        $this->sessionHellper->logout();
        $this->view->showLogin($this->sessionHellper->showState());
    }

    function login(){
        $this->sessionHellper->checkLoggedIn();
        $this->view->showLogin($this->sessionHellper->showState());
    
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $user = $this->model->getUser($usuario);
            if ($user && password_verify($pass, ($user->pass))){

                $this->sessionHellper->login($user);
             
                $this->view->showHomeLocation();
            }  
            else{
                $this->view->showLogin("",'Acceso denegado');
            }  
        }
        else {
            $this->view->showLogin($this->sessionHellper->showState(),'Camplos incompletos');
        }
    }

    function register(){
        $this->sessionHellper->checkLoggedIn();
        $this->view->showRegister($this->sessionHellper->showState());
        
    }

   function verifyRegister(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

            $usuario = $_POST['usuario'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $mail = $_POST['mail'];

            $user = $this->model->getUser($usuario);
            $session = $this->sessionHellper->showState();
               
            if ($user){
                $this->view->showRegister($session,'El usuario ya esta en uso');
            }
            else{
                $this->model->newUser($usuario, $mail, $pass);
                $this->view->showLogin($session,'Cuenta creada! Logea');
            }
        }else{
            $this->view->showRegister($this->sessionHellper->showState(),'Camplos incompletos');
    
        }
    } 

}