<main>
    <?php if(isset($_REQUEST["a"]) && $_REQUEST["a"] == "biography") {
        echo "<section class=\"main-active-bio\">";
    } else if (isset($_REQUEST["post_id"])) {
        echo "<section class=\"main-post-container\">";
    } else {
        echo "<section class=\"main-cover-grid-container\">";
    } ?>
        <section id="all-users">
            <h3>Todos los usuarios</h3>
            <ul id="all-users-list">
                <?php if (!empty($this->all_users)) {?>
                    <?php foreach ($this->all_users as $user) { ?>
                        <li>
                            <a href="?c=cover&a=biography&user=<?php echo $user->id; ?>"><?php echo $user->first_name; ?></a>
                            <a href="?c=cover&a=biography&user=<?php echo $user->id; ?>"><img src="<?php echo $user->profile_image; ?>"
                                                                                  alt="Imagen del usuario <?php echo $user->first_name; ?>"></a>
                        </li>
                    <?php } ?>
                <?php } else {?>
                    <h4>No hay usuarios registrados en Chirper.</h4>
                <?php } ?>
            </ul>
        </section>