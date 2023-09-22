<?php
    
    require_once 'discos.php';
    
    function getConection(){
        
        return new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8','root','');

    }
    
    function getDiscos(){
        $db = getConection();

        $query = $db->prepare('SELECT * FROM discos');
        $query->execute();

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }

    function insertDisco($nombre,$autor,$genero,$precio){
        $db = getConection();

        $query = $db->prepare('INSERT INTO discos(nombre,autor,genero,precio) VALUES (?,?,?,?)');
        $query->execute([$nombre,$autor,$genero,$precio]);
    }

    function deleteDisco($id){
        $db = getConection();

        $query = $db->prepare('DELETE FROM discos WHERE id = ?');
        $query->execute([$id]);
    }

    function updateDisco($nombre,$autor,$genero,$precio,$id){
        $db = getConection();

        $query = $db->prepare('UPDATE discos SET nombre = ?, autor = ?, genero = ?, precio = ? WHERE id = ?');
        $query->execute([$nombre,$autor,$genero,$precio,$id]);
    }