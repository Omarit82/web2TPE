<?php

class discosModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8','root','');
    }

    function getDiscos(){
        $query = $this->db->prepare('SELECT * FROM discos');
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
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

    function updateDisco($nombre,$autor,$genero,$precio,$id){

        $query = $this->db->prepare('UPDATE discos SET nombre = ?, autor = ?, genero = ?, precio = ? WHERE id = ?');
        $query->execute([$nombre,$autor,$genero,$precio,$id]);
    }

    public function getDiscosPorGen($genero){
        $query = $this->db->prepare('SELECT * FROM discos WHERE genero = ?');
        $query->execute([$genero]);

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }
}

?>