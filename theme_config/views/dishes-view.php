<?php 
 $filters = '';
 $all_button = !empty($shortcode['all_button'])? $shortcode['all_button']: 'All Dishes';


foreach( $all_categories as $category_slug => $category_name ){

    $description = get_term_by( 'slug', $category_slug, 'dishes_tax');

    !empty($description) ? $description = $description -> description : '';
    
    if(!$description):
        $filters .= '<li class="col-md-2 col-sm-4 col-xs-4">
                        <a href="" class="icon-'.$category_slug.'" data-filter=".'.$category_slug.'">'.$category_name.'</a>
                    </li>';
    else : 
         $filters .= '<li class="col-md-2 col-sm-4 col-xs-4">
                       <a href="" class="custom-icon"  data-filter=".'.$category_slug.'"><img src="'.$description.'"><br>'.$category_name.'</a>
                    </li>';     
    endif;                      
}
if(!$shortcode['all_icon']):
        $filters =  '<ul class="clean-list filter-cats margin-top-100 row" id="filters_view">
                        <li class="col-md-2 col-sm-4 col-xs-4"><a href="" class="icon-all"  data-filter="*">'.$all_button.'</a>
                        </li>'.$filters.'</ul>';
else :
        $filters =  '<ul class="clean-list filter-cats margin-top-100 row" id="filters_view">
                        <li class="col-md-2 col-sm-4 col-xs-4"><a href="" class="custom-icon"  data-filter="*"><img src="'.$shortcode['all_icon'].'"><br>'.$all_button.'</a>
                        </li>'.$filters.'</ul>';       
endif;                                 
?>


<div class="container">
    <?php echo $filters; ?>
    <ul class="clean-list dishes-list filter-items margin-top-60 row">
    
    <?php foreach( $slides as $i => $slide ): ?>
        <?php if($shortcode['nr'] <=  $i) break;  ?>
        <?php 
            $cats = '';
            foreach ($slide['categories'] as $slug => $category) {
                $cats .= $slug.' ';
            }
        ?>
        <li class="col-md-4 col-sm-6 col-xs-6 <?php echo trim($cats); ?>">
            <?php if( has_post_thumbnail($slide['post']->ID) ): ?>
                <?php 
                    $post_thumbnail_id = get_post_thumbnail_id( $slide['post']->ID );
                    $post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
                ?>
                <figure>
                    <a href="<?php echo $post_thumbnail_url; ?>" class="zoom-image">
                        <img src="<?php echo $post_thumbnail_url; ?>" alt="<?php echo get_the_title($slide['post']->ID); ?>">
                    </a>

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
                <figcaption>
                    <div class="star-rating">
                        <span style="width: <?php echo $rating; ?>"></span>
                    </div>
                </figcaption>


                </figure>
            <?php endif; ?>

            <h2 class="entry-title"><a href="<?php echo get_permalink($slide['post']->ID); ?>" title="<?php echo get_the_title($slide['post']->ID); ?>"><?php echo get_the_title($slide['post']->ID); ?></a></h2>
            <?php echo apply_filters('the_content', $slide['post']->post_excerpt); ?>

            <div class="cook-time">
                <?php if(  is_object($slide['options']['icon']) ): ?>
                    <span class="background-orange padding-10 inline"><img src="<?php echo $slide['options']['icon']->url; ?>" alt="<?php _ex('Cook Time Icon', 'cuisinier'); ?>" /></span>
                <?php endif; ?>

                <?php if( $slide['options']['duration'] ): ?>
                    <strong><?php echo $slide['options']['duration']; ?></strong>
                <?php endif; ?>

            </div>                 
        </li>
    <?php endforeach; ?>

    </ul>
</div>
