        <aside id="connected-users">
            <h3>Usuarios conectados</h3>
            <ul id="connected-users-list">
                <?php if (!empty($this->connected_users)) {?>
                    <?php foreach ($this->connected_users as $user) { ?>
                    <li>
                        <a href="?c=cover&a=biography&user=<?php echo $user->id; ?>"><?php echo $user->first_name; ?></a>
                        <a href="?c=cover&a=biography&user=<?php echo $user->id; ?>"><img src="<?php echo $user->profile_image; ?>"
                                                                              alt="Imagen del usuario <?php echo $user->first_name; ?>"></a>
                    </li>
                    <?php } ?>
                <?php } else {?>
                    <p>No hay usuarios conectados en este momento.</p>
                <?php } ?>
            </ul>
        </aside>
    </section>
</main>