<?php

class PeliculasModel {
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getPeliculas($pagina){
        $consulta = $this->db->prepare('SELECT * FROM peliculas LIMIT ?, ?' );
        $consulta->bindParam(1, $pagina, PDO::PARAM_INT);
        $porPagina = ITEM_POR_PAGINA;
        $consulta->bindParam(2, $porPagina, PDO::PARAM_INT);
        $consulta->execute();
        $peliculas = $consulta->fetchAll(PDO::FETCH_OBJ);
  
        return $peliculas;
    }
    function getAllPeliculas(){
        $consulta = $this->db->prepare('SELECT * FROM peliculas' );
        $consulta->execute();
        $peliculas = $consulta->fetchAll(PDO::FETCH_OBJ);  
        return $peliculas;
    }

    function getPeliculasFiltradas($filtro){
        $consulta = $this->db->prepare('SELECT * FROM peliculas WHERE titulo LIKE ? OR
                                                                      descripcion LIKE ? OR
                                                                      duracion LIKE ? OR
                                                                      genero LIKE ? OR
                                                                      estreno LIKE ?' );
        $consulta->execute(array("%$filtro%","%$filtro%","%$filtro%","%$filtro%","%$filtro%"));
        $peliculas = $consulta->fetchAll(PDO::FETCH_OBJ);  
        return $peliculas;
    }

    function getPeliculasEstreno(){
        $date = date("Y");
        $consulta = $this->db->prepare("SELECT * FROM peliculas WHERE estreno=?");
        $consulta->execute(array($date));
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
        $sentencia = $this->db->prepare("UPDATE peliculas SET titulo=?, genero=? , descripcion=?, img=? ,duracion=? , reparto =? , estreno = ? WHERE id =?");
        $sentencia->execute(array($titulo, $genero, $descripcion, $img, $duracion, $reparto, $estreno,$idpelicula));
    }

    function countPeliculas(){
        $consulta = $this->db->prepare('SELECT COUNT(*) as total FROM peliculas');
        $consulta->execute();
        return ($consulta->fetchColumn());
    }
  

  


}