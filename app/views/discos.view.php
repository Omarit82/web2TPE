<?php

class discosView{
    public function showDiscos($discos){
        require_once 'templates/header.phtml';
        require_once 'templates/formFiltro.phtml';
        require_once 'config.php';
        ?>
        <section>
            <?php foreach($discos as $disco){?>
                <div class="verDisco">
                    <h3><?= $disco->titulo?></h3>
                    <p>
                        Autor: <?= $disco->nombre ?>  
                        (<?=
                        $id = $disco->categoria
                        ?>)  |  Precio: <?= $disco->precio?>
                    </p>
                    <img src="./img/disco-img.jpg" alt="">
                    <?php if(isset($_SESSION['logueado'])&&($_SESSION['logueado']->nivel ==='admin')){ ?>   
                        <a href="delete/<?= $disco->id?>" type="button" class="btn btn-danger">Borrar</a>
                    <?php } ?>
                    <?php if(isset($_SESSION['logueado'])&&($_SESSION['logueado']->nivel === 'user')){ ?>   
                        <a href="buy/<?= $disco->id?>" type="button" class="btn btn-success">Comprar</a>
                    <?php } ?>
                </div>

            <?php } ?>
        </section>
        <?php require 'templates/footer.phtml';
    }
    

    public function showDisco($disco){
        require_once 'templates/header.phtml';
        ?>
        <div class="verDisco">
            <h3><?= $disco->titulo?></h3>
            <p>
                Autor: <?= $disco->nombre ?>  
                (<?= $disco->categoria ?>)  |  Precio: <?= $disco->precio?>
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