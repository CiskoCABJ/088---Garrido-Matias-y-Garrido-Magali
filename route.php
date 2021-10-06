<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

require_once('Controllers/PeliculasController.php');
require_once('Controllers/LoginController.php');
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
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
    case 'login':
        $loginController->login();
        break;
    case 'logout':
        logout();
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
    default:
        echo('404 Page not found :(');
        break;

        //nuevos
}

