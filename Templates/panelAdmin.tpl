{include file='templates/header.tpl'}

<h1>Panel Admin </h1>

<table>

    <tr>
        <td>Usuario<td>
        <td>e-mail<td>
        <td>Rol<td>
        <td>Borrar<td>
        <td>Admin<td>
        
    <tr>

    {foreach from=$users item=$user}  
       <tr>
            <td>{$user->usuario}<td>
            <td>{$user->mail}<td>
            <td>{$user->rol}<td>
        <tr>

    {/foreach}
</table>