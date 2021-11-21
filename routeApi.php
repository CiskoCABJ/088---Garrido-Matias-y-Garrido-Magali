<?php
require_once 'libs/Router.php';
require_once '1-Controllers/ApiMoviesController.php';


// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('peliculas', 'GET', 'ApiMoviesController', 'getPeliculas');
$router->addRoute('peliculas/:ID', 'GET', 'ApiMoviesController', 'getPelicula');
$router->addRoute('peliculas', 'POST', 'ApiMoviesController', 'addPelicula');
$router->addRoute('peliculas/:ID', 'DELETE', 'ApiMoviesController', 'deletePelicula');


$router->addRoute('generos', 'GET', 'ApiMoviesController', 'getGeneros');
$router->addRoute('generos/:ID', 'GET', 'ApiMoviesController', 'getGenero');
$router->addRoute('generos', 'POST', 'ApiMoviesController', 'addGenero');
$router->addRoute('generos/:ID', 'DELETE', 'ApiMoviesController', 'deleteGenero');




$router->addRoute('comentarios', 'GET', 'ApiMoviesController', 'getComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'ApiMoviesController', 'getComentariosPelicula');
$router->addRoute('comentarios/:ID', 'POST', 'ApiMoviesController', 'addComentario');
$router->addRoute('comentarios/:ID', 'DELETE', 'ApiMoviesController', 'deleteComentario');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
