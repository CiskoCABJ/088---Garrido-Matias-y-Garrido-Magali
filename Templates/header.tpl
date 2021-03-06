<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">

    <!-- development version, includes helpful console warnings -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Play Movie</title>
</head>
<header>
    <div class="cabecera-logo"> 
        <div class="titulo-cabecera">
            <h1>Play Movie</h1>
        </div>

        <div class="panel-user d-flex-column">
            {if isset($usuario)}
            <h3> Hola {$usuario}!</h3>
                {if $rol neq ""}
                    <a class="btn-admin rol" id="{$rol}" href="usuarios"> Panel Administrador</a>
                {/if}
                
            {/if}
        </div>

    </div>

    <nav class="navegador">
    
        <a href="home">Inicio</a>
        <a href="generos">Generos</a>
        <a href="peliculas">Peliculas</a>
        {if $state}
            <a href="Logout"> Logout</a>
        {else}
             <a href="Login"> Login</a>
        {/if}
      
    </nav>
</header>

<body>