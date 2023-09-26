<?php

require_once "app/discos.php";
require_once "app/about.php";
require_once "app/login.php";

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

switch ($params[0]) { // en la primer posicion tengo la accion real
    case 'login':
        if(isset($params[1])){
            showLogin($params[1]);
        }else{
            showLogin(null);
        }
        break;
    case 'home':
        if(isset($params[1])){
            showDiscos($params[1]);
        }else{
            showDiscos(null);
        }
        break;
    case 'add':
        addDisco();
        break;
    case 'delete':
        removeDisco($params[1]);
        break;
    case 'mod':
        modDisco($params[1]);
        break;
    case 'about': 
        showAbout();
        break;
    case 'tienda':
        checkLog();
        break;
    case 'filtro':
        filtro();
        break;
    default: 
        echo "404 - Page not found";
        break;
}

