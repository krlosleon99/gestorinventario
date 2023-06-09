<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor">
    <?php if( !empty($ordenes) ) { ?>

        <table class="table">

            <thead class="table__thead">

                <tr>
                    <th scope="col" class="table__th">Acción</th>
                    <th scope="col" class="table__th">N° Orden</th>
                    <th scope="col" class="table__th">Producto</th>
                    <th scope="col" class="table__th">Cantidad</th>
                    <th scope="col" class="table__th">Fecha Orden</th>
                </tr>

            </thead>

            <tbody class="table__tbody">

                <?php foreach($ordenes as $orden) { ?>

                    <tr class="table__tr">

                        <td class="table__td">
                            <?php foreach($acciones as $accion) echo $accion->id === $orden->accion_id ? $accion->nombre : ''; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $orden->numero_orden; ?>
                        </td>

                        <td class="table__td">
                            <?php foreach($productos as $producto) echo $producto->id === $orden->producto_id ? $producto->nombre : ''; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $orden->cantidad; ?>
                        </td>

                        <td class="table__td">
                            <?php echo $orden->fecha_orden;  ?>
                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    <?php } else { ?>
        <p class="text-center">No hay órdenes de compra o venta</p>
    <?php } ?>
</div>