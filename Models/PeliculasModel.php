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

    function getDetallePelicula($pelicula){
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE titulo=?");
        $consulta->execute(array($pelicula));
        $detallePelicula = $consulta->fetch(PDO::FETCH_OBJ);
        return $detallePelicula;
    }
}