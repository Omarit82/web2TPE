<?php
    function getDiscos(){
        $db = new PDO('mysql:host=localhost;dbname=comercio_discos;charset=utf8', 'root', '');

        $query = $db->prepare('SELECT * FROM discos');
        $query->execute();

        $discos = $query->fetchAll(PDO::FETCH_OBJ);

        return $discos;
    }