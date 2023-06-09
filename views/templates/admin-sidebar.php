<aside class="dashboard__sidebar">
    <nav class="dashboard__menu">

        <a href="/dashboard/home" class="dashboard__enlace <?php echo pagina_actual('/dashboard/home') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-house dashboard__icono"></i>
            <span class="dashboard__menu-texto">Inicio</span>
        </a>

        <a href="/dashboard/categorias" class="dashboard__enlace <?php echo pagina_actual('/categorias') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-tag dashboard__icono"></i>
            <span class="dashboard__menu-texto">Categorías</span>
        </a>

        <a href="/dashboard/productos" class="dashboard__enlace <?php echo pagina_actual('/productos') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-box-open dashboard__icono"></i>
            <span class="dashboard__menu-texto">Productos</span>
        </a>

        <a href="/dashboard/compras" class="dashboard__enlace <?php echo pagina_actual('/compras') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-cash-register dashboard__icono"></i>
            <span class="dashboard__menu-texto">Compras</span>
        </a>

        <a href="/dashboard/ventas" class="dashboard__enlace <?php echo pagina_actual('/ventas') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-money-bill-trend-up dashboard__icono"></i>
            <span class="dashboard__menu-texto">Ventas</span>
        </a>

        <a href="/dashboard/balance" class="dashboard__enlace <?php echo pagina_actual('/balance') ? 'dashboard__enlace--activo' : ''; ?>">
            <i class="fa-solid fa-bag-shopping dashboard__icono"></i>
            <span class="dashboard__menu-texto">Balance</span>
        </a>
        
    </nav>
</aside>