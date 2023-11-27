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
}

?>