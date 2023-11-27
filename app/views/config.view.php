<?php
class configView{
    public function showConfig($usuarios,$discos,$generos){
        
        require_once 'templates/header.phtml'?>
        <div class="verDisco">
            <h2>Usuarios:</h2>
            <ul>
                <?php foreach ($usuarios as $item) { ?>
                    <li><?= $item->email?> | <?= $item->nivel ?> </li>    
            <?php }?>
            </ul>
        </div>
        <div class="verDisco">
        <?php require_once 'templates/formGenero.phtml' ?>
        <h2>Generos:</h2>
            <ul>
                <?php foreach ($generos as $genero) { ?>
                    <li><?= $genero->categoria?></li>    
            <?php }?>
            </ul>
            <?php require_once 'templates/formAutor.phtml' ?>
        </div>
        <div class="verDisco">
        <h2>Discos:</h2>
            <ul>
                <?php foreach ($discos as $disco) { ?>
                    <li><?= $disco->titulo?> | <?= $disco->nombre?> | <?= $disco->categoria?> | <?= $disco->precio?> | </li>    
            <?php }?>
            </ul>
        </div>
        
    <?php 
    require_once 'templates/formAdd.phtml';
    require_once 'templates/footer.phtml';
        
    }
}

?>