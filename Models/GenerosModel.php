<?php

class GenerosModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getGeneros(){
        $consulta = $this->db->prepare('SELECT * FROM generos');
        $consulta->execute();
        $generos = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }

    function getGenero($id){
        $consulta = $this->db->prepare('SELECT * FROM generos WHERE genero=?');
        $consulta->execute(array($id));
        $genero = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $genero;
    }

    function getPeliculasByGenero($genero){
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE genero='$genero'");
        $consulta->execute();
        $peliculasByGenero = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $peliculasByGenero;
    }

    function addGenero($genero){
        $sentencia = $this->db->prepare("INSERT INTO generos (genero) VALUES(?)");
        $sentencia->execute(array($genero));

    }

    function deleteGenero($genero){
        $consulta = $this->db->prepare("DELETE FROM generos WHERE genero=?");
        $consulta->execute(array($genero));
    }

    function updateGenero($genero, $inp_genero){
        $sentencia = $this->db->prepare("UPDATE generos SET genero='$inp_genero' WHERE genero =?");
        $sentencia->execute(array($genero));
    }
}