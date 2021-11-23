<?php
require_once 'libs/Router.php';
require_once '1-Controllers/ApiMoviesController.php';


// crea el router
$router = new Router();

// define la tabla de ruteo

$router->addRoute('comentarios', 'GET', 'ApiMoviesController', 'getComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ApiMoviesController', 'getComentariosPelicula');
$router->addRoute('comentarios', 'POST', 'ApiMoviesController', 'addComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiMoviesController', 'deleteComentario');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
