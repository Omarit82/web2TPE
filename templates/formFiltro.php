
<form action="filtro" method="POST" class="mb-3 formulario">
    <?php $generos = getGen(); ?>
    <select name="genero" class="form-select">
        <option  value="" selected></option>
        <?php foreach ($generos as $genero) { ?>
           <option value="<?php echo $genero->genero?>"><?php echo $genero->genero?></option>;<?php
        }?>
    </select>
    <button type="submit" class="btn btn-info boton">Filtrar</button>
</form>