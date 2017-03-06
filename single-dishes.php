<?php
/*
 * Recipe page
 */
?>

<?php get_header(); ?>

<div class="page-content page-post show-content">
    <?php if (have_posts()) : 
        while(have_posts()) : the_post();

            echo Tesla_slider::get_slider_html('dishes','','single', $post->id);

        endwhile; ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>