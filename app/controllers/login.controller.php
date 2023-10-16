<?php
require_once './app/views/login.view.php';

require_once './config.php';

class LoginController{

    private $view;
    private $model;

    public function __construct(){

        $this->view = new LoginView;
    }

    public function login(){
        $this->view->showLogin();
    
    }


}

?>