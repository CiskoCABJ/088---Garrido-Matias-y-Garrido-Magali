"use strict"
const url = "api/comentarios";


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
        admin: adminRol,
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
        },

        orderBy: async function(sort, order) {


            try {
                let response = await fetch(`${url}/${app.pelicula}?sort=${sort}&order=${order}`);
                let json = await response.json();
                app.comentarios = json;
            } catch (error) {
                console.log(error);
            }
        },

        sinOrder: function() {
            getComentarios();
        }
    }
});

if (document.querySelectorAll(".btn-estrella") != null) {

    let btnNuevo = document.querySelectorAll(".btn-estrella");
    btnNuevo.forEach(b => b.addEventListener("click", generarComentario));
}

getComentarios();

function generarComentario(e) {
    e.preventDefault();
    let arrCalificacion = this.getAttribute("id");
    let inpcomentario;
    if (document.getElementById("inp-comentario").value != "") {
        inpcomentario = document.getElementById("inp-comentario").value;
        document.getElementById("inp-comentario").value = "";
    } else {
        getComentarios();
    }
    let calificacion = arrCalificacion.split("-")[1];

    let comentario = {
        "usuario": app.usuario,
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