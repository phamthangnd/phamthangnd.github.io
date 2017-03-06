<?php
/*
    Template Name: Simple Page
*/
?>
<?php get_header(); ?>
        <?php if (have_posts()) : 
            while(have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                    <div class="container">
                        <div class="comments-wrap">  
                            <?php comments_template( ); ?>
                        </div>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
<?php get_footer(); ?>