<?php


require_once './app/views/about.view.php';

class AboutController{

    private $view;

    public function __construct(){

        $this->view = new aboutView();
    }

    public function showAbout(){
        $this->view->showAbout();
    }
}

?>