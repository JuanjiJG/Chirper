<header class="main-header">
    <section class="header-cover-grid-container">
        <section id="website-banner">
            <a href="index.php"><img src="img/logo.png"
                                     alt="Logo de Chirper"></a>
        </section>
        <section id="website-name">
            <h1><a href="index.php">Chirper</a></h1>
        </section>
        <section id="user-info-panel">
            <h3><a href="index.php">Hola, <?php echo $_SESSION["user"]->first_name; ?></a></h3>
            <a href="index.php"><img src=<?php echo $_SESSION["user"]->profile_image; ?>
                                     alt="Imagen del usuario <?php echo $_SESSION["user"]->first_name; ?>"></a>
            <a class="button" href="?c=user&a=logout">Cerrar sesión</a>
        </section>
        <nav id="navigation-panel">
            <ul class="navigation">
                <li><a <?php if (isset($_REQUEST["user"]) && isset($_REQUEST["a"]) && $_REQUEST["a"] == "biography") { echo 'class="active"'; } ?> href="?c=cover&a=biography&user=<?php echo $this->cover_user->id; ?>">Biografía</a></li>
                <li><a <?php if (isset($_REQUEST["user"]) && isset($_REQUEST["a"]) && $_REQUEST["a"] == "photos") { echo 'class="active"'; } ?> href="?c=cover&a=photos&user=<?php echo $this->cover_user->id; ?>">Fotos</a></li>
                <li><a <?php if (isset($_REQUEST["user"]) && isset($_REQUEST["a"]) && $_REQUEST["a"] == "profile") { echo 'class="active"'; } ?> href="?c=cover&a=profile&user=<?php echo $this->cover_user->id; ?>">Información</a></li>
            </ul>
        </nav>
    </section>
</header>