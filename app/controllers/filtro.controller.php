<?php

require_once './app/models/discos.model.php';
require_once './app/views/discos.view.php';

class filtro{

    private $model;
    private $view;

    public function __construct(){
        $this->model= new discosModel();
        $this->view = new discosView();
    }

    public function showGeneros(){
        $genero = $_POST['genero'];
        
        $generos = $this->model->getDiscosPorGen($genero);

        $this->view->showDiscos($generos);
    }

    public function showAutores(){
        $autor = $_POST['nombre'];

        $autores = $this->model->getDiscosPorAutor($autor);

        $this->view->showDiscos($autores);
    }

    public function showPorTitulo(){
        $discos = $this->model->orderDiscosTitulo();
        $this->view->showDiscos($discos);
    }
    public function showPorAutor(){
        $discos = $this->model->orderDiscosAutor();
        $this->view->showDiscos($discos);
    }
    public function showPorPrecio(){
        $discos = $this->model->orderDiscosPrecio();
        $this->view->showDiscos($discos);
    }
}

?>