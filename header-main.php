<div class="section section-slider section-nav relative">
<?php
    if ($post){
        $slider_category = get_post_meta($post->ID, THEME_NAME . '_rev_slider', true);

        if ( $slider_category && class_exists('RevSliderFront') ) {
            $rvslider = new RevSlider();
            $arrSliders = $rvslider->getArrSliders();
            if( !empty( $arrSliders ) ) {
                foreach ($arrSliders as $revSlider) {
                    if($revSlider->getAlias() === $slider_category)
                        $revSliderAlias = $revSlider->getAlias();
                }
            }
        } 
    } ?>

    <div id="home_slider" class="main-slider background-black">
        <?php if( !empty( $revSliderAlias ) ): ?>
            <?php putRevSlider( $revSliderAlias ); ?>
        <?php endif; ?>
    </div>
    
    <div class="nav-wrap ovh">
        <!-- logo goes here -->

        <nav class="responsive-nav responsive-main-nav main-nav home-nav">
            
            <?php if(_go('logo_image')): ?>
                <figure class="identity">
                    <a href="<?php echo home_url() ?>" title="home" rel="home">
                        <img src="<?php _eo('logo_image') ?>" alt="<?php echo THEME_PRETTY_NAME; ?><?php _e('theme logo', 'cuisinier') ?>">
                    </a>
                </figure>
            <?php else: ?>
                <div class="aligncenter identity">
                    <a href="<?php echo home_url() ?>" title="home" class="logo logo-text uppercase" rel="home" style="font-family: <?php if( _go('logo_text_font') ){ _eo('logo_text_font'); } else { echo 'Oswald'; } ?>; font-size: <?php if( _go('logo_text_size') ) {_eo('logo_text_size'); } else{ echo '42'; } ?>px; color: <?php if( _go('logo_text_color') ){ _eo('logo_text_color'); } else {echo '#fff'; } ?>">
                        <?php   if( _go('logo_text') ){
                                    _eo('logo_text');
                                } else {
                                    echo THEME_PRETTY_NAME;
                                }
                        ?>
                    </a>
                </div>
            <?php endif; ?>

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

<div class="menu-button alignleft"></div>