    {include file='templates/header.tpl'}
    <h1>{$titulo}</h1>

    <div class="contenedor">

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
                    <a href="pelicula/{$pelicula->titulo}" >ver</a>
                </div>
            </div>
        
        {/foreach}
    </div>