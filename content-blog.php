<li class="col-md-6 col-sm-6">
    <?php if( has_post_thumbnail() ): ?>
        <div class="blog-photo">
            <figure>
                <?php 
                    $post_thumbnail_id = get_post_thumbnail_id();
                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                ?>
                <a href="<?php the_permalink(); ?>"><img src="<?php echo $post_thumbnail_url; ?>" alt="<?php the_title(); ?>" /></a>
                <figcaption><a href="<?php the_permalink(); ?>" class="read-more"><?php _ex('Read More', 'cuisinier') ?></a></figcaption>
            </figure>
        </div>
    <?php endif; ?>

    <div class="blog-content">
        <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php apply_filters('the_excerpt', the_excerpt()); ?>
    </div>
</li>