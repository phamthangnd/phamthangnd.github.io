<?php get_header(); ?>
        
            <div class="error404-block">
                <h2 class="entry-title margin-top-160 aligncenter">
                    <?php _go('error_message') ? _eo('error_message') : _ex('Sorry! The Page You\'re Looking For Cannot Be Found', 'error 404', 'cuisinier'); ?>
                </h2><br /><br />

                <?php if (_go('error_404')): ?>
                    <div class="aligncenter">
                        <img src="<?php _eo('error_404'); ?>" alt="<?php _ex('Error 404', 'error 404', 'cuisinier'); ?>" />
                    </div>
                <?php endif; ?>
            </div>
<?php get_footer(); ?>