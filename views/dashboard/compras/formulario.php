<fieldset class="formulario__fieldset">
    <legend class="formulario__legend">Información de la Compra</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre Pedido</label>
        <input 
            type="text" 
            class="formulario__input <?php echo $compra->id ? 'formulario__input--disabled' : ''; ?>"
            name="nombre"
            id="nombre"
            placeholder="Dale un nombre descriptivo a tu pedido"
            value="<?php echo $compra->nombre ?? ''; ?>"
            <?php echo $compra->id ? 'disabled' : ''; ?>
        />
    </div>

    <div class="formulario__campo">
        <label for="producto_id" class="formulario__label">Selecciona el Producto</label>
        <select name="producto_id" id="producto_id" class="formulario__input <?php echo $compra->id ? 'formulario__input--disabled' : ''; ?>" <?php echo $compra->id ? 'disabled' : ''; ?>>
            <option selected disabled>--Seleccionar Producto--</option>

            <?php foreach($productos as $producto) { ?>
                <option value="<?php echo $producto->id;?>" <?php echo $producto->id === $compra->producto_id ? 'selected' : ''; ?> ><?php echo $producto->nombre; ?></option>
            <?php } ?>

        </select>
    </div>

    <div class="formulario__campo">
        <label for="cantidad" class="formulario__label">Cantidad comprada</label>

        <input 
            type="number" 
            class="formulario__input <?php echo $compra->id ? 'formulario__input--disabled' : ''; ?>"
            min="0"
            id="cantidad"
            name="cantidad"
            value="<?php echo $compra->cantidad ?? '';?>"
            <?php echo $compra->id ? 'disabled' : ''; ?>
        />
    </div>

    <div class="formulario__campo">
        <label class="formulario__label">Número de Compra:</label>
        <input 
            type="text" 
            name="numero_compra" 
            value="<?php echo $compra->numero_compra ?? ''; ?>"
            disabled
            class="formulario__input--disabled"
            placeholder="Se generará automáticamente el número de compra"
        />
    </div>

</fieldset>