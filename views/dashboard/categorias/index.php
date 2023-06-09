<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor-boton">
    <a href="/dashboard/categorias/crear" class="dashboard__boton">

        <i class="fa-solid fa-circle-plus"></i>
        Añadir Categoría

    </a>
</div>

<div class="dashboard__contenedor">

    <?php if(!empty($categorias)) { ?>
        
        <table class="table">

            <thead class="table__thead">

                <tr>
                    <th scope="col" class="table__th">ID</th>
                    <th scope="col" class="table__th">Nombre</th>
                    <th scope="col" class="table__th"></th>
                </tr>

            </thead>

            <tbody class="table__tbody">

                <?php foreach($categorias as $categoria) { ?>

                    <tr class="table__tr">

                        <td class="table__td">
                            <?php echo $categoria->id;?>
                        </td>

                        <td class="table__td">
                            <?php echo $categoria->nombre;?>
                        </td>

                        <td class="table__td--acciones">
                        <a class="table__accion table__accion--editar" href="/dashboard/categorias/editar?id=<?php echo $categoria->id; ?>">
                                <i class="fa-solid fa-user-pen"></i>
                                Editar
                            </a>

                            <form method="POST" action="/dashboard/categorias/eliminar" class="table__formulario">
                                <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
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
        <p class="text-center">No hay categorías</p>
    <?php } ?>
</div>