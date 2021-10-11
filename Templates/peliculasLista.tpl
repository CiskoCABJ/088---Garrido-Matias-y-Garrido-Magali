    {include file='templates/header.tpl'}

    <h1 class="titulo-seccion">{$titulo}</h1>

    <div class="contenedor-peliculas">

        {foreach from=$peliculas item=$pelicula}
        
            <div class="pelicula">

            {if $rol neq ""}
                {include file="templates/adminEdit.tpl"}
                
            {/if}
                <img class="img-pelicula" src="{$pelicula->img}">
                <div class="detalle-pelicula">
                    <h2>{$pelicula->titulo}</h2>
                    <h3>{$pelicula->genero}</h3>
                    <h4>{$pelicula->duracion} min</h4>
                    <a href="pelicula/{$pelicula->id}" >ver</a>
                </div>
            </div>
        
        {/foreach}
    </div>