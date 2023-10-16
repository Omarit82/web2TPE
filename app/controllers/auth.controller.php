<?php 
include_once './config.php';    
require_once './app/models/users.model.php';
include_once './app/views/login.view.php';

class AuthController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new UsersModel();
        $this->view = new LoginView();
    }

    function autenticacion(){
        var_dump($_POST);die();
        $usuario = $_POST['email'];
        
        $clave = $_POST['password'];
        $user = $this->model->getUser($usuario,$clave);
        if($user === false){
            $_SESSION['error'] = "Usuario o clave Incorrectos";
        }
        
    }
}