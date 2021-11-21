{literal}
<div id="app">
  

    <table>
        <tr>
            <td>Usuario</td>
            <td>Calificacion</td>
            <td>Comentario</td>
        </tr>
        <tr v-for="comentario in comentarios" v-if="comentario.id_pelicula == pelicula">
            <td>{{comentario.usuario}} </td>
            <td>{{comentario.calificacion}} </td>
            <td>{{comentario.comentario}} </td>
            <td v-if="admin==0">
                <button id:comentario.id_comentario class="btn-borrar">Borrar</button>
            </td>
        </tr>
    </table>
  

</div>
{/literal}
