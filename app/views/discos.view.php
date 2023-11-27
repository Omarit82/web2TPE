<?php

class discosView{
    public function showDiscos($discos){
        require_once 'templates/header.phtml';
        require_once 'templates/formFiltro.phtml';
        require_once 'templates/formFiltroAutor.phtml';
        require_once 'config.php';
        ?>
        <section>
            <?php foreach($discos as $disco){?>
                <div class="verDisco">
                    <h3><?= $disco->titulo?></h3>
                    <ul class="list-group">
                        <li class="list-group-item">
                            Artista: <?= $disco->nombre ?>
                        </li>  
                        <li class="list-group-item">
                            <?= $id = $disco->categoria ?>
                        </li>
                        <li class="list-group-item mb-3">
                            Precio: <?= $disco->precio?>
                        </li>  
                    </ul>
                    <img src="./img/disco-img.jpg" alt="">
                    <?php if(isset($_SESSION['logueado'])&&($_SESSION['logueado']->nivel ==='admin')){ ?>   
                        <a href="delete/<?= $disco->id?>" type="button" class="btn btn-danger">Borrar</a>
                        <a href="modificar/<?= $disco->id?>" type="button" class="btn btn-success">Modificar</a>
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
            <ul class="list-group">
                        <li class="list-group-item">
                            Artista: <?= $disco->nombre ?>
                        </li>  
                        <li class="list-group-item">
                            (<?= $id = $disco->categoria ?>)
                        </li>
                        <li class="list-group-item mb-3">
                            Precio: <?= $disco->precio?>
                        </li>  
                    </ul>
            <img src="./img/disco-img.jpg" alt="">
            <?php if(isset($_SESSION)&($_SESSION['logueado']->nivel === 'user')){ ?>   
                <a href="" type="button" class="btn btn-success">Comprar</a>
            <?php } ?>
        </div><?php
        require_once 'templates/footer.phtml';
    }

    public function modificarDisco($disco){
        //mostrar disco a modificar
        require_once 'templates/header.phtml';
        ?>
        <div class="verDisco">
            <ul class="list-group">
                <li class="list-group-item">
                    ID: <?= $disco->id ?>
                </li>  
                <li class="list-group-item">
                    Titulo: <?= $disco->titulo ?>
                </li>
                <li class="list-group-item">
                    Artista: <?= $disco->nombre ?>
                </li>
                <li class="list-group-item">
                    Genero: <?= $disco->categoria ?>
                </li> 
                <li class="list-group-item mb-3">
                    Precio: <?= $disco->precio?>
                </li>  
            </ul>
            <img src="./img/disco-img.jpg" alt="">
        </div>
        <div class="container">
            <form class="mb-3 formulario" action="update" method="POST">
                <h2>Modificar Disco:</h2>
                <label class="form-label  mt-2"> ID </label>
                <input class="form-control" type="number" name="id" value="<?= $disco->id ?>">
                <label class="form-label  mt-2">Titulo</label>
                <input class="form-control" required type="text" name="titulo" value="<?= $disco->titulo ?>">
                <?php 
                $model = new GenerosModel();
                $generos=$model->getCategorias(); 
                ?>
                <label class="form-label mt-2">Genero</label>
                <select name="genero" class="form-select">
                    <option  value="" selected></option>
                    <?php foreach ($generos as $genero) { ?>
                    <option value=<?= $genero->id?>><?= $genero->categoria?></option>;<?php
                    }?>
                </select>
                <?php 
                $model = new AutoresModel();
                $autores=$model->getAutores(); 
                ?>
                <label class="form-label mt-2">Autor</label>
                <select name="autor" class="form-select">
                    <option  value="" selected></option>
                    <?php foreach ($autores as $autor) { ?>
                    <option value=<?= $autor->id?>><?=$autor->nombre?></option>;<?php
                    }?>
                </select>
                <label class="form-label  mt-2">Precio</label>
                <input class="form-control" required type="float" name="precio" value="<?= $disco->precio ?>">

                <button type="submit" class="btn btn-primary boton mt-5" >Enviar</button>

            </form>
        </div>
        <?php
        require_once 'templates/footer.phtml'; 
    }
}

?>