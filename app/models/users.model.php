<?php 

class UsersModel {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8','root','');
    }
    
    public function getUser($user,$clave){
        $query = $this->db->prepare('SELECT * FROM users WHERE email = ? and password = ?');
        $query->execute([$user,$clave]);
        $usuario = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $usuario;
    }
} 