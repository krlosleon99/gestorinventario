<legend class="formulario__legend">Ingresa la información</legend>

<div class="formulario__campo">
    <label for="nombre" class="formulario__label">Nombre categoría</label>
    <input 
        type="text" 
        class="formulario__input" 
        placeholder="Ingrese el nombre de la categoría"
        name="nombre"
        value="<?php echo $categoria->nombre ?? ''; ?>"
    />
</div>