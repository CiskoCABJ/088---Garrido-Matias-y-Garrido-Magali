<?php
require_once 'libs/Router.php';
require_once 'Controllers/ApiPeliculasController.php';
require_once 'Controllers/ApiGenerosController.php';

// crea el router
$router = new Router();

// define la tabla de ruteo
$router->addRoute('peliculas', 'GET', 'ApiPeliculasController', 'getPeliculas');
$router->addRoute('peliculas/:ID', 'GET', 'ApiPeliculasController', 'getPelicula');
$router->addRoute('peliculas', 'POST', 'ApiPeliculasController', 'addPelicula');
$router->addRoute('peliculas/:ID', 'DELETE', 'ApiPeliculasController', 'deletePelicula');


$router->addRoute('generos', 'GET', 'ApiGenerosController', 'getGeneros');
$router->addRoute('generos/:ID', 'GET', 'ApiGenerosController', 'getGenero');
$router->addRoute('generos', 'POST', 'ApiGenerosController', 'addGenero');
$router->addRoute('generos/:ID', 'DELETE', 'ApiGenerosController', 'deleteGenero');


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
