<?php
require_once './app/views/about.view.php';

class LoginController{

    private $view;

    public function __construct(){

        $this->view = new LoginView;
    }

    public function showLogin(){
        $this->view->showLogin();
    }
}

?>