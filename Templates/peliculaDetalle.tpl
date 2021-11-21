{include file='templates/header.tpl'}
<div class="contenedor-detalles">
    <div>
        <img src="{$pelicula->img}">
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
<div class="contenedor-detalles d-flex-column">

    {if isset($usuario)}
        <div>
            <h3 class="texto-centrado">Califique esta pelicula!</h3>
           
                <form method="post" action="comentario">
                    <select name="inp-calificacion" required>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <input type="text" name="inp-comentario" placeholder="Comentario">
                    <input type="submit" value="Comentar">
                </form>

        </div

        <div class="contenedor-comentarios">
            <h2>Comentarios</h2>

            <div class="comentarios" id="div-comentarios">
            {foreach from=$comentarios item=$comentario}
                <p>{$comentario->id_pelicula}</p>
                
            {/foreach}

            </div>

        </div

    {/if}
</div>


