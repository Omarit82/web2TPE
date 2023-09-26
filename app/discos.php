<?php

require_once './app/db.php';

function showDiscos($user){
    $discos = getDiscos();
    require 'templates/header.php';
    require_once 'templates/formFiltro.php';
    if(isset($user)&($user === 'admin')){ 
        require 'templates/formAdd.php';
    }?>
    <section> <?php
        foreach($discos as $disco){ ?>
        <div class="verDisco">
            <h3><?php echo $disco->nombre?></h3>
            <p>
                Autor: <?php echo $disco->autor ?>  
                (<?php echo $disco->genero ?>)  |  Precio: <?php echo $disco->precio?>
            </p>
            <img src="./img/disco-img.jpg" alt="">
            <?php if(isset($user)&($user === 'admin')){ ?>   
                <a href="delete/<?php echo $disco->id?>" type="button" class="btn btn-danger">Borrar</a>
                <a href="mod/<?php echo $disco->id?>" type="button" class="btn btn-primary">Modificar</a>
            <?php } ?>
            <?php if(isset($user)&($user === 'user')){ ?>   
                <a href="buy/<?php echo $disco->id?>" type="button" class="btn btn-success">Comprar</a>
            <?php } ?>
        </div>
    <?php }?>
    </section>
    <?php 
    require "templates/footer.php";      
}

function addDisco(){
    $nombre = $_POST['titulo'];
    $autor = $_POST['autor'];
    $genero = $_POST['genero'];
    $precio = $_POST['precio'];

    insertDisco($nombre,$autor,$genero,$precio);

    header('Location: '. BASE_URL);
}

function removeDisco($id){
    deleteDisco($id);
    header('Location: '. BASE_URL);
}

function modDisco($id){

    require_once 'templates/header.php';
    require_once 'templates/formMod.php';
    
    
    if ((isset($_POST['titulo']))&&(isset($_POST['autor']))&&(isset($_POST['genero']))&&(isset($_POST['precio']))){
        $nombre = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];
        
        var_dump($nombre,$autor,$genero,$precio,$id);

        updateDisco($nombre,$autor,$genero,$precio,$id);
        
        header('Location: '. BASE_URL);
    }

    require_once 'templates/footer.php';
}

function filtro(){
    $gen = $_POST['genero'];
    $discos = showGeneros($gen);
    echo $discos;
    require_once 'templates/header.php';
    require_once 'templates/formFiltro.php';
    foreach($discos as $disco){ ?>
        <div class="verDisco">
            <h3><?php echo $disco->nombre?></h3>
            <p>
                Autor: <?php echo $disco->autor ?>  
                (<?php echo $disco->genero ?>)  |  Precio: <?php echo $disco->precio?>
            </p>
            <img src="./img/disco-img.jpg" alt="">
        </div>
   <?php }
}