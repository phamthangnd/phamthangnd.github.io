<?php get_header(); ?>
    <div  id="page_categories" class="page-content page-categories page-blog show-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <header class="margin-top-40 padding">
                        <h2 class="entry-title"><?php _e('Category Archive: ','cuisinier'); echo '<span>'.single_cat_title('', false).'</span>'; ?></h2>
                    </header>
                    <?php if (have_posts()) : ?>
                        <ul class="clean-list blog-posts-list row ">
                            <?php while(have_posts()) : the_post();

                                get_template_part('content','blog');
                            endwhile; ?>
                        </ul>

                        <?php get_template_part('nav','main')?>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>
<?php get_footer(); ?>