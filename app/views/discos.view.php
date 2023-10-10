<?php

class discosView{
    public function showDiscos($discos){
        $count = count($discos);

        require 'templates/discosList.phtml';
    }
}

?>