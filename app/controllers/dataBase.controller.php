<?php 

require_once './app/views/dataBase.view.php';
require_once './app/models/discos.model.php';
require_once './app/models/users.model.php';
require_once './app/models/generos.model.php';
require_once './config.php';
class BaseController{
    private $genModel;
    private $view;
    private $model;
    private $usModel;

    public function __construct() {
        $this->model = new discosModel();
        $this->genModel = new GenerosModel();
        $this->usModel = new UsersModel();
        $this->view = new dataBaseView();
    }

    public function showDataBase(){
        $usuarios = $this->usModel->getAllUsers();
        $discos = $this->model->getDiscos();
        $generos = $this->genModel->getCategorias();
        
        $this->view->showDBase($usuarios,$discos,$generos);
    }

}