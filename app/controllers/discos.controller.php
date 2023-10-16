<?php

require_once './app/models/discos.model.php';
require_once './app/views/discos.view.php';

class DiscosController{

    private $model;
    private $view;

    public function __construct(){

        $this->model = new discosModel();
        $this->view = new discosView();

    }

    public function showDiscos(){
        $discos = $this->model->getDiscos();
        $this->view->showDiscos($discos);
    }

    public function removeDisco($id){
        $this->model->deleteDisco($id);
        header('Location: ' . BASE_URL);
    }

    public function modDisco($id){
        $nombre = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];
        
        $this->model->updateDisco($nombre,$autor,$genero,$precio,$id);

        header('Location: ' . BASE_URL);

    }

    public function addDisco(){
        
        $nombre = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];
       
        $this->model->insertDisco($nombre,$autor,$genero,$precio);
        header('Location: ' . BASE_URL);
        
    }
}

?>