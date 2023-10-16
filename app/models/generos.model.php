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

}