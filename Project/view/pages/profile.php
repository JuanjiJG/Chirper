<?php if ($_REQUEST["user"] == $_SESSION["user"]->id) { ?>
    <main>
        <section class="active-profile-grid-container">
            <header class="profile-header">
                <h1>Edita tu perfil de usuario</h1>
            </header>
            <section class="active-profile-image">
                <img src="<?php echo $this->cover_user->profile_image?>"/>
                <form name="upload-user-image-form" action="#" method="post">
                    <input type="file" name="user-image" accept="image/jpeg">
                    <input type="submit" name="submit" value="Actualizar imagen de perfil">
                </form>
            </section>
            <section class="active-profile-form">
                <form name="active-profile-form" onsubmit="return validateUpdateUserForm();" action="?c=user&a=edit" method="post">
                    <input name="user-id" type="hidden" value="<?php echo $this->cover_user->id?>">
                    <label for="first-name">Nombre</label>
                    <input id="first-name" name="edit-first-name" type="text" value="<?php echo $this->cover_user->first_name?>" required="required">
                    <label for="last-name">Apellidos</label>
                    <input id="last-name" name="edit-last-name" type="text" value="<?php echo $this->cover_user->last_name?>" required="required">
                    <label for="username">Usuario</label>
                    <input id="username" name="edit-username" type="text" value="<?php echo $this->cover_user->username?>" required="required">
                    <label for="password">Contraseña</label>
                    <input id="password" name="edit-password" type="password" value="" required="required">
                    <label for="repeat-password">Repite la contraseña</label>
                    <input id="repeat-password" name="edit-repeat-password" value="" type="password"
                           required="required">
                    <input type="submit" name="submit" value="Editar perfil">
                    <input type="reset" name="reset" value="Reiniciar formulario">
                </form>
            </section>
        </section>
    </main>
<?php } else { ?>
    <main>
        <section class="profile-grid-container">
            <header class="profile-header">
                <h1>Perfil</h1>
            </header>
            <section class="profile-image">
                <img src="<?php echo $this->cover_user->profile_image?>" alt="Imagen del usuario <?php echo $this->cover_user->first_name?>"/>
            </section>
            <section class="profile-information">
                <h1>Nombre</h1>
                <h2><?php echo $this->cover_user->first_name?></h2>
                <h1>Apellidos</h1>
                <h2><?php echo $this->cover_user->last_name?></h2>
                <h1>Usuario</h1>
                <h2><?php echo $this->cover_user->username?></h2>
            </section>
        </section>
    </main>
<?php } ?>