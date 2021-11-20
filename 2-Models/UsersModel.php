<?php

define ('ROL', '10');

class UsersModel{
    private $db;

    function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=tpe_web2;charset=utf8', 'root', '');
    }

    function getUser($param){
        $consulta = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ? ');
        $consulta->execute([$param]);
        $user = $consulta->fetch(PDO :: FETCH_OBJ);
        return $user;
    }

    function getUsers(){
        $consulta = $this->db->prepare('SELECT * FROM usuarios');
        $consulta->execute();
        $users = $consulta->fetchAll(PDO :: FETCH_OBJ);
        return $users;
    }

    function newUser($usuario, $mail, $pass){
        $consulta = $this->db->prepare('INSERT INTO usuarios (id_usuario, usuario, mail, pass) VALUES (?, ? ,?, ? )');
        $consulta->execute(["",$usuario, $mail, $pass]);
    }

    function deleteUsuario($idUsuario){
        $consulta = $this->db->prepare("DELETE FROM usuarios WHERE id_usuario=?");
        $consulta->execute(array($idUsuario));
    }

    function upgrade($idUsuario){
        $consulta = $this->db->prepare("UPDATE usuarios SET rol=? WHERE id_usuario=?");
        $consulta->execute(array(1,$idUsuario));
    }
    function downgrade($idUsuario){
        $consulta = $this->db->prepare("UPDATE usuarios SET rol=? WHERE id_usuario=?");
        $consulta->execute(array(null,$idUsuario));
    }
}