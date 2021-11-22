"use strict"

const url = "http://127.0.0.1/PROYECTOS/088%20-%20Garrido%20Matias%20y%20Garrido%20Magali/api/comentarios";


let peli = document.querySelector(".idpelicula").getAttribute("id");
let user = null;
if (document.querySelector(".userLogged")) {
    user = document.querySelector(".userLogged").getAttribute("id");
}

let adminRol = null;
if (document.querySelector(".rol") != null) {
    adminRol = document.querySelector(".rol").getAttribute("id");
};



let app = new Vue({
    el: ".vueApp",
    data: {
        comentarios: [],
        pelicula: peli,
        usuario: user,
        admin: adminRol
    },
    methods: {

        deleteComentario: async function(id) {
            try {
                let res = await fetch(`${url}/${id}`, {
                    "method": "DELETE",
                });
                if (!res.ok) {
                    console.log(res);
                } else {
                    getComentarios();
                }
            } catch (error) {
                console.log(error);
                console.log(e);
            }
        }
    }
});

if (document.querySelector("#btn-nuevo") != null) {

    let btnNuevo = document.querySelector("#btn-nuevo");
    btnNuevo.addEventListener("click", generarComentario);
}




getComentarios();



function generarComentario(e) {
    e.preventDefault();

    let usuario = document.getElementById("inp-user").value;
    let calificacion = document.getElementById("inp-calificacion").value;
    let inpcomentario = document.getElementById("inp-comentario").value;

    let comentario = {
        "usuario": usuario,
        "id_pelicula": app.pelicula,
        "calificacion": calificacion,
        "comentario": inpcomentario,
    };

    cargarComentario(comentario);
}

async function cargarComentario(comentario) {
    try {
        let res = await fetch(url, {
            "method": "POST",
            "headers": { "Content-Type": "application/json" },
            "body": JSON.stringify(comentario)
        });
        if (res.ok) {
            getComentarios();
        } else {
            console.log(res);
        }
    } catch (error) {
        console.log(error);
    }

}

async function getComentarios() {
    try {
        let res = await fetch(`${url}/${app.pelicula}`);
        let json = await res.json();

        app.comentarios = json;

    } catch (error) {
        console.log(error);
    }
}