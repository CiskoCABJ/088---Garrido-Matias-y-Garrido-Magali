{include file='templates/header.tpl'}

<h1 class="titulo-seccion">Panel Admin </h1>

<div class="contenedor-panelAdmin">

    <table>

        <tr>
            <td>Usuario</td>
            <td>e-mail</td>
            <td>Rol</td>
            <td>Borrar</td>
            <td>Admin</td>
            
        <tr>

        {foreach from=$users item=$user}  
        <tr>
                <td>{$user->usuario}</td>
                <td>{$user->mail}</td>
                <td>{$user->rol}</td>
                <td>
                    <a class="icono" href="">
                        <img src="./img/eliminar.png" >
                    </a>
                </td>

                <td>
                    <a class="icono" href="">
                        <img src="./img/editar.png" >
                    </a>
                </td>
            </tr>

        {/foreach}
    </table>
</div>