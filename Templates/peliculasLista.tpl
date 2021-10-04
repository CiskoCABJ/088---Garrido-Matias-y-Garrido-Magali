{foreach from=$peliculas item=$pelicula}
    
    <div>
        <img src="{$pelicula->img}">
        <h2>{$pelicula->titulo}</h2>
        <h3>{$pelicula->id_genero}</h3>
        <h4>{$pelicula->duracion}</h4>
        <a href="pelicula/{$pelicula->titulo}" >ver</a>
    </div>
{/foreach}