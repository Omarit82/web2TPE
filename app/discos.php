<?php

require_once './app/db.php';

function showDiscos(){
    $discos = getDiscos();
    
    require 'templates/header.php';

    echo"<table>
        <tr>
            <th>nombre</th>
            <th>autor</th>
            <th>genero</th>
            <th>precio</th>
        </tr>";
        foreach ($discos as $disco) {
            echo    "<tr>
                        <td>
                            $disco->nombre
                        </td>
                        <td>
                            $disco->autor
                        </td>
                        <td>
                            $disco->genero
                        </td>
                        <td>
                            $disco->precio
                        </td>
                    </tr>";
        };
    echo"</table>";
    
    require "templates/footer.php";
}