<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor-boton">
    <a href="/dashboard/productos/crear" class="dashboard__boton">

        <i class="fa-solid fa-circle-plus"></i>
        Añadir Producto

    </a>
</div>

<div class="dashboard__contenedor">

    <?php if(!empty($productos)) { ?>
        
        <table class="table">

            <thead class="table__thead">

                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Precio Compra</th>
                    <th scope="col" class="table__th">Precio Venta</th>
                    <th scope="col" class="table__th">Categoría</th>
                    <th scope="col" class="table__th">Stock</th>
                    <th scope="col" class="table__th">Estado</th>
                    <th scope="col" class="table__th">Creado</th>
                    <th scope="col" class="table__th">Acciones</th>
                </tr>

            </thead>

            <tbody class="table__tbody">

                <?php foreach($productos as $producto) { ?>

                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $producto->id;?>
                        </td>

                        <td class="table__td">
                            <?php echo $producto->nombre;?>
                        </td>

                        <td class="table__td">
                            $<?php echo $producto->precio_compra;?>
                        </td>
                        
                        <td class="table__td">
                            $<?php echo $producto->precio_venta;?>
                        </td>

                        <td class="table__td">
                            <?php foreach( $categorias as $categoria ) echo $categoria->id === $producto->categoria_id ? $categoria->nombre : ''; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $producto->stock;?>
                        </td>

                        <td class="table__td">
                            <?php if( $producto->stock === '0' ) { ?>
                                <p class="table__inactivo">Agotado</p>
                            <?php } else { ?>
                                <p class="table__activo">En Stock</p>
                            <?php }  ?>
                        </td>

                        <td class="table__td">
                            <?php echo $producto->creado;?>
                        </td>

                        <td class="table__td--acciones">
                            <a class="table__accion table__accion--editar" href="/dashboard/productos/editar?id=<?php echo $producto->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/dashboard/productos/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                <button class="table__accion table__accion--eliminar" type="submit">
                                    <i class="fa-solid fa-circle-xmark"></i>
                                    Eliminar
                                </button>
                            </form>
                        </td>

                    </tr>
                    
                <?php } ?>
                
            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">No hay productos</p>
    <?php } ?>
</div>