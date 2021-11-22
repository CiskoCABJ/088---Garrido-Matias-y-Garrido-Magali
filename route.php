<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('1-Controllers/MoviesController.php');
require_once('1-Controllers/LoginController.php');
require_once('1-Controllers/AdminController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginController = new LoginController();

$moviesController= new MoviesController();

$adminController =  new AdminController();

$params = explode('/', $action);


switch($params[0]){
    case 'home':
        $moviesController->showHome();
        break;

    case 'generos':
        $moviesController->showGeneros($mensaje = "");
        break;
    case 'peliculas': 
        $moviesController->showPeliculas();
        break;
    case 'usuarios':
        $adminController->showUsuarios();   
        break;

    case 'genero':
        $moviesController->showGenero($params[1]);
        break;
    case 'pelicula':
        $moviesController->showDetalle($params[1]);
        break;
    case 'usuario':
        $adminController->showUsuario($params[1]); 

    case 'Login':
        $loginController->login();
        break;
    case 'Logout':
        $loginController->logout();
        break;
    case 'verify':
        $loginController->verify();
        break;
    case 'registro':
        $loginController->register();
        break;
    case 'verifyregister':
        $loginController->verifyRegister();
        break;   

    case 'agregarpelicula':
        $moviesController->addPelicula();
        break;  
    case 'borrarpelicula':
        $moviesController->deletePelicula($params[1]);
        break;   
    case 'editarpelicula':
        $moviesController->updatePelicula($params[1]);
        break;   
    case 'edicionpelicula' :
        $moviesController->editPelicula($params[1]);
        break;

    case 'agregargenero':
        $moviesController->addGenero();
        break;
    case 'borrargenero':
        $moviesController->deleteGenero($params[1]);
        break; 
    case 'editargenero':
        $moviesController->updateGenero($params[1]);   
        break; 
    case 'ediciongenero':
        $moviesController->editGenero($params[1]);
        break; 
    
    case 'borrarusuario':
        $adminController->deleteUsuario($params[1]);   
        break;
    case 'daradmin':
        $adminController->upgrade($params[1]);   
        break; 
    case 'quitaradmin':
        $adminController->downgrade($params[1]);
        break; 


 

    default:
        echo('404 Page not found :(');
        break;

        //nuevos
}

