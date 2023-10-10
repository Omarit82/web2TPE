<?php

require_once './app/helpers/auth.helper.php';
require_once './app/views/about.view.php';

class AboutController{

    private $view;

    public function __construct(){
        AuthHelper::verify();
        $this->view = new AboutView;
    }

    public function showAbout(){
        $this->view->showAbout();
    }
}

?>