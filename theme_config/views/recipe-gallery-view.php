<?php if($shortcode['title'] || $shortcode['description']): ?>
    <div class="container">
        <header class="entry-header aligncenter">
            <?php echo $shortcode['title'] ? '<div class="entry-wrapper inline relative"><h2 class="entry-title margin-top-100">'.$shortcode['title'].'</h2><hr></div>' : ''; ?>
            <?php echo $shortcode['description'] ? '<h3 class="entry-title-desc">'.$shortcode['description'].'</h3>' : ''; ?>
        </header>
    </div>
<?php endif; ?>

<ul class="clean-list gallery-list margin-top-60 ovh">
    <?php foreach( $slides as $i => $slide ): ?>
        <?php if (has_post_thumbnail($slide['post']->ID)){
                    $post_thumbnail_id = get_post_thumbnail_id( $slide['post']->ID );
                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                } ?>

            <li><div style="background-image: url('<?php echo $post_thumbnail_url ?>');"></div><a href="<?php echo $slide['options']['link'] ? $slide['options']['link'] : '#' ?>"><?php echo get_the_title($slide['post']->ID); ?></a>
            </li>
    <?php endforeach; ?>
</ul>