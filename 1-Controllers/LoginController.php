<?php
require_once './2-Models/UsersModel.php';
require_once './3-Views/LoginView.php';


require_once './4-Hellpers/SessionHellper.php';



class LoginController{
    private $userModel;
    private $loginView;
    private $sessionHellper;

    function __construct(){
        $this->userModel = new UsersModel();
        $this->loginView = new LoginView();
        $this->sessionHellper = new SessionHellper();
    }

    function logout(){ 
        $this->sessionHellper->logout();
        $this->loginView->showLogin($this->sessionHellper->showState());
    }

    function login(){
        $this->sessionHellper->checkLoggedIn();
        $this->loginView->showLogin($this->sessionHellper->showState());
    }

    function verify(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass'])){
            $usuario = $_POST['usuario'];
            $pass = $_POST['pass'];

            $user = $this->userModel->getUser($usuario);
            if ($user && password_verify($pass, ($user->pass))){

                $this->sessionHellper->login($user);
             
                $this->loginView->showHomeLocation();
            }  
            else{
                $this->loginView->showLogin("",'Acceso denegado');
            }  
        }
        else {
            $this->loginView->showLogin($this->sessionHellper->showState(),'Camplos incompletos');
        }
    }

    function register(){
        $this->sessionHellper->checkLoggedIn();
        $this->loginView->showRegister($this->sessionHellper->showState());
        
    }

   function verifyRegister(){
        if (!empty($_POST['usuario']) && !empty($_POST['pass']) && !empty($_POST['mail'])){

            $usuario = $_POST['usuario'];
            $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
            $mail = $_POST['mail'];

            $user = $this->userModel->getUser($usuario);
            $session = $this->sessionHellper->showState();
               
            if ($user){
                $this->loginView->showRegister($session,'El usuario ya esta en uso');
            }
            else{
                $this->userModel->newUser($usuario, $mail, $pass);
                $this->loginView->showLogin($session,'Cuenta creada! Logea');
            }
        }else{
            $this->loginView->showRegister($this->sessionHellper->showState(),'Camplos incompletos');
    
        }
    } 

}