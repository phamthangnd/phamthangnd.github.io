
            
<div class="post margin-top-100">
    <div class="blog-photo post-photo">
            <?php if( has_post_thumbnail() ): ?>
                <figure>
                    <?php the_post_thumbnail(); ?>
                </figure>
            <?php endif; ?>
            
             <ul class="clean-list inline-list meta-list ovh margin-top">
                <li><time class="date" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('d M, Y') ?></time>
                <li>
                    <a class="meta-link comments" href="<?php the_permalink(); ?>"><?php comments_number( '0', '1', '%' ) ?> <?php _ex('comments', 'cuisinier'); ?></a>
                </li>
            </ul>
    </div>
    <div class="entry-content">
        <h2 class="entry-header text-center"><?php the_title(); ?></h2>

        <?php the_content()?>
    </div>

    <?php if( get_the_tags() ): ?>
        <div class="ovh margin-double-top">
            <span><?php _ex('Tags', 'cuisinier');?>:</span>
            <div class="tag-list inline">
                <?php the_tags('', ', ', ''); ?>
            </div>
        </div>
    <?php endif; ?>

    <div class="ovh margin-top-10">
        <span><?php _e('Categories', 'cuisinier'); ?>:</span>
        <ul class="clean-list cat-list inline">
             <li><?php the_category(', ')?></li>
        </ul>
    </div>

    <?php if ( _go('share_this') ): ?>
        <div class="share-links clearfix">
            <h2 class="entry-title"><?php _ex('Share', 'cuisinier') ?></h2>
                <?php tt_share(); ?>
        </div>
    <?php endif; ?>

    <div class="post-nav ovh margin-top-60">
        <?php previous_post_link('%link', '%title', TRUE); ?> 
        <?php next_post_link('%link', '%title', TRUE); ?> 
    </div>

</div>

<div class="comments-wrap">  
    <?php comments_template( ); ?>
</div>

   
<div class="entry-footer">
    <div class="post_pagination">
        <?php wp_link_pages(array(
            'before'           => '<ul class="page-numbers center"><li>',
            'after'            => '</li></ul>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => '</li><li>',
            'nextpagelink'     => __( 'Next page','cuisinier' ),
            'previouspagelink' => __( 'Previous page','cuisinier' ),
            'pagelink'         => '%',
            'echo'             => 1
        )); ?>
    </div>
</div>