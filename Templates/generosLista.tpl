
{include file='templates/header.tpl'}

 {if $rol neq ""}
        <h3>Agregar genero</h3>
        <form method="POST" action="agregargenero">
            <input type="text" name="inp_genero" value="" placeholder="Genero" required>
            <input type="submit" value="Agregar">
        </form>
{/if}
    
<section class="contenedor-generos">
    {foreach from=$generos item=$genero }
      <a href="genero/{$genero->genero}">{$genero->genero}</a>
     {if $rol neq ""}
     <div class="d-flex-row jc-right">              
        <a class="icono" href="editargenero/{$genero->genero}">
            <img src="./img/editar.png" >
        </a>
        <a class="icono" href="borrargenero/{$genero->genero}">
            <img src="./img/eliminar.png" >
       </a>
     </div>  
            {/if}
    
        
    {/foreach}

</section>
