"use strict"

const url = "http://127.0.0.1/PROYECTOS/088%20-%20Garrido%20Matias%20y%20Garrido%20Magali/api/comentarios";


let peli = document.querySelector(".comentarios-div").getAttribute("id");


let btnBorrarComentario = document.querySelectorAll(".btn-borrar");
btnBorrarComentario.forEach(b => b.addEventListener("click", function(e) {
    deleteComentario(b.getAttribute("id"));
}));

let app = new Vue({
    el: ".comentarios-div",
    data: {
        comentarios: [],
        pelicula: peli,
        admin: false,
    },
});

getComentarios();

async function getComentarios() {
    try {
        let res = await fetch(`${url}/${app.pelicula}`);
        let json = await res.json();

        app.comentarios = json;

    } catch (error) {
        console.log(error);
    }
}

async function deleteComentario(id) {

    try {
        let res = await fetch(`${url}/${id}`, {
            "method": "DELETE"
        });

    } catch (error) {
        console.log(error);
        console.log(e);
    }

}