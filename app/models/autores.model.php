<?php
require_once './config.php';

class AutoresModel{
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    }

    public function getAutores(){
        $query = $this->db->prepare('SELECT * FROM autor');
        $query->execute();

        $autor = $query->fetchAll(PDO::FETCH_OBJ);

        return $autor;
    }
}