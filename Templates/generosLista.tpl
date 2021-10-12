
{include file='templates/header.tpl'}

   <h1 class="titulo-seccion">{$titulo}</h1>

 {if $rol neq ""}
    <div class="contenedor-agregar">
        <h3 class="titulo-formulario">Agregar genero</h3>
        <form class="form-genero" method="POST" action="agregargenero">
            <input class="inp-genero" type="text" name="inp_genero" value="" placeholder="Genero" required>
            <input class="btn" type="submit" value="Agregar">
        </form>
    </div>
{/if}
    
<section class="contenedor-generos">
    {foreach from=$generos item=$genero }
      <div class="d-flex-row jc-sb genero">
            <a class="btn" href="genero/{$genero->genero}">{$genero->genero}</a>
            {if $rol neq ""}
                <div class="d-flex-row jc-right icono-genero">              
                    <a class="icono" href="editargenero/{$genero->genero}">
                        <img src="./img/editar.png" >
                    </a>
                    <a class="icono" href="borrargenero/{$genero->genero}">
                        <img src="./img/eliminar.png" >
                     </a>
                </div>  
            {/if}
        </div>
        
    {/foreach}

</section>
