<main class="contenedor seccion contenedor-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach($errores as $error):?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>

        <?php endforeach; ?>

        <form method="POST" class="formulario" action="/login">
        <fieldset>
                <legend>Email y Password</legend>
                
                <label for="email">E-mail</label>
                <input type="email" name="email" placeholder="Tu Email" id="email">

                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="Pasword">

                
            </fieldset>
            <input type="submit" placeholder="Iniciar Sesión" class="boton boton-verde">
        </form>

    </main>