<?php get_header(); ?>
        <div  id="archive_box" class="box page-content page-blog show-content page-archive archive-box"><!-- Section Events -->
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <header class="margin-top-40 padding">
                            <h2 class="entry-title">
                                <?php if (is_day()) : ?>
                                    <?php _e('Archive: ','cuisinier'); echo '<span>'.get_the_date('D M Y').'</span>'; ?>
                                <?php elseif (is_month()) : ?>
                                    <?php _e('Archive: ','cuisinier'); echo '<span>'.get_the_date('M Y').'</span>'; ?>
                                <?php elseif (is_year()) : ?>
                                    <?php _e('Archive: ','cuisinier'); echo '<span>'.get_the_date('Y').'</span>'; ?>
                                <?php else : ?>
                                    <?php _e('Archive: ','cuisinier'); ?>
                                <?php endif; ?>
                            </h2>
                        </header>
                        <?php if (have_posts()) : ?>
                            <ul class="clean-list blog-posts-list row ">
                                <?php while(have_posts()) : the_post();

                                    get_template_part('content','blog');

                                endwhile; ?>
                            </ul>
                            <?php get_template_part('nav','main')?>

                            <?php else: ?>
                                <h2 class="entry-title"><?php _e('No posts to display','cuisinier'); ?></h2>
                            <?php endif; ?>
                    </div>
                    <div class="col-md-4">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
        </div>
<?php get_footer(); ?>