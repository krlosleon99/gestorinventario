<fieldset class="formulario__fieldset">

    <legend class="formulario__legend">Ingresa la información</legend>

    <div class="formulario__campo">
        <label for="nombre" class="formulario__label">Nombre producto</label>
        <input 
            type="text" 
            class="formulario__input" 
            placeholder="Ingrese el nombre del producto" 
            name="nombre" 
            value="<?php echo $producto->nombre ?? ''; ?>" 
        />
    </div>

    <div class="formulario__grid">

        <div class="formulario__campo">
            <label for="precio_compra" class="formulario__label">Precio compra</label>
            <input 
                type="number" 
                class="formulario__input" 
                placeholder="Ingrese el valor de compra" 
                name="precio_compra" 
                min="0"
                step="0.01" 
                value="<?php echo $producto->precio_compra ?? ''; ?>" 
            />
        </div>

        <div class="formulario__campo">
            <label for="precio_venta" class="formulario__label">Precio Venta</label>
            <input
                type="number"    
                class="formulario__input"  
                placeholder="Ingrese el valor de venta"  
                name="precio_venta"     
                min="0"
                step="0.01"
                value="<?php echo $producto->precio_venta ?? ''; ?>"   
            />
        </div>

    </div>

    <div class="formulario__campo">
        <label for="descripcion" class="formulario__label">Descripción:</label>
        <textarea 
            name="descripcion" 
            id="descripcion" 
            cols="30" 
            rows="10" 
            class="formulario__input"
        ><?php echo $producto->descripcion ?? ''; ?></textarea>
    </div>

    <div class="formulario__campo">
        <label for="stock" class="formulario__label">Stock:</label>
        <input 
            type="number" 
            class="formulario__input" 
            placeholder="Ingrese el stock" 
            name="stock" 
            min="0" 
            value="<?php echo $producto->stock ?? ''; ?>" 
        />
    </div>

    <div class="formulario__grid">

        <div class="formulario__campo">
            <label for="categoria_id" class="formulario__label">Categoría:</label>
            <select class="formulario__input" name="categoria_id" id="categoria_id">
                <option selected disabled>--Seleccionar--</option>

                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?php echo $categoria->id; ?>" <?php echo $categoria->id === $producto->categoria_id ? 'selected' : ''; ?>> <?php echo $categoria->nombre; ?>
                    </option>
                <?php } ?>

            </select>
        </div>

        <div class="formulario__campo">
            <label for="marca_id" class="formulario__label">Marca:</label>
            <select class="formulario__input" name="marca_id" id="marca_id">

                <option selected disabled>--Seleccionar--</option>

                <?php foreach ($marcas as $marca) { ?>
                    <option value="<?php echo $marca->id; ?>" <?php echo $marca->id === $producto->marca_id ? 'selected' : ''; ?>><?php echo $marca->nombre; ?></option>
                <?php } ?>

            </select>
        </div>

    </div>
</fieldset>

<fieldset class="formulario__fieldset">

    <legend class="formulario__legend">Peso</legend>

    <div class="formulario__grid">
        <div class="formulario__campo">
            <label for="cantidad_peso" class="formulario__label">Cantidad</label>
            <input 
                type="number" 
                class="formulario__input"
                name="cantidad_peso"
                min="0"
                value="<?php echo $producto->cantidad_peso ?? ''; ?>"
                step="0.01"
            />

        </div>

        <div class="formulario__campo">
            <label for="unidad_peso_id" class="formulario__label">Unidad</label>
            <select name="unidad_peso_id" class="formulario__input" id="unidad_peso_id">
                <option selected disabled>--Seleccionar--</option>

                <?php foreach($unidadPesos as $unidadPeso) { ?>
                    <option value="<?php echo $unidadPeso->id; ?>" <?php echo $unidadPeso->id === $producto->unidad_peso_id ? 'selected' : ''; ?>><?php echo $unidadPeso->nombre; ?></option>
                <?php } ?>

            </select>
        </div>

    </div>
</fieldset>