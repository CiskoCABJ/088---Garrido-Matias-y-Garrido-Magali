<?php

define ('ROL', '10');

class UserModel{
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

   function newUser($usuario, $mail, $pass){
       $consulta = $this->db->prepare('INSERT INTO usuarios (id_usuario, usuario, mail, pass) VALUES (?, ? ,?, ? )');
       $consulta->execute(["",$usuario, $mail, $pass]);
    }

}