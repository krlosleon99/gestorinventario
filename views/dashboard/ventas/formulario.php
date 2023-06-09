<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información de la venta</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Venta</label>
        <input 
            type="text" 
            id="nombre"
            name="nombre"
            value="<?php echo $venta->nombre ?? ''; ?>"
            class="formulario__input "
            placeholder="Nombre descriptivo de la venta"
            
        >
    </div>

    <div class="formulario__campo">
        <label for="producto_id" class="formulario__label">Elegir Producto</label>
        
        <select name="producto_id" id="producto_id" class="formulario__input">
            <option selected disabled>-- Seleccionar --</option>

            <?php foreach($productos as $producto) { ?>
                <option value="<?php echo $producto->id; ?>" <?php echo $producto->id === $venta->producto_id ? 'selected' : ''; ?>><?php echo $producto->nombre;?></option>
            <?php } ?>

        </select>

    </div>

    <div class="formulario__campo">
        <label for="cantidad" class="formulario__label">Cantidad Vendida</label>
        <input 
            type="number" 
            class="formulario__input"
            id="cantidad"
            name="cantidad"
            value="<?php echo $venta->cantidad ?? ''; ?>"
            
        >
    </div>

    <div class="formulario__campo">
        <label for="numero_orden" class="formulario__label">Número de Venta</label>
        <input 
            type="text" 
            id="numero_orden"
            name="cantidad"
            value="<?php echo $venta->numero_orden ?? ''; ?>"
            disabled
            class="formulario__input--disabled"
            placeholder="Se generará automáticamente el número de compra"
        >
    </div>

</fieldset>