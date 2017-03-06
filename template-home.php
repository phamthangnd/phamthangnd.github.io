<?php
/*
    Template Name: Home
*/
?>

<?php get_header(); ?>

<div class="main-content content">
    <?php if (have_posts()): 
        while(have_posts()): the_post(); 
            the_content();
        endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>