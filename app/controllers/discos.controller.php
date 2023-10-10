<?php

require_once './app/models/discos.model.php';
require_once './app/views/discos.view.php';
require_once './app/helpers/auth.helper.php';

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
}

?>