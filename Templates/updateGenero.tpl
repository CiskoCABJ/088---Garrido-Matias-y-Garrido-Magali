
{include file='templates/header.tpl'}

<div class="jc-center d-flex-column form-genero">

    <form  class="d-flex-column" method="POST" action="ediciongenero/{$genero}">
        <input type="text" value="{$genero}" name="inp_genero">
        <input class="btn" type="submit" value="Editar">
    </form>

    <div>
        <table>
            <tr>
                <td>Titulo</td>
                <td>Genero</td>
                <td>Estreno</td>
            </tr>
            {foreach from=$peliculas item=$pelicula}
                <tr>
                    <td>{$pelicula->titulo}</td>
                    <td>{$pelicula->genero}</td>
                    <td>{$pelicula->estreno}</td>
                </tr>
                
            {/foreach}
        </table>
    </div> 
</div>