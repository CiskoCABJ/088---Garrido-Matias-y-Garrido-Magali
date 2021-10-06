<?php
require_once './Models/UserModel.php';
require_once './Views/LoginView.php';

class LoginController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new LoginView();
    }

    function login(){
        $this->view->showLogin();
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
                $this->view->showLogin('Acceso denegado');
            }  
        }
        else {
            $this->view->showLogin('Camplos incompletos');
        }
    }

    function register(){
        $this->view->showRegister();
    }

   function verifyRegister(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){
            $usuario = $_POST['usuario'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);

            $mail = $_POST['mail'];

            $mailUsuario = $this->model->getUser($mail);
            if ($mailUsuario){
                $this->view->showRegister('El mail ya se encuentra en uso');
            }
            else {
                $user = $this->model->getUser($usuario);
                if ($user){
                    $this->view->showRegister('El usuario ya esta en uso');
                }
                else{
                    $this->model->newUser($usuario, $mail, $pass);

                    $this->view->showRegister('Cuenta creada!');
                }
            }
        }    
    } 

}