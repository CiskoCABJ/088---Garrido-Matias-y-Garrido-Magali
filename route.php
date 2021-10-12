<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');


require_once('Controllers/PeliculasController.php');
require_once('Controllers/LoginController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // accion por defecto si no envian
}

$loginController = new LoginController();
$peliculasController= new PeliculasController();
$params = explode('/', $action);


switch($params[0]){
    case 'home':
        $peliculasController->showHome();
        break;
    case 'generos':
        $peliculasController->showGeneros();
        break;
    case 'peliculas': 
        $peliculasController->showPeliculas();
        break;
    case 'genero':
        $peliculasController->showGenero($params[1]);
        break;
    case 'pelicula':
        $peliculasController->showDetalle($params[1]);
        break;
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
    case 'borrar':
        $peliculasController->deletePelicula($params[1]);
        break;   
    case 'editar':
        $peliculasController->updatePelicula($params[1]);
        //function igual con showDetalle ver si simplifico o dejamos ambas entradas
        break;   
    case 'edicion' :
        $peliculasController->editPelicula($params[1]);
        break;
    case 'editargenero':
        $peliculasController->updateGenero($params[1]);   
        break; 
    case 'ediciongenero':
        $peliculasController->editGenero($params[1]);
        break; 
    case 'borrargenero':
        $peliculasController->deleteGenero($params[1]);
        break;    
    case 'agregarpelicula':
        $peliculasController->addPelicula();
        break;  
    case 'agregargenero':
        $peliculasController->addGenero();
        break;      
    default:
        echo('404 Page not found :(');
        break;

        //nuevos
}

