<?php
/**
 * Search results page
 */
?>

<?php get_header(); ?>
<div id="search" class="page-content page-search page-blog show-content">
    <div class="container">
        
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) : ?>
                    <header class="margin-top-40 padding">
                        <h2 class="entry-title"><?php _e('Search Results for ','cuisinier') ?><span><i>'<?php echo get_search_query(); ?>'</i></span> :</h2>
                    </header>
                    <ul class="clean-list blog-posts-list row ">
                        <?php while(have_posts()) : the_post();
                            get_template_part('content','blog');
                        endwhile; ?>
                    </ul>
                    <?php get_template_part('nav','main')?>
                    <?php else: ?>
                        <header class="margin-top-100">
                            <h2 class="entry-title"><?php _e('No matching posts found','cuisinier'); ?></h2>
                        </header>
                    <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>