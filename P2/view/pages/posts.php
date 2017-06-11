<?php if(isset($_REQUEST["a"]) && $_REQUEST["a"] == "biography") { ?>
<section id="user-last-posts">
<?php } else { ?>
<section id="last-posts">
<?php } ?>
    <?php if (isset($_REQUEST["a"]) && $_REQUEST["a"] == "biography" && isset($_REQUEST["user"]) && $_REQUEST["user"] == $_SESSION["user"]->id) { ?>
        <section id="new-post-section">
            <h2 id="new-post-user"><?php echo $_SESSION["user"]->first_name?></h2>
            <img id="new-post-user-image" src="<?php echo $_SESSION["user"]->profile_image?>"
                 alt="Imagen del usuario <?php echo $_SESSION["user"]->first_name?>">
            <form id="new-post-form" name="new-post-form" onsubmit="return validateNewPostForm();" action="?c=post&a=post" method="post">
                <input name="user-id" type="hidden" value="<?php echo $_SESSION["user"]->id?>">
                <label for="new-post-title">Título de la entrada</label>
                <input name="title" id="new-post-title" type="text" required="required">
                <label for="new-post-content">Texto de la entrada</label>
                <textarea name="content" id="new-post-content" required="required"></textarea>
                <label>¡Añade una imagen!</label>
                <input type="file" name="new-post-photo" accept="image/jpeg">
                <input type="submit" name="submit" value="Publicar entrada">
            </form>
        </section>
    <?php } ?>
    <?php
        if (isset($_REQUEST["a"]) && $_REQUEST["a"] == "biography") {
            echo "<h3>Publicaciones de " . $this->cover_user->first_name . "</h3>";
        } else {
            echo "<h3>Últimas entradas</h3>";
        }?>
    <ul id="last-posts-list">
        <?php if (!empty($this->posts)) { ?>
            <?php foreach ($this->posts as $post) { ?>
                <li class="post-card">
                    <article>
                        <h4 class="post-card-user"><?php echo $post->first_name; ?></h4>
                        <img class="post-card-user-photo" src="<?php echo $post->profile_image; ?>"
                             alt="Imagen del usuario <?php echo $post->first_name; ?>">
                        <p class="post-card-time"><?php echo time_elapsed_string($post->date); ?></p>
                        <h3 class="post-card-title"><a href="?c=post&a=detail&post_id=<?php echo $post->id; ?>"><?php echo $post->title; ?></a></h3>
                        <p class="post-card-content"><?php echo substr($post->content, 0, 150); if (strlen($post->content) > 150) echo "&hellip;"; ?></p>
                    </article>
                </li>
            <?php } ?>
        <?php } else {?>
            <h4>No hay entradas en este momento.</h4>
        <?php } ?>
    </ul>
</section>