<div class="login">

    <div class="login__grid">

        <div class="login__titulo">

            <h2 h2 class="login__heading"><?php echo $titulo ?? ''; ?></h2>
            <p class="login__texto">Gestor de Inventario</p>

        </div>

        <div class="login__formulario">

            <div class="contenedor-sm">
                <?php require_once __DIR__ . '/../templates/alertas.php'; ?>

                <form method="POST" action="/login" class="formulario">

                    <legend class="formulario__legend">Ingresa tus credenciales</legend>

                    <div class="formulario__campo">
                        <label for="email" class="formulario__label">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="formulario__input" placeholder="Ingrese su correo electrónico">
                    </div>

                    <div class="formulario__campo">
                        <label for="password" class="formulario__label">Password</label>
                        <input type="password" name="password" id="password" class="formulario__input" placeholder="Ingrese su contraseña">
                    </div>

                    <input type="submit" class="formulario__submit" value="Iniciar Sesión">
                </form>

                <div class="acciones">
                    <a href="/olvide" class="acciones__enlace">¿Olvidaste tu password? ¡Recupérala!</a>
                </div> <!-- FIN .acciones -->
            </div>

        </div> <!-- FIN .login__formulario -->

    </div>

</div>