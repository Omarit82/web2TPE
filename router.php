<?php
require_once "./app/controllers/discos.controller.php";
require_once './app/controllers/filtro.controller.php';
require_once "./app/controllers/about.controller.php";
require_once "./app/controllers/login.controller.php";
require_once "./app/controllers/config.controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}
$params = explode('/', $action);

switch ($params[0]) { // en la primer posicion tengo la accion real
    case 'home':
        $controller = new DiscosController();
        $controller->showDiscos(null);
        break;
    case 'login':
        $controller = new LoginController();
        $controller->login();
        break;
    case 'logout':
        $controller = new LoginController();
        $controller->logout();
        break;  
    case 'auth':
        $controller = new LoginController();
        $controller->autenticacion();
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'add':
        $controller = new DiscosController();
        $controller->addDisco();
        break;
    case 'addGen':
        $controller = new ConfigController();
        $controller->addGen();
        break;
    case 'addAutor':
        $controller = new ConfigController();
        $controller->addAutor();
        break;
    case 'configuracion':
        $controller = new ConfigController();
        $controller->showConfig();
        break;
    case 'buy':
        $controller = new DiscosController();
        $controller->showDiscos($params[1]);
        break;
    case 'filtro':
        $controller = new filtro();
        $controller->showGeneros();
        break;
    case 'filtroAutor':
        $controller = new filtro();
        $controller->showAutores();
        break;
    case 'delete':
        $controller = new DiscosController();
        $controller->removeDisco($params[1]);
        break;
    case 'modificar':
        $controller = new DiscosController();
        $controller->modificarDisco($params[1]);
        break;
    case 'update':
        $controller = new DiscosController();
        $controller->updateDisco();
        break;
    default: 
        echo "404 - Page not found";
        break;
}

