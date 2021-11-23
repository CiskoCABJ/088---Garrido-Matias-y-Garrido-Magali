{include file='templates/header.tpl'}
<div class="contenedor-detalles">
    <div>
        <img class="img-detalle" src="{$pelicula->img}">
    </div>
    <div class="info-pelicula">
        <h1>{$pelicula->titulo}</h1>
        <h2>Genero: {$pelicula->genero}</h2>
        <p>{$pelicula->descripcion}</p>
        <p>Duración: {$pelicula->duracion}</p>
        <p>Reparto: {$pelicula->reparto}</p>
        <p>Año de estreno: {$pelicula->estreno}</p>

    </div>


    {if $rol neq ""}
        <form class="form-edicion" method="POST" action="edicionpelicula/{$pelicula->id}">
            <input type="text" name="inp_img" value="{$pelicula->img}">
            <input type="text" name="inp_titulo"  value="{$pelicula->titulo}">
            <select name="inp_genero" id="lista_generos">
            <option value="{$pelicula->genero}"> {$pelicula->genero} </option>
            <option disabled value=""> -------</option>
            {foreach from=$generos item=$genero}
                <option value="{$genero->genero}"> {$genero->genero} </option>
            {/foreach}
            <input type="text" name="inp_descripcion" value="{$pelicula->descripcion}">
            <input type="number" name="inp_duracion"  value="{$pelicula->duracion}">
            <input type="text" name="inp_reparto" value="{$pelicula->reparto}">
            <input type="number" name="inp_estreno"  value="{$pelicula->estreno}">

            <input class="btn" type="submit" value="Editar">
        </form>
    {/if}

    

</div>

<div class="vueApp contenedor-detalles d-flex-column">

    {if isset($usuario)}
        <div id="{$usuario}" class="userLogged">
            {include file='templates/vue/formCalificacion.tpl'}
        </div>
    {/if}
   

    <div class="idpelicula d-flex-column" id="{$pelicula->id}">
        {include file='templates/vue/comentariosList.tpl'}
    </div>

</div>


<script src="./js/apiComentarios.js"></script>

{include file='templates/footer.tpl'}


