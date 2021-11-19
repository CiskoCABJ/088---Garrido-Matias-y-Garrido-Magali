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
    function getPeliculasByGenero($genero){
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE genero=?");
        $consulta->execute(array($genero));
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

    function updatePelicula($idpelicula, $img , $titulo , $genero , $descripcion , $duracion, $reparto, $estreno){
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo='$titulo', genero='$genero' , descripcion='$descripcion', img='$img' ,duracion='$duracion' , reparto = '$reparto' , estreno = '$estreno' WHERE id =?");
        $sentencia->execute(array($idpelicula));
    }

  

  


}