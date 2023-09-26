<?php
    
    require_once 'discos.php';
    require_once 'login.php';
    
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
    
    function checkUser($email,$pass){
        $db = getConection();
        $query = $db->prepare('SELECT * FROM users WHERE email=? AND pass=?');
        $query -> execute([$email,$pass]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        if ($user === false){
            showLogin($user);
        }else{
           $nivel = $user->nivel;
           showLogin($nivel);
        }
    }

    function showGeneros($gen){
        $db = getConection();
        $query = $db->prepare('SELECT * FROM discos WHERE genero=?');
        $query ->execute([$gen]);

        $discos= $query->fetchAll(PDO::FETCH_OBJ);
        return $discos;
    }

    function getGen(){
        $db = getConection();
        $query = $db->prepare('SELECT * FROM genero');
        $query ->execute();

        $generos = $query->fetchAll(PDO::FETCH_OBJ);
        return $generos;
    }
    
