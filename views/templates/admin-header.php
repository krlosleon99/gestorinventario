<header class="dashboard__header">
    <div class="dashboard__grid">

        <a href="/dashboard/home">
            <h2 class="dashboard__logo">
                Gestor de Inventario
            </h2>
        </a>

        <div class="dashboard__opciones">
            <p class="dashboard__usuario">Bienvenido, <span><?php echo $nombre ?? ''; ?></span></p>
            <form action="/logout" method="POST" class="dashboard__form">
                <input type="submit" class="dashboard__submit--logout" value="Cerrar Sesión">
            </form>
        </div>

    </div>
</header>