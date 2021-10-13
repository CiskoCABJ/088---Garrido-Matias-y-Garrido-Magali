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
    <title>Play Movie</title>
</head>
<header>
    <div class="cabecera-logo"> 
    <h1>Play Movie</h1>
    {if isset($usuario)}
        <h2> Hola {$usuario}!</h2>
    {/if}
    </div>
    <nav class="navegador">
    
        <a href="home">Inicio</a>
        <a href="generos">Generos</a>
        <a href="peliculas">Peliculas</a>
        
        <a href='{$state}'>{$state}</a>
      
    </nav>
</header>