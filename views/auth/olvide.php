<div class="login">

    <div class="login__grid">

        <div class="login__titulo">

            <h2 h2 class="login__heading"><?php echo $titulo ?? ''; ?></h2>
            <p class="login__texto">Gestor de Inventario</p>

        </div>

        <div class="login__formulario">

            <div class="contenedor-sm">
                <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

                <form method="POST" action="/olvide" class="formulario">

                    <legend class="formulario__legend">Ingresa tus datos</legend>

                    <div class="formulario__campo">
                        <label for="email" class="formulario__label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="formulario__input" placeholder="Ingrese su correo electrónico">
                    </div>

                    <input type="submit" class="formulario__submit" value="Mandar Instrucciones">
                </form>

                <div class="acciones">
                    <a href="/login" class="acciones__enlace">Inicia Sesión</a>
                </div> <!-- FIN .acciones -->
            </div>

        </div> <!-- FIN .login__formulario -->

    </div>

</div>