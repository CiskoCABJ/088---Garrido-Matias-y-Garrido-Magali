<?php
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$params = explode('/', $action);

switch($params[0]){
    case 'home':
        showHome();
        break;
    case 'generos':
        showGeneros();
        break;
    case 'peliculas': 
        showPeliculas();
        break;
    case 'login':
        login();
        break;
    case 'logout':
        logout();
        break;
    case 'verify':
        verifyLogin();
        break;
    default:
        echo('404 Page not found :(');
        break;
}