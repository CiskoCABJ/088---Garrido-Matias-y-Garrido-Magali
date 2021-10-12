<?php

class PeliculasModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getPeliculas(){
        $consulta = $this->db->prepare('SELECT * FROM peliculas');
        $consulta->execute();
        $peliculas = $consulta->fetchAll(PDO::FETCH_OBJ);
  
        return $peliculas;
    }

    function getPeliculasEstreno(){
        $date = date("Y");
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE estreno='$date'");
        $consulta->execute();
        $peliculasEstreno = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $peliculasEstreno;
    }

    function getGeneros(){
        $consulta = $this->db->prepare('SELECT * FROM generos');
        $consulta->execute();
        $generos = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }

    function getPeliculasByGenero($genero){
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE genero='$genero'");
        $consulta->execute();
        $peliculasByGenero = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $peliculasByGenero;
    }

    function getPelicula($idpelicula){
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE id=?");
        $consulta->execute(array($idpelicula));
        $detallePelicula = $consulta->fetch(PDO::FETCH_OBJ);
        return $detallePelicula;
    }

    function addPelicula($img , $titulo , $genero , $descripcion , $duracion, $reparto, $estreno){
        $sentencia = $this->db->prepare("INSERT INTO peliculas (img,titulo,genero,descripcion,duracion,reparto,estreno) VALUES(?,?,?,?,?,?,?)");
        $sentencia->execute(array($img, $titulo, $genero, $descripcion, $duracion, $reparto, $estreno));

    }

    function deletePelicula($idpelicula){
        $consulta = $this->db->prepare("DELETE FROM peliculas WHERE id=?");
        $consulta->execute(array($idpelicula));
    }

    function updatePelicula($idpelicula, $img , $titulo , $genero , $descripcion , $duracion, $reparto){
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo='$titulo', genero='$genero' , descripcion='$descripcion', img='$img' ,duracion='$duracion' , reparto = '$reparto' WHERE id =?");
        $sentencia->execute(array($idpelicula));
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