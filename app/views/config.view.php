<?php
class configView{
    public function showConfig($usuarios,$discos,$generos){
        
        require_once 'templates/header.phtml'?>
        <div class="container verDisco">
            <h2>Usuarios:</h2>
            <ul class="list-group">
                <?php foreach ($usuarios as $item) { ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <?= $item->email?> 
                        </div>
                        <?= $item->nivel ?> 
                    </li>    
            <?php }?>
            </ul>
        </div>
        <div class="container verDisco">
        <?php require_once 'templates/formGenero.phtml' ?>
        <h2>Generos:</h2>
            <ul class="list-group">
                <?php foreach ($generos as $genero) { ?>
                    <ul class="list-group list-group-horizontal">
                         <li class="list-group-item"><?= $genero->categoria?></li>
                         <li class="list-group-item"><a href="deleteGen/<?= $genero->id?>" type="button" class="btn btn-danger ms-5">Borrar</a></li>
                         <li class="list-group-item"><a href="modificarGen/<?= $genero->id?>" type="button" class="btn btn-success ms-5">Modificar</a></li> 
                    </ul>  
            <?php }?>
            </ul>
            <?php require_once 'templates/formAutor.phtml' ?>
        </div>
        <div class="container verDisco">
        <h2>Discos:</h2>
            <ul class="list-group">
                <?php foreach ($discos as $disco) { ?>
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">
                            <?= $disco->titulo?>
                        </li>
                        <li class="list-group-item">
                            <?= $disco->nombre?>
                        </li>
                        <li class="list-group-item">
                            <?= $disco->categoria?>
                        </li>
                        <li class="list-group-item">
                            <?= $disco->precio?>
                        </li>
                </ul>
            <?php }?>
            </ul>
        </div>
        
        <?php 
        require_once 'templates/formAdd.phtml';
        require_once 'templates/footer.phtml';   
    }
    public function modificarGenero($genero){
        require_once 'templates/header.phtml'; ?>
            <form class="mb-3 formulario" action="updateGenero" method="POST">
                <h2>Editar Genero:</h2>
                <label class="form-label  mt-2">Id</label>
                <input  class="form-control" required type="number"name="id" value="<?= $genero->id ?>">
                <label class="form-label  mt-2">Genero</label>
                <input class="form-control" required type="text" name="categoria" value="<?= $genero->categoria ?>">
                <button type="submit" class="btn btn-primary boton mt-3" >Enviar</button>
            </form><?php
        require_once 'templates/footer.phtml';  
    }
}

?>