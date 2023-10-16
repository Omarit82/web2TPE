<?php 

class UsersModel {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8','root','');
    }
    
    public function getUser($user){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ?');
        $query->execute([$user]);
        $usuario = $query->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    public function getAllUsers(){
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();
        $usuarios = $query->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }
} 