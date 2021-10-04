<section>
{foreach from=$generos item=$genero }

<a href="genero/{$genero->id_genero}">{$genero->genero}</a>
    
{/foreach}

</section>