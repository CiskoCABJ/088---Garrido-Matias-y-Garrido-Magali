<?php
require_once './Models/UserModel.php';
require_once './Views/LoginView.php';


require_once './Hellpers/SessionHellper.php';



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
        session_start();
        session_destroy();
        $this->view->showLogin($this->sessionHellper->showState(),"Te deslogueaste!");

    }

    function login(){
        $this->view->showLogin($this->sessionHellper->showState());
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $user = $this->model->getUser($usuario);
            if ($user && password_verify($pass, ($user->pass))){
                session_start();

                $_SESSION["usuario"] = $user->usuario;                
                $_SESSION["rol"] = $user->rol;
                
                $this->view->showHomeLocation();
            }  
            else{
                $this->view->showLogin($this->sessionHellper->showState(),'Acceso denegado');
            }  
        }
        else {
            $this->view->showLogin($this->sessionHellper->showState(),'Camplos incompletos');
        }
    }

    function register(){
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
                $this->view->showRegister($session,'Cuenta creada!');
            }
        }    
    } 

}