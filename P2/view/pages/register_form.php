        <section id="register-form">
            <header>
                <h1>¡Regístrate ahora en Chirper!</h1>
            </header>
            <section>
                <form name="register-form" onsubmit="return validateRegisterForm();" action="?c=user&a=register" method="post">
                    <label for="first-name">Nombre</label>
                    <input id="first-name" name="first-name" type="text" required="required">
                    <label for="last-name">Apellidos</label>
                    <input id="last-name" name="last-name" type="text" required="required">
                    <label for="username">Usuario</label>
                    <input id="username" name="username" type="text" required="required">
                    <label for="password">Contraseña</label>
                    <input id="password" name="password" type="password" required="required">
                    <label for="repeat-password">Repite la contraseña</label>
                    <input id="repeat-password" name="repeat-password" type="password"
                           required="required">
                    <input type="submit" name="submit" value="Registrarse">
                    <input type="reset" name="reset" value="Reiniciar formulario">
                </form>
            </section>
        </section>
    </section>
</main>