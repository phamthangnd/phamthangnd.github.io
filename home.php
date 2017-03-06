<?php get_header(); ?>
<div id="blog" class="page-content page-blog show-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php if (have_posts()) : ?>
                    <ul class="clean-list blog-posts-list row margin-top-100">
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