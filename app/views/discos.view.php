<?php

class discosView{
    public function showDiscos($discos){
        require_once 'templates/discosList.phtml';
    }

    public function showDisco($disco){
        require_once 'templates/header.phtml';
        ?>
        <div class="verDisco">
            <h3><?= $disco->nombre?></h3>
            <p>
                Autor: <?= $disco->autor ?>  
                (<?= $disco->genero ?>)  |  Precio: <?= $disco->precio?>
            </p>
            <img src="./img/disco-img.jpg" alt="">
            <?php if(isset($_SESSION)&($_SESSION['logueado']->nivel === 'user')){ ?>   
                <a href="" type="button" class="btn btn-success">Comprar</a>
            <?php } ?>
        </div><?php
        require_once 'templates/footer.phtml';
    }
}

?>