<?php get_header(); ?>
	<div class="container ">
        <?php if (have_posts()) : 
            while(have_posts()) : the_post(); ?>
                <?php the_content(); ?>
                    <div class="comments-wrap">  
                        <?php comments_template( ); ?>
                    </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
<?php get_footer(); ?>