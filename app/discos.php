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

        </div>
    <?php
        }
    ?>

    </section>

    <?php
    
    require "templates/footer.php";
}

function addDisco(){
    
}