{include file='templates/header.tpl'}
<div>
    <img src="{$pelicula->img}">
    <h1>{$pelicula->titulo}</h1>
    <h2>{$pelicula->genero}</h2>
    <p>{$pelicula->descripcion}</p>
    <p>{$pelicula->duracion}</p>
    <p>{$pelicula->reparto}</p>
</div>

 {if isset($usuario)}
       <form method="POST" action="edicion/{$pelicula->id}">
            <input type="text" name="inp_img" value="{$pelicula->img}">
            <input type="text" name="inp_titulo"  value="{$pelicula->titulo}">
            <select name="inp_genero" id="lista_generos">
            {foreach from=$generos item=$genero}
                <option value="{$genero->genero}"> {$genero->genero} </option>
            {/foreach}
            <input type="text" name="inp_descripcion" value="{$pelicula->descripcion}">
            <input type="number" name="inp_duracion"  value="{$pelicula->duracion}">
            <input type="text" name="inp_reparto" value="{$pelicula->reparto}">

            <input type="submit" value="Editar">
        </form>
{/if}