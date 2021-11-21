<?php


class ComentariosModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }
    function getComentarios(){
        $consulta = $this->db->prepare('SELECT * FROM comentarios');
        $consulta->execute();
        $comentarios = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $comentarios;
    }

    function getComentariosPelicula($pelicula){
        $consulta = $this->db->prepare("SELECT * FROM comentarios WHERE id_pelicula=?");
        $consulta->execute([$pelicula]);
        $comentarios = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $comentarios;
    }

    function addComentario($usuario,$idPelicula, $calificacion ,$comentario){
        $sentencia = $this->db->prepare("INSERT INTO comentarios (usuario, id_pelicula , calificacion, comentario) VALUES(?,?,?,?)");
        $sentencia->execute(array($usuario, $idPelicula,$calificacion, $comentario));
    }

    function getComentario($idComentario){
        $consulta = $this->db->prepare('SELECT * FROM comentarios WHERE id_comentario=? ');
        $consulta->execute([$idComentario]);
        $comentario = $consulta->fetch(PDO :: FETCH_OBJ);
        return $comentario;
    }

    function deleteComentario($idComentario){
        $consulta = $this->db->prepare("DELETE FROM comentarios WHERE id_comentario=?");
        $consulta->execute(array($idComentario));
    }

   
}