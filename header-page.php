<?php
if ( !is_archive() && !is_404() ){
    $post_id =  get_queried_object() && get_queried_object()->ID && get_post_meta(get_queried_object()->ID, THEME_NAME . '_header_back', true)  ? get_queried_object()->ID : get_option('page_for_posts');
    $get_header_background = get_post_meta($post_id, 'cuisinier_header_back', true);
} else{
    $get_footer_background = '';
}

$header_back = is_archive() || is_404() && _go('back_header') ? 'background-image: url('._go('back_header').');' : ( $get_header_background ? 'background-image: url('.$get_header_background['url'].');' : '');
?>

<div id="header" class="section section-header" style="<?php echo $header_back; ?>">
        <div class="container">
            <div class="row ">
                <div class="col-md-2">
                    <?php if(_go('logo_image')): ?>
                        <figure class="identity">
                            <a href="<?php echo home_url() ?>" title="home" rel="home">
                                <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME; ?><?php _e('theme logo', 'cuisinier') ?>">
                            </a>
                        </figure>
                    <?php else: ?>
                        <a href="<?php echo home_url() ?>" title="home" class="logo logo-text uppercase" rel="home" style="font-family: <?php if( _go('logo_text_font') ){ _eo('logo_text_font'); } else { echo 'Oswald'; } ?>; font-size: <?php if( _go('logo_text_size') ) {_eo('logo_text_size'); } else{ echo '42'; } ?>px; color: <?php if( _go('logo_text_color') ){ _eo('logo_text_color'); } else {echo '#fff'; } ?>">
                            <?php   if( _go('logo_text') ){
                                        _eo('logo_text');
                                    } else {
                                        echo THEME_PRETTY_NAME;
                                    }
                            ?>
                        </a>
                    <?php endif; ?>

                    <div class="menu-button alignleft"></div>
                </div>
                <div class="col-md-10">
                    <div class=" alignright margin-top-30">
                        
                        <nav class="responsive-nav responsive-main-nav responsive-page-nav main-nav page-nav">
                            <ul class="clean-list clearfix">
                                <?php wp_nav_menu( array( 
                                    'title_li'=>'',
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'items_wrap' => '%3$s',
                                    'depth'      => 0,
                                    'fallback_cb' => 'wp_list_pages',
                                    'walker' => has_nav_menu('primary') ? new Menu_With_Description : new Displaywp_Walker_Page
                                )); ?>
                            </ul>
                        </nav>

                    </div>
                </div>
            </div>
        </div><hr /> 
        <?php if ( !is_archive() ): ?>
            <header>
                <h2 class="entry-title aligncenter"><?php echo is_404() && _go('error_title') ? _go('error_title') : ( get_queried_object() ? get_the_title(get_queried_object()->ID) : '' ); ?></h2>
            </header>
        <?php endif; ?>
</div>