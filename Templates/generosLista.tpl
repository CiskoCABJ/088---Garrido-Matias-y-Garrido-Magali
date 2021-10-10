{include file='templates/header.tpl'}
<section>
    {foreach from=$generos item=$genero }

      <a href="genero/{$genero->genero}">{$genero->genero}</a>
        
    {/foreach}

</section>