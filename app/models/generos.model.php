<?php
require_once './config.php';

class GenerosModel{
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    }

    public function getCategorias(){
        $query = $this->db->prepare('SELECT * FROM genero');
        $query->execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

    public function insertGenero($categoria){
        $query = $this->db->prepare('INSERT INTO genero(categoria) VALUES (?)');
        $query->execute([$categoria]);
    }

    public function deleteGenero($id){
        $query = $this->db->prepare('DELETE FROM genero WHERE id = ?');
        $query->execute([$id]);
    }

    public function modificarGenero($id){
        $query = $this->db->prepare('SELECT * FROM genero WHERE id=?');
        $query->execute([$id]);
        $gen = $query->fetch(PDO::FETCH_OBJ); 
        return $gen;
    }

    public function updateGenero($id,$categoria){
        $query = $this->db->prepare('UPDATE genero SET categoria = ? WHERE id = ?');
        $query->execute([$categoria,$id]);
    }
}