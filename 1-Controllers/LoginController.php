<?php
require_once './2-Models/UsersModel.php';

require_once './3-Views/LoginView.php';

require_once './4-Helpers/SessionHelper.php';

class LoginController{
    private $userModel;

    private $loginView;

    private $sessionHelper;

    function __construct(){
        $this->userModel = new UsersModel();
        $this->loginView = new LoginView();
        $this->sessionHelper = new SessionHelper();
    }

    function logout(){ 
        $this->sessionHelper->logout();
        $this->loginView->showLogin($this->sessionHelper->isLogged());
    }

    function login(){
        $this->sessionHelper->checkLoggedIn();
        $this->loginView->showLogin($this->sessionHelper->isLogged());
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $user = $this->userModel->getUser($usuario);
            if ($user && password_verify($pass, ($user->pass))){
                $this->sessionHelper->login($user);             
                $this->loginView->showHomeLocation();
            }  
            else{
                $this->loginView->showLogin("",'Acceso denegado');
            }  
        }
        else {
            $this->loginView->showLogin($this->sessionHelper->isLogged(),'Camplos incompletos');
        }
    }

    function register(){
        $this->sessionHelper->checkLoggedIn();
        $this->loginView->showRegister($this->sessionHelper->isLogged());
        
    }

   function verifyRegister(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

            $usuario = $_POST['usuario'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $mail = $_POST['mail'];

            $user = $this->userModel->getUser($usuario);
            $session = $this->sessionHelper->isLogged();
               
            if ($user){
                $this->loginView->showRegister($session,'El usuario ya esta en uso');
            }
            else{
                $this->userModel->newUser($usuario, $mail, $pass);
                $this->verify();
              //  $this->loginView->showLogin($session,'Cuenta creada! Logea');
            }
        }else{
            $this->loginView->showRegister($this->sessionHelper->isLogged(),'Camplos incompletos');
    
        }
    } 

}