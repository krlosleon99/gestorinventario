<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor-boton">
    <a href="/dashboard/ventas/registrar" class="dashboard__boton">

        <i class="fa-solid fa-circle-plus"></i>
        Registrar Venta

    </a>
</div>

<div class="dashboard__contenedor">

    <?php if(!empty($ventas)) { ?>
        
        <table class="table">

            <thead class="table__thead">

                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Número de pedido</th>
                    <th scope="col" class="table__th">Producto</th>
                    <th scope="col" class="table__th">Cantidad Vendida</th>
                    <th scope="col" class="table__th">Fecha de Venta</th>
                    <th scope="col" class="table__th"></th>
                </tr>

            </thead>

            <tbody class="table__tbody">

                <?php foreach($ventas as $venta) { ?>

                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $venta->nombre;?>
                        </td>

                        <td class="table__td">
                            <?php echo $venta->numero_orden;?>
                        </td>
                        
                        <td class="table__td">
                            <?php foreach( $productos as $producto ) echo $producto->id === $venta->producto_id ? $producto->nombre : ''; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $venta->cantidad;?>
                        </td>

                        <td class="table__td">
                            <?php echo $venta->fecha_orden;?>
                        </td>

                        <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/dashboard/ventas/visualizar?id=<?php echo $venta->id; ?>">
                                <i class="fa-regular fa-eye"></i>
                                Ver Venta
                            </a>

                            <form method="POST" action="/dashboard/ventas/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $venta->id; ?>">
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
        <p class="text-center">No hay ventas registradas</p>
    <?php } ?>
</div>