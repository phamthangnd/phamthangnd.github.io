<?php 
if ( !is_archive() && !is_404()  ){
    $post_id = get_queried_object() && get_queried_object()->ID && get_post_meta(get_queried_object()->ID, THEME_NAME . '_footer_back', true)  ? get_queried_object()->ID : get_option('page_for_posts');
    $get_footer_background = get_post_meta($post_id, THEME_NAME . '_footer_back', true);
} else{
    $get_footer_background = '';
}

$footer_back = is_archive() || is_404() && _go('back_footer') ? 'background-image: url('._go('back_footer').');' : ( $get_footer_background ? 'background-image: url('.$get_footer_background['url'].');' : ''); ?>



<!-- ================================= START FOOTER === -->
<section class="section section-footer">
    <footer class="main-footer">
        <?php if(!empty($footer_back)): ?>
            <div class="big-footer padding-top-60" style="<?php echo $footer_back; ?>">
                <?php get_sidebar('footer'); ?>
            </div>
        <?php endif; ?>    
        <div class="small-footer">
            <div class="container">
                <div class="row aligncenter margin-top-50">
                    <?php _eo('copyright_message'); ?>
                </div>
            </div>
        </div>
    </footer>
</section>
<!-- ================================= END FOOTER === -->      

</div>
        <?php wp_footer(); ?>
    </body>
</html>