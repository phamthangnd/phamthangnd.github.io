<?php $slide = $slides[0]; ?>
<?php
    the_content();
?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                    <?php 
                        $rating = null;

                        switch ($slide['options']['rating']) {
                            case 'default':
                                $rating = '0%';
                                break;

                            case 'excellent':
                                $rating = '100%';
                                break;

                            case 'verygood':
                                $rating = '80%';
                                break;

                            case 'good':
                                $rating = '60%';
                                break;

                            case 'fair':
                                $rating = '40%';
                                break;

                            case 'poor':
                                $rating = '20%';
                                break;

                            default:
                                $rating = '0%';
                                break;
                        }
                    ?>
                    <div class="rating-block margin-top">
                        <span><?php _e('Rating:','cuisinier'); ?></span>
                        <div class="star-rating inline">
                            <span style="width: <?php echo $rating; ?>"></span>
                        </div>
                    </div>

                <?php if( get_the_tags() ): ?>
                    <div class="ovh tags-block">
                        <span><?php _ex('Tags', 'cuisinier');?>:</span>
                        <div class="tag-list inline">
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if( array_filter($slide['categories']) ): ?>
                    <div class="ovh cat-block margin-top-10">
                        <span><?php _ex('Categories', 'cuisinier');?>:</span>
                        <ul class="clean-list cat-list inline">
                            <?php echo '<li class="cat-item">'.implode(', ', $slide['categories']).'</li>'; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if ( _go('share_this') ): ?>
                    <div class="share-links clearfix margin-double-top">
                        <h2 class="entry-title"><?php _ex('Share', 'cuisinier') ?></h2>
                        <?php tt_share(); ?>
                    </div>
                <?php endif; ?>


            </div>
        </div>

        <?php if( _go('show_related_posts') && count($slide['related']) ): ?>

            <section class="section section-slider ovh">
                <header class="aligncenter margin-double-top">
                    <h2 class="entry-title margin-top-80"><?php _e('You May Also Like', 'cuisinier'); ?></h2>
                </header>

                <div class="relative margin-top">
                    <div id="simple_slider" class="posts-slider page-slider">
                        <ul class="clean-list">
                            <?php foreach ($slide['related'] as $key => $related): ?>

                                <li class="slide">
                                    <div>
                                        <?php if(has_post_thumbnail($related['post']->ID)){
                                            $post_thumbnail_id = get_post_thumbnail_id( $related['post']->ID );
                                            $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                                        } ?>
                                            <figure>
                                                <a href="<?php echo $post_thumbnail_url; ?>" class="zoom-image">
                                                    <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo get_the_title($related['post']->ID); ?>" />
                                                </a>

                                                <?php 
                                                    $rating = null;

                                                    switch ($related['options']['rating']) {
                                                        case 'default':
                                                            $rating = '0%';
                                                            break;

                                                        case 'excellent':
                                                            $rating = '100%';
                                                            break;

                                                        case 'verygood':
                                                            $rating = '80%';
                                                            break;

                                                        case 'good':
                                                            $rating = '60%';
                                                            break;

                                                        case 'fair':
                                                            $rating = '40%';
                                                            break;

                                                        case 'poor':
                                                            $rating = '20%';
                                                            break;

                                                        default:
                                                            $rating = '0%';
                                                            break;
                                                    }
                                                ?>

                                                <figcaption>
                                                    <div class="star-rating">
                                                        <span style="width: <?php echo $rating; ?>"></span>
                                                    </div>
                                                </figcaption>
                                            </figure>

                                        <?php if(get_the_title( $related['post']->ID )): ?>  
                                            <h2 class="entry-title"><a href="<?php echo get_permalink($related['post']->ID); ?>"><?php echo get_the_title($related['post']->ID); ?></a></h2>
                                        <?php endif; ?>
                                        <?php echo apply_filters('the_content', $related['post']->post_excerpt); ?>
                                    </div>
                                </li>

                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <div class="post-nav ovh margin-top-60">
            <?php previous_post_link('%link', '%title'); ?> 
            <?php next_post_link('%link', '%title'); ?> 
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="comments-wrap">  
                    <?php comments_template( ); ?>
                </div>
            </div>
        </div>

    </div>