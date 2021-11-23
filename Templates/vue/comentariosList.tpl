{literal}
     <div class="d-flex-row jc-center" v-if="usuario!=null">

        <div class="d-flex-row">
            <p>Calificacion</p>
            <a class="icono" v-on:click="orderBy('calificacion','DESC')">
                <img src="./img/flechaarriba.png" >
            </a>
            <a class="icono" v-on:click="orderBy('calificacion', 'ASC')">
                <img src="./img/flechaabajo.png" >
            </a>
        </div>
        <div class="d-flex-row">
            <p>Fecha</p>
            <a class="icono" v-on:click="orderBy('id_comentario', 'DESC')">
                <img src="./img/flechaarriba.png"  > 
            </a>
            <a class="icono" v-on:click="orderBy('id_comentario', 'ASC')">   
                <img src="./img/flechaabajo.png" >
            </a>
           
        </div>
        

    </div>


    <div class="d-flex-column caja-comentario" v-for="comentario in comentarios" v-if="comentario.id_pelicula == pelicula">
        
        <div class="d-flex-row jc-sb">
            <a class="icono" v-on:click="deleteComentario(comentario.id_comentario)" v-if="admin">
                <img src="./img/eliminar.png" >
            </a>
            <h3 class="autor texto-centrado">{{comentario.usuario}} </h3>

            <div class="d-flex-row calificacion jc-center">
                <div class="icono" v-for="i in parseInt(comentario.calificacion)" >
                    <img src="./img/estrella.png">
                </div>
            </div>


        </div>
        <p class="texto-centrado">{{comentario.comentario}} </p>
        
    
    </div>
{/literal}
