<?php
function showLogin($log){
    if(!isset($log)){
        include_once 'templates/header.php';
        include_once 'templates/formLog.php';
        include_once 'templates/footer.php';
    }elseif($log===false){
        include_once 'templates/header.php';
        include_once 'templates/formLog.php';?>
        <h2>Usuario y/o contraseña incorrectos</h2> <?php 
        include_once 'templates/footer.php';
    }else{
        showDiscos($log);
    }
}

function checkLog(){
    //obtengo la informacion de logeo del usuario desde el POST
    $email = $_POST['email'];
    $password = $_POST['password'];
    checkUser($email,$password);
}
?>
    
