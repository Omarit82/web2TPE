<?php

class GenerosModel{
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8','root','');
    }

    public function getCategorias(){
        $query = $this->db->prepare('SELECT * FROM genero');
        $query->execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ);

        return $generos;
    }

}