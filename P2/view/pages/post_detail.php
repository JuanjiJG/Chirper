<section id="post-detail-section">
    <article id="post-section">
        <h4 class="post-user"><?php echo $this->post_detail->first_name; ?></h4>
        <img class="post-user-photo" src="<?php echo $this->post_detail->profile_image; ?>"
             alt="Imagen del usuario <?php echo $this->post_detail->first_name; ?>">
        <p class="post-time"><?php echo time_elapsed_string($this->post_detail->date); ?></p>
        <h3 class="post-title">¿Qué es Lorem Ipsum?</h3>
        <section class="post-content">
            <p><?php echo $this->post_detail->content; ?></p>
        </section>
        <?php if (!empty($this->photo)) { ?>
            <img class="post-image" src="<?php echo $this->photo->url; ?>"
                 alt="Fotografía de la entrada">
        <?php } ?>
    </article>
    <section id="comments-section">
        <h3>Comentarios</h3>
        <ul class="comments-list">
            <?php if (!empty($this->comments)) { ?>
                <?php foreach ($this->comments as $comment) { ?>
                    <li>
                        <img src="<?php echo $comment->profile_image; ?>"
                             alt="Imagen del usuario <?php echo $comment->first_name; ?>"
                             class="comment-user-image">
                        <h4 class="comment-user-name"><?php echo $comment->first_name; ?></h4>
                        <h4 class="comment-time"><?php echo time_elapsed_string($comment->date); ?></h4>
                        <p class="comment-text"><?php echo $comment->content; ?></p>
                    </li>
                <?php } ?>
            <?php } else { ?>
                <h4>No hay comentarios en esta publicación.</h4>
            <?php } ?>
        </ul>
    </section>
    <section id="new-post-section">
        <h2 id="new-post-user"><?php echo $_SESSION["user"]->first_name; ?></h2>
        <img id="new-post-user-image" src="<?php echo $_SESSION["user"]->profile_image; ?>"
             alt="Imagen del usuario <?php echo $_SESSION["user"]->first_name; ?>">
        <form id="new-post-form" onsubmit="return validateNewCommentForm();" name="new-comment-form" action="?c=post&a=comment"
              method="post">
            <input name="user-id" type="hidden" value="<?php echo $_SESSION["user"]->id?>">
            <input name="post-id" type="hidden" value="<?php echo $this->post_detail->id?>">
            <label for="new-post-content">Escribe un comentario</label>
            <textarea id="new-post-content" name="content" required="required"></textarea>
            <input type="submit" name="submit" value="Publicar comentario">
        </form>
    </section>
</section>