<section id="last-posts">
    <h3>Fotos de <?php echo $this->cover_user->first_name; ?></h3>
    <ul id="photos-list">
        <?php if (!empty($this->posts)) { ?>
            <?php foreach ($this->posts as $post) { ?>
                <li class="post-card">
                    <a href="?c=post&a=detail&post_id=<?php echo $post->id; ?>"><img src="<?php echo $post->url; ?>"
                                                                                     alt="Fotografía de la galería"></a>
                </li>
            <?php } ?>
        <?php } else { ?>
            <h4>No hay fotos en este momento.</h4>
        <?php } ?>
    </ul>
</section>
