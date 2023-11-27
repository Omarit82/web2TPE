<?php
require_once "./app/controllers/discos.controller.php";
require_once './app/controllers/filtroPorGen.controller.php';
require_once "./app/controllers/about.controller.php";
require_once "./app/controllers/login.controller.php";
require_once "./app/controllers/dataBase.controller.php";

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
    case 'configuracion':
        $controller = new BaseController();
        $controller->showConfig();
        break;
    case 'buy':
        $controller = new DiscosController();
        $controller->showDiscos($params[1]);
        break;
    case 'filtro':
        $controller = new filtroPorGen();
        $controller->showGeneros();
        break;
    case 'delete':
        $controller = new DiscosController();
        $controller->removeDisco($params[1]);
    break;
    default: 
        echo "404 - Page not found";
        break;
}

