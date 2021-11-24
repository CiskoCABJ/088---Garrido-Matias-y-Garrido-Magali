    {include file='templates/header.tpl'}

    <h1 class="titulo-seccion">{$titulo}</h1>

    {if $state}
        <div class="contenedor-filtro ">
            <form class="d-flex-row jc-center" method="post" action="filtrarpelicula">
                <input type="text" name="inp-busqueda" value="" placeholder="" >
              
                <input class="btn-filtro" type="submit" value="Filtrar">
            </form>
        </div>
    {/if}

    {if $rol neq ""}
        <div class="contenedor-agregar ">
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

    {if $pagina}
        <div class="paginado d-flex-row jc-center">
            <a href="peliculas/{$pagina-1}"><<</a>  
            <p>Pagina {$pagina} de {$paginas}</p>
            <a href="peliculas/{$pagina+1}">>></a>  
        </div>        
    {/if}
    

    <div class="contenedor-peliculas">
        {foreach from=$peliculas item=$pelicula}
            <div class="pelicula">

                {if $rol neq ""}
                    <div class="d-flex-row jc-right">
                        <a class="icono" href="editarpelicula/{$pelicula->id}">
                            <img src="./img/editar.png" >
                        </a>
                        <a class="icono" href="borrarpelicula/{$pelicula->id}">
                            <img src="./img/eliminar.png" >
                        </a>
                    </div>
                {/if}
                <img class="img-pelicula" src="{$pelicula->img}">
                <div class="detalle-pelicula">
                    <h2>{$pelicula->titulo}</h2>
                    <h4>{$pelicula->genero}</h4>
                    <p>{$pelicula->duracion} min</p>
                    <a class="btn" href="pelicula/{$pelicula->id}" >VER</a>
                </div>
            </div>        
        {/foreach}       
    </div>
    

    {if $pagina}
        <div class="paginado d-flex-row jc-center">
            <a href="peliculas/{$pagina-1}"><<</a>  
            <p>Pagina {$pagina} de {$paginas}</p>
            <a href="peliculas/{$pagina+1}">>></a>  
        </div>        
    {/if}


    