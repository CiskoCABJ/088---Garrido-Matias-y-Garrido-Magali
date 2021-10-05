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
            if ($user && password_verify($pass, $user->password)){
                session_start();
                $_SESSION["usuario"] = $usuario;
                $this->view->showHome();
            }  
            else{
                $this->view->showLogin('Acceso denegado');
            }  
        }
        else {
            $this->view->showLogin('Camplos incompletos');
        }



    }

}