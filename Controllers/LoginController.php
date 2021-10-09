<?php
require_once './Models/UserModel.php';
require_once './Views/LoginView.php';


require_once './Hellpers/StateHellper.php';



class LoginController{
    private $model;
    private $view;
    private $stateHellper;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
        $this->stateHellper = new StateHellper();
    }

    function logout(){
        session_start();
        session_destroy();
        $this->view->showLogin($this->stateHellper->showState(),"Te deslogueaste!");

    }

    function login(){
        $this->view->showLogin($this->stateHellper->showState());
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $user = $this->model->getUser($usuario);
            if ($user && password_verify($pass, ($user->pass))){
                session_start();
                $_SESSION["usuario"] = $usuario;
                $this->view->showHomeLocation();
            }  
            else{
                $this->view->showLogin($this->stateHellper->showState(),'Acceso denegado');
            }  
        }
        else {
            $this->view->showLogin($this->stateHellper->showState(),'Camplos incompletos');
        }
    }

    function register(){
        $this->view->showRegister($this->stateHellper->showState());
    }

   function verifyRegister(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){
            $usuario = $_POST['usuario'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

            $mail = $_POST['mail'];

            $mailUsuario = $this->model->getUser($mail);
            if ($mailUsuario){
                $this->view->showRegister($this->stateHellper->showState(),'El mail ya se encuentra en uso');
            }
            else {
                $user = $this->model->getUser($usuario);
                if ($user){
                    $this->view->showRegister($this->stateHellper->showState(),'El usuario ya esta en uso');
                }
                else{
                    $this->model->newUser($usuario, $mail, $pass);

                    $this->view->showRegister($this->stateHellper->showState(),'Cuenta creada!');
                }
            }
        }    
    } 

}