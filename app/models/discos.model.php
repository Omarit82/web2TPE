<?php

require_once './config.php';

class discosModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    }

    function getDiscos(){
        $query = $this->db->prepare('SELECT * FROM discos');
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }
    function getDisco($id){
        $query = $this->db->prepare('SELECT * FROM discos WHERE id = ?');
        $query->execute([$id]);
        $discos = $query->fetch(PDO::FETCH_OBJ);
        return $discos;
    }

    function insertDisco($nombre,$autor,$genero,$precio){
        $query = $this->db->prepare('INSERT INTO discos(nombre,autor,genero,precio) VALUES (?,?,?,?)');
        $query->execute([$nombre,$autor,$genero,$precio]);
    
    }

    function deleteDisco($id){
        
        $query = $this->db->prepare('DELETE FROM discos WHERE id = ?');
        $query->execute([$id]);

    }

    public function getDiscosPorGen($genero){
        $query = $this->db->prepare('SELECT * FROM discos WHERE genero = ?');
        $query->execute([$genero]);

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }
}

?>