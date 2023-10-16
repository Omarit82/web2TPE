<?php
require_once './app/views/login.view.php';
require_once './app/models/users.model.php';
require_once './config.php';

class LoginController{

    private $view;
    private $model;

    public function __construct(){

        $this->view = new LoginView;
        $this->model = new UsersModel;
    }

    public function autenticacion(){
        $usuario = $_POST['email'];
        $clave = $_POST['password'];
        $user = $this->model->getUser($usuario);
        $password = $user->pass;
        if (password_verify($clave,$password)){
            $_SESSION['logueado'] = $user;
            header('Location: ' . BASE_URL. 'home');
        } else {
            header('Location: ' . BASE_URL. 'login');
        }
        
    }
    public function login(){
        $this->view->showLogin();    
    }
    public function logout(){
        session_destroy();
        header('Location: '. BASE_URL);
    }

}

?>