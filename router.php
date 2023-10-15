<?php

require_once "./app/controllers/discos.controller.php";
require_once './app/controllers/filtroPorGen.controller.php';
require_once "./app/controllers/about.controller.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) { // en la primer posicion tengo la accion real
    case 'home':
        $controller = new DiscosController();
        $controller->showDiscos();
        break;
    case 'login':
        echo("ACA VA EL LOGIN");
        break;
    case 'logout':
        echo("falta hacer el logout");
        break;  
    case 'auth':
        echo("falta autenticar");
        break;
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    case 'delete':
        $controller = new DiscosController();
        $controller->removeDisco($params[1]);
        break;
    case 'mod':
        $controller = new DiscosController();
        $controller->modDisco($params[1]);
        break;
    case 'add':
        $controller = new DiscosController();
        $controller->addDisco();
        break;
    case 'filtro':
        $controller = new filtroPorGen();
        $controller->showGeneros();
        break;
    default: 
        echo "404 - Page not found";
        break;
}

