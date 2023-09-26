<?php


function showLogin($log){
    if(!isset($log)){
        include_once 'templates/header.php'; ?>
        <section class="container">
            <form action="checklog" method="POST" class="mb-3 formulario">
                <label class="form-label">Usuario</label>
                <input type="email" name="email" class="form-control" required/>
                <labelclass="form-label">Password</label>
                <input type="password" name="password" class="form-control" required/>
                <button type="submit" class="btn btn-primary boton">Login !</button>
                
            </form> 
        </section>
        <?php    include_once 'templates/footer.php';
    }elseif($log===false){
        include_once 'templates/header.php'; ?>
        <section class="container">
            <form action="checklog" method="POST" class="mb-3 formulario">
                <label class="form-label">Usuario</label>
                <input type="email" name="email" class="form-control" required/>
                <labelclass="form-label">Password</label>
                <input type="password" name="password" class="form-control" required/>
                <button type="submit" class="btn btn-primary boton">Login !</button>
                <h2>Usuario y/o contraseña incorrectos</h2>
            </form> 
        </section>
        
        <?php    include_once 'templates/footer.php';
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
    
