{literal}
<div class="d-flex-column" v-for="comentario in comentarios" v-if="comentario.id_pelicula == pelicula">
    
    <div class="d-flex-row jc-sb">
        <h3 class="autor texto-centrado">{{comentario.usuario}} </h3>

        <div class="d-flex-row calificacion jc-center">
            <div class="icono" v-for="i in parseInt(comentario.calificacion)" >
                <img src="./img/estrella.png">
            </div>
        </div>
    </div>
    
    <p class="texto-centrado">{{comentario.comentario}} </p>

        <button class="btn" v-if="admin" v-on:click="deleteComentario(comentario.id_comentario)" class="btn-borrar">
            Borrar
        </button>



</div>
{/literal}
