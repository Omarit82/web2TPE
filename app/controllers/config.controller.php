<?php 

require_once './app/views/config.view.php';
require_once './app/models/discos.model.php';
require_once './app/models/users.model.php';
require_once './app/models/generos.model.php';
require_once './app/models/autores.model.php';
require_once './config.php';

class ConfigController{
    private $genModel;
    private $view;
    private $model;
    private $usModel;
    private $autores;

    public function __construct() {
        $this->model = new discosModel();
        $this->genModel = new GenerosModel();
        $this->usModel = new UsersModel();
        $this->view = new configView();
        $this->autores = new AutoresModel();
    }

    public function showConfig(){
        $usuarios = $this->usModel->getAllUsers();
        $discos = $this->model->getDiscos();
        $generos = $this->genModel->getCategorias();
        
        $this->view->showConfig($usuarios,$discos,$generos);
    }

    public function addGen(){
        
        $categoria = $_POST['categoria'];

        $this->genModel->insertGenero($categoria);
        header('Location: ' . BASE_URL . '/configuracion');
    }
    public function removeGenero($id){
        $this->genModel->deleteGenero($id);
        header('Location: ' . BASE_URL . '/configuracion');
    }
    public function modificarGenero($id){ //Trae el genero para modificar
        $genero =  $this->genModel->modificarGenero($id);
        $this->view->modificarGenero($genero); //Lo envio a la vista.
    }

    public function updateGenero(){
        $id = $_POST['id'];
        $categoria = $_POST['categoria'];

        $this->genModel->updateGenero($id,$categoria);
        header('Location: ' . BASE_URL . '/configuracion');
    }

    public function addAutor(){
        
        $nombre = $_POST['nombre'];

        $this->autores->insertAutor($nombre);
        header('Location: ' . BASE_URL . '/configuracion');
    }

}