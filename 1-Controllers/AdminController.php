<?php

require_once './2-Models/UserModel.php';
require_once './3-Views/AdminView.php';
require_once './4-Hellpers/SessionHellper.php';


class AdminController{
    private $sessionHellper;
    private $userModel;
    private $adminView;

    function __construct(){
        $this->userModel = new UserModel();
        $this->sessionHellper = new SessionHellper();
        $this->adminView = new AdminView();
    }
    
    function mainAdmin(){
        //$this->sessionHellper->checkLoggedIn();
        $rol = $this->sessionHellper->showRol();
        $state = $this->sessionHellper->showState();
        $users = $this->userModel->getUsers();
        $this->adminView->showUsers( $users,$state,$rol);

    }

}