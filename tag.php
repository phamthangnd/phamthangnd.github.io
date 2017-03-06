<?php get_header(); ?>
        <div id="page_tags" class="page-content page-tags page-blog show-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <?php if (have_posts()) : ?>
                            <header class="margin-top-40 padding">
                                <h2 class="entry-title"><?php _e('Tag Archive: ','cuisinier'); echo '<span>'.single_tag_title('', false).'</span>'; ?></h2>
                            </header>
                            <ul class="clean-list blog-posts-list row ">
                                <?php while(have_posts()) : the_post();

                                    get_template_part('content','blog');
                                endwhile; ?>
                            </ul>
                            <?php get_template_part('nav','main')?>

                            <?php else: ?>
                                <div class="error404">
                                    <h2 class="entry-title margin-top-100 aligncenter"><?php _e('No posts to display in ','cuisinier'); echo single_tag_title( '<span>', false ); ?></h2><br /><br />
                                    <?php if (_go('error_404')): ?>
                                        <div class="aligncenter">
                                            <img src="<?php _eo('error_404'); ?>" alt="<?php _ex('Error 404', 'error 404', 'cuisinier'); ?>" />
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>