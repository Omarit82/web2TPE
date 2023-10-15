<?php
require_once './app/views/auth.view.php';

class LoginController{

    private $view;

    public function __construct(){

        $this->view = new AuthView;
    }

    public function login(){
        $this->view->showLogin();
    }
}

?>