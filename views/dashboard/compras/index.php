<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor-boton">
    <a href="/dashboard/compras/registrar" class="dashboard__boton">

        <i class="fa-solid fa-circle-plus"></i>
        Registrar Compra

    </a>
</div>

<div class="dashboard__contenedor">

    <?php if(!empty($compras)) { ?>
        
        <table class="table">

            <thead class="table__thead">

                <tr>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th">Número de pedido</th>
                    <th scope="col" class="table__th">Producto</th>
                    <th scope="col" class="table__th">Cantidad Comprada</th>
                    <th scope="col" class="table__th">Fecha de Compra</th>
                    <th scope="col" class="table__th"></th>
                </tr>

            </thead>

            <tbody class="table__tbody">

                <?php foreach($compras as $compra) { ?>

                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $compra->nombre;?>
                        </td>

                        <td class="table__td">
                            <?php echo $compra->numero_orden;?>
                        </td>
                        
                        <td class="table__td">
                            <?php foreach( $productos as $producto ) echo $producto->id === $compra->producto_id ? $producto->nombre : ''; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $compra->cantidad;?>
                        </td>

                        <td class="table__td">
                            <?php echo $compra->fecha_orden;?>
                        </td>

                        <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/dashboard/compras/visualizar?id=<?php echo $compra->id; ?>">
                                <i class="fa-regular fa-eye"></i>
                                Ver Compra
                            </a>

                            <form method="POST" action="/dashboard/compras/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $compra->id; ?>">
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
        <p class="text-center">No hay compras registradas</p>
    <?php } ?>
</div>