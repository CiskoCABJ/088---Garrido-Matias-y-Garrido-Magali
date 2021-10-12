    {include file='templates/header.tpl'}

    <h1 class="titulo-seccion">{$titulo}</h1>

    {if $rol neq ""}
        <div class="contenedor-agregar">
        <h3 class="titulo-formulario">Agregar pelicula</h3>
        <form class="form-add" method="POST" action="agregarpelicula">
            <input type="text" name="inp_img" value="" placeholder="Ruta de img" required>
            <input type="text" name="inp_titulo"  value="" placeholder="Titulo" required>

            <select name="inp_genero" id="lista_generos" required>
            {foreach from=$generos item=$genero}
                <option value="{$genero->genero}"> {$genero->genero} </option>
            {/foreach}
            
            <input type="text-area" name="inp_descripcion" value="" placeholder="Descripcion" required>
            <input type="number" name="inp_duracion"  value="" placeholder="Duracion" required>
            <input type="text" name="inp_reparto" value="" placeholder="Reparto" required>
            <input type="number" name="inp_estreno" value="" placeholder="Estreno" required>
            <input class="btn" type="submit" value="Agregar">
        </form>
        </div>

    {/if}

    <div class="contenedor-peliculas">

        {foreach from=$peliculas item=$pelicula}
        
            <div class="pelicula">

            {if $rol neq ""}
            <div class="d-flex-row jc-right">
                <a class="icono" href="editar/{$pelicula->id}">
                    <img src="./img/editar.png" >
                </a>
                <a class="icono" href="borrar/{$pelicula->id}">
                    <img src="./img/eliminar.png" >
                </a>
                </div>
            {/if}
                <img class="img-pelicula" src="{$pelicula->img}">
                <div class="detalle-pelicula">
                    <h2>{$pelicula->titulo}</h2>
                    <h3>{$pelicula->genero}</h3>
                    <h4>{$pelicula->duracion} min</h4>
                    <a class="btn" href="pelicula/{$pelicula->id}" >VER</a>
                </div>
            </div>
        
        {/foreach}
    </div>