<header class="main-header">
    <section class="header-grid-container">
        <section id="website-banner">
            <a href="index.php"><img src="img/logo.png"
                                     alt="Logo de Chirper"></a>
        </section>
        <section id="website-name">
            <h1><a href="index.php">Chirper</a></h1>
        </section>
        <section id="login-form">
            <form name="login-form" onsubmit="return validateLoginForm();" action="?c=user&a=login" method="post">
                <label for="login-username">Usuario</label>
                <input id="login-username" name="username" type="text"
                       required="required">
                <label for="login-password">Contraseña</label>
                <input id="login-password" name="password" type="password"
                       required="required">
                <input type="submit" name="submit" value="Iniciar sesión">
            </form>
        </section>
    </section>
</header>
