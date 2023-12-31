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

    public function showDiscos($id){
        $discos = $this->model->getDiscos();
        /**ADD */
        //$generos = $this->model->getCategorias();
        if ($id == null){
            $this->view->showDiscos($discos);
        }else{
            $disco = $this->model->getDisco($id);
            $this->view->showDisco($disco);
        }
        
    }

    public function removeDisco($id){
        $this->model->deleteDisco($id);
        header('Location: ' . BASE_URL);
    }

    public function modificarDisco($id){
        $disco = $this->model->modificarDisco($id);
        $this->view->modificarDisco($disco);
    }

    public function updateDisco(){
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];

        $this->model->updateDisco($id,$autor,$genero,$titulo,$precio);
        header('Location: ' . BASE_URL . '/home');
    }

    public function addDisco(){
        
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $precio = $_POST['precio'];

        $this->model->insertDisco($autor,$genero,$titulo,$precio);
        header('Location: ' . BASE_URL . '/configuracion');
    }
}

?>