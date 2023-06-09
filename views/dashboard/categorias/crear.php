<h1 class="dashboard__heading"><?php echo $titulo ?? ''; ?></h1>

<div class="dashboard__contenedor-boton">
    <a href="/dashboard/categorias" class="dashboard__boton">

        <i class="fa-solid fa-circle-arrow-left"></i>
        Volver

    </a>
</div>

<div class="dashboard__formulario contenedor-md">

    <?php include_once __DIR__ . '/../../templates/alertas.php'; ?>

    <form action="/dashboard/categorias/crear" class="formulario" method="POST">

        <?php include_once __DIR__ . '/formulario.php'; ?>

        <input type="submit" class="formulario__submit formulario__submit--registrar" value="Crear Categoría">

    </form>

</div>