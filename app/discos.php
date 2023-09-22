<?php

require_once './app/db.php';

function showDiscos(){
    $discos = getDiscos();
    
    require 'templates/header.php';

    require 'templates/form.php';
    ?>
    
    <section>

    <?php
        foreach($discos as $disco){
    ?>
        <div>

            <h3><?php echo $disco->nombre?></h3>
            <p>
                Autor: <?php echo $disco->autor ?>  
                (<?php echo $disco->genero ?>)  |  
                Precio: <?php echo $disco->precio?>
            </p>

            <img src="./img/disco-img.jpg" alt="">

            <a href="delete/<?php echo $disco->id?>" type="button">Borrar</a>

        </div>
    <?php
        }
    ?>

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