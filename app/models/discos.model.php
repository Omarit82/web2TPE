<?php

require_once './config.php';

class discosModel{
    
    private $db;

    public function __construct(){
        $this->db = new PDO("mysql:host=".MYSQL_HOST.";dbname=".MYSQL_DB.";charset=utf8",MYSQL_USER,MYSQL_PASS);
    }

    public function getDiscos(){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id' );
        $query->execute();
        $discos = $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }

    public function getDisco($id){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE discos.id = ?');
        $query->execute([$id]);
        $discos = $query->fetch(PDO::FETCH_OBJ);
        return $discos;
    }

    public function insertDisco($autor,$genero,$titulo,$precio){
        
        $query = $this->db->prepare('INSERT INTO discos(autor_id,genero_id,titulo,precio) VALUES (?,?,?,?)');
        $query->execute([$autor,$genero,$titulo,$precio]);
    
    }

    public function deleteDisco($id){
        $query = $this->db->prepare('DELETE FROM discos WHERE id = ?');
        $query->execute([$id]);

    }

    public function getDiscosPorGen($genero){
        $query = $this->db->prepare('SELECT discos.id, autor.nombre, genero.categoria, discos.titulo, discos.precio FROM discos INNER JOIN autor ON discos.autor_id = autor.id INNER JOIN genero ON discos.genero_id = genero.id  WHERE genero_id = ?');
        $query->execute([$genero]);

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }
}

?>