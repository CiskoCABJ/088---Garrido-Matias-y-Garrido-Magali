{literal}
   
    <form class="form-calificacion d-flex-column centrar-contenido"  method="post">
        <div class="d-flex-row jc-center">
            <input id="inp-user" type="text" :value="usuario"  readonly onmousedown="return false;" />
            <select id="inp-calificacion" name="inp-calificacion" required>
                <option disabled selected > CALIFIQUE</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <input id="inp-comentario" type="text" name="inp-comentario" placeholder="Comentario">
        </div>
        <button class="btn-comentario" id="btn-nuevo" >
            Comentar
        </button>
    </form>
{/literal}