{include file='templates/header.tpl'}

<h1 class="titulo-seccion">Panel Admin </h1>

<div class="contenedor-panelAdmin">

    <table>

        <tr>
            <td>Usuario</td>
            <td>e-mail</td>
            <td>Borrar</td>
            <td>Admin</td>
            
        <tr>

        {foreach from=$users item=$user}  
            {if $user->usuario != $usuario}
                <tr>
                    <td>{$user->usuario}</td>
                    <td>{$user->mail}</td>

                    <td>
                        <a class="icono" href="borrarusuario/{$user->id_usuario}">
                            <img src="./img/eliminar.png" >
                        </a>
                    </td>

                    <td>                    
                        {if $user->rol}
                            <a class="icono" href="quitaradmin/{$user->id_usuario}">
                                <img src="./img/quitarAdmin.png" >
                            </a>
                        {else}
                            <a class="icono" href="daradmin/{$user->id_usuario}">
                                <img src="./img/darAdmin.png" >
                            </a>
                            
                        {/if}
                    </td>
                </tr>
            {/if}
        {/foreach}
    </table>
</div>