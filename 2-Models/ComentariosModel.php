<?php


class ComentariosModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getComentarios($pelicula){
        $consulta = $this->db->prepare('SELECT * FROM comentarios WHERE id_pelicula = ? ');
        $consulta->execute([$pelicula]);
        $comentarios = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $comentarios;
    }

    function addComentario($calificacion, $comentario ,$idPelicula){
        $sentencia = $this->db->prepare("INSERT INTO comentarios (calificacion, comentario, id_pelicula) VALUES(?)");
        $sentencia->execute(array($calificacion, $comentario, $idPelicula));
    }

   
}