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
<!-- development version, includes helpful console warnings -->
<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <title>Play Movie</title>
</head>
<header>
    <div class="cabecera-logo"> 
        <div class="titulo-cabecera">
            <h1>Play Movie</h1>
        </div>

        <div class="panel-user">
            {if isset($usuario)}
                {if $rol neq ""}
                    <a id="{$rol}" class="rol" href="usuarios"> Panel Administrador</a>
                {/if}
                <h3> Hola {$usuario}!</h3>
            {/if}
        </div>

    </div>

    <nav class="navegador">
    
        <a href="home">Inicio</a>
        <a href="generos">Generos</a>
        <a href="peliculas">Peliculas</a>
        
        <a href='{$state}'>{$state}</a>
      
    </nav>
</header>

<body>