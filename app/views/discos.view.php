<?php

class discosView{
    public function showDiscos($discos){
        $count = count($discos);

        require_once 'templates/discosList.phtml';
    }
}

?>